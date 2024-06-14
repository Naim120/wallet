<?php
require_once '../config.php';

// Check if the user is logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!== true){
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

// User is logged in, continue with the admin page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <!-- Your admin page content here -->
</body>
</html>