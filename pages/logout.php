
<?php
// Zniszcz sesję (wyloguj użytkownika)
unset($_SESSION['username']);
$sessionChecker = false;

setcookie('token', '', time() - 3600, "/");

sleep(3);
header("Location: /");

?>

<?php include('../components/header.php'); 
session_destroy();
?>

<?php include('../components/footer.php'); ?>