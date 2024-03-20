<?php

session_start();
require './backendFiles/connection.php';
if (isset($_SESSION['customerId'])) {
    $cusId = $_SESSION['customerId'];
    $name = $_SESSION['name'];
    // echo $cusId;


    $fName = (explode(" ", $name))[0];  // explodes is same as split in javascript
    // echo $cusId;
    require './backendFiles/connection.php';

    // $queryWishlistCount = "SELECT COUNT(`wishlist id`) FROM `wishlist` WHERE `customer id` = '$cusId'";
    // $countNumber = mysqli_num_rows(mysqli_query($connection, $queryWishlistCount));




    $query = "SELECT * FROM `product table`";


    if (isset($_GET['categoryColumnName'])) {
        $category = $_GET['categoryColumnName'];
        $categoryValue = $_GET['columnValue'];

        $updatedQuery = "$query WHERE `$category` = '$categoryValue';";

        if (isset($_GET['genderCol'])) {
            $genderCol = $_GET['genderCol'];
            $genderValue = $_GET['genderValue'];

            $updatedQuery = "$query WHERE `$category` = '$categoryValue' AND `$genderCol`='$genderValue';";

            if (isset($_GET['priceCol'])) {
                $priceCol = $_GET['priceCol'];
                $PriceValue = $_GET['PriceValue'];

                $updatedQuery = "$query WHERE `$category` = '$categoryValue' AND `$priceCol`>=$PriceValue AND `$genderCol`='$genderValue' ;";

            }
        } elseif (isset($_GET['priceCol'])) {
            $priceCol = $_GET['priceCol'];
            $PriceValue = $_GET['PriceValue'];

            $updatedQuery = "$query WHERE `$category` = '$categoryValue' AND `$priceCol`>=$PriceValue;";

        }



    } elseif (!isset($_GET['categoryColumnName'])) {
        $genderCol = $_GET['genderCol'];
        $genderValue = $_GET['genderValue'];
        $priceCol = $_GET['priceCol'];
        $PriceValue = $_GET['PriceValue'];

        $updatedQuery = "$query WHERE `$genderCol` = '$genderValue' AND `$priceCol`>=$PriceValue;";
    }

    // query to execute
// echo $updatedQuery; 
    $queryExecute = mysqli_query($connection, $updatedQuery);
    // echo "<br>";
    $resCount = mysqli_num_rows($queryExecute);

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Shoe Factory ||
            <?php echo $name ?>
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />


        <link rel="stylesheet" href="./style files/navbar.scss" />
        <link rel="stylesheet" href="./style files/contentContainer.scss" />
        <link rel="stylesheet" href="./style files/CategoryPage.scss" />
        <link rel="stylesheet" href="./style files/otherPageCategory.scss" />


    </head>

    <body>


        <div class="container-fluid">

            <div class="row">
                <div class="col-12 px-0">
                    <?php require './components/navbar.php' ?>
                </div>
            </div>


            <div class="row">
                <div class="col-12 px-0">
                    <div class="otherpageTop">
                        <div class="backgroundOverLay"></div>

                        <div class="pageHeader">Category</div>

                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row my-4">
                    <div class="col-12 px-3">
                        <div class="contentContainer ">
                            <?php require './components/categoriesOtherPage.php' ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container my-4 d-block d-lg-none">
                <div class="row">
                    <div class="col-12 px-0">
                        <div class="contentContainer d-flex justify-content-center">
                            <form action="" method="get" class="formSearch">
                                <input type="search" name="" id="" class="searchBar ps-3" placeholder="Search Products">
                                <button type="submit" class="searchBtn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container mt-4">


                <div class="row">
                    <div class="col-12">
                        <div class="countResult">𝗧𝗼𝘁𝗮𝗹 𝗥𝗲𝘀𝘂𝗹𝘁𝘀 𝗙𝗼𝘂𝗻𝗱 : <span>
                                <?php echo $resCount ?>
                            </span></div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="contentContainer">
                            <div class="row">

                                <?php

                                if ($resCount == 0) {
                                    echo '<div class="col-12 noResTxt"> Opps !! No Product Found . </div>';
                                } else {
                                    while ($pdtData = mysqli_fetch_assoc($queryExecute)) {
                                        $productId = $pdtData['product id'];
                                        $productName = $pdtData['product name'];
                                        $productPrice = $pdtData['product price'];
                                        $productImage = $pdtData['product image 1'];
                                        // $productQuantity = $pdtData['product in stock'];
                            
                                        // var_dump($pdtData);
                            
                                        echo '
                                        <div class="col-lg-3 col-md-6 my-3 mx-auto d-flex justify-content-center">
                                        <div class="contentContainer categoryPdtCard">
                                            <a class="nav-link" href="itemDetailspage.php?productId=' . $productId . '" target="_blank">
                                                <div class="card">
                                                    <div class="imgContainer">
                                                        <img src="' . $productImage . '" alt="...">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center"> ' . $productName . '</h5>
                                                        <h5 class="card-title text-center text-danger pt-4"> ₹ ' . number_format($productPrice) . ' /-</h5>
                                                        </div>
                                                        </div>
                                            </a>
                                            </div>
                                    </div>
                                        ';

                                    }

                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row mt-4">
                <div class="col-12 py-5 bg-dark text-warning text-center">
                    Footer
                    <p>The Information are Subjected to Copyright</p>
                </div>
            </div>
        </div>


    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    </html>

    <?php

} else {
    header("location:./login.php");
}




?>