<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                                <span class="input-group-btn">
                                    <button name="submit" class="btn btn-default" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php
                            
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                   $cat_id = $row['cat_id'];
                                   $cat_title = $row['cat_title'];

                                   echo "<li><a href='category.php?category=$cat_id'>$cat_title</a>
                                   </li>";
                                }
                            
                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include("widget.php"); ?>

            </div>