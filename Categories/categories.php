<?php
    $titlePage = "Categories";
include "../inc.php";

function getCtegory()
{
    global $connection;

    // for connecting to db and run specific query
    $categories_query = mysqli_query($connection, "SELECT * FROM categories");

    $categories = [];
    
    // calculate the number of rows from the result returned from query
    if(mysqli_num_rows($categories_query) > 0)
    {
        // return the next row from the query
        while($category = mysqli_fetch_assoc($categories_query))
        {
            $categories[] = $category;
        }
    }

    return $categories;
}

?>



    <h1 style="text-align:center;margin:30px">
        Categories Page
    </h1>


    <div class="container">

    <?php
        if(isset($_SESSION['success']) && !is_null($_SESSION['success']))
            {
        ?>
        <div class="row justify-content-center">
            <div class="alert alert-success col-6 ">
                <?php echo $_SESSION['success']; ?>
            </div>
        </div>

        <?php

            }
        ?>
        <div class="row justify-content-end">
            <a href="./create.php" class="btn btn-primary col-2 m-2">
                Add Category
            </a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach(getCtegory() as $category)
                {
                    echo "<tr>";
                    
                    echo "<th>{$category['id']}</th>";
                    echo "<td>{$category['category']}</td>";
                    echo "<td> <a class='btn btn-warning' href='edit.php?user_id=".$category['id']."'> Edit </a> </td>";
                    echo "<td><a class='btn btn-danger' href='delete.php?user_id=".$category['id']."'> Delete </a> </td>";
                   
                    
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

    <?php include "../init/footer.php"?>
