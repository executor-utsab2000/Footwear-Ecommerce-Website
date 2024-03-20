<?php



require './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $name = $_POST['fName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $query = "SELECT * FROM `customer` where `customer email` = '$email' ;";
    $ifPresent = mysqli_query($connection, $query);

    $rowCount = mysqli_num_rows($ifPresent);

    if ($rowCount > 0) {
        header("location:../signUp.php?msg=user already exists");
    }
     else {

        if ($password !== $confirmPassword) {
            header("location:../signUp.php?msg=passwords do not match");
        }
         else {
            $customerId = uniqid('CUS-');
            $hashPasssword = password_hash($password , PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO `customer` (`customer id`, `customer name`, `customer email`, `customer password`) VALUES ('$customerId', '$name', '$email', '$hashPasssword') ;";
            $queryExec = mysqli_query($connection , $insertQuery);

            if($queryExec){

                // session start
                session_start();
                $_SESSION['customerId'] = $customerId ; 
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                header("location:../index.php");

            }




        }

    }



















}















?>