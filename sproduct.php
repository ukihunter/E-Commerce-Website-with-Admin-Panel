<?php
// Database connection settings
$server ="localhost";
$user ="root";
$password ="";
$db ="velvetvougedb";//
// Updated database name

try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Stop further execution if connection fails
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/banner.css"/> 
    <link rel="stylesheet" href="style.css"/> 
   
  </head>
  <body>
  <?php
session_start();
?>

<header class="header">
    <div class="header__top">
        <div class="header__container container">
            <div class="header__contact">
                <span>(+94) -356-8742</span>
                <span>Sri Lanka</span>
            </div>
            <p class="header__alert-news">
                Super value Deals - Save more with coupons
            </p>
            <?php
// Check if the user is logged in
if (isset($_SESSION["username"])) {
    // Fetch the email (username) from the session
    $email = $_SESSION["username"];

    // Query to fetch the name associated with the email from the database
    $stmt = $db->prepare("SELECT name FROM user WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Check if the user exists and retrieve the name
    if ($user) {
        $userName = $user['name']; // Assuming 'name' is the column where the user's name is stored
    } else {
        $userName = "User"; // Default value if no name is found (shouldn't happen)
    }
?>
    <div class="header__top-action">
        <?php echo "Logged in as " . htmlspecialchars($userName); ?>
    </div>
    <a href="logout.php" class="header__top-action">Logout</a> <!-- Logout Link -->
<?php
} else {
?>
    <a href="log.php" class="header__top-action">Login / Sign up</a>
<?php
}
?>


        </div>
   
    </div>
    <nav class="nav container">
        <a href="index.html" class="nav__logo">
            <img src="image/logo/logo.png" alt="" class="nav__logo-img" />
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav_-item">
                    <a href="index.php" class="nav__link">Home</a>
                </li>
                <li class="nav_-item">
                    <a href="shop.php" class="nav__link active-link">Shop</a>
                </li>
                <li class="nav__item">
                    <a href="accounts.php" class="nav__link">My Account</a>
                </li>
                <li class="nav_-item">
                    <a href="Compare.php" class="nav__link">About Us</a>
                </li>
            </ul>

            <div class="header__search">
                <input
                    type="text"
                    placeholder="Search for items.."
                    class="form__input"
                />
                <button class="Search__btn">
                    <img src="image/icon/search.png" alt="" />
                </button>
            </div>
        </div>
        <div class="header__user-actions">
            <a href="wishlist.html" class="header__action-btn">
                <img src="image/icon/icon-heart.svg" alt="" />
                <span class="count">2</span>
            </a>

            <a href="wishlist.html" class="header__action-btn">
                <img src="image/icon/icon-cart.svg" alt="" />
                <span class="count">2</span>
            </a>
        </div>
    </nav>
</header>


    <?php
// Include database connection
include('db.php');

// Get the product_id from the URL
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Fetch product details
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['name'];
        $brand = $row['brand'];
        $price = $row['price'];
        $image = $row['image']; // Assumes only one image; adjust if there are multiple images
        $description = $row['description'];
    } else {
        echo "<p>Product not found!</p>";
        exit;
    }
} else {
    echo "<p>No product selected!</p>";
    exit;
}

// Close the connection
$conn->close();
?>

<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="./admin/uploads/<?php echo htmlspecialchars($image); ?>" width="100%" id="MainImg" alt="<?php echo htmlspecialchars($product_name); ?>" />
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="./admin/uploads/<?php echo htmlspecialchars($image); ?>" width="100%" class="small-img" alt="<?php echo htmlspecialchars($product_name); ?>" />
            </div>
            <div class="small-img-col">
                <img src="./admin/uploads/<?php echo htmlspecialchars($image); ?>" width="100%" class="small-img" alt="<?php echo htmlspecialchars($product_name); ?>" />
            </div>
            <div class="small-img-col">
                <img src="./admin/uploads/<?php echo htmlspecialchars($image); ?>" width="100%" class="small-img" alt="<?php echo htmlspecialchars($product_name); ?>" />
            </div>
            <div class="small-img-col">
                <img src="./admin/uploads/<?php echo htmlspecialchars($image); ?>" width="100%" class="small-img" alt="<?php echo htmlspecialchars($product_name); ?>" />
            </div>
        </div>
    </div>

    <div class="single-pro-details">
        <h6><?php echo htmlspecialchars($brand); ?> / <?php echo htmlspecialchars($product_name); ?></h6>
        <h4><?php echo htmlspecialchars($product_name); ?></h4>
        <h2>$<?php echo number_format($price, 2); ?></h2>

        <form action="cart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>">
    <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($price); ?>">
    <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($image); ?>">
    
<label for="size">Select Size</label>
<select name="product_size" id="size" required>
    <option value="" disabled selected>Select Size</option>
    <option value="XS">XS</option>
    <option value="S">Small</option>
    <option value="M">Medium</option>
    <option value="L">Large</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
</select>

    <!-- Quantity selection -->
    <label for="quantity">Quantity</label>
    <input type="number" name="product_quantity" id="quantity" value="1" min="1" required />

    <!-- Add to Cart button -->
    <button type="submit" class="normal">Add To Cart</button>
</form>


        <h4>Product Details</h4>
        <span><?php echo htmlspecialchars($description); ?></span>
    </div>
</section>

<section id="newsteler" class="selection-p1 selection-m1">
  <img src="image/sm-banner/sm-banner7.jpg" alt="Newsletter Banner" class="newsletter-bg">
  
  <div class="newstext">
    <h4>Sign up For Newsletters</h4>
    <p>Get email updates about our latest shop and <span>special offers</span></p>
  </div>
  
  <div class="form">
    <input type="email" placeholder="Your email address" aria-label="Email Address">
    <button>Sign Up</button>
  </div>
</section>



<footer class="selection-p1">
  <div class="col">
      <img class="logo"  src="image/logo/my-Velvet vouge.png" alt="">
      <h4>Contact</h4>
      <p><strong>Address:</strong> Mawathagama,kurunagala</p>
      <p><strong>phone:</strong> +946589563 / +94785623</p>

      <dir class="follw">
          <h4>Follow us</h4>
          <div class="icon">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-pinterest-p"></i>
              <i class="fab fa-youtube"></i>

          </div>
      </dir>
  </div>
  <div class="col">
      <h4>About</h4>
      <a href="#">About us</a>
      <a href="#">delivery inforamtion</a>
      <a href="#">Privacy policy</a>
      <a href="#">Terms & conditions</a>
      <a href="#">Contact  Us</a>
  </div>
  <div class="col">
      <h4>My account</h4>
      <a href="#">Sign in</a>
      <a href="#">View Cart</a>
      <a href="#">My wishlist</a>
      <a href="#">Track My Order</a>
      <a href="#">Help</a>
  </div>
  <div class="colinstall">
      <p>Secured payment Getaways</p>
      <img src="image/sm-banner/pngegg.png" alt="">
  </div>

  <div class="copyright">
      <p>@2024 Velvet vouge - uki </p>
  </div>
</footer>

  

    <script>
      var MainImg = document.getElementById("MainImg");
      var smallimg = document.getElementsByClassName("small-img");

      smallimg[0].onclick = function () {
        MainImg.src = smallimg[0].src;
      };

      smallimg[1].onclick = function () {
        MainImg.src = smallimg[1].src;
      };

      smallimg[2].onclick = function () {
        MainImg.src = smallimg[2].src;
      };

      smallimg[3].onclick = function () {
        MainImg.src = smallimg[3].src;
      };
    </script>

    <script src="script.js"></script>
  </body>
</html>
