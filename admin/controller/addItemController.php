<?php
include_once "../config/dbconnect.php";

// Check if the form is submitted
if (isset($_POST['upload'])) {
    // Retrieve form data
    $ProductName = mysqli_real_escape_string($conn, $_POST['name']);
    $Brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $Description = mysqli_real_escape_string($conn, $_POST['description']);
    $Price = $_POST['price'];
    $Category = $_POST['category'];  // The selected category_id

    // Handle file upload
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $target_dir = "../uploads/";
    $finalImage = $target_dir . $name;

    // Check if the product already exists
    $checkQuery = "SELECT * FROM products WHERE name = '$ProductName'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Product already exists.";
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($temp, $finalImage)) {
            // Insert data into the products table with category_id, storing only the image name
            $insertQuery = "INSERT INTO products (name, brand, description, price, image, category_id, created_at) 
                            VALUES ('$ProductName', '$Brand', '$Description', $Price, '$name', $Category, NOW())";
            $insert = mysqli_query($conn, $insertQuery);

            if ($insert) {
                // Display success message in a pop-up
                echo "<script>alert('Item added successfully!');</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading the image.";
        }
    }
}
?>
