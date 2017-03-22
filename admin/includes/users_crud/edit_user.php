<?php 
    //Get data from form and insert it into DB
    //Redirect admin to users.php which triggers view_all_users.php

    if(isset($_GET['edit_user'])){
        $edit_user_id = $_GET['edit_user'];
        
            $query = "SELECT * FROM users WHERE Id = $edit_user_id";
            $get_edit_user_data = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($get_edit_user_data)){
            $user_id = $row['Id'];
            $user_user_image = $row['UserImage'];
            $user_password = $row['Password'];
            $user_username = $row['Username'];
            $user_firstname = $row['FirstName'];
            $user_lastname = $row['LastName'];
            $user_email = $row['Email'];
            $user_role = $row['Role'];
            $user_image = $row['UserImage'];
    }
}

    
    if(isset($_POST['edit_user'])){
        
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$user_image");
        
        $query = "UPDATE users SET ";
        $query .= "Username = '{$user_username}', ";
        $query .= "Password = '{$user_password}', ";
        $query .= "Email = '$user_email', ";
        $query .= "FirstName = '{$user_firstname}', ";
        $query .= "LastName = '{$user_lastname}', ";
        $query .= "Role = '{$user_role}', ";
        $query .= "UserImage = '{$user_image}' ";
        $query .= "WHERE Id = {$user_id}";
        
        $update_user = mysqli_query($connection, $query);
        confirm_query($update_user);
        
        header("Location: users.php");
    }

?>
   

   
   
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
    <label for="user_role">Roles</label>
    <select name="user_role" class="form-control" id="">
      
      <option value="subscriber"><?php echo $user_role; ?></option>
       <?php 
            if($user_role == 'admin')
                echo "<option value='subscriber'>subscriber</option>";
            else
                echo "<option value='admin'>admin</option>";
        ?>
        
                
    </select>
   </div>
   
    <div class="form-group">
        <label for="user_image">Post Image</label>
        <?php 
         echo "<img width='80'; 
         height='80' src='../images/{$user_image}' alt='image'>";?>
        <input type="file" name="user_image" value="<?php echo $user_image?>">
        
    </div>
    
    

    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
</form>