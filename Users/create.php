<?php 
    $titlePage = "Add User";
include "../inc.php";?>

    <h1 style="text-align:center;margin:30px">
        Create User Page
    </h1>

    <div class="container">
        <?php
            if(isset($_SESSION['error']) && !is_null($_SESSION['error']))
                {
            ?>
            <div class="row justify-content-center">
                <div class="alert alert-danger col-6 ">
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']);?>
                </div>
            </div>
            <?php
                }
            ?>
            
        <div class="row justify-content-center">
            <form action="./create_submit.php" method="post" class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="username" class="form-control" id="name" placeholder="ex: Ahmed Mohamed">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="ex: +201000000">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success col-12">
                    Save
                </button>
            </form>
        </div>
    </div>

    <?php include "../init/footer.php";?>

