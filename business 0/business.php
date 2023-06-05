<?php

    require_once 'connection.php';

    $sql = "SELECT * FROM businesses";
    $all_businesses = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>business</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

    <style>
    body {
        background-image: url('bg5.jpeg'); 
        background-size: cover;
        background-repeat: no-repeat;
    }

    /* Add hover effect */
    .card {
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
    }
</style>
</head>
<body>

   
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
    <h1>Business</h1>
</div>


    <main>
        <?php
             while ($row = $all_businesses->fetch_assoc()) {
                
        ?>
    
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["image"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <p class="business_name"><?php echo $row["business_name"]; ?></p>
                    <p class="contact_info"><?php echo $row["contact_info"]; ?></p>
                    <p class="operating_hours"><?php echo $row["operating_hours"]; ?></p>
                    <p class="address"><?php echo $row["address"]; ?></p>
                </div>
                <button class="add"><a href="review.php?image=<?php echo urlencode($row["image"]); ?>">Review</a></button>
            </div>
         <?php
            
          }   
        ?>
    </main>


<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>