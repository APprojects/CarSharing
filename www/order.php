<?php

	$campi = array(
	  'sbase' => ($_POST['sbase']),
	  'date-start' => ($_POST['date-start']),
	  'wtime' => ($_POST['wtime']),
	  'dbase' => ($_POST['dbase']),
	  'date-end' => ($_POST['date-end']),
	  'dtime' => ($_POST['dtime']),
	  'model' => ($_POST['model']),
	);

/*	print "roles : "  . $campi['roles'] . "<br>";
	print "user : "  . $campi['user'] . "<br>";
	print "password : "  . $campi['password'] . "<br>";*/

if (((empty($campi["sbase"])) || (empty($campi["date-start"]))) || ((empty($campi["wtime"])) || (empty($campi["dbase"]))) || ((empty($campi["date-end"])) || (empty($campi["dtime"]))) ||  (empty($campi["model"])))  {	

	header ("location: welcomeCustomer.php");
	
	
//	header('Location: http://www.example.com/');
}



else {
	$_SESSION['sbase'] 		= $campi['sbase'];
	$_SESSION['date-start'] = $campi['date-start'];
	$_SESSION['wtime'] 		= $campi['wtime'];
	$_SESSION['dbase'] 		= $campi['dbase'];
	$_SESSION['date-end'] 	= $campi['date-end'];
	$_SESSION['dtime'] 		= $campi['dtime'];
	$_SESSION['model'] 		= $campi['model'];
	

	header("location: new_order.php");
/*	// trasformo la mia array in JSON
		$dati = json_encode($campi);

		// inizializzo curl
		$ch = curl_init();

		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/read_single.php');

		// preparo l'invio dei dati col metodo POST
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dati);

		// imposto gli header correttamente
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json',
		  'Content-Length: ' . strlen($dati))
		);

		// eseguo la chiamata
		$response = json_decode(curl_exec($ch));

		echo $response;
		exit();

		// chiudo
		curl_close($ch);*/
}

			
?>