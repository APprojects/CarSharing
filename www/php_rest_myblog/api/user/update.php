<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/user.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$user = new User($db);

	// get raw user data
	$data = json_decode(file_get_contents("php://input"));

	
	// set ID  to update
	$user->id = $data->id;

	$user->firstName = $data->firstName;
	$user->lastName = $data->lastName;
	$user->userName = $data->userName;
	$user->address = $data->address;
	$user->city = $data->city;
	$user->state = $data->state;
	$user->gender = $data->gender;
	$user->prefix = $data->prefix;
	$user->phoneNumber = $data->phoneNumber;
	$user->value = $data->value;
	

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