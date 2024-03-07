<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChipCom</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<!-- HEADER MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Brand i przycisk "hamburger" dla urządzeń mobilnych -->
            <a class="navbar-brand font-weight-bold" href="#">ChipCom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementy menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sklep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ml-auto">
                    <li><button class="btn btn-primary navbar-btn mr-2"><i class="fas fa-user"></i> Sign Up</button></li>
                    <li><button class="btn btn-success navbar-btn"><i class="fas fa-sign-in-alt"></i> Login</button></li>
                </ul>
            </div>
        </div>
    </nav>