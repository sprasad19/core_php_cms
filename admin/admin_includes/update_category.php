    <?php
    //Update Category
            if(isset($_POST['update_category'])){
                $category_update_title = $_POST['cat_title_update'];
                $category_update_id = $_POST['cat_update_id'];
                $query_update = "UPDATE categories SET cat_title='{$category_update_title}' WHERE cat_id='{$category_update_id}'";
                $update_query = mysqli_query($connection, $query_update);
                if(!$update_query){
                die("Update Failed" . mysqli_error($connection));
                }else{
                    header("Location:cartegories.php");
                }
            }
    ?>
 <!-- Update Category -->
                        <form action="" method="POST">
                        <?php //Edit form
                            if(isset($_GET['edit'])){
                            $cat_id_edit = $_GET['edit'];
                            $query = "SELECT * FROM categories WHERE cat_id=$cat_id_edit";
                            $select_categories_edit_id = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_categories_edit_id)) {
                                $cat_title=$row['cat_title'];
                                $cat_id = $row['cat_id'];
                            ?>
                            <div class="form-group">
                            <input type="hidden" value="<?php if(isset($cat_id)) { echo $cat_id; } ?>" name="cat_update_id" class="form-control">
                            <label for="cat_title">Edit Category</label>
                            <input type="text" value="<?php if(isset($cat_title)) { echo $cat_title; } ?>" name="cat_title_update" class="form-control">
                        </div>

                        <?php
                            }
                        }
                        ?>
        <div class="form-group">
        <button type="submit" name="update_category" class="btn btn-danger">Update Category</button>
        </div>


    </form>