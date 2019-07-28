<?php include "admin_includes/header.php"; ?>

<div id="wrapper" >
<!-- Navigation -->
<?php include "admin_includes/navigation.php"; ?>

<div id="page-wrapper" class="pagesize">

<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Welcome
<small>Admin</small>
</h1>
<div class="col-md-6 ">
<?php include "functions/functions.php";
insert_categories();  ?>
<form action="" method="POST">
<div class="form-group">
<label for="cat_title">Add Categories</label>
<input type="text" name="cat_title"  class="form-control" >
</div>
<div class="form-group ">
<div class="flaot-right">
<button type="submit" name="submit" class="btn btn-primary ">Add Category</button>
</div>
</div>
</form>
<?php
if(isset($_GET['edit'])){
$cat_id = $_GET['edit'];
include "admin_includes\update_category.php";

}
?>
</div> <!-- category form -->

<div class="col-md-6">
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Category Table</th>
<th colspan="2" class="text-center">Action</th>

</tr>
</thead>
<tbody>
<?php findallCategories();  ?>
<?php deleteCategory(); ?>
</tbody>
</table>
</div>
</div>
<!-- /.row -->
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include "admin_includes/footer.php"; ?>
