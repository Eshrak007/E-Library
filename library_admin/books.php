<?php 
include "inc/admin/header.php";
include "inc/admin/topbar.php";
include "inc/admin/menu.php";
 ?>

<?php
if($_SESSION['user_role']==1){ 
$do=isset($_GET['do'])?$_GET['do']:"manage";
if($do=="manage"){?>
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Books</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Manage Books</a>
							</li>
							
						</ul>
					</div>
					<div class="page-category">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Manage Books</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="basic-datatables" class="table table-striped table-hover text-center" >
									<thead>
										<tr>
											<th>SL.</th>
											<th>Thumbnail</th>
											<th>Book Name</th>
											<th>Auther Name</th>
											<th>Category</th>
											<th>Status</th>
											<th>Tags</th>
											<th>Available In Stock</th>
											<th>Upload date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
								<?php 

								$showQuery="SELECT * FROM books ORDER BY book_id DESC";
								$passshowQuery=mysqli_query($con,$showQuery);
								$i=0;
								while($row=mysqli_fetch_assoc($passshowQuery)){
									$book_id 		=$row['book_id'];
									$thumbnail 		=$row['thumbnail'];
									$book_name 		=$row['book_name'];
									$author_name 	=$row['author_name'];
									$category_id 	=$row['category_id'];
									$meta_tags		=$row['meta_tags'];
									$book_quatity 	=$row['book_quatity'];
									$book_status 	=$row['book_status'];
									$book_date 		=$row['book_date'];
									$i++;
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td>
											<?php 
											if(!empty($thumbnail)){?>
												<img src="assets/img/Books/<?php echo $thumbnail; ?>" width="50">
											<?php 
											 }else{
					                            ?>
					                            <img src="assets/img/Books/avatar.jpg" alt="default image for rohinga" width="50">
					                            <?php
					                          }

											 ?>
										</td>
										<td><?php echo $book_name; ?></td>
										<td><?php echo $author_name; ?></td>
										<td>
											<?php
						                      $show_cat="SELECT * FROM catagory WHERE cat_id='$category_id'";
						                      $passShow=mysqli_query($con,$show_cat);
						                      while($row=mysqli_fetch_array($passShow)){
						                        $showCatId=$row['cat_id'];
						                        $showCatname=$row['cat_name'];
						                      echo $showCatname;
						                      }

						                      ?>
										</td>
										<td>
											<?php 

				                          if($book_status==1){
				                            echo '<div class="badge badge-success">Active</div>';
				                          }else if($book_status==2){
				                            echo '<div class="badge badge-danger">Inactive</div>';
				                          }
				                         ?>
										</td>
										<td>
											<?php echo $meta_tags; ?>
										</td>
										<td>
											<?php 

				                          if($book_quatity==0){
				                            echo '<div class="badge badge-danger">Stock Out</div>';
				                          }else{
				                            echo $book_quatity;
				                          }
				                         ?>

										</td>
										<td><?php echo $book_date; ?></td>
										<td>
										<div class="text-center">
				                          <a href="books.php?do=edit&u_id=<?php echo $book_id; ?>"><i class="fa fa-edit"></i></a>
				                          <a href="" data-toggle="modal" data-target="#deletebook<?php echo $book_id; ?>"><i class="fa fa-trash icon-mar"></i></a>
				                      </div>
										</td>
					  		<div class="modal fade" id="deletebook<?php echo $book_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Delete this Book??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="books.php?do=delete&d_id=<?php echo $book_id; ?>" type="button" class="btn btn-danger">Confirm</a>
                                <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>

                                   
                                </div>
                                
                                </div>
                            </div>
                            </div>
									</tr>


									<?php
								}


								 ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
else if($do=="add"){?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Books</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Add Books</a>
							</li>
							
						</ul>
					</div>
					<div class="page-category">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Add Books</h4>
						</div>
						<div class="card-body">
							<form action="books.php?do=insert" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-floating-label">
											<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="book_name" required autocomplete="off">
											<label for="inputFloatingLabel2" class="placeholder">Book Name</label>
										</div>
										<div class="form-group form-floating-label">
											<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="auther_name" required autocomplete="off">
											<label for="inputFloatingLabel2" class="placeholder">Auther Name</label>
										</div>
										<div class="form-group form-floating-label">
												<select name="book_type" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													
										<?php
					                    $parent_read="SELECT * FROM catagory WHERE parent_id=0 ORDER BY cat_name ASC";
					                    $read_query=mysqli_query($con,$parent_read);
					                    
					                    while($row=mysqli_fetch_assoc($read_query)){
					                        $parent_cat_id=$row['cat_id'];
					                        $parent_cat_name=$row['cat_name'];
					                        ?>
					                          <option value="<?php echo $parent_cat_id; ?>"><?php echo $parent_cat_name; ?></option>   

					                        <?php
					                        $childread="SELECT * FROM catagory WHERE parent_id=$parent_cat_id";
					                        $passchildread=mysqli_query($con,$childread);
					                        while($row=mysqli_fetch_assoc($passchildread)){
					                        	$child_cat_id=$row['cat_id'];
					                        	$child_cat_name=$row['cat_name'];
					                        	?>
					                        	<option value="<?php echo $child_cat_id; ?>"><?php echo $child_cat_name; ?></option>

					                        	<?php
					                        }
					                    }
					                  ?>
               
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Select Category</label>
									</div>

									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="quantity" required autocomplete="off">
										<label for="inputFloatingLabel2" class="placeholder">Quantity</label>
									</div>
									<div class="form-group form-floating-label">
										<select name="book_status" class="form-control input-solid" id="selectFloatingLabel2" required>
											<option value="">&nbsp;</option>
											<option value="1">Active</option>
											<option value="2">Inactive</option>
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Status</label>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
			                          <label>Meta tags</label>
			                        <input type="text" name="tags" data-role="tagsinput" class="form-control">
			                        </div>
									<div class="form-group">
										<label>Category Description</label>
											<textarea class="form-control" name="book_description" rows="5">
											</textarea>
									</div>			
									 <div class="form-group">
			                          <label>Thumbnail</label>
			                          
			                         <div class="customFile" data-controlMsg="Choose a file">
			                            <span class="selectedFile">No thumbnail selected</span>
			                            <input type="file" name="book_thumbnail"  class="widthPreview">
			                        </div>
			                        <div class="previewContainer">
			                            <img class="preview" src="" alt="Upload an image" />
			                        </div>

			                          
			                        </div>
									</div>
									<div class="col-12 text-center">
										<div class="form-group">
										<input type="submit" name="addbook" value="Add Books" class="btn btn-success">
										</div>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php

}else if($do=="insert"){
	if(isset($_POST['addbook'])){
		$book_name 		=mysqli_real_escape_string($con,$_POST['book_name']);
		$auther_name 	=mysqli_real_escape_string($con,$_POST['auther_name']);
		$book_type 		=$_POST['book_type'];
		$quantity 		=mysqli_real_escape_string($con,$_POST['quantity']);
		$tags           =mysqli_real_escape_string($con,$_POST['tags']);
		$book_status 	=$_POST['book_status'];
		$book_description 	=mysqli_real_escape_string($con,$_POST['book_description']);
		$image=$_FILES['book_thumbnail']['name'];
        $image_tmp=$_FILES['book_thumbnail']['tmp_name'];

        $randomNumber=rand(0,999999);
        if(!empty($image)){
        	$imageFile=$randomNumber.$image;
        	move_uploaded_file($image_tmp, "assets/img/Books/".$imageFile);
        }
        $insertBook="INSERT INTO books(thumbnail,book_name,author_name,category_id,book_quatity,meta_tags,book_desc,book_status,book_date)VALUES('$imageFile','$book_name','$auther_name','$book_type','$quantity','$tags','$book_description','$book_status',now())";
        $passQuery=mysqli_query($con,$insertBook);
        if($passQuery){
        	header("Location:books.php");
        }else{
        	die("operation failed".mysqli_error($con));
        }
	}
}
else if($do=="edit"){?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Books</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Edit Books</a>
							</li>
							
						</ul>
					</div>
					<div class="page-category">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
						<div class="card-header">
							<h4 class="card-title">Edit Books</h4>
						</div>
						<div class="card-body">
							<?php 
							if(isset($_GET['u_id'])){
								$upId=$_GET['u_id'];
								$showQuery="SELECT * FROM books WHERE book_id='$upId'";
								$passshowQuery=mysqli_query($con,$showQuery);
								while($row=mysqli_fetch_assoc($passshowQuery)){
									$book_id 		=$row['book_id'];
									$thumbnail 		=$row['thumbnail'];
									$book_name 		=$row['book_name'];
									$author_name 	=$row['author_name'];
									$category_id 	=$row['category_id'];
									$book_quatity 	=$row['book_quatity'];
									$meta_tags		=$row['meta_tags'];
									$book_status 	=$row['book_status'];
									$book_date 		=$row['book_date'];
									$book_description= $row['book_desc']
									?>

									<form action="books.php?do=update" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-floating-label">
											<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="book_name" required autocomplete="off" value="<?php echo $book_name; ?>">
											<label for="inputFloatingLabel2" class="placeholder">Book Name</label>
										</div>
										<div class="form-group form-floating-label">
											<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="auther_name" required autocomplete="off" value="<?php echo $author_name; ?>">
											<label for="inputFloatingLabel2" class="placeholder">Auther Name</label>
										</div>
										<div class="form-group form-floating-label">
												<select name="book_type" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													
										<?php
					                    $parent_read="SELECT * FROM catagory WHERE parent_id=0 ORDER BY cat_name ASC";
					                    $read_query=mysqli_query($con,$parent_read);
					                    
					                    while($row=mysqli_fetch_assoc($read_query)){
					                        $parent_cat_id=$row['cat_id'];
					                        $parent_cat_name=$row['cat_name'];
					                        ?>
					                          <option value="<?php echo $parent_cat_id; ?>"  <?php if($category_id==$parent_cat_id){ echo 'selected'; } ?>><?php echo $parent_cat_name; ?></option>   

					                        <?php
					                        $childread="SELECT * FROM catagory WHERE parent_id=$parent_cat_id";
					                        $passchildread=mysqli_query($con,$childread);
					                        while($row=mysqli_fetch_assoc($passchildread)){
					                        	$child_cat_id=$row['cat_id'];
					                        	$child_cat_name=$row['cat_name'];
					                        	?>
					                        	<option value="<?php echo $child_cat_id; ?>" <?php if($category_id==$child_cat_id){ echo 'selected'; } ?>><?php echo $child_cat_name; ?></option>

					                        	<?php
					                        }
					                    }
					                  ?>
               
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Select Category</label>
									</div>
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="quantity" required autocomplete="off" value="<?php echo $book_quatity;?>">
										<label for="inputFloatingLabel2" class="placeholder">Quantity</label>
									</div>
									<div class="form-group form-floating-label">
										<select name="book_status" class="form-control input-solid" id="selectFloatingLabel2" required>
											<option value="">&nbsp;</option>
											<option value="1" <?php if($book_status==1){
												echo 'selected';
											}?>>Active</option>
											<option value="2"  <?php if($book_status==2){
												echo 'selected';
											}?>>Inactive</option>
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Status</label>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
			                          <label>Meta tags</label>
			                        <input type="text" name="tags" data-role="tagsinput" class="form-control" value="<?php echo $meta_tags; ?>">
			                        </div>
									<div class="form-group">
										<label>Category Description</label>
											<textarea class="form-control" name="book_description" rows="5"><?php echo $book_description; ?>
											</textarea>
									</div>			
									 <div class="form-group">
			                          <label>Thumbnail</label>
			                          
			                   <div class="customFile" data-controlMsg="Choose a file">
                                <span class="selectedFile"><?php echo $thumbnail; ?></span>
                                  <input type="file" name="thumbnail"  class="widthPreview">
                              </div>
                                      
                              <div class="previewContainer">
                                  <?php
                                  if(!empty($thumbnail)){
                                  ?>
                                  <img src="assets/img/Books/<?php echo $thumbnail; ?>" alt="borolox" width="100" class="preview">
                                 <?php
                                  }else{?>
                                 <img src="" alt="No Thumbnail Found" width="100" class="preview">
                                  <?php
                                    }

                                  ?>
                              </div>

			                          
			                        </div>
									</div>
									<div class="col-12 text-center">
										<div class="form-group">
										<input type="hidden" name="updateID"value="<?php echo $book_id; ?>">
										<input type="submit" name="updatebook" value="Save Changes" class="btn btn-success">
										</div>
									</div>
								</div>
							</form>

									<?php
								}

							}
							
							 ?>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<?php

}
else if($do=="update"){
	if(isset($_POST['updatebook'])){
		$bookUpdate=$_POST['updateID'];
		$book_name 		=mysqli_real_escape_string($con,$_POST['book_name']);
		$auther_name 	=mysqli_real_escape_string($con,$_POST['auther_name']);
		$book_type 		=$_POST['book_type'];
		$quantity 		=mysqli_real_escape_string($con,$_POST['quantity']);
		$book_status 	=$_POST['book_status'];
		$tags           =mysqli_real_escape_string($con,$_POST['tags']);
		$book_description 	=mysqli_real_escape_string($con,$_POST['book_description']);
		$image=$_FILES['thumbnail']['name'];
        $image_tmp=$_FILES['thumbnail']['tmp_name'];

        if(!empty($image)){
	      /*removing previous image from the folder*/
	      $removeImageQuery="SELECT * FROM books WHERE book_id='$bookUpdate'";
	      $passRemoveImage=mysqli_query($con,$removeImageQuery);
	      while($row=mysqli_fetch_assoc($passRemoveImage)){
	        $r_Image=$row['thumbnail'];
	        unlink("assets/img/Books/" . $r_Image);
	      }
	      /*removing previous image from the folder done*/

	      /*uploading new image with a unique number */
	      $randomNumber= rand(0,999999);
	     
	      $imageFile= $randomNumber . $image;
	      move_uploaded_file($image_tmp, "assets/img/Books/" .$imageFile);

	      /*uploading new image with a unique number done*/

	      $upPostquery="UPDATE Books SET thumbnail='$imageFile',book_name='$book_name',author_name='$auther_name',category_id='$book_type',book_quatity='$quantity',meta_tags='$tags',book_desc='$book_description',book_status='$book_status' WHERE book_id='$bookUpdate'";

	      $upPostsbabse=mysqli_query($con,$upPostquery);
	      if($upPostsbabse){
	        header("Location:books.php");
	      }else{
	        die("Operation failed" . mysqli_connect_error());
	      }
	    }else if(empty($image)){
	    	$upPostquery="UPDATE Books SET book_name='$book_name',author_name='$auther_name',category_id='$book_type',book_quatity='$quantity',meta_tags='$tags',book_desc='$book_description',book_status='$book_status' WHERE book_id='$bookUpdate'";

	      $upPostsbabse=mysqli_query($con,$upPostquery);
	      if($upPostsbabse){
	        header("Location:books.php");
	      }else{
	        die("Operation failed" . mysqli_connect_error());
	      }
	    }
	}
}
else if($do=="delete"){
	if(isset($_GET['d_id'])){              
	     $deleteId= $_GET['d_id'];
	     $deleteimageQuery="SELECT * FROM books WHERE book_id='$deleteId'";
	     $passDeleteQuery=mysqli_query($con,$deleteimageQuery);
	     while($row=mysqli_fetch_assoc($passDeleteQuery)){
	      $remove_image= $row['thumbnail'];
	      unlink("assets/img/Books/" . $remove_image);
	     }
	     $deletePostQuery="DELETE FROM books WHERE book_id='$deleteId'";
	     $passdeletePostQuery=mysqli_query($con,$deletePostQuery);
	     if($passdeletePostQuery){
	        header("Location:books.php");
	      }else{
	        die("Operation failed" . mysqli_connect_error());
	        }
	    }
}
}else{
	?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Books</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Manage Books</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="alert alert-danger">Sorry You have no access to this Section.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	<?php
}
 ?>
		
			
	<?php 

	include "inc/admin/footer.php";

	 ?>

