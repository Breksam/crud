
<?php

require '../db.php';

session_start();

if(!empty($_POST))
{
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if(strlen($username) < 1 || strlen($phone) < 1 || strlen($address) < 1)
    {
        $_SESSION['error'] = "Sorry, All fields required!";
        $_SESSION['success'] = null;
        header('location: create.php');
        exit();
    }

    if(strlen($username) < 4)
    {
        $_SESSION['error'] = "User Name must be 4 characters or more!";
        $_SESSION['success'] = null;
        header('location: create.php');
        exit();
    }

    if(strlen($phone) != 11)
    {
        $_SESSION['error'] = "Phone should contains 11 number!";
        $_SESSION['success'] = null;
        header('location: create.php');
        exit();
    }
    
    $user_create_query = mysqli_query($connection, 
    "INSERT INTO users (username, phone, address) VALUES ( '$username', '$phone', '$address')");

    if($user_create_query)
    {
        $_SESSION['success'] = "User was added Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }

    header('location: index.php');
    exit();
}

