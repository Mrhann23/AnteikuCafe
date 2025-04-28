<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sample user data stored in an array (for demonstration purposes)
    // Note: This example does not handle duplicate usernames
    $users = [
        "user3" => "password3",
        "user4" => "password4"
        // Add more users as needed
    ];

    // Check if the username already exists
//     if (array_key_exists($username, $users) && $users[$username] == $password) {
//         $_SESSION["username"] = $username;
//         header("Location: login.html");
//     } else {
//         // Add the new user to the users array
//         $_SESSION["username"] = $username;
//         header("Location: login.html");
//     }
        $_SESSION["username"] = $username;
        header("Location: login.html");
}
?>