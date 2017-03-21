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
                //load and render all posts
                    $query = "SELECT * FROM posts";
                    $select_all_posts = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts)){
                        $post_id = $row['Id'];
                        $post_title = $row['Title'];
                        $post_author = $row['Author'];
                        $post_date = $row['Date'];
                        $post_image = $row['Image'];
                        $post_content = substr($row['Content'], 0, 400);  
                 ?>
                        
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php } ?>
                

                
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
