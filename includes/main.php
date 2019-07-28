<div class="col-md-8">
    <?php
    $query = "SELECT * FROM  posts ORDER BY post_date DESC";
    $select_all_post= mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_post)) {
                        $post_id = $row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content= substr($row['post_content'], 0, 100);
                     ?>
    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>
    <h2> <?php echo $post_title; ?> </h2>
    <small class="text-warning">
        by <a href='index.php?source=postlink&post_id=<?php echo $post_id ?>'><?php echo $post_author; ?></a>
    </small>
    <p><span class='glyphicon glyphicon-time'>
        </span> Posted on <?php echo $post_date; ?>
    </p>
    <hr>
    <a href='index.php?source=postlink&post_id=<?php echo $post_id ?>'>
        <img class='img-responsive' src='images/<?php echo $post_image; ?>' alt=''>
    </a>
    <hr>
    <p><?php echo $post_content; ?></p>
    <a class='btn btn-primary' href='index.php?source=postlink&post_id=<?php echo $post_id ?>'>Read More<span
            class='glyphicon glyphicon-chevron-right'></span></a>
    <hr>

    <?php        } ?>




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