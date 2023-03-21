<?php
    require '../db.php';
    session_start();

    $product_name = $_POST['product_name'];
    $user_id = $_POST['user_id'];
    $fileName = $_FILES['image']['name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $supported_file_types = ['jpg', 'jpeg', 'png'];
    $fileSize = $_FILES['image']['size'];
    $file = $_FILES['image']['tmp_name'];
    $newImageName =  strtotime("now") . '.' . $extension;
    $destination = 'photos/' . $newImageName;
    move_uploaded_file($file, $destination);

    if(strlen($product_name) < 1)
    {
        $_SESSION['error'] = "Product name is required ";
        $_SESSION['success'] = null;
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    if($fileSize == 0)
    {
        $_SESSION['error'] = "please upload photo!";
        $_SESSION['success'] = null;
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    if(!in_array($extension, $supported_file_types))
    {
        $_SESSION['error'] =  "File  type you are using is not supported";
        $_SESSION['success'] = null;
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    if($fileSize > 1000000000)
    {
        $_SESSION['error'] =  "The file you uploaded is too large"; 
        $_SESSION['success'] = null;
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();  
    }

    $product_query = mysqli_query($connection, "INSERT INTO products (product_name, product_image, user_id) VALUES ('$product_name', '$destination', '$user_id')");

    if($product_query)
    {
        $_SESSION['success'] = "Product was added Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }

    header('location: index.php');
    exit();
?>