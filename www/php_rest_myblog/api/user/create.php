<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/user.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate user objects
	$user = new User($db);

	// Get value, user name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);
	
	//Set user variable
	$user->firstName 	= $json_input['fname'];
	$user->lastName 	= $json_input['lname'];
	$user->userName 	= $json_input['uname'];
	$user->password 	= $json_input['pword'];
	$user->address 		= $json_input['address'];
	$user->city 		= $json_input['city'];
	$user->state 		= $json_input['state'];
	$user->gender 		= $json_input['gender'];
	$user->prefix 		= $json_input['prefix'];
	$user->phoneNumber 	= $json_input['number'];
	$user->value 		= $json_input['roles'];
	
	// create user
	if($user->create()) {
		$message = array('message' => 'user Created');
	}	
	else {
		$message =  array('message' => 'user not Created');
	}

	print_r(json_encode($message));

?>

		
