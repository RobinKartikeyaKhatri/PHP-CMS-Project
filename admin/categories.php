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
                            
                                    $query = "SELECT * FROM categories";
                                    $result = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $cat_id      = $row['cat_id'];
                                        $cat_title   = $row['cat_title'];

                                        echo "<tr>";
                                        echo "<td>$cat_id</td>";
                                        echo "<td>$cat_title</td>";
                                        echo "</tr>";
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
