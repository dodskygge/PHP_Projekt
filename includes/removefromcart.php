<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany, aby usunuwać zawartość koszyka';
        exit();
    }

    $user_id = $_SESSION['userid'];
    $product_id = intval($_POST['product_id']);

    // Delete
    $query = "DELETE FROM carts WHERE cart_user_id = ? AND cart_product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $product_id);


    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: ../mycart.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: ../mycart.php");
        exit();
    }



?>
<?php include('../components/footer.php'); ?>