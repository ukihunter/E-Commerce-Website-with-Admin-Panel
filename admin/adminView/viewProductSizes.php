<div>
  <h2>Product Sizes Item</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Size</th>
        <th class="text-center">Stock Quantity</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      // Display errors for debugging
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      
      // Include database connection
      include_once "../config/dbconnect.php";

      // SQL query to fetch product size variations along with product and size details
      $sql = "SELECT v.*, p.name AS product_name, s.size_name 
              FROM product_size_variation v
              JOIN products p ON p.product_id = v.product_id
              JOIN sizes s ON s.size_id = v.size_id";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Check for errors in the query execution
      if (!$result) {
          die("Error executing query: " . $conn->error); // Show detailed error message
      }

      $count = 1;

      // Check if any rows are returned
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["product_name"]?></td> <!-- Display product name -->
      <td><?=$row["size_name"]?></td> <!-- Display size name -->
      <td><?=$row["quantity_in_stock"]?></td> <!-- Display stock quantity -->
      <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?=$row['variation_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="variationDelete('<?=$row['variation_id']?>')">Delete</button></td>
    </tr>
    <?php
            $count++;
          }
        } else {
          // If no results are returned, show a message
          echo "<tr><td colspan='6' class='text-center'>No product size variations found.</td></tr>";
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Size Variation
  </button>

  <!-- Modal for adding new product size variation -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Size Variation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">
            
            <div class="form-group">
              <label>Product:</label>
              <select name="product" required>
                <option disabled selected>Select product</option>
                <?php
                  // Fetch products from the database
                  $sql = "SELECT * FROM products"; // Adjusted table name to 'products'
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['product_id'] . "'>" . $row['name'] . "</option>";
                    }
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Size:</label>
              <select name="size" required>
                <option disabled selected>Select size</option>
                <?php
                  // Fetch sizes from the database
                  $sql = "SELECT * FROM sizes";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['size_id'] . "'>" . $row['size_name'] . "</option>";
                    }
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="qty">Stock Quantity:</label>
              <input type="number" class="form-control" name="qty" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Variation</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
