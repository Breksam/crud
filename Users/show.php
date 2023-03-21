<?php
    $titlePage = "User Data";
include "../inc.php";

// user id 
$user_id = $_GET['user_id'];

// var_dump($user_id);

// get use data -> set on array
$user_query = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
$user = [];
if($user_query)
{
    $user = mysqli_fetch_assoc($user_query);
}
?>

    <h1 style="text-align:center;margin:30px">
        Show User Data
    </h1>

    <div class="container">
        <div class="row justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $user['username'] ?>
                </h5>
                <p class="card-text">
                    <?php echo $user['address'] ?>
                </p>
                <a href="#" class="btn btn-primary">
                <?php echo $user['phone'] ?>
                </a>
            </div>
            </div>
        </div>
    </div>

<?php include "../init/footer.php"?>