<?php
session_start();
	echo "Hello <br>" . $_SESSION['firstname'] . " " . $_SESSION['lastname'];

	echo "<a href='logout.php'>LOGOUT</a>";	
?>
