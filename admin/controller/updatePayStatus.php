<?php

    include_once "../config/dbconnect.php";
   
    // Retrieve order_id from POST request
    $order_id = $_POST['record']; 
    
    // Sanitize the input to prevent SQL injection
    $order_id = mysqli_real_escape_string($conn, $order_id);
    
    // Query to check the order status
    $sql = "SELECT pay_status FROM orders WHERE id='$order_id'"; 
    $result = $conn->query($sql);
    
    // Check if the query was successful
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Toggle order status
        if ($row["pay_status"] == 0) {
            $update = mysqli_query($conn, "UPDATE orders SET pay_status=1 WHERE id='$order_id'");
        } else if ($row["pay_status"] == 1) {
            $update = mysqli_query($conn, "UPDATE orders SET pay_status=0 WHERE id='$order_id'");
        }
        
        // Optionally check if update was successful
        // if ($update) {
        //     echo "success";
        // } else {
        //     echo "error";
        // }
    } else {
        echo "No such order found.";
    }
    
?>
