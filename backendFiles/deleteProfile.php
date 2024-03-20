<?php




session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);

    require './connection.php';

    $cusId = $_SESSION['customerId'];


    $queryWishistDelete = "DELETE FROM `wishlist` WHERE `customer id` = '$cusId'";
    $queryWishistDeleteExce = mysqli_query($connection, $queryWishistDelete);


    $queryAddtoCartDelete = "DELETE FROM `add to cart` WHERE `customer id` = '$cusId'";
    $queryAddtoCartDeleteExce = mysqli_query($connection, $queryAddtoCartDelete);


    $queryOrderDelete = "DELETE FROM `order table` WHERE `customer id` = '$cusId'";
    $queryOrderDeleteExce = mysqli_query($connection, $queryOrderDelete);




    if ($queryWishistDeleteExce && $queryAddtoCartDeleteExce && $queryOrderDeleteExce) {


        $dummyImage = "https://static.vecteezy.com/system/resources/previews/003/715/527/non_2x/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg";
        $currImage = $_POST['currImage'];

        $customerDetailsDelete = "DELETE FROM `customer` WHERE `customer id` = '$cusId'";
        $queryCusDel = mysqli_query($connection, $customerDetailsDelete);

        if ($queryCusDel) {

            if ($currImage != $dummyImage) {
                unlink("../$currImage");
            }

            session_unset();
            session_destroy();
            header("location:../signUp.php?msg=Account Deleted Successfully");

        }
    }






}



























?>