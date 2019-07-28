   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php">CMS Admin</a>
       </div>
       <!-- Top Menu Items -->
       <ul class="nav navbar-right top-nav">
           <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b
                       class="caret"></b></a>
               <ul class="dropdown-menu">
                   <li>
                       <a href="../index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                   </li>
                   <li>
                       <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                   </li>
                   <li>
                       <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                   </li>
                   <li>
                       <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                   </li>
                   <li class="divider"></li>
                   <li>
                       <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                   </li>
               </ul>
           </li>
       </ul>
       <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
           <ul class="nav navbar-nav side-nav">
               <li>
                   <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
               </li>
               <li>
                   <!--  <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a> -->
                   <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-edit"></i>
                       Posts <i class="fa fa-fw fa-caret-down"></i></a>
                   <ul id="post" class="collapse">
                       <li>
                           <a href="posts.php">View all Post</a>
                       </li>
                       <li>
                           <a href="posts.php?source=add_post">Add Post</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="cartegories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
               </li>
               <li class="">
                   <a href="comment.php"><i class="fa fa-fw fa-file"></i> Comments</a>
               </li>
               <li>
                   <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-user"></i>
                       Users <i class="fa fa-fw fa-caret-down"></i></a>
                   <ul id="users" class="collapse">
                       <li>
                           <a href="#">Dropdown Item</a>
                       </li>
                       <li>
                           <a href="#">Dropdown Item</a>
                       </li>
                   </ul>
               </li>
               <li class="">
                   <a href="blank-page.html"><i class="fa fa-fw fa-edit"></i> Profile</a>
               </li>
           </ul>
       </div>
       <!-- /.navbar-collapse -->
   </nav>