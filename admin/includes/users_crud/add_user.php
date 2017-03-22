<?php 
    //Get data from form and insert it into DB
    //Redirect admin to users.php which triggers view_all_users.php
    if(isset($_POST['create_user'])){
        
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$user_image");
        
        $query = "INSERT INTO users(Username, Password, 
                    Firstname, Lastname, Email, 
                    Role, UserImage) ";
        $query .= "VALUES('$user_username', '$user_password', 
                  '$user_firstname', '$user_lastname', '$user_email', 
                  '$user_role', '$user_image')";
        
        $create_user_query = mysqli_query($connection, $query);
        confirm_query($create_user_query);
        header("Location: users.php");
    }

?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <label for="user_email">E-mail</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

   
   <div class="form-group col-3">
    <label for="user_role">Roles</label>
    <select name="user_role" class="form-control" id="">
        <option value="subscriber">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>        
    </select>
   </div>
   
    <div class="form-group">
        <label for="user_image">Post Image</label>
        <input type="file" name="user_image">
    </div>
    
    

    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>
</form>