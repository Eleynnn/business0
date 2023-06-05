<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
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


<!-- home section starts -->
<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url('bg 1.png') no-repeat">
                <div class="content">
                    <span>Good, Quality, Solid Mandin</span>
                    <h3>Local Business in Marinduque</h3>
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url('bg 2.png') no-repeat">
                <div class="content">
                    <span>Ngani Baya Mandin</span>
                    <h3>The Community Hub: Connecting Local Business and Customers</h3>
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url('bg 3.png') no-repeat">
                <div class="content">
                    <span>Ngani Baya Mandin</span>
                </div>
            </div>
            
            <div class="swiper-slide slide" style="background:url('bg4.png') no-repeat">
                <div class="content">
                    <span>Hamos na Dine</span>
                    <h3>The Community Hub</h3>
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url('image/image 18.jpg') no-repeat">
                <div class="content">
                    <span>Hamos na Dine</span>
                    <h3></h3>
                </div>
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
</section>
<!-- home section end -->



<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


<!-- custom js file link -->
<script src="js/script.js"></script>

<script>
    // Initialize Swiper
    var swiper = new Swiper('.home-slider', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2000, // Delay in milliseconds (2 seconds)
        },
    });
</script>
</body>
</html>