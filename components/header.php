<!DOCTYPE html>
<html lang="pl">

<!-- Do zrobienia:
1. Nav-item admin panel
2. Koszyk do przerobienia
3. Przycisk hamburger do przerobienia wygląd
-->

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
    
<?php
// Pobierz bieżącą ścieżkę
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- HEADER MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="header">
        <div class="d-flex justify-content-center container-fluid">
            <!-- Brand i przycisk "hamburger" dla urządzeń mobilnych -->
            <a class="navbar-brand font-weight-bold" href="/" id="logo">ChipCom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Rozwiń menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementy menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav">
                    <li class="nav-item mx-auto <?php if($current_page == 'index.php') echo 'active'; ?>">
                        <a class="nav-link" href="/">Strona główna</a>
                    </li>
                    <li class="nav-item dropdown mx-auto <?php if($current_page == 'shop.php') echo 'active'; ?>">
                        <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Sklep</a>

                        <!-- Shop dropdown -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/shop.php?category=special">Oferty specjalne</a>
                            <a class="dropdown-item" href="/shop.php?category=all">Wszystkie</a>
                            <a class="dropdown-item" href="/shop.php?category=computers">Komputery</a>
                            <a class="dropdown-item" href="/shop.php?category=laptops">Laptopy</a>
                            <a class="dropdown-item" href="/shop.php?category=microcontrollers">Mikrokontrolery</a>
                        </div>

                    </li>
                    <li class="nav-item mx-auto <?php if($current_page == 'aboutus.php') echo 'active'; ?>">
                        <a class="nav-link" href="/aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item mx-auto <?php if($current_page == 'contact.php') echo 'active'; ?>">
                        <a class="nav-link" href="/contact.php">Kontakt</a>
                    </li>
                </ul>

                <!--Searchbar-->
                <div class="ml-2 collapse navbar-collapse" id="navbar-search">
                <button class="btn btn-outline-light mr-2" type="button" data-toggle="collapse" data-target="#searchBar">
                        <i class="fas fa-search"></i>
                        Szukaj
                    </button>

                    <div class="collapse" id="searchBar">
                        <div class="d-flex flex-row">
                            <input type="text" class="form-control" id="navbar-search-bar" placeholder="Szukaj...">
                            <button type="submit" class="btn btn-default mx-1">Szukaj</button>
                        </div>
                    </div>

                </div>
                

                <!--Przyciski-->
                <ul class="d-flex justify-content-center flex-row nav navbar-nav mx-auto">
                    <!--Koszyk-->
                    <li class="mx-1"><button class="btn btn-outline-light dropdown-toggle mr-2" type="button" data-toggle="dropdown" data-target="#cartMenu">
                        <i class="fas fa-shopping-cart"></i>
                        Koszyk
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                    </li>
                    <li class="mx-1"><button onclick="window.location.href='/signup.php'" class="btn btn-primary navbar-btn mr-2"><i class="fas fa-user"></i> Sign Up</button></li>
                    <li class="mx-1"><button onclick="window.location.href='/login.php'" class="btn btn-success navbar-btn"><i class="fas fa-sign-in-alt"></i> Login</button></li>
                </ul>
            </div>
        </div>
        
    <div class="">
        <div class="dropdown-menu" id="cartMenu">
                        <!-- Tutaj dodaj elementy menu koszyka -->
                        <!-- Na przykład: -->
                        <a class="dropdown-item" href="#">Produkt 1</a>
                        <a class="dropdown-item" href="#">Produkt 2</a>
                        <a class="dropdown-item" href="#">Produkt 3</a>
                        <a class="dropdown-item" href="#">Produkt 4</a>
        </div>
    </div>
</nav>