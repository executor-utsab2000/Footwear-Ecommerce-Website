<?php


require './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $ifUserPresent = "SELECT * FROM `customer` where `customer email`='$email' ";
    $queryExec = mysqli_query($connection, $ifUserPresent);

    if (mysqli_num_rows($queryExec) < 1) {
        header("location:../login.php?msg=user name  dosen't match exists. check username or signup");
    } 
    
    
    elseif (mysqli_num_rows($queryExec) == 1) {

        $userData = mysqli_fetch_assoc($queryExec);
        if (password_verify($password, $userData['customer password'])) {

            $customerId = $userData['customer id'];
            $name = $userData['customer name'];
            session_start();

            $_SESSION['customerId'] = $customerId;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            header("location:../index.php");
        }



        elseif(!password_verify($password, $userData['customer password'])){
            header("location:../login.php?msg=password dosent match dosen't match of the username");
        }


    }


}




































?>