<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../../backendFiles/connection.php';
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";


    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productImage1 = $_POST['productImage1'];
    $productImage2 = $_POST['productImage2'];
    $productImage3 = $_POST['productImage3'];
    $productImage4 = $_POST['productImage4'];
    $productBrand = $_POST['productBrand'];
    $productGender = $_POST['productGender'];
    $productCategory = $_POST['productCategory'];
    $categoryProductPopular = $_POST['categoryProductPopular'];
    $productInStock = $_POST['productInStock'];
    $productPrice = $_POST['productPrice'];



    $query = "UPDATE `product table` SET 
                `product name`='$productName',
                `brand name`='$productBrand',
                `product in stock`='$productInStock',
                `product Gender Type`='$productGender',
                `product category`='$productCategory',
                `product popular trending`='$categoryProductPopular',
                `product price`='$productPrice',
                `product image 1`='$productImage1',
                `product image 2`='$productImage2',
                `product image 3`='$productImage3',
                `product image 4`='$productImage4'
                WHERE `product id`= $productId";


    $queryExec = mysqli_query($connection, $query);
   
   
    if ($queryExec) {
       header("location:../adminIndex.php?msg=Product Updated Successfully");
    }




















}
















?>