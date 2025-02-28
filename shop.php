<?php
// Start the session
session_start();

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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shop</title>
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="shop.css" />
</head>

<body>
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
            <a href="About.php" class="nav__link">About US</a>
          </li>
        </ul>

        <div class="header__search">
          <input
            type="text"
            placeholder="Search for items.."
            class="form__input" />
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
  <section id="sh-banner">
    <h4>#stay Home</h4>
    <h2>Save up to 70% off</h2>
  </section>

  <div class="category-container">
    <div class="category-buttons">
      <button id="men-btn" class="active">Men</button>
      <button id="women-btn">Women</button>
    </div>
    <div id="men-clothing" class="clothing-category">
      <h2>Men's Clothing</h2>
      <div class="product" onclick="window.location.href='sproduct.php'">
        <img src="image/products/male/me1.png" alt="Men's Shirt" />
        <span>Moos</span>
        <h4>Men's Shirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$29.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/male/f2.jpg" alt="Men's Jacket" />
        <span>Canage</span>
        <h4>Men's Shirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$79.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/male/f2.jpg" alt="Men's Jacket" />
        <span>Emaral</span>
        <h4>Men's Shirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$79.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>

      <div class="product">
        <img src="image/products/male/f2.jpg" alt="Men's Jacket" />
        <span>Moos</span>
        <h4>Men's Shirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$79.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>

      <div class="product">
        <img src="image/products/male/f2.jpg" alt="Men's Jacket" />
        <span>Carnage</span>
        <h4>Men's Shirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$79.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/male/f2.jpg" alt="Men's Jacket" />
        <span>Emaral</span>
        <h4>Men's Shirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$79.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
    </div>
    <div id="women-clothing" class="clothing-category hidden">
      <h2>Women's Clothing</h2>
      <div class="product">
        <img src="image/products/female/wm1.png" alt="Women's Dress" />
        <h4>Women's Dress</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$49.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/female/f4.jpg" alt="Women's Skirt" />
        <h4>Women's Skirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$39.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/female/f4.jpg" alt="Women's Skirt" />
        <h4>Women's Skirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$39.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/female/f4.jpg" alt="Women's Skirt" />
        <h4>Women's Skirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$39.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <br />
      <div class="product">
        <img src="image/products/female/f4.jpg" alt="Women's Skirt" />
        <h4>Women's Skirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$39.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
      <div class="product">
        <img src="image/products/female/f4.jpg" alt="Women's Skirt" />
        <h4>Women's Skirt</h4>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>$39.99</p>
        <a href="#" id="procart">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
  <section id="pagination" class="selection-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
  </section>
  <section id="newsteler" class="selection-p1 selection-m1">
    <div class="newstext">
      <h4>Sing up For Newsletters</h4>
      <p>
        Get E-mail updates about our latest shop and<span>special offers</span>
      </p>
    </div>
    <br />
    <div class="form">
      <input type="text " placeholder="Your email address" />
      <br />
      <br />
      <button>sign Up</button>
    </div>
  </section>
  <footer class="selection-p1">
    <div class="col">
      <img class="logo" src="image/logo/my-Velvet vouge.png" alt="" />
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
      <a href="#">Contact Us</a>
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
      <p>Secured payment Getways</p>
      <img src="image/pngegg.png" alt="" />
    </div>

    <div class="copyright">
      <p>@2024 Velvet vouge - uki</p>
    </div>
  </footer>

  <script src="script.js"></script>
</body>

</html>