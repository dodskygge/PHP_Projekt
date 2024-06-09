<?php 
include('../components/header.php'); 

// Ustawienia paginacji
$items_per_page = 20;
$page = isset($_GET['page']) ? $_GET['page'] : 1; // aktualna strona
$offset = ($page - 1) * $items_per_page; // przesunięcie

?>

<section class="py-3">
    <?php
        $category = $_GET['category'];
        if($category == 'all') {
            $sql = "SELECT * FROM products LIMIT $items_per_page OFFSET $offset";
            $message = "Wszystkie produkty";
        } elseif($category == 'special') {
            $sql = "SELECT * FROM products WHERE product_discount > 0 LIMIT $items_per_page OFFSET $offset"; 
            $message = "Oferty specjalne";
        } elseif($category == 'computers') {
            $sql = "SELECT * FROM products WHERE product_category = 'computers' LIMIT $items_per_page OFFSET $offset";
            $message = "Komputery";
        } elseif($category == 'laptops') {
            $sql = "SELECT * FROM products WHERE product_category = 'laptops' LIMIT $items_per_page OFFSET $offset";
            $message = "Laptopy";
        } elseif($category == 'accessories') {
            $sql = "SELECT * FROM products WHERE product_category = 'accessories' LIMIT $items_per_page OFFSET $offset";
            $message = "Akcesoria";
        } else {
            $sql = "SELECT * FROM products LIMIT $items_per_page OFFSET $offset";
            $message = "Wszystkie produkty";
        }

        echo "<h1 class='text-center font-weight-bold mb-4 '>$message</h1>";
    ?>
    <div class="container-fluid px-2 px-lg-4">
        <div class="row gx-2 gx-lg-4 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
            <?php //SCRIPT SHOP
                require('../includes/db_conn.php');
            
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-3 mb-3">
                            <div class="card h-100">
                                <img class="card-img-top img-fluid" src="<?php echo $row['image_url']; ?>" style="max-height: 150px; object-fit: contain;" alt="Product Image" />
                                
                                <div class="card-body p-2">
                                    <div class="text-center">
                                        <h5 class="text-dark font-weight-bold"><?php echo $row['product_name']; ?></h5>
                                        <p class="text-dark "><b>Cena:</b> <?php echo $row['product_price']; ?> zł <br> <b>Ilość:</b> <?php echo $row['product_quantity']; ?></p>
                                    </div>
                                </div>
    
                                <div class="d-flex justify-content-around gap-2 card-footer p-2 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <form action="includes/addtocart.php" method="post" class="form-addcart" id="FormAddCart">
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                            <input type="hidden" name="page_category" value="<?php echo $category ?>">
                                            <input class="btn btn-primary mt-auto" type="submit" value="Do koszyka">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Błąd 500 - Brak produktów w bazie danych.";
                }
            
            ?>
        </div>
    </div>

    <!-- Paginacja -->
    <div class="text-center mt-4">
        <?php
            if($category == 'all') {
                $sql_total = "SELECT COUNT(*) AS total FROM products";
            } elseif($category == 'special') {
                $sql_total = "SELECT COUNT(*) AS total FROM products WHERE product_discount > 0";
            } elseif($category == 'computers') {
                $sql_total = "SELECT COUNT(*) AS total FROM products WHERE product_category = 'computers'";
            } elseif($category == 'laptops') {
                $sql_total = "SELECT COUNT(*) AS total FROM products WHERE product_category = 'laptops'";
            } elseif($category == 'accessories') {
                $sql_total = "SELECT COUNT(*) AS total FROM products WHERE product_category = 'accessories'";
            } else {
                $sql_total = "SELECT COUNT(*) AS total FROM products";
            }
            $result_total = $conn->query($sql_total);
            $row_total = $result_total->fetch_assoc();
            $total_pages = ceil($row_total['total'] / $items_per_page);

            if ($total_pages > 1) {
                echo "<nav aria-label='Page navigation'>";
                echo "<ul class='pagination justify-content-center'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='?category=$category&page=$i'>$i</a></li>";
                }
                echo "</ul>";
                echo "</nav>";
            }
            $conn->close();
        ?>
    </div>
</section>

<?php include('../components/footer.php'); ?>
