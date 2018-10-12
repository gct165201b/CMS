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
            <th>Un-Approve</th>
            <th>Delete</th>
            
        </tr>
    </thead>


    <tbody>



        <?php 



        $query = "SELECT * FROM comments";

        $select_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content= $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];



            echo "<tr>";
            
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            
            
            
//            $query = "SELECT * FROM categories WHERE cat_id = {$post_cat}";
//            $select_category = mysqli_query($connection, $query);
//            if($row = mysqli_fetch_assoc($select_category)) {
//                $cat_id = $row['cat_id'];
//                $cat_title = $row['cat_title'];
//                
//                echo "<td>{$cat_title}</td>";
//            }
            
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            echo "<td>{$comment_date}</td>";
            
            
            echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}'>Approve</a></td>";
            echo "<td><a href='posts.php?delete={$comment_id}' class='btn btn-danger'>Unapprove</a></td>";
            
            echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$comment_id}' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";

        }


        ?>









    </tbody>


</table>





<?php


if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    
    $delete_post_query_result = mysqli_query($connection, $query);
    
    header("Location: posts.php");
    
}

// CONTINUE FROM EDIT POSTS TUTORIAL


?>
