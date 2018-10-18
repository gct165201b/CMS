
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






    // UPDATE QUERY OR OPERATIONS
    if(isset($_POST['update_user'])) {
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $username = $_POST['username'];
        
        
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        
        $user_role_id = $_POST['user_role'];
        $user_password = $_POST['user_password'];
        
        
        
        
        // UPLOAD FILE
        
        move_uploaded_file($user_image_temp, "../images/$user_image");
        
        // IF USER DOES NOT SELECT THE NEW IMAGE THAN THE OLD IMAGE FROM DATABASE WILL BE USED.
        if(empty($user_image)) {
            $query = "SELECT user_image FROM users WHERE user_id = $user_id";
            
            $select_user_image = mysqli_query($connection, $query);
            
            if($row = mysqli_fetch_assoc($select_user_image)) {
                $user_image = $row['user_image'];
            }
        }
        
        
        
        
        // CREATE QUERY TO UPDATE RECORD IN THE DATABASE.
        
        $query = "UPDATE users SET ";
        $query .= "username='$username', ";
        $query .= "user_password='$user_password', ";
        $query .= "user_firstname='$user_firstname', ";
        $query .= "user_lastname='$user_lastname', ";
        $query .= "user_email='$user_email', ";
        $query .= "user_image='$user_image', ";
        $query .= "user_role=$user_role_id, ";
        $query .= "user_date=now() ";
        $query .= "WHERE user_id = $user_id";
        
        
        // UPDATE QUERY 
        
        $update_user_query_result = mysqli_query($connection, $query);
        
        confirmQuery($update_user_query_result);
        
        
//        confirmQuery($update_post_query_result);
        
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
           <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
       </div>
       
       
       
       
       
       
       
       <div class="form-group">
           
           <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
       </div>
       
   </form>
   
  
 <?php
    
}
    
    ?>
