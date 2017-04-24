<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>

<?php 
    
    if(isset($_SESSION['username'])){
        
        $username  = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE Username = '$username'";
        
        $select_user_profile = mysqli_query($connection, $query);
        confirm_query($select_user_profile);
        
        while($row = mysqli_fetch_array($select_user_profile)){
            
            $user_id = $row['Id'];
            $user_password = $row['Password'];
            $user_user_image = $row['UserImage'];
            $user_username = $row['Username'];
            $user_firstname = $row['FirstName'];
            $user_lastname = $row['LastName'];
            $user_email = $row['Email'];
        }
    }
    
    
    if(isset($_POST['edit_user'])){
        
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$user_image");
        
        $query = "UPDATE users SET ";
        $query .= "Username = '{$user_username}', ";
        $query .= "Password = '{$user_password}', ";
        $query .= "Email = '$user_email', ";
        $query .= "FirstName = '{$user_firstname}', ";
        $query .= "LastName = '{$user_lastname}', ";
        $query .= "UserImage = '{$user_image}' ";
        $query .= "WHERE Username = '{$username}'";
        
        $update_user = mysqli_query($connection, $query);
        confirm_query($update_user);
        
        $_SESSION['username'] = $user_username;
        header("Location: users.php");
    }
    
?>
    
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

                            <small> </small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username" value="<?php echo $user_username?>">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password?>">
    </div>
    
    <div class="form-group">
        <label for="user_email">E-mail</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email?>">
    </div>
    
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname?>">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname?>">
    </div>
   
    <div class="form-group">
        <label for="user_image">Post Image</label>
        <input type="file" name="user_image" value="image">
        
    </div>
    
    

    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
    </div>
</form>
                        
                        
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
