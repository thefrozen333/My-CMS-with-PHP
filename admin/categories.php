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
                        
                        <!-- Add Category Form -->
                        <div class="col-xs-6">
                            <!-- Create new category -->                           
                            <?php create_category(); ?>
                            
                             <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                 </div>
                                 
                                 <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                 </div>
                             </form>
                                                         
                             <?php 
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_categories.php";
                                }    
                            
                            ?>
                                                          
                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                  <?php  get_all_categories();?>
                  <?php delete_category();?>
                                </tbody>
                            </table>
                        
                        </div>

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
