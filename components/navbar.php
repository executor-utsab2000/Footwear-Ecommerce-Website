<!-- wishlist Count -->

<?php

$resCountNo = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `wishlist` where `customer id`= '$cusId'"));
$resCartNo = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `add to cart` where `customer id`= '$cusId'"));

// echo $resCountNo;

?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="images\logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <hr class="d-block d-lg-none">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 liContainer  d-flex justify-content-between">

        <li class="nav-item d-flex justify-content-center d-none d-lg-block">
          <form action="#" class="search">
            <input type="search" name="" id="" class="searchBar ps-3" placeholder="Search Products">
            <button type="submit" class="searchButton">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-circle-user"></i>
            <?php echo $fName ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profilePage.php"><i class="fa-regular fa-circle-user me-2"></i>User
                Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-coins me-2 text-warning"></i>Supercoin Zone</a>
            </li>
            <li><a class="dropdown-item" href="wishlist.php"><i class="fa-solid fa-heart me-2"></i>Wishlist (
                <?php echo $resCountNo ?> )
              </a></li>
            <li><a class="dropdown-item" href="orderDisplayPage.php"><i class="fa-solid fa-box-open me-2"></i>Orders</a>
            </li>
            <li><a class="dropdown-item" href="./backendFiles/logout.php"><i
                  class="fa-solid fa-right-from-bracket me-2"></i>Logout </a></li>
          </ul>
        </li>

        <li class="nav-item">
          <div class="cartCount">
            <div class="count d-none d-lg-block">
              <?php echo $resCartNo ?>
            </div>
            <a class="nav-link" href="addToCart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-money-bill-1 me-2"></i>Refunds</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-handshake me-2"></i>Privacy and Policy</a></li>
          </ul>
        </li>


      </ul>



    </div>
  </div>
</nav>