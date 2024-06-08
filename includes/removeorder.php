<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany jako admin';
        exit();
    }

    $order_id = intval($_POST['order_id']);

    // DELETE order
    $query = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);


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