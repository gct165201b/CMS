<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Delete</th>
            
        </tr>
    </thead>


    <tbody>



        <?php 

        
        
        // VIEW COMMENTS


        $query = "SELECT * FROM users ORDER BY user_id DESC";

        $select_users = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname= $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $user_date = $row['user_date'];



            echo "<tr>";
            
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            
            
            $query = "SELECT * FROM roles WHERE role_id = {$user_role}";
            $select_roles = mysqli_query($connection, $query);
            if($row = mysqli_fetch_assoc($select_roles)) {
//                $cat_id = $row['cat_id'];
                $role_title = $row['role_title'];
                
                echo "<td>{$role_title}</td>";
            }
            
//            echo "<td>{$user_role}</td>";
            echo "<td>{$user_date}</td>";
            
            
//            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
//            echo "<td><a href='comments.php?unapprove={$comment_id}' class='btn btn-danger'>Unapprove</a></td>";
//            
//            echo "<td><a href='comments.php?source=edit_post&p_id={$comment_id}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$user_id}' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";

        }


        ?>









    </tbody>


</table>





<?php

// DELETE COMMENTS

if(isset($_GET['delete'])) {
    $the_user_id = $_GET['delete'];
    
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    
    $delete_user_query_result = mysqli_query($connection, $query);
    
    header("Location: users.php");
    
}

?>



<?php


// APPROVE COMMENTS



//if(isset($_GET['approve'])) {
//    $the_comment_id = $_GET['approve'];
//    $query = "UPDATE comments SET ";
//    $query .= "comment_status='approved' ";
//    $query .= "WHERE comment_id={$the_comment_id}";
//    
//    
//    $approve_comment_query_result = mysqli_query($connection, $query);
//    
//    
//    header("Location: comments.php");
//}


?>



<?php


// APPROVE COMMENTS



//if(isset($_GET['unapprove'])) {
//    $the_comment_id = $_GET['unapprove'];
//    $query = "UPDATE comments SET ";
//    $query .= "comment_status='unapproved' ";
//    $query .= "WHERE comment_id={$the_comment_id}";
//    
//    
//    $approve_comment_query_result = mysqli_query($connection, $query);
//    
//    
//    header("Location: comments.php");
//}


?>




