  <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Edit Category</label>
                                   
                               <?php 
                                      if(isset($_GET['edit'])){
                                      $edit_cat_id = $_GET['edit'];
                                      $query = "SELECT * FROM category WHERE Id = {$edit_cat_id}";
                                      $select_categories_edit = mysqli_query($connection, $query); 

                                      while($row = mysqli_fetch_assoc($select_categories_edit)){
                                      $cat_id = $row['Id'];
                                      $cat_title = $row['Name'];   
                                          
                                       ?>   
              <input value="<?php if(isset($cat_title)) echo $cat_title;?>" class="form-control" type="text" name="cat_title"> 
                                          
                               <?php }
                                  }?>
                                 
                 <?php 
                    //Update category            
                     if(isset($_POST['update_category'])){
                        $update_cat_title = $_POST['cat_title'];
                        $query = "UPDATE category SET Name = '{$update_cat_title}' WHERE Id = {$cat_id}";
                        
                        $update_query = mysqli_query($connection, $query);
                        if(!$update_query)
                            die("Query failed" . mysqli_error($connection));
                                    
                     }
                    ?> 

                                 </div>
                                 
                                 <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                 </div>
                             </form>