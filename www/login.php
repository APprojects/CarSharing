<?php
	$campi = array(
	  'role' => ($_POST['Roles']),
	  'user' => ($_POST['User']),
	  'password' => ($_POST['Password'])
	);



	if (empty($campi['user']) && empty($campi['password'])){
		header ("location: index.php?error_login=".urlencode('user name and password not entered'));
	}else if (empty($campi["user"])){
		header ("location: index.php?error_login=".urlencode('user name not entered'));
	}else if  (empty($campi["password"])){
		header ("location: index.php?error_login=".urlencode('password not entered'));
	}

	else {
		
		// trasformo la mia array in JSON
		$dati = json_encode($campi);

		// inizializzo curl
		$ch = curl_init();
		
		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/read_single.php');
		
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

		if(!is_null($response['id'])){
			session_start();
			$_SESSION['id'] 			= $response['id'];
			$_SESSION['firstName'] 		= $response['firstName'];
			$_SESSION['lastName'] 		= $response['lastName'];
			$_SESSION['userName'] 		= $response['userName'];
			$_SESSION['password'] 		= $response['password'];
			$_SESSION['address'] 		= $response['address'];
			$_SESSION['city'] 			= $response['city'];
			$_SESSION['state'] 			= $response['state'];
			$_SESSION['gender'] 		= $response['gender'];
			$_SESSION['prefix'] 		= $response['prefix'];
			$_SESSION['phoneNumber'] 	= $response['phoneNumber'];
			$_SESSION['role'] 			= $response['role'];

			if($_SESSION['role']== 1)
				header("location: welcomeSeller.php");
			else if($_SESSION['role'] == 0)
				header("location: welcomeCustomer.php");
		}

		else {
			header("location: index.php?error_login=".urlencode('user not registered'));

		}
	}

			
?>
