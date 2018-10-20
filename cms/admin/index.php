<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">





        <!-- Navigation -->
        


        <?php include 'includes/admin_navigation.php'; ?>





        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small> <?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                
                
<!--                WIDGETS CODE     -->
               
               
               
               
                      
                <!-- /.row -->
                
                
                
                
                
<div class="row">
   
   
   
<!--   BRING DYNAMIC DATA USING PHP AND DATABASE     -->
  
  
  <?php
    
    
    
    $query = "SELECT COUNT(post_id) AS post_count FROM posts";
    $select_post_count_query = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($select_post_count_query)) {
        $post_count = $row['post_count'];
    }
    
    
    $query = "SELECT COUNT(comment_id) AS comment_count FROM comments";
    $select_comment_count_query = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($select_comment_count_query)) {
        $comment_count = $row['comment_count'];
    }
    
    
    $query = "SELECT COUNT(user_id) AS user_count FROM users";
    $select_user_count_query = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($select_user_count_query)) {
        $user_count = $row['user_count'];
    }
    
    
    
    $query = "SELECT COUNT(cat_id) AS cat_count FROM categories";
    $select_cat_count_query = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($select_cat_count_query)) {
        $cat_count = $row['cat_count'];
    }
    
    
    ?>
   
   
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $post_count; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $comment_count; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $user_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $cat_count; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    
    
    
    
</div>
                <!-- /.row -->
               
               
               
               
               
<!--               WIDGETS CODE END       -->
               
               
               
               <div class="row">
                   
                   
<!--                   CHART SCRIPT     -->
                 
                 
                 
                 
                 
                 
<?php

                    $query = "SELECT COUNT(post_id) AS draft_count FROM posts WHERE post_status='draft'";
                    $select_draft_post_count_query = mysqli_query($connection, $query);
                    if($row = mysqli_fetch_assoc($select_draft_post_count_query)) {
                        $post_draft_count = $row['draft_count'];
                    }
                   
                   
                   
                   
                    $query = "SELECT COUNT(comment_id) AS comment_count FROM comments WHERE comment_status='unapproved'";
                    $select_ua_post_count_query = mysqli_query($connection, $query);
                    if($row = mysqli_fetch_assoc($select_ua_post_count_query)) {
                        $comment_ua_count = $row['comment_count'];
                    }
                   
                   
                   
                    $query = "SELECT COUNT(user_id) AS user_count FROM users WHERE user_role != (SELECT role_id FROM roles WHERE role_title = 'Admin')";
                    $select_sub_users_count_query = mysqli_query($connection, $query);
                    if($row = mysqli_fetch_assoc($select_sub_users_count_query)) {
                        $subs_user_count = $row['user_count'];
                    }

?>
                 
                 
                 
                 
                  
                  
                  
                  
                  
                  
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Data', 'Count'],
        
        
        // Bring Dynamic Data From Database.
        
        <?php
        
        
        $element_text = ['Active Posts','Draft Posts', 'Users','Subscibers', 'Comments','Un-Approved Comments' , 'Categories'];
        $element_counts = [$post_count, $post_draft_count, $user_count, $subs_user_count, $comment_count, $comment_ua_count, $cat_count];
        
        
        for($i = 0 ; $i < 7 ; $i++) {
            echo "['{$element_text[$i]}', {$element_counts[$i]}],";
        }
        
        
        
        
        ?>
        
        
        
        
        
//    ['Posts', 1000],
    
    ]);

    var options = {
        chart: {
            title: '',
            subtitle: '',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
                   
                   
<!--    CHART DIV      -->
                   
    <div id="columnchart_material" style="width: 'auto'; height:500px;"></div>  
                   
                   
                   
                   
                   
               </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
