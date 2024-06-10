<?php include('../components/header.php');

//CZY ZALOGOWANY
if($sessionChecker == false && $adminChecker == false){
    header("Location: ../index.php");
    exit();

} else {

?>
<!-- REALIZACJA ZAMÓWIEŃ -->
<section class="py-4" id="zamowienia">



    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-primary scroll-button font-weight-bold" data-target="#zamowienia">Zamówienia</button>
                <button class="btn btn-success scroll-button font-weight-bold" data-target="#uzytkownicy">Użytkownicy</button>
                <button class="btn btn-success scroll-button font-weight-bold" data-target="#produkty">Produkty</button>
                <button class="btn btn-success scroll-button font-weight-bold" data-target="#dodajprodukt">Dodaj produkt</button>
                <button class="btn btn-success scroll-button font-weight-bold" data-target="#modyfikujprodukt">Modyfikuj produkt</button>
            </div>
        </div>
    </div>

    <div class="container-fluid px-2 px-lg-4 mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <h2 class="text-center font-weight-bold">Realizacja zamówień</h2>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produkty</th>
                                <th>Adres dostawy</th>
                                <th>Do zapłaty</th>
                                <th>Płatność</th>
                                <th>Status</th>
                                <th>Data zamówienia</th>
                                <th>Operacje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //JEŚLI ZALOGOWANY
                                $sql = "SELECT * FROM orders";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while($row = $result->fetch_assoc()) {
                                        $order_status = strval($row['order_status']);

                                        if($order_status == 'Zamówienie zrealizowane') {
                                            $button1 = 'disabled';
                                            $button2 = '';
                                        } elseif($order_status == 'Zamówienie w trakcie realizacji') {
                                            $button1 = '';
                                            $button2 = 'disabled';
                                        } else {
                                            $button1 = '';
                                            $button2 = '';
                                        }

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $counter++; ?></th>
                                            <td><?php echo $row['order_products']; ?></td>
                                            <td><?php echo $row['order_adress']; ?></td>
                                            <td><?php echo $row['order_total']; ?></td>
                                            <td><?php echo $row['order_payment']; ?></td>
                                            <td><?php echo $row['order_status']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td>
                                                <form action="includes/completeorder.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <input type="submit" value="Zrealizowane" <?php echo strval($button1) ?>></form>

                                                <form action="includes/notcompleteorder.php" method="post" class="form-order" id="FormOrder">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <input type="submit" value="W trakcie realizacji" <?php echo strval($button2) ?>></form>

                                                <form action="includes/removeorder.php" method="post" class="form-order" id="FormOrder" onsubmit="return confirm('Czy na pewno chcesz usunąć zamówienie?')">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <input type="submit" value="Usuń"></form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Brak aktywnych zamówień.</td>
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
<section class="py-4" id="uzytkownicy">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <h2 class="text-center font-weight-bold">Użytkownicy</h2>
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
                                echo '<tr><td colspan="8" class="text-center">Musisz być zalogowany jako admin, aby zobaczyć zawartość.</td></tr>';
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

                                                <form action="includes/revokeadmin.php" method="post" class="form-order" id="FormOrder" onsubmit="return confirm('Czy na pewno chcesz usunąć admina?')">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <input type="submit" value="Usuń admina"></form>

                                                <form action="includes/removeuser.php" method="post" class="form-order" id="FormOrder" onsubmit="return confirm('Czy na pewno chcesz usunąć użytkownika?')">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <input type="submit" value="Usuń konto"></form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Brak użytkowników.</td>
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
<section class="py-4" id="produkty">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                <table class="table table-striped">
                <h2 class="text-center font-weight-bold">Produkty</h2>
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
                        if ($sessionChecker == false && $adminChecker == false) {
                            echo '<tr><td colspan="6" class="text-center">Musisz być zalogowany jako admin, aby zobaczyć zawartość.</td></tr>';
                            exit();
                        } else {
                            // Paginacja
                            $limit = 6; // ilość rekordów na stronę
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($page - 1) * $limit;

                            // Zapytanie SQL z limit i offset
                            $sql = "SELECT * FROM products LIMIT $limit OFFSET $offset";
                            $result = $conn->query($sql);

                            // Zliczanie całkowitej liczby rekordów
                            $count_sql = "SELECT COUNT(*) AS total FROM products";
                            $count_result = $conn->query($count_sql);
                            $total = $count_result->fetch_assoc()['total'];
                            $total_pages = ceil($total / $limit);

                            if ($result->num_rows > 0) {
                                $counter = $offset + 1;
                                while ($row = $result->fetch_assoc()) {
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

                                            <form action="includes/remove_product.php" method="post" class="form-order" id="FormOrder" onsubmit="return confirm('Czy na pewno chcesz usunąć produkt?')">
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                            <input type="submit" value="Usuń produkt"></form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7" class="text-center">Brak produktów.</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Paginacja -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>


                <!--FORMULARZ Dodaj produkt -->
                <div class="container text-center mt-5" id="dodajprodukt">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h2 class="text-center font-weight-bold">Dodaj produkt do bazy:</h2>
                            <form action="includes/addproduct.php" method="post" class="form-addorder text-center" id="FormAddOrder">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Nazwa: </p>
                                        <input type="text" name="product_name" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Koszt (z przeceną): </p>
                                        <input type="text" name="product_price" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Ilość: </p>
                                        <input type="text" name="product_quantity" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Kategoria: </p>
                                        <select class="form-control" name="product_category" id="kolor">
                                            <option value="computers">Komputer</option>
                                            <option value="laptops">Laptop</option>
                                            <option value="accessories">Akcesoria</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Przecenione</p>
                                        <input type="radio" name="product_discount" value="1">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Brak przeceny</p>
                                        <input type="radio" name="product_discount" value="0">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <p class="mt-2 mb-0">img-url (nazwa_pliku.png): </p>
                                        <input type="text" name="image_url" class="form-control" value="">
                                    </div>
                                </div>
                                <input class="btn btn-sm btn-success mt-3" type="submit" value="Dodaj">
                            </form>
                        </div>
                    </div>
                </div>

                <!--FORMULARZ Modyfikuj produkt -->
                <div class="container text-center mt-5" id="modyfikujprodukt">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h2 class="text-center font-weight-bold">Modyfikuj produkt:</h2>
                            <p>Pole pozostawione puste nie zmieni wartości w bazie. Pole ID jest wymagane!</p>
                            <form action="includes/modifyproduct.php" method="post" class="form-addorder text-center" id="FormAddOrder">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <p class="mt-2 mb-0">ID*: </p>
                                        <input type="text" name="product_id" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mt-2 mb-0">Nazwa: </p>
                                        <input type="text" name="product_name" class="form-control" value="">
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mt-2 mb-0">Koszt (z przeceną): </p>
                                        <input type="text" name="product_price" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Ilość: </p>
                                        <input type="text" name="product_quantity" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Kategoria: </p>
                                        <select class="form-control" name="product_category" id="kolor">
                                            <option value="computers">Komputer</option>
                                            <option value="laptops">Laptop</option>
                                            <option value="accessories">Akcesoria</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Przecenione</p>
                                        <input type="radio" name="product_discount" value="1">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-2 mb-0">Brak przeceny</p>
                                        <input type="radio" name="product_discount" value="0">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <p class="mt-2 mb-0">img-url (nazwa_pliku.png): </p>
                                        <input type="text" name="image_url" class="form-control" value="">
                                    </div>
                                </div>
                                <input class="btn btn-sm btn-success mt-3" type="submit" value="Modyfikuj">
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