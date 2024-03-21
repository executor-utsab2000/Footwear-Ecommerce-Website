<?php

require './connection.php' ;

if($_SERVER['REQUEST_METHOD']=='POST'){
    // var_dump($_POST);

    $customerId = $_POST['customerId'] ;

    $query = "UPDATE `order table` SET `ifDelivered`='Delivered' WHERE `customer id`= '$customerId'";
    $queryExec = mysqli_query($connection , $query) ;

    if($queryExec){
        header("location:../adminIndex.php?msg= Delivary Successful") ;
    }
}


?>