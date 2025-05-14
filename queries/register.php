<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $admin_credentials = $_POST['credentials'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $ip = $_POST['anydesk-ip'];
    $branch = $_POST['branch'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //check email if its used since it is unique
    $query_check_email = "SELECT id FROM user WHERE email = ?";
    if ($stmt_check_email = $conn->prepare($query_check_email)) {
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();
    
        // If the email exists, return an error message
        if ($stmt_check_email->num_rows > 0) {
            echo json_encode(["status" => "error", "message" => "This email is already in use."]);
            $stmt_check_email->close();
            exit(); // Exit here to prevent the rest of the registration process
        }
        $stmt_check_email->close();
    }
    

    // Determine role based on department
    $department = $_POST['department'] ?? '';
    $role = ($department === "MIS") ? "admin" : "user";
    require_once "../vendor/autoload.php";

    
    Dotenv\Dotenv::createImmutable(__DIR__.'/..')->load();
    // Compare admin credentials from submitted foms with those stored in the environment
    if($role === "admin"){
        $stored_credentials = $_ENV['ADMIN_CREDENTIALS'];
        if ($admin_credentials === $stored_credentials) {
            // Prepare the SQL query using prepared statements
            $query = "INSERT INTO user (firstname, lastname, email, username, password, anydeskIp, branch, department, credentials) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            // Initialize a prepared statement
            if ($stmt = $conn->prepare($query)) {
                // Bind the input parameters to the prepared statement
                $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $username, $hashed_password, $ip, $branch, $department, $role);
    
                // Execute the prepared statement
                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Admin User registered successfully"]);
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
    }

    else{
        //if the role isnt admin or MIS
        $role === "user";
        //insert the data for standard user
        $query = "INSERT INTO user (firstname, lastname, email, username, password, anydeskIp, branch, department, credentials)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if($stmt = $conn->prepare($query)){
            $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $username, $hashed_password, $ip, $branch, $department, $role);
             // Execute the prepared statement
             if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "User registered successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
            }
            $stmt->close();
        }
        else {
            echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
        }
        $conn->close();
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

?>
