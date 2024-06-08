<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany jako admin';
        exit();
    }

    $product_id = intval($_POST['product_id']);

    // UPDATE product quantity increase
    $query = "UPDATE products SET product_quantity = product_quantity + 1 WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);


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