<?php

session_start();
if (isset ($_SESSION['customerId'])) {
  $cusId = $_SESSION['customerId'];
  $name = $_SESSION['name'];

  $fName = (explode(" ", $name))[0];  // explodes is same as split in javascript
  // echo $cusId;
  require './backendFiles/connection.php';

  //  $queryWishlistCount  = "SELECT COUNT(`wishlist id`) FROM `wishlist` WHERE `customer id` = '$cusId'";
//  $countNumber = mysqli_num_rows(mysqli_query($connection , $queryWishlistCount));


  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Shoe Factory ||
      <?php echo $name ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="./style files/index.scss" />
    <link rel="stylesheet" href="./style files/navbar.scss" />
    <link rel="stylesheet" href="./style files/contentContainer.scss" />
    <link rel="stylesheet" href="./style files/Index/topTrendingCarausel.scss" />
    <link rel="stylesheet" href="./style files/Index/categories.scss" />
    <link rel="stylesheet" href="./style files/Index/popularSection.scss" />
    <link rel="stylesheet" href="./style files/Index/priceBasedSection.scss" />
    <link rel="stylesheet" href="./style files/Index/customerFav.scss" />
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
          <?php require './components/landing.php' ?>
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


      <div class="container " id="category">
        <div class="row my-4">
          <div class="col-12 px-3">
            <div class="contentContainer" >
              <?php require './components/categories.php' ?>
            </div>
          </div>
        </div>
      </div>


      <div class="row my-4">
        <div class="col-12 px-3">
          <div class="contentContainer">
            <?php require './components/topTrendingCarausel.php' ?>
          </div>
        </div>
      </div>


      <div class="row my-4">
        <div class="col-12 px-3">
          <div class="contentContainer">
            <?php require './components/popularSection.php' ?>
          </div>
        </div>
      </div>

      <div class="row my-4">
        <div class="col-12 px-3">
          <div class="contentContainer">
            <?php require './components/priceBasedSection.php' ?>
          </div>
        </div>
      </div>

      <div class="row my-4">
        <div class="col-12 px-3">
          <div class="contentContainer">
            <?php require './components/customerFav.php' ?>
          </div>
        </div>
      </div>


      <div class="container">
        <div class="row my-4">
          <div class="col-12 px-3">
            <div class="contentContainer">
              <?php require './components/brandCollaboration.php' ?>
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
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </html>
  <?php

} else {
  header("location:./login.php");
}




?>