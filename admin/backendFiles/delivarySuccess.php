<?php

require '../../backendFiles/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST);

    $orderId = $_POST['orderId'];

    // echo $orderId;

    $query = "UPDATE `order table` SET `ifDelivered`='Delivered' WHERE `order id`= '$orderId'";
    $queryExec = mysqli_query($connection, $query);

    if ($queryExec) {
        header("location:../adminIndex.php?msg= Delivary Successful");
    }
}

?>