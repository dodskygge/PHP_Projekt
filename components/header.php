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
    if (!isset($_SESSION)) {
        session_start();
    }
    //DB conn
    include('../includes/db_conn.php');
    //session checker
    require('../includes/session_check.php');
    //admin checker
    require('../includes/admin_check.php');
    ?>
    
    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="header">
        <div class="container-fluid">
            <!-- BRAND -->
            <a class="navbar-brand font-weight-bold" href="/" id="logo">ChipCom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Rozwiń menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto d-flex">
                    <li class="nav-item <?php if($current_page == 'index.php') echo 'active'; ?>">
                        <a class="nav-link" href="/">Strona główna</a>
                    </li>
                    <li class="nav-item dropdown <?php if($current_page == 'shop.php') echo 'active'; ?>">
                        <a class="nav-link " id="navbardrop" data-toggle="dropdown">Sklep</a>

                        <!-- SHOP_BREAKDOWN -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/shop.php?category=special">Oferty specjalne</a>
                            <a class="dropdown-item " href="/shop.php?category=all">Wszystkie</a>
                            <a class="dropdown-item " href="/shop.php?category=computers">Komputery</a>
                            <a class="dropdown-item " href="/shop.php?category=laptops">Laptopy</a>
                            <a class="dropdown-item " href="/shop.php?category=accessories">Akcesoria</a>
                        </div>
                    </li>
                </ul>

                <!--CLOCK-->
                <button id="clock" class="btn-secondary text-center"></div>


                <!--BUTTONS-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button onclick="window.location.href='/search.php'" class="btn btn-outline-light m-1"
                                type="button" data-target="#searchBar"><i class="fas fa-search"></i>Szukaj</button>
                    </li>
                    <!--CART-->
                    <li class="nav-item">
                        <button onclick="window.location.href='/mycart.php'" class="btn btn-outline-light m-1" type="button">
                            <i class="fas fa-shopping-cart"></i>
                            Koszyk
                            <span class="badge bg-dark text-white rounded-pill">
                                <?php if ($sessionChecker) {
                                            $query = "SELECT COUNT(*) FROM carts WHERE cart_user_id = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param("i", $_SESSION['userid']);
                                            $stmt->execute();
                                            $stmt->bind_result($cart_count);
                                            $stmt->fetch();
                                            echo $cart_count;
                                            $stmt->close();
                                        } else {
                                            echo '0';
                                        }
                                ?>
                            </span>
                        </button>
                        <!-- PRZYCISKI -->
                        <?php
                        if($adminChecker == true) {
                            echo '<li class="nav-item"><button onclick="window.location.href=\'/admin.php\'" class="btn btn-warning navbar-btn m-1"><i class="fas fa-user"></i> Admin</button></li>';
                        }

                        if ($sessionChecker) {
                            echo '<li class="nav-item"><button onclick="window.location.href=\'/myaccount.php\'" class="btn btn-primary navbar-btn m-1"><i class="fas fa-user"></i> Moje konto</button></li>';
                            echo '<li class="nav-item"><button onclick="window.location.href=\'/logout.php\'" class="btn btn-danger navbar-btn m-1"><i class="fas fa-sign-out-alt"></i> Wyloguj</button></li>';
                        } else {
                            echo '<li class="nav-item"><button onclick="window.location.href=\'/signup.php\'" class="btn btn-primary navbar-btn m-1"><i class="fas fa-user"></i> Sign Up</button></li>';
                            echo '<li class="nav-item"><button onclick="window.location.href=\'/login.php\'" class="btn btn-success navbar-btn m-1"><i class="fas fa-sign-in-alt"></i> Login</button></li>';
                        }
                        ?>

                </ul>
            </div>
        </div>
    </nav>