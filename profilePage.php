<?php

session_start();
if (isset ($_SESSION['customerId'])) {
  $cusId = $_SESSION['customerId'];
  $name = $_SESSION['name'];

  $fName = ucwords((explode(" ", $name))[0]);  // explodes is same as split in javascript
  require './backendFiles/connection.php';
  // var_dump($_POST);

  $query = "SELECT * FROM `customer` WHERE `customer id` = '$cusId'";
  $data = mysqli_fetch_assoc(mysqli_query($connection, $query));
  $email = $data['customer email'];
  $address = $data['address'];
  $profilePic = $data['profilePic'];
  $contact = $data['contact'];
  $fullName = $data['customer name'];



  $superCoin = mysqli_fetch_assoc(mysqli_query($connection, "select count(superCoinsAwarded) from `order table`  where `customer id` = 'CUS-65f1819031e32' "))['count(superCoinsAwarded)'];
  // echo $superCoin;           
  // var_dump($data);




  $dummyImage = "https://static.vecteezy.com/system/resources/previews/003/715/527/non_2x/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg";


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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




    <link rel="stylesheet" href="./style files/navbar.scss" />
    <link rel="stylesheet" href="./style files/contentContainer.scss" />
    <link rel="stylesheet" href="./style files/profilePage.scss" />
  </head>



  <body>
    <div class="container-fluid userProfile">


      <div class="row">
        <div class="col-12 px-0">
          <?php require './components/navbar.php' ?>
        </div>
      </div>


      <?php


      if (isset ($_GET['msg'])) {

        echo '
          <div class="row">
          <div class="col-12 toastStyle d-flex justify-content-end">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">
                  ' . $_GET['msg'] . '
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" id="toastCloseBtn" aria-label="Close"></button>
              </div>
            </div>
          </div>
        </div>
      ';
      }








      ?>


      <div class="row my-3">
        <div class="col-12">
          <div class="pageHeader">user profile</div>
          <div class="welcome">Hii !! <span>
              <?php echo ucwords($name) ?>
            </span></div>
        </div>
      </div>




      <div class="container">

        <div class="row mt-4">
          <div class="col-lg-3">
            <div class="contentContainer">
              <div class="profileCard">
                <div class="cardTopPg">
                  <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/d5d26b33772242.56b79d5825657.jpg"
                    class="img-fluid" alt="">
                  <div class="profileImage">
                    <img src="<?php echo $profilePic ?>" alt="" class="img-fluid ">
                  </div>
                </div>


                <div class="cardBody px-2">
                  <div class="name">
                    <?php echo $name ?>
                  </div>
                  <div class="contact"><span>+91-</span>
                    <?php echo ($contact == '' ? 'xxxxxxxxxx' : $contact) ?>
                  </div>
                  <div class="supercoin">
                    <span>Supercoin Balance : </span>
                    <i class="fa-solid fa-coins"></i>
                    <?php echo $superCoin ?>
                  </div>
                  <div class="address">
                    <div>Address</div>
                    <div>
                      <?php echo ($address == 'Enter Your Address' ? '---' : $address) ?>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>




          <!-- input fieds -->

          <div class="col-lg-9">
            <div class="contentContainer detailsFillup pe-5">
              <div class="header">Fill your Details : </div>
              <form action="backendFiles/updateCustomerDetails.php" method="post" enctype="multipart/form-data">
                <div class="container px-1 px-md-2 mx-lg-4 row">


                  <div class="col-12 mt-5 mb-3">
                    <div class="row">
                      <div class="col-md-3 my-auto ">
                        <label for="">Your Email:</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" name="email" class="inputFormDetails" value="<?php echo $email ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-5 mb-3">
                    <div class="row">
                      <div class="col-md-3 my-auto ">
                        <label for="">Your Full Name:</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" name="fullName" class="inputFormDetails" value="<?php echo $fullName ?>"
                          readonly>
                      </div>
                    </div>
                  </div>



                  <div class="col-12 my-3">
                    <div class="row">
                      <div class="col-md-3 my-auto ">
                        <label for="contactInfo">Enter Your Contact:</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" name="contactInfo" class="inputFormDetails" id="contactInfo"
                          value="<?php echo ($contact == 0 ? 'xxxxxxxxxx' : $contact) ?>" readonly>
                      </div>
                    </div>
                  </div>


                  <div class="col-12 my-3">
                    <div class="row">
                      <div class="col-md-3 my-auto ">
                        <label for="address">Enter Your Address:</label>
                      </div>
                      <div class="col-md-9">
                        <textarea name="address" class="inputFormDetails pt-3" id="address"
                          readonly><?php echo ($address == 'Enter Your Address' ? '---' : $address) ?></textarea>
                      </div>
                    </div>
                  </div>


                  <div class="col-12 my-3">
                    <div class="row">
                      <div class="col-md-3 my-auto ">
                        <label for="">Change Profile Picture :</label>
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-8 mb-2">
                            <input type="file" name="profilePic" class="inputFormDetails" disabled>
                            <input type="hidden" name="currImage" value="<?php echo $profilePic ?>">
                          </div>
                          <div class="col-md-4  px-3">
                            <button type="submit" name="deleteProfilePicture" <?php echo $profilePic == $dummyImage ? 'class="opacity-25" disabled' : null ?> id="deleteProfilePicture">Delete Profile
                              Picture</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 my-3">
                    <button id="updateBtn" name="updateBtn">
                      <i class="fa-regular fa-pen-to-square me-2"></i>Update</button>
                  </div>


                </div>
              </form>
            </div>


            <!-- modal show  start -->

            <div class="modal fade modalBodyDelete" id="deleteAccountConirm" data-bs-backdrop="static"
              data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAccountConirmLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title">Delete My Account</span>
                  </div>
                  <div class="modal-body">
                    <div class="txt1">
                      Deleting your account will loose all your account details permanently :
                      <ul>
                        <li>Orders</li>
                        <li>Wishlist</li>
                        <li>Items in Cart</li>
                        <li>Account Details</li>
                        <li>SuperCoins Rewarded</li>
                        <li>Premium Membership ( if any )</li>
                      </ul>
                    </div>

                    <div class="confirmTxt mt-2">
                      <span>To confirm delete type the following : </span>
                      <span>I want to delete my Account.</span>
                    </div>
                    <input type="text" placeholder="To confirm delete type the above text" id="confirmTxtInput">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="backendFiles/deleteProfile.php" method="post">
                    <input type="hidden" name="currImage" value="<?php echo $profilePic   ?>">
                      <button type="submit" class="btn btn-danger" id="delAccount">Delete Account</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal show  end -->


            <div class="row mt-4">
              <div class="col-12">
                <div class="contentContainer deleteSection py-3">
                  <div class="row">
                    <div class="col-12 my-3">
                      <span class="content">
                        Deleting your account will delete all your account details .....
                        <span class="list">
                          <ul>
                            <li>Orders</li>
                            <li>Items in Wishlist</li>
                            <li>Items in Cart</li>
                          </ul>
                        </span>
                      </span>
                      <button id="updateBtn" name="updateBtn" data-bs-toggle="modal"
                        data-bs-target="#deleteAccountConirm">
                        <i class="fa-solid fa-user-slash me-3"></i>Delete Your Account</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>


    </div>

  </body>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>

    // $(document).ready(function () {
    //   $('#showToast').click(function () {
    //     $('.toast').toast('show');
    //   });
    // });





    let updateBtn = document.getElementById('updateBtn');
    // console.log(updateBtn.innerText);

    updateBtn.addEventListener('click', (e) => {

      if (updateBtn.innerText == "Update") {
        e.preventDefault();
        updateBtn.innerText = "Save Changes";

        let inputFields = document.querySelectorAll('.inputFormDetails');
        inputFields[2].removeAttribute('readonly');
        inputFields[3].removeAttribute('readonly');
        inputFields[4].removeAttribute('disabled');

        inputFields[2].style.borderBottom = "#fca311 3px solid";;
        inputFields[3].style.borderBottom = "#fca311 3px solid";;
        inputFields[4].style.borderBottom = "#fca311 3px solid";;



        // console.log(inputFields);
        // inputFields.forEach((elm) => {
        //   elm.style.borderBottom = "#fca311 3px solid";
        // })
      }

      else if (updateBtn.innerText = "Save Changes") {

        let contactInfo = document.getElementById('contactInfo').value;
        let address = document.getElementById('address').value;

        if (contactInfo == '') {
          e.preventDefault()
          alert('Enter Contact Info');
        }
        else if (contactInfo.length != 10) {
          e.preventDefault()
          alert('Enter Valid  Contact Info');
        }
        else if (address == '') {
          e.preventDefault();
          alert('Enter Address');
        }
        else {
          updateBtn.addEventListener('submit', () => {
            updateBtn.innerHTML = '<i class="fa-regular fa-pen-to-square me-2"></i>Update</button>';
          })
        }

      }
    })

    let delAccount = document.getElementById('delAccount');
    delAccount.addEventListener('click', (e) => {
      let confirmTxtInput = document.getElementById('confirmTxtInput').value;

      if (confirmTxtInput != "I want to delete my Account") {
        alert("The the text properly")
        e.preventDefault();   
      }

        // else if (confirmTxtInput == "") {
        //   alert("Type the above text")
        //   e.preventDefault();
        // }

    })



    document.getElementById('toastCloseBtn').addEventListener('click', () => window.location.href = "profilePage.php");






  </script>

  </html>
  <?php

} else {
  header("location:./login.php");
}




?>