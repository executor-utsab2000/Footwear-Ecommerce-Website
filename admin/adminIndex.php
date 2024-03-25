<?php
require '../backendFiles/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shoe Factory || Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./style files/adminIndex.scss" />
    <link rel="stylesheet" href="../style files/contentContainer.scss" />
    <link rel="stylesheet" href="./style files/adminOrderTab.scss" />
    <link rel="stylesheet" href="./style files/adminProductTab.scss" />
    <link rel="stylesheet" href="./style files/adminAddProduct.scss" />
    <link rel="stylesheet" href="./style files/adminSubSectionProducts.scss" />
</head>

<body>
    <div class="container-fluid px-0 admin">


        <nav>
            <div class="container d-flex justify-content-between">
                <img src="../images/logo.png" alt="" />

                <a href="./adminLoginSignUp.php">
                    <button>
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Log Out
                    </button>
                </a>
            </div>
        </nav>
        <!-- ---------------------------------------------------------------------------------------------------------------------------- -->

        <?php

        if (isset ($_GET['msg'])) {
            $msg = $_GET['msg'];

            echo '
                    <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="alert alert-warning alert-dismissible fade show alertBox" role="alert">
                            <strong></strong> ' . $msg . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alertCancel"></button>
                        </div>
                    </div>
                    </div>
                    ';
        }

        ?>


        <!-- ---------------------------------------------------------------------------------------------------------------------------- -->
        <!-- tabs section -->

        <div class="container mt-5 pt-5">
            <div class="contentContainer mt-5">
                <div class="row ulBtns">
                    <div class="col-12">
                        <ul class="nav nav-pills ulContainer" id="pills-tab" role="tablist">
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Customer
                                </button>
                            </li> -->

                            <li class="nav-item mx-4" role="presentation">
                                <button class="nav-link active" id="product-tab" data-bs-toggle="pill"
                                    data-bs-target="#product" type="button" role="tab" aria-c
                                    ontrols="product" aria-selected="false">
                                    Product
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="orders-tab" data-bs-toggle="pill"
                                    data-bs-target="#orders" type="button" role="tab"
                                    aria-controls="orders" aria-selected="false">
                                    Orders
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-5 content">
                    <div class="col-12">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                                tabindex="0">
                                customer
                            </div> -->

                            <div class="tab-pane fade show active" id="product" role="tabpanel"
                                aria-labelledby="product-tab" tabindex="0">
                                <?php require './sections/SubSections/productSubSection.php' ?>
                                <?php require './sections/addProductModal.php' ?>
                            </div>

                            <div class="tab-pane fade" id="orders" role="tabpanel"
                                aria-labelledby="orders-tab" tabindex="0">
                                <?php require './sections/ordersTab.php' ?>
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
    // delete btn popover
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });






    let editBtn = document.querySelectorAll(".editBtn");

    editBtn.forEach((eachEditBtn) => {
        eachEditBtn.addEventListener("click", (e) => {

            let child = Array.from(eachEditBtn.children)[0];

            if ((child.innerHTML == '<i class="fa-solid fa-pen-to-square"></i>')) {
                e.preventDefault();

                child.innerHTML = '<i class="fa-solid fa-check"></i>';

                let mainParent = eachEditBtn.parentNode.parentNode.parentNode.parentNode.parentNode;

                let inputFields = mainParent.querySelectorAll(".inputFields");
                console.log(inputFields);

                inputFields[0].removeAttribute("readonly");
                inputFields[0].style.background = "white";

                inputFields[1].removeAttribute("readonly");
                inputFields[1].style.background = "white";

                inputFields[2].removeAttribute("readonly");
                inputFields[2].style.background = "white";

                inputFields[3].removeAttribute("readonly");
                inputFields[3].style.background = "white";

                inputFields[4].removeAttribute("readonly");
                inputFields[4].style.background = "white";

                inputFields[11].removeAttribute("readonly");
                inputFields[11].style.background = "white";

                inputFields[12].removeAttribute("readonly");
                inputFields[12].style.background = "white";

                inputFields[6].removeAttribute("disabled");
                inputFields[8].removeAttribute("disabled");
                inputFields[10].removeAttribute("disabled");

                let genderVal = inputFields[5];
                let categoryVal = inputFields[7];
                let productType = inputFields[9];

                //   console.log(genderVal);
                //   console.log(categoryVal);
                //   console.log(productType);

                inputFields[6].addEventListener("change", () => genderVal.value = inputFields[6].value);
                inputFields[8].addEventListener("change", () => categoryVal.value = inputFields[8].value);
                inputFields[10].addEventListener("change", () => productType.value = inputFields[10].value);
            }
            else {
                eachEditBtn.addEventListener('submit', () => child.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>')
            }
        });
    });









    document.getElementById('alertCancel').addEventListener('click', () => window.location.href = "adminIndex.php")




</script>

</html>