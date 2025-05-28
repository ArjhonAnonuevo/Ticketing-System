<?php
header('Content-Type: application/json');
require "connection.php";

if (!isset($_GET['ticket_id']) || empty($_GET['ticket_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing ticket_id']);
    exit;
}

$ticket_id = $_GET['ticket_id'];

$stmt = $conn->prepare("SELECT 
    t.ticket_id, 
    t.subject, 
    t.description, 
    t.requested_date, 
    t.support_type, 
    t.category, 
    t.attachments,
    ts.status_name,
    ts.last_modified 
FROM tickets t
LEFT JOIN ticket_status ts ON t.ticket_id = ts.ticket_id
WHERE t.ticket_id = ?
");

if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $ticket_id);

if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['error' => 'Execute failed: ' . $stmt->error]);
    exit;
}

$result = $stmt->get_result();
$ticket = $result->fetch_assoc();

if (!$ticket) {
    http_response_code(404);
    echo json_encode(['error' => 'Ticket not found']);
    exit;
}

// ✅ Process attachments if available
if (!empty($ticket['attachments'])) {
    $filename = basename($ticket['attachments']);
    $requestedDate = $ticket['requested_date'];

    if ($requestedDate) {
        $folder = $requestedDate;
        $ticket['attachments'] = '../../srf_attachments/' . $folder . '/' . $filename;
    }
}

echo json_encode($ticket);

$stmt->close();
$conn->close();
