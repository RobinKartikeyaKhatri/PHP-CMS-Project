<table class="table table-responsive table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php //Showing all posts

        $query = "SELECT * FROM posts";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) 
        {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
    ?>

            <tr>
            <td><?php echo $post_id; ?></td>
            <td><?php echo $post_author; ?></td>
            <td><?php echo $post_title; ?></td>
            <td><?php echo $post_category_id; ?></td>
            <td><?php echo $post_status; ?></td>
            <td><img class='img-responsive' width='100' src='../images/<?php echo $post_image; ?>'></td>
            <td><?php echo $post_tags; ?></td>
            <td><?php echo $post_comment_count; ?></td>
            <td><?php echo $post_date; ?></td>
            <td><a class='btn btn-danger' href="posts.php?delete=<?php echo $post_id; ?>">Delete</a></td>
        </tr>
    <?php    
        }

    ?>

        
    </tbody>
</table>

<?php

if (isset($_GET['delete'])) 
{
   $delete_post_id = $_GET['delete'];

   $query = "DELETE FROM posts WHERE post_id = $delete_post_id LIMIT 1";
   $result = mysqli_query($connection, $query);

   confirmQuery($result);

   header("Location: posts.php");


}

?>