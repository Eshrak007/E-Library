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
				<h4 class="page-title">Category</h4>
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
						<a href="#">Manage Category</a>
					</li>
					
					
				</ul>
			</div>
		<div class="page-category">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						<div class="card-header">
							<h4 class="card-title">Manage Category</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="basic-datatables" class="table table-striped table-hover" >
									<thead>
										<tr>
											<th>SL.</th>
											<th>Category Name</th>
											<th>Category status</th>
											<th>Category Type</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
						<?php 
						$cat_query="SELECT * FROM catagory WHERE parent_id=0
						ORDER BY cat_name DESC";
						$passCat_query=mysqli_query($con,$cat_query);
						$i=0;
						while ($row=mysqli_fetch_assoc($passCat_query)) {
						    $cat_id			=$row['cat_id'];
						    $cat_name		=$row['cat_name'];
						    $cat_desc		=$row['cat_desc'];
						    $cat_status		=$row['cat_status'];
						    $cat_id			=$row['cat_id'];
						    $parent_id		=$row['parent_id'];
						    $cat_date		=$row['cat_date'];
						    $i++;
						    ?>
						    <tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $cat_name; ?></td>
							<td>
							<?php 
							if($cat_status==1){
								echo '<div class="badge badge-success">Active</div>';
							}else if($cat_status==2){
								echo '<div class="badge badge-danger">Inactive</div>';
							}
							?>
							 </td>
							<td>
								<?php
                          	echo '<span class="badge badge-success">Primary-category</span>';
	                        ?>
	                        	
	                        </td>
							<td>
							<?php 
							echo $cat_date;
							 ?>	
							 </td>
							<td>
							<div class="text-center">
	                          <a href="category.php?do=edit&u_id=<?php echo $cat_id; ?>"><i class="fa fa-edit"></i></a>
	                          <a href="" data-toggle="modal" data-target="#deleteUser<?php echo $cat_id; ?>"><i class="fa fa-trash icon-mar"></i></a>
	                      </div>
							</td>
							<!-- delete modal -->
							<div class="modal fade" id="deleteUser<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Delete this Category ??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="category.php?do=delete&d_id=<?php echo $cat_id; ?>" type="button" class="btn btn-danger">Confirm</a>
                                <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>

                                   
                                </div>
                                
                                </div>
                            </div>
                            </div>
						</tr>
						<?php

						$child_query="SELECT * FROM catagory WHERE parent_id='$cat_id' ORDER BY cat_name ASC";
                         $read_child=mysqli_query($con,$child_query);
                         while($row=mysqli_fetch_assoc($read_child))
                         {
                            $cat_id			=$row['cat_id'];
						    $cat_name		=$row['cat_name'];
						    $cat_desc		=$row['cat_desc'];
						    $cat_status		=$row['cat_status'];
						    $parent_id		=$row['parent_id'];
						    $cat_date		=$row['cat_date'];
                             $i++;
                             ?>
                              <tr>
							<td><?php echo $i; ?></td>
							<td>---<?php echo $cat_name; ?></td>
							<td>
							<?php 
							if($cat_status==1){
								echo '<div class="badge badge-success">Active</div>';
							}else if($cat_status==2){
								echo '<div class="badge badge-danger">Inactive</div>';
							}
							?>
							 </td>
							<td>
								<?php
                          	echo '<span class="badge badge-success">Sub category</span>';
	                        ?>
	                        	
	                        </td>
							<td>
							<?php 
							echo $cat_date;
							 ?>	
							 </td>
							<td>
							<div class="text-center">
	                          <a href="category.php?do=edit&u_id=<?php echo $cat_id; ?>"><i class="fa fa-edit"></i></a>
	                          <a href="" data-toggle="modal" data-target="#deleteUser<?php echo $cat_id; ?>"><i class="fa fa-trash icon-mar"></i></a>
	                      </div>
							</td>
							<!-- delete modal -->
							<div class="modal fade" id="deleteUser<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Delete this Category ??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="category.php?do=delete&d_id=<?php echo $cat_id; ?>" type="button" class="btn btn-danger">Confirm</a>
                                <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>

                                   
                                </div>
                                
                                </div>
                            </div>
                            </div>
						</tr>

                         <?php
                     }

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


<?php }else if($do=="add"){?>
	<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Category</h4>
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
						<a href="#">Add New category</a>
					</li>
					
					
				</ul>
			</div>
		<div class="page-category">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						<div class="card-header">
							<h4 class="card-title">Add Category</h4>
						</div>
						<div class="card-body">
							<form action="category.php?do=insert" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-floating-label">
											<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="cat_name" required autocomplete="off">
											<label for="inputFloatingLabel2" class="placeholder">Category Name</label>
										</div>
										<div class="form-group form-floating-label">
												<select name="cat_type" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													<option value="0">Primary Category</option>
										<?php
					                    $parent_read="SELECT * FROM catagory WHERE parent_id=0 ORDER BY cat_name ASC";
					                    $read_query=mysqli_query($con,$parent_read);
					                    
					                    while($row=mysqli_fetch_assoc($read_query)){
					                        $parent_cat_id=$row['cat_id'];
					                        $parent_cat_name=$row['cat_name'];
					                        ?>
					                          <option value="<?php echo $parent_cat_id; ?>"><?php echo $parent_cat_name; ?></option>   

					                        <?php
					                    }
					                  ?>
               
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Select Category</label>
									</div>
									<div class="form-group form-floating-label">
										<select name="cat_status" class="form-control input-solid" id="selectFloatingLabel2" required>
											<option value="">&nbsp;</option>
											<option value="1">Active</option>
											<option value="2">Inactive</option>
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Status</label>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label>Category Description</label>
											<textarea class="form-control" name="description" rows="5">
											</textarea>
									</div>			
									
									</div>
									<div class="col-12 text-center">
										<div class="form-group">
										<input type="submit" name="addcat" value="Add Category" class="btn btn-success">
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
<?php }else if($do=="insert"){
	if(isset($_POST['addcat'])){
		$cat_name   =mysqli_real_escape_string($con,$_POST['cat_name']);
		$cat_type	=$_POST['cat_type'];
		$cat_status =$_POST['cat_status'];
		$cat_desc   =mysqli_real_escape_string($con,$_POST['description']);

		$insertCat="INSERT INTO catagory(cat_name,cat_desc,cat_status,parent_id,cat_date)VALUES('$cat_name','$cat_desc','$cat_status',$cat_type,now())";
		$passinsertCat=mysqli_query($con,$insertCat);
		if($passinsertCat){
			header("Location:category.php?do=manage");
		}else{
			die("operation failed".mysqli_error($con));
		}

	}
}else if($do=="edit"){?>
	<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Category</h4>
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
						<a href="#">Update Category</a>
					</li>
					
					
				</ul>
			</div>
		<div class="page-category">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						<div class="card-header">
							<h4 class="card-title">Edit Category</h4>
						</div>
						<div class="card-body">
						<?php 
						if(isset($_GET['u_id'])){
							$editId=$_GET['u_id'];
							$editCat="SELECT * FROM catagory WHERE cat_id='$editId'";
							$passeditCat=mysqli_query($con,$editCat);
							while ($row=mysqli_fetch_assoc($passeditCat)) {
							$cat_id			=$row['cat_id'];
						    $cat_name		=$row['cat_name'];
						    $cat_desc		=$row['cat_desc'];
						    $cat_status		=$row['cat_status'];
						    $parent_id		=$row['parent_id'];
						    $cat_date		=$row['cat_date'];
						    ?>
						    <form action="category.php?do=update" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-floating-label">
											<input id="inputFloatingLabel2" type="text" class="form-control input-solid" name="cat_name" required autocomplete="off" value="<?php echo $cat_name; ?>">
											<label for="inputFloatingLabel2" class="placeholder">Category Name</label>
										</div>
										<div class="form-group form-floating-label">
												<select name="cat_type" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													<option value="0"<?php 

													if($parent_id==0){
														echo 'selected';
													}

												?>>Primary Category</option>
										<?php
					                    $parent_read="SELECT * FROM catagory WHERE parent_id=0 ORDER BY cat_name ASC";
					                    $read_query=mysqli_query($con,$parent_read);
					                    
					                    while($row=mysqli_fetch_assoc($read_query)){
					                        $parent_cat_id=$row['cat_id'];
					                        $parent_cat_name=$row['cat_name'];
					                        ?>
					                          <option value="<?php echo $parent_cat_id; ?>"<?php if($parent_cat_id==$parent_id){
					                          	echo 'selected';
					                          }
					                      ?>><?php echo $parent_cat_name; ?></option>   

					                        <?php
					                    }
					                  ?>
               
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Select Category</label>
									</div>
									<div class="form-group form-floating-label">
										<select name="cat_status" class="form-control input-solid" id="selectFloatingLabel2" required>
											<option value="">&nbsp;</option>
											<option value="1"<?php 

											if($cat_status==1){
												echo 'selected';
											}
											?>>Active</option>
											<option value="2" <?php 

											if($cat_status==2){
												echo 'selected';
											}
										?>>Inactive</option>
										</select>
										<label for="selectFloatingLabel2" class="placeholder">Status</label>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label>Category Description</label>
											<textarea class="form-control" name="description" rows="5"><?php echo $cat_desc; ?>
											</textarea>
									</div>			
									
									</div>
									<div class="col-12 text-center">
										<div class="form-group">
										<input type="hidden" name="updateId" value="<?php echo $editId; ?>">
										<input type="submit" name="updateCat" value="Update Category" class="btn btn-success">
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
}else if($do=="update"){
	if(isset($_POST['updateCat'])){
		$update_id=$_POST['updateId'];
		$cat_name   =mysqli_real_escape_string($con,$_POST['cat_name']);
		$cat_type	=$_POST['cat_type'];
		$cat_status =$_POST['cat_status'];
		$cat_desc   =mysqli_real_escape_string($con,$_POST['description']);

		$updateCat="UPDATE catagory SET cat_name='$cat_name',cat_desc='$cat_desc',cat_status='$cat_status',parent_id='$cat_type' WHERE cat_id='$update_id'";
		$passQuery=mysqli_query($con,$updateCat);
		if($passQuery){
			header("Location:category.php?do=manage");
		}else{
			die("operation failed".mysqli_error($con));
		}
	}
}else if($do=="delete"){
	if(isset($_GET['d_id'])){
		$deleteId=$_GET['d_id'];
		$queryDelete="SELECT * FROM catagory WHERE cat_id='$deleteId'";
		$passDelete=mysqli_query($con,$queryDelete);
		while($row=mysqli_fetch_assoc($passDelete)){
			$parent_Id=$row['parent_id'];
		}
		if($parent_Id!=0){
			$deleteSub="DELETE FROM catagory WHERE cat_id='$deleteId'";
			$DeletesubQuery=mysqli_query($con,$deleteSub);
			if($DeletesubQuery){
				header("Location:category.php?do=manage");
			}else{
				die("operation failed".mysqli_error($con));
			}
		}else If($parent_id==0){
			$deletemain="DELETE FROM catagory WHERE cat_id='$deleteId'";
			$DeletemainQuery=mysqli_query($con,$deletemain);
			$deleteSub="DELETE FROM catagory WHERE parent_id='$deleteId'";
			$passdeleteSub=mysqli_query($con,$deleteSub);
			header("Location:category.php?do=manage");

		}
	}
}

}else{
	?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Category</h4>
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
								<a href="#">Manage Category</a>
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