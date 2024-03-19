<?php include('../components/header.php'); ?>

        <section class="py-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php //SCRIPT SHOP
                        require('../includes/db_conn.php');
                    
                        $sql = "SELECT product_name, product_price, product_quantity, product_category, image_url FROM products";
                        $result = $conn->query($sql);

                        // Sprawdzenie, czy są dane w bazie
                        if ($result->num_rows > 0) {
                            // Iteracja przez wyniki zapytania
                            while($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        
                                        <img class="card-img-top" style="height: 250px;" src="<?php echo $row['image_url']; ?>" alt="Product Image" />
                                        
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                
                                                <h5 class="fw-bolder"><?php echo $row['product_name']; ?></h5>
                                                
                                                <p class="text-dark">Cena: <?php echo $row['product_price']; ?> zł &nbsp; Ilosć: <?php echo $row['product_quantity']; ?></p>
                                            </div>
                                        </div>
        
                                        <div class="d-flex justify-content-around gap-3 card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Do koszyka</a></div>
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Zobacz opis</a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "Błąd 500 - Brak produktów w bazie danych.";
                        }
                        $conn->close();
                    ?>
                </div>
            </div>
        </section>

<?php include('../components/footer.php'); ?>