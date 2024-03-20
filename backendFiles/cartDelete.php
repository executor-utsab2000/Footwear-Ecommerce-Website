<?php


session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST')
    require './connection.php';

$cusId = $_SESSION['customerId'];
$cartId = $_POST['cartId'];
$currUrl = $_POST['currUrl'];

// echo "<pre>$wishlistId    ||     $currUrl  </pre>";

$query = "DELETE FROM  `add to cart`  WHERE  `cart id` = '$cartId' and  `customer id`= '$cusId'";
$queryExec = mysqli_query($connection, $query);

if ($queryExec) {
    header("location:$currUrl?msg=item removed from cart");
}










?>