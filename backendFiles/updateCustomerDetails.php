<?php



session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require './connection.php';

    $cusId = $_SESSION['customerId'];

    // var_dump($_POST);
    // echo "<br>";
    // var_dump($_FILES);

    $dummyImage = "https://static.vecteezy.com/system/resources/previews/003/715/527/non_2x/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg";
    $currImage = $_POST['currImage'];

    if (isset ($_POST['updateBtn'])) {

        $email = $_POST['email'];
        $contactInfo = $_POST['contactInfo'];
        $address = $_POST['address'];
        echo $currImage;

        $profilePicName = $_FILES['profilePic']['name'];
        $profilePicTmpName = $_FILES['profilePic']['tmp_name'];
        $profilePicSize = $_FILES['profilePic']['size'];
        $ifErrorUpload = $_FILES['profilePic']['error'];


        // if (empty ($email)) {
        //     header("location:../profilePage.php?msg=Enter Email");
        // } elseif (empty ($contactInfo)) {
        //     header("location:../profilePage.php?msg=Enter Contact Info");
        // } elseif (strlen($contactInfo) != 10) {
        //     header("location:../profilePage.php?msg=Enter Valid Contact Info");
        // } elseif (empty ($address)) {
        //     header("location:../profilePage.php?msg=Enter Address");
        // }

            

        
     
        // // upload if no file not present
        if ($profilePicSize == 0) {

            $query = "UPDATE `customer` SET `address`='$address' ,`contact`='$contactInfo' WHERE `customer id`='$cusId'";
            $queryExec = mysqli_query($connection, $query);
            if ($queryExec) {
                header("location:../profilePage.php?msg=Details Uploaded Successfully without Picture");
            }

        }




        // file present
        elseif ($profilePicSize > 0) {

            $fileExtension = pathinfo($profilePicName, PATHINFO_EXTENSION);
            $extensionArray = ['jpg', 'jpeg', 'png', 'avif', 'webp'];
            $ifPresentExtension = in_array($fileExtension, $extensionArray);
            // var_dump($ifPresentExtension);

            if ($ifErrorUpload == 0) {
                if ($profilePicSize > 200000) {
                    header("location:../profilePage.php?msg=File Size Exceeded");
                } elseif (!$ifPresentExtension) {
                    header("location:../profilePage.php?msg=Enter Valid File .Supported file types jpg , jpeg , png , avif , webp");
                } else {
                    $newFileName = uniqid('img-');
                    $pathtoUpload = "../images/ProfilePics/$newFileName.$fileExtension";
                    $upload = move_uploaded_file($profilePicTmpName, $pathtoUpload);

                    if ($upload) {
                        $query = "UPDATE `customer` SET `address`='$address' ,`profilePic`='images/ProfilePics/$newFileName.$fileExtension' , `contact`='$contactInfo' WHERE `customer id`='$cusId'";
                        $queryExec = mysqli_query($connection, $query);
                        if ($queryExec) {
                            if ($currImage != $dummyImage) {
                                unlink("../$currImage");
                            }
                            header("location:../profilePage.php?msg=Details Uploaded Successfully");
                        }
                    }
                }
            }


        }

    }


    
    // delete profile Picture
    elseif (isset ($_POST['deleteProfilePicture'])) {
        $updateQuery = "UPDATE `customer` SET `profilePic`='$dummyImage' WHERE `customer id`='$cusId'";
        $queryExec = mysqli_query($connection, $updateQuery);
        if ($queryExec) {
            if ($currImage != $dummyImage) {
                unlink("../$currImage");
                header("location:../profilePage.php?msg=Profile Picture deleted Successfully");
            }
        }
    }


    // post main block close  

}


























?>