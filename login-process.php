<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sample user data stored in an array (for demonstration purposes)
    $users = [
        "user1" => "password1",
        "user2" => "password2",
        "zain" => "zain123"
        // Add more users as needed
    ];

     if (array_key_exists($username, $users) && $users[$username] == $password) {
         $_SESSION["username"] = $username;
         header("Location: home.html");
         exit(); // Make sure to exit after the header to prevent further execution
     } else {
        $_SESSION["login_error"] = "Invalid username or password. Please try again.";
        header("Location: login.php");
        exit();
     }

}
?>