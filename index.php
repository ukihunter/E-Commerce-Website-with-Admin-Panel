<?php
// Database connection settings
$server = "localhost";
$user = "root";
$password = "";
$db = "velvetvougedb"; // Updated database name

try {
    // Create a new PDO instance with the correct variables
    $dsn = "mysql:host=$server;dbname=$db;charset=utf8";
    $db = new PDO($dsn, $user, $password);

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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

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
                    <a href="index.php" class="nav__link active-link">Home</a>
                </li>
                <li class="nav_-item">
                    <a href="shop.php" class="nav__link">Shop</a>
                </li>
                <li class="nav__item">
                    <a href="accounts.php" class="nav__link">My Account</a>
                </li>
                <li class="nav_-item">
                    <a href="About.php" class="nav__link">About us </a>
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

            <a href="cart.php" class="header__action-btn">
                <img src="image/icon/icon-cart.svg" alt="" />
                <span class="count">2</span>
            </a>
        </div>
    </nav>
</header>


<main class="main">
      <section class="home section--lg">
        <div class="home__container container grid">
          <div class="home__content">
            <span class="home__sutitle">Hot promotions</span>
            <h1 class="home__title">
              Fashion Trending <span>Great Collection</span>
            </h1>
            <p class="home__description">
              Save more with coupons & up to 20% discount
            </p>
            <a href="shop.php" class="btn">Shop Now</a>
          </div>
          <img src="image/etc/home-img.png" alt="" class="home__img" />
        </div>
      </section>
    </main>
    
   
    <section class="categories container section">
  <div class="categories__wrapper">
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-1.jpg" alt="" class="category__img" />
      <h3 class="category__title">T-shirt</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-2.jpg" alt="" class="category__img" />
      <h3 class="category__title">Bag</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-3.jpg" alt="" class="category__img" />
      <h3 class="category__title">Slippers</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-4.jpg" alt="" class="category__img" />
      <h3 class="category__title">Cap</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-5.jpg" alt="" class="category__img" />
      <h3 class="category__title">Shoes</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-6.jpg" alt="" class="category__img" />
      <h3 class="category__title">Pillow</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-7.jpg" alt="" class="category__img" />
      <h3 class="category__title">Skirt</h3>
    </a>
    <a href="shop.html" class="category__item">
      <img src="image/products/category/category-8.jpg" alt="" class="category__img" />
      <h3 class="category__title">Cap</h3>
    </a>
  </div>
</section>

<style>
/* Ensure a single row layout */
.categories__wrapper {
  display: flex;
  flex-direction: row; /* Arrange items horizontally */
  flex-wrap: nowrap; /* Prevent items from wrapping */
  overflow-x: auto; /* Enable horizontal scrolling */
  gap: 20px; /* Space between items */
  padding: 10px 0;
  scrollbar-width: thin;
}

/* Styling for category items */
.category__item {
  flex: 0 0 150px; /* Fixed width for each item */
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
  cursor: pointer;
}

.category__img {
  width: 100%; /* Make the image fill the container */
  border-radius: 10px;
  margin-bottom: 8px;
  transition: transform 0.3s;
}

/* Hover effect */
.category__item:hover {
  transform: translateY(-5px);
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.category__item:hover .category__img {
  transform: scale(1.1);
}

/* Optional: Style the horizontal scrollbar */
.categories__wrapper::-webkit-scrollbar {
  height: 8px;
}

.categories__wrapper::-webkit-scrollbar-thumb {
  background-color: #aaa;
  border-radius: 10px;
}
</style>
<!-- Products-->
   
<section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            <?php
            // Include the database connection
            include('db.php');

            // Fetch products from the database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            // Check if there are products
            if ($result->num_rows > 0) {
                // Loop through the products and display them
                while ($row = $result->fetch_assoc()) {
                    // Check if necessary fields exist in the row
                    if (!isset($row['product_id'], $row['name'], $row['brand'], $row['price'], $row['image'], $row['rating'])) {
                        continue; // Skip this row if any required field is missing
                    }

                    // Extract product details from the row
                    $product_id = $row['product_id'];
                    $product_name = $row['name'];
                    $brand = $row['brand'];
                    $price = $row['price'];
                    $image = $row['image']; // Store only the image name (not the full URL)
                    $rating = $row['rating'];

                    // Display the product
                    echo '<div class="pro">
                            <a href="sproduct.php?product_id=' . urlencode($product_id) . '">
                                <img src="./admin/uploads/' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($product_name) . '" />
                            </a>
                            <div class="des">
                                <span>' . htmlspecialchars($brand) . '</span>
                                <h5>' . htmlspecialchars($product_name) . '</h5>
                                <div class="star">';

                    // Display the stars based on the rating
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $rating) {
                            echo '<i class="fas fa-star"></i>';
                        } else {
                            echo '<i class="fas fa-star-half-alt"></i>';
                        }
                    }

                    echo '   </div>
                                <h4>$' . number_format($price, 2) . '</h4>
                            </div>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="product_id" value="' . htmlspecialchars($product_id) . '">
                                <input type="hidden" name="product_name" value="' . htmlspecialchars($product_name) . '">
                                <input type="hidden" name="product_price" value="' . $price . '">
                                <input type="hidden" name="product_image" value="' . htmlspecialchars($image) . '">
                                <button type="submit" class="cart"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>';
                }
            } else {
                echo "<p>No products found!</p>";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
          </section>


<section id="small-bn" class="selection-p1">
      <div class="banner-box" 
        style="background-image: url('image/sm-banner/sm-banner.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
        <h4>spring / Winter</h4>
        <h2>Upcoming season</h2>
        <span>the best way VELVET VOUGE</span>
        <br>
        <button>Learn more</button>
      </div>
    </section>


    </section>

    
    <section class="new__arrivals container section" style="max-width: 1200px; margin: 0 auto;">
  <h3><span>Best</span> Products</h3>
  <br>
  <div class="new__container swiper" style="display: flex; overflow-x: scroll;">
    <div class="swiper-wrapper" style="display: flex; flex-wrap: nowrap;">
      <div class="product__item swiper-slide" style="flex: 1 0 300px; margin-right: 20px;">
        <div class="product__banner">
          <a class="product__images">
            <img src="image/products/product/product-1-1.jpg" alt="" class="product__img default">
            <img src="image/products/product/product-1-2.jpg" alt="" class="product__img hover">
          </a>
          <div class="product__badge light-pink" style="position: absolute; top: 10px; left: 10px; background-color: #ff8c8c; padding: 5px 10px;">HOT</div>
        </div>
        <div class="product__content">
          <span class="product__category" style="font-weight: bold;">Clothing</span>
          <a href="details.html">
            <h3 class="product__title" style="font-size: 16px;">Colorful pattern shirts</h3>
          </a>
          <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
          </div>
          <div class="product__price flex" style="display: flex; justify-content: space-between;">
            <span class="new__price" style="color: green; font-size: 18px;">$238.87</span>
            <span class="old__price" style="text-decoration: line-through; color: gray;">$246.87</span>
          </div>
        </div>
      </div>

      <!-- Repeat similar changes for other product items -->

      <div class="product__item swiper-slide" style="flex: 1 0 300px; margin-right: 20px;">
        <div class="product__banner">
          <a href="details.html" class="product__images">
            <img src="image/products/product/product-2-1.jpg" alt="" class="product__img default">
            <img src="image/products/product/product-2-2.jpg" alt="" class="product__img hover">
          </a>
          <div class="product__badge light-green" style="position: absolute; top: 10px; left: 10px; background-color: #80e0a7; padding: 5px 10px;">HOT</div>
        </div>
        <div class="product__content">
          <span class="product__category" style="font-weight: bold;">Clothing</span>
          <a href="details.html">
            <h3 class="product__title" style="font-size: 16px;">Colorful pattern shirts</h3>
          </a>
          <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
          </div>
          <div class="product__price flex" style="display: flex; justify-content: space-between;">
            <span class="new__price" style="color: green; font-size: 18px;">$238.87</span>
            <span class="old__price" style="text-decoration: line-through; color: gray;">$246.87</span>
          </div>
        </div>
      </div>
      <div class="product__item swiper-slide" style="flex: 1 0 300px; margin-right: 20px;">
        <div class="product__banner">
          <a href="details.html" class="product__images">
            <img src="image/products/product/product-3-1.jpg" alt="" class="product__img default">
            <img src="image/products/product/product-3-2.jpg" alt="" class="product__img hover">
          </a>
          <div class="product__badge light-green" style="position: absolute; top: 10px; left: 10px; background-color: #80e0a7; padding: 5px 10px;">HOT</div>
        </div>
        <div class="product__content">
          <span class="product__category" style="font-weight: bold;">Shoes</span>
          <a href="details.html">
            <h3 class="product__title" style="font-size: 16px;">Shoes</h3>
          </a>
          <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
          </div>
          <div class="product__price flex" style="display: flex; justify-content: space-between;">
            <span class="new__price" style="color: green; font-size: 18px;">$238.87</span>
            <span class="old__price" style="text-decoration: line-through; color: gray;">$246.87</span>
          </div>
        </div>
      </div>
      <div class="product__item swiper-slide" style="flex: 1 0 300px; margin-right: 20px;">
        <div class="product__banner">
          <a href="details.html" class="product__images">
            <img src="image/products/product/product-4-1.jpg" alt="" class="product__img default">
            <img src="image/products/product/product-4-2.jpg" alt="" class="product__img hover">
          </a>
          <div class="product__badge light-green" style="position: absolute; top: 10px; left: 10px; background-color: #80e0a7; padding: 5px 10px;">HOT</div>
        </div>
        <div class="product__content">
          <span class="product__category" style="font-weight: bold;">Clothing</span>
          <a href="details.html">
            <h3 class="product__title" style="font-size: 16px;">pants</h3>
          </a>
          <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
          </div>
          <div class="product__price flex" style="display: flex; justify-content: space-between;">
            <span class="new__price" style="color: green; font-size: 18px;">$238.87</span>
            <span class="old__price" style="text-decoration: line-through; color: gray;">$246.87</span>
          </div>
        </div>
      </div>
      <div class="product__item swiper-slide" style="flex: 1 0 300px; margin-right: 20px;">
        <div class="product__banner">
          <a href="details.html" class="product__images">
            <img src="image/products/product/product-5-1.jpg" alt="" class="product__img default">
            <img src="image/products/product/product-5-2.jpg" alt="" class="product__img hover">
          </a>
          <div class="product__badge light-green" style="position: absolute; top: 10px; left: 10px; background-color: #80e0a7; padding: 5px 10px;">HOT</div>
        </div>
        <div class="product__content">
          <span class="product__category" style="font-weight: bold;">Clothing</span>
          <a href="details.html">
            <h3 class="product__title" style="font-size: 16px;">Hat</h3>
          </a>
          <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
          </div>
          <div class="product__price flex" style="display: flex; justify-content: space-between;">
            <span class="new__price" style="color: green; font-size: 18px;">$238.87</span>
            <span class="old__price" style="text-decoration: line-through; color: gray;">$246.87</span>
          </div>
        </div>
      </div>

      <!-- Add more product items with similar inline styles -->

    </div>
  </div>
</section>



  <section id="banner3">
    <div class="banner-box" style="background-image: url('image/sm-banner/sm-banner1.jpg');">
        <h4>Good Deals</h4>
        <h2>Buy 1 Get 2 Free</h2>
        <span>The best classic dress is on sale at VELVET VOUGE</span>
    </div>
    <div class="banner-box" style="background-image: url('image/sm-banner/sm-banner3.jpg');">
        <h4>Good Deals</h4>
        <h2>Buy 1 Get 2 Free</h2>
        <span>The best classic dress is on sale at VELVET VOUGE</span>
    </div>
    <div class="banner-box" style="background-image: url('image/sm-banner/sm-banner4.jpg');">
        <h4>Good Deals</h4>
        <h2>Buy 1 Get 2 Free</h2>
        <span>The best classic dress is on sale at VELVET VOUGE</span>
    </div>
    <div class="banner-box" style="background-image: url('image/sm-banner/sm-banner4.jpg');">
        <h4>Good Deals</h4>
        <h2>Buy 1 Get 2 Free</h2>
        <span>The best classic dress is on sale at VELVET VOUGE</span>
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



    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
