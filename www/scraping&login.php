<?php
	//call handler
 	$ch = curl_init();

 	//options
 	curl_setopt($ch, option: CURLOPT_URL, value:"https://www.google.com/search?q=pusheen+the+cat");
 	curl_setopt($ch, option:CURLOPT_FOLLOWLOCATION, value: 1);
 	curl_setopt($ch, option:CURLOPT_RETURNTRANSFER, value:1);

 	// let's make a test
 	$response = curl_exec($ch);
 	curl_close($ch);

 	echo $response;
?>