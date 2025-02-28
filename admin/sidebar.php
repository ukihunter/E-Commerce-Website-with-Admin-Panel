<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/image.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> Customers</a>
    <a href="#category"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Category</a>
    <a href="#sizes"   onclick="showSizes()" ><i class="fa fa-th"></i> Sizes</a>
    <a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-th-list"></i> Product Sizes</a>    
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>
    <a href="#Massages" onclick="ShowMassage()"><i class="fa fa-list"></i> Massages</a>


  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<script>
    // Function to show messages via AJAX
    function ShowMassage() {
      console.log("ShowMassage function triggered!");

      $.ajax({
        url: "./adminView/viewMassages.php",  // The URL of your PHP file to get the messages
        method: "POST",  // Use POST method to send data
        data: { record: 1 },  // Data to identify the request
        success: function (data) {
          console.log("Data received:", data); // Log received data
          $(".allContent-section").html(data);  // Update the content area with the received data
        },
        error: function(xhr, status, error) {
          console.log("Error:", error);  // Log any errors encountered
        }
      });
    }
  </script>
