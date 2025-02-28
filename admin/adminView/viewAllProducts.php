<?php
  // Include database connection
  include_once "../config/dbconnect.php";
  
  // SQL query to fetch product data along with category name
  $sql = "SELECT p.product_id, p.name, p.description, p.price, p.image, p.created_at, p.rating, c.category_name
          FROM products p
          JOIN category c ON p.category_id = c.category_id";
  
  // Check if the query was successful
  $result = $conn->query($sql);
  
  // Check if the query failed
  if ($result === false) {
    // Output the error if the query failed
    die('Query failed: ' . $conn->error);
  }

  $count = 1;
?>

<div>
  <h2>Product Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Product Description</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Unit Price</th>
        <th class="text-center">Rating</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Check if there are results
        if ($result->num_rows > 0) {
          // Loop through the result set and display each product
          while ($row = $result->fetch_assoc()) {
      ?>
    <tr>
    <td><?= $count ?></td>
    <td>
        <?php 
            // Set the full image URL
            $image_url = '../admin/uploads/' . $row["image"];
        ?>
        <img height="100px" src="<?= $image_url ?>" alt="<?= $row["name"] ?>">
    </td>
    <td><?= $row["name"] ?></td>
    <td><?= $row["description"] ?></td>
    <td><?= $row["category_name"] ?></td>
    <td><?= $row["price"] ?></td>
    <td><?= $row["rating"] ?> / 5</td> <!-- Display Rating -->
    <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?= $row['product_id'] ?>')">Edit</button></td>
    <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?= $row['product_id'] ?>')">Delete</button></td>
</tr>

      <?php
            $count++;
          }
        } else {
          // Display message if no products are found
          echo "<tr><td colspan='8' class='text-center'>No products found.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal to add a new product -->
<button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
  Add Product
</button>

<!-- Modal content -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Product Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="controller/addItemController.php" method="POST">
          <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" class="form-control" name="brand" id="brand">
          </div>
          <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
          </div>

          <!-- Category Selection Dropdown -->
          <div class="form-group">
            <label>Category:</label>
            <select name="category" id="category" class="form-control" required>
              <option disabled selected>Select category</option>
              <?php
                include_once "../config/dbconnect.php"; // Include DB connection
                // Fetch categories from the database
                $category_query = "SELECT * FROM category"; // Assuming you have a 'categories' table
                $category_result = mysqli_query($conn, $category_query);
                
                if ($category_result && mysqli_num_rows($category_result) > 0) {
                  while ($row = mysqli_fetch_assoc($category_result)) {
                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                  }
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="file">Choose Image:</label>
            <input type="file" class="form-control-file" name="file" id="file" required>
          </div>
          <div class="form-group">
            <button type="submit" name="upload" class="btn btn-secondary" style="height:40px">Add Item</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
      </div>
    </div>
  </div>
</div>
