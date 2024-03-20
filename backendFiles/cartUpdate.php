<?php


session_start();


require './connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$cusId = $_SESSION['customerId'];
$cartId = $_POST['cartId'];
$currUrl = $_POST['currUrl'];


// getting product price 
$queryGetPrice = "select * from `product table` where `product id` = 
(select `product id` from `add to cart` where `cart id` ='$cartId' ); ";

$pdtPrice = mysqli_fetch_assoc(mysqli_query($connection , $queryGetPrice))['product price'];



// echo "<pre>$wishlistId    ||     $currUrl  </pre>";





if (isset($_POST['decrement'])) {

    $query = "UPDATE `add to cart` SET `product qty`=`product qty`-1 , `product price` = $pdtPrice* `product qty`   WHERE `cart id`= '$cartId' AND  `customer id` = '$cusId'";
    $queryExec = mysqli_query($connection , $query);

    if($queryExec){
        header("location:$currUrl?msg=Item quantity decreased by 1") ;
    }
}


elseif (isset($_POST['increment'])) {

    $query = "UPDATE `add to cart` SET `product qty`=`product qty`+1 , `product price` = $pdtPrice* `product qty`  WHERE `cart id`= '$cartId' AND  `customer id` = '$cusId'";
    $queryExec = mysqli_query($connection , $query);

    if($queryExec){
        header("location:$currUrl?msg=Item quantity increased by 1") ;
    }
}


}









?>

<!-- UPDATE `add to cart` SET `cart id`='[value-1]',`product id`='[value-2]',`customer id`='[value-3]',`product qty`='[value-4]' WHERE 1 -->