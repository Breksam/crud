<?php
    $titlePage = "User's Products";
    include "../inc.php";
$user_id = $_GET['user_id'];

// get user data

$user_products_query = mysqli_query($connection, 
"SELECT users.username as user_name, products.id, products.product_name, products.product_image FROM users INNER JOIN products ON users.id = products.user_id
 WHERE users.id = '$user_id'");

$user_name = "";
$products = [];

if(mysqli_num_rows($user_products_query) > 0){
    while($product = mysqli_fetch_assoc($user_products_query))
    {
        $products[] = $product;
    }
    $user_name = $products[0]['user_name'];
}
?>
    <h1 style="text-align:center;margin:30px">
        <?php if(!empty($user_name)):?>
        Products Page
    </h1>
    <div class="container">
        <div class="row justify-content-end">
            <a href="" class="btn btn-primary col-2 m-2">
                Add Product
            </a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">User</th>
                </tr>
            </thead>
            <tbody>
            <?php

                foreach($products as $product)
                {
                    echo "<tr>";
                    echo "<th>{$product['id']}</th>";
                    echo "<td>{$product['product_name']}</td>";
                    echo "<td><img src='{$product['product_image']}' height='200' width='300'/></td>";
                    echo "<td> <a class='btn btn-warning' href='show.php?user_id=".$user_id."'> ".$user_name." </a> </td>";
                    echo "</tr>";
                }

            ?>
            </tbody>
        </table>
    </div>
    <?php else: echo"<div class='alert alert-danger text center'>No Products Added!</div>
                    <a href='../Products/create.php' class='btn btn-primary col-2 m-2'>Add Product</a>"?>
        <?php endif;?>
        <?php include "../init/footer.php";?>
   
