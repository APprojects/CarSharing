<?php
	session_start();
	session_destroy();
	echo "you succesfully logout. click here to login again <a href='login.php'>login again</a>";

?>