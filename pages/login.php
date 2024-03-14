<?php include('../components/header.php'); ?>
<?php include('../api/loginapi.php'); ?>

<div class="container-fluid">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card-dark">
                <div class="card-header">
                    Logowanie
                </div>
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Login:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../components/footer.php'); ?>