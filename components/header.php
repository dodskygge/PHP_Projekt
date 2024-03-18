<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChipCom - sklep z elektroniką</title>
    <link rel="stylesheet" href="/lib/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/global_style.css">
</head>

<body>

    <?php
    // Pobierz bieżącą ścieżkę
    $current_page = basename($_SERVER['PHP_SELF']);
    //Start sesji
    session_start();
    ?>

    <!-- HEADER MENU -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="header">
        <div class="container-fluid">
            <!-- Brand i przycisk "hamburger" dla urządzeń mobilnych -->
            <a class="navbar-brand font-weight-bold" href="/" id="logo">ChipCom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Rozwiń menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementy menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto d-flex">
                    <li class="nav-item <?php if($current_page == 'index.php') echo 'active'; ?>">
                        <a class="nav-link" href="/">Strona główna</a>
                    </li>
                    <li class="nav-item dropdown <?php if($current_page == 'shop.php') echo 'active'; ?>">
                        <a class="nav-link " id="navbardrop" data-toggle="dropdown">Sklep</a>

                        <!-- Shop dropdown -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/shop.php?category=special">Oferty specjalne</a>
                            <a class="dropdown-item " href="/shop.php?category=all">Wszystkie</a>
                            <a class="dropdown-item " href="/shop.php?category=computers">Komputery</a>
                            <a class="dropdown-item " href="/shop.php?category=laptops">Laptopy</a>
                            <a class="dropdown-item " href="/shop.php?category=microcontrollers">Mikrokontrolery</a>
                        </div>

                    </li>

                    <li class="nav-item <?php if($current_page == 'aboutus.php') echo 'active'; ?>">
                        <a class="nav-link" href="/aboutus.php">O nas</a>
                    </li>

                    <li class="nav-item <?php if($current_page == 'contact.php') echo 'active'; ?>">
                        <a class="nav-link" href="/contact.php">Kontakt</a>
                    </li>
                </ul>

                <!--Przyciski-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button onclick="window.location.href='/search.php'" class="btn btn-outline-light m-1"
                            type="button" data-toggle="collapse" data-target="#searchBar"><i
                                class="fas fa-search"></i>Szukaj</button>
                    </li>
                    <!--Koszyk-->
                    <li class="nav-item dropdown">
                        <button class="btn btn-outline-light dropdown-toggle m-1" type="button" data-toggle="dropdown"
                            data-target="#cartMenu">
                            <i class="fas fa-shopping-cart"></i>
                            Koszyk
                            <span class="badge bg-dark text-white rounded-pill">0</span>
                        </button>
                        <div class="dropdown-menu cart-menu" >
                            <!-- Tutaj dodaj elementy menu koszyka -->
                            <!-- Na przykład: -->
                            <a class="dropdown-item" href="#">Produkt 1</a>
                            <a class="dropdown-item" href="#">Produkt 2</a>
                            <a class="dropdown-item" href="#">Produkt 3</a>
                            <a class="dropdown-item" href="#">Produkt 4</a>
                            <button onclick="window.location.href='/mycart.php'"
                                class="btn btn-outline-dark d-block mx-auto mt-3"><i class="fas fa-shopping-cart"></i>&nbsp;Przejdź do koszyka</button>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button onclick="window.location.href='/signup.php'" class="btn btn-primary navbar-btn m-1"><i
                                class="fas fa-user"></i> Sign Up</button>
                    </li>
                    <li class="nav-item">
                        <button onclick="window.location.href='/login.php'"
                            class="btn btn-success navbar-btn m-1"><i class="fas fa-sign-in-alt"></i> Login</button>
                    </li>
                </ul>
            </div>
        </div>


    </nav>

