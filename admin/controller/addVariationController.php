<?php
  include_once "../config/dbconnect.php";
  
  if(isset($_POST['upload'])) {
      // Fetch data from the form
      $product = $_POST['product']; // product_id
      $size = $_POST['size']; // size_id
      $qty = $_POST['qty']; // Stock Quantity

      // Insert data into product_size_variation table
      $insert = mysqli_query($conn, "INSERT INTO product_size_variation (product_id, size_id, quantity_in_stock) VALUES ('$product', '$size', '$qty')");
      
      if(!$insert) {
          // If insertion fails, show error message
          echo mysqli_error($conn);
          header("Location: ../index.php?variation=error");
      } else {
          // If insertion is successful, redirect with success message
          echo "Records added successfully.";
          header("Location: ../index.php?variation=success");
      }
  }
?>
