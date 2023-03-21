<?php
    $titlePage = "Users";
    include "../inc.php";
function getUsers()
{
    global $connection;

    // for connecting to db and run specific query
    $users_query = mysqli_query($connection, "SELECT * FROM users");

    $users = [];
    
    // calculate the number of rows from the result returned from query
    if(mysqli_num_rows($users_query) > 0)
    {
        // return the next row from the query
        while($data = mysqli_fetch_assoc($users_query))
        {
            $users[] = $data;
        }
    }

    return $users;
}

?>

    <h1 style="text-align:center;margin:30px">
        Users Page
    </h1>


    <div class="container">

    <?php
        if(isset($_SESSION['success']) && !is_null($_SESSION['success']))
            {
        ?>
        <div class="row justify-content-center">
            <div class="alert alert-success col-6 ">
                <?php echo $_SESSION['success']; ?>
                <?php unset($_SESSION['success']);?>
            </div>
        </div>

        <?php

            }
        ?>
        <div class="row justify-content-end">
            <a href="./create.php" class="btn btn-primary col-2 m-2">
                Add User
            </a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Products</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach(getUsers() as $user)
                {
                    echo "<tr>";
                    
                    echo "<th>{$user['id']}</th>";
                    echo "<td>{$user['username']}</td>";
                    echo "<td>{$user['phone']}</td>";
                    echo "<td>{$user['address']}</td>";
                    echo "<td> <a class='btn btn-warning' href='edit.php?user_id=".$user['id']."'> Edit </a> </td>";
                    echo "<td><a class='btn btn-danger' href='delete.php?user_id=".$user['id']."'> Delete </a> </td>";
                    echo "<td><a class='btn btn-secondary' href='products.php?user_id=".$user['id']."'> View </a> </td>";
                    
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    <?php include "../init/footer.php";?>

   
