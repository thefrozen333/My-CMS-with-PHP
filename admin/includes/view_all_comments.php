<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Disapprove</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                           <?php 
                            //Get all comments and put them in a neat table for the admin to see
                            //Delete, disaprove, approve functionality added
                                $query = "SELECT c.Email, p.Title, c.Id as CommentId, c.Author as CommentAuthor, c.Content as CommentContent,
                                c.Status as CommentStatus, c.Date as CommentDate
                                FROM comments AS c
                                INNER JOIN posts AS p ON p.Id = c.PostId";
                                $select_comments = mysqli_query($connection, $query);
    
                        while($row = mysqli_fetch_assoc($select_comments)){
                                $comment_id = $row['CommentId'];
                                //echo "<h1>$comment_id</h1>";
                                $comment_author = $row['CommentAuthor'];
                                $comment_content = $row['CommentContent'];
                                $comment_email = $row['Email'];
                                $comment_status = $row['CommentStatus'];
                                $comment_post_name = $row['Title'];
                                $comment_date = $row['CommentDate'];
                            
                            echo "<tr>";
                            echo "<td>{$comment_id}</td>";
                            echo "<td>{$comment_author}</td>";
                            echo "<td>{$comment_content}</td>";
                            echo "<td>{$comment_email}</td>";
                            echo "<td>{$comment_status}</td>";
                            echo "<td>{$comment_post_name}</td>";
                            echo "<td>{$comment_date}</td>";
                            echo "<td><a href='comments.php?approve
                            '>Approve</a></td>";
                            echo "<td><a href='comments.php?disapprove
                            '>Disapprove</a></td>";
                            echo "<td><a href='comments.php?delete
                            '>Delete</a></td>";
                            echo "</tr>";
                        }
                            ?>
                        </tbody>
                    </table>
                    
                   
        <?php
            //Delete functionality for a comment in admin panel
            if(isset($_GET['delete'])){
                $comment_id_delete = $_GET['delete'];
                $query = "DELETE FROM comments WHERE Id = $comment_id_delete";
                
                $delete_query = mysqli_query($connection, $query);
                confirm_query($delete_query);
                header("Location: comments.php");
            }
        ?>