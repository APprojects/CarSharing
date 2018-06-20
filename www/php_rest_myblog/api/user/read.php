<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/user.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$user = new User($db);

	//user query
	$result = $user->read();
	//get row count
	$num = $result->rowCount();

	// check if any user
	if($num > 0){
		// users array
		$users_arr = array();
		$users_arr['data'] = array();

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			$user_item = array(
				'id' => $id,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'userName' => $userName,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'gender' => $gender,
				'prefix' => $prefix,
				'phoneNumber' => $phoneNumber,
				'value' => $value		
			);

			// Push to "data"
			array_push($users_arr['data'], $user_item);
		}

		// turn to JSON & output
		echo json_encode($users_arr);
	}

	else {
		 //no users
		echo json_encode(
			array('message' => 'no users found')
		);
	}

 ?>

