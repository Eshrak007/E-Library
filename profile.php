<?php 
include "inc/header.php";
 ?>
  <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Book your Books</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>Book</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->
         <?php

      $do=isset($_GET['do']) ? $_GET['do']:'veiwUser';
      if(!empty($_SESSION['user_id'])){
        if($do=="veiwUser"){

            $viewId=$_SESSION['user_id'];
                  $viewIdQuery="SELECT * FROM user WHERE user_id='$viewId'";
                  $passviewIdQuery=mysqli_query($con,$viewIdQuery);
                  while($row=mysqli_fetch_array($passviewIdQuery)){
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
                   
        <section style="color: #1a202c; text-align: left; background: linear-gradient(to right,#ffafbd,#ffc3a0); min-height: 100vh;">
        <div class="container">
            <div class="main-body">
             <div class="row">
                <div class="col-sm-12 text-right">
                  <a class="btn btn-success" style="margin-bottom: 15px;color: #fff;" href="" data-toggle="modal" data-target="#updatefront">Edit Profile</a>
                </div>

              </div>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card-custom">
                <div style=" flex: 1 1 auto; min-height: 1px; padding: 1rem;">
                  <div class="d-flex flex-column align-items-center text-center">
                   <?php 
                    if(!empty($avater)){
                      ?>
                  <a href="#">
                      <img src="library_admin/assets/img/User/<?php echo $avater; ?>" alt=""class="rounded-circle" width="150">
                  </a>
                   <?php 
                 }else if(empty($avater)){
                  ?>
                  <a href="#">
                      <img src="library_admin/assets/img/User/avater.png" alt="" class="rounded-circle" width="150">
                  </a>
                   <?php 

                    }
                 ?>
                    <div style="margin-top:20px;">
                      <h4><?php echo $fullName; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $email; ?></p>
                     
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card-custom mb-3">
                <div style=" flex: 1 1 auto; min-height: 1px; padding: 1rem;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $fullName; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $userName; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $email; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $phone; ?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Member Since</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php 
                        $date=date_create($join_date);
                        echo date_format($date,"l jS \of F Y");
                       ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-12">
          		<table class="table table-responsive table-bordered table-striped" style="
    background: white;
    margin-top: 30px;">
				  <thead>
				    <tr>
				      <th scope="col">Sl.</th>
				      <th scope="col">Book Name</th>
				      <th scope="col">Category Name</th>
				      <th scope="col">Quantity of Booked</th>
					  <th scope="col">Issue Date</th>
					  <th scope="col">Return Date</th>
				    </tr>
				  </thead>
  				<tbody>
  					<?php 
  					$user=$_SESSION['user_id'];
  					$issueQuery="SELECT * FROM booking_request WHERE user_id='$user'";
  					$passQuery=mysqli_query($con,$issueQuery);
  					$i=0;
  					while ($row=mysqli_fetch_assoc($passQuery)) {
  					    $booking_issue_id     =$row['booking_issue_id'];
  					    $user_id     		  =$row['user_id'];
  					    $category_id     	  =$row['category_id'];
  					    $book_id     		  =$row['book_id'];
  					    $quantity     		  =$row['quantity'];
  					    $issue_date           =$row['issue_date'];
  					    $return_date          =$row['return_date'];
  					    $i++;

  					    ?>
  					    <tr>
  					    	<td><?php echo $i; ?></td>
  					    	<td>
  					    		<?php 
  					    		$bookName="SELECT * FROM books WHERE book_id='$book_id'";
  					    		$passquery=mysqli_query($con,$bookName);
  					    		while ($row=mysqli_fetch_assoc($passquery)) {
  					    		    $book_name=$row['book_name'];
  					    		}
  					    		echo $book_name;
  					    		 ?>

  					    	</td>
  					    	<td>
  					    		<?php 
  					    		$catName="SELECT * FROM catagory WHERE cat_id='$category_id'";
  					    		$passcatquery=mysqli_query($con,$catName);
  					    		while ($row=mysqli_fetch_assoc($passcatquery)) {
  					    		    $cat_name=$row['cat_name'];
  					    		}
  					    		echo $cat_name;
  					    		 ?>
  					    	</td>
  					    	<td>
  					    		<?php echo $quantity; ?>
  					    	</td>
  					    	<td>
                    <?php echo $issue_date; ?>
                  </td>
  					    	<td>
                    <?php echo $return_date; ?>
                  </td>

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
</section>
       <!-- update modal -->
        <div class="modal fade" id="updatefront" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Your Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">

                    <form action="profile.php?do=editUser" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" placeholder="Type Fullname" class="form-control" autocomplete="off" value="<?php echo $fullName; ?>">
                          </div>
                          <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" placeholder="give a username" class="form-control" autocomplete="off" value="<?php echo $userName; ?>">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email Address" class="form-control" autocomplete="off" value="<?php echo $email; ?>" readonly="readonly">
                          </div>

                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" placeholder="Phone Number" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
                          </div>
                        
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="*****" class="form-control" autocomplete="off" id="Password">
                          </div>
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="repassword" placeholder="*****" class="form-control" autocomplete="off" id="Password1">
                          </div>
                          <div class="form-group">
                            <label>Profile Picture</label><br>
                           
                            <div class="customFile" data-controlMsg="Choose a file">
                              <span class="selectedFile"><?php echo $avater; ?></span>
                              <input type="file" name="avater"  class="widthPreview">
                          </div>
                          
                          <div class="previewContainer">
                              <?php
                            if(!empty($avater)){
                              ?>
                                <img src="library_admin/assets/img/User/<?php echo $avater; ?>" alt="borolox" width="100" class="preview">
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
                          <input type="hidden" name="UpdateID" value="<?php echo  $user_id;?>">
                           <input type="submit" name="profileupdate" value="Update Information" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
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

        <?php
          }
      }
          else if($do=="editUser"){
             if(isset($_POST['profileupdate'])){
                $userId=$_POST['UpdateID'];
                $fullname       =mysqli_real_escape_string($con, $_POST['fullname']);
                $username       =mysqli_real_escape_string($con, $_POST['username']);
                $email          =mysqli_real_escape_string($con, $_POST['email']);
                $phone          =mysqli_real_escape_string($con, $_POST['phone']);
                $address        =mysqli_real_escape_string($con, $_POST['address']);

                $password       =mysqli_real_escape_string($con, $_POST['password']);
                $repassword     =mysqli_real_escape_string($con, $_POST['repassword']);

                $avater         =$_FILES['avater']['name'];
                $avater_tmp     =$_FILES['avater']['tmp_name'];

                /*update procedure start*/
            if(!empty($password) && !empty($avater)){
              if($password==$repassword){
              $hashpass=sha1($password);

              /*removing previous image from the folder*/
              $removeAvaterQuery="SELECT * FROM user WHERE user_id='$userId'";
              $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
              while($row=mysqli_fetch_assoc($passRemoveAvater)){
                $r_avater=$row['avater'];
                unlink("library_admin/assets/img/User/" . $r_avater);
              }
              /*removing previous image from the folder done*/

              /*uploading new image with a unique number */
              $randomNumber= rand(0,999999);
             
                $avaterFile= $randomNumber . $avater;
                move_uploaded_file($avater_tmp, "library_admin/assets/img/User/" .$avaterFile);

              /*uploading new image with a unique number done*/

              $upquery="UPDATE user SET avater='$avaterFile',fullname='$fullname',username='$username',phone='$phone',password='$hashpass' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }
            }else{
              echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>'; 
            }

            }else if(!empty($avater) && empty($password)){

              $removeAvaterQuery="SELECT * FROM user WHERE user_id='$userId'";
              $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
              while($row=mysqli_fetch_assoc($passRemoveAvater)){
                $r_avater=$row['avater'];
                unlink("library_admin/assets/img/User/" . $r_avater);

                $randomNumber= rand(0,999999);
             
                $avaterFile= $randomNumber . $avater;
                move_uploaded_file($avater_tmp, "library_admin/assets/img/User/" .$avaterFile);

                $upquery="UPDATE user SET avater='$avaterFile',fullname='$fullname',username='$username',phone='$phone' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }

            }
          }else if(empty($avater) && !empty($password)){
               if($password==$repassword){
                $hashpass=sha1($password);

                 $upquery="UPDATE user SET fullname='$fullname',username='$username',phone='$phone',password='$hashpass' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }

            }else{
              echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>';
            }


            }else if(empty($password) && empty($avater)){
              $upquery="UPDATE user SET fullname='$fullname',username='$username',phone='$phone' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }

            }
                /*update procedure end*/
              }
          }

         }
         else{
            if($do=="veiwUser"){
            echo '<div class="alert alert-danger text-center mt-4">Need to login first.</div>';
              }
                
            }
              
              ?>
              


        <?php 
        include "inc/footer.php";
         ?>