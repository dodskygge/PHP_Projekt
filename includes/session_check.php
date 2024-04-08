<?php

// Check if client is logged in, has a cookie, and has a token
if (isset($_COOKIE['token']) && isset($_SESSION['username']) ){
    // Get the token from the database
    $stmt = $conn->prepare("SELECT user_token FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($db_token);
    $stmt->fetch();
    $stmt->close();

    if ($_COOKIE['token'] == $db_token) {
        $sessionChecker = true;
    } else {
        $sessionChecker = false;
    }
} else {
    $sessionChecker = false;
}
?>