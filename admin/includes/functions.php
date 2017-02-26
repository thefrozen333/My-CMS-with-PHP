<?php
//Create category
function create_category(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title))
            echo "<h3>This field should not be empty!</h3>";
        else{
            $query = "INSERT INTO category(Name) ";
            $query .= "VALUES('{$cat_title}')";
            
            $create_category = mysqli_query($connection, $query);
            
            if(!$create_category)
                die('QUERY FAILED' . mysqli_error($connection));
            
        }
    }
}

function get_all_categories(){
      global $connection;
    
      $query = "SELECT * FROM category ORDER BY Id";
                            
      $select_categories = mysqli_query($connection, $query);
                                    
      while($row = mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['Id'];
                $cat_title = $row['Name'];
           
                echo "<tr>";
                echo "<td>$cat_id</td>";
                echo "<td>$cat_title</td>";
                echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                echo "</tr>";
      }
}

function delete_category(){
    global $connection;
    
 if(isset($_GET['delete'])){
        $delete_cat_id = $_GET['delete'];
        $query = "DELETE FROM category WHERE Id = {$delete_cat_id}";
        
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }                                       
}
?>