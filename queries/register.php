<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $ip = $_POST['anydesk-ip'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    switch ($department) {
        case "MIS":
            $role = "admin";
            break;
        default:
            $role = "user";
    }

    // Prepare the SQL query using prepared statements
    $query = "INSERT INTO user (firstname, lastname, email, username, password, anydeskIp, branch, department,credentials) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

    // Initialize a prepared statement
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $username, $hashed_password, $ip, $branch, $department, $role);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "User registered successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
