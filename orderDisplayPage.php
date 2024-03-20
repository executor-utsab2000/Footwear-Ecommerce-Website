<?php

session_start();
if (isset ($_SESSION['customerId'])) {
  $cusId = $_SESSION['customerId'];
  $name = $_SESSION['name'];

  $fName = ucwords((explode(" ", $name))[0]);  // explodes is same as split in javascript
  require './backendFiles/connection.php';
  // var_dump($_POST);


  $fetchQUery = "select `order table`.`quantity ordered` , `order table`.`amount payable` , `order table`.`order dt` , `order table`.`ifDelivered` , `order table`.`superCoinsAwarded` ,`product table`.`product image 1` , `product table`.`product name` , `product table`.`product category`   from `product table` join `order table` on  `product table`.`product id` = `order table`.`product id` where `order table`.`customer id` ='$cusId'";

  if(isset($_GET['filterOrder'])){
    if($_GET['filterOrder']=='delivered'){
      $fetchQUery = "$fetchQUery AND `order table`.`ifDelivered` = 'Delivered'" ;
    }    
    elseif($_GET['filterOrder']=='undelivered'){
      $fetchQUery = "$fetchQUery AND `order table`.`ifDelivered` = 'Not Delivered'" ;
    }    
  }

  $QueryExec = mysqli_query($connection, $fetchQUery);





  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shoe Factory ||
      <?php echo $name ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="./style files/navbar.scss" />
    <link rel="stylesheet" href="./style files/contentContainer.scss" />
    <link rel="stylesheet" href="./style files/orderDisplayPage.scss" />
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
            <div class="pageHeader">My Orders</div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row my-4">
          <div class="col-12 px-3">
            <div class="contentContainer">
              <?php require './components/categoriesOtherPage.php' ?>
            </div>
          </div>
        </div>
      </div>

      <div class="container">


        <div class="row">
          <div class="col-12">
            <div class="contentContainer searchContainer">
              <form action="#" method="get">
                <input type="search" name="searchOrder" placeholder="Search Your Order" />
                <button type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </div>
          </div>
        </div>



      <div class="row mt-4">
        <div class="col-12">
          <div class="contentContainer statusButtons">
          <div class="row">
          <div class="col-md-4 d-flex justify-content-center">
            <a href="orderDisplayPage.php" class="nav-link">
              <button type="button"  class="all" >
                <i class="fa-solid fa-box-open"></i>
                All Orders
              </button>
            </a>
          </div>

          <div class="col-md-4 d-flex justify-content-center">
            <a href="orderDisplayPage.php?filterOrder=delivered" class="nav-link">
              <button type="button"  class="delivered">
                <i class="fa-solid fa-circle-check"></i>
                Delivered Orders
              </button>
            </a>
          </div>

          <div class="col-md-4 d-flex justify-content-center">
            <a href="orderDisplayPage.php?filterOrder=undelivered" class="nav-link">
              <button type="button"  class="undelivered">
                <i class="fa-solid fa-circle-xmark"></i>
                Undelivered Orders
              </button>
            </a>
          </div>
        </div>
          </div>
        </div>
      </div>





        <!-- repeatable order Items start -->
        <?php

        while ($data = mysqli_fetch_assoc($QueryExec)) {

          $productImage = $data['product image 1'];
          $productName = $data['product name'];
          $productQuantityOrdered = $data['quantity ordered'];
          $productType = $data['product category'];
          $amountPayable = $data['amount payable'];
          $orderDt = $data['order dt'];
          $ifDelivered = $data['ifDelivered'];
          $superCoinsAwarded = $data['superCoinsAwarded'];

          ?>


          <div class="row my-4">
            <div class="col-12">
              <div class="contentContainer orderItems">
                <div class="row px-4">
                  <div class="col-lg-8 ">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="col-4 d-flex justify-content-center">
                            <div class="imgContainer">
                              <img src="<?php echo $productImage ?>" alt="" class="img-fluid">
                            </div>
                          </div>
                          <div class="col-8 my-auto">
                            <div class=" my-3 pdtName">
                              <?php echo $productName ?>
                            </div>
                            <div class=" my-1 pdtQty">
                              <?php echo $productQuantityOrdered . ($productQuantityOrdered > 1 ? ' Pieces' : null) ?>
                            </div>
                            <div class=" my-1 pdtType">
                              <?php echo $productType ?>
                            </div>
                            <div class=" my-1 pdtType  text-warning"> + <i class="fa-solid fa-coins"></i>
                              <?php echo $superCoinsAwarded ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 text-center my-auto price">₹
                        <?php echo number_format($amountPayable) ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 text-center my-auto status">
                    <div class="odrDt">
                      <?php echo $orderDt ?>
                    </div>
                    <div class="status   <?php echo $ifDelivered == 'Delivered' ? 'text-success' : 'text-danger' ?>">
                      <?php echo $ifDelivered ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <?php } ?>













        <!-- repeatable order Items end -->

























        <!-- container End -->
      </div>
      <!-- container-fluid End -->
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </html>
  <?php

} else {
  header("location:./login.php");
}




?>