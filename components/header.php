<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChipCom - sklep z elektroniką</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/global_style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>

<!-- HEADER MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="header">
        <div class="container-fluid">
            <!-- Brand i przycisk "hamburger" dla urządzeń mobilnych -->
            <a class="navbar-brand font-weight-bold" href="#" id="logo">ChipCom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Rozwiń menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementy menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav">
                    <li class="nav-item active mx-auto">
                        <a class="nav-link" href="#">Strona główna</a>
                    </li>
                    <li class="nav-item mx-auto">
                        <a class="nav-link" href="#">Sklep</a>
                    </li>
                    <li class="nav-item mx-auto">
                        <a class="nav-link" href="#">O nas</a>
                    </li>
                    <li class="nav-item mx-auto">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                </ul>

                <!--Searchbar-->
                <div class="d-flex ml-2 mr-2 collapse navbar-collapse" id="navbar-search">
                <button class="btn btn-outline-light mr-2" type="button" data-toggle="collapse" data-target="#searchBar">
                        <i class="fas fa-search"></i>
                        Szukaj
                    </button>

                    <div class="collapse" id="searchBar">
                        <input type="text" class="form-control mr-2 mx-auto" id="navbar-search-bar" placeholder="Szukaj...">
                        <button type="submit" class="btn btn-default mx-auto">Szukaj</button>
                    </div>

                </div>
                

                <!--Przyciski-->
                <ul class="nav navbar-nav ml-auto">
                    <li><button class="btn btn-outline-light mr-2" type="button" data-toggle="collapse" data-target="#cartMenu">
                        <i class="fas fa-shopping-cart"></i>
                        Koszyk
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>

                    <div class="collapse" id="cartMenu">
                        <!-- Tutaj dodaj elementy menu koszyka -->
                        <!-- Na przykład: -->
                        <a class="dropdown-item" href="#">Produkt 1</a>
                        <!-- <a class="dropdown-item" href="#">Produkt 2</a> -->
                    </div>

                    </li>
                    <li><button class="btn btn-primary navbar-btn mr-2"><i class="fas fa-user"></i> Sign Up</button></li>
                    <li><button onclick="window.location.href='/login.php'" class="btn btn-success navbar-btn"><i class="fas fa-sign-in-alt"></i> Login</button></li>
                </ul>
            </div>
        </div>
    </nav>