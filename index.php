<?php 
    include "inc/header.php";
 ?>
        
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="images/library-banner1.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <h2>Discover Your Goal</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="books-media-gird-view.php" class="btn btn-primary">Visit Book Section</a>
                           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="images/library3.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Signin for More Update</h3>
                            <h2>Join With Us.</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="signin.php" class="btn btn-primary">Signin Now</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
        </div>
        <!-- End: Slider Section -->
      <?php 

      include "inc/searchbar.php";
       ?>
        
        <!-- Start: Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Welcome to the Library.</h2>
                                <span class="underline left"></span>
                                <p class="lead">The standard chunk of Lorem Ipsum used since</p>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humor, or non-characteristic words etc.</p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facts-counter">
                            <ul>
                                <li class="bg-light-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="ebook"></i>
                                        </div>
                                        <span>eBooks<strong class="fact-counter">45780</strong></span>
                                    </div>
                                </li>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="eaudio"></i>
                                        </div>
                                        <span>eAudio<strong class="fact-counter">32450</strong></span>
                                    </div>
                                </li>
                                <li class="bg-red">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Magazine<strong class="fact-counter">14450</strong></span>
                                    </div>
                                </li>
                                <li class="bg-blue">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="videos"></i>
                                        </div>
                                        <span>Videos<strong class="fact-counter">32450</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->
        
        <!-- Start: Category Filter -->
        <section class="category-filter section-padding">
            <div class="container">
                <div class="center-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h2 class="section-title">Check Out The New Releases</h2>
                            <span class="underline center"></span>
                            <p class="lead">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                        </div>
                    </div>
                </div>
                <div class="filter-buttons">
                    <div class="filter btn" data-filter="all">All Releases</div>
                    <div class="filter btn" data-filter=".adults">Story</div>
                    <div class="filter btn" data-filter=".kids-teens">Fiction</div>
                    <div class="filter btn" data-filter=".video">Magazine</div>
                    <div class="filter btn" data-filter=".audio">Science Fiction</div>
                    <div class="filter btn" data-filter=".books">Novel</div>
                    <div class="filter btn" data-filter=".magazines">Poem</div>
                </div>
            </div>
            <div id="category-filter">
                <ul class="category-list">
                     <?php 
                        $bookShow="SELECT * FROM catagory WHERE cat_name='Story'";
                        $passbookQuery=mysqli_query($con,$bookShow);
                        while($row=mysqli_fetch_assoc($passbookQuery)){
                            $cat_id=$row['cat_id'];
                        }
                        $fromBook="SELECT * FROM books WHERE category_id='$cat_id' AND book_status=1";
                        $passBook=mysqli_query($con,$fromBook);
                        while($row=mysqli_fetch_assoc($passBook)){
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
                             <li class="category-item adults">
                        <figure>
                             <?php 
                                    if(!empty($thumbnail)){
                                ?>
                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }
                                ?>  
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4><?php echo $book_name; ?></h4>
                                    <span class="author"><strong>Author:</strong><?php echo $author_name; ?></span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p><?php echo substr($book_desc,0,200)."..."; ?></p>

                                    <?php 
                                    if(!empty($_SESSION['user_id'])){?>
                                         <a href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        <?php

                                    }else{?>
                                         <a href="signin.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                                   <?php }
                                     ?>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                            <?php
                        }
                         ?>
                   
                   <?php 

                     $bookShow="SELECT * FROM catagory WHERE cat_name='Fiction'";
                        $passbookQuery=mysqli_query($con,$bookShow);
                        while($row=mysqli_fetch_assoc($passbookQuery)){
                            $cat_id=$row['cat_id'];
                        }
                        $fromBook="SELECT * FROM books WHERE category_id='$cat_id' AND book_status=1";
                        $passBook=mysqli_query($con,$fromBook);
                        while($row=mysqli_fetch_assoc($passBook)){
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

                            <li class="category-item kids-teens">
                        <figure>
                             <?php 
                                    if(!empty($thumbnail)){
                                ?>
                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }
                                ?>  
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4><?php echo $book_name; ?></h4>
                                    <span class="author"><strong>Author:</strong><?php echo $author_name; ?></span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p><?php echo substr($book_desc,0,200)."..."; ?></p>

                                    <?php 
                                    if(!empty($_SESSION['user_id'])){?>
                                         <a href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        <?php

                                    }else{?>
                                         <a href="signin.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                                   <?php }
                                     ?>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                           
                    </li>
                            <?php
                        }
                    ?>

                    <?php 

                     $bookShow="SELECT * FROM catagory WHERE cat_name='Magazine'";
                        $passbookQuery=mysqli_query($con,$bookShow);
                        while($row=mysqli_fetch_assoc($passbookQuery)){
                            $cat_id=$row['cat_id'];
                        }
                        $fromBook="SELECT * FROM books WHERE category_id='$cat_id'";
                        $passBook=mysqli_query($con,$fromBook);
                        while($row=mysqli_fetch_assoc($passBook)){
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
                             <li class="category-item video">
                                <figure>
                             <?php 
                                    if(!empty($thumbnail)){
                                ?>
                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }
                                ?>  
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4><?php echo $book_name; ?></h4>
                                    <span class="author"><strong>Author:</strong><?php echo $author_name; ?></span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p><?php echo substr($book_desc,0,200)."..."; ?></p>

                                    <?php 
                                    if(!empty($_SESSION['user_id'])){?>
                                         <a href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        <?php

                                    }else{?>
                                         <a href="signin.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                                   <?php }
                                     ?>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                             </li>

                            <?php
                        }
                     ?>
                    
                   
                    <?php 

                    $bookShow="SELECT * FROM catagory WHERE cat_name='Science Fiction'";
                        $passbookQuery=mysqli_query($con,$bookShow);
                        while($row=mysqli_fetch_assoc($passbookQuery)){
                            $cat_id=$row['cat_id'];
                        }
                        $fromBook="SELECT * FROM books WHERE category_id='$cat_id'";
                        $passBook=mysqli_query($con,$fromBook);
                        while($row=mysqli_fetch_assoc($passBook)){
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

                            <li class="category-item audio">
                                <figure>
                             <?php 
                                    if(!empty($thumbnail)){
                                ?>
                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }
                                ?>  
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4><?php echo $book_name; ?></h4>
                                    <span class="author"><strong>Author:</strong><?php echo $author_name; ?></span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p><?php echo substr($book_desc,0,200)."..."; ?></p>

                                    <?php 
                                    if(!empty($_SESSION['user_id'])){?>
                                         <a href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        <?php

                                    }else{?>
                                         <a href="signin.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                                   <?php }
                                     ?>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                            </li>
                            <?php
                        }
                     ?> 

                     <?php 

                      $bookShow="SELECT * FROM catagory WHERE cat_name='Novel'";
                        $passbookQuery=mysqli_query($con,$bookShow);
                        while($row=mysqli_fetch_assoc($passbookQuery)){
                            $cat_id=$row['cat_id'];
                        }
                        $fromBook="SELECT * FROM books WHERE category_id='$cat_id' AND book_status=1";
                        $passBook=mysqli_query($con,$fromBook);
                        while($row=mysqli_fetch_assoc($passBook)){
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
                            <li class="category-item books">
                               <figure>
                             <?php 
                                    if(!empty($thumbnail)){
                                ?>
                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }
                                ?>  
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4><?php echo $book_name; ?></h4>
                                    <span class="author"><strong>Author:</strong><?php echo $author_name; ?></span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p><?php echo substr($book_desc,0,200)."..."; ?></p>

                                    <?php 
                                    if(!empty($_SESSION['user_id'])){?>
                                         <a href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        <?php

                                    }else{?>
                                         <a href="signin.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                                   <?php }
                                     ?>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure> 
                            </li>

                            <?php
                        }
                      ?>   
                    
                    <?php 
                    $bookShow="SELECT * FROM catagory WHERE cat_name='Poem'";
                        $passbookQuery=mysqli_query($con,$bookShow);
                        while($row=mysqli_fetch_assoc($passbookQuery)){
                            $cat_id=$row['cat_id'];
                        }
                        $fromBook="SELECT * FROM books WHERE category_id='$cat_id'";
                        $passBook=mysqli_query($con,$fromBook);
                        while($row=mysqli_fetch_assoc($passBook)){
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

                             <li class="category-item magazines">
                                <figure>
                             <?php 
                                    if(!empty($thumbnail)){
                                ?>
                                    <img src="library_admin/assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }
                                ?>  
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4><?php echo $book_name; ?></h4>
                                    <span class="author"><strong>Author:</strong><?php echo $author_name; ?></span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p><?php echo substr($book_desc,0,200)."..."; ?></p>

                                    <?php 
                                    if(!empty($_SESSION['user_id'])){?>
                                         <a href="books-media-detail.php?book=<?php echo $book_name; ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        <?php

                                    }else{?>
                                         <a href="signin.php">Read More <i class="fa fa-long-arrow-right"></i></a>
                                   <?php }
                                     ?>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure> 
                             </li>
                            <?php
                        }

                     ?>
                   
                </ul>
                <div class="center-content">
                    <a href="#" class="btn btn-primary">View More</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Start: Category Filter -->
        
        <!-- Start: Features -->
        <section class="features">
            <div class="container">
                <ul>
                    <li class="bg-yellow">
                        <div class="feature-box">
                            <i class="yellow"></i>
                            <h3>Books</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="yellow" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-light-green">
                        <div class="feature-box">
                            <i class="light-green"></i>
                            <h3>eBooks</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="light-green" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-blue">
                        <div class="feature-box">
                            <i class="blue"></i>
                            <h3>DVDs</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="blue" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-red">
                        <div class="feature-box">
                            <i class="red"></i>
                            <h3>Magazines</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="red" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-violet">
                        <div class="feature-box">
                            <i class="violet"></i>
                            <h3>Audio</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="violet" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-green">
                        <div class="feature-box">
                            <i class="green"></i>
                            <h3>eAudio</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="green" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End: Features -->
      
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