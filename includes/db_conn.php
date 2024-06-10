<?php
    $servername = "localhost";
    $username = "root";
    $password = "s";
    $dbname = "php_projekt";
    $sessionChecker = false;

    try {
        $conn = @new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            throw new Exception("Nie udało się połączyć z bazą danych.");
        }
    } catch (Exception $e) {
        die("<h2 class='text-center'> Error 500 </h2>");
    }
?>