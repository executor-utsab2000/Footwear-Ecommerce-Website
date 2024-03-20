<?php

session_start();
if (isset($_SESSION['customerId'])) {


    $cusId = $_SESSION['customerId'];
    $name = $_SESSION['name'];
    // echo $cusId;

    $fName = (explode(" ", $name))[0];  // explodes is same as split in javascript
    // echo $cusId;
    require './backendFiles/connection.php';

    // $queryWishlistCount = "SELECT COUNT(`wishlist id`) FROM `wishlist` WHERE `customer id` = '$cusId'";
    // $countNumber = mysqli_num_rows(mysqli_query($connection, $queryWishlistCount));




    $productId = $_GET['productId'];
    $query = "SELECT * FROM `product table` where `product id` = $productId ;";
    // echo $query;

    $queryExec = mysqli_query($connection, $query);
    $pdtData = mysqli_fetch_assoc($queryExec);
    // var_dump($pdtData);
    $productName = $pdtData['product name'];
    $productBrand = $pdtData['brand name'];
    $productPrice = $pdtData['product price'];
    $productDescription = $pdtData['product description'];
    $productCateory = $pdtData['product category'];
    $productGender = $pdtData['product Gender Type'];
    $productImage1 = $pdtData['product image 1'];
    $productImage2 = $pdtData['product image 2'];
    $productImage3 = $pdtData['product image 3'];
    $productImage4 = $pdtData['product image 4'];
    $productQty = $pdtData['product in stock'];





    ?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <link rel="stylesheet" href="./style files/itemDetailsPage.scss" />
        <link rel="stylesheet" href="./style files/mediaQuery.scss" />
        <link rel="stylesheet" href="./style files/otherPageCategory.scss" />
        
    </head>

    <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 px-0">
                    <?php require './components/navbar.php' ?>
                </div>
            </div>


            <div class="container mt-5">
                <div class="row mt-5 mb-4 pt-3">
                    <div class="col-12 px-3 mt-5">
                        <div class="contentContainer mt-5">
                            <?php require './components/categoriesOtherPage.php' ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container">

                <!-- main content start -->
                <div class="row itemDetails" style="margin-top:10rem">


                    <div class="col-lg-5 my-2 my-lg-0 d-flex justify-content-center">
                        <div class="contentContainer">

                            <!-- image section -->
                            <div class="row">
                                <div class="col-12 mb-2 "> <!--  small image section -->
                                    <div class="contentContainer mb-2">
                                        <div class="row">
                                            <div class="col-3 d-flex justify-content-center">
                                                <div class="imgContainer">
                                                    <img src="<?php echo $productImage1 ?>" alt=""
                                                        class="img-fluid smallImgs">
                                                </div>
                                            </div>

                                            <div class="col-3 d-flex justify-content-center">
                                                <div class="imgContainer">
                                                    <img src="<?php echo $productImage2 ?>" alt=""
                                                        class="img-fluid smallImgs">
                                                </div>
                                            </div>

                                            <div class="col-3 d-flex justify-content-center">
                                                <div class="imgContainer">
                                                    <img src="<?php echo $productImage3 ?>" alt=""
                                                        class="img-fluid smallImgs">
                                                </div>
                                            </div>

                                            <div class="col-3 d-flex justify-content-center">
                                                <div class="imgContainer">
                                                    <img src="<?php echo $productImage4 ?>" alt=""
                                                        class="img-fluid smallImgs">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 "> <!--  big image section -->
                                    <div class="contentContainer">
                                        <div class="imgContainer">
                                            <img src="<?php echo $productImage1 ?>" alt="" class="img-fluid"
                                                id="bigDisplay">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-7 px-3 d-flex justify-content-center">
                        <div class="contentContainer itemDetailsContent px-3">
                            <div class="header">
                                <?php echo $productName ?>
                            </div>
                            <div class="brandName">
                                <?php echo $productBrand ?>
                            </div>
                            <div class="price"> ₹
                                <?php echo number_format($productPrice) ?>
                            </div>
                            <div class="description">Product Description :<p>
                                    <?php echo $productDescription ?>
                                </p>
                            </div>
                            <div class="stock">Total Quantity in Stock : <span>
                                    <?php echo $productQty ?>
                                </span></div>
                            <div class="gender">Suitable for : <span>
                                    <?php echo $productGender ?>
                                </span></div>
                            <div class="category  mb-3"> product type : <span>
                                    <?php echo $productCateory ?>
                                </span></div>
                        </div>
                    </div>
                </div>
                <!-- main content  end -->

                <!-- BUTTONS -->
                <div class="contentContainer itemDetailsButtons">
                    <div class="row ">


                        <div class="col-lg-5 my-2 my-md-auto ">
                            <div class="contentContainer py-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-center my-2 my-md-0">
                                        <form action="./backendFiles/wishlistBackend.php" method="post">
                                            <input type="hidden" name="currPageUrl" class="currPageUrl">
                                            <input type="hidden" name="productId" value="<?php echo $productId ?>">
                                            <button type="submit" class="wishlist">
                                                <i class="fa-solid fa-heart me-2"></i>
                                                Add to Wishlist
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-center my-2 my-md-0 ">
                                        <form action="./backendFiles/addToCartBackend.php" method="post">
                                            <input type="hidden" name="currPageUrl" class="currPageUrl">
                                            <input type="hidden" name="productId" value="<?php echo $productId ?>">
                                            <button type="submit" class="cart" name="addItems">
                                                <i class="fa-solid fa-cart-arrow-down me-2"></i>
                                                Add to Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-7 my-2 my-lg-0 ">
                            <form action="./orderSummaryPage.php" method="post" id="buy">
                                <div class="container row ">
                                    <div class="col-12 text-center mb-2 px-0 ">
                                        <input type="hidden" name="productId" value="<?php echo $productId ?>">
                                        <button type="button" id="decrement">-</button>
                                        <input type="text" name="productQuantity" id="productQuantity" value="1" readonly>
                                        <!-- <input type="hidden" name="currPageUrl" class="currPageUrl"> -->
                                        <button type="button" id="increment">+</button>
                                        <p>Maximum <span class="text-danger"> 5 </span> Products you can buy</p>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button type="submit" name="singlePdt" >
                                            <i class="fa-solid fa-bolt-lightning me-2"></i>
                                            Buy
                                        </button>
                                    </div>
                                </div>
                            </form>
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



            <?php

            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];

                echo '
            <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="alert alert-warning alert-dismissible fade show alertBox" role="alert">
                    <strong></strong> ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alertCancel"></button>
                </div>
            </div>
        </div>
            ';
            }

            ?>
        </div>
    </body>


    <script>




        document.querySelectorAll(".smallImgs").forEach((e) => {
            e.addEventListener('mouseover', () => {
                // console.log(e.getAttribute('src'));
                let imgAttr = e.getAttribute('src');
                document.getElementById('bigDisplay').setAttribute('src', imgAttr)
            })
        })





        document.getElementById('decrement').addEventListener('click', () => {

            let currValue = parseInt(document.getElementById('productQuantity').value);
            if (currValue == 1) {
                document.getElementById('decrement').disabled = true;
            }
            else {
                document.getElementById('increment').disabled = false;
                document.getElementById('productQuantity').value = parseInt((currValue - 1));
            }

        })





        document.getElementById('increment').addEventListener('click', () => {

            let currValue = parseInt(document.getElementById('productQuantity').value);
            if (currValue == 5) {
                document.getElementById('increment').disabled = true;
            }
            else {
                document.getElementById('decrement').disabled = false;
                document.getElementById('productQuantity').value = parseInt((currValue + 1));
            }

        })





        document.querySelectorAll('.currPageUrl').forEach((e) => {
            e.value = window.location.href;
        })









        document.getElementById('alertCancel').addEventListener('click', () => {
            let currUrl = window.location.href;
            let msgIndex = currUrl.split('&');
            console.log(msgIndex);
            window.location.href = msgIndex[0];

        })










    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    </html>

    <?php

} else {
    header("location:./login.php");
}




?>