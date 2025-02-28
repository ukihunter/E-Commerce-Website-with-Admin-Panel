<?php
// Include database connection
include('db.php');  // Ensure this is the correct path to your db.php file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate data (basic validation)
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");

        if ($stmt === false) {
            // Check for errors in preparing the statement
            die("Error preparing the query: " . $conn->error);
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the query
        if ($stmt->execute()) {
            // Show success popup message
            $successMessage = "Your message has been submitted successfully!";
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

        // Close connection
        $stmt->close();
    } else {
        $errorMessage = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>

    <!-- Inline CSS for popup -->
    <style>
        /* Basic popup style */
        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            text-align: center;
        }

        .popup-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<!-- Form (use your existing form here) -->

<!-- Popup Modal -->
<div id="popupMessage" class="popup">
    <div class="popup-content">
        <?php if (isset($successMessage)) { ?>
            <p><?php echo $successMessage; ?></p>
            <button class="popup-button" onclick="closePopup()">Close</button>
        <?php } elseif (isset($errorMessage)) { ?>
            <p><?php echo $errorMessage; ?></p>
            <button class="popup-button" onclick="closePopup()">Close</button>
        <?php } ?>
    </div>
</div>

<!-- JavaScript to handle popup -->
<script>
    // Show the popup if there's a success or error message
    <?php if (isset($successMessage) || isset($errorMessage)) { ?>
        document.getElementById('popupMessage').style.display = 'flex';
    <?php } ?>

    // Close the popup and redirect to index.php
    function closePopup() {
        document.getElementById('popupMessage').style.display = 'none';
        // Redirect to index.php after closing the popup
        window.location.href = 'index.php';
    }
</script>

</body>
</html>
