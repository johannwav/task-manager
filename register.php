<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error creating account";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <form method="POST" class="form-card">
        <h2>Create Account</h2>

        <?php if(isset($error)): ?>
            <p><?= $error ?></p>
        <?php endif; ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>

        <p>
            Already have an account?
            <a href="login.php">Login</a>
        </p>
    </form>
</div>

<?php include 'includes/footer.php'; ?>