<div id="ordersBtn">
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>Order Date</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>More Details</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * from orders";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
      ?>
                <tr>
                  <td><?= htmlspecialchars($row["id"]) ?></td>
                  <td><?= htmlspecialchars($row["customer_name"]) ?></td>
                  <td><?= htmlspecialchars($row["Contact"]) ?></td>
                  <td><?= htmlspecialchars($row["order_date"]) ?></td>
                 
                  <?php 
                    // Order Status Button
                    if($row["order_status"] == 0) {
                  ?>
                    <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?= htmlspecialchars($row['id']) ?>')">Pending</button></td>
                  <?php
                    } else {
                  ?>
                    <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?= htmlspecialchars($row['id']) ?>')">Delivered</button></td>
                  <?php
                    }

                    // Payment Status Button
                    if($row["pay_status"] == 0) {
                  ?>
                    <td><button class="btn btn-danger" onclick="ChangePay('<?= htmlspecialchars($row['id']) ?>')">Unpaid</button></td>
                  <?php
                    } else if($row["pay_status"] == 1) {
                  ?>
                    <td><button class="btn btn-success" onclick="ChangePay('<?= htmlspecialchars($row['id']) ?>')">Paid</button></td>
                  <?php
                    }
                  ?>
                <td>
                <a 
  class="btn btn-primary openPopup" 
  data-href="./adminView/viewEachOrder.php?order_id=<?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?>" 
  href="javascript:void(0);">
  View
</a>


</td>

                </tr>
      <?php
            }
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="order-view-modal modal-body">
        <!-- Order details will be loaded here -->
      </div>
    </div><!-- /Modal content-->
  </div><!-- /Modal dialog-->
</div>

<script>
  // For view order modal  
  $(document).ready(function(){
    $('.openPopup').on('click', function(){
      var dataURL = $(this).attr('data-href');

      $('.order-view-modal').load(dataURL, function(){
        $('#viewModal').modal({show:true});
      });
    });
  });
</script>
