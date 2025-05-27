<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $subject       = $_POST["subject"] ?? '';
    $support_type  = $_POST["type"] ?? '';
    $category      = $_POST["category"] ?? '';
    $description   = $_POST["description"] ?? '';
    $requestor_id  = $_SESSION["user_id"] ?? null;
    $current_date  = date("Y-m-d");

    // Generate unique ticket ID
    function generateId($conn)
    {
        do {
            $ticket_id = (string)rand(100000, 999999);
            $stmt = $conn->prepare("SELECT ticket_id FROM tickets WHERE ticket_id = ?");
            $stmt->bind_param("s", $ticket_id);
            $stmt->execute();
            $stmt->store_result();
            $exists = $stmt->num_rows > 0;
            $stmt->close();
        } while ($exists);

        return $ticket_id;
    }

    $ticket_id = generateId($conn);

    // File upload handling
    $upload_base_dir = "../srf_attachments/";
    $date_folder = $upload_base_dir . $current_date . "/";
    $uploaded_file_path = null;

    if (!file_exists($date_folder)) {
        mkdir($date_folder, 0755, true);
    }

    if (isset($_FILES["attachments"]) && $_FILES['attachments']['error'] === UPLOAD_ERR_OK) {
        $tmp_file = $_FILES["attachments"]['tmp_name'];
        $original_name = $_FILES["attachments"]['name'];

        $extension = pathinfo($original_name, PATHINFO_EXTENSION);
        $safe_filename = $ticket_id . "_" . $requestor_id . "." . strtolower($extension);
        $target_path = $date_folder . $safe_filename;

        if (move_uploaded_file($tmp_file, $target_path)) {
            $uploaded_file_path = $target_path;
        } else {
            echo json_encode(["status" => "error", "message" => "File upload failed."]);
            exit;
        }
    }



    // Insert into database
    $stmt = $conn->prepare(
        "INSERT INTO tickets 
        (ticket_id, subject, support_type, category, requestor_id, requested_date, description, attachments)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "SQL Prepare failed: " . $conn->error]);
        exit;
    }

    $stmt->bind_param(
        "ssssssss",
        $ticket_id,
        $subject,
        $support_type,
        $category,
        $requestor_id,
        $current_date,
        $description,
        $uploaded_file_path
    );

    if (!$stmt->execute()) {
        echo json_encode(["status" => "error", "message" => "SQL Execute failed: " . $stmt->error]);
        $stmt->close();
        exit;
    }

    $stmt->close();

    echo json_encode([
        "status" => "success",
        "message" => "Ticket Submitted Successfully!",
        "ticket_id" => $ticket_id,
        "files" => $uploaded_file_path
    ]);
}
