<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/User.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$car = new User($db);

	// get raw user json_input
	$json_input = json_decode(file_get_contents("php://input"));

	
	// set ID  to update
	$car->id = $json_input->id;

	//new values
	$car->firstName 	= $json_input->firstName;
	$car->lastName 	= $json_input->lastName;
	$car->username 	= $json_input->username;
	$car->address 		= $json_input->address;
	$car->city 		= $json_input->city;
	$car->state 		= $json_input->state;
	$car->gender 		= $json_input->gender;
	$car->prefix 		= $json_input->prefix;
	$car->phoneNumber 	= $json_input->phoneNumber;
	$car->role 		= $json_input->role;
	

	// update user
	if($car->update()) {
		echo json_encode(
			array('message' => 'user updated')
		);
	}	
	else {
			echo json_encode(
				array('message' => 'user not updated')
			);
	}

?>