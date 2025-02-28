<div class="container">
  <table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Unit Price</th>
        </tr>
    </thead>
    <tbody>
      <?php
        include_once "../config/dbconnect.php";

        // Get the order ID from the GET request
        $orderID = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

        if ($orderID > 0) {
            // Query to retrieve data from the order_item table
            $sql = "
              SELECT 
                oi.image AS product_image, 
                oi.product_name, 
                oi.size, 
                oi.quantity, 
                oi.price 
              FROM order_items oi
              WHERE oi.order_id = $orderID
            ";

            // Execute the query
            $result = $conn->query($sql);
            $count = 1;

            // Check if there are results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Construct full image URL
                    $imageURL = "../admin/uploads/" . htmlspecialchars($row["product_image"]);
      ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><img height="80px" src="<?= $imageURL ?>" alt="Product Image"></td>
                        <td><?= htmlspecialchars($row["product_name"]) ?></td>
                        <td><?= htmlspecialchars($row["size"]) ?></td>
                        <td><?= htmlspecialchars($row["quantity"]) ?></td>
                        <td><?= htmlspecialchars(number_format($row["price"], 2)) ?></td>
                    </tr>
      <?php
                    $count++;
                }
            } else {
                echo "<tr><td colspan='6'>No order items found for this order.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Invalid order ID.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>
