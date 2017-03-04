<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php";
  ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                
                <?php 
                
     if(isset($_POST['submit'])){  
           $search_string = $_POST['search'];
           $query = "SELECT * FROM posts
                     WHERE Tags LIKE '%$search_string%'";
           $search_query = mysqli_query($connection, $query);
           confirm_query($search_query);
            
           if(mysqli_num_rows($search_query) == 0)
               echo "<h1>No results found</h1>";
           else
           {                    
                    while($row = mysqli_fetch_assoc($search_query)){
                        $post_title = $row['Title'];
                        $post_author = $row['Author'];
                        $post_date = $row['Date'];
                        $post_image = $row['Image'];
                        $post_content = $row['Content'];  
                        
                 ?>
                        
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
       <?php     }
            }
     } ?>
                

                
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
