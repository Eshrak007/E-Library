  <aside id="secondary" class="sidebar widget-area" data-accordion-group>
        <div class="widget widget_related_search open" data-accordion>
            <h4 class="widget-title" data-control>Related Searches</h4>
            <div data-content>
                <div data-accordion>
                    <h5 class="widget-sub-title" data-control>Categories</h5>
                    <div class="widget_categories" data-content>
                        <ul style="min-height: 300px;">
                <?php 
                $catquery="SELECT * FROM catagory WHERE parent_id=0 AND cat_status=1 ORDER BY cat_name ASC";
                $passcatquery=mysqli_query($con,$catquery);
                $i=0;
                while ($row=mysqli_fetch_assoc($passcatquery)) {
                    $maincat_id     = $row['cat_id'];
                    $maincat_name       = $row['cat_name'];
                    $maincat_desc       = $row['cat_desc'];
                    $maincat_parent     = $row['parent_id'];
                    $maincat_status     = $row['cat_status'];
                    $i++;
                    ?>
                    <li>
                    <i class="fa fa-check"></i>
                    <?php echo $maincat_name; ?> 
                    <span>(
                        <?php
                        $postQuery="SELECT * FROM books WHERE category_id='$maincat_id'";
                        $passpostQuery=mysqli_query($con,$postQuery);
                        $countcat=mysqli_num_rows($passpostQuery);
                        echo $countcat;
                        ?>
                        )
                    </span>
                </li>
                    <?php
                    $subcatQuery="SELECT * FROM catagory WHERE parent_id='$maincat_id' AND cat_status=1 ORDER BY cat_name ASC";
                    $passSubcatquery=mysqli_query($con,$subcatQuery);
                
                    while ($row=mysqli_fetch_assoc($passSubcatquery)) {
                        $subcat_id     = $row['cat_id'];
                        $subcat_name   = $row['cat_name'];
                        $subcat_desc   = $row['cat_desc'];
                        $subcat_parent = $row['parent_id'];
                        $subcat_status = $row['cat_status'];
                        $i++;
                        ?>
                        <li>
                            <i class="fa fa-square" style="margin-left: 20px;"></i>
                            <?php echo $subcat_name; ?> 
                        <span>(
                            <?php
                            $subPostquery="SELECT * FROM books WHERE category_id='$subcat_id'";
                            $passSubpostquery=mysqli_query($con,$subPostquery);
                            $countsubcat=mysqli_num_rows($passSubpostquery);
                            echo $countsubcat;
                            ?>
                            )
                        </span>
                       </li>

                        <?php

                    }

                }



                ?>
               
                
            </ul>
                    </div>
                </div>
               
            </div>
            <div class="clearfix"></div>
        </div>
       
        <div class="widget widget_recent_entries">
            <h4 class="widget-title">Recent Uploaded</h4>
            <ul>
                <?php 
                $recentbook="SELECT * FROM books ORDER BY book_id DESC LIMIT 3";
                $passrecent=mysqli_query($con,$recentbook);
                while($row=mysqli_fetch_assoc($passrecent)){
                    $book_id        =$row['book_id'];
                    $thumbnail      =$row['thumbnail'];
                    $book_name      =$row['book_name'];
                    $author_name    =$row['author_name'];
                    $category_id    =$row['category_id'];
                    $meta_tags      =$row['meta_tags'];
                    $book_quatity   =$row['book_quatity'];
                    $book_status    =$row['book_status'];
                    $book_date      =$row['book_date'];
                    ?>

                <li>
                    <figure>
                    <?php 
                        if(!empty($thumbnail)){
                    ?>
                        <img src="library_admin/assets/img/Books/<?php echo $thumbnail ; ?>" alt="borolox" width="80px">
                    <?php
                        }else{
                    ?>
                        <img src="library_admin/assets/img/Books/avatar.jpg" alt="default image for rohinga" width="80px">
                    <?php
                    }
                    ?>
                    </figure>
                    <a href="books-media-detail.php?book=<?php echo $book_name; ?>"><?php echo $book_name; ?></a>
                    <span class="price"><strong>Author:</strong> <?php echo $author_name; ?></span>
                    <div class="rating">
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                    </div>
                    <div class="clearfix"></div>
                </li>

                    <?php
                }

                 ?>
                
                
            </ul>
            <div class="clearfix"></div>
        </div>
    <div class="widget widget_recent_entries">
        <h4 style="margin-top: 25px;">Tags</h4>
        <div></div>
        <!-- Meta Tag List Start -->
        <div>
            <?php 

            $tagQuery="SELECT * FROM books ORDER BY book_id DESC LIMIT 10";
            $passtagQuery=mysqli_query($con,$tagQuery);
            while($row=mysqli_fetch_assoc($passtagQuery)){
                $alltag=$row['meta_tags'];

                $tags=explode(",",$alltag);
                foreach($tags as $tag){
                    ?>
                    <a href="search.php?searchtags=<?php echo $tag; ?>"><span style="background: #ce6060;color: white;padding-left: 3px;padding-right: 3px;"><?php echo $tag; ?></span></a>
                    <?php
                }
            }


             ?>
          
                     
        </div>
    </div>
    </aside>
