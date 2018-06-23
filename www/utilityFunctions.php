<?php
	//return an array['data']  of array [0,1,...,n] of basements with ['name'] and ['address']
	function getBasements(){
		$ch = curl_init();
		$dati = array();
		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'localhost/php_rest_myblog/api/basement/read.php');
		
		// preparo l'invio dei dati col metodo POST
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

		// imposto gli header correttamente
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json')
		);

		// eseguo la chiamata
		$response = json_decode(curl_exec($ch), true);
		var_dump($response);
		// chiudo
		curl_close($ch);
		return $response;
	}
?>