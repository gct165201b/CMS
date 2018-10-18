<?php include "db.php";



    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
        
        
        // CHECK FOR VALUES IN DATABASE
        
        $query = "SELECT * FROM users WHERE username='$username' AND user_password='$user_password'";
        $select_user_records_result = mysqli_query($connection, $query);
        
        if(!$select_user_records_result) {
            die("QUERY FAILED ".mysqli_error($connection));
        } else if(mysqli_num_rows($select_user_records_result) <= 0) {
            header("Location: ../index.php?user=notfound");
            exit();
        } else {
            if($row = mysqli_fetch_assoc($select_user_records_result)) {
                $db_user_id = $row['user_id'];
                $db_username = $row['username'];
                $db_user_password = $row['user_password'];
                $db_user_firstname = $row['user_firstname'];
                $db_user_lastname = $row['user_lastname'];
                $db_user_email = $row['user_email'];
                $db_user_image = $row['user_image'];
                $db_user_role = $row['user_role'];
                $db_user_date = $row['user_date'];
            }
        }
        
        
        
    }
    