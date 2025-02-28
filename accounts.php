<?php
session_start();

$host = "localhost";
$user = "root";
$pass = ""; // Empty password for local development
$dbname = "velvetvougedb";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="accounts.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>


    <header class="header" style="width: 1300px;">
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
    </header>

    </div>

    </div>
    <nav class="nav container">
        <a href="index.html" class="nav__logo">
            <img src="image/logo/logo.png" alt="" class="nav__logo-img" />
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav_-item">
                    <a href="index.php" class="nav__link ">Home</a>
                </li>
                <li class="nav_-item">
                    <a href="shop.php" class="nav__link">Shop</a>
                </li>
                <li class="nav__item">
                    <a href="accounts.php" class="nav__link active-link">My Account</a>
                </li>
                <li class="nav_-item">
                    <a href="about.php" class="nav__link">About Us</a>
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

    </nav>
    </header>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION["username"])) {
        // Fetch the email (username) from the session
        $email = $_SESSION["username"];

        // Query to fetch the name, email, and role associated with the logged-in user
        $stmt = $db->prepare("SELECT name, email, role FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Check if the user exists
        if ($user) {
            $userName = htmlspecialchars($user['name']); // Escaping for security
            $userEmail = htmlspecialchars($user['email']);
            $userRole = htmlspecialchars($user['role']);
        } else {
            $userName = "User"; // Default value if no name is found (shouldn't happen)
            $userEmail = "Unknown";
            $userRole = "Unknown";
        }
    ?>
        <div class="header__top-action">
            <p>Welcome, <strong><?php echo $userName; ?></strong>!</p>
            <table class="user-info-table">
                <tr>
                    <th>Name</th>
                    <td><?php echo $userName; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $userEmail; ?></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><?php echo $userRole; ?></td>
                </tr>
            </table>
            <a href="logout.php" class="btn btn-logout">Logout</a> <!-- Logout Button -->
        </div>
    <?php
    } else {
    ?>
        <a href="log.php" class="btn btn-login">Login / Sign up</a>
    <?php
    }
    ?>

    <div class="social-buttons mt-5">
        <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button>
        <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button>
        <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button>
        <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button>
        <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button>
    </div>

    <div class="profile mt-5">



    </div>

    </div>
    </div>
    </div>
</body>

</html>