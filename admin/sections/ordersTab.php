<div class="row">




    <?php

    $query = "select 
                `order table`.`order id`,
                `order table`.`quantity ordered` , 
                `order table`.`amount payable` , 
                `order table`.`ifDelivered` , 

                `customer`.`customer name`,
                `customer`.`address`,
                `customer`.`contact`,

                `product table`.`product image 1` , 
                `product table`.`product name`  

                from `order table`
                join `product table` on  `product table`.`product id` = `order table`.`product id`
                join `customer` on  `customer`.`customer id` = `order table`. `customer id`

                where  `order table`.`ifDelivered` = 'Not Delivered' ;

                ";



    $queryExec = mysqli_query($connection, $query);








    while ($data = mysqli_fetch_assoc($queryExec)) {

        $orderId = $data['order id'];
        $customerName = $data['customer name'];
        $customerAddress = $data['address'];
        $customerContact = $data['contact'];
        $productImage = $data['product image 1'];
        $productName = $data['product name'];
        $qtyOrdered = $data['quantity ordered'];
        $amtPayable = $data['amount payable'];

        ?>

        <div class="col-12 my-2">
            <div class="contentContainer orderItemsContainer px-3">
                <div class="row">


                    <div class="col-md-6 my-auto">
                        <div class="row">
                            <div class="col-4 my-auto cusName">
                                <?php echo $customerName ?>
                            </div>
                            <div class="col-5 my-auto   address">
                                <?php echo $customerAddress ?>
                            </div>
                            <div class="col-3 my-auto contact">
                                <?php echo $customerContact ?>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-3 my-auto">
                                <div class="imgContainer">
                                    <img src="<?php echo $productImage ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-9 my-auto productname">
                                <?php echo $productName ?>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-2   my-auto ">
                        <div class="row">
                            <div class="col-4 my-auto qtyOrdered">
                                <?php echo $qtyOrdered ?>
                            </div>
                            <div class="col-8 my-auto amtPayable"> ₹
                                <?php echo number_format($amtPayable) ?>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-1  my-auto">
                        <form action="./backendFiles/delivarySuccess.php" method="post">
                            <input type="hidden" name="orderId" value="<?php echo $orderId ?>">
                            <button class="delivaryBtn"><i class="fa-solid fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





    <?php } ?>



</div>