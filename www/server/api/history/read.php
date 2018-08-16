<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/History.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$history = new History($db);

	//user query
	$result = $history->read();
	//get row count
	$num = $result->rowCount();

	// check if any user
	if($num > 0){
		// users array
		$histories_arr = array();
		$histories_arr['histories'] = array();

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			$history_item = array(
			    'idHistory'          => $idHistory,
			    'idCar'              => $idCar,
			    'customer'           => $customer,
			    'idBasementStart'    => $idBasementStart,
			    'pickUpDay' 	     => $pickUpDay,
			    'idBasementEnd' 	 => $idBasementEnd,
			    'deliveryDay' 	     => $deliveryDay,
			    'model'              => $model,
			    'maxSpeed'           => $maxSpeed,
			    'numberOfPassengers' => $numberOfPassengers,
			    'seller'             => $seller
			);

			// Push to "data"
			array_push($histories_arr['histories'], $history_item);
		}

		// turn to JSON & output
		echo json_encode($histories_arr);
	}

	else {
		 //no users
		echo json_encode(
			array('message' => 'no users found')
		);
	}

 ?>

