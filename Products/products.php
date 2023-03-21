<?php
    $titlePage = "Products";
    include "../inc.php";

    function getProducts(){
        global $connection;

        $product_query = mysqli_query($connection, 'SELECT * FROM products');
        $products = [];

        if(mysqli_num_rows($product_query) > 0){
            while($product = mysqli_fetch_assoc($product_query)){
                    $products[] = $product;
            }
        }
        return $products;
    }
        
    Function getCategory($product_id){
        global $connection;
        $categ_pro_query = mysqli_query($connection, "SELECT categories.category FROM category_product INNER join  categories  ON category_product.category_id = categories.id WHERE category_product.product_id = '$product_id'   ");
        $categ_names= [];
            if(mysqli_num_rows($categ_pro_query) > 0){
                while( $names = mysqli_fetch_assoc($categ_pro_query)){
                        $categ_names[] =  $names;
                }
            }
            return $categ_names;
    }
?>

    <h1 style="text-align: center; margin:30px" >Products Page</h1>

    <div class="container">
    <?php
            if(isset($_SESSION['success']) && !is_null( $_SESSION['success'])){
        ?>
            <div class="row justify-content-center">
            <div class="alert alert-success col-6" role="alert">
                    <?php echo $_SESSION['success'];?>
                    <?php unset($_SESSION['success']);?>
            </div>
            </div>

        <?php
            }
        ?>


        <?php
            if(isset($_SESSION['error']) && !is_null( $_SESSION['error'])){
        ?>
            <div class="row justify-content-center">
            <div class="alert alert-danger col-6" role="alert">
                    <?php echo $_SESSION['error'];?>
                    <?php unset($_SESSION['error']);?>

            </div>
            </div>

        <?php
            }
        ?>
        <div class="row justify-content-end m-0">
            <a href="create.php" class="btn btn-primary" style="color:white;margin-bottom:10px;width:25%;">Add Product</a>
        </div>
    <table class="table table-striped">
    <thead >
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th></th>
        <th></th>
        <th>Categories</th>
        <th scope="col">Assign To categories</th>
        
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach(getProducts() as $product){
            echo '<tr>';
            echo "<th scope='row'> {$product['id']} </th>";
            echo "<td>{$product['product_name']}</td>";
            echo "<td><img src='{$product['product_image']}' height='200' width='300'/></td>";
            echo "<td><a  href='edit.php?id=".$product['id']."' class='btn btn-warning'>Edit</a></td>";
            echo "<td><a href='delete.php?id=".$product['id']."' class='btn btn-danger'>Delete</a></td>";
            echo "<td>";
                foreach(getCategory($product['id']) as $categ_name){
                        echo $categ_name['category']."<br>";
                }   
                echo "</td>";
            
            echo "<td><a href='assign_to_category.php?product_id={$product['id']}'> Assign </a></td>";
            echo '</tr>';
        }
        ?>
    </tbody>
    </table>
</div>
    
<?php include "../init/footer.php"?>





