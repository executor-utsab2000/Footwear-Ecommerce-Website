<?php

session_start();
if (isset ($_SESSION['customerId'])) {
    $cusId = $_SESSION['customerId'];
    $name = $_SESSION['name'];

    $fName = ucwords((explode(" ", $name))[0]);  // explodes is same as split in javascript
    require './backendFiles/connection.php';
    // var_dump($_POST);

    $email = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `customer` where  `customer id` = '$cusId'"))['customer email'];
    $address = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `customer` where  `customer id` = '$cusId'"))['address'];


    if (isset ($_POST['singlePdt'])) {
        $productId = $_POST['productId'];
        $productQuantity = $_POST['productQuantity'];
        $fetchQuery = "SELECT * FROM `product table` where `product id` = $productId";

        $getPrice = mysqli_fetch_assoc(mysqli_query($connection, $fetchQuery))['product price'];
        $queryGetSum = $productQuantity * $getPrice;


    } elseif (isset ($_POST['addToCartToOrder'])) {
        $fetchQuery = "select `add to cart`.`cart id` , `add to cart`.`product qty`  , `add to cart`.`product id` , `product table`.`product id` , `product table`.`product image 1` , `product table`.`product name` , 
        `product table`.`brand name` ,  `product table`.`product price`  from `product table` join `add to cart` on  `product table`.`product id` = `add to cart`.`product id`  where `add to cart`.`customer id` = '$cusId' ;";


        $sumPrice = "SELECT SUM(`product price`) as `totalSum` from `add to cart` where `customer id` = '$cusId'";
        $queryGetSum = mysqli_fetch_assoc(mysqli_query($connection, $sumPrice))['totalSum'];
        // echo $queryGetSum;
    }


    $QueryExec = mysqli_query($connection, $fetchQuery);
    $resCount = mysqli_num_rows($QueryExec);

    $delivaryCharge = 40;
    if ($resCount <= 1) {
        $delivaryCharge = 40;
    } elseif ($resCount <= 4) {
        $delivaryCharge = 80;
    } elseif ($resCount > 4) {
        $delivaryCharge = 100;
    }



    // echo $fetchQuery ; 
    // while ($row = mysqli_fetch_assoc($QueryExec)) {
    //     echo "<pre>";
    //     var_dump($row);
    //     echo "</pre><br>";
    // }


    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title> Shoe Factory ||
            <?php echo ucwords($name) ?>
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


        <link rel="stylesheet" href="./style files/navbar.scss" />
        <link rel="stylesheet" href="./style files/contentContainer.scss" />
        <link rel="stylesheet" href="./style files/orderSummaryPage.scss" />


    </head>

    <body>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12 px-0">
                    <div class="header">
                        <div class="container">
                            <a class="navbar-brand" href="index.php">
                                <img src="https://i0.wp.com/jetprintapp.com/wp-content/uploads/2022/10/1666062839-custom-shoes-1.png?resize=800%2C400&ssl=1"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 px-0">
                    <div class="otherpageTop" style="height: 20vh;">
                        <div class="backgroundOverLay"></div>
                        <div class="pageHeader">My Order Summary</div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">

                <div class="row">
                    <div class="col-12">
                        <div class="row">


                            <div class="col-lg-9">

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="contentContainer orderSummary">
                                            <div class="headerOrder">
                                                Login Details
                                            </div>
                                            <div class="content ">
                                                <span class="emailTxt">
                                                    <?php echo $email ?>
                                                </span>
                                                <span class="name">
                                                    <?php echo ucwords($name) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="contentContainer orderSummary">
                                            <div class="headerOrder">
                                                Delivary Address
                                            </div>

                                            <div class="content p-0">
                                                <div class="leftContent mt-2">
                                                    <div class="row">
                                                        <div class="col-md-10 mb-2">
                                                            <textarea name="address" id="address"
                                                                readonly><?php echo $address ?></textarea>
                                                        </div>
                                                        <div class="col-md-2 my-auto d-flex justify-content-center">
                                                            <a href="profilePage.php" class="nav-link">
                                                                <button id="updateBtn">Edit</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="contentContainer orderSummary orderSummaryContent">
                                            <div class="headerOrder">
                                                Order Summary
                                            </div>
                                            <div class="content">


                                                <?php

                                                while ($data = mysqli_fetch_assoc($QueryExec)) {
                                                    // var_dump($data);
                                                    $image = $data['product image 1'];
                                                    $productName = $data['product name'];
                                                    $productBrand = $data['brand name'];
                                                    $productPrice = $data['product price'];

                                                    echo '
                                                                    <div class="row my-3 orderItems">
                                                                    <div class="col-md-3  d-flex justify-content-center">
                                                                        <div class="imgContainer">
                                                                            <img src="' . $image . '"  alt="" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-7 my-auto">
                                                                        <div class="pdtName">' . $productName . '</div>
                                                                        <div class="pdtBrand">' . $productBrand . '</div>
                                                                        <div class="pdtqty">' . (isset ($_POST['addToCartToOrder']) ? $data['product qty'] : $productQuantity) . ' Piece</div>
                                                                    </div>
                                                                    <div class="col-md-2 d-flex align-items-center text-center">
                                                                        <div class="pdtPrice">₹ ' . number_format($productPrice * (isset ($_POST['addToCartToOrder']) ? $data['product qty'] : $productQuantity)) . '</div>
                                                                    </div>
                                                                </div>
                                                            ';

                                                }

                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row my-3">
                                    <div class="col-12">
                                        <div class="contentContainer placeOrderDiv d-flex justify-content-end py-4 pe-3">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <div class="row">
                                                        <div class="col-md-6 my-2 d-flex justify-content-center">
                                                            <button type="button" class="bg-danger"
                                                                id="cancelBtn">Cancel</button>
                                                        </div>
                                                        <div class="col-md-6 my-2 d-flex justify-content-center ">
                                                            <form action="backendFiles/orderPlace.php" method="post">
                                                                <?php echo isset ($_POST['singlePdt']) ?
                                                                    "<input type='hidden' name='singlePdtId' value='$productId'> 
                                                                     <input type='hidden' name='singlePdtQuantity' value='$productQuantity'>"
                                                                    : null ?>
                                                                <button type="submit" id="placeOrder"
                                                                    name="<?php echo isset ($_POST['singlePdt']) ? "singlePdt" : "addToCartToOrder" ?>">Place
                                                                    order</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <div class="contentContainer priceDetails px-3 ">
                                    <div class="priceHeader">price details</div>
                                    <div class="subHeaders d-flex justify-content-between pt-2 mt-3">
                                        <span>Price (
                                            <?php echo $resCount ?> Items )
                                        </span>
                                        <span> ₹
                                            <?php echo $queryGetSum ?>
                                        </span>
                                    </div>
                                    <div class="subHeaders d-flex justify-content-between my-1">
                                        <span>Discount</span>
                                        <span class="text-success"> ₹
                                            <?php echo (-($queryGetSum * (30 / 100))) ?>
                                        </span>
                                    </div>
                                    <div class="subHeaders d-flex justify-content-between my-1">
                                        <span>Delivary Charges</span>
                                        <span class="text-success"> <span class="cancel"> ₹
                                                <?php echo $delivaryCharge ?>
                                            </span>
                                            Free</span>
                                    </div>
                                    <div class="totalAmount d-flex justify-content-between mt-4 mb-2">
                                        <span>Total Amount</span>
                                        <span> ₹
                                            <?php echo $queryGetSum ?>
                                        </span>
                                    </div>
                                    <div class="comment d-flex justify-content-between mt-3 mb-2">
                                        You saved ₹
                                        <?php echo (($queryGetSum * (30 / 100)) + $delivaryCharge) ?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>




        </div>

        </div>



    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>

        let address = document.getElementById('address').value;
        let placeOrder = document.getElementById('placeOrder');
        let updateBtn = document.getElementById('updateBtn');
        // console.log(placeOrder);
        // console.log(address);


        placeOrder.addEventListener('click', (event) => {

            if (address == "Enter Your Address") {
                // console.log('yes');
                event.preventDefault();
                window.location.href = "profilePage.php";
            }
        })

        document.getElementById("cancelBtn").addEventListener("click", () => {
            history.go(-1);   //to go one page back 
        });




    </script>

    </html>
    <?php

} else {
    header("location:./login.php");
}




?>