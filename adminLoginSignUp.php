<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Shoe Factory || Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./style files/adminLoginSignUp.scss">


</head>

<body>

    <div class="container-fluid px-0">
        <div class="background">

            <!-- ---------------------------------------------------------------------------------------------------------- -->



            <!-- ---------------------------------------------------------------------------------------------------------- -->
            <div class="imageContainer d-none d-lg-flex">
                <img src="./images/adminPic.jpg" alt="">
            </div>


            <div class="contentContainer">
                <form action="#">
                    <div class="row login">
                        <div class="col-12 text-center mt-2 mb-4 header">Log In</div>
                        <div class="col-12 my-1"><input type="text" name="email" id="email"
                                placeholder="Enter Email(eg. xyz@gmail.com)"></div>
                        <div class="col-12 my-1"><input type="password" name="password" id="password"
                                placeholder="Enter Password"></div>
                        <div class="col-12 my-1 "><button type="button" name="" id="submitAdmin">Log In </button></div>
                    </div>
                </form>
            </div>



        </div>
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
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


<script>

        document.getElementById('submitAdmin').addEventListener( 'click' ,()=> {

            let email =document.getElementById('email').value;
            let password =document.getElementById('password').value;

            console.log(email);
            console.log(password);

            if(email==='utsabsarkar00@gmail.com' && password ==='admin'){
                window.location.href = "adminIndex.php"  ;
            }
            else{
                window.location.href = "adminLoginSignUp.php?msg=User Name or password Incorrect" ;
            }
        })


    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });


    document.getElementById('alertCancel').addEventListener('click', () => window.location.href = "adminLoginSignUp.php");

</script>

</html>