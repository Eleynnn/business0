<?php

session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

require_once 'connection.php';


if(isset($_POST["submit"])){
    $businessname = $_POST["businessname"];
    $contact_info = $_POST["contact_info"];
    $operating_hours = $_POST["operating_hours"];
    $address = $_POST["address"];

    //for uploads photo
    $upload_dir = "uploads/";
    $image = $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];  
    $upload_ok = 0;

    if(file_exists($upload_file)){
        echo "<script>alert('The file already exist')</script>";
        $upload_ok = 0;
    }else{
        $upload_ok = 1;
        if($check !== false){
            $upload_ok = 1;
            if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
                $upload_ok = 1;
            }else{
                echo '<script>alert("please change the image format")</script>';
            }
        }else{
            echo '<script>alert("The photo size is 0 please change the photo")</script>';
            $upload_ok = 0;
        }
    }

    if($upload_ok == 0){
        echo '<script>alert("sorry your file is does not uploaded. Please try again")</script>';
    }else{
        if($businessname != "" && $contact_info !=""){
            move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

            $sqli = "INSERT INTO businesses(business_name,contact_info,operating_hours,address,image)
            VALUES('$businessname','$contact_info','$operating_hours','$address','$image')";

            if($conn->query($sqli) === TRUE){
                echo "<script>alert('your business uploaded successfully')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="upload.css">

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
    

    <style>
    body {
        background-image: url('bg6.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
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


<div class="heading" style="background:url(header-bg 1.png) no-repeat">
    <h1>Upload</h1>
</div>


<section id="upload_container">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="businessname" id="businessname" placeholder="Business Name" required>
        <input type="number" name="contact_info" id="contact_info" placeholder="Contact Info" required>
        <input type="text" name="operating_hours" id="operating_hours" placeholder="Operating Hours" required>
        <input type="text" name="address" id="address" placeholder="Address" required>
        <input type="file" name="imageUpload" id="imageUpload" required hidden>
        <button id="choose" onclick="upload();">Choose image</button>
        <input type="submit" value="Upload" name="submit">
    </form>
</section>

<script>
    var businessname = document.getElementById("businessname");
    var contact_info = document.getElementById("contact_info");
    var operating_hours = document.getElementById("operating_hours");
    var address = document.getElementById("address");
    var choose = document.getElementById("choose");
    var uploadImage = document.getElementById("imageUpload");

    function upload(){
        uploadImage.click();
    }

    uploadImage.addEventListener("change", function(){
        var file = this.files[0];
        if(businessname.value == ""){
            businessname.value = file.name;
        }
        choose.innerHTML = "You can change("+file.name+") picture";
    })
</script>



<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>