<?php include('../components/header.php'); ?>

<!-- REALIZACJA ZAMÓWIEŃ -->
<section class="py-4">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <h2 class="text-center">Realizacja zamówień</h2>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produkty</th>
                                <th>Adres dostawy</th>
                                <th>Do zapłaty</th>
                                <th>Status</th>
                                <th>Data zamówienia</th>
                                <th>Operacje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //CZY ZALOGOWANY
                            if($sessionChecker == false && $adminChecker == false){
                                echo '<tr><td colspan="6" class="text-center">Musisz być zalogowany jako admin, aby zobaczyć zawartość.</td></tr>';
                                exit();

                            } else {
                                //JEŚLI ZALOGOWANY
                                $sql = "SELECT * FROM orders";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $counter++; ?></th>
                                            <td><?php echo $row['order_products']; ?></td>
                                            <td><?php echo $row['order_adress']; ?></td>
                                            <td><?php echo $row['order_total']; ?></td>
                                            <td><?php echo $row['order_status']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td>
                                                <form action="includes/completeorder.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <input type="submit" value="Zrealizowane"></form>

                                                <form action="includes/notcompleteorder.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <input type="submit" value="W trakcie realizacji"></form>

                                                <form action="includes/removeorder.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <input type="submit" value="Usuń"></form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Brak aktywnych zamówień.</td>
                                    </tr>
                                    <?php
                                }
                            }  
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- UŻYTKOWNICY -->
<section class="py-4">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <h2 class="text-center">Użytkownicy</h2>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nazwa</th>
                                <th>Email</th>
                                <th>Rola</th>
                                <th>Wygaśnięcie tokenu</th>
                                <th>Operacje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //CZY ZALOGOWANY
                            if($sessionChecker == false && $adminChecker == false){
                                echo '<tr><td colspan="6" class="text-center">Musisz być zalogowany jako admin, aby zobaczyć zawartość.</td></tr>';
                                exit();

                            } else {
                                //JEŚLI ZALOGOWANY
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $counter++; ?></th>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['user_email']; ?></td>
                                            <td><?php echo $row['user_role']; ?></td>
                                            <td><?php echo $row['user_token_expiry']; ?></td>
                                            <td>
                                                <form action="includes/addadmin.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <input type="submit" value="Nadaj admina"></form>

                                                <form action="includes/revokeadmin.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <input type="submit" value="Usuń admina"></form>

                                                <form action="includes/removeuser.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <input type="submit" value="Usuń konto"></form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Brak użytkowników.</td>
                                    </tr>
                                    <?php
                                }
                            }  
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUKTY -->
<section class="py-4">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <h2 class="text-center">Produkty</h2>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nazwa</th>
                                <th>Cena</th>
                                <th>Ilość</th>
                                <th>Kategoria</th>
                                <th>Operacje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //CZY ZALOGOWANY
                            if($sessionChecker == false && $adminChecker == false){
                                echo '<tr><td colspan="6" class="text-center">Musisz być zalogowany jako admin, aby zobaczyć zawartość.</td></tr>';
                                exit();

                            } else {
                                //JEŚLI ZALOGOWANY
                                $sql = "SELECT * FROM products";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $counter++; ?></th>
                                            <td><?php echo $row['product_id']; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['product_price']; ?></td>
                                            <td><?php echo $row['product_quantity']; ?></td>
                                            <td><?php echo $row['product_category']; ?></td>
                                            <td>
                                                <form action="includes/increment_quantity.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                                <input type="submit" value="Ilość + 1"></form>

                                                <form action="includes/decrease_quantity.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                                <input type="submit" value="Ilość - 1"></form>

                                                <form action="includes/remove_product.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                                <input type="submit" value="Usuń produkt"></form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Brak produktów.</td>
                                    </tr>
                                    <?php
                                }
                            }  
                            ?>
                        </tbody>
                    </table>
                    <div class="container text-center">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <p class="text-center">Dodaj produkt do bazy:</p>
                                    <form action="includes/addproduct.php" method="post" class="form-addorder text-center" id="FormAddOrder">
                                        <p class="mt-2 mb-0">Nazwa: </p><input type="text" name="product_name" value="">
                                        <p class="mt-2 mb-0">Koszt (z przeceną): </p><input type="text" name="product_price" value="">
                                        <p class="mt-2 mb-0">Ilość: </p><input type="text" name="product_quantity" value="">
                                        <p class="mt-2 mb-0">Kategoria: </p><input type="text" name="product_category" value="">
                                        <p class="mt-2 mb-0">Przecenione</p><input type="radio" name="product_discount" value="1">
                                        <p class="mt-2 mb-0">Brak przeceny</p><input type="radio" name="product_discount" value="0">
                                        <p class="mt-2 mb-0">img-url (img/nazwa_pliku.png): </p><input type="text" name="image_url" value=""><br>
                                        <input class="btn btn-sm btn-success mt-2" type="submit" value="Dodaj">
                                    </form>
                                        
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../components/footer.php'); ?>