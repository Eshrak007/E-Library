<?php 

include "inc/header.php";
 ?>

        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Books & Media Listing</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>Books & Media</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-media-gird">
                        <div class="container">
                            <div class="row">
                                       
        <?php 

        include "inc/searchbar.php";
         ?>
</div>
   <div class="row">
    <div class="col-md-9 col-md-push-3">
        <div class="filter-options margin-list">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="filter-result">
               <?php 
               if(isset($_POST['keywords'])){
                $key=$_POST['keywords'];
                $postData="SELECT * FROM books WHERE book_name LIKE '%$key%' OR author_name LIKE '%$key%' OR book_desc LIKE '%$key%' ORDER BY book_id DESC ";
                $postQuery=mysqli_query($con,$postData);
                $count=mysqli_num_rows($postQuery);
                 echo "Total Books: ".$count; 
            }else if($_GET['searchtags']){
                 $searchTags=$_GET['searchtags'];
            $postData="SELECT * FROM books WHERE meta_tags LIKE '%$searchTags%'";
            $postQuery=mysqli_query($con,$postData);
            $countt=mysqli_num_rows($postQuery);
            echo "Total Books: ".$countt;
            }
               
                ?> 

                    </div>
                </div>
                <div class="col-md-3 col-sm-3 pull-right">
                    <div class="filter-toggle">
                        <a href="books-media-gird-view.php" class="active"><i class="glyphicon glyphicon-th-large"></i></a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="books-gird">
            <ul>
        <?php 
        if(isset($_POST['keywords'])){
            $key=$_POST['keywords'];
        $postData="SELECT * FROM books WHERE book_name LIKE '%$key%' OR author_name LIKE '%$key%' OR book_desc LIKE '%$key%' ORDER BY book_id DESC ";
        $postQuery=mysqli_query($con,$postData);
        $count=mysqli_num_rows($postQuery);
        if($count!=0){
            while($row=mysqli_fetch_assoc($postQuery)){
                $book_id        =$row['book_id'];
                $thumbnail      =$row['thumbnail'];
                $book_name      =$row['book_name'];
                $author_name    =$row['author_name'];
                $category_id    =$row['category_id'];
                $book_quatity   =$row['book_quatity'];
                $meta_tags      =$row['meta_tags'];
                $book_desc      =$row['book_desc'];
                $book_status    =$row['book_status'];
                $book_date      =$row['book_date'];
                ?>
                <li>
                    <figure>
                          <?php 
                        if(!empty($thumbnail)){
                    ?>
                        <img src="library_admin/assets/img/Books/<?php echo $thumbnail ; ?>" alt="borolox">
                    <?php
                        }else{
                    ?>
                        <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                    <?php
                    }
                    ?>
                        <figcaption>
                            <p><strong><?php echo $book_name; ?></strong></p>
                            <p><strong>Author Name</strong></p>
                            <p><?php echo $author_name; ?></p>
                        </figcaption>
                    </figure>
                    <div class="book-list-icon yellow-icon"></div>
                    <div class="single-book-box">
                        <div class="post-detail">
                            <header class="entry-header">
                                <h3 class="entry-title"><a href="books-media-detail-v1.html"><?php echo $book_name; ?></a></h3>
                                <ul>
                                    <li><strong>Author: </strong> <?php echo $author_name; ?></li>

                                    <li><strong>Publish Date: </strong>
                                    <?php
                                    $book_join=date("j F,Y",strtotime($book_date));
                                    echo $book_join;
                                    ?>
                                    </li>
                                    <li><strong>Status: </strong>
                                    <?php
                                    if($book_quatity>5){
                                        echo "available";
                                    }else{
                                        echo "Stock Out";
                                    }
                                    ?>
                                    </li>
                                </ul>
                            </header>
                            <div class="entry-content">
                                <p><?php echo substr($book_desc,0,200)."..."; ?></p>
                            </div>
                            <footer class="entry-footer">
                                <a class="btn btn-primary" href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More</a>
                            </footer>
                        </div>
                    </div>                                                                                                
                </li>
           <?php 
       }
        }else{
            echo '<div class="alert alert-info">No Books found Based on your keywords.</div>';
        }
        }
        else if(isset($_GET['searchtags'])){
            $searchTags=$_GET['searchtags'];
            $postData="SELECT * FROM books WHERE meta_tags LIKE '%$searchTags%'";
            $postQuery=mysqli_query($con,$postData);
            $count=mysqli_num_rows($postQuery);
            if($count!=0){
                while($row=mysqli_fetch_assoc($postQuery)){
                    $book_id        =$row['book_id'];
                    $thumbnail      =$row['thumbnail'];
                    $book_name      =$row['book_name'];
                    $author_name    =$row['author_name'];
                    $category_id    =$row['category_id'];
                    $meta_tags      =$row['meta_tags'];
                    $book_desc      =$row['book_desc'];
                    $book_quatity   =$row['book_quatity'];
                    $book_status    =$row['book_status'];
                    $book_date      =$row['book_date'];
                    ?>

                    <li>
                    <figure>
                          <?php 
                        if(!empty($thumbnail)){
                    ?>
                        <img src="library_admin/assets/img/Books/<?php echo $thumbnail ; ?>" alt="borolox">
                    <?php
                        }else{
                    ?>
                        <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                    <?php
                    }
                    ?>
                        <figcaption>
                            <p><strong><?php echo $book_name; ?></strong></p>
                            <p><strong>Author Name</strong></p>
                            <p><?php echo $author_name; ?></p>
                        </figcaption>
                    </figure>
                    <div class="book-list-icon yellow-icon"></div>
                    <div class="single-book-box">
                        <div class="post-detail">
                            <header class="entry-header">
                                <h3 class="entry-title"><a href="books-media-detail-v1.html"><?php echo $book_name; ?></a></h3>
                                <ul>
                                    <li><strong>Author: </strong> <?php echo $author_name; ?></li>

                                    <li><strong>Publish Date: </strong>
                                    <?php
                                    $book_join=date("j F,Y",strtotime($book_date));
                                    echo $book_join;
                                    ?>
                                    </li>
                                    <li><strong>Status: </strong>
                                    <?php
                                    if($book_quatity>5){
                                        echo "available";
                                    }else{
                                        echo "Stock Out";
                                    }
                                    ?>
                                    </li>
                                </ul>
                            </header>
                            <div class="entry-content">
                                <p><?php echo substr($book_desc,0,200)."..."; ?></p>
                            </div>
                            <footer class="entry-footer">
                                <a class="btn btn-primary" href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More</a>
                            </footer>
                        </div>
                    </div>                                                                                                
                </li>

                    <?php
                }
            }
        }
    
           ?>       

                                            
                                          
                    </ul>
                        </div>
                        <nav class="navigation pagination text-center">
                            <h2 class="screen-reader-text">Posts navigation</h2>
                            <div class="nav-links">
                                <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                                <a class="page-numbers" href="#.">1</a>
                                <span class="page-numbers current">2</span>
                                <a class="page-numbers" href="#.">3</a>
                                <a class="page-numbers" href="#.">4</a>
                                <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </nav>
                    </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <?php 
                                    include "inc/sidebar.php";

                                     ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->

        <!-- Start: Social Network -->
        <section class="social-network section-padding">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Follow Us</h2>
                    <span class="underline center"></span>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <ul>
                    <li>
                        <a class="facebook" href="#" target="_blank">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#" target="_blank">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#" target="_blank">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="youtube" href="#" target="_blank">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End: Social Network -->

<?php 
include "inc/footer.php";

 ?>