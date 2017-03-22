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
                                <th>Switch Role</th>
                                <th>Edit</th>
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
                            echo "<td><a href='users.php?switch_role={$user_id}&amp;user_role={$user_role}'>Switch Role</a></td>";
                            echo "<td><a href='users.php?source=edit_user&amp;edit_user={$user_id}'>Edit</a></td>";
                            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                            //
                            ?>
                        </tbody>
                    </table>
            
                    
        <?php
            //Switch user role
            if(isset($_GET['switch_role'])){
                $update_user_id = $_GET['switch_role'];
                $update_user_current_role = $_GET['user_role'];
                if($update_user_current_role == 'admin')
                     $query = "UPDATE users SET Role = 'subscriber'
                               WHERE Id = $update_user_id";
                
                else
                    $query = "UPDATE users SET Role = 'admin'
                               WHERE Id = $update_user_id";
               
                
                $update_query = mysqli_query($connection, $query);
                confirm_query($update_query);
                header("Location: users.php");
            }
        ?>
                  
                   
        <?php
            //Delete functionality for a user in admin panel
            //TODO implement logical delete (add colum in db IsDeleted/IsDisabled)
            //Here you set that column to true and populate table above with just IsDeleted == false
            if(isset($_GET['delete'])){
                $user_id_delete = $_GET['delete'];
                $query = "DELETE FROM users WHERE Id = $user_id_delete";
                
                $delete_query = mysqli_query($connection, $query);
                confirm_query($delete_query);
                header("Location: users.php");
            }
        ?>