<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'anteiku_cafe');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($query)) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Error: ' . $conn->error);</script>";
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('Login successful!'); window.location='home.php';</script>";
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anteiku Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Welcome to <span>Anteiku</span></h2>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php" id="show-register">Register here</a></p>
        </div>
        <div class="form-box hidden" id="register-box">
            <h2>Join <span>Anteiku</span></h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="register">Register</button>
            </form>
            <p>Already have an account? <a href="login.php" id="show-login">Login here</a></p>
        </div>
    </div>
    <script>
        document.getElementById('show-register').addEventListener('click', function() {
            document.querySelector('.form-box').classList.add('hidden');
            document.getElementById('register-box').classList.remove('hidden');
        });
        document.getElementById('show-login').addEventListener('click', function() {
            document.getElementById('register-box').classList.add('hidden');
            document.querySelector('.form-box').classList.remove('hidden');
        });
    </script>
</body>
</html>