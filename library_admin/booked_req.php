<?php 
include "inc/admin/header.php";
include "inc/admin/topbar.php";
include "inc/admin/menu.php";
 ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Booked</h4>
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
								<a href="#">Total Booked</a>
							</li>
							
						</ul>
					</div>
					<div class="page-category">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Manage Booked Items</h4>
										</div>
									<div class="card-body">
							<div class="table-responsive">
								<table id="basic-datatables" class="table table-striped table-hover text-center" >
									<thead>
										<tr>
											<th>SL.</th>
											<th>Avater</th>
											<th>User Name</th>
											<th>Thumbnail</th>
											<th>Book Name</th>
											<th>Category</th>
											<th>Author Name</th>
											<th>Booked quantity</th>
											<th>Issue Date</th>
											<th>Return_date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$book="SELECT * FROM booking_request ORDER BY booking_issue_id DESC";
										$passBook=mysqli_query($con,$book);
										$i=0;
										while ($row=mysqli_fetch_assoc($passBook)) {
										    $booking_issue_id	=$row['booking_issue_id'];
										    $user_id			=$row['user_id'];
										    $category_id		=$row['category_id'];
										    $book_id			=$row['book_id'];
										    $quantity			=$row['quantity'];
										    $issue_date			=$row['issue_date'];
										    $return_date		=$row['return_date'];
										    $i++;
										    ?>
										    <tr>
										    	<td><?php echo $i; ?></td>
										    	<td>
								    		<?php 
								    		$user_avater="SELECT * FROM user WHERE user_id='$user_id'";
								    		$passuser=mysqli_query($con,$user_avater);
								    		while ($row=mysqli_fetch_assoc($passuser)) {
								    		    $avater=$row['avater'];
								    		}
								    		if(!empty($avater)){
								    			?>
												<img src="assets/img/User/<?php echo $avater; ?>" width="50">
											<?php 
											 }else if(empty($avater)){
					                            ?>
					                            <img src="assets/img/User/avater.png" alt="default image for rohinga" width="50">
					                            <?php
					                          }

										 ?>
										    	</td>

										    <td>
										  <?php 
											$user_avater="SELECT * FROM user WHERE user_id='$user_id'";
								    		$passuser=mysqli_query($con,$user_avater);
								    		while ($row=mysqli_fetch_assoc($passuser)) {
								    		    $fullname=$row['fullname'];
								    		}
								    		echo $fullname;
										    	 ?>
										    	 	
										    </td>
										    <td>
								    	<?php 
											$book_avater="SELECT * FROM books WHERE book_id='$book_id'";
								    		$passbook=mysqli_query($con,$book_avater);
								    		while ($row=mysqli_fetch_assoc($passbook)) {
								    		    $thumbnail=$row['thumbnail'];
								    		}
								    		if(!empty($thumbnail)){
								    			?>
												<img src="assets/img/Books/<?php echo $thumbnail; ?>" width="50">
											<?php 
											 }else if(empty($thumbnail)){
					                            ?>
					                            <img src="assets/img/Books/avatar.jpg" alt="default image for rohinga" width="50">
					                            <?php
					                          }

										 ?>

										    </td>
										    <td>
								    		<?php 
										    
											$book_avater="SELECT * FROM books WHERE book_id='$book_id'";
								    		$passbook=mysqli_query($con,$book_avater);
								    		while ($row=mysqli_fetch_assoc($passbook)) {
								    		    $book_name=$row['book_name'];
								    		}
								    		echo $book_name;
								    		 ?>
										    </td>
										    <td>
										    <?php 
										    
											$book_cat="SELECT * FROM catagory WHERE cat_id='$category_id'";
								    		$passcat=mysqli_query($con,$book_cat);
								    		while ($row=mysqli_fetch_assoc($passcat)) {
								    		    $cat_name=$row['cat_name'];
								    		}
								    		echo $cat_name;
								    		 ?>
										    </td>
										    <td>
										    	<?php 
										    
											$book_avater="SELECT * FROM books WHERE book_id='$book_id'";
								    		$passbook=mysqli_query($con,$book_avater);
								    		while ($row=mysqli_fetch_assoc($passbook)) {
								    		    $author_name=$row['author_name'];
								    		}
								    		echo $author_name;
								    		 ?>
										    </td>
										    <td><?php echo $quantity; ?></td>
										    <td><?php echo $issue_date; ?></td>
										    <td><?php echo $return_date; ?></td>
										    <td>
										    	<div class="text-center">
										    		  <a href="" class="btn btn-success" data-toggle="modal" data-target="#deletebook<?php echo $booking_issue_id; ?>">Display</a>
										    	</div>
										    </td>
					<div class="modal fade" id="deletebook<?php echo $booking_issue_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Display this Book Again??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="booked_req.php?d_id=<?php echo $booking_issue_id; ?>" type="button" class="btn btn-danger">Confirm</a>
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
		if(isset($_GET['d_id'])){
			$displayId=$_GET['d_id'];
			$displayQuery="SELECT * FROM booking_request WHERE booking_issue_id='$displayId'";
			$passDisplay=mysqli_query($con,$displayQuery);
			while($row=mysqli_fetch_assoc($passDisplay)){
				$quantity=$row['quantity'];
				$book_id=$row['book_id'];
			}
			$anotherDisplay="SELECT * FROM books WHERE book_id='$book_id'";
			$passanother=mysqli_query($con,$anotherDisplay);
			while($row=mysqli_fetch_assoc($passanother)){
				$book_quatity=$row['book_quatity'];
			}
			$newQuantity=$quantity+$book_quatity;
			$updatebook="UPDATE books SET book_quatity='$newQuantity' WHERE book_id='$book_id'";
			$passupdate=mysqli_query($con,$updatebook);
			
			$finalDisplay="DELETE FROM booking_request WHERE booking_issue_id='$displayId'";
			$passfinal=mysqli_query($con,$finalDisplay);
			if($passfinal){
				header("Location:booked_req.php");
			}else{
				die("operation failed".mysqli_error($con));
			}
		}

		 ?>
			
			<?php 

			include "inc/admin/footer.php";

			 ?>