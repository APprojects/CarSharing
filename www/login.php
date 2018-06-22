<?php

	$campi = array(
	  'roles' => ($_POST['Roles']),
	  'user' => ($_POST['User']),
	  'password' => ($_POST['Password'])
	);

	print "roles : "  . $campi['roles'] . "<br>";
	print "user : "  . $campi['user'] . "<br>";
	print "password : "  . $campi['password'] . "<br>";

	// trasformo la mia array in JSON
$dati = json_encode($campi);

// inizializzo curl
$ch = curl_init();

// imposto la URl del web-service remoto
curl_setopt($ch, CURLOPT_URL, 'localhost:8080/php_rest_myblog/api/user/read_single.php');

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
curl_close($ch);
?>