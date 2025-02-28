<div class="container p-5">
  <h4>Edit Product Detail</h4>
  <?php
      include_once "../config/dbconnect.php";
      $ID = $_POST['record'];
      $qry = mysqli_query($conn, "SELECT p.product_id, p.name, p.description, p.price, p.image, p.rating, c.category_id, c.category_name
                                  FROM products p
                                  JOIN category c ON p.category_id = c.category_id
                                  WHERE p.product_id='$ID'");
      $numberOfRow = mysqli_num_rows($qry);

      if ($numberOfRow > 0) {
          $row1 = mysqli_fetch_array($qry);
          $catID = $row1["category_id"];
  ?>
  <form id="update-Items" onsubmit="updateItems()" enctype="multipart/form-data">
      <div class="form-group">
          <input type="text" class="form-control" id="product_id" value="<?= $row1['product_id'] ?>" hidden>
      </div>
      <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" id="p_name" value="<?= $row1['name'] ?>">
      </div>
      <div class="form-group">
          <label for="desc">Product Description:</label>
          <input type="text" class="form-control" id="p_desc" value="<?= $row1['description'] ?>">
      </div>
      <div class="form-group">
          <label for="price">Unit Price:</label>
          <input type="number" class="form-control" id="p_price" value="<?= $row1['price'] ?>">
      </div>
      <div class="form-group">
          <label>Category:</label>
          <select id="category" class="form-control">
              <?php
                  // Display current category first
                  echo "<option value='". $row1['category_id'] ."' selected>" . $row1['category_name'] . "</option>";
                  
                  // Fetch and display other categories
                  $sql = "SELECT * FROM category WHERE category_id != '$catID'";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<option value='". $row['category_id'] ."'>" . $row['category_name'] . "</option>";
                      }
                  }
              ?>
          </select>
      </div>
      <div class="form-group">
          <?php
              // Set the full image URL
              $image_url = '../admin/uploads/' . $row1["image"];
          ?>
          <img width="200px" height="150px" src="<?= $image_url ?>" alt="<?= $row1['name'] ?>">
          <div>
              <label for="file">Choose New Image (optional):</label>
              <input type="text" id="existingImage" class="form-control" value="<?= $row1['image'] ?>" hidden>
              <input type="file" id="newImage" name="newImage">
          </div>
      </div>
      <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
      </div>
  </form>
  <?php
      }
  ?>
</div>
