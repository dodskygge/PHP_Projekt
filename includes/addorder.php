<?php include('../components/header.php'); ?>
<?php
    if($sessionChecker == false){
        echo 'Musisz być zalogowany, aby dodawać do koszyka';
        exit();
    }

    //Zmienne
    $user_id = $_SESSION['userid'];
    $order_adress = $_POST['order_adress'];
    $order_product = "";
    $order_total = 0;
    $date = date("Y-m-d H:i:s");
    $order_status = "Zamówienie złożone";
    $order_products_id = "";
    $order_payment = $_POST['order_payment'];

    //Pobranie koszyka
    $query = "SELECT carts.cart_id, carts.cart_product_id, carts.cart_quantity, carts.cart_total, products.product_name, products.product_price
            FROM carts
            JOIN products ON carts.cart_product_id = products.product_id WHERE cart_user_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    //Przypisanie wartości do zmiennych
    if ($result->num_rows > 0) {
        //Jeśli są produkty w koszyku to realizuj zamówienie
        while($row = $result->fetch_assoc()) {
            $order_product .= $row['product_name'] . " x" . $row['cart_quantity'] . ", ";
            $order_total += $row['cart_total'];
            for($i = 0; $i < $row['cart_quantity']; $i++) {
                $order_products_id .= strval($row['cart_product_id']) . ",";
            }
        }

        //INSERT
        $query = "INSERT INTO orders (order_user_id, order_adress, order_products, order_products_id, order_total, order_payment , order_status, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isssdsss", $user_id, $order_adress, $order_product, $order_products_id, $order_total,$order_payment, $order_status, $date);

    } else {
        // Jeśli brak produktów w koszyku to wyjdź
        echo "Brak produktów w koszyku. Dodaj produkty do koszyka, aby złożyć zamówienie.";
        sleep(2);
        header("Location: ../mycart.php");
        exit();
    }


    if ($stmt->execute()) {
        //Jeśli zamówienie zrealizowane to usuń produkty z koszyka
        $query = "DELETE FROM carts WHERE cart_user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    sleep(2);
    header("Location: ../mycart.php");
    exit();
?>
<?php include('../components/footer.php'); ?>