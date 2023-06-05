<?php

require_once 'connection.php';
$connect = mysqli_connect("localhost", "root", "", "testing");

if(isset($_POST["rating_data"]))
{
    $user_name = mysqli_real_escape_string($connect, $_POST["user_name"]);
    $user_rating = $_POST["rating_data"];
    $user_review = mysqli_real_escape_string($connect, $_POST["user_review"]);
    $datetime = time();

    $query = "
    INSERT INTO review_table 
    (user_name, user_rating, user_review, datetime) 
    VALUES ('$user_name', '$user_rating', '$user_review', '$datetime')
    ";

    if(mysqli_query($connect, $query))
    {
        echo "Your Review & Rating Successfully Submitted";
    }
}

mysqli_close($connect);




?>
