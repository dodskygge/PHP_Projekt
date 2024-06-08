<?php

if (isset($_COOKIE['token']) && isset($_SESSION['username']) ){
    // Get the user_role from db
    $stmt = $conn->prepare("SELECT user_role FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($user_role);
    $stmt->fetch();
    $stmt->close();

    if($user_role == 'admin'){
        $adminChecker = true;
    } else {
        $adminChecker = false;
    }

} else {
    $adminChecker = false;
}
?>