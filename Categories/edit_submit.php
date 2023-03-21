<?php

session_start();
require '../db.php';

if(!empty($_POST))
{
   
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
   

    if(strlen($name) < 1 )
    {
        $_SESSION['error'] = "Sorry, All fields required!";
        $_SESSION['success'] = null;
        header('location: edit.php?user_id=' .$user_id);
        exit();
    }

    if(strlen($name) < 4)
    {
        $_SESSION['error'] = "Category Name must be 4 characters or more!";
        $_SESSION['success'] = null;
        header('location: edit.php?user_id=' .$user_id);
        exit();
    }


    $update_query = mysqli_query($connection, 
    "UPDATE categories SET category = '$name'
    WHERE id = '$user_id'");

    if($update_query)
    {
        $_SESSION['success'] = "Category was updated Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }

    header('location: index.php');
    exit();
}


    