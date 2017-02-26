<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Area
                            <small>Work Work!</small>
                        </h1>
                        
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                           <?php 
                                $query = "SELECT * FROM posts";
                                $select_posts= mysqli_query($connection, $query);
    
                        while($row = mysqli_fetch_assoc($select_posts)){
                                $post_id = $row['Id'];
                                $post_author = $row['Author'];
                                $post_title = $row['Title'];
                                $post_category_id = $row['CategoryId'];
                                $post_status = $row['Status'];
                                $post_image = $row['Image'];
                                $post_tags = $row['Tags'];
                                $post_comment_count = $row['CommentCount'];
                                $post_date = $row['Date'];
                            
                            echo "<tr>";
                            echo "<td>{$post_id}</td>";
                            echo "<td>{$post_author}</td>";
                            echo "<td>{$post_title}</td>";
                            echo "<td>{$post_category_id}</td>";
                            echo "<td>{$post_status}</td>";
                            echo "<td><img width='100' src='../images/{$post_image}' alt='image'></td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$post_comment_count}</td>";
                            echo "<td>{$post_date}</td>";
                            echo "</tr>";
                        }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include "includes/admin_footer.php"?>
</html>
