<?php


session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require './connection.php';

    $cusId = $_SESSION['customerId'];






    if (isset($_POST['addToCartToOrder'])) {
        // echo 'addToCartToOrder';

        $fetchQuery = "SELECT * FROM `add to cart` WHERE `customer id`= '$cusId'";
        $queryExec = mysqli_query($connection, $fetchQuery);

        while ($getData = mysqli_fetch_assoc($queryExec)) {
            // var_dump($getData);

            $productId = $getData['product id'];
            $productQuantityOrdered = $getData['product qty'];
            $amountPayable = $getData['product price'];

            $orderId = uniqid('order-');
            $insertQuery = "INSERT INTO `order table`(`order id`, `product id`, `quantity ordered`, `amount payable`, `customer id`)
                             VALUES ('$orderId','$productId','$productQuantityOrdered','$amountPayable','$cusId')";
            $queryInsertExec = mysqli_query($connection, $insertQuery);


            $reduceQtyQuery = "UPDATE `product table` SET `product in stock`= `product in stock`-$productQuantityOrdered where `product id`=$productId";
            $reduceQtyQueryExec = mysqli_query($connection, $reduceQtyQuery);


        }

        $deleteCart = "DELETE FROM `add to cart` WHERE `customer id`= '$cusId'";
        $deleteCartExec = mysqli_query($connection, $deleteCart);

        if ($queryInsertExec && $deleteCartExec) {
            header("location:../index.php?successMsg = Order Placed Successfully");
        }
    }









    elseif(isset($_POST['singlePdt'])){
        // var_dump($_POST);
        $singlePdtId = $_POST['singlePdtId'];
        $singlePdtQuantity = $_POST['singlePdtQuantity'];

        $getPrice = mysqli_fetch_assoc(mysqli_query( $connection ,  "SELECT * FROM `product table` where `product id` = $singlePdtId"))['product price'];
        
        $orderId = uniqid('order-');
        $insertQuery = "INSERT INTO `order table`(`order id`, `product id`, `quantity ordered`, `amount payable`, `customer id`)
                         VALUES ('$orderId','$singlePdtId','$singlePdtQuantity','$getPrice*$singlePdtQuantity','$cusId')";
        $queryInsertExec = mysqli_query($connection, $insertQuery);

        if ($queryInsertExec) {
            header("location:../index.php?successMsg = Order Placed Successfully");
        }
        
      
    }
































}

































?>