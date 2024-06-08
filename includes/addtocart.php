<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany, aby dodawać do koszyka';
        exit();
    }

    $user_id = $_SESSION['userid'];
    $product_id = intval($_POST['product_id']);
    $product_price = 0;
    $total = 0;
    $quantity = 1;

    // Koszt produktu
    $query = "SELECT product_price FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->bind_result($product_price);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();

    // Czy juz jest w koszyku
    $query = "SELECT * FROM carts WHERE cart_user_id = ? AND cart_product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Jesli jest w koszyku, zwieksz ilosc
        $quantity = 1 + $row['cart_quantity'];
        $total = $product_price * $quantity;
        $query = "UPDATE carts SET cart_quantity = cart_quantity + 1, cart_total = ? WHERE cart_user_id = ? AND cart_product_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $total ,$user_id, $product_id);
    } else {
        // Jesli nie ma w koszyku, dodaj
        $total = $product_price;
        $query = "INSERT INTO carts (cart_user_id, cart_product_id, cart_quantity, cart_total) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiid", $user_id, $product_id, $quantity, $total);
    }

    if ($stmt->execute()) {
        echo "Produkt dodany pomyślnie." . $product_id . "";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: ../shop.php?category=all");
    exit();
?>
<?php include('../components/footer.php'); ?>