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

        <?php 
        if(!empty($_SESSION['user_id'])){
            ?>

<!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="booksmedia-detail-main">
                        <div class="container">
                            <div class="row">
                                <?php 
                                include "inc/searchbar.php";
                                 ?>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="booksmedia-detail-box">
                                    <?php 
                                    if(isset($_GET['book'])){
                                        $books_name=$_GET['book'];
                                        $querybook="SELECT * FROM books WHERE book_name='$books_name'";
                                        $passQuery=mysqli_query($con,$querybook);
                                        $count=mysqli_num_rows($passQuery);
                                        if($count>0){
                                            while ($row=mysqli_fetch_assoc($passQuery)) {
                                                $book_id        =$row['book_id'];
                                                $thumbnail      =$row['thumbnail'];
                                                $book_name      =$row['book_name'];
                                                $author_name    =$row['author_name'];
                                                $category_id    =$row['category_id'];
                                                $meta_tags      =$row['meta_tags'];
                                                $book_quatity   =$row['book_quatity'];
                                                $book_desc      =$row['book_desc'];
                                                $book_status    =$row['book_status'];
                                                $book_date      =$row['book_date'];
                                                ?>
                                    
                                        <div class="single-book-box">                                                
                                            <div class="post-thumbnail">
                                                <div class="book-list-icon yellow-icon"></div>
                                                <?php 
                                                    if(!empty($thumbnail)){
                                                ?>
                                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail ; ?>" alt="borolox" style="width: 250px;">
                                                <?php
                                                    }else{
                                                ?>
                                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga" style="width: 250px;">
                                                <?php
                                                }
                                                ?>                                                   
                                            </div>
                                            <div class="post-detail">
                                            
                                                <header class="entry-header">
                                                    <h2 class="entry-title"><?php echo $book_name; ?></h2>
                                                    <ul>
                                                        <li><strong>Author:</strong><?php echo $author_name; ?></li>
                                                        <li>
                                                            <div class="rating">
                                                                <strong>Rating:</strong> 
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                            </div>
                                                        </li>
                                                        
                                                        <li><strong>Publish date:</strong> 
                                                            <?php
                                                                $book_join=date("j F,Y",strtotime($book_date));
                                                                echo $book_join;
                                                                ?>
                                                        </li>
                                                    </ul>
                                                </header>
                                               
                                            </div>
                                        </div>
                                        <p><?php echo $book_desc; ?> </p>

                                        <div class="col-md-12 text-center" style="margin-top: 30px;margin-bottom: 80px;">
                                            <?php 
                                            if($book_quatity>5){?>
                                                <a href="booking-request.php?booking=<?php echo $book_id; ?>" class="btn btn-success">Book Now</a>
                                                <?php
                                            }else{
                                                echo '<div class="alert alert-info text-center">Stock Out</div>';
                                            }
                                             ?>
                                           
                                            
                                        </div>
                                        
                                       
                                                <?php
                                         }
                                        }
                                    }
                                     ?>
                                    
                                   <div class="booksmedia-fullwidth booksmedia-popular-list">
                                            <h2 class="section-title text-center">Popular Items</h2>
                                            <span class="underline center"></span>
                                            <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <ul class="popular-items-detail-v1">
                                                <li>
                                                    <div class="book-list-icon blue-icon"></div>
                                                    <figure>
                                                        <img src="images/books-media/layout-3/books-media-layout3-01.jpg" alt="Book">
                                                        <figcaption>
                                                            <header>
                                                                <h4><a href="#.">The Great Gatsby</a></h4>
                                                                <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                                <p><strong>ISBN:</strong>  9781581573268</p>
                                                            </header>
                                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </figcaption>
                                                    </figure>                                                
                                                </li>
                                                <li>
                                                    <div class="book-list-icon yellow-icon"></div>
                                                    <figure>
                                                        <img src="images/books-media/layout-3/books-media-layout3-02.jpg" alt="Book">
                                                        <figcaption>
                                                            <header>
                                                                <h4><a href="#.">The Great Gatsby</a></h4>
                                                                <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                                <p><strong>ISBN:</strong>  9781581573268</p>
                                                            </header>
                                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </figcaption>
                                                    </figure>                                                
                                                </li>
                                                <li>
                                                    <div class="book-list-icon green-icon"></div>
                                                    <figure>
                                                        <img src="images/books-media/layout-3/books-media-layout3-03.jpg" alt="Book">
                                                        <figcaption>
                                                            <header>
                                                                <h4><a href="#.">The Great Gatsby</a></h4>
                                                                <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                                <p><strong>ISBN:</strong>  9781581573268</p>
                                                            </header>
                                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </figcaption>
                                                    </figure>                                                
                                                </li>
                                                <li>
                                                    <div class="book-list-icon blue-icon"></div>
                                                    <figure>
                                                        <img src="images/books-media/layout-3/books-media-layout3-01.jpg" alt="Book">
                                                        <figcaption>
                                                            <header>
                                                                <h4><a href="#.">The Great Gatsby</a></h4>
                                                                <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                                <p><strong>ISBN:</strong>  9781581573268</p>
                                                            </header>
                                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </figcaption>
                                                    </figure>                                                
                                                </li>
                                                <li>
                                                    <div class="book-list-icon yellow-icon"></div>
                                                    <figure>
                                                        <img src="images/books-media/layout-3/books-media-layout3-02.jpg" alt="Book">
                                                        <figcaption>
                                                            <header>
                                                                <h4><a href="#.">The Great Gatsby</a></h4>
                                                                <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                                <p><strong>ISBN:</strong>  9781581573268</p>
                                                            </header>
                                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </figcaption>
                                                    </figure>                                                
                                                </li>
                                                <li>
                                                    <div class="book-list-icon green-icon"></div>
                                                    <figure>
                                                        <img src="images/books-media/layout-3/books-media-layout3-03.jpg" alt="Book">
                                                        <figcaption>
                                                            <header>
                                                                <h4><a href="#.">The Great Gatsby</a></h4>
                                                                <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                                <p><strong>ISBN:</strong>  9781581573268</p>
                                                            </header>
                                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </figcaption>
                                                    </figure>                                                
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

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
        }else{
            echo '<div class="alert alert-info text-center">you need to log in first</div>';
        }

         ?>

        


        

       <?php 
       include "inc/footer.php";
        ?>