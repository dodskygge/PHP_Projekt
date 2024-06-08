<?php include('../components/header.php'); ?>

<section class="py-4">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produkt</th>
                                <th>Zdjęcie</th>
                                <th>Ilość</th>
                                <th>Cena</th>
                                <th>Usuń</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //CZY ZALOGOWANY
                            if($sessionChecker == false){
                                echo '<tr><td colspan="4" class="text-center">Musisz być zalogowany, aby zobaczyć zawartość koszyka.</td></tr>';
                                exit();

                            } else {
                                //JEŚLI ZALOGOWANY

                                $sql = "SELECT carts.cart_id, carts.cart_product_id, carts.cart_quantity, carts.cart_total, products.product_name, products.product_price, products.image_url
                                        FROM carts
                                        JOIN products ON carts.cart_product_id = products.product_id WHERE cart_user_id = ".$_SESSION['userid'].";";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $counter++; ?></th>
                                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Product Image" style="max-height: 100px; object-fit: contain;" class="img-fluid">
                                            </td>
                                            <td><?php echo number_format($row['cart_quantity']); ?></td>
                                            <td><?php echo htmlspecialchars($row['product_price']); ?></td>
                                            <td>
                                                <form action="includes/removefromcart.php" method="post" class="form-cart" id="FormCart">
                                                <input type="hidden" name="product_id" value="<?php echo $row['cart_product_id']; ?>">
                                                <input type="submit" value="Usuń"></form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Brak produktów w koszyku.</td>
                                    </tr>
                                    <?php
                                }
                            }  
                            ?>
                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                            <?php
                                    $totalcost = 0;
                                    $stmt = $conn->prepare("SELECT SUM(cart_total) AS total_cart_total FROM carts;");
                                    $stmt->execute();
                                    $stmt->bind_result($totalcost);
                                    $stmt->fetch();
                                    $stmt->close();
                                ?>
                                <p class="text-center">Koszt całkowity: <?php echo number_format($totalcost); ?> zł</p>
                                <form action="includes/addorder.php" method="post" class="form-addorder text-center" id="FormAddOrder">
                                    <input class="btn btn-sm btn-success" type="submit" value="Kup Teraz"><br>
                                    <p class="mt-2 mb-0">Adres: </p><input type="text" name="order_adress" value="">
                                    <p class="mt-2 mb-0">Płatność przy odbiorze</p>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../components/footer.php'); $conn->close(); ?>
