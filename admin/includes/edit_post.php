<?php 
   if(isset($_GET['p_id'])){
       $post_id_edit = $_GET['p_id'];
   }
        //Get data from DB to fill current post info before admin makes changes
        $query = "SELECT * FROM posts WHERE $post_id_edit = Id";
        $select_posts_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_id)){
        $post_author = $row['Author'];
        $post_title = $row['Title'];
        $post_category_id = $row['CategoryId'];
        $post_status = $row['Status'];
        $post_content = $row['Content'];
        $post_image = $row['Image'];
        $post_tags = $row['Tags'];
        $post_comment_count = $row['CommentCount'];
        $post_date = $row['Date'];
        //
    }

    //if update post is clicked get info from form fields and update DB
    //Then move admin to posts.php where he can see all posts with the changed one 
    if(isset($_POST['update_post'])){
        
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_author = $_POST['post_author'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        if(empty($post_image)){
           $query = "SELECT * FROM posts WHERE Id = $post_id_edit";
           $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image)){
                $post_image = $row['Image'];
            }
        }
        
        $query = "UPDATE posts SET ";
        $query .= "Title = '{$post_title}', ";
        $query .= "CategoryId = {$post_category_id}, ";
        $query .= "Date = now(), ";
        $query .= "Author = '{$post_author}', ";
        $query .= "Status = '{$post_status}', ";
        $query .= "Tags = '{$post_tags}', ";
        $query .= "Content = '{$post_content}', ";
        $query .= "Image = '{$post_image}' ";
        $query .= "WHERE Id = {$post_id_edit}";
        
        $update_post = mysqli_query($connection, $query);
        confirm_query($update_post);
        
        header("Location: posts.php");
    }
?>
   

   
  <!--Put data from DB in the form for selected for edit post -->
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" 
           name="post_title">
    </div>
    
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category" id="">
            <?php
                 $query = "SELECT * FROM category";
                 $select_categories = mysqli_query($connection, $query); 
                 confirm_query($select_categories);
   
                 while($row = mysqli_fetch_assoc($select_categories)){
                 $cat_id = $row['Id'];
                 $cat_title = $row['Name']; 
                     
                 echo "<option value='$cat_id'>$cat_title</option>";
             }
            ?>
            
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>
    
    <div class="form-group">
       <?php echo "<img width='100' src='../images/$post_image' alt='image'>" ;?>
       <br>
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>