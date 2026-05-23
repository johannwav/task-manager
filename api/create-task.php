<?php
session_start();
include '../includes/db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$priority = $_POST['priority'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO tasks (user_id, title, description, priority)
        VALUES ('$user_id', '$title', '$description', '$priority')";

$conn->query($sql);

header("Location: ../dashboard.php");
exit();
?>