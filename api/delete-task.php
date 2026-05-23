<?php
include '../includes/db.php';

$task_id = $_POST['task_id'];

$sql = "DELETE FROM tasks WHERE id='$task_id'";

$conn->query($sql);

header("Location: ../dashboard.php");
exit();
?>