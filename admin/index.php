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
                           
                            <small>Good day to you, <?php echo $_SESSION['username'];?>!</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <?php include "includes/partial_views/admin_widgets.php"; ?>
                
                
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
