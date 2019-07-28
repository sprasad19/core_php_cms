<?php

function insert_categories(){
      // Add Categories
      global $connection;
      if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title=="" || empty($cat_title)) {
            echo ("
            <div class='alert alert-danger  alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
               <h5> Please enter a Value. </h5>
            </div>");
        }else{
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUES ('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query){
                echo ("
                <div class='alert alert-info  alert-dismissible fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                   <h5> Already Exist </h5>
                </div>");
                // header("Location:cartegories.php");
            }
        }

    }
}
function  findallCategories(){
    // all category
        global $connection;
        $query = "SELECT * FROM categories";
        $select_categories= mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_title=$row['cat_title'];
                $cat_id=$row['cat_id'];
                echo ("<tr>
                            <td>
                                {$cat_id}
                            </td>
                            <td>
                                {$cat_title}
                            </td>
                            <td>
                                <a href='cartegories.php?delete={$cat_id}'>Delete</a>
                            </td>
                            <td>
                                <a href='cartegories.php?edit={$cat_id}'>Edit</a>
                            </td>

                        </tr>");
       }

    }
function deleteCategory(){
    //delete category
        global $connection;

        if(isset($_GET['delete'])){
            $cat_id_delete = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id={$cat_id_delete}";
            $delete_query = mysqli_query($connection, $query);

            if($delete_query){
         //    header("Location:cartegories.php");
              echo ("
                     <div class='alert alert-success  alert-dismissible fade in'>
                     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <h5>Successfully Deleted </h5>
                     </div>"
                 );
                 // header("Location:cartegories.php");
              }else{
                 echo ("
                 <div class='alert alert-warning  alert-dismissible fade in'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <h5>Error </h5>
                 </div>");
              }
         }
    }


?>