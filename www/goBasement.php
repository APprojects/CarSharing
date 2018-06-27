<?php 
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!=1){
    header('Location: login.php');
    exit();
}?>

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
	
	<!-- NavBar -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">ESharing <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
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
                                                    ' class="btn btn-info deleteB"'.
                                                    ' onclick="delete_basement('.$basement["id"].','.$_SESSION["id"].')"'. 
                                                      ' value="Delete Basement">Delete Basement</button>' ;
								        echo       '<button type="button"'.
												     'class="btn btn-info updateB"'.
												     ' onclick="update_basement('.$basement["id"].',\''.$basement["name"].'\',\''.$basement["address"].'\','.$_SESSION["id"].')" '.
												     ' value="idB   : \''.$basement["id"]      .'\','.
												     'nameB: \''.$basement["name"]    .'\','.
												     'addB : \''.$basement["address"] .'\','.
												     'idU  : \''.$_SESSION["id"]      .'\'">Update Basement</button></div>';
								        echo         '</div><div class="clearfix"></div><div class="bot-border"></div>';    
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
    			
    		    if (confirm("Are you sure you want to delete this basement?")) {
    		    	location.href = "deleteB.php?idB="+idB+"&idU="+idU;
    		    } else {
    		        location.href = "goBasement.php";
    		    }
    			
    		}
	   
    		function update_basement(idB,nameB,addB,idU){
    			location.href = "updateB.php?idB="+idB+"&nameB="+nameB+"&addB="+addB+"&idU="+idU;
    		}

    		function updateU(){
    			location.href = "updateU.php";
    		}

    		
		
    		function go_car(){
    			location.href = "goCar.php";
    		}
	
    		function go_home(){
    			location.href = "index.php";
    		}

    		/*$(document).ready(function(){
    		    $('.updateB').click(function(){
    		        var clickBtnValue = $(this).val();
    		        var url = 'updateB.php',
    		        data =  {clickBtnValue};
		        	
    		        $.post(url, {clickBtnValue}, function (response) {
    		            // Response div goes here.
    		            $('html').html(response);
    		        });
    		    });

    		});*/
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