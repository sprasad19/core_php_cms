<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">
            <?php
        if(isset($_POST['submit'])){
           $search = $_POST['search'];
           $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
           $search_query = mysqli_query($connection, $query);
           if(!$search_query){
            die("Search Not Found".mysqli_error($connection));
           }
           $count = mysqli_num_rows($search_query);
           if($count == 0){
            echo "<h1 class='text-center'>No Result</h1>";
           }else{

                while ($row = mysqli_fetch_assoc($search_query)) {
                    $post_title=$row['post_title'];
                    $post_id =$row['post_id'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];


         echo ("
            <h1 class='page-header'>
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <h2>
                <a>
                  $post_title
                </a>
            </h2>
            <p class='lead'>
                by <a href='index.php'>$post_author</a>
            </p>
            <p><span class='glyphicon glyphicon-time'>

            </span> Posted on $post_date
            </p>
            <hr>
            <a href='index.php?source=postlink&post_id=$post_id'>
            <img class='img-responsive' src='./images/$post_image' alt=''>
            </a>
            <hr>
            <p>$post_content</p>
            <a class='btn btn-primary' href='index.php?source=postlink&post_id=$post_id'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
            <hr>
            ");

            }
            }
            }
            ?>
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php  include "includes/sidebar.php"; ?>

    </div>
    <?php  include "includes/footer.php"; ?>