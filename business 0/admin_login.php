<?php
session_start();

require_once 'connection.php';

// Admin registration
if(isset($_POST["admin_register"])){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // Check if the admin already exists
    $check_sql = "SELECT * FROM admins WHERE username = '$admin_username'";
    $check_result = $conn->query($check_sql);

    if($check_result->num_rows > 0){
        echo "<script>alert('Admin username already exists')</script>";
    } else {
        // Insert the new admin credentials into the database
        $insert_sql = "INSERT INTO admins (username, password) VALUES ('$admin_username', '$admin_password')";
        if($conn->query($insert_sql) === TRUE){
            echo "<script>alert('Admin registered successfully')</script>";
        } else {
            echo "<script>alert('Error registering admin')</script>";
        }
    }
}

// Admin login
if(isset($_POST["admin_login"])){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // Retrieve the admin user from the database
    $admin_sql = "SELECT * FROM admins WHERE username = '$admin_username' AND password = '$admin_password'";
    $admin_result = $conn->query($admin_sql);

    if($admin_result->num_rows > 0){
        $_SESSION["admin_logged_in"] = true;
        header("Location: upload.php");
        exit();
    } else {
        echo "<script>alert('Invalid admin credentials')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
</head>

<!-- header section start -->

<section class="header">
    <a href="home.php" class="logo">
        <img src="logo.png" alt="Community Hub ">
    </a> 

    <nav class="navbar">
        <a href="Home.php">Home</a>
        <a href="Business.php">Business</a>
        <a href="Admin_login.php">Admin</a>
    </nav>

</section>
<!-- header section end -->

<div class="heading">
    <h1>Admin</h1>
</div>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="admin_login.php" method="POST">
            <input type="text" name="admin_username" placeholder="Username" required>
            <input type="password" name="admin_password" placeholder="Password" required>
            <button type="submit" name="admin_login">Login</button>
        </form>
        <h2>Register New Admin</h2>
        <form action="admin_login.php" method="POST">
            <input type="text" name="admin_username" placeholder="Username" required>
            <input type="password" name="admin_password" placeholder="Password" required>
            <button type="submit" name="admin_register">Register</button>
        </form>
    </div>

    
</body>
</html>
