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
                    <div class="container text-center mt-5 jumbotron bg-dark" id="dodajprodukt">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h2 class="text-center font-weight-bold">Złóż zamówienie:</h2>
                                <form action="includes/addorder.php" method="post" class="form-addorder text-center" id="FormAddOrder" onsubmit="return confirm('Czy na pewno chcesz złożyć zamówienie?')">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <p class="mt-2 mb-0"><b>Pełny adres:</b></p>
                                            <input type="text" name="order_adress" class="form-control" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-md-12">
                                            <p class="mt-2 mb-0"><b>Sposób płatności:</b></p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="order_payment" id="delivery1" value="Osobiście">
                                                <label class="form-check-label" for="delivery1">
                                                    Odbiór osobity
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="order_payment" id="delivery2" value="Przelew">
                                                <label class="form-check-label" for="delivery2">
                                                    Płatność przelewem
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="order_payment" id="delivery3" value="Przy odbiorze">
                                                <label class="form-check-label" for="delivery3">
                                                    Płatność przy odbiorze
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="btn btn-sm btn-success mt-3" type="submit" value="Złóż zamówienie">
                                    <p class="mt-3"><b>Przelew należy zrealizować na rachunek: </b><br> 05 3214 2020 3320 4040 0020 1923 8832 </p>
                                    <p>Tytuł przelewu: Twoja nazwa użytkownika</p>
                                    <p>Do banku: ExtraSuperBank S.A</p>
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
