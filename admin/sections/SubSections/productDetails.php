<!-- product id

product images 1 
product images 2
product images 3 
product images 4 

product name
brand 
gender select
category select
productPopularTrending select

quantity in stock
price -->


<div class="row">


    <?php

    // $query = "SELECT * FROM `product table`";
    // $queryExec = mysqli_query($connection, $query);
    
    
    while ($productData = mysqli_fetch_assoc($queryExec)) {

        $productId = $productData['product id'];

        $productImage1 = $productData['product image 1'];
        $productImage2 = $productData['product image 2'];
        $productImage3 = $productData['product image 3'];
        $productImage4 = $productData['product image 4'];


        $productName = $productData['product name'];
        $productBrand = $productData['brand name'];
        $productGender = $productData['product Gender Type'];
        $productCategory = $productData['product category'];
        $productPopularTrending = $productData['product popular trending'];

        $productInStock = $productData['product in stock'];
        $productPrice = $productData['product price'];


        ?>




        <div class="col-12 my-2">
            <form action="backendFiles/productUpdate.php" method="post">
                <div class="contentContainer productTab">
                    <div class="row">




                        <div class="col-lg-6 my-auto">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col pdtId my-auto ">
                                            <input type="text" name="productId" class="productId" value="<?php echo $productId ?>" readonly>
                                        </div>
                                        <div class="col-9 productName my-auto " >
                                            <textarea name="productName" readonly
                                                class="inputFields" id="productName"><?php echo $productName ?></textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-6 col-md my-auto">
                                            <div class="imageContainer mt-2 mt-md-0">
                                                <img src="<?php echo $productImage1 ?>" class="img-fluid" alt="❌🚫">
                                            </div>
                                            <textarea name="productImage1" class="inputFields"
                                                readonly><?php echo $productImage1 ?></textarea>
                                        </div>

                                        <div class="col-6 col-md my-auto ">
                                            <div class="imageContainer mt-2 mt-md-0">
                                                <img src="<?php echo $productImage2 ?>" class="img-fluid" alt="❌🚫">
                                            </div>
                                            <textarea name="productImage2" class="inputFields"
                                                readonly><?php echo $productImage2 ?></textarea>
                                        </div>

                                        <div class="col-6 col-md my-auto">
                                            <div class="imageContainer mt-2 mt-md-0">
                                                <img src="<?php echo $productImage3 ?>" class="img-fluid" alt="❌🚫">
                                            </div>
                                            <textarea name="productImage3" class="inputFields"
                                                readonly><?php echo $productImage3 ?></textarea>
                                        </div>

                                        <div class="col-6 col-md my-auto">
                                            <div class="imageContainer mt-2 mt-md-0">
                                                <img src="<?php echo $productImage4 ?>" class="img-fluid" alt="❌🚫">
                                            </div>
                                            <textarea name="productImage4" class="inputFields"
                                                readonly><?php echo $productImage4 ?></textarea>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>






                        <div class="col-lg-4 my-auto">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="productBrand" value="<?php echo $productBrand ?>" readonly>

                                </div>
                                <div class="col">
                                    <input type="text" class="inputFields" name="productGender" value="<?php echo $productGender ?>"
                                        readonly>
                                    <select name="" id="" class="inputFields" disabled>
                                        <option value="" selected disabled>Select Gender </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="children">Children</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="inputFields" name="productCategory" value="<?php echo $productCategory ?>"
                                        readonly>
                                    <select name="" id="" class="inputFields" disabled>
                                        <option value="" selected disabled>Select Category </option>
                                        <option value="sneakers">sneakers</option>
                                        <option value="formals">formals</option>
                                        <option value="heals">heals</option>
                                        <option value="spikes">soccer boots</option>
                                        <option value="crogs">crogs</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="inputFields" name="categoryProductPopular"
                                        value="<?php echo $productPopularTrending ?>" readonly>
                                    <select name="" id="" class="inputFields" disabled>
                                        <option value="" selected disabled>Select type </option>
                                        <option value="trending">trending</option>
                                        <option value="popular">popular</option>
                                        <option value="normal">normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-1 my-auto">
                            <div class="row">
                                <div class="col-6 col-lg-12 my-1 d-flex">
                                    <input type="text" class="inputFields" name="productInStock"
                                        value="<?php echo $productInStock ?>" readonly> 
                                        <span class="txt mt-1">Pcs</span> 
                                </div>

                                <div class="col-6 col-lg-12 my-1 d-flex">
                                    <span class="rupeesTxt mt-1">₹</span>
                                    <input type="text" class="inputFields" name="productPrice"
                                    value=" <?php echo $productPrice ?>" readonly>
                                    <span class="rupeesTxt mt-1">/-</span>
                                </div>
                            </div>
                        </div>





                        <div class="col-lg-1 my-auto">
                            <div class="row">
                                <div class="col-6 col-lg-12 my-1">
                                    <button type="submit" class="editBtn" name="editItem">
                                        <span data-toggle="tooltip" data-placement="right" title="Edit Item!"><i class="fa-solid fa-pen-to-square"></i></span>
                                    </button>
                                </div>

                                <div class="col-6 col-lg-12 my-1">
                                    <button type="button" class="deleteBtn"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <span data-toggle="tooltip" data-placement="right" title="Delete Item!"><i class="fa-solid fa-trash-can"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        

<!-- ------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------delete modal--------------------------------------------------------------------------------- -->
                    <!-- <div class="modal fade deleteModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header d-flex justify-content-between">
                                    <span class="modal-title" id="exampleModalLabel">delete product</span>
                                    <button type="button" class="deleteBtn" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="txt1">Are you sure you want to delete ?</div>
                                    <div class="pdtName" id="pdtName">productName</div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="deleteItem">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
<!-- ----------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------- -->


                    </div>
                </div>
            </form>
        </div>









    <?php } ?>



</div>



<br>