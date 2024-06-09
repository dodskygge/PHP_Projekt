<?php include('../components/header.php'); ?>
<?php
if ($sessionChecker == false) {
    echo 'Musisz być zalogowany jako admin';
    exit();
}

$product_id = intval($_POST['product_id']);
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];
$product_category = $_POST['product_category'];
$product_discount = $_POST['product_discount'];
$image_url = "img/" . $_POST['image_url'];


$fields = [];
$params = [];
$types = "";

if (!empty($product_name)) {
    $fields[] = "product_name = ?";
    $params[] = $product_name;
    $types .= "s";
}
if (!empty($product_price)) {
    $fields[] = "product_price = ?";
    $params[] = intval($product_price);
    $types .= "i";
}
if (!empty($product_quantity)) {
    $fields[] = "product_quantity = ?";
    $params[] = intval($product_quantity);
    $types .= "i";
}
if (!empty($product_category)) {
    $fields[] = "product_category = ?";
    $params[] = $product_category;
    $types .= "s";
}
if (!empty($product_discount)) {
    $fields[] = "product_discount = ?";
    $params[] = intval($product_discount);
    $types .= "i";
}
if (!empty($image_url)) {
    $fields[] = "image_url = ?";
    $params[] = $image_url;
    $types .= "s";
}

if (count($fields) > 0) {
    $params[] = $product_id;
    $types .= "i";
    
    $query = "UPDATE products SET " . implode(", ", $fields) . " WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);
    
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
} else {
    echo "Brak danych do zaktualizowania.";
    $conn->close();
    header("Location: ../admin.php");
    exit();
}
?>
<?php include('../components/footer.php'); ?>