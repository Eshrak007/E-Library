	<!-- Sidebar -->
	<div class="sidebar sidebar-style-2" data-background-color="dark2">
		<div class="sidebar-wrapper scrollbar scrollbar-inner">
			<div class="sidebar-content">
				
				<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="dashboard.php" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<?php 
						if($_SESSION['user_role']==1){
							?>

							<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Libray Functionality</h4>
						</li>
						
						<!-- category -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Category</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="category.php?do=manage">
											<span class="sub-item">Manage Category</span>
										</a>
									</li>
									<li>
										<a href="category.php?do=add">
											<span class="sub-item">Add Category</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- books -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Books</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="books.php?do=manage">
											<span class="sub-item">Manage Books</span>
										</a>
									</li>
									<li>
										<a href="books.php?do=add">
											<span class="sub-item">Add Books</span>
										</a>
									</li>
									<li>
										<a href="booked_req.php">
											<span class="sub-item">Total Booked</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- Users section -->
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">User Management</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Users</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="users.php?do=manage">
											<span class="sub-item">Manage All Users</span>
										</a>
									</li>
									<li>
										<a href="users.php?do=add">
											<span class="sub-item">Add Users</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

					<?php

						}

						 ?>
						
					</ul>
			</div>
		</div>
	</div>
	<!-- End Sidebar -->