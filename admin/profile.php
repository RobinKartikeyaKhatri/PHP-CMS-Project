<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $edit_user_profile = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($edit_user_profile))
    {
        $user_id            = $row['user_id'];
        $username           = $row['username'];
        $password           = $row['password'];
        $user_firstname     = $row['user_firstname'];
        $user_lastname      = $row['user_lastname'];
        $user_email         = $row['user_email'];
        $user_image         = $row['user_image'];
        $user_role          = $row['user_role'];
    }
}

?>

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

                        <form action="" method="post" enctype="multipart/form-data">
    
                            <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_image">Image</label>
                                <img class="img-responsive" width="200" src="../images/<?php echo $user_image; ?>" alt="">
                                <input type="file" name="user_image" class="form-control">
                            </div>

                            <div class="form-group">
                                <select name="user_role" class="form-control">
                                    <option value="Subscriber"><?php echo $user_role?></option>
                                
                                <?php
                                
                                    if($user_role == "Admin")    
                                    {
                                        echo "<option value='Subscriber'>Subscriber</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='Admin'>Admin</option>";
                                    }
                                
                                ?>
                                    
                                    
                                    
                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Profile" name="update_user" class="btn btn-primary">
                            </div>

                        </form>






































































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
