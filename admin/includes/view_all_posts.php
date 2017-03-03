<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                           <?php 
                                $query = "SELECT *, p.Id as PostId FROM posts AS p
                                INNER JOIN category AS c ON c.Id = p.CategoryId";
                                $select_posts = mysqli_query($connection, $query);
    
                        while($row = mysqli_fetch_assoc($select_posts)){
                                $post_id = $row['PostId'];
                                $post_author = $row['Author'];
                                $post_title = $row['Title'];
                                $post_category_name = $row['Name'];
                                $post_status = $row['Status'];
                                $post_image = $row['Image'];
                                $post_tags = $row['Tags'];
                                $post_comment_count = $row['CommentCount'];
                                $post_date = $row['Date'];
                            
                            echo "<tr>";
                            echo "<td>{$post_id}</td>";
                            echo "<td>{$post_author}</td>";
                            echo "<td>{$post_title}</td>";
                            echo "<td>{$post_category_name}</td>";
                            echo "<td>{$post_status}</td>";
                            echo "<td><img width='100' src='../images/{$post_image}' alt='image'></td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$post_comment_count}</td>";
                            echo "<td>{$post_date}</td>";
                            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                            ?>
                        </tbody>
                    </table>
                    
                   
        <?php
            //Delete functionality for a post in admin panel
            if(isset($_GET['delete'])){
                $post_id_delete = $_GET['delete'];
                $query = "DELETE FROM posts WHERE Id = $post_id_delete";
                
                $delete_query = mysqli_query($connection, $query);
                confirm_query($delete_query);
                header("Location: posts.php");
            }
        ?>