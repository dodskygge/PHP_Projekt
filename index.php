<?php include('components/header.php'); ?>

        <!-- Shop container -->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                <!-- Skrypt wyświetlający poszczególne itemy -->
                <?php
                    require('includes/db_conn.php');
                   
                    $sql = "SELECT product_name, product_price, product_price, product_quantity, product_category, image_url FROM products";
                    $result = $conn->query($sql);

                    // Sprawdzenie, czy są dane w bazie
                    if ($result->num_rows > 0) {
                        // Iteracja przez wyniki zapytania
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="<?php echo $row['image_url']; ?>" alt="Product Image" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><?php echo $row['product_name']; ?></h5>
                                            <!-- Product price-->
                                            $<?php echo $row['min_price']; ?> - $<?php echo $row['max_price']; ?>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No products found in the database.";
                    }

                    // Zamknięcie połączenia z bazą danych
                    $conn->close();
                    ?>


                </div>
            </div>
        </section>

<?php include('components/footer.php'); ?>