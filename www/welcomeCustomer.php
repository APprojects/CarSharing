<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ESHARING</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ESHARING" />
	<meta name="author" content="Approjects" />

  	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Bootstrap  -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	
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
	
	<!-- DATE PICKER DEPENDENCES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<!-- DATE PICKER DEPENDENCES -->
	
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>
	<?php
		
		include_once("./utilityFunctions.php");
	?>
	<?php
		echo '<div class="welcome">';
			echo "Welcome " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "!";
		echo '</div>';
	?>
	
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
								<form action="welcomeCustomer.php" method="post">
									<div class="row form-group">
										<div class="col-md-12">
											<label for="sourceBasement">Source Basement</label>
											<select id="sourceBasement" class="form-control" name="sbase">
    											<?php
    												foreach(getBasements()['basements'] as &$basement){
    													echo "<option value='" . $basement['id'] . "'>" . $basement['name'] . "</option>\n";
    												}
    											?>
											</select>
										</div>
									</div>

									<!-- Date input -->
									<div class="form-group"> 
								        <label class="control-label" for="date-start">Pickup and Delivery </label>
								        <input class="form-control" id="date-start" name="date-start" type="text"/>
							      	</div>
									<div class="row form-group">
										<div class="col-md-12">
											<label for="destination">Destination Basement</label>
											<select name="dbase" id="destinationBasement" class="form-control">
												<?php
													foreach(getBasements()['basements'] as &$basement){
													    echo "<option value='" . $basement['id'] . "'>" . $basement['name'] . "</option>\n";
													}
											     ?>
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
		
		<?php 
		
		foreach ($_POST['date-start'] as &$data){
		    echo $data;
		}
		if(isset($_POST['sbase'])){
		    echo '<div class="box-body">';
		    $historys = getHistorys()['historys'];
		    if(count($historys)>0){
				foreach ($historys as &$history){
				    if(!strcmp($history['idBasementEnd'], $_POST['sbase'])){
    		            echo '<div class="col-sm-5 col-xs-6 tital " >' . $history['model'] . '</div>';
    	                echo '<div class="clearfix"></div>';
    	                echo '<div class="bot-border"></div>';
    		        }
    		    }
		    }else{
		        echo "Sorry, there aren't car in this base";
		    }
		    echo '</div>';
		}
		
		?>

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
		</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>

	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
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

	
	<!-- DATE PICKER DEPENDENCES -->
 	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- DATE PICKER DEPENDENCES -->
    
    <!-- Main -->
 	<script src="js/main.js"></script>
	<script>

		
	     //DATE PICKER CONFIGURATIONS
     /*   var start = new Date();
     	// set end date to max one year period:
     	var end = new Date(new Date().setYear(start.getFullYear()+1));
     
    	$('#date-start').datepicker({
    		startDate : start,
        	endDate   : end
        	// update "toDate" defaults whenever "fromDate" changes
    	}).on('changeDate', function(){
    	    // set the "toDate" start to not be later than "fromDate" ends:
    	    $('#date-end').datepicker('setStartDate', new Date($(this).val()));
    	});
    
    	$('#date-end').datepicker({
    	    startDate : start,
    	    endDate   : end
    	// update "fromDate" defaults whenever "toDate" changes
    	}).on('changeDate', function(){
    	    // set the "fromDate" end to not be later than "toDate" starts:
    	    $('#date-start').datepicker('setEndDate', new Date($(this).val()));
    	});
    */	//END DATE PICKER CONFIGURATIONS
    
	</script>
	<script>
		function go_home(){
			location.href = "logout.php";
		}
	</script>	

</body>	
	


</html>
