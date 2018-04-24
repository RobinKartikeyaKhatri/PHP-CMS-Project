<?php

    function insertCategories() // insert categories
    {
        global $connection;

        if(isset($_POST['submit']))
        {
            $cat_title = mysqli_real_escape_string($connection, trim($_POST['cat_title']));
    
            if($cat_title == "" || empty($cat_title))
            {
                echo "<p class='text-danger'>Please enter category!</p>";
            }
            else
            {
                $query = "INSERT INTO categories(cat_title) VALUES('$cat_title')";
                $result = mysqli_query($connection, $query);

                echo "<p class='text-success'>Recored added succeessfuly.</p>";

                if(!$result)
                {
                    die("Query failed! " . mysqli_error($connection));
                }
            }
        }
    }

    function showAllCategories() // Show all categories
    {
        global $connection;

        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result))
        {
            $cat_id      = $row['cat_id'];
            $cat_title   = $row['cat_title'];

            echo "<tr>";
            echo "<td>$cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a class='btn btn-danger' href='categories.php?delete=$cat_id '>DELETE</a></td>";
            echo "<td><a class='btn btn-warning' href='categories.php?edit=$cat_id '>EDIT</a></td>";
            echo "</tr>";
        }
    }

    function deleteCategories() // Delete categories functions
    {
        global $connection;

        if(isset($_GET['delete']))
        {
            $the_delete_cat_id = $_GET['delete'];

            $query = "DELETE FROM categories WHERE cat_id = {$the_delete_cat_id} LIMIT 1";
            $result = mysqli_query($connection, $query);

            header("Location: categories.php");
        }
    }

?>