<?php
	session_start();
	echo "Hello <br>" . $_SESSION['fname'];

	echo "<a href='logout.php'>LOGOUT</a>";	
?>
