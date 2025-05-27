<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');

require_once "../vendor/autoload.php";
Dotenv\Dotenv::createImmutable(__DIR__.'/..')->load();

function generateEmployeeId($conn) {
    $maxAttempts = 10;
    $attempt = 0;

    do {
        $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $employeeId = "EMP-" . $randomNumber;

        $query = "SELECT employee_id FROM user WHERE employee_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $employeeId);
            $stmt->execute();
            $stmt->store_result();

            $isUnique = $stmt->num_rows === 0;
            $stmt->close();

            if ($isUnique) {
                return $employeeId;
            }
        }

        $attempt++;
    } while ($attempt < $maxAttempts);

    return false; // Could not generate a unique ID
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $admin_credentials = $_POST['credentials'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $ip = $_POST['anydesk-ip'];
    $branch = $_POST['branch'];
    $password = $_POST['password'];
    $department = $_POST['department'] ?? '';
    $role = ($department === "MIS") ? "admin" : "user";

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $query_check_email = "SELECT employee_id FROM user WHERE email = ?";
    if ($stmt_check_email = $conn->prepare($query_check_email)) {
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();
        if ($stmt_check_email->num_rows > 0) {
            echo json_encode(["status" => "error", "message" => "This email is already in use."]);
            $stmt_check_email->close();
            exit();
        }
        $stmt_check_email->close();
    }

    // Generate unique employee ID
    $employeeId = generateEmployeeId($conn);
    if (!$employeeId) {
        echo json_encode(["status" => "error", "message" => "Failed to generate employee ID."]);
        exit();
    }

    // Admin registration
    if ($role === "admin") {
        $stored_credentials = $_ENV['ADMIN_CREDENTIALS'];
        if ($admin_credentials === $stored_credentials) {
            $query = "INSERT INTO user (employee_id, firstname, lastname, email, username, password, anydeskIp, branch, department, credentials) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param("ssssssssss", $employeeId, $firstname, $lastname, $email, $username, $hashed_password, $ip, $branch, $department, $role);
                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Admin user registered successfully", "employee_id" => $employeeId]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
                }
                $stmt->close();
            } else {
                echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
            }
            $conn->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid admin credentials"]);
        }
    } else {
        // Standard user registration
        $query = "INSERT INTO user (employee_id, firstname, lastname, email, username, password, anydeskIp, branch, department, credentials) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ssssssssss", $employeeId, $firstname, $lastname, $email, $username, $hashed_password, $ip, $branch, $department, $role);
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "User registered successfully", "employee_id" => $employeeId]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
        }
        $conn->close();
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
