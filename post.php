<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"?>;

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                
                <?php 
            //Render clicked post(this is the post's full page with comments) 
            if(isset($_GET['p_id'])){
                   $clicked_post_id = $_GET['p_id'];
            }
                    $query = "SELECT * FROM posts WHERE Id = $clicked_post_id";
                    $select_all_posts = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts)){
                        $post_title = $row['Title'];
                        $post_author = $row['Author'];
                        $post_date = $row['Date'];
                        $post_image = $row['Image'];
                        $post_content = $row['Content'];  
                        
                 ?>
                        

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>
                
                <?php }?>
                
 <!-- Blog Comments -->

                
               <?php 
                //If Post comment is clicked take info from form and query to DB
                    if(isset($_POST['create_comment'])){
                       $post_id = $_GET['p_id'];
                       $comment_author = $_POST['comment_author'];
                       $comment_email = $_POST['comment_email'];
                       $comment_text = $_POST['comment_text'];
                        
                    $query = "INSERT INTO comments (PostId, Author, 
                    Email, Content, Status, Date) ";
                        
                    $query .= "VALUES($post_id, '$comment_author', 
                    '$comment_email', '$comment_text', 'pending', now())";
                        
                    $create_comment_query = mysqli_query($connection, $query);
                    confirm_query($create_comment_query);
                        
                        
                    $query = "UPDATE posts SET CommentCount = CommentCount + 1
                             WHERE Id = $post_id" ;  
                    $update_comment_count = mysqli_query($connection, $query);
                    confirm_query($update_comment_count);
                        
                    }
                ?>
               
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                       
                       <div class="form-group">
                           <label for="comment_author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                       
                       <div class="form-group">
                           <label for="comment_email">E-mail</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                       
                        <div class="form-group">
                           <label for="comment_text">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_text"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

               <?php 
                    $query = "SELECT * FROM comments WHERE PostId = $clicked_post_id
                              AND Status = 'approved'
                              ORDER BY Id DESC";
                $select_comment_query = mysqli_query($connection, $query);
                confirm_query($select_comment_query);
                
                while($row = mysqli_fetch_array($select_comment_query)){
                    $comment_date = $row["Date"];
                    $comment_content = $row["Content"];
                    $comment_author = $row["Author"];
                    
                    ?>

                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?> 
                    </div>
                </div>  
                    
                    
               <?php } ?>
               
               
                <!-- Comment -->
                              
            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

          <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
