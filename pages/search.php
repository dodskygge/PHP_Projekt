<?php include('../components/header.php'); ?>

<div class="container-fluid">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="card-dark">
                <div class="card-body">
                    <form action="search.php" method="POST">
                        <div class="form-group form">
                            <input type="text" class="form-control" id="prompt" name="prompt"  required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Szukaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../components/footer.php'); ?>