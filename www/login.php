<?php
	$campi = array(
	  'roles' => ($_POST['Roles']),
	  'user' => ($_POST['User']),
	  'password' => ($_POST['Password'])
	);

/*	print "roles : "  . $campi['roles'] . "<br>";
	print "user : "  . $campi['user'] . "<br>";
	print "password : "  . $campi['password'] . "<br>";*/

	if (empty($campi['user']) && empty($campi['password'])){
		header ("location: index.php?error_login=".urlencode('user name and password not entered'));
	}else if (empty($campi["user"])){
		header ("location: index.php?error_login=".urlencode('user name not entered'));
	}else if  (empty($campi["password"])){
		header ("location: index.php?error_login=".urlencode('password not entered'));
	}
	
	
//	header('Location: http://www.example.com/');




	else {
		
		// trasformo la mia array in JSON
			$dati = json_encode($campi);

			// inizializzo curl
			$ch = curl_init();

			// imposto la URl del web-service remoto
			curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/user/read_single.php');

			// preparo l'invio dei dati col metodo POST
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		//------mancava questa  : una volta letto il commento cancellalo
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $dati);

			// imposto gli header correttamente
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			  'Content-Type: application/json',
			  'Content-Length: ' . strlen($dati))
			);

			// eseguo la chiamata
			$response = json_decode(curl_exec($ch), true);

			//var_dump($response);
			//print( "ID: " . $response['id'] . " - Username: " . $response['userName']);
			// chiudo
			curl_close($ch);

			if(!is_null($response['id'])){
				session_start();
				$_SESSION['roles'] = $campi['roles'];
				$_SESSION['user'] = $campi['user'];
				$_SESSION['password'] = $campi['password'];
				$_SESSION['firstName'] = $response['firstName'];
				$_SESSION['lastName'] = $response['lastName'];

				if($_SESSION['roles']== 1)
					header("location: welcomeSeller.php");
				else if($_SESSION['roles'] == 0)
					header("location: welcomeCustomer.php");
			}
			
			else {
				header("location: index.php?error_login=".urlencode('user not registered'));

			}	
	}

			
?>