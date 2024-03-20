<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require './connection.php';

    $currPageUrl = $_POST['currPageUrl'];
    $productId = $_POST['productId'];
    $cusId = $_SESSION['customerId'];


// getting product price 
    $priceGetQuery = "SELECT * FROM `product table` WHERE  `product id` =  $productId" ;
    $getPriceExec = mysqli_fetch_assoc(mysqli_query($connection , $priceGetQuery));
    $productPrice = $getPriceExec['product price'];






    $ifPresent = "SELECT * FROM `add to cart` where  `product id` = $productId AND  `customer id` = '$cusId'";
    $queryIfPresent = mysqli_num_rows(mysqli_query($connection, $ifPresent));
    echo $queryIfPresent;



    // if item exists item already exists
    if ($queryIfPresent > 0) {
        header("location:$currPageUrl&msg=Product already present in Cart");
    } 
    else {
        $cartId = uniqid("cart-");
        $query = "INSERT INTO `add to cart` (`cart id`, `product id`, `customer id` , `product price`) VALUES ('$cartId', '$productId', '$cusId' ,$productPrice)";
        $queryExec = mysqli_query($connection, $query);

        if ($queryExec) {
            header("location:$currPageUrl&msg=Product added successfully");
        }
    }

}












?>