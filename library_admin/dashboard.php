<?php 
include "inc/admin/header.php";
include "inc/admin/topbar.php";
include "inc/admin/menu.php";
 ?>
		
<?php 

if($_SESSION['user_role']==1){
	?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h2 class="text-white pb-2">Welcome back, <?php echo $_SESSION['fullName']; ?></h2>
						<h5 class="text-white op-7 mb-4">Yesterday I was clever, so I wanted to change the world. Today I am wise, so I am changing myself.</h5>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card card-dark bg-primary-gradient">
								<?php 
								$tbook="SELECT * FROM books";
								$passbooks=mysqli_query($con,$tbook);
								$count=mysqli_num_rows($passbooks);
								 ?>
								<div class="card-body pb-0">
									<h2 class="mb-2"><?php echo $count; ?></h2>
									<p>Total Books</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-dark bg-secondary-gradient">
								<div class="card-body pb-0">
									<?php 
									$aUser="SELECT * FROM user WHERE status=1 AND user_role=2";
									$passaUser=mysqli_query($con,$aUser);
									$countU=mysqli_num_rows($passaUser);

									 ?>
									<h2 class="mb-2"><?php echo $countU; ?></h2>
									<p>Active Users</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart2"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-dark bg-success2">
								<div class="card-body pb-0">
									<?php 
									$aUser="SELECT * FROM user WHERE status=2 AND user_role=2";
									$passaUser=mysqli_query($con,$aUser);
									$countU=mysqli_num_rows($passaUser);

									 ?>
									<h2 class="mb-2"><?php echo $countU; ?></h2>
									<p>Inactive Users</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart3"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
						<div class="card-header">
							<h4 class="card-title">Inactive users</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="basic-datatables" class="table table-striped table-hover text-center" >
									<thead>
										<tr>
											<th>SL.</th>
											<th>Thumbnail</th>
											<th>User Name</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$inUser="SELECT * FROM user WHERE status=2";
										$passin=mysqli_query($con,$inUser);
										$i=0;
										while($row=mysqli_fetch_assoc($passin)){
											$user_id 		=$row['user_id'];
											$image 		=$row['avater'];
											$fullname 		=$row['fullname'];
											$status 		=$row['status'];
											$i++;
											?>

											<tr>
												<td>
													<?php echo $i; ?>
												</td>
												<td>
										<?php 
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
												<td>
													<?php echo $fullname; ?>
												</td>
												<td>
													<?php 

													if($status==2){
														echo '<div class="badge badge-danger">Inactive</div>';
														}
													 ?>
													
												</td>
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

										 ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
						</div>
						
					</div>
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<h4 class="card-title">Booked item</h4>
									</div>
									<p class="card-category">
									booked Items are Showed here.</p>
								</div>
								<div class="card-body">
									<div class="table-responsive">
								<table id="basic-datatables1" class="table table-striped table-hover text-center" >
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
										    		  <a href="" class="btn btn-success" data-toggle="modal" data-target="#deletebook<?php echo $booking_issue_id; ?>">Live For Rent</a>
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
					
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Feed Activity</div>
								</div>
								<div class="card-body">
									<ol class="activity-feed">
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">Sep 25</time>
											<span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-success">
											<time class="date" datetime="9-24">Sep 24</time>
											<span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
										</li>
										<li class="feed-item feed-item-info">
											<time class="date" datetime="9-23">Sep 23</time>
											<span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
										</li>
										<li class="feed-item feed-item-warning">
											<time class="date" datetime="9-21">Sep 21</time>
											<span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-danger">
											<time class="date" datetime="9-18">Sep 18</time>
											<span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
										</li>
										<li class="feed-item">
											<time class="date" datetime="9-17">Sep 17</time>
											<span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
										</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Support Tickets</div>
										<div class="card-tools">
											<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div class="avatar avatar-online">
											<span class="avatar-title rounded-circle border border-white bg-info">J</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
											<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">8:40 PM</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">1 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
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

 ?>

		
<?php 

include "inc/admin/footer.php";

 ?>