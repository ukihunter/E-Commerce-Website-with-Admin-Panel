<?php
// Database connection settings
$server = "sql302.infinityfree.com";
$user = "if0_37813685";
$password = "7JNp27wM9UxSvx";
$db = "if0_37813685_velvetvougedb";
try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Start session to manage cart items
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle product addition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $product_price = $_POST['product_price'] ?? null;
    $product_image = $_POST['product_image'] ?? null;
    $product_size = $_POST['product_size'] ?? null;
    $product_quantity = $_POST['product_quantity'] ?? 1;

    if ($product_id && $product_name && $product_price && $product_size) {
        $product_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] += $product_quantity;
                $product_exists = true;
                break;
            }
        }

        if (!$product_exists) {
            $_SESSION['cart'][] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'image' => $product_image,
                'size' => $product_size,
                'quantity' => $product_quantity,
            ];
        }
    } else {
        echo "<script>alert('Invalid product data received.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BMjDBsjdk8TT33H9OGHafhHSZZlfqfhdBRnvqBReCBV3q28u61ZpVHzKmQ9OXPl" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
   <style>
      

        .cart-table {
            margin-left: 300px;
            margin-right: 300px;
            margin-top: 30px;
            background-color: #FFFF;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .cart-table th, .cart-table td {
            padding: 10px;
            text-align: center;
        }

        .cart-table img {
            max-width: 80px;
            border-radius: 5px;
        }

        .cart-table .quantity-input {
            width: 50px;
            text-align: center;
        }

        .summary {
            margin-left: 300px;
            margin-right: 300px;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .summary .row {
            margin-bottom: 10px;
        }

        .summary .btn {
            background-color: #ff7043;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            font-weight: bold;
            border: none;
        }

        .back-to-shop a {
            font-size: 18px;
            color: #888;
            text-decoration: none;
        }

        .back-to-shop a:hover {
            color: #ff7043;
        }

        .close {
            cursor: pointer;
            color: #ff7043;
            font-size: 18px;
        }

        .cart-summary {
            margin-top: 20px;
            font-size: 18px;
        }

        .text-muted {
            color: #6c757d;
        }
    </style>
 <style>
    table {
        border: 5px solid #EBEAFF; /* Add border around the table */
        border-collapse: collapse; /* Ensure borders are merged between cells */
        text-align: center;
        border-radius: 14px;
    }

    th, td {
        border: 5px solid #EBEAFF; /* Add border to individual table cells */
        padding: 80px; /* Add some padding for readability */
        height: 70px;
        width: 1000px;
    }
</style>

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
                    <a href="index.html" class="nav__link active-link">Home</a>
                </li>
                <li class="nav_-item">
                    <a href="shop.php" class="nav__link">Shop</a>
                </li>
                <li class="nav__item">
                    <a href="accounts.php" class="nav__link">My Account</a>
                </li>
                <li class="nav_-item">
                    <a href="About.html" class="nav__link">About US</a>
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
       
    </nav>
</header>

<div class="container">
    <div class="cart-table">
        <h2 class="text-center">Shopping Cart</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <tr>
                        <td><img src="./admin/uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>"></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['size']) ?></td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td><a href="remove_item.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <div class="summary">
        <h4>Summary</h4>
        <p>Total Items: <?= count($_SESSION['cart']) ?></p>
        <p>Total Price: $<?= number_format(array_sum(array_column($_SESSION['cart'], 'price')), 2) ?></p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkoutModal">Checkout</button>
    </div>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="checkout_handler.php">
                <div class="modal-body">
                    <label for="customerName">Full Name</label>
                    <input type="text" name="customer_name" class="form-control" id="customerName" required>

                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="address" required></textarea>

                    <label for="contact">Contact Number</label>
                    <input type="text" name="contact" class="form-control" id="contact" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm Order</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Q2mrwBr4LE9Szi9Fzx82bK3lrfz1D2WmF4W09IQXNDPwTRCNiFuBzZ9mZbzhqH+T"
        crossorigin="anonymous"
></script>
<script>
    const cartItems = document.querySelectorAll('.table tbody tr');
    const totalItemsElement = document.getElementById('total-items');
    const totalPriceElement = document.getElementById('total-price');
    const checkoutButton = document.getElementById('checkout-button');

    const updateTotals = () => {
        let totalItems = 0;
        let totalPrice = 0;

        cartItems.forEach((item) => {
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            const pricePerItem = parseFloat(item.querySelector('.price').textContent.replace('$', ''));
            totalItems += quantity;
            totalPrice += pricePerItem * quantity;
        });

        totalItemsElement.textContent = totalItems;
        totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
    };

    cartItems.forEach((item) => {
        const decrement = item.querySelector('.decrement');
        const increment = item.querySelector('.increment');
        const quantityElement = item.querySelector('.quantity-input');

        decrement.addEventListener('click', (e) => {
            e.preventDefault();
            let quantity = parseInt(quantityElement.value);
            if (quantity > 1) {
                quantity--;
                quantityElement.value = quantity;
                updateTotals();
            }
        });

        increment.addEventListener('click', (e) => {
            e.preventDefault();
            let quantity = parseInt(quantityElement.value);
            quantity++;
            quantityElement.value = quantity;
            updateTotals();
        });

        const closeButton = item.querySelector('.close');
        closeButton.addEventListener('click', () => {
            item.remove();
            updateTotals();
        });
    });

    // Initialize totals on page load
    updateTotals();
</script>
</body>
</html>



