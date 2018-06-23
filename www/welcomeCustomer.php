<?php
	session_start();
	echo "Welcome " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "!";
	
?>		


<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Traveler &mdash; Free Website Template, Free HTML5 Template by GetTemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style1.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div class="row form-group">
				<div class="col-md-12">
					<button type="button" id="blogout" class="btn btn-info" onclick="go_home()" value="Log Out">Log Out</button>
				</div>
		</div>
		<div id="book">
					<div  class="col-md-push-1  animate-box" data-animate-effect="fadeInRight">
								<div class="form-wrap">
									<div class="tab">
										
										<div class="tab-content">
											<div class="tab-content-inner active" data-content="signup">
												<h3>Book Your Electric Car!</h3>
												<form action="order.php">
													
													<div class="row form-group">
														<div class="col-md-12">
															<label for="sourceBasement">Source Basement</label>
															<select name="#" id="sourceBasement" class="form-control" name="sbase">
																<option value="">source basement</option>
																<option value="">O'Connell Street</option>
																<option value="">Temple Bar</option>
																<option value="">Clontarf</option>
																<option value="">Ballsbridge</option>
																<option value="">Rathmines</option>
																<option value="">S.Patrick's Cathedral</option>
																<option value="">Docklands</option>
															</select>
														</div>
													</div>
													<!-- <div class="row form-group">
														<div class="col-md-12">
															<label for="date-start">Pickup day</label>
															<input type="text" id="date-start" class="form-control">
														</div>
													</div> -->

													<!-- Date input -->
													<div class="form-group"> 
												        <label class="control-label" for="date-start">Pickup day</label>
												        <input class="form-control" id="date-start" name="date-start" type="text"/>
											      	</div>

			
	 												<div class="row form-group">
														<div class="col-md-12">
															<label for="WTime">Time of Withdrawal</label>
															<select name="wtime" id="WTime" class="form-control">
																<option value="">00</option>
																<option value="">01</option>
																<option value="">02</option>
																<option value="">03</option>
																<option value="">04</option>
																<option value="">05</option>
																<option value="">06</option>
																<option value="">07</option>
																<option value="">08</option>
																<option value="">09</option>
																<option value="">10</option>
																<option value="">11</option>
																<option value="">12</option>
																<option value="">13</option>
																<option value="">14</option>
																<option value="">15</option>
																<option value="">16</option>
																<option value="">17</option>
																<option value="">18</option>
																<option value="">19</option>
																<option value="">20</option>
																<option value="">21</option>
																<option value="">22</option>
																<option value="">23</option>
															</select>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="destination">Destination Basement</label>
															<select name="dbase" id="destinationBasement" class="form-control">
																<option value="">O'Connell Street</option>
																<option value="">Temple Bar</option>
																<option value="">Clontarf</option>
																<option value="">Ballsbridge</option>
																<option value="">Rathmines</option>
																<option value="">S.Patrick's Cathedral</option>
																<option value="">Docklands</option>
															</select>
														</div>
													</div>
													
													<!-- Date input -->
													<div class="form-group"> 
												        <label class="control-label" for="date-end">Delivery day</label>
												        <input class="form-control" id="date-end" name="date-end" type="text"/>
											      	</div>
	   
													<div class="row form-group">
														<div class="col-md-12">
															<label for="DTime">Delivery Time</label>
															<select name="dtime" id="DTime" class="form-control">
																<option value="">Delivery Time</option>
																<option value="">00</option>
																<option value="">01</option>
																<option value="">02</option>
																<option value="">03</option>
																<option value="">04</option>
																<option value="">05</option>
																<option value="">06</option>
																<option value="">07</option>
																<option value="">08</option>
																<option value="">09</option>
																<option value="">10</option>
																<option value="">11</option>
																<option value="">12</option>
																<option value="">13</option>
																<option value="">14</option>
																<option value="">15</option>
																<option value="">16</option>
																<option value="">17</option>
																<option value="">18</option>
																<option value="">19</option>
																<option value="">20</option>
																<option value="">21</option>
																<option value="">22</option>
																<option value="">23</option>
															</select>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="chooseModel">Choose Model</label>
															<select name="model" id="chooseModel" class="form-control">
																<option value="">choose model</option>
																<option value="">Smart EQ fortwo </option>
																<option value="">Nissan LEAF</option>
																<option value="">Renault Zoe</option>
																<option value="">Renault Twizy</option>
																<option value="">Toyota Yaris</option>
																<option value="">Toyota c-hr</option>
																<option value="">Kia Niro</option>
															</select>
														</div>
													</div>
													

													<div class="row form-group">
														<div class="col-md-12">
															<input type="submit" class="btn btn-primary btn-block" value="Submit">
														</div>
													</div>
												</form>	
											</div>

											
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>

	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

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

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
	    $(document).ready(function(){
	        var date_input=$('input[name="date-start"]'); //our date input has the name "date"
	        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	        date_input.datepicker({
	            format: 'mm/dd/yyyy',
	            container: container,
	            
	            autoclose: true,
	        })
	    })
	</script>
	<script>
	    $(document).ready(function(){
	        var date_input=$('input[name="date-end"]'); //our date input has the name "date"
	        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	        date_input.datepicker({
	            format: 'mm/dd/yyyy',
	            container: container,
	            
	            autoclose: true,
	        })
	    })
	</script>
	<script>
		function go_home(){
			location.href = "logout.php";
		}
	</script>	

</body>	
	


</html>
