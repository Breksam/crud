<?php
    $titlePage = "Edit Category";
include "../inc.php";


    $user_id = $_GET['user_id'];

    $category_query = mysqli_query($connection, "SELECT * FROM categories WHERE id = '$user_id'");
    
    $category = [];
    
    if(mysqli_num_rows($category_query) > 0)
    {
        $category = mysqli_fetch_assoc($category_query);
    }
 

?>

    <h1 style="text-align:center;margin:30px">
        Edit Category Page
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
            <form action="./edit_submit.php" method="post" class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="name" 
                    value="<?php echo $category['category'] ?>"
                    class="form-control" id="name" placeholder="ex: Ahmed Mohamed">
                </div>

                <input name="user_id" type="hidden" value="<?php echo $category['id'] ?>" >
              
                <button type="submit" class="btn btn-success col-12">
                    Edit
                </button>
            </form>
        </div>
    </div>

<?php include "../init/footer.php"?>
   
