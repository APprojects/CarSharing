<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/Basement.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate basement objects
	$basement = new Basement($db);

	//basement query
	$result = $basement->read();
	//get row count
	$num = $result->rowCount();

	// check if any basement
	if($num > 0){
		// users array
		$basement_arr = array();
		$basement_arr['basements'] = array();

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			$basement_item = array(
				'id' => $id,
			    'name' => $name,
				'address' => $address,
			    'seller' => $seller
			);

			// Push to "basements"
			array_push($basement_arr['basements'], $basement_item);
		}

		// turn to JSON & output
		echo json_encode($basement_arr);
	}

	else {
		 //no users
		echo json_encode(
			array('message' => 'no basement found')
		);
	}

 ?>

