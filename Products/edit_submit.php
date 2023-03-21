<?php
    require '../db.php';
    session_start();

    if(!empty($_POST)){
        $name = $_POST['pro_name'];
        $image = $_POST['pro_image'];
        $id = $_POST['product_id'];

        if(strlen($name) == 0 || strlen($image) == 0 ){
            $_SESSION['error'] = 'All Fields are requires!';
            $_SESSION['success'] = null;
            header("location:edit.php?id=".$id);
            exit();
        }
        if(strlen($name) <= 2){
            $_SESSION['error'] = 'Product name must be more than 2 characters!';
            $_SESSION['success'] = null;
            header("location:edit.php?id=".$id);

            exit();
        }

        $product_update_query = mysqli_query($connection, 
        "UPDATE products SET product_name = '$name', product_image = '$image' WHERE id = '$id'");
        
        if($product_update_query)
            {
                $_SESSION['error'] = null;
                $_SESSION['success'] = 'Product Edited Success';
            } else {
                $_SESSION['success'] = null;
                $_SESSION['error'] = 'Error occurred!';
            }       
        header('location:index.php');
        exit();
    }  
?>