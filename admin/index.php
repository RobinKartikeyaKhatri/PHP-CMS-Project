<?php include("includes/header.php"); ?>

    <div id="wrapper">
    
<?php

$session = session_id();
$time = time();
$time_out_in_seconds = 60;
$time_out = $time - $time_out_in_seconds;

$query = "SELECT * FROM users_online WHERE session = '$session'";
$send_query = mysqli_query($connection, $query);

$count = mysqli_num_rows($send_query);

if($count == NULL)
{
    mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
}
else
{
    mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
}

$users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
$count_user = mysqli_num_rows($users_online_query);


?>

        <!-- Navigation -->
        <?php include("includes/navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Dashboard
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <h1>
                            <?php echo $count_user; ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                    
                                        $query = "SELECT * FROM posts";
                                        $select_all_posts = mysqli_query($connection, $query);
                                        $post_counts = mysqli_num_rows($select_all_posts);

                                        echo "<div class='huge'>$post_counts</div>";
                                    
                                    ?>

                                
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                    
                                        $query = "SELECT * FROM comments";
                                        $select_all_comments = mysqli_query($connection, $query);
                                        $comments_counts = mysqli_num_rows($select_all_comments);

                                        echo "<div class='huge'>$comments_counts</div>";
                                    
                                    ?>

                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                    
                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection, $query);
                                        $users_counts = mysqli_num_rows($select_all_users);

                                        echo "<div class='huge'>$users_counts</div>";
                                    
                                    ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php

                                        $query = "SELECT * FROM categories";
                                        $select_all_categories = mysqli_query($connection, $query);
                                        $categories_counts = mysqli_num_rows($select_all_categories);

                                        echo "<div class='huge'>$categories_counts</div>";
                                    
                                    ?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php

                    $query = "SELECT * FROM posts WHERE post_status = 'published'";
                    $select_all__published_posts = mysqli_query($connection, $query);
                    $post_published_counts = mysqli_num_rows($select_all__published_posts);

                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_all__draft_posts = mysqli_query($connection, $query);
                    $post_draft_counts = mysqli_num_rows($select_all__draft_posts);

                    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                    $select_all_unapproved_comments = mysqli_query($connection, $query);
                    $comments_unapproved_counts = mysqli_num_rows($select_all_unapproved_comments);

                    $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
                    $select_all_subscriber_users = mysqli_query($connection, $query);
                    $users_subscribers_counts = mysqli_num_rows($select_all_subscriber_users);

                
                ?>

                <div class="row"> <!-- Google Charts -->
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php
                                
                                $element_text = ['All Posts', 'Active Posts', 'Draft Posts','Comments', 'Unapproved Comments', 'Users', 'Subscribers Users', 'Categories'];
                                $element_count = [$post_counts, $post_published_counts, $post_draft_counts, $comments_counts, $comments_unapproved_counts, $users_counts, $users_subscribers_counts, $categories_counts];

                                for($i = 0; $i < 8; $i++)
                                {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                            
                            ?>

                            // ['Posts', 1000],
                            
                        ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


                </div> <!-- End of Google Charts -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
