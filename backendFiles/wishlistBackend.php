<?php

session_start();

require './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    //adding items to wishlist
    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];
        $currPageUrl = $_POST['currPageUrl'];

        $cusId = $_SESSION['customerId'] ;
        // echo $cusId;


        $ifPresent = "SELECT * FROM `wishlist` where  `product id` = $productId AND  `customer id` = '$cusId'";
        $queryIfPresent = mysqli_num_rows(mysqli_query($connection, $ifPresent));
        // echo $queryIfPresent;  



        // if item exists item already exists
        if ($queryIfPresent > 0) {
            header("location:$currPageUrl&msg=Product already present in wishlist");
        } 
        else {
            $wishlistId = uniqid("wishlist-");
            $query = "INSERT INTO `wishlist` (`wishlist id`, `product id`, `customer id`) VALUES ('$wishlistId', '$productId', '$cusId')";
            $queryExec = mysqli_query($connection, $query);

            if ($queryExec) {
                header("location:$currPageUrl&msg=Product added successfully");
            }
        }

    }












}











?>