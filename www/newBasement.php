<?php 
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!=1){
    header('Location: login.php');
    exit();
}
    

    include_once("./utilityFunctions.php");
    if(isset($_POST['name'])){
        //controllo se sono settate tutte le variabili post in caso affermativo faccio i controlli
        if(!empty($_POST['name']) && !empty($_POST['address'])){
            
            $campi = array(
                
                'name'=>$_POST['name'], 
                'address'=>$_POST['address'], 
                'seller'=>$_SESSION['id']
                
            );
                 
            // trasformo la mia array in JSON
            $dati = json_encode($campi);
            
            // inizializzo curl
            $ch = curl_init();
            
            // imposto la URl del web-service remoto
            curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/basement/create.php');
            
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
            
            // chiudo
            curl_close($ch);    
        }
        
        else{
                $string_error ="";
                if ((empty($_POST['name']))){
                    $string_error .= " name ";
                }
                if ((empty($_POST['address']))){
                    $string_error .= " address ";
                }
                
                            
                $string_error .= "not entered";
                header ("location: newBasement.php?error_insertion_b=".urlencode($string_error));
                                                        
         
       }
    }
    

?>



<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ESharing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

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
										<h3>Add a new Basement!</h3>
											<div id="error_insertion_b" class="errors">
	                    								<?php
	                    								  
	                    								  if(isset($_GET['error_insertion_b'])){
	                    								    echo "ERROR: " . $_GET['error_insertion_b'];
	                    								  }
	                    								?>
												</div>
											<form action="newBasement.php" method="post">
												<div class="form-group">
													<div class="col-md-12">
														<label for="name">Name </label>
														<input class="form-control" id="name" placeholder="Enter name" name="name">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="address">Address </label>
														<input class="form-control" id="address" placeholder="Enter address" name="address">
    												</div>
												</div>
												
									
                								<div class="row form-group">
                									<div class="col-md-12">
                										<input type="submit" id ="newBasement" class="btn btn-primary btn-block" value="Submit">
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