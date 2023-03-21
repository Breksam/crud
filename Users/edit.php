<?php
    $titlePage = "Edit User";
include "../inc.php";

    $user_id = $_GET['user_id'];

    $user_query = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
    
    $user = [];
    
    if(mysqli_num_rows($user_query) > 0)
    {
        $user = mysqli_fetch_assoc($user_query);
    }
 

?>

    <h1 style="text-align:center;margin:30px">
        Edit User Page
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
            <form action="./edit_submit.php" method="post" class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="username" 
                    value="<?php echo $user['username'] ?>"
                    class="form-control" id="name" placeholder="ex: Ahmed Mohamed">
                </div>

                <input name="user_id" type="hidden" value="<?php echo $user['id'] ?>" >
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" 
                    value="<?php echo $user['phone'] ?>"
                    name="phone" class="form-control" id="phone" placeholder="ex: +201000000">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" rows="3"><?php echo $user['address'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-success col-12">
                    Save
                </button>
            </form>
        </div>
    </div>
    <?php include "../init/footer.php";?>


