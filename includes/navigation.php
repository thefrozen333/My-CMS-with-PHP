   
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Game Informant</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                 
                   
                 
                <?php 
                    if(isset($_SESSION['user_role'])){
                        if($_SESSION['user_role'] == 'admin'){ 
                            echo "<li> <a href='admin'>Admin</a> </li>"; 
                        }
                }?> 
                    
                   
                   <?php 
                    //Add categories to the top nav in index front page
                    $query = "SELECT * FROM category";
                    $select_all_categories = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_categories)){
                        $cat_title = $row['Name'];
                        
                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }
                        
                        
                    ?>
             <?php 
            //Include dynamically dropdown for the the user with profile, logout if he has logged in
                if(isset($_SESSION['username'])){
               echo "<li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i>  {$_SESSION['firstname']} {$_SESSION['lastname']} <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='#'><i class='fa fa-fw fa-user'></i> Profile</a>
                        </li>
                  
                             <li class='divider'></li>
                        <li>
                            <a href='includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>
                        </li>"; 
                }?> 
                        
                    </ul>
                </li>
                   
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>