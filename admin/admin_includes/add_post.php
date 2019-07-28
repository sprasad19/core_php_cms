<?php
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Can not create post" . mysqli_error($connection));
    }

}
if (isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_author = $_POST['author'];

    $post_image = rand(11, 999999999999) . "_" . time() . "_" . $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];


    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 0;

    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
    $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}')";

    $create_post = mysqli_query($connection, $query);
    confirm($create_post);
}


?>




<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <div class="">

            <label for="post_category_id">Category</label> &nbsp;
            <select name="post_category_id" id="" class="">
                <?php
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_title=$row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo ("<option value='{$cat_id}'>{$cat_title}</option>");
                    }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="author">Post Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" name="post_status" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Post Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" name="post_tags" class="form-control">
        </div>
        <div class="form-group">
            <label for="post_status">Post Content</label>
            <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary " name="create_post" value="Publish Post">Create Post</button>
        </div>
</form>