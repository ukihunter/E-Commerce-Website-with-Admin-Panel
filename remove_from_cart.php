<?php
session_start();

// Ensure product ID is passed
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Loop through the cart and remove the item with the given ID
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    
    // Reindex the cart array to avoid gaps in the session data
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>
