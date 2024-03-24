<?php

// var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../../backendFiles/connection.php';

    $pdtName = $_POST['pdtName'];
    $pdtBrand = $_POST['pdtBrand'];
    $pdtPrice = $_POST['pdtPrice'];
    $pdtInStock = $_POST['pdtInStock'];
    $pdtDescription = $_POST['pdtDescription'];
    $pdtGender = $_POST['pdtGender'];
    $pdtType = $_POST['pdtType'];
    $productPopularTrending = $_POST['productPopularTrending'];
    $imageLink1 = $_POST['imageLink1'];
    $imageLink2 = $_POST['imageLink2'];
    $imageLink3 = $_POST['imageLink3'];
    $imageLink4 = $_POST['imageLink4'];


    if (empty ($pdtDescription)) {
        $insertQuery = "
        INSERT INTO `product table`(`product name`, `brand name`, `product in stock`, `product Gender Type`, `product category`, `product popular trending`, `product price`, `product image 1`, `product image 2`, `product image 3`, `product image 4`) 
        VALUES 
        ('$pdtName','$pdtBrand','$pdtInStock','$pdtGender','$pdtType','$productPopularTrending','$pdtPrice','$imageLink1','$imageLink2','$imageLink3','$imageLink4')
        ";
    }
    // if description empty
    elseif (!empty ($pdtDescription)) {
        $insertQuery = "
        INSERT INTO `product table`(`product name`, `brand name`, `product in stock`, `product description`, `product Gender Type`, `product category`, `product popular trending`, `product price`, `product image 1`, `product image 2`, `product image 3`, `product image 4`) 
        VALUES 
        ('$pdtName','$pdtBrand','$pdtInStock','$pdtDescription','$pdtGender','$pdtType','$productPopularTrending','$pdtPrice','$imageLink1','$imageLink2','$imageLink3','$imageLink4')
        ";
    }



    // echo "<pre>$insertQuery</pre>";

    $QueryExec = mysqli_query($connection, $insertQuery);
    if ($QueryExec) {
        header("location:../adminIndex.php?msg=Product added successfully");
    }




















}









?>