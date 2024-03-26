<div class="row subUlBtns">
    <div class="col-12 ">
        <ul class="nav nav-pills mb-3 subUlContainer" id="pills-tab" role="tablist">


            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="allProducts-tab" data-bs-toggle="pill" data-bs-target="#allProducts"
                    type="button" role="tab" aria-controls="allProducts" aria-selected="true">All Products</button>
            </li>


            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sneakers-tab" data-bs-toggle="pill" data-bs-target="#sneakers"
                    type="button" role="tab" aria-controls="sneakers" aria-selected="false">Sneakers</button>
            </li>


            <li class="nav-item" role="presentation">
                <button class="nav-link" id="formals-tab" data-bs-toggle="pill" data-bs-target="#formals" type="button"
                    role="tab" aria-controls="formals" aria-selected="false">Formals</button>
            </li>


            <li class="nav-item" role="presentation">
                <button class="nav-link" id="heals-tab" data-bs-toggle="pill" data-bs-target="#heals" type="button"
                    role="tab" aria-controls="heals" aria-selected="false">Heals</button>
            </li>


            <li class="nav-item" role="presentation">
                <button class="nav-link" id="soccerBoots-tab" data-bs-toggle="pill" data-bs-target="#soccerBoots"
                    type="button" role="tab" aria-controls="soccerBoots" aria-selected="false">Soccer Boots</button>
            </li>


            <li class="nav-item" role="presentation">
                <button class="nav-link" id="crogs-tab" data-bs-toggle="pill" data-bs-target="#crogs" type="button"
                    role="tab" aria-controls="crogs" aria-selected="false">Crogs</button>
            </li>
        </ul>
    </div>
</div>




<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->











<div class="row content">
    <div class="col-12">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="allProducts" role="tabpanel" aria-labelledby="allProducts-tab"
                tabindex="0">
                <?php

                $query = "SELECT * FROM `product table`";
                $queryExec = mysqli_query($connection, $query);
                $ifPresent = mysqli_num_rows($queryExec);

                if ($ifPresent < 1) {
                    echo '<div class="col-12 text-center noPresentTxt">No Products Present</div>';
                } else {

                    require 'productDetails.php';
                }

                ?>
            </div>

            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


            <div class="tab-pane fade" id="sneakers" role="tabpanel" aria-labelledby="sneakers-tab" tabindex="0">
                <?php

                $query = "SELECT * FROM `product table` WHERE `product category` = 'sneakers'";
                $queryExec = mysqli_query($connection, $query);
                $ifPresent = mysqli_num_rows($queryExec);

                if ($ifPresent < 1) {
                    echo '<div class="col-12 text-center noPresentTxt">No Products Present</div>';
                } else {

                    require 'productDetails.php';
                }

                ?>
            </div>

            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



            <div class="tab-pane fade" id="formals" role="tabpanel" aria-labelledby="formals-tab" tabindex="0">
                <?php

                $query = "SELECT * FROM `product table` WHERE `product category` = 'formals'";
                $queryExec = mysqli_query($connection, $query);
                $ifPresent = mysqli_num_rows($queryExec);

                if ($ifPresent < 1) {
                    echo '<div class="col-12 text-center noPresentTxt">No Products Present</div>';
                } else {

                    require 'productDetails.php';
                }

                ?>
            </div>

            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


            <div class="tab-pane fade" id="heals" role="tabpanel" aria-labelledby="heals-tab" tabindex="0">
                <?php

                $query = "SELECT * FROM `product table` WHERE `product category` = 'heals'";
                $queryExec = mysqli_query($connection, $query);
                $ifPresent = mysqli_num_rows($queryExec);

                if ($ifPresent < 1) {
                    echo '<div class="col-12 text-center noPresentTxt">No Products Present</div>';
                } else {

                    require 'productDetails.php';
                }

                ?>
            </div>


            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


            <div class="tab-pane fade" id="soccerBoots" role="tabpanel" aria-labelledby="soccerBoots-tab" tabindex="0">
                <?php

                $query = "SELECT * FROM `product table` WHERE `product category` = 'spikes'";
                $queryExec = mysqli_query($connection, $query);
                $ifPresent = mysqli_num_rows($queryExec);

                if ($ifPresent < 1) {
                    echo '<div class="col-12 text-center noPresentTxt">No Products Present</div>';
                } else {

                    require 'productDetails.php';
                }

                ?>
            </div>


            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


            <div class="tab-pane fade" id="crogs" role="tabpanel" aria-labelledby="crogs-tab" tabindex="0">
                <?php

                $query = "SELECT * FROM `product table` WHERE `product category` = 'crogs'";
                $queryExec = mysqli_query($connection, $query);
                $ifPresent = mysqli_num_rows($queryExec);

                if ($ifPresent < 1) {
                    echo '<div class="col-12 text-center noPresentTxt">No Products Present</div>';
                } else {

                    require 'productDetails.php';
                }

                ?>
            </div>


        </div>
    </div>
</div>


<!-- ------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------delete modal--------------------------------------------------------------------------------- -->
<div class="modal fade deleteModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header d-flex justify-content-between">
                <span class="modal-title" id="exampleModalLabel">delete product</span>
                <button type="button" id="deleteBtn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>

            <div class="modal-body">

                <div class="txt1">Are you sure you want to delete ?</div>
                <div class="pdtName" id="pdtName">productName</div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                <form action="backendFiles/productUpdate.php" method="post">
                    <input type="hidden" id="productSubmitId" name="productId">
                    <input type="hidden" id="productSubmitName" name="productName">
                    <button type="submit" class="btn btn-success" name="deleteItem">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------- -->