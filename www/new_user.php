<?php
	session_start();
	echo "Hello <br>" . $_SESSION['fname'] . " " . $_SESSION['lname'];

	echo "<a href='logout.php'>LOGOUT</a>";	
?>
