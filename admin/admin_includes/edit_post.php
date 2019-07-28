<?php //set values in form
 include "./functions/functions.php";
 if(isset($_GET['p_id'])){
    $p_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id={$p_id}";
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
                    $query_cat = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";


    }
}
//update post
if(isset($_POST['update_post'])){
    // $file = $_FILES['image']['name'];
    if(empty($_POST['category_id'])){
        $category_id = $post_category_id;
    }else{
    $category_id = $_POST['category_id'];
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    // $image_u = rand(11, 999999999999)."_".time()."_".$_FILES['image']['name'];
    // echo $image_u;
    $image_u = $_FILES['image']['name'];
    $tags = $_POST['tags'];
    $status = $_POST['status'];
    $content = $_POST['content'];

        if(empty($image_u)){
            $query ="SELECT * FROM posts WHERE post_id=$p_id ";
            $select_image = mysqli_query($connection,$query);
            while($row = mysqli_fetch_array($select_image)){
                  $image_u = $row['post_image'];
            }
        }
        else{
            $image_u = rand(11, 999999999999)."_".time()."_".$_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_temp, "../images/$image_u");
        }
                $query  = "UPDATE posts SET ";
                $query .= "post_category_id='{$category_id}', ";
                $query .= "post_title='{$title}', ";
                $query .= "post_author='{$author}', ";
                $query .= "post_image='{$image_u}', ";
                $query .= "post_content='{$content}', ";
                $query .= "post_date = now(), ";
                $query .= "post_tags='{$tags}', ";
                $query .= "post_status='{$status}' ";
                $query .= "WHERE post_id='{$p_id}' ";
    }

    $query_sql = mysqli_query($connection,$query);
    // confirm($query);


    if(! $query_sql){
        die("Update Failed".mysqli_error($connection));
    }
?>


<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $post_title ?>">
    </div>
    <div class="">

        <label for="category_d">Category</label> &nbsp;
        <select name="category_id" id="category_d" class="">
        <?php
         //Defalut category select
         $select_categories = mysqli_query($connection, $query_cat);
         if($row = mysqli_fetch_assoc($select_categories)) {
             $cat_title_s=$row['cat_title'];
             $cat_id_s =$row['cat_id'];
             echo ("<option disabled selected value='$cat_id_s' >$cat_title_s</option>");
         }

        ?>

            <?php

                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo ("<option value='{$cat_id}'>{$cat_title}</option>");
                    }

            ?>
        </select>

    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $post_author ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="status" class="form-control" value="<?php echo $post_status ?>">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label><br>
        <img src="../images/<?php echo $post_image?>" height="200" width="300" class="img-responsive">
        <input type="file" name="image" class="form-control" >
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="tags" class="form-control" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Content</label>
        <textarea name="content" class="form-control" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
    </div>
</form>