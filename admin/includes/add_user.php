<?php

    if(isset($_POST['create_post']))
    {
       $post_title          = mysqli_real_escape_string($connection, trim($_POST['post_title']));
       $post_category_id    = mysqli_real_escape_string($connection, trim($_POST['post_category_id']));
       $post_author         = mysqli_real_escape_string($connection, trim($_POST['post_author']));
       $post_status         = mysqli_real_escape_string($connection, trim($_POST['post_status']));

       $post_image          = $_FILES['image']['name'];
       $post_image_tmp      = $_FILES['image']['tmp_name'];

       $post_tags           = mysqli_real_escape_string($connection, trim($_POST['post_tags']));
       $post_content        = mysqli_real_escape_string($connection, trim($_POST['post_content']));

       $post_date           = date('d-m-y');
    //    $post_comment_count  = 4;

       move_uploaded_file($post_image_tmp, "../images/$post_image");

       $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, 
                    post_content, post_tags, post_status) VALUES($post_category_id, 
                    '$post_title', 
                    '$post_author', now(), '$post_image', '$post_content', '$post_tags',  
                    '$post_status')";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);

    }

?>


<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category_id" class="form-control">
            <?php
            
                $query = "SELECT * FROM categories";
                $result = mysqli_query($connection, $query);

                confirmQuery($result);

                while($row = mysqli_fetch_array($result))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    
                    echo "<option value='$cat_id'>$cat_title</option>";
                }
            
            ?>
            
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <input type="text" name="post_category_id" class="form-control">
    </div> -->

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="Publish Post" name="create_post" class="btn btn-primary">
    </div>

</form>