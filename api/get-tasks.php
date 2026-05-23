<?php
session_start();
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks WHERE user_id='$user_id'";
$result = $conn->query($sql);

$tasks = [];

while($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tasks);
?>