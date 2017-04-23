 <div class="col-md-4">
         <!-- Blog Search Well -->
         <div class="well">
             <h4>Blog Search</h4>
             <form action="search.php" method="post">
             <div class="input-group">    
                 <input type="text" name="search" class="form-control">
                 <span class="input-group-btn">
                     <button class="btn btn-default" name="submit" type="submit">
                         <span class="glyphicon glyphicon-search"></span>
                 </button>
                 </span>
             </div>
             </form>
             <!-- /.input-group -->
         </div>

     
     
     
      <!-- Login -->
     
     <?php 
        if(!isset($_SESSION['username'])){
            include "login-form.php";
        }
     ?>
     
         <!-- Blog Categories Well -->
         <div class="well">
             <h4>Blog Categories</h4>
             <div class="row">
                 <div class="col-lg-12">
                     <ul class="list-unstyled">
     <?php
            //fill side widget with categories from DB
                $query = "SELECT * FROM category";
                $select_categories_sidebar = mysqli_query($connection, $query);          
                        while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                        $cat_title = $row['Name'];
                        $cat_id = $row['Id'];
                        
                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
        ?>
                     </ul>
                 </div>
             </div>
             <!-- /.row -->
         </div>

         <!-- Side Widget Well -->
         <?php include "widget.php" ?>
 </div>