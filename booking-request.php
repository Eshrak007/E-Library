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
<section>
	<div class="container">
		<div class="row">
			<?php 

			if (isset($_GET['booking'])) {
				$book_id=$_GET['booking'];
				$user_id=$_SESSION['user_id'];
				$bookQuery="SELECT * FROM books WHERE book_id='$book_id'";
				$passbook=mysqli_query($con,$bookQuery);
				while($row=mysqli_fetch_assoc($passbook)){
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
               <div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h2 style="color: black;text-align: center;margin-bottom: 20px;margin-top: -40px;"><?php echo $book_name; ?></h2>
						<p class="text-center">Author name: <?php echo $author_name; ?></p>
					</div>
				</div>
				<form action="" method="POST">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label>Name</label>
							<input type="text" name="fullname" class="form-control" style="border: 1px solid #4d9a22c2;" autocomplete="off" value="<?php echo $_SESSION['fullName']; ?>" disabled="disabled">
							</div>
							<div class="form-group">
							<label>Email</label>
							<input type="Email" name="email" class="form-control" style="border: 1px solid #4d9a22c2;" autocomplete="off" value="<?php echo $_SESSION['email']; ?>" disabled="disabled">
							</div>
							<div class="form-group">
							<label>Number of Books</label>
							<input type="text" name="quantity" class="form-control" style="border: 1px solid #4d9a22c2;" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Issue date</label>
								<input type="date" name="issue_date" class="form-control" style="border: 1px solid #4d9a22c2;">
							</div>
                          <div class="form-group">
								<label>Return date</label>
								<input type="date" name="return_date" class="form-control" style="border: 1px solid #4d9a22c2;">
							</div>
						</div>
						<div class="col-md-12 text-center">
						<input type="submit" name="book" class="btn btn-success" value="Confirm Booking">
						</div>
					</div>
				</form>
			</div>


                    <?php
				}
				if(isset($_POST['book'])){
					$quantity=mysqli_real_escape_string($con,$_POST['quantity']);
					$issue=$_POST['issue_date'];
					$return=$_POST['return_date'];

					$new_book_number=$book_quatity-$quantity;
					

					$updatebook="UPDATE books SET book_quatity='$new_book_number' WHERE book_id='$book_id'";
					$passupdate=mysqli_query($con,$updatebook);

					$issueQuery="INSERT INTO booking_request(user_id,category_id,book_id,quantity,issue_date,return_date)VALUES('$user_id','$category_id','$book_id','$quantity','$issue','$return')";
					$passissue=mysqli_query($con,$issueQuery);
					if($passissue){
						echo '<div class="alert alert-info text-center">Booking Process Completed.Collect your Books from Library.</div>';
						?>
						<a href="index.php" class="btn btn-success text-center">Home Page</a>
						<?php
					}else{
						die("operation failed".mysqli_error($con));
					}
				}
			}

			 ?>
			
		</div>			
	</div>
</section>
        <?php 
        include "inc/footer.php";

         ?>

