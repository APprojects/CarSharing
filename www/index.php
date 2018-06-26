<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Traveler &mdash; Free Website Template, Free HTML5 Template by GetTemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	
	<!-- LOGIN FORM -->
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="./js/login.js"></script>
		
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">ESharing <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="destination.html">Travel with us</a></li>
						<li><a href="basements.html">Basements</a></li>
						<li><a href="pricing.html">Pricing</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style=" background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
					<div class="row row-mt-15em ">
						<div  class=" col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1 >No manteinance,</h1>
							<h1>no CO<sub>2</sub> emissions.</h1>
							<h1>It's high time to trip.</h1>	
						</div>
						<div id="error_login" class="errors">
	                    								<?php
	                    								  
	                    								  if(isset($_GET['error_login'])){
	                    								    echo "ERROR: " . $_GET['error_login'];
	                    								  }
	                    								?>
														</div>
						
						<div id="error_reg" class="errors">
																<?php
											  
		                        									  if(isset($_GET['error_registration'])){
		                        									    echo "ERROR: " . $_GET['error_registration'];
		                        									  }
								                                 ?>
						                           				</div> 
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<div class="row">
												<div class="col-xs-6">
													<button class="btn btn-secondary" onclick="function1()">Login</button>
												</div>
												<div class="col-xs-6">
													<button class="btn btn-secondary" onclick="function2()">Register</button>
												</div>
											</div>
											<form id="login-form" action="login.php" method="post" role="form" style="display: block;">
												<div class="form-group">
													<label for="role" id="labRole">Select Role:</label>
	  												<select class="form-control" id="inputRole" name="RolesL">
	    											<option value="0">Customer</option>
	    											<option value="1">Seller</option>
	    											</select>
												</div>
												<div class="form-group">
													<label for="user" id=labelUser1>User</label>
		   											<input class="form-control" id="inputUser1" placeholder="Enter user name" name="UsernameL">
											
												</div>
												<div class="form-group">
													<label for="password">Password</label>
								    				<input type="password" class="form-control" id="inputPassword1" placeholder="Enter password" name="PasswordL">
													<div class="row">
														<div class="col-sm-6 col-sm-offset-3">
															<input type="submit" class="btn btn-primary" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Enter">
														</div>
														
													</div>
												</div>
											</form>
										</div></div>
											<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">	
											<form action="sign-up.php" method="post" id="register-form" role="form" style="display: none;">
												<div class="form-group">
													<label for="role">Select Role:</label>
                	  						 			<select class="form-control" id="inputRole" name="RolesR">
                	    									<option value="0">Customer</option>
                	    									<option value="1">Seller</option>
                	    					 			</select>
												</div>
												<div class="form-group">
													<label for="firstname1">First Name</label>
				   									<input class="form-control" id="inputFirstName1" placeholder="Enter first name" name="FirstNameR">
												</div>
												<div class="form-group">
													<label for="lastname1">Last Name</label>
				   									<input class="form-control" id="inputLastName1" placeholder="Enter last name" name="LastNameR">
												</div>
												<div class="form-group">
													<label for="user" id=labelUser>User</label>
				   									<input class="form-control" id="inputUser" placeholder="Choose a user name" name="UsernameR">
												</div>
												<div class="form-group">
													<label for="password">Password</label>
								    				<input type="password" class="form-control" id="inputPassword" placeholder="Choose a password" name="PasswordR">
												</div>
												<div class="form-group">
													<label for="address" id="labelAddress">Address</label>
								    				<input class="form-control" id="inputAddress" placeholder="Enter Address" name="AddressR">
												</div>
												<div class="form-group">
													<label for="city" id="labelCity">City</label>
								    				<input class="form-control" id="inputCity" placeholder="Enter City" name="CityR">
												</div>
												<div class="form-group">
													<label for="state" id="labelState">State</label>
								    				<input class="form-control" id="inputState" placeholder="Enter State" name="StateR">
												</div>
												<div class="form-group">
													<label for="gender">Gender:</label>
                      								<select class="form-control" id="inputGender" name="GenderR">
	                        							<option>M</option>
	                        							<option>F</option>
                        							</select>
												</div>
												<div class="form-group row">
													<div class="col-sm-2">
		                		    					<label for="prefix1" id="labelPrefix">Prefix</label>
		                		   						<input class="form-control" id="inputPrefix1" placeholder="Enter Prefix" name="PrefixR">
			   										</div>
				   									<div class="col-sm-4">	
		                		   						<label for="number" id="labelNumber">Number</label>
		                		   						<input class="form-control" id="inputNumber" placeholder="Enter Number" name="NumberR">
				 									</div>
	 											</div>	
												<div class="form-group">
													<div class="row">
														<div class="col-sm-6 col-sm-offset-3">
															<input type="submit" class="btn btn-primary" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
																    
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
		
		</div></div>
	</header>
					

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>Have you ever think about renting a car to go wherever you want? Maybe, but the environment would suffer for this choice. Problem solved, with ESharing you travel with no difficulty being planet-friendly.  </p>
					</div>
				</div>

			
				<div class="col-md-3 col-md-push-1">

						
					<div class="gtco-widget">
						<h3>
							<i class="fa fa-android" style="font-size:50px;"></i>
							
						</h3>
						<h3>Download ESharing App from the AppStore!</h3>
					</div>
				</div>
				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@esharing.com</a></li>
							
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2018 Free HTML5. All Rights Reserved.</small>
					</p>
					
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	
	
	<script>
	function function1(){
		document.getElementById("register-form").style.display="none";
		document.getElementById("login-form").style.display="block";
	}

</script>
<script>
	function function2(){
		document.getElementById("register-form").style.display="block";
		document.getElementById("login-form").style.display="none";
	}

</script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

