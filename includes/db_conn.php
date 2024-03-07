<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}
?>