<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Profile Picture</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                           <?php 
                            //Get all users from the DB and put them in a neat table for the admin to see
                                $query = "SELECT * FROM users";
                                $select_users = mysqli_query($connection, $query);
    
                        while($row = mysqli_fetch_assoc($select_users)){
                                $user_id = $row['Id'];
                                $user_user_image = $row['UserImage'];
                                $user_username = $row['Username'];
                                $user_firstname = $row['FirstName'];
                                $user_lastname = $row['LastName'];
                                $user_email = $row['Email'];
                                $user_role = $row['Role'];
                                
                            
                            echo "<tr>";
                            echo "<td>{$user_id}</td>";
                            echo "<td><img width='80'; height='80' src='../images/{$user_user_image}' alt='image'></td>";
                            echo "<td>{$user_username}</td>";
                            echo "<td>{$user_firstname}</td>";
                            echo "<td>{$user_lastname}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_role}</td>";
                            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                            //
                            ?>
                        </tbody>
                    </table>
            
                    
        <?php
            //Disapprove functionality for a comment in admin panel
            if(isset($_GET['disapprove'])){
                $update_comment_id = $_GET['disapprove'];
                $query = "UPDATE comments SET Status = 'disapproved'
                WHERE Id = $update_comment_id";
                
                $update_query = mysqli_query($connection, $query);
                confirm_query($update_query);
                header("Location: comments.php");
            }
        ?>
                  
        <?php
            //Approve functionality for a comment in admin panel
            if(isset($_GET['approve'])){
                 $update_comment_id = $_GET['approve'];
                $query = "UPDATE comments SET Status = 'approved'
                WHERE Id = $update_comment_id";
                
                $update_query = mysqli_query($connection, $query);
                confirm_query($update_query);
                header("Location: comments.php");
            }
        ?>
                   
        <?php
            //Delete functionality for a comment in admin panel
            if(isset($_GET['delete'])){
                $user_id_delete = $_GET['delete'];
                $query = "DELETE FROM users WHERE Id = $user_id_delete";
                
                $delete_query = mysqli_query($connection, $query);
                confirm_query($delete_query);
                header("Location: users.php");
            }
        ?>