<?php 
session_start();
ob_start();
include "library_admin/inc/db.php";
 ?>
<!DOCTYPE html>
<html lang="zxx">
    

<head>        
        
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
        
        <!-- Title -->
        <title>Library Online</title>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />
        <!-- Accordion Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/jquery.accordion.css">
        <!--uploader plugin start -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.mn-file.css" rel="stylesheet" type="text/css">
    <style>

    .previewContainer{text-align: center; margin-top:30px;}
    .previewContainer img {border: 5px solid #e87474; box-shadow: 0 0 3px -1px rgba(0, 0, 0, 0.8); max-height: 100px;}
    </style>
  <!--uploader plugin end -->
        <!-- Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        
        <!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="index.php">
                                                <img src="images/logo2.png" alt="LIBRARIA" width="130px">
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="topbar-links">
        <?php 
        if(!empty($_SESSION['user_id'])){
          $imageId=$_SESSION['user_id'];
          $imageQuery="SELECT * FROM user WHERE user_id='$imageId'";
          $passImageQuery=mysqli_query($con,$imageQuery);
          
            while ($row=mysqli_fetch_array($passImageQuery)) {
                $showImage=$row['avater'];

                if(empty($showImage)){?>
                  <div class="image image-custom">
                    <img src="library_admin/assets/img/User/avater.png" class="img-circle elevation-2 custom_height" alt="User Image" width="50px" style="border-radius: 50px;">
                          <a href="profile.php?do=veiwUser" class="dropdown-item nav-font" style="margin-left: 10px;margin-right: 10px;">Profile</a>
                          <a href="logout.php" class="dropdown-item nav-font">Logout</a>
                 
                  </div>
               <?php 
           }
           else{
            ?>
                 <div class="image image-custom">
                     <img src="library_admin/assets/img/User/<?php echo $showImage; ?>" class="img-circle elevation-2 image-custom" alt="User Image" width="30px">
                    
                          <a href="profile.php?do=veiwUser" class="dropdown-item nav-font" style="margin-left: 10px;margin-right: 10px;">Profile</a>
                          <a href="logout.php" class="dropdown-item nav-font">Logout</a>
                  
                 </div>
                 <?php
               }
           }
       }
       else{
                ?>
                   <a href="signin.php"><i class="fa fa-lock"></i>Login / Register</a>
                 <?php
               }
               ?>
                
                                              
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                              <li class="dropdown active text-right">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index.php">Home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="books-media-gird-view.php">Books &amp; Media</a>
                                          
                                        </li>
                                        <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="books-media-list-view.html">Category List</a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                            $mainCat="SELECT cat_id AS 'mcat_id', cat_name AS 'mcat_name' FROM catagory WHERE cat_status=1 AND parent_id=0";
                                            $passmainCat=mysqli_query($con,$mainCat);
                                            while ($row=mysqli_fetch_assoc($passmainCat)) {
                                              extract($row);
                                              /*For Child category*/
                                              $mainsubCat="SELECT cat_id AS 'smcat_id' , cat_name AS 'smcat_name' FROM catagory WHERE cat_status=1 AND parent_id='$mcat_id'";
                                              $passsubmainCat=mysqli_query($con,$mainsubCat);
                                              $counts=mysqli_num_rows($passsubmainCat);
                                              if($counts==0){?>
                                                  <li><a href="category.php?article=<?php echo $mcat_name; ?>"><?php echo $mcat_name; ?></a></li>
                                                 <?php
                                              }else{

                          ?>
                             <li><a href="category.php?article=<?php echo $mcat_name; ?>"><?php echo $mcat_name; ?></a></li>
                             <?php

                            while($rows=mysqli_fetch_assoc($passsubmainCat)){
                                extract($rows);
                                ?>
                              <li><a href="category.php?article=<?php echo $smcat_name; ?>">...<?php echo $smcat_name; ?></a></li>
                                <?php
                            }
                            ?>

                        <?php
                      }
                      }
                                          
                       ?>
                                        </ul>
                                    </li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Home</a>
                                        
                                    </li>
                                    <li>
                                        <a href="books-media-list-view.html">Books &amp; Media</a>
                                        
                                    </li>
                                   
                                     <li>
                                        <a href="books-media-list-view.html">Category List</a>
                                        <ul>
                                            <?php 
                                            $mainCat="SELECT cat_id AS 'mcat_id', cat_name AS 'mcat_name' FROM catagory WHERE cat_status=1 AND parent_id=0";
                                            $passmainCat=mysqli_query($con,$mainCat);
                                            while ($row=mysqli_fetch_assoc($passmainCat)) {
                                              extract($row);
                                              /*For Child category*/
                                              $mainsubCat="SELECT cat_id AS 'smcat_id' , cat_name AS 'smcat_name' FROM catagory WHERE cat_status=1 AND parent_id='$mcat_id'";
                                              $passsubmainCat=mysqli_query($con,$mainsubCat);
                                              $counts=mysqli_num_rows($passsubmainCat);
                                              if($counts==0){?>
                                                  <li><a href="category.php?article=<?php echo $mcat_name; ?>"><?php echo $mcat_name; ?></a></li>
                                                 <?php
                                              }else{

                                                  ?>
                                                     <li><a href="category.php?article=<?php echo $mcat_name; ?>"><?php echo $mcat_name; ?></a></li>
                                                     <?php

                                                    while($rows=mysqli_fetch_assoc($passsubmainCat)){
                                                        extract($rows);
                                                        ?>
                                                      <li><a href="category.php?article=<?php echo $mcat_name; ?>"><?php echo $smcat_name; ?></a></li>
                                                        <?php
                                                    }
                                                    ?>

                                                <?php
                                              }
                                              }
                                                                  
                                               ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->