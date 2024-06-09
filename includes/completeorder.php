<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany jako admin';
        exit();
    }

    $order_id = intval($_POST['order_id']);

    // SELECT Product ids from order
    $query = "SELECT order_products_id FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $order_products_id = $row['order_products_id'];
    //Parse
    $products_ids = preg_split("/,/", $order_products_id, -1, PREG_SPLIT_NO_EMPTY);

    // UPDATE Decrease product quantity
    foreach ($products_ids as $number) {
        $query = "UPDATE products SET product_quantity = product_quantity - 1 WHERE product_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $number);
        $stmt->execute();
    }

    // UPDATE Complete order
    $query = "UPDATE orders SET order_status = 'Zamówienie zrealizowane' WHERE order_id = ?";
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