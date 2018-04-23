<?php include("includes/header.php"); ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author Name Here</small>
                        </h1>
                        <div class="col-xs-6">
                        
                        <?php
                            // Code to add categories
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
                            

                        ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" class="form-control" placeholder="Category">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                    // Code to display categories
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
                                        echo "</tr>";
                                    }

                                ?>

                                <?php
                                // Code to delete categories
                                if(isset($_GET['delete']))
                                {
                                    $the_delete_cat_id = $_GET['delete'];

                                    $query = "DELETE FROM categories WHERE cat_id = {$the_delete_cat_id} LIMIT 1";
                                    $result = mysqli_query($connection, $query);

                                    header("Location: categories.php");
                                    


                                }

                                
                                ?>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
