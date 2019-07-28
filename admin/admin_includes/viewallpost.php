<?php
    if(isset($_GET['delete'])){
        $post_id_delete = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id={$post_id_delete}";
        $delete_query = mysqli_query($connection, $query);
        if(!$delete_query){
            echo ("Error".mysqli_error($connection));
        }else{
            echo ("<div class='alert alert-success alert-dismissible'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        Successfully Deleted a post!!
                  </div>");
        }  // header("Location:posts.php");
    }
 ?>
 <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comment</th>
                <th>Date</th>
                <th colspan="2">Action</th>
            </tr>
            <tbody>
            <?php
                $query = "SELECT * FROM posts ORDER BY post_date DESC";
                $select_post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_post)){
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];
                    $query_cat = "SELECT * FROM categories WHERE cat_id ={$post_category_id}";
                    $select_categories = mysqli_query($connection, $query_cat);
                    if($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_title_d=$row['cat_title'];
                    }
                echo ("
                        <tr>
                            <td>$post_id</td>
                            <td>$post_author</td>
                            <td>
                            <a href='../index.php?source=postlink&post_id=$post_id'>$post_title</a>
                            </td>
                            <td>$cat_title_d</td>
                            <td>$post_status</td>
                            <td>
                            <a href='../index.php?source=postlink&post_id=$post_id'>
                                <img  class='img-responsive' src='../images/{$post_image}' height='120px' width='100px' ></td>
                            </a>
                            <td>$post_tags</td>
                            <td>$post_comment_count</td>
                            <td>$post_date </td>
                            <td colspan='2'><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a>
                                  | <a href='posts.php?delete={$post_id}'>Delete</a></td>
                        </tr>
                    ");
                }
            ?>
            </tbody>
        </thead>
   </table>






