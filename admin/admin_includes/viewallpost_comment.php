<?php
    if(isset($_GET['unapprove'])){
        $comment_unapprove_id = $_GET['unapprove'];
        $query_unapprove = "UPDATE comments set comment_status='unapprove' WHERE comment_id=$comment_unapprove_id";
        $comment_unapprove_query = mysqli_query($connection, $query_unapprove );
        if(!$comment_unapprove_query){
            echo ("Error".mysqli_error($connection));
        }else{
               header("Location:comment.php");
        }
    } //comment  Unapprove End
    if(isset($_GET['approve'])){
        $comment_approve_id = $_GET['approve'];
        $query_approve = "UPDATE comments set comment_status='approve' WHERE comment_id=$comment_approve_id";
        $comment_approve_query = mysqli_query($connection, $query_approve );
        if(!$comment_approve_query){
            echo ("Error".mysqli_error($connection));
        }else{
                    header("Location:comment.php");
        }
    } //comment  Approve End



    if(isset($_GET['delete'])){
        $comment_id_delete = $_GET['delete'];

        $query_delete = "DELETE FROM comments WHERE comment_id={$comment_id_delete}";
        $delete_query = mysqli_query($connection, $query_delete);
        if(!$delete_query){
            echo ("Error".mysqli_error($connection));
        }else{
            if(isset($_GET['update_cmnt'])){
                $post_id=$_GET['update_cmnt'];
                $update_cmt_count = "UPDATE posts SET post_comment_count = 	post_comment_count-1 WHERE post_id = $post_id";
                $update_cmt_count_result = mysqli_query($connection, $update_cmt_count);
             }
            header("Location:comment.php");
        }
    }
 ?>
 <table class="table table-bordered  table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In Response To</th>
                <th>Date</th>
                <th>Apporve</th>
                <th>Unapprove</th>
                <th>Action</th>
            </tr>
            <tbody>
            <?php

                $query = "SELECT * FROM comments ORDER BY comment_date DESC";
                $select_comment = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_comment)){
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = substr($row['comment_content'], 0, 80);
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                    // $post_comment_count = $row['post_comment_count'];
                    // $post_status = $row['post_status'];
                    // $query_cat = "SELECT * FROM categories WHERE cat_id ={$post_category_id}";
                    // $select_categories = mysqli_query($connection, $query_cat);
                    // if($row = mysqli_fetch_assoc($select_categories)) {
                    //     $cat_title_d=$row['cat_title'];
                    // }
                      $qry_post_cmt_id= "SELECT * FROM posts WHERE post_id = $comment_post_id";
                      $select_post_id_qry = mysqli_query($connection, $qry_post_cmt_id);

                      while($row =  mysqli_fetch_assoc($select_post_id_qry)){
                         $post_title = $row['post_title'];
                       }

              echo ("
                        <tr>
                            <td>$comment_id</td>
                            <td>$comment_author</td>
                            <td>$comment_content</td>
                            <td>$comment_email</td>
                            <td>$comment_status</td>
                            <td>
                               <a href='../index.php?source=postlink&post_id=$comment_post_id'>$post_title</a>
                            </td>
                            <td>$comment_date</td>
                            <td><a href='comment.php?approve=$comment_id'>Approve</a></td>
                            <td><a href='comment.php?unapprove=$comment_id'>Unapprove</a></td>
                            <td colspan='2'>
                                 <a href='comment.php?delete={$comment_id}&update_cmnt={$comment_post_id}'>Delete</a>
                            </td>
                        </tr>
                    ");

               }
        ?>
            </tbody>
        </thead>
   </table>






