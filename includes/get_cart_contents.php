<?php

// Sprawdź czy istnieje zmienna sesyjna koszyka
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Inicjalizacja zmiennej do przechowywania HTML zawartości koszyka
    $cartContentHTML = '';



    // Iteracja po produktach w koszyku
    foreach($_SESSION['cart'] as $product) {
        // Generowanie wiersza dla każdego produktu
        $cartContentHTML .= '<a class="dropdown-item" href="#">'.$product['name'].'</a>';
    }

    // Wyświetlenie HTML zawartości koszyka
    echo $cartContentHTML;
} else {
    // Jeśli koszyk jest pusty, wyświetl odpowiedni komunikat
    echo '<a class="dropdown-item text-center" href="#">Koszyk pusty</a>';
}
?>
