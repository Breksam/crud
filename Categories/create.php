<?php
    $titlePage = "Add Category";
include "../inc.php";


?>
    <h1 style="text-align:center;margin:30px">
        Create Category Page
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
            <form action="./create_submit.php" method="post" class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="ex: Clothes">
                </div>
                <button type="submit" class="btn btn-success col-12">
                    Add
                </button>
            </form>
        </div>
    </div>
    <?php include "../init/footer.php"?>

