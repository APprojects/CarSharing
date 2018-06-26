<?php 
    session_start();
    
    $campi = array(
        'id' => $_SESSION['id'],
        'firstName' => $_SESSION['firstName'],
        'lastName' => $_SESSION['lastName'],
        'username' => $_SESSION['username'],
        'password' => $_SESSION['password'],
        'address' => $_SESSION['address'],
        'city' => $_SESSION['city'],
        'state' => $_SESSION['state'],
        'gender' => $_SESSION['gender'],
        'prefix' => $_SESSION['prefix'],
        'phoneNumber' => $_SESSION['phoneNumber'],
        'role' => $_SESSION['role']
    );
    
    include_once("./utilityFunctions.php");

    //controllo se sono settate le variabili post in caso affermativo faccio i controlli
    if(!empty($_POST['fname']) || !empty($_POST['lname'])
        ||!empty($_POST['uname']) || !empty($_POST['password'])
        || !empty($_POST['address']) || !empty($_POST['city'])
        || !empty($_POST['state']) || !empty($_POST['gender'])
        || !empty($_POST['prefix']) || !empty($_POST['phoneNumber'])){
        
        if(!empty($_POST['uname']))
            echo $_POST['uname'];
            
            $users = getUsers()['users'];
            
            if(!empty($_POST['uname'])){
                $campi['username'] = $_POST['uname'];
                foreach ($users as &$user){
                    if($campi['username'] == ($user['username'])){
                        echo "the username is already existing";
                        $campi['username']= $_SESSION['username'];
                        break;
                    }
                }
            }
            
            if(!empty($_POST['fname'])){
                $campi['firstName'] =$_POST['fname'];
            }
            if(!empty($_POST['lname'])){
                $campi['lastName'] =$_POST['lname'];
            }
            if(!empty($_POST['pword'])){
                $campi['password'] =$_POST['pword'];
            }
            if(!empty($_POST['addr'])){
                $campi['address'] =$_POST['addr'];
            }
            if(!empty($_POST['city'])){
                $campi['city'] =$_POST['city'];
            }
            if(!empty($_POST['state'])){
                $campi['state'] =$_POST['state'];
            }
            if(!empty($_POST['gender'])){
                $campi['gender'] =$_POST['gender'];
            }
            if(!empty($_POST['prefix'])){
                $campi['prefix'] =$_POST['prefix'];
            }
            if(!empty($_POST['pnum'])){
                $campi['phoneNumber'] =$_POST['pnum'];
            }
	                
	                
        // trasformo la mia array in JSON
        $dati = json_encode($campi);
        
        // inizializzo curl
        $ch = curl_init();
        
        // imposto la URl del web-service remoto
        curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/update.php');
        
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
        
        if(!is_null($response['id'])){
            $_SESSION['id'] 			= $response['id'];
            $_SESSION['firstName'] 		= $response['firstName'];
            $_SESSION['lastName'] 		= $response['lastName'];
            $_SESSION['username'] 		= $response['username'];
            $_SESSION['password'] 		= $response['password'];
            $_SESSION['address'] 		= $response['address'];
            $_SESSION['city'] 			= $response['city'];
            $_SESSION['state'] 			= $response['state'];
            $_SESSION['gender'] 		= $response['gender'];
            $_SESSION['prefix'] 		= $response['prefix'];
            $_SESSION['phoneNumber'] 	= $response['phoneNumber'];
            $_SESSION['role'] 			= $response['role'];
        }
        
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
	
    	<nav class="gtco-nav" role="navigation">
    		<div class="gtco-container">
    			
    			<div class="row" id="logoW">
    				<div class="col-sm-4 col-xs-12">
    					<div id="gtco-logo"><a href="index.php">ESharing <em>.</em></a></div>
    				</div>
    			</div>
    			
    			<div class="row">
    				<div class="col-xs-12 menu-1" >
    					<button type="button" id="basement" class="btn btn-info" onclick="go_basement()" value="Basement">Basement</button>	
    					 <button type="button" id="car" class="btn btn-info" onclick="go_car()" value="Car">Car</button>
    					
    				</div>
    			</div>
    		</div>	
    		
    	</nav>
	
		<header id="gtco-header1" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
			<div class="overlay"></div>
		</header>
    	

		<div class="panel panel-default" id="userPanel">
  				<div class="panel-heading" id="panelH">  
      				
      				<div class="row form-group">
    					<div class="col-md-12">
    						<button type="button" id="blogout" class="btn btn-info" onclick="go_home()" value="Log Out">Log Out</button>
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
										<h3>Update User's Information</h3>
											
											<form action="updateU.php" method="post">
												<div class="form-group">
													<div class="col-md-12">
														<label for="fname">First Name  (<?php echo $campi['firstName'];?>)</label>
														<input class="form-control" id="fname" placeholder="Change first name" name="fname">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="lname">Last Name  (<?php echo $campi['lastName'];?>)</label>
														<input class="form-control" id="lname" placeholder="Change last name" name="lname">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="uname">Username (<?php echo $campi['username'];?>)</label>
														<input class="form-control" id="uname" placeholder="Change username" name="uname">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="pword">Password (<?php echo $campi['password'];?>)</label>
														<input class="form-control" id="pword" placeholder="Change password" name="pword">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="addr">Address (<?php echo $campi['address'];?>)</label>
														<input class="form-control" id="addr" placeholder="Change address" name="addr">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="city">City (<?php echo $campi['city'];?>)</label>
														<input class="form-control" id="city" placeholder="Change city" name="city">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="state">State (<?php echo $campi['state'];?>)</label>
														<input class="form-control" id="state" placeholder="Change state" name="state">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="gender">Gender (<?php echo $campi['gender'];?>)</label>
														<select class="form-control" id="gender" name="gender">
    	                        							<option>M</option>
    	                        							<option>F</option>
                            							</select>
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="prefix">Prefix (<?php echo $campi['prefix'];?>)</label>
														<input class="form-control" id="prefix" placeholder="Change prefix" name="prefix">
    												</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label for="pnum">Phone Number (<?php echo $campi['phoneNumber'];?>)</label>
														<input class="form-control" id="pnum" placeholder="Change phone number" name="pnum">
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
		function go_home(){
			location.href = "index.php";
		}
	</script>   
    <script>
		function go_basement(){
			location.href = "goBasement.php";
		}
	</script>
	<script>
		function go_car(){
			location.href = "goCar.php";
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