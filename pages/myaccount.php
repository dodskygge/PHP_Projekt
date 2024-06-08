<?php include('../components/header.php'); ?>

<div class="container mt-5 bg-dark text-light p-5 rounded">
    <!-- Nagłówek -->
    <div class="jumbotron bg-secondary text-center text-light">
        <h1 class="display-5">Moje konto i zamówienia</h1>
    </div>

    <!-- Kontakt -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Dane konta:</h2>
            <ul class="list-unstyled">
            <?php
                //CZY ZALOGOWANY
                if($sessionChecker == false){
                    echo '<tr><td colspan="4" class="text-center">Musisz być zalogowany, aby zobaczyć swoje konto.</td></tr>';
                    exit();

                } else {

                    $sql = "SELECT * FROM users WHERE user_id = ".$_SESSION['userid'].";";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <li><strong>Nazwa użytkownika: </strong> <?php echo $row['user_name']; ?></li>
                                <li><strong>Email: </strong> <?php echo $row['user_email']; ?></li>
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
            </ul>
        </div>
    </div>
</div>


<section class="py-4">
    <div class="container-fluid px-2 px-lg-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produkty</th>
                                <th>Adres dostawy</th>
                                <th>Do zapłaty</th>
                                <th>Status</th>
                                <th>Data zamówienia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //CZY ZALOGOWANY
                            if($sessionChecker == false){
                                echo '<tr><td colspan="6" class="text-center">Musisz być zalogowany, aby zobaczyć swoje zamówienia.</td></tr>';
                                exit();

                            } else {
                                //JEŚLI ZALOGOWANY
                                $sql = "SELECT * FROM orders WHERE order_user_id = ".$_SESSION['userid'].";";
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

<?php include('../components/footer.php'); $conn->close(); ?>
