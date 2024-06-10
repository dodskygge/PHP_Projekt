<?php 

    include('../components/header.php'); 

    //Usuń token z bazy danych
    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE users SET user_token = '' WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();


    //Usuń token z ciasteczka i zakończ sesję
    setcookie('token', '', time() - 3600, "/");
    unset($_SESSION['username']);
    session_destroy();
    $sessionChecker = false;
    $conn->close();
    sleep(1);
    header("Location: /");

?>

<?php include('../components/footer.php'); ?>