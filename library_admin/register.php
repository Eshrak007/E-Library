<?php
include "inc/auth/header.php";

?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
					<div class="wrap-input100">
						<input class="input100" type="text" name="fullName" required="required">
						<span class="focus-input100" data-placeholder="Full Name"></span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="text" name="userName" required="required">
						<span class="focus-input100" data-placeholder="User Name"></span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="email" required="required"
						autocomplete="off"><span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required="required">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="repassword" required="required">
						<span class="focus-input100" data-placeholder="Retype-Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="register">
								Signin
							</button>
						</div>
					</div>
					<div class="text-center p-t-115">
						<span class="txt1">
							Already have account?
						</span>

						<a class="txt2" href="index.php">
							Log in
						</a>
					</div>
				</form>
<!-- /.register-box -->
	<?php 

	  if(isset($_POST['register'])){
	    $fullName          =mysqli_real_escape_string($con,$_POST['fullName']);
	    $userName          =mysqli_real_escape_string($con,$_POST['userName']);
	    $email             =$_POST['email'];
	    $password          =mysqli_real_escape_string($con,$_POST['password']);
	    $repassword        =mysqli_real_escape_string($con,$_POST['repassword']);

	    if($password==$repassword){
	      $hashpass=sha1($password);
	      $regQuery="INSERT INTO user (fullname,username,email,password,join_date) VALUES ('$fullName','$userName','$email','$hashpass',now())";
	      $passregQuery=mysqli_query($con,$regQuery);
	       if($passregQuery){
	          header("Location:index.php");
	       }else{
	          die("operation failed" . mysqli_error($con));

	      }

	    }else{
	       echo '<div class="alert alert-danger margin_alert text-center">Password and ReType Password didn\'t match. Registration failed.</div>';
	    }
	  }


	 ?>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<?php 

include "inc/auth/footer.php";
 ?>