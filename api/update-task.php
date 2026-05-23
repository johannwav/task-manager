<?php
include '../includes/db.php';

$task_id = $_POST['task_id'];

$sql = "UPDATE tasks
        SET status='completed'
        WHERE id='$task_id'";

$conn->query($sql);

header("Location: ../dashboard.php");
exit();
?>