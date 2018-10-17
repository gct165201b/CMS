<?php


if(isset($_POST['create_user'])) {
    
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $username = $_POST['username'];
    
    
    
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];
    
    
//    echo "<h1>$user_firstname</h1>";
    
    
    move_uploaded_file($user_image_temp, "../images/$user_image");
    
    
    $query = "INSERT INTO users (username,user_password, user_firstname, user_lastname, user_email, user_image, user_role, user_date)";
    $query .= "VALUES('{$username}','{$user_password}' ,'{$user_firstname}', '{$user_lastname}' , '{$user_email}', '{$user_image}', '{$user_role}', now())";
    
    $insert_user_query_result = mysqli_query($connection, $query);
    
    confirmQuery($insert_user_query_result);
}




?>
   
   
   
   <form action="" method="post" enctype="multipart/form-data">
<!--
       <div class="form-group">
           <label for="title">Post Title</label>
           <input type="text" class="form-control" name="title">
       </div>
-->
       
       
       
       <div class="form-group">
           <label for="title">First Name</label>
           <input type="text" class="form-control" name="user_firstname">
       </div>
       
       
       <div class="form-group">
           <label for="title">Last Name</label>
           <input type="text" class="form-control" name="user_lastname">
       </div>
       
       <div class="form-group">
           <label for="title">E-Mail</label>
           <input type="email" class="form-control" name="user_email">
       </div>
       
       
       
       <div class="form-group">
           <label for="">Username</label>
           <input type="text" class="form-control" name="username">
       </div>
       
       
       
       <div class="form-group">
           <label for="title">Profile Picture</label>
           <input type="file" class="form-control" name="user_image">
       </div>
       
       
       
       
       
       
       <div class="form-group">
           <label for="title">Role</label>
           
           
           <select name="user_role" id="" class="form-control">
               
               <?php
               
               $query = "SELECT * FROM roles";
               $select_roles = mysqli_query($connection, $query);
               confirmQuery($select_roles);
               
               
               while($row = mysqli_fetch_assoc($select_roles)) {
                   $role_id = $row['role_id'];
                   $role_title = $row['role_title'];
                   
                   echo "<option value='{$role_id}'>{$role_title}</option>";
               }
               
               ?>
               
           </select>
           
           
       </div>
       
       
       
       
       
       <div class="form-group">
           <label for="">Password</label>
           <input type="password" class="form-control" name="user_password">
       </div>
       
       
       
       
       
       
       
       <div class="form-group">
           
           <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
       </div>
       
   </form>
   
   
      
   
    