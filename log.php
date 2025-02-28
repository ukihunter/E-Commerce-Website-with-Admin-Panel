<?php
session_start(); // Start the session

// Include your database connection
require 'db.php'; // Ensure the path to db.php is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle login
    if ($_POST['action'] == 'login') {
        // Get the form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare the SQL statement to check for the user's existence
        $stmt = $conn->prepare("SELECT id, email, password, role FROM user WHERE email = ?");
        if ($stmt === false) {
            die('Error preparing the SQL statement: ' . mysqli_error($conn));
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            // Fetch the user details
            $stmt->bind_result($id, $emailDb, $passwordDb, $role);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $passwordDb)) {
                // Store user details in session
                $_SESSION['user_id'] = $id;
                $_SESSION['email'] = $emailDb;
                $_SESSION['role'] = $role;
                $_SESSION['username'] = $emailDb;  // Storing email or username in session (use the appropriate field here)

                // Redirect based on role
                if ($role == 'admin') {
                    header("Location: admin/index.php"); // Redirect to admin page if role is admin
                } else {
                    header("Location: index.php"); // Redirect to index page if role is user
                }
                exit(); // Don't forget to stop the script
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "No user found with this email!";
        }

        // Close the statement
        $stmt->close();
    }

    // Handle sign up (register new user)
    if ($_POST['action'] == 'signup') {
        // Get the form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        // Check if passwords match
        if ($password !== $passwordConfirm) {
            echo "Passwords do not match!";
            exit();
        }

        // Hash the password for secure storage
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to check if the email already exists
        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        if ($stmt === false) {
            die('Error preparing the SQL statement: ' . mysqli_error($conn));
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // If the email already exists, don't proceed
        if ($stmt->num_rows > 0) {
            echo "Email is already registered!";
            exit();
        }

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO user (name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
        if ($stmt === false) {
            die('Error preparing the SQL statement: ' . mysqli_error($conn));
        }

        $role = 'user'; // Default role
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

        if ($stmt->execute()) {
            // After successful registration, store the username (or email) in the session
            $_SESSION['username'] = $username; // Store username in the session
            $_SESSION['user_id'] = $stmt->insert_id; // Store the user ID
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            echo "User registered successfully! You can now log in.";
            header("Location: log.php"); // Redirect to index.php after successful registration
            exit();
        } else {
            echo "Error registering user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velvet Vouge</title>
    <link rel="stylesheet" href="css/log.css">
</head>
<body>
<section class="forms-section">
  <h1 class="section-title">Velvet Vouge</h1>
  <div class="forms">
    
  <div class="form-wrapper is-active">
    <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
    </button>
    <form class="form form-login" action="log.php" method="POST">
        <input type="hidden" name="action" value="login">
        <fieldset>
            <legend>Please, enter your email and password for login.</legend>
            <div class="input-block">
                <label for="login-email">E-mail</label>
                <input id="login-email" name="email" type="email" required placeholder="Enter your email">
            </div>
            <div class="input-block">
                <label for="login-password">Password</label>
                <input id="login-password" name="password" type="password" required placeholder="Enter your password">
            </div>
        </fieldset>
        <button type="submit" class="btn-login">Login</button>
    </form>
</div>

    
<div class="form-wrapper">
    <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
    </button>
    <form class="form form-signup" action="log.php" method="POST">
        <input type="hidden" name="action" value="signup">
        <fieldset>
            <legend>Please, enter your username, email, password, and password confirmation for sign up.</legend>
            <div class="input-block">
                <label for="signup-username">Username</label>
                <input id="signup-username" name="username" type="text" required>
            </div>
            <div class="input-block">
                <label for="signup-email">E-mail</label>
                <input id="signup-email" name="email" type="email" required>
            </div>
            <div class="input-block">
                <label for="signup-password">Password</label>
                <input id="signup-password" name="password" type="password" required>
            </div>
            <div class="input-block">
                <label for="signup-password-confirm">Confirm Password</label>
                <input id="signup-password-confirm" name="passwordConfirm" type="password" required>
            </div>
        </fieldset>
        <button type="submit" class="btn-signup">Continue</button>
    </form>
</div>



    
  </div>
</section>

<script src="js/log.js"></script>
</body>
</html>
