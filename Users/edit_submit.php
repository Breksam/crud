<?php

session_start();
require '../db.php';

if(!empty($_POST))
{
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $user_id = $_POST['user_id'];

    if(strlen($username) < 1 || strlen($phone) < 1 || strlen($address) < 1)
    {
        $_SESSION['error'] = "Sorry, All fields required!";
        $_SESSION['success'] = null;
        header('location: edit.php?user_id=' .$user_id);
        exit();
    }

    if(strlen($username) < 4)
    {
        $_SESSION['error'] = "User Name must be 4 characters or more!";
        $_SESSION['success'] = null;
        header('location: edit.php?user_id=' .$user_id);
        exit();
    }

    if(strlen($phone) != 11)
    {
        $_SESSION['error'] = "Phone should contains 11 number!";
        $_SESSION['success'] = null;
        header('location: edit.php?user_id=' .$user_id);
        exit();
    }

    $update_query = mysqli_query($connection, 
    "UPDATE users SET username = '$username', phone = '$phone', address = '$address'
    WHERE id = '$user_id'");

    if($update_query)
    {
        $_SESSION['success'] = "User was updated Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }

    header('location: index.php');
    exit();
}


    