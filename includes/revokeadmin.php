<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany jako admin';
        exit();
    }

    $user_id = intval($_POST['user_id']);
    $user_role = 'user';

    // UPDATE make user not admin
    $query = "UPDATE users SET user_role = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $user_role ,$user_id);


    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: ../admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: ../admin.php");
        exit();
    }

?>
<?php include('../components/footer.php'); ?>