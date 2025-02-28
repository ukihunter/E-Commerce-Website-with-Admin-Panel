<?php
$server ="localhost";
$user ="root";
$password ="";
$db ="velvetvougedb";//

// Create connection
$conn = mysqli_connect($server, $user, $password, $db);

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>


