<?php

	$campi = array(
	  'roles1' => ($_POST['Roles1']),
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


if (((empty($campi["fname"])) || (empty($campi["lname"]))) || ((empty($campi["uname"])) || (empty($campi["pword"]))) || ((empty($campi["address"])) || (empty($campi["city"]))) || ((empty($campi["state"])) || (empty($campi["gender"]))) || ((empty($campi["prefix"])) || (empty($campi["number"])))) {	
	
	$string_error ="";
	if ((empty($campi['fname'])))		
		$string_error .= " first name ";
	if ((empty($campi['lname'])))			
		$string_error .= " last name ";
	if ((empty($campi['uname'])))			
		$string_error .= " user name ";
	if ((empty($campi['pword'])))			
		$string_error .= " password ";
	if ((empty($campi['address'])))			
		$string_error .= " address ";
	if ((empty($campi['city'])))			
		$string_error .= " city ";
	if ((empty($campi['state'])))			
		$string_error .= " state ";
	if ((empty($campi['gender'])))			
		$string_error .= " gender ";
	if ((empty($camp1i['prefix'])))			
		$string_error .= " prefix ";
	if ((empty($campi['number'])))			
		$string_error .= " number ";

	$string_error .= "not entered";
	
	header ("location: index.php?error_registration=".urlencode($string_error));
	
}



else {
		session_start();
		// trasformo la mia array in JSON
		$dati = json_encode($campi);

		// inizializzo curl
		$ch = curl_init();

		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/create.php');

		// preparo l'invio dei dati col metodo POST
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dati);

		// imposto gli header correttamente
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json',
		  'Content-Length: ' . strlen($dati))
		);

		// eseguo la chiamata
		$response = json_decode(curl_exec($ch), true);
		dump_var($response);
		// chiudo
		curl_close($ch);
		
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
	
	//	header("location: new_user.php");
}

   


	
			
?>
