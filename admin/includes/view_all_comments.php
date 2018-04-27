<table class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php //Showing all posts

        $query = "SELECT * FROM comments";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) 
        {
            $comment_id         = $row['comment_id'];
            $comment_post_id    = $row['comment_post_id'];
            $comment_author     = $row['comment_author'];
            $comment_email      = $row['comment_email'];
            $comment_content    = $row['comment_content'];
            $comment_status     = $row['comment_status'];
            $comment_date       = $row['comment_date'];
            

            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            // $select_categories = mysqli_query($connection, $query);
            // while($row = mysqli_fetch_array($select_categories))
            // {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];

            //     echo "<td>$cat_title</td>";
            // }
            

            



            echo "<td>$comment_email";
            echo "<td>$comment_status</td>";

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $result_show = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($result_show))
            {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<td><a class='btn btn-primary' href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }

            


            echo "<td>$comment_date</td>";
            echo "<td><a class='btn btn-success' href='#'>Approve</a></td>";
            echo "<td><a class='btn btn-warning' href='#'>Unapprove</a></td>";
            echo "<td><a class='btn btn-danger' href='#'>Delete</a></td>";
            echo "</tr>";
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