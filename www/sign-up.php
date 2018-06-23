<?php

	$campi1 = array(
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


if (((empty($campi1["fname"])) || (empty($campi1["lname"]))) || ((empty($campi1["uname"])) || (empty($campi1["pword"]))) || ((empty($campi1["address"])) || (empty($campi1["city"]))) || ((empty($campi1["state"])) || (empty($campi1["gender"]))) || ((empty($campi1["prefix"])) || (empty($campi1["number"])))) {	
	
	$string_error ="";
	if ((empty($campi1['fname'])))		
		$string_error .= " first name ";
	if ((empty($campi1['lname'])))			
		$string_error .= " last name ";
	if ((empty($campi1['uname'])))			
		$string_error .= " user name ";
	if ((empty($campi1['pword'])))			
		$string_error .= " password ";
	if ((empty($campi1['address'])))			
		$string_error .= " address ";
	if ((empty($campi1['city'])))			
		$string_error .= " city ";
	if ((empty($campi1['state'])))			
		$string_error .= " state ";
	if ((empty($campi1['gender'])))			
		$string_error .= " gender ";
	if ((empty($camp1i['prefix'])))			
		$string_error .= " prefix ";
	if ((empty($campi1['number'])))			
		$string_error .= " number ";

	$string_error .= "not entered";
	
	header ("location: index.php?error_registration=".urlencode($string_error));
	
}



else {
		session_start();
		// trasformo la mia array in JSON
		$dati1 = json_encode($campi1);

		// inizializzo curl
		$ch = curl_init();

		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/create.php');

		// preparo l'invio dei dati col metodo POST
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dati1);

		// imposto gli header correttamente
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json',
		  'Content-Length: ' . strlen($dati1))
		);

		// eseguo la chiamata
		$response = json_decode(curl_exec($ch), true);
		
		// chiudo
		curl_close($ch);
		
		$_SESSION['roles1'] = $campi1['roles1'];
		$_SESSION['fname'] = $campi1['fname'];
		$_SESSION['lname'] = $campi1['lname'];
		$_SESSION['uname'] = $campi1['uname'];
		$_SESSION['pword'] = $campi1['pword'];
		$_SESSION['address'] = $campi1['address'];
		$_SESSION['city'] = $campi1['city'];
		$_SESSION['state'] = $campi1['state'];
		$_SESSION['gender'] = $campi1['gender'];
		$_SESSION['prefix'] = $campi1['prefix'];
		$_SESSION['number'] = $campi1['number'];
	
	//	header("location: new_user.php");
}

   


	
			
?>