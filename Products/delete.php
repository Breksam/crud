<?php 
    session_start();
    require '../db.php';
    $product_id = $_GET['id'];

    $delete_query = mysqli_query($connection, "DELETE FROM products WHERE id = '$product_id'");

    if($delete_query){
        $_SESSION['error'] = null;
        $_SESSION['success'] = 'Product Deleted Success';

    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }
    header('location: index.php');
    exit();