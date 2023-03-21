<?php
    $titlePage = "Edit Product";
    include "../inc.php";
    $product_id = $_GET['id'];
    $product_query = mysqli_query($connection, "SELECT * FROM products WHERE id = '$product_id'");
    $product = [];
    if(mysqli_num_rows($product_query) > 0)
    {
        $product  = mysqli_fetch_assoc( $product_query);
    }

     // select categories
     $categories_query = mysqli_query($connection, "SELECT * FROM categories");
     $categories = [];
     if(mysqli_num_rows($categories_query) > 0)
     {
         while($data = mysqli_fetch_assoc($categories_query))
         {
             $categories[] = $data;
         }
     }
 
     // select users
     $users_query = mysqli_query($connection, "SELECT * FROM users");
     $users = [];
     if(mysqli_num_rows($users_query) > 0)
     {
         while($data = mysqli_fetch_assoc($users_query))
         {
             $users[] = $data;
         }
     }

?>

    <h1 style="text-align: center; margin:30px" >Edit Product Page</h1>
    <div class="container">
        <?php
                if(isset($_SESSION['error']) && !is_null( $_SESSION['error'])){
            ?>
                <div class="row justify-content-center">
                <div class="alert alert-danger col-6" role="alert">
                        <?php echo $_SESSION['error'];?>
                </div>
                </div>

            <?php
                }
            ?>





    <div class="row justify-content-center">
            <form action="./create_submit.php" method="post" class="col-6" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" class="form-control" id="product_name"
                     placeholder="ex: Clothes one">
                </div>
                <div class="input-group mb-3">
                    <input type="file" name="image" value="<?php echo $product['product_image'];?>" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text"  for="inputGroupFile02">Upload</label>
                </div>
                <select class="form-select" name="user_id" aria-label="Default select example">
                <?php
                    foreach($users as $user)
                    {
                        ?>
                    <option value="<?php echo $user['id']?>" selected><?php echo $user['username'] ?></option>
               <?php
                    }
                ?>
                    </select>
                <?php
                    foreach($categories as $category)
                    {
                        ?>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?php echo $category['id']?>"
                     name="categories[]" id="cat-<?php echo $category['id']?>">
                    <label class="form-check-label" for="cat-<?php echo $category['id']?>">
                        <?php echo $category['category'] ?>
                    </label>
                </div>
                <?php
                    }
                ?>
                    <button type="submit" class="btn btn-success col-12">Edit</button>
            </form>
        </div>
    </div>
    <?php include "../init/footer.php"?>
