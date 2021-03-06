	
	<?php 
		include("config.php");
	    session_start(); 
	    
	    if($_SERVER["REQUEST_METHOD"] == "POST") {
		    $username = $_POST['user_name'];
		    $password = $_POST['password'];
		    $firstname = $_POST['first_name'];
		    $midname = $_POST['mid_name'];
		    $lastname = $_POST['last_name'];
		    $email = $_POST['EMAIL'];
		    $gender = $_POST['gender'];
		    $preferred_jobtitle = $_POST['preferred_jobtitle'];
		    $current_jobtitle = $_POST['current_jobtitle'];
		    $address = $_POST['address'];
		    $qualification = $_POST['qualifications'];
		    $check = mysqli_query($db,"INSERT INTO user VALUES ('$username','$password')");
		    if($check){
		    	$result = mysqli_query($db,"SELECT * FROM jobseeker WHERE email= '$email'");
		    	if($result !== false){
		    		if(mysqli_num_rows($result) === 1){
			    		mysqli_query($db,"DELETE FROM user WHERE user_name = '$username'");
			    		echo "<script type='text/javascript'>alert('This email is already used!');</script>";
		    		}
		    		else{
		    			//Download pdf, change name and add it to jobseeker
		    			if( $_FILES['cv_pdf']['name'] != "" ){
		    				$temp_pdf_name = $_FILES['cv_pdf']['tmp_name'];
							move_uploaded_file($temp_pdf_name,"cvs/". $username. ".pdf");
		    			}
		    			mysqli_query($db,"CALL insert_jobseeker ('$firstname','$midname','$lastname','$email','$qualification','$preferred_jobtitle','$gender','$address','$current_jobtitle','$username')");
		    		}
		    	}
		    	
			}else
			{
				echo "<script type='text/javascript'>alert('This username is already used!');</script>";
			}
		}
    ?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Job Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.html">Home</a></li>
				          <li><a href="about-us.html">About Us</a></li>
				          <li><a href="category.html">Category</a></li>
				          <li><a href="contact.html">Contact</a></li>
				          </li>
				          <li><a class="ticker-btn" href="login/index.php">Login</a></li>				          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<p class="text-white link-nav"> 
								<span class="lnr lnr-apartment"></span>
								<a href="signupcompany.php"> <font size = "4">Sign Up as Company</font></a>
								<span class="lnr lnr-user"></span>
								<a href="signupuser.php"> <font size = "4">Sign Up as User</font></a>
							</p>
						</div>											
					</div>
				</div>
			</section>
			<div class="whole-wrap">

				<div class="container">

					<div class="section-top-border">

						<div class="row">
							<div class="col-lg-8 col-md-8">
							<h3 class="mb-30">User Sign Up</h3>
								<form action="#" method="post" enctype = "multipart/form-data">
									<div class="mt-10">
										<input type="text" name="user_name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="mid_name" placeholder="Middle Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mid Name'"  class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="preferred_jobtitle" placeholder="Preferred Job Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Preferred Job Title'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="current_jobtitle" placeholder="Current Job Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Current Job Title'" required class="single-input">
									</div>
									<div class="mt-10">
										<p><input type="file" name="cv_pdf" placeholder="Upload CV" accept="application/pdf">Upload your CV</p>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="gender" required>
												<option value="" disabled selected>Gender</option>
												<option value="MAN">Man</option>
												<option value="WOMAN">Woman</option>
												<option value="OTHER">Other</option>
											</select>
										</div>
									</div>
									<div class="mt-10">
										<input type="text" name="qualifications" placeholder="Qualifications" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Qualifications'" required class="single-input-accent">
									</div>
									<div class="button-group-area mt-10">
										<button type='submit' class="genric-btn primary-border e-large">Sign Up</button>
									</div>
								</form>
							</div>
							<div class="col-lg-3 col-md-4 mt-sm-30">
								<div class="single-element-widget">
								</div>
								<div class="single-element-widget mt-30">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">				
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->


			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/mail-script.js"></script>				
			<script src="js/main.js"></script>	
			<script type="text/javascript">
				if ( window.history.replaceState ) {
			        window.history.replaceState( null, null, window.location.href );
			    }
			</script>
		</body>
	</html>