<?php 
include "inc/admin/header.php";
include "inc/admin/topbar.php";
include "inc/admin/menu.php";
 ?>
<?php 
if($_SESSION['user_role']==1){

	$do=isset($_GET['do'])?$_GET['do']:'manage';
	if($do=="manage"){?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Users</h4>
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
						<a href="#">Manage All Users</a>
					</li>
					
				</ul>
			</div>
			<div class="page-category">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- card start -->
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Manage Users</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="basic-datatables" class="table table-striped table-hover text-center" >
									<thead>
										<tr>
											<th>SL.</th>
											<th>Avater</th>
											<th>Full Name</th>
											<th>User Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Status</th>
											<th>Role</th>
											<th>Join date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
								<?php 

								$showQuery="SELECT * FROM user ORDER BY user_id DESC";
								$passshowQuery=mysqli_query($con,$showQuery);
								$i=0;
								while($row=mysqli_fetch_assoc($passshowQuery)){
									$user_id 		=$row['user_id'];
									$image 		=$row['avater'];
									$fullname 		=$row['fullname'];
									$username 		=$row['username'];
									$email 			=$row['email'];
									$phone 			=$row['phone'];
									$password 		=$row['password'];
									$user_role 		=$row['user_role'];
									$status 		=$row['status'];
									$join_date 		=$row['join_date'];
									$i++;
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php 
										if(!empty($image)){?>
												<img src="assets/img/User/<?php echo $image; ?>" width="50">
											<?php 
											 }else if(empty($image)){
                        ?>
                        <img src="assets/img/User/avater.png" alt="default image for rohinga" width="50">
                        <?php
                      }

										 ?>
										</td>
										<td><?php echo $fullname; ?></td>
										<td><?php echo $username; ?></td>
										<td><?php echo $email; ?></td>
										<td><?php echo $phone; ?></td>
										<td>
											<?php 

				                          if($status==1){
				                            echo '<div class="badge badge-success">Active</div>';
				                          }else if($status==2){
				                            echo '<div class="badge badge-danger">Inactive</div>';
				                          }
				                         ?>
										</td>
										<td>
											<?php 

				                          if($user_role==1){
				                            echo '<div class="badge badge-success">Admin</div>';
				                          }else if($user_role==2){
				                            echo '<div class="badge badge-danger">User</div>';
				                          }
				                         ?>
										</td>
										<td><?php echo $join_date; ?></td>
										<td>
											<div class="text-center">
				                          <a href="users.php?do=edit&u_id=<?php echo $user_id; ?>"><i class="fa fa-edit"></i></a>

				                          <a href="" data-toggle="modal" data-target="#deleteUser<?php echo $user_id; ?>"><i class="fa fa-trash icon-mar"></i></a>
				                      </div>
										</td>
							<div class="modal fade" id="deleteUser<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Delete this User??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="users.php?do=delete&d_id=<?php echo $user_id; ?>" type="button" class="btn btn-danger">Confirm</a>
                                <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>

                                   
                                </div>
                                
                                </div>
                            </div>
                          </div>
									</tr>
									<?php
								}
								/*while loop end here*/

								 ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
							<!-- card end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	}
	else if($do=="add"){
?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">User</h4>
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
						<a href="#">Add New Users</a>
					</li>
					
				</ul>
			</div>
			<div class="page-category">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- card started -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Users</h4>
								</div>
								<div class="card-body">
							<form action="users.php?do=insert" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Full Name</label>
											<input type="text" name="fullname" class="form-control" required="required" autocomplete="off">
										</div>
										<div class="form-group">
											<label>User Name</label>
											<input type="text" name="username" class="form-control" required="required" autocomplete="off">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" class="form-control" required="required" autocomplete="off">
										</div>
										<div class="form-group">
											<label>Phone</label>
											<input type="text" name="phone" class="form-control" autocomplete="off">
										</div>

			                        <div class="form-group">
			                          <label>User Status</label>  
			                          <select name="status" class="form-control">
			                            <option value="2">please select the User status</option>
			                            <option value="1">Active</option>
			                            <option value="2">Inactive</option>
			                          </select>
			                        </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
				                          <label>Password</label>
				                          <input type="password" name="password" placeholder="*****" class="form-control" required="required" autocomplete="off" id="Password">
				                        </div>
				                        <div class="form-group">
				                          <label>Confirm Password</label>
				                          <input type="password" name="repassword" placeholder="*****" class="form-control" required="required" autocomplete="off" id="Password1">
				                        </div>

										 <div class="form-group">
				                          <label>User Role</label>  
				                          <select name="role" class="form-control">
				                            <option value="2">please select the User Role</option>
				                            <option value="1">Admin</option>
				                            <option value="2">User</option>
				                          </select>
				                        </div>
				                         <div class="form-group">
				                          <label>Profile Picture</label>
				                          
				                         <div class="customFile" data-controlMsg="Choose a file">
				                            <span class="selectedFile">No file selected</span>
				                            <input type="file" name="avater"  class="widthPreview">
				                        </div>
				                        <div class="previewContainer">
				                            <img class="preview" src="" alt="Image preview..." />
				                        </div>
				                        </div>
									</div>
									<div class="col-lg-12 text-center">
                         			    <input type="submit" name="adduser" value="Add User" class="btn btn-success" style="padding: 10px 100px 10px 100px;margin-top:15px">
                      				</div>	
								</div>
							</form>
								</div>
							</div>
							<!-- card end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	}
	else if($do=="insert"){
		  if (isset($_POST['adduser'])) {
                  $fullname         =mysqli_real_escape_string($con,$_POST['fullname']);
                  $username         =mysqli_real_escape_string($con,$_POST['username']);
                  $email            =mysqli_real_escape_string($con,$_POST['email']);
                  $phone            =mysqli_real_escape_string($con,$_POST['phone']);
                  $status           =$_POST['status'];
                  $role             =$_POST['role'];
                
                  $password         =mysqli_real_escape_string($con,$_POST['password']);
                  $repassword       =mysqli_real_escape_string($con,$_POST['repassword']);
                  $avater           =$_FILES['avater']['name'];
                  $avater_tmp       =$_FILES['avater']['tmp_name'];

                if($password==$repassword){
                  $hashpass=sha1($password);
                  
                  $randomNumber= rand(0,999999);
                 
                  if(!empty($avater)){
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "assets/img/User/" .$avaterFile);
                  }
                  $addquery="INSERT INTO user (avater,fullname,username,email,phone,password,user_role,status,join_date) VALUES ('$avaterFile','$fullname','$username','$email','$phone','$hashpass','$role','$status',now())";
                 
                  $addbabse=mysqli_query($con,$addquery);
                  if($addbabse){
                    header("Location: users.php?do=manage");
                  }else{
                    die("operation failed" . mysqli_error($con));

                  }
                }else{
                  echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>';
                  
                }
                
          
                }
	}
	else if($do=="edit"){
		?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">User</h4>
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
						<a href="#">Edit Users</a>
					</li>
					
				</ul>
			</div>
			<div class="page-category">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- card started -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Users</h4>
								</div>
								<div class="card-body">
									<?php 
									if(isset($_GET['u_id'])){
										$uId=$_GET['u_id'];
										 $u_query="SELECT * FROM user WHERE user_id='$uId'";
					                  $move_uquery=mysqli_query($con,$u_query);

					                  while($row=mysqli_fetch_assoc($move_uquery)){
				                          $user_id                  =$row['user_id'];
				                          $fullName                 =$row['fullname'];
				                          $userName                 =$row['username'];
				                          $email                    =$row['email'];
				                          $phone                    =$row['phone'];
				                          $status                   =$row['status'];
				                          $userRole                 =$row['user_role'];
				                          $avater                   =$row['avater'];
				                          $join_date                =$row['join_date'];
				                          ?>

				          <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Full Name</label>
											<input type="text" name="fullname" class="form-control" autocomplete="off" value="<?php echo $fullName; ?>">
										</div>
										<div class="form-group">
											<label>User Name</label>
											<input type="text" name="username" class="form-control" autocomplete="off" value="<?php echo $userName; ?>">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" class="form-control" autocomplete="off" value="<?php echo $email; ?>">
										</div>
										<div class="form-group">
											<label>Phone</label>
											<input type="text" name="phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
										</div>

			                        <div class="form-group">
			                          <label>User Status</label>  
			                          <select name="status" class="form-control">
			                            <option value="2">please select the User status</option>
			                            <option value="1" <?php if($status==1){ echo 'selected'; }?>>Active</option>
			                            <option value="2" <?php if($status==2){ echo 'selected'; }?>>Inactive</option>
			                          </select>
			                        </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
				                          <label>Password</label>
				                          <input type="password" name="password" placeholder="*****" class="form-control" autocomplete="off" id="Password">
				                        </div>
				                        <div class="form-group">
				                          <label>Confirm Password</label>
				                          <input type="password" name="repassword" placeholder="*****" class="form-control" autocomplete="off" id="Password1">
				                        </div>

										 <div class="form-group">
				                          <label>User Role</label>  
				                          <select name="role" class="form-control">
				                            <option value="2">please select the User Role</option>
				                            <option value="1" <?php if($userRole==1){ echo 'selected'; }?>>Admin</option>
				                            <option value="2" <?php if($userRole==2){ echo 'selected'; }?>>User</option>
				                          </select>
				                        </div>
				                         <div class="form-group">
				                          <label>Profile Picture</label>
				                          
				                         <div class="customFile" data-controlMsg="Choose a file">
				                            <span class="selectedFile"><?php echo $avater; ?></span>
				                            <input type="file" name="avater"  class="widthPreview">
				                        </div>
				                         <div class="previewContainer">
					                        <?php
					                      if(!empty($avater)){
					                        ?>
					                          <img src="assets/img/User/<?php echo $avater; ?>" alt="borolox" width="100" class="preview">
					                        <?php
					                      }else{?>
					                        <img src="" alt="No Image Found" width="100" class="preview">
					                        <?php
					                      }

					                     ?>
					                    </div>
				                        </div>
									</div>
									<div class="col-lg-12 text-center">
										<input type="hidden" name="updateUserId" value="<?php echo  $user_id;?>">
                         			    <input type="submit" name="updateuser" value="Save Changes" class="btn btn-success" style="padding: 10px 100px 10px 100px;margin-top:15px">
                      				</div>	
								</div>
							</form>

				                          <?php
					                   }
									}

									 ?>
								</div>
							</div>
							<!-- card end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<?php
	}
	else if($do=="update"){
		 if (isset($_POST['updateuser'])) {
                  $updateUserId     =$_POST['updateUserId'];
                  $fullname         =$_POST['fullname'];
                  $username         =$_POST['username'];
                  $email            =$_POST['email'];
                  $phone            =$_POST['phone'];
                  $status           =$_POST['status'];
                  $role             =$_POST['role'];
                
                  $password         =$_POST['password'];
                  $repassword       =$_POST['repassword'];
                  $avater           =$_FILES['avater']['name'];
                  $avater_tmp       =$_FILES['avater']['tmp_name'];

                if(!empty($password) && !empty($avater)){
                  if($password==$repassword){
                  $hashpass=sha1($password);

                  /*removing previous image from the folder*/
                  $removeAvaterQuery="SELECT * FROM user WHERE user_id='$updateUserId'";
                  $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
                  while($row=mysqli_fetch_assoc($passRemoveAvater)){
                    $r_avater=$row['avater'];
                    unlink("assets/img/User/" . $r_avater);
                  }
                  /*removing previous image from the folder done*/

                  /*uploading new image with a unique number */
                  $randomNumber= rand(0,999999);
                 
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "assets/img/User/" .$avaterFile);

                  /*uploading new image with a unique number done*/

                  $upquery="UPDATE user SET avater='$avaterFile',fullname='$fullname',username='$username',email='$email',phone='$phone',password='$hashpass',user_role='$role',status='$status' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }
                }else{
                  echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>'; 
                }

                }else if(!empty($avater) && empty($password)){

                  $removeAvaterQuery="SELECT * FROM user WHERE user_id='$updateUserId'";
                  $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
                  while($row=mysqli_fetch_assoc($passRemoveAvater)){
                    $r_avater=$row['avater'];
                    unlink("assets/img/User/" . $r_avater);

                    $randomNumber= rand(0,999999);
                 
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "assets/img/User/" .$avaterFile);

                    $upquery="UPDATE user SET avater='$avaterFile',fullname='$fullname',username='$username',email='$email',phone='$phone',user_role='$role',status='$status' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }

                }
              }else if(empty($avater) && !empty($password)){
                   if($password==$repassword){
                    $hashpass=sha1($password);

                     $upquery="UPDATE user SET fullname='$fullname',username='$username',email='$email',phone='$phone',password='$hashpass',user_role='$role',status='$status' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }

                }else{
                  echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>';
                }


                }else if(empty($password) && empty($avater)){
                  $upquery="UPDATE user SET fullname='$fullname',username='$username',email='$email',phone='$phone',user_role='$role',status='$status' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }

                }
             }
	}
	else if($do=="delete"){
		 if(isset($_GET['d_id'])){
            $delete_id = $_GET['d_id'];

            $removeAvaterQuery="SELECT * FROM user WHERE user_id='$delete_id'";
            $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
            while($row=mysqli_fetch_assoc($passRemoveAvater)){
              $r_avater=$row['avater'];
              unlink("assets/img/User/" . $r_avater);
            }
            $deleteQuery="DELETE FROM user WHERE user_id='$delete_id'";
            $pass_DeleteQuery=mysqli_query($con,$deleteQuery);
            if($pass_DeleteQuery){
              header("Location: users.php?do=manage");
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
						<h4 class="page-title">Users</h4>
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
								<a href="#">Manage Users</a>
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