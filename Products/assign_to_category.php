<?php
    $titlePage = "Assign";
include "../inc.php";

$categories_query = mysqli_query($connection, "SELECT * FROM categories");
$categories = [];
if(mysqli_num_rows($categories_query) > 0)
{
    while($data = mysqli_fetch_assoc($categories_query))
    {
        $categories[] = $data;
    }
}
?>

    <h1 style="text-align:center;margin:30px">
        Assign Product 
    </h1>

    <div class="container">
        <?php

            if(isset($_SESSION['error']) && !is_null($_SESSION['error']))
                {
            ?>
            <div class="row justify-content-center">
                <div class="alert alert-danger col-6 ">
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                    
                </div>
            </div>
            <?php
                }
            ?>
            
        <div class="row justify-content-center">
            <form action="./assign_to_category_submit.php" method="post" class="col-12 row" enctype="multipart/form-data">
            <h3 align="center" class="mb-4">Categories</h3>
                    <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>">
                <?php
                    foreach($categories as $category)
                    {
                        ?>
                    <div class="form-check col-3">
                    <input class="form-check-input" type="checkbox" value="<?php echo $category['id']?>"
                     name="categories[]" id="cat-<?php echo $category['id']?>">
                    <label class="form-check-label" for="cat-<?php echo $category['id']?>">
                        <?php echo $category['category']  ?>
                    </label>
                    </div>
                <?php
                    }
                ?>



                <button type="submit" class="btn btn-success col-12 mt-3">
                    Save
                </button>
            </form>
        </div>
    </div>
<?php include "../init/footer.php"?>


    
