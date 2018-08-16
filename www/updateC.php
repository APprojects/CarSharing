<?php 
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!=1){
    header('Location: login.php');
    exit();
}

    $campi = array(
        'id' => ($_GET['idC']),
        'model' => ($_GET['modC']),
        'maxSpeed' => ($_GET['spC']),
        'numberOfPassengers' => ($_GET['npC']),
        'seller' => ($_GET['idU'])
        
    );
    
    include_once("./utilityFunctions.php");
    
    //controllo se sono settate le variabili post in caso affermativo faccio i controlli
    if(!empty($_POST['model']) || !empty($_POST['maxs']) || !empty($_POST['noP'])){
        
        $cars = getCars()['cars'];
	    
	      if(!empty($_POST['model'])){
		      $campi['model'] =$_POST['model'];
		      
		  }
		  if(!empty($_POST['maxs'])){
		      $campi['maxSpeed'] =$_POST['maxs'];
		      
		  }
		  if(!empty($_POST['noP'])){
		      $campi['numberOfPassengers'] =$_POST['noP'];
		      
		  }
	     
        // trasformo la mia array in JSON
        $dati = json_encode($campi);
        
        // inizializzo curl
        $ch = curl_init();
        
        // imposto la URl del web-service remoto
        curl_setopt($ch, CURLOPT_URL, 'http://carsharingap.000webhostapp.com/server/api/car/update.php');
        
        // preparo l'invio dei dati col metodo POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dati);
        
        // imposto gli header correttamente
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($dati))
        );
        
        // eseguo la chiamata
        $response = json_decode(curl_exec($ch), true);
        var_dump($response);
        
        
        
        // chiudo
        curl_close($ch);    
    }
?>



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
	<meta name="author" content="GetTemplates.co" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
	
    	<!-- NavBar -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">ESharing <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="goBasement.php">Basements</a></li>
						<li><a href="goCar.php">Car</a></li>
						<li><a href="welcomeSeller.php">Personal Page</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	<!-- END NavBar -->
	
		<header id="gtco-header1" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
			<div class="overlay"></div>
		</header>
    	

		<div class="panel panel-default" id="userPanel">
  				<div class="panel-heading" id="panelH">  
      				
      				<div class="row form-group">
    					<div class="col-md-12">
    						<button type="button" id="blogout" class="btn btn-info logout" onclick="logout()" value="Log Out">Log Out</button>
    					<h4 style="color:#00b1b1;"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];?> </h4></span>
             					 <span><p><?php echo $_SESSION['username'];?></p></span></div>
    				</div>
    			</div>
   				<div class="container">
					<div  class="col-md-push-1  animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">
								<div class="tab-content">
									<div class="tab-content-inner active" id="baseInfo" data-content="signup">
										<h3>Update Car's Information</h3>
											
											<form action="updateC.php?idC=<?php echo $campi['id']."&modC=".$campi['model']."&spC=".$campi['maxSpeed']."&npC=".$campi['numberOfPassengers']."&idU=".$_GET['idU'];?>" method="post">
												<div class="form-group">
													<div class="col-md-12">
														<label for="model">Model  (<?php echo $campi['model'];?>)</label>
														<input class="form-control" id="model" placeholder="Change model" name="model">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="maxSpeed">Max Speed  (<?php echo $campi['maxSpeed'];?>)</label>
														<input class="form-control" id="maxSpeed" placeholder="Change max speed" name="maxs">
    												</div>
												</div>

            									<!-- Date input -->
            									<div class="form-group"> 
            									<div class="col-md-12">
								       				<label for="noP" style=" ">Number of Passengers  (<?php echo $campi['numberOfPassengers'];?>)</label>
								      				<input class="form-control" id="noP" placeholder="Change number of passengers" name="noP"/>
							      				</div>
							      				</div>
									
                								<div class="row form-group">
                									<div class="col-md-12">
                										<input type="submit" id ="updateBasement" class="btn btn-primary btn-block" value="Submit">
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

       
     <script>
		function logout(){
			location.href = "logout.php";
		}
	</script>   

       
       
       
       
   

	

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
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
	
	</body></html>