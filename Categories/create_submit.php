
<?php

require '../db.php';

session_start();

if(!empty($_POST))
{
    $name = $_POST['name'];

    if(strlen($name) < 1 )
    {
        $_SESSION['error'] = "Sorry, All fields required!";
        $_SESSION['success'] = null;
        header('location: create.php');
        exit();
    }

    if(strlen($name) < 4)
    {
        $_SESSION['error'] = "Category Name must be 4 characters or more!";
        $_SESSION['success'] = null;
        header('location: create.php');
        exit();
    }
    
    $category_create_query = mysqli_query($connection, 
    "INSERT INTO categories (category) VALUES ('$name')");

    if($category_create_query)
    {
        $_SESSION['success'] = "Category was added Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }

    header('location: index.php');
    exit();
}

