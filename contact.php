<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

 <?php
 
 if(isset($_POST['submit']))
 {
    $to      = "robinkartik@yahoo.com";
    $email   = mysqli_real_escape_string($connection, trim($_POST['email']));
    $subject = mysqli_real_escape_string($connection, trim($_POST['subject']));
    $body    = mysqli_real_escape_string($connection, trim($_POST['body']));

   if(!empty($email) && !empty($subject) && !empty($body))
   {
       
   }
   else
   {
       
   }
 }
 
 
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="I want to...">
                        </div>
                         <div class="form-group">
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Your message here..."></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn btn-success btn-lg btn-block" value="Send Email">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
