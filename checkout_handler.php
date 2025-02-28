<?php
// Start session to access cart data
session_start();
include 'db.php';  // Ensure db.php is included for the database connection

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $customerName = htmlspecialchars(trim($_POST['customer_name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $contact = htmlspecialchars(trim($_POST['contact']));  // Fixed: $contact (correct variable name)
    
    // Validate inputs
    if (empty($customerName) || empty($address) || empty($contact)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: cart_page.php"); // Replace with your cart page
        exit;
    }

    // Ensure the cart is not empty
    if (empty($_SESSION['cart'])) {
        $_SESSION['error'] = "Your cart is empty.";
        header("Location: cart_page.php");
        exit;
    }

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert order into the orders table
        $orderSql = "INSERT INTO orders (customer_name, address, contact, order_date, total_price) 
                     VALUES (?, ?, ?, NOW(), ?)";
        $stmt = mysqli_prepare($conn, $orderSql);
        
        // Calculate total price from cart
        $totalPrice = array_sum(array_column($_SESSION['cart'], 'price'));
        
        // Bind parameters for order insertion
        mysqli_stmt_bind_param($stmt, 'sssd', $customerName, $address, $contact, $totalPrice);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error executing order insert: " . mysqli_error($conn));
        }

        // Get the last inserted order ID
        $orderId = mysqli_insert_id($conn);

        // Insert each cart item into the order_items table
        $orderItemSql = "INSERT INTO order_items (order_id, product_name, size, quantity, price, image) 
                         VALUES (?, ?, ?, ?, ?, ?)";
        $itemStmt = mysqli_prepare($conn, $orderItemSql);

        foreach ($_SESSION['cart'] as $item) {
            // Bind parameters for each cart item insertion
            mysqli_stmt_bind_param($itemStmt, 'issdis', $orderId, $item['name'], $item['size'], 
                                   $item['quantity'], $item['price'], $item['image']);
            if (!mysqli_stmt_execute($itemStmt)) {
                throw new Exception("Error executing item insert: " . mysqli_error($conn));
            }
        }

        // Commit the transaction
        mysqli_commit($conn);

        // Clear the cart
        unset($_SESSION['cart']);

        // Redirect to success page
        $_SESSION['success'] = "Your order has been placed successfully!";
        header("Location: index.php"); // Replace with your success page
        exit;

    } catch (Exception $e) {
        // Rollback the transaction in case of error
        mysqli_rollback($conn);

        // Set error message in session
        $_SESSION['error'] = "Failed to place order: " . $e->getMessage();
        header("Location: cart_page.php");
        exit;
    }
} else {
    // Invalid request
    $_SESSION['error'] = "Invalid request.";
    header("Location: cart_page.php");
    exit;
}
?>
