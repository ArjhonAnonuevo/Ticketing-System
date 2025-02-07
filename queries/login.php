<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');

if(["REQUEST_METHOD"] === "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user from the database
    $query = "SELECT id, username, credentials, password FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['credentials'];

            // Redirect based on user role
            if ($row['credentials'] === 'admin') {
                echo json_encode(["status" => "success", "redirect" => "components/user-admin/homepage.php"]);
            } else {
                echo json_encode(["status" => "success", "redirect" => "components/user/homepage.php"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found"]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
