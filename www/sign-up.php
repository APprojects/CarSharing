<?php

	$campi1 = array(
	  'roles1' => ($_POST['Roles']),
	  'fname' => ($_POST['FirstName']),
	  'lname' => ($_POST['LastName']),
	  'uname' => ($_POST['UserName']),
	  'pword' => ($_POST['Password1']),
	  'address' => ($_POST['Address']),
	  'city' => ($_POST['City']),
	  'state' => ($_POST['State']),
	  'gender' => ($_POST['Gender']),
	  'prefix' => ($_POST['Prefix']),
	  'number' => ($_POST['Number'])
	  
	);

/*	print "roles : "  . $campi['roles'] . "<br>";
	print "user : "  . $campi['user'] . "<br>";
	print "password : "  . $campi['password'] . "<br>";*/

if (((empty($campi["fname"])) || (empty($campi["lname"]))) || ((empty($campi["uname"])) || (empty($campi["pword"]))) || ((empty($campi["address"])) || (empty($campi["city"]))) || ((empty($campi["state"])) || (empty($campi["gender"]))) || ((empty($campi["prefix"])) || (empty($campi["number"])))) {	
	/*$error_message = "non è stato inserito: <br>";

	if ((empty($campi['user'])))	{	
		$a = "lo user";
		$error_message .=  $a . "<br>";
	}
	if ((empty($campi['password'])))	{
		$b = "la password";
		$error_message .= $b . "<br>";
	}	
	echo $error_message;*/
	header ("location: index.php");
//	header('Location: http://www.example.com/');
}



else {
	echo "ciao";
	session_start();
	$_SESSION['roles1'] = $campi['roles1'];
	$_SESSION['fname'] = $campi['fname'];
	$_SESSION['lname'] = $campi['lname'];
	$_SESSION['uname'] = $campi['uname'];
	$_SESSION['pword'] = $campi['pword'];
	$_SESSION['address'] = $campi['address'];
	$_SESSION['city'] = $campi['city'];
	$_SESSION['state'] = $campi['state'];
	$_SESSION['gender'] = $campi['gender'];
	$_SESSION['prefix'] = $campi['prefix'];
	$_SESSION['number'] = $campi['number'];
	
	header("location: new_user.php");
	// trasformo la mia array in JSON
		$dati = json_encode($campi1);

		// inizializzo curl
		$ch = curl_init();

		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/create.php');

		// preparo l'invio dei dati col metodo POST
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dati1);

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
		curl_close($ch);
}

   


	
			
?>