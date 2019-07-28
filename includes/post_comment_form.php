
<?php
    if(isset($_POST['create_comment'])){
        $post_id = $_GET['post_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        $post_comment_query = "INSERT INTO comments ( comment_post_id, comment_author, comment_email, comment_content, comment_status)";
        $post_comment_query .= "VALUES ( {$post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved' )";
        $post_comment_query_result = mysqli_query($connection, $post_comment_query);
        if(!$post_comment_query_result){
                die("Query failed".mysqli_error($connection));
        }
        else{
            $update_cmt_count = "UPDATE posts SET post_comment_count = 	post_comment_count	+1 WHERE post_id = $post_id";
            $update_cmt_count_result = mysqli_query($connection, $update_cmt_count);


        }
    }


?>
<div class="well">

       <h4 class="text-center">Leave a Comment</h4>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="comment_author">User Name</label>
                    <input type="text" name="comment_author" class="form-control">
                </div>
                <div class="form-group">
                <label for="comment_email">User Email</label>
                    <input type="email" name="comment_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="comment_content">Comment</label>
                    <textarea class="form-control" name="comment_content" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="create_comment" type="submit">Submit</button>
                </div>
            </form>
  </div>
   <?php
        $select_comment = "SELECT * FROM comments WHERE comment_post_id={$post_id} AND comment_status = 'approve' ORDER BY comment_date DESC";

        $select_comment_qry = mysqli_query($connection, $select_comment);
            if(!$select_comment_qry){
                die("Can not get comments".mysqli_error($connection));
            }else{
                while($row = mysqli_fetch_array($select_comment_qry)){
                    $comment_date = $row['comment_date'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
      ?>


                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="https://a.fsdn.com/sd/topics/science_64.png" alt="" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php  echo $comment_date ?> </small>
                            </h4>
                            <p> <?php echo $comment_content ?></p>
                        </div>

                    </div>



  <?php              }
            }

   ?>