<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT 
            t.ticket_id, 
            t.requested_date, 
            t.subject, 
            t.support_type, 
            t.category, 
            t.description, 
            u.department, 
            t.attachments 
        FROM tickets t
        JOIN user u ON t.requestor_id = u.employee_id
        WHERE u.branch = 'Mandaluyong'
        ORDER BY t.requested_date DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}

echo json_encode(['data' => $tickets]);
