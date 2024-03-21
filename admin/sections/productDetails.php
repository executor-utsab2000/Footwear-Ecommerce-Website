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

    $query = "SELECT * FROM `product table`";
    $queryExec = mysqli_query($connection, $query);
    // var_dump(mysqli_fetch_assoc($queryExec));
    // $productData = mysqli_fetch_assoc($queryExec);
    
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
            <form action="" method="post">
                <div class="contentContainer productTab">
                    <div class="row">




                        <div class="col-lg-5 my-auto">
                            <div class="row">
                                <div class="col pdtId my-auto ">
                                    <input type="text" name="" value="<?php echo $productId ?>" readonly>
                                </div>
                                <div class="col-4 productName my-auto ">
                                    <textarea name="productName" readonly><?php echo $productName ?></textarea>
                                </div>

                                <div class="col my-auto">
                                    <div class="imageContainer">
                                        <img src="<?php echo $productImage1 ?>" class="img-fluid" alt="❌🚫">
                                    </div>
                                </div>

                                <div class="col my-auto ">
                                    <div class="imageContainer">
                                        <img src="<?php echo $productImage2 ?>" class="img-fluid" alt="❌🚫">
                                    </div>
                                </div>

                                <div class="col my-auto">
                                    <div class="imageContainer">
                                        <img src="<?php echo $productImage3 ?>" class="img-fluid" alt="❌🚫">
                                    </div>
                                </div>

                                <div class="col my-auto">
                                    <div class="imageContainer">
                                        <img src="<?php echo $productImage4 ?>" class="img-fluid" alt="❌🚫">
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="col-lg-5 my-auto">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="" value="<?php echo $productBrand ?>" readonly>
                                </div>
                                <div class="col">
                                    <input type="text" name="" value="<?php echo $productGender ?>" readonly>
                                </div>
                                <div class="col">
                                    <input type="text" name="" value="<?php echo $productCategory ?>" readonly>
                                </div>
                                <div class="col">
                                    <input type="text" name="" value="<?php echo $productPopularTrending ?>" readonly>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-1 my-auto">
                            <div class="row">
                                <div class="col-12 my-1">
                                    <input type="text" name="" value="<?php echo $productInStock ?>" readonly>
                                </div>
                                <div class="col-12 my-1">
                                    <input type="text" name="" value="<?php echo $productPrice ?>" readonly>
                                </div>
                            </div>
                        </div>





                        <div class="col-lg-1 my-auto">
                            <div class="row">
                                <div class="col-12 my-1">
                                    <button type="submit" class="wishlistIcon" name="deleteItem">
                                        <span data-toggle="tooltip" data-placement="right" title="Edit Item!">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                    </button>
                                </div>

                                <div class="col-12 my-1">
                                    <button type="submit" class="wishlistIcon" name="deleteItem">
                                        <span data-toggle="tooltip" data-placement="right" title="Delete Item!">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </form>
        </div>









    <?php } ?>



</div>