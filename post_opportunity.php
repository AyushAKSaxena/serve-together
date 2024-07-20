<?php
header('Content-Type: application/json');

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json, true);
    
    $title = $data['title'];
    $description = $data['description'];

    $stmt = $conn->prepare("INSERT INTO opportunities (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'New opportunity posted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>