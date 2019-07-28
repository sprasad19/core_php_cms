<?php // include "includes/header.php"; ?>
<!-- Navigation -->
<?php  //include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <?php
            if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];

                $query = "SELECT * FROM posts WHERE post_id={$post_id}";
                $select_post_by_id = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_post_by_id)){
                                $post_id = $row['post_id'];
                                $post_category_id = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_image = $row['post_image'];
                                $post_tags = $row['post_tags'];
                                $post_status = $row['post_status'];
                                $post_content = $row['post_content'];
                                $post_date = $row['post_date'];
                                $query_cat = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        ?>
        <h1 class="page-header">
            <?php echo $post_title; ?>
                <small>
                    by <?php echo $post_author; ?>
                </small>
        </h1>
                     <h2> <?php //echo $post_title; ?> </h2>
                <!-- <small class="text-warning">
                </small> -->
                <p><span class='glyphicon glyphicon-time'>
                    </span> Posted on <?php echo $post_date; ?>
                </p>
                <a href='#'>
                    <img class='img-responsive' src='images/<?php echo $post_image; ?>'  width='100%' alt=''>
                </a>
            <hr>
                <p><?php echo $post_content; ?></p>


        <?php

                 }
            }
        ?>
        <br>

    </div>
</div>
<?php // include "includes/footer.php"; ?>