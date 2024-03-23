<div class="row">
    <div class="col-12 d-flex justify-content-end productAdd">
        <button type="button" class="wishlistIcon" name="addproduct" data-bs-toggle="modal"
            data-bs-target="#addProduct">
            <span data-toggle="tooltip" data-placement="top" title="Add Product">
                <i class="fa-solid fa-plus"></i>
            </span>
        </button>
    </div>
</div>





<!-- Modal -->
<div class="modal fade addProductModal" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header ">
                <span class="modal-title" id="addProductLabel">Add Product</span>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <form action="" method="post">
                        <div class="row">



                            <div class="col-12 mt-5 mb-3">
                                <div class="row">
                                    <div class="col-md-2 my-auto"><label for="pdtName">Enter Product Name : </label></div>
                                    <div class="col-md-10"><textarea name="pdtName" id="pdtName" placeholder="Enter Product Name"></textarea></div>
                                </div>
                            </div>


                            <div class="col-12 my-3">
                                <div class="row">
                                    <div class="col-lg-4 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-1"><label for="pdtBrand">Enter Product Brand : </label></div>
                                            <div class="col-md-12"><textarea name="pdtBrand" id="pdtBrand" placeholder="Enter Product Brand"></textarea></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-1"><label for="pdtPrice">Enter Product Price : </label></div>
                                            <div class="col-md-12"><textarea name="pdtPrice" id="pdtPrice" placeholder="Enter Product Price"></textarea></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-1"><label for="pdtInStock">Enter Product Quantity in Stock : </label></div>
                                            <div class="col-md-12"><textarea name="pdtInStock" id="pdtInStock" placeholder="Enter Product Quantity in Stock"></textarea></div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12 my-3">
                                <div class="row">
                                    <div class="col-md-2 my-auto"><label for="pdtName">Enter Product Description : </label></div>
                                    <div class="col-md-10"><textarea name="pdtDescription" id="pdtDescription" placeholder="Enter Product Description" style="height:12rem"></textarea></div>
                                </div>
                            </div>



                            <div class="col-12 my-3">
                                <div class="row">

                                    <div class="col-lg-4 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-1"><label for="pdtGender">Product In Gender: </label></div>
                                            <div class="col-md-12">
                                                <select name="pdtGender" id="pdtGender">
                                                    <option value="" selected disabled>Enter Product Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="children">Children</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-1"><label for="pdtType">Enter Product Category : </label></div>
                                            <div class="col-md-12">
                                                <select name="pdtType" id="pdtType">
                                                    <option value="" selected disabled>Select Product Type</option>
                                                    <option value="sneakers">Sneakers</option>
                                                    <option value="formals">Formals</option>
                                                    <option value="heals">Heals</option>
                                                    <option value="spikes">Soccer Boots</option>
                                                    <option value="crogs">Crogs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-1"><label for="productPopularTrending">Product In Trend Type: </label></div>
                                            <div class="col-md-12">
                                                <select name="productPopularTrending" id="productPopularTrending">
                                                    <option value="" selected disabled>Enter Product Trend</option>
                                                    <option value="popular">Popular</option>
                                                    <option value="trending">Trending</option>
                                                    <option value="normal">Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            

                            <div class="col-12 my-3 pt-2">
                                <div class="row">
                                    <div class="col-lg-3 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-12 my-auto"><label for="imageLink1">Enter Image Link 1 : </label></div>
                                            <div class="col-12"><textarea name="imageLink1" id="imageLink1" placeholder="Enter Image Link 1"></textarea></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-12 my-auto"><label for="imageLink2">Enter Image Link 2 : </label></div>
                                            <div class="col-12"><textarea name="imageLink2" id="imageLink2" placeholder="Enter Image Link 2"></textarea></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-12 my-auto"><label for="imageLink3">Enter Image Link 3 : </label></div>
                                            <div class="col-12"><textarea name="imageLink3" id="imageLink3" placeholder="Enter Image Link 3"></textarea></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 my-3 my-lg-0">
                                        <div class="row">
                                            <div class="col-12 my-auto"><label for="imageLink4">Enter Image Link 4 : </label></div>
                                            <div class="col-12"><textarea name="imageLink4" id="imageLink4" placeholder="Enter Image Link 4"></textarea></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success" name="addProduct">Add Product</button>
            </div>
            </form>
        </div>
    </div>
</div>  



<!-- 

product name

product brand
product price
product in stock

product description

product type=> gender
product popular base trending
product type=> sneakers etc.

image link
image link
image link
image link 

-->