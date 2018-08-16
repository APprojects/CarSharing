<?php
	$campi = array(
	  'role' => ($_POST['RolesR']),
	  'firstName' => ($_POST['FirstNameR']),
	  'lastName' => ($_POST['LastNameR']),
	  'username' => ($_POST['UsernameR']),
	  'password' => ($_POST['PasswordR']),
	  'address' => ($_POST['AddressR']),
	  'city' => ($_POST['CityR']),
	  'state' => ($_POST['StateR']),
	  'gender' => ($_POST['GenderR']),
	  'prefix' => ($_POST['PrefixR']),
	  'phoneNumber' => ($_POST['NumberR'])
	);


	if (((empty($campi["firstName"])) || (empty($campi["lastName"]))) || ((empty($campi["username"])) || (empty($campi["password"]))) || ((empty($campi["address"])) || (empty($campi["city"]))) || ((empty($campi["state"])) || (empty($campi["gender"]))) || ((empty($campi["prefix"])) || (empty($campi["phoneNumber"])))) {	
	
		$string_error ="";
		if ((empty($campi['firstName'])))		
			$string_error .= " first name ";
		if ((empty($campi['lastName'])))			
			$string_error .= " last name ";
		if ((empty($campi['username'])))			
			$string_error .= " user name ";
		if ((empty($campi['password'])))			
			$string_error .= " password ";
		if ((empty($campi['address'])))			
			$string_error .= " address ";
		if ((empty($campi['city'])))			
			$string_error .= " city ";
		if ((empty($campi['state'])))			
			$string_error .= " state ";
		if ((empty($campi['gender'])))			
			$string_error .= " gender ";
		if ((empty($campi['prefix'])))			
			$string_error .= " prefix ";
		if ((empty($campi['phoneNumber'])))			
			$string_error .= " phoneNumber ";

		$string_error .= "not entered";
		
		header ("location: index.php?error_registration=".urlencode($string_error));
		
	}else {
		
		// trasformo la mia array in JSON
		$dati = json_encode($campi);

		// inizializzo curl
		$ch = curl_init();

		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'http://carsharingap.000webhostapp.com/server/api/user/create.php');

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

		// chiudo
		curl_close($ch);
		
		session_start();

		$_SESSION['role'] 		= $response['role'];
		$_SESSION['firstName'] 		= $response['firstName'];
		$_SESSION['lastName'] 		= $response['lastName'];
		$_SESSION['username'] 		= $response['username'];
		$_SESSION['password'] 		= $response['password'];
		$_SESSION['address'] 	= $response['address'];
		$_SESSION['city'] 		= $response['city'];
		$_SESSION['state'] 		= $response['state'];
		$_SESSION['gender'] 	= $response['gender'];
		$_SESSION['prefix'] 	= $response['prefix'];
		$_SESSION['phoneNumber'] 	= $response['phoneNumber'];
		$_SESSION['id'] 		= $response['id'];
		
		header("location: new_user.php");
	}		
?>
