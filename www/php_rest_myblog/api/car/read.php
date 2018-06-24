<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/Car.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate car object
	$car = new Car($db);

	//car query
	$result = $car->read();
	//get row count
	$num = $result->rowCount();

	// check if any user
	if($num > 0){
		// users array
		$cars_arr = array();
		$cars_arr['cars'] = array();

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			$car_item = array(
				'id' 			=> $id,
				'model' 	    => $model,
				'maxSpeed' 		=> $maxSpeed,
				'numberOfPassengers' 		=> $numberOfPassengers,
				'seller' 		=> $seller
			);

			// Push to "data"
			array_push($cars_arr['data'], $car_item);
		}

		// turn to JSON & output
		echo json_encode($cars_arr);
	}

	else {
		 //no users
		echo json_encode(
			array('message' => 'no cars found')
		);
	}

 ?>

