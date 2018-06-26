<?php session_start();?>

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
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/style.css">

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
	
    	<nav class="gtco-nav" role="navigation">
    		<div class="gtco-container">
    			
    			<div class="row" id="logoW">
    				<div class="col-sm-4 col-xs-12">
    					<div id="gtco-logo"><a href="index.php">ESharing <em>.</em></a></div>
    				</div>
    			</div>
    			
    			<div class="row">
    				<div class="col-xs-12 menu-1" >
    						
    					 <button type="button" id="car" class="btn btn-info" onclick="go_car()" value="Car">Car</button>
    					<button type="button" id="updateU" class="btn btn-info" onclick="updateU()" value="Update User">Update User</button>
    					 <button type="button" id="deleteU" class="btn btn-info" onclick="deleteU()" value="Delete User">Delete User</button>
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
   				<div class="panel-body" id="bodyP">
       
    				<div class="box box-info">
        
            			<div class="box-body">
                    		
            				<div class="clearfix"></div>
            				
    
              
							
						<?php
						$basements = getBasements()['basements'];
						  if(!is_null($basements)){
							foreach($basements as &$basement){
								    
								    if($basement['seller']==$_SESSION['id']){
								       
								    
								        echo '<div>
                                                <div class="col-sm-5 col-xs-6 tital">' 
	                                               . $basement['name'] . 
	                                           '</div>';
										echo '<div class="col-sm-7">'; 
                                        echo      '<button type="button"'.
                                                    ' id="deleteB" class="btn btn-info"'.
                                                    ' onclick="delete_basement('.$basement["id"].','.$_SESSION["id"].')"'. 
                                                      ' value="Delete Basement">Delete Basement</button>' ;
								        echo       '<button type="button"'.
												     ' id="updateB" class="btn btn-info"'.
												     ' onclick="update_basement('.$basement["id"].',\''.$basement["name"].'\',\''.$basement["address"].'\','.$_SESSION["id"].')" '.
                                                     ' value="Update Basement">Update Basement</button></div>';
								       echo         '
                                                    <div class="clearfix"></div><div class="bot-border"></div>';
								    }
							}}
							?>
							
							
							</div>
     						
                        <!-- /.box-body -->
          			</div>
          <!-- /.box -->

        		</div>
       		
    </div>

    
       
       <script  type="text/javascript">
    		function delete_basement(idB,idU){
    			location.href = "deleteB.php?idB="+idB+"&idU="+idU;
    		}
	   
    		function update_basement(idB,nameB,addB,idU){
    			location.href = "updateB.php?idB="+idB+"&nameB="+nameB+"&addB="+addB+"&idU="+idU;
    		}
		
    		function go_car(){
    			location.href = "goCar.php";
    		}
	
    		function go_home(){
    			location.href = "index.php";
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