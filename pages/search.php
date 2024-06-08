<?php include('../components/header.php'); ?>

<div class="container-fluid">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="card-dark">
                <div class="card-body">
                    <form action="search.php" method="POST">
                        <div class="form-group form">
                            <input type="text" class="form-control" id="prompt" name="prompt" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-4">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row gx-2 gx-lg-4 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz wpisany tekst z formularza
    $prompt = $_POST['prompt'];

    // SQL
    $sql = "SELECT * FROM products WHERE product_name LIKE '%" . $prompt . "%'";
    $result = $conn->query($sql);

    // Wyświetl wyniki
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
                        <div class="col mb-3">
                            <div class="card h-100">
                                <img class="card-img-top img-fluid" src="<?php echo $row['image_url']; ?>" style="max-height: 150px; object-fit: contain;" alt="Product Image" />
                                
                                <div class="card-body p-2">
                                    <div class="text-center">
                                        <h6 class="fw-bolder"><?php echo $row['product_name']; ?></h6>
                                        <p class="text-dark">Cena: <?php echo $row['product_price']; ?> zł <br> Ilość: <?php echo $row['product_quantity']; ?></p>
                                    </div>
                                </div>
    
                                <div class="d-flex justify-content-around gap-2 card-footer p-2 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-sm btn-outline-dark mt-auto" href="#">Do koszyka</a></div>
                                </div>
                            </div>
                        </div>
            <?php
        }
    } else {
        echo "Brak wyników";
    }
    $conn->close();
}
?>

        </div>
    </div> 
</section>

<?php include('../components/footer.php'); ?>
