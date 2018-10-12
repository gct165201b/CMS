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
                        <small>Author</small>
                    </h1>







                    <div class="col-xs-6">



                      <?php insert_categories(); ?>
                      


                        <form action="" method="post">

                            <div class="form-group">
                                <label for="">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>

                        </form>

                       
                       <?php // UPDATE AND INCLUDE SECTION
                        
                        if(isset($_GET['edit'])) {
                            $the_cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        
                        ?>
                        


                    </div>



                    <div class="col-xs-6">










                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>


                            <tbody>



                                <?php findAllCategories(); ?>



                                <?php deleteCategories(); ?>




                            </tbody>


                        </table>



                    </div>






                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->




    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
