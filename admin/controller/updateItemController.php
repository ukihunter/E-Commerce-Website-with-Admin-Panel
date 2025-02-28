<?php
include_once "../config/dbconnect.php";

// Get posted values
$product_id = $_POST['product_id'];
$p_name = $_POST['p_name'];
$p_desc = $_POST['p_desc'];
$p_price = $_POST['p_price'];
$category = $_POST['category'];

// Handle new image upload if provided
if (isset($_FILES['newImage']) && $_FILES['newImage']['name'] != '') {
    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');

    // Generate a unique name for the image and define the final path
    $image_name = rand(1000, 1000000) . "." . $ext;
    $upload_directory = '../uploads/';

    // Move the image file if it has a valid extension
    if (in_array($ext, $valid_extensions)) {
        move_uploaded_file($tmp, $upload_directory . $image_name);
    }
} else {
    // Use existing image if no new image is uploaded
    $image_name = $_POST['existingImage'];
}

// Update the product record in the database with only the image name
$updateItem = mysqli_query($conn, "UPDATE products SET 
    name = '$p_name', 
    description = '$p_desc', 
    price = $p_price,
    category_id = $category,
    image = '$image_name' 
    WHERE product_id = $product_id");

// Check if update was successful
if ($updateItem) {
    echo "true";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
