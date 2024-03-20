<?php

session_start();
if (isset($_SESSION['customerId'])) {

    require './backendFiles/connection.php';


    $cusId = $_SESSION['customerId'];
    $name = $_SESSION['name'];
    $fName = (explode(" ", $name))[0];  // explodes is same as split in javascript
    // echo $cusId;

    // $queryWishlistCount = "SELECT COUNT(*) FROM `wishlist` WHERE `customer id` = '$cusId'";
    // $countNumber = mysqli_num_rows(mysqli_query($connection, $queryWishlistCount));
    // echo $countNumber ;




    $query = "SELECT `wishlist`.`wishlist id`  , `wishlist`.`product id` , `product table`.`product id` , `product table`.`product image 1` , `product table`.`product name` , 
    `product table`.`brand name` ,  `product table`.`product price`  FROM `product table` JOIN `wishlist` ON  `product table`.`product id` = `wishlist`.`product id`
    where `wishlist`.`customer id` = '$cusId' ;";
    $queryExec = mysqli_query($connection, $query);
    // $data = mysqli_fetch_assoc($queryExec);
    $resCount = mysqli_num_rows($queryExec);
    // echo  $resCount ;

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <link rel="stylesheet" href="./style files/navbar.scss" />
        <link rel="stylesheet" href="./style files/contentContainer.scss" />
        <link rel="stylesheet" href="./style files/wishlist.scss" />
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
                        <div class="pageHeader">My Wishlist</div>
                    </div>
                </div>
            </div>


            <div class="container ">
                <div class="row my-4">
                    <div class="col-12 px-3">
                        <div class="contentContainer ">
                            <?php require './components/categoriesOtherPage.php' ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container mt-4">


                <div class="row mb-5">
                    <div class="col-12">
                        <div class="countResult">𝗧𝗼𝘁𝗮𝗹 𝗥𝗲𝘀𝘂𝗹𝘁𝘀 𝗙𝗼𝘂𝗻𝗱 :( <span>
                                <?php echo $resCount ?>
                            </span>)</div>
                    </div>
                </div>

                <!-- wislist items start -->

                <?php

                if ($resCount < 1) {
                    echo '
                    <div class="row mt-4">
                    <div class="col-12">
                        <div class="contentContainer emptyWishlist" >
                            <img src="images/emptyWishlist.png" alt="" class="img-fluid my-3">
                            <div>please fill me out with something </div>
                        </div>
                    </div>
                </div>
                    ';
                } else {
                    while ($data = mysqli_fetch_assoc($queryExec)) {

                        $wishlistId = $data['wishlist id'];
                        $productId = $data['product id'];
                        $productName = $data['product name'];
                        $productImage = $data['product image 1'];
                        $productBrand = $data['brand name'];
                        $productPrice = number_format($data['product price']);

                        // var_dump($data);
            


                        echo '
                                  
                    <div class="row my-4">
                    <div class="col-12">
                    <a class="nav-link" href="itemDetailspage.php?productId=' . $productId . '">
                        <div class="contentContainer wishlist">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="imgContainer">
                                                <img src="' . $productImage . '"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-10 pt-3">
                                            <div class="productTitle">' . $productName . '</div>
                                            <div class="productBrand">' . $productBrand . ' </div>
                                            <div class="price"> ₹ ' . $productPrice . ' /-</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                <form action="./backendFiles/deleteWishlist.php" method="POST">
                                    <input type="hidden" value="' . $wishlistId . '" name="wishlistId">
                                    <input type="hidden" name="currUrl" class="currUrl">
                                    <button type="submit" class="wishlistIcon" name="deleteItem" >
                                        <span data-toggle="tooltip" data-placement="top" title="Delete Item!">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </span>
                                    </button>
                                    <button type="submit" class="wishlistIcon" name="addToCart" >
                                        <span data-toggle="tooltip" data-placement="top" title="Add Item to Cart">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </span>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>                
                    ';

                    }

                }



                ?>
                <!-- wislist items end -->
                <!-- container end -->
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


    <script>
        // delete btn popover 
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });



        document.querySelectorAll('.currUrl').forEach((elm) => elm.value = window.location.href)



    </script>

    </html>


    <?php

} else {
    header("location:./login.php");
}




?>