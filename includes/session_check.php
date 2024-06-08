<?php

if (isset($_COOKIE['token']) && isset($_SESSION['username']) ){
    // Get the token expiry date from the database
    $stmt = $conn->prepare("SELECT user_token_expiry FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($db_token_expiry);
    $stmt->fetch();
    $stmt->close();

    if(date("Y-m-d H:i:s") > $db_token_expiry){
        // If the token is expired - delete from db
        $stmt = $conn->prepare("UPDATE users SET user_token = NULL, user_token_expiry = NULL WHERE user_name = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $stmt->close();
        $sessionChecker = false;

        } else {
            // If token and expiry date is valid
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
            
        }
} else {
    $sessionChecker = false;
}
?>