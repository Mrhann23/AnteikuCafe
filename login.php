<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            echo "<script>alert('Login Successful!'); window.location.href='home.html';</script>";
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Found');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Anteiku</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<!-- Video Background -->
<video autoplay muted loop id="bg-video">
        <source src="login.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
