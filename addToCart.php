<?php

session_start();
if (isset($_SESSION['customerId'])) {

    require './backendFiles/connection.php';


    $cusId = $_SESSION['customerId'];
    $name = $_SESSION['name'];
    $fName = (explode(" ", $name))[0];  // explodes is same as split in javascript
    // echo $cusId;


    $query = "select `add to cart`.`cart id` , `add to cart`.`product qty`  , `add to cart`.`product id` ,   `add to cart`.`product price` ,`product table`.`product id` , `product table`.`product image 1` , `product table`.`product name` , 
    `product table`.`brand name`   from `product table` join `add to cart` on  `product table`.`product id` = `add to cart`.`product id`
    where `add to cart`.`customer id` = '$cusId' ;";
    $queryExec = mysqli_query($connection, $query);
    // $data = mysqli_fetch_assoc($queryExec);
    $resCount = mysqli_num_rows($queryExec);
    // echo  $resCount ;


    $delivaryCharge = $resCount * 40;





    $sumPrice = "SELECT SUM(`product price`) as `totalSum` from `add to cart` where `customer id` = '$cusId'";
    $queryGetSum = mysqli_fetch_assoc(mysqli_query($connection, $sumPrice))['totalSum'];
    // echo $queryGetSum;


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
        <link rel="stylesheet" href="./style files/addToCart.scss" />
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
                        <div class="pageHeader">My Cart</div>

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
                        <div class="countResult">𝗧𝗼𝘁𝗮𝗹 𝗣𝗿𝗼𝗱𝘂𝗰𝘁𝘀 𝗦𝘁𝗼𝗿𝗲𝗱 :( <span>
                                <?php echo $resCount ?>
                            </span>)</div>
                    </div>
                </div>

                <!-- ---------------------------------------------------------------------------------------------------------------- -->

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

                    echo '
                        <div class="row">
                        <div class="col-md-9">
                        ';





                    while ($data = mysqli_fetch_assoc($queryExec)) {
                        // var_dump($data);
            
                        $cartId = $data['cart id'];
                        $productId = $data['product id'];
                        $productImage = $data['product image 1'];
                        $productName = $data['product name'];
                        $productBrand = $data['brand name'];
                        $productPrice = $data['product price'];
                        $productQuantity = $data['product qty'];


                        echo '
                        
                        <div class="row my-3 px-2 mx-0">
                        <div class="col-12">
                            <a href="" class="nav-link">
                                <div class="contentContainer cart py-4">
                                    <div class="row">
                                        <div class="col-lg-10 px-2">
                                            <div class="row">
                                                <div class=" col-lg-3 mb-5 mb-lg-0 ">
                                                    <div class="imgContainer">
                                                        <img src="' . $productImage . '" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="formUpdateQty">
                                                        <form action="backendFiles/cartUpdate.php" method ="post">
                                                            <button type="submit" id="decrement" class="decrement" name="decrement">-</button>
                                                            <input type="hidden" name="currUrl" class="currUrl">
                                                            <input type="hidden" value="' . $cartId . '" name="cartId">
                                                            <input type="text" name="productQuantity" id="productQuantity" value="' . $productQuantity . '"readonly>
                                                            <button type="submit" id="increment" class="increment" name="increment">+</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="productTitle">' . $productName . '</div>
                                                    <div class="productBrand">' . $productBrand . ' </div>
                                                    <div class="price itemPrice"> ₹ ' . number_format($productPrice) . ' /-</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <form action="backendFiles/cartDelete.php" method="POST">
                                                <input type="hidden" value="' . $cartId . '" name="cartId">
                                                <input type="hidden" name="currUrl" class="currUrl">
                                                <button type="submit" class="deleteIcon">
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Delete Item!">
                                                        <i class="fa-solid fa-trash-can"></i>
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
                    echo '
                    
                    <div class="row my-3 px-2 mx-0">
                        <div class="col-12">
                            <div class="contentContainer placeOrderDiv d-flex justify-content-end py-4 pe-3">
                                <form action="orderSummaryPage.php" method="post">                                    
                                    <button type="submit" name="addToCartToOrder">Place order</button>
                                </form>                           
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    ';



                    // right panel  start
                    echo '                    
                        </div>

                        <div class="col-md-3 mt-3">
                                <div class="contentContainer priceDetails px-3 ">
                                    <div class="priceHeader">price details</div>
                                    <div class="subHeaders d-flex justify-content-between pt-2 mt-3">
                                        <span>Price (' . $resCount . ' Items)</span>
                                        <span> ₹ ' .number_format( $queryGetSum) . '</span>
                                    </div>
                                    <div class="subHeaders d-flex justify-content-between my-1">
                                        <span>Discount</span>
                                        <span class="text-success"> ₹ ' . number_format((-($queryGetSum * (30 / 100)))) . '</span>
                                    </div>
                                    <div class="subHeaders d-flex justify-content-between my-1">
                                        <span>Delivary Charges</span>
                                        <span class="text-success"> <span class="cancel"> ₹ ' . $delivaryCharge . ' </span> Free</span>
                                    </div>
                                    <div class="totalAmount d-flex justify-content-between mt-4 mb-2">
                                        <span>Total Amount</span>
                                        <span>  ₹ ' . number_format($queryGetSum) . '  </span>
                                    </div>
                                    <div class="comment d-flex justify-content-between mt-3 mb-2">
                                        You saved ₹ ' . number_format((($queryGetSum * (30 / 100)) + $delivaryCharge))  . '
                                    </div>
                                </div>
                            </div>


                    </div> 
                    
                    ';
                }


                ?>


                <!-- wislist items end -->
                <!-- container end -->
            </div>


            <div class="row mt-4">
                <div class="col-12 py-2 bg-dark text-warning text-center footer">
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






    </script>

    </html>


    <?php

} else {
    header("location:./login.php");
}




?>