<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
    <!-- Navigation -->
<?php  include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <?php
                if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source='' ;
                    }
                    switch($source) {

                            case 'postlink';
                            include "post.php";
                            include "includes/post_comment_form.php";
                            break;

                            default:
                            include "includes/main.php";
                            include "includes/sidebar.php";

                    }
                 ?>
            <?php // include "includes/main.php"; ?>
            <!-- Blog Sidebar Widgets Column -->
            <?php //  include "includes/sidebar.php"; ?>
        </div>
<?php  include "includes/footer.php"; ?>