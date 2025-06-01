<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$offset = ($page - 1) * $limit;

// Get total count for pagination
$countSql = "SELECT COUNT(*) as total FROM tickets t JOIN user u ON t.requestor_id = u.employee_id WHERE u.branch = 'Mandaluyong'";
$countStmt = $conn->prepare($countSql);
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalCount = $countResult->fetch_assoc()['total'];
$countStmt->close();

$sql = "SELECT 
            t.ticket_id, 
            t.requested_date, 
            t.subject, 
            t.support_type, 
            t.category, 
            t.description, 
            CONCAT(u.firstname, ' ', u.lastname) AS fullname,
            u.department,
            u.anydeskIp,
            u.employee_id,
            t.attachments 
        FROM tickets t
        JOIN user u ON t.requestor_id = u.employee_id
        WHERE u.branch = 'Mandaluyong'
        ORDER BY t.requested_date DESC
        LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}
$stmt->close();

// Calculate total pages
$totalPages = ceil($totalCount / $limit);

echo json_encode([
    'data' => $tickets,
    'pagination' => [
        'current_page' => $page,
        'limit' => $limit,
        'total_records' => $totalCount,
        'total_pages' => $totalPages
    ]
]);
