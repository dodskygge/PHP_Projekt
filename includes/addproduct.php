<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany jako admin';
        exit();
    }

    $product_name = $_POST['product_name'];
    $product_price = intval($_POST['product_price']);
    $product_quantity = intval($_POST['product_quantity']);
    $product_category = $_POST['product_category'];
    $product_discount = intval($_POST['product_discount']);
    $image_url = "img/" . $_POST['image_url'];

    // INSERT product
    $query = "INSERT INTO products (product_name, product_price, product_quantity, product_category, product_discount, image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siisis", $product_name, $product_price, $product_quantity, $product_category, $product_discount, $image_url);


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