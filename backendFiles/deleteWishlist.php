<?php


session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require './connection.php';



    $cusId = $_SESSION['customerId'];
    $wishlistId = $_POST['wishlistId'];
    $currUrl = $_POST['currUrl'];







    if (isset($_POST['deleteItem'])) {
        $query = "DELETE FROM `wishlist` WHERE  `wishlist id` = '$wishlistId' and  `customer id`= '$cusId'";
        $queryExec = mysqli_query($connection, $query);

        if ($queryExec) {
            header("location:$currUrl?msg=item removed from wishlist");
        }

    } 
    
    
    
    
    
    
    
    elseif (isset($_POST['addToCart'])) {


        //getting product id to add item  
        $queryGetPdtId = "SELECT * FROM `wishlist` WHERE  `wishlist id` = '$wishlistId' and  `customer id`= '$cusId' ";
        $queryExecGetId = mysqli_fetch_assoc(mysqli_query($connection, $queryGetPdtId));
        var_dump($queryExecGetId) ;

        $productId = $queryExecGetId['product id'];
        $queryGetPrice =mysqli_fetch_assoc(mysqli_query($connection , "SELECT * FROM `product table` WHERE `product id` = $productId"))['product price'];
        // var_dump($queryGetPrice);



        // inserting in cart 
        $ifPresent = "SELECT * FROM `add to cart` where  `product id` = $productId AND  `customer id` = '$cusId'";
        $queryIfPresent = mysqli_num_rows(mysqli_query($connection, $ifPresent));   // echo $queryIfPresent;



        // if item exists item already exists
        if ($queryIfPresent > 0) {
            header("location:$currUrl?msg=Product already present in Cart");
        } else {
            $cartId = uniqid("cart-");
            $queryInsert = "INSERT INTO `add to cart` (`cart id`, `product id`, `customer id` , `product price`) VALUES ('$cartId', '$productId', '$cusId' , $queryGetPrice*1)";
            $queryInsertExec = mysqli_query($connection, $queryInsert);



            $queryDelete = "DELETE FROM `wishlist` WHERE  `wishlist id` = '$wishlistId' and  `customer id`= '$cusId'";
            $queryDeleteExecute = mysqli_query($connection, $queryDelete);



            if ( $queryInsertExec && $queryDeleteExecute) {
                header("location:$currUrl?msg=item added from wishlist to cart");
            }
        }





    }

}







?>