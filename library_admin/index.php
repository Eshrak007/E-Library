<?php
include "inc/auth/header.php";

?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Login
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100">
						<input class="input100" type="email" name="email" required="required"
						autocomplete="off">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required="required">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="register.php">
							Sign Up
						</a>
					</div>
				</form>
	<!-- /.login-box -->
      <?php 
      /*log in code start*/
          if(isset($_POST['login'])){
            $logEmail   =mysqli_real_escape_string($con, $_POST['email']);
            $logpass    =mysqli_real_escape_string($con, $_POST['password']);

            $loghashpass=sha1($logpass);
            $log_query= "SELECT * FROM user WHERE email='$logEmail' AND status=1 AND password='$loghashpass'";
            $passlogQuery=mysqli_query($con,$log_query);
            $count=mysqli_num_rows($passlogQuery);
            if ($count>0) {
              while ($row=mysqli_fetch_array($passlogQuery)) {
               $_SESSION['user_id']      =$row['user_id'];
               $avater                   =$row['avater'];
               $_SESSION['fullName']     =$row['fullname'];
               $_SESSION['userName']     =$row['username'];
               $_SESSION['email']        =$row['email'];
               $phone                    =$row['phone'];
               $password                 =$row['password'];
               $_SESSION['user_role']    =$row['user_role'];
               $_SESSION['status']       =$row['status'];
               $join_date                =$row['join_date'];
                if($_SESSION['email'] == $logEmail && $password == $loghashpass ){
                  header("Location:dashboard.php");
                }
                else if($_SESSION['email'] != $logEmail || $password != $loghashpass){
                  header("Location:index.php");
                }
                else{
                  header("Location:index.php");
                }
            }
          }else if($count<=0){
            $restat="SELECT * FROM user WHERE email='$logEmail' AND status=2 AND password='$loghashpass'";
            $passrestat=mysqli_query($con,$restat);
            $countr=mysqli_num_rows($passrestat);
            if($countr > 0){
                echo '<div class="alert alert-info mt-3">Wait for the admin approval.</div>';
              }else if($countr <= 0){
                echo '<div class="alert alert-danger mt-3">Invalid Email or Password.</div>';
              }
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