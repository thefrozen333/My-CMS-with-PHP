<?php 
  include "db.php";
  include "../admin/includes/utilities/functions.php";
  session_start();
?>

<?php 
//Get username and password from the login form
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //escape data (protection from SQL injection)
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT * FROM users ";
        $query .= "WHERE Username = '{$username}'";
        
        $select_user_query = mysqli_query($connection, $query);
        
        confirm_query($select_user_query);
        
        while($row = mysqli_fetch_array($select_user_query)){
            $db_id = $row['Id'];
            $db_username = $row['Username'];
            $db_password = $row['Password'];
            $db_firstname = $row['FirstName'];
            $db_lastname = $row['LastName'];
            $db_role = $row['Role'];
        }
        
        if($username == $db_username && $password == $db_password){
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['user_role'] = $db_role;
            
            if($_SESSION['user_role'] == 'admin')
                header("Location: ../admin/index.php");
            else
                header("Location: ../index.php");
        }
        
        else {
            header("Location: ../index.php");
        }
    }
?>