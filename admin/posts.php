 <?php include "admin_includes/header.php"; ?>
 <div id="wrapper">
     <!-- Navigation -->
     <?php include "admin_includes/navigation.php"; ?>
     <div id="page-wrapper">
         <div class="container-fluid">
             <!-- Page Heading -->
             <div class="row">
                 <div class="col-lg-12">
                     <h1 class="page-header">
                         Welcome
                         <small>Admin</small>
                     </h1>
                         <?php
                                    if(isset($_GET['source'])){
                                        $source = $_GET['source'];
                                    }else{
                                        $source='' ;
                                    }
                                    switch($source) {

                                            case 'add_post';
                                            include "admin_includes/add_post.php";
                                            break;

                                            case 'edit_post';
                                            include "admin_includes/edit_post.php";
                                            break;

                                            default:
                                            include "admin_includes/viewallpost.php";
                                            break;
                                    }
                         ?>
                 </div> <!-- //col-lg-12 -->
             </div> <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /#page-wrapper -->
 </div>
 <!-- /#wrapper -->
 <?php include "admin_includes/footer.php"; ?>