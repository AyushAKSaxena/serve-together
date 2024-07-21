<?php
header('Content-Type: application/json');

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opportunity_id = $_POST['opportunity_id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];

    $stmt = $conn->prepare("INSERT INTO volunteers (opportunity_id, name, phone_number) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $opportunity_id, $name, $contact_info);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
