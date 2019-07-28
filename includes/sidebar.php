   <div class="col-md-4">
                <?php

                    // if(isset($_POST['submit'])){

                    //    $search = $_POST['search'];
                    //    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    //    $search_query = mysqli_query($connection, $query);
                    //    if(!$search_query){
                    //     die("Search Not Found".mysqli_error($connection));
                    //    }
                    //    $count = mysqli_num_rows($search_query);
                    //    if($count == 0){
                    //     echo "<h1>No Result</h1>";
                    //    }else{
                    //     echo "Some Result";
                    //    }

                    // }
                ?>
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button name ="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </form>  <!--Form Search-->
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                 <?php
                        $query = "SELECT * FROM categories LIMIT 5";
                        $select_categories_sidebar= mysqli_query($connection, $query);
                 ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                              <?php
                                while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                $cat_title=$row['cat_title'];
                                echo "<li><a href='#'>{$cat_title} </a></li>";
                              }?>

                            </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- Side Widget Well -->
                <?php include "widget.php";?>
            </div>