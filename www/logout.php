<?php
	session_start();
	session_destroy();
	header( "refresh:5;url=index.php" );
	print_r( "you succesfully logout. Wait 5 seconds or click here to go back to the <a href='login.php'>Home Page</a>");
	

?>