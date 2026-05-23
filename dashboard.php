<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks WHERE user_id='$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<?php include 'includes/header.php'; ?>

<div class="dashboard">

    <div class="topbar">
        <h1>Welcome <?= $_SESSION['username']; ?></h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="task-form">
        <h2>Create Task</h2>

        <form action="api/create-task.php" method="POST">
            <input type="text" name="title" placeholder="Task title" required>

            <textarea name="description" placeholder="Task description"></textarea>

            <select name="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <button type="submit">Add Task</button>
        </form>
    </div>

    <div class="tasks-container">

        <?php while($task = $result->fetch_assoc()): ?>

            <div class="task-card">

                <h3><?= $task['title']; ?></h3>

                <p><?= $task['description']; ?></p>

                <span class="priority <?= $task['priority']; ?>">
                    <?= $task['priority']; ?>
                </span>

                <span class="status">
                    <?= $task['status']; ?>
                </span>

                <div class="task-actions">

                    <form action="api/update-task.php" method="POST">
                        <input type="hidden" name="task_id" value="<?= $task['id']; ?>">
                        <button type="submit">Complete</button>
                    </form>

                    <form action="api/delete-task.php" method="POST">
                        <input type="hidden" name="task_id" value="<?= $task['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>

                </div>

            </div>

        <?php endwhile; ?>

    </div>

</div>

<?php include 'includes/footer.php'; ?>