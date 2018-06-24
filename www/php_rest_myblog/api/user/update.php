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
	$user = new User($db);

	// get raw user json_input
	$json_input = json_decode(file_get_contents("php://input"));

	
	// set ID  to update
	$user->id = $json_input->id;

	//new values
	$user->firstName 	= $json_input->firstName;
	$user->lastName 	= $json_input->lastName;
	$user->username 	= $json_input->username;
	$user->address 		= $json_input->address;
	$user->city 		= $json_input->city;
	$user->state 		= $json_input->state;
	$user->gender 		= $json_input->gender;
	$user->prefix 		= $json_input->prefix;
	$user->phoneNumber 	= $json_input->phoneNumber;
	$user->role 		= $json_input->role;
	

	// update user
	if($user->update()) {
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