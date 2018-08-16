<?php
	//return an array['data']  of array [0,1,...,n] of basements with ['name'] and ['address']
	function getBasements(){
		$ch = curl_init();
		$dati = array();
		// imposto la URl del web-service remoto
		curl_setopt($ch, CURLOPT_URL, 'http://carsharingap.000webhostapp.com/server/api/basement/read.php');
		
		// Chiamo l'API  tramite PUT
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

		// imposto gli header correttamente
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json')
		);

		// eseguo la chiamata
		$response = json_decode(curl_exec($ch), true);
		
		// chiudo
		curl_close($ch);
		return $response;
	}
	
	
	function getCars(){
	    $ch = curl_init();
	    $dati = array();
	    // imposto la URl del web-service remoto
	    curl_setopt($ch, CURLOPT_URL, 'http://carsharingap.000webhostapp.com/server/api/car/read.php');
	    
	    // Chiamo l'API  tramite PUT
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    
	    // imposto gli header correttamente
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Content-Type: application/json')
	        );
	    
	    // eseguo la chiamata
	    $response = json_decode(curl_exec($ch), true);

	    // chiudo
	    curl_close($ch);
	    return $response;
	}
	
	function getHistories(){
	    $ch = curl_init();
	    $dati = array();
	    // imposto la URl del web-service remoto
	    curl_setopt($ch, CURLOPT_URL, 'http://carsharingap.000webhostapp.com/server/api/history/read.php');
	    
	    // Chiamo l'API  tramite PUT
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    
	    // imposto gli header correttamente
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Content-Type: application/json')
	        );
	    
	    // eseguo la chiamata
	    $response = json_decode(curl_exec($ch), true);
	 //var_dump($response);
	    // chiudo
	    curl_close($ch);
	    return $response;
	}
	
	function getUsers(){
	    $ch = curl_init();
	    $dati = array();
	    // imposto la URl del web-service remoto
	    curl_setopt($ch, CURLOPT_URL, 'http://carsharingap.000webhostapp.com/server/api/user/read.php');
	    
	    // Chiamo l'API  tramite PUT
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    
	    // imposto gli header correttamente
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Content-Type: application/json')
	    );
	    
	    // eseguo la chiamata
	    $response = json_decode(curl_exec($ch), true);
	    //var_dump($response);
	    // chiudo
	    curl_close($ch);
	    return $response;
	}
	
?>