<?php

session_start();

require '../db.php';

// check item has relation -> message -> has relation -> relations -> item

// Query select product where id = user_id

// mysqli_num_row



$user_id = $_GET['user_id'];

$delete_query = mysqli_query($connection, "DELETE FROM categories WHERE id = '$user_id'");

if($delete_query)
{
    $_SESSION['success'] = "Category deleted successfully!";
    $_SESSION['error'] = null;
} else {
    
    $_SESSION['success'] = null;
    $_SESSION['error'] = "Category not deleted, error occurred!";
}


header('location: index.php');
exit();