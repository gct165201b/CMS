
<?php

if(isset($_GET['u_id'])) {
    $user_id = $_GET['u_id'];
    $query = "SELECT * FROM users WHERE user_id = {$user_id}";
    $select_user_query_result = mysqli_query($connection, $query);
    
    if($row = mysqli_fetch_assoc($select_user_query_result)) {
        $username = $row['username'];
        $user_password = $row['user_password'];
        
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role_id = $row['user_role'];
        
    }
}




if(isset($_POST['update_post'])) {
    // UPDATE QUERY OR OPERATIONS
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
           <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
       </div>
       
       
       <div class="form-group">
           <label for="title">Last Name</label>
           <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
       </div>
       
       <div class="form-group">
           <label for="title">E-Mail</label>
           <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
       </div>
       
       
       
       <div class="form-group">
           <label for="">Username</label>
           <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
       </div>
       
       
       
<!--       DISPLAY USER IMAGE-->
       
       
       
       <div class="form-group">
           <label for="title">Profile Picture</label>
           <img src="../images/<?php echo $user_image; ?>" width="100" alt="">
           <input type="file" class="form-control" name="user_image">
       </div>
       
       
       
       
       
       
       <div class="form-group">
          
          
              
           <label for="title">New Role</label>
           
           
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
           
           <input type="submit" class="btn btn-primary" name="create_user" value="Update User">
       </div>
       
   </form>