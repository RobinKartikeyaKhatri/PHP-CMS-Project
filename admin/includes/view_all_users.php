<table class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php //Showing all posts

        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) 
        {
            $user_id            = $row['user_id'];
            $username           = $row['username'];
            $password           = $row['password'];
            $user_firstname     = $row['user_firstname'];
            $user_lastname      = $row['user_lastname'];
            $user_email         = $row['user_email'];
            $user_image         = $row['user_image'];
            $user_role          = $row['user_role'];
            
            

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";

            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            // $result_show = mysqli_query($connection, $query);

            // while($row = mysqli_fetch_array($result_show))
            // {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];

            //     echo "<td><a class='btn btn-primary' href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

            


            echo "<td>$user_role</td>";
            echo "<td><a class='btn btn-danger' href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
    

        
    

        
    </tbody>
</table>

<?php

if (isset($_GET['delete'])) 
{
   $delete_user_id = $_GET['delete'];

   $query = "DELETE FROM users WHERE user_id = $delete_user_id LIMIT 1";
   $delete_result = mysqli_query($connection, $query);

   confirmQuery($delete_result);

   header("Location: users.php");


}

if (isset($_GET['approve'])) 
{
    $the_approve_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_approve_id LIMIT 1";
    $approve_comment_query = mysqli_query($connection, $query);

    confirmQuery($approve_comment_query);

    header("Location: comments.php");
}

if(isset($_GET['unapprove']))
{
    $the_unapprove_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unaproved' WHERE comment_id = $the_unapprove_id LIMIT 1";
    $unapprove_comment_query = mysqli_query($connection, $query);

    confirmQuery($unapprove_comment_query);

    header("Location: comments.php");
}

?>