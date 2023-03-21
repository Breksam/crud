<?php
    require '../db.php';
    session_start();

    $categories = $_POST['categories'];
    $product_id = $_POST['product_id'];

    if(empty($categories))
    {
        $_SESSION['error'] = "Please add product categories";
        $_SESSION['success'] = null;
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    $statement = "INSERT IGNORE  INTO category_product (product_id, category_id) VALUES ";
    foreach($categories as $key => $category_id){
        $statement .= " ('$product_id', '$category_id') ";
        if($key < count($categories) - 1)
        {
            $statement .= " , ";
        }
    }
    $unique_values = mysqli_query($connection, "ALTER TABLE category_product ADD UNIQUE KEY (product_id, category_id)");
    $category_product_query = mysqli_query($connection, $statement);
    if($category_product_query && $unique_values ){
        $_SESSION['success'] = "Product was assign Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }
    header('location: index.php');
    exit();

?>