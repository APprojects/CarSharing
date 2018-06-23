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

	// get raw user data
	$dati = json_decode(file_get_contents("php://input"), true);
	  
	
	$user->firstName = $dati['fname'];
	$user->lastName = $dati['lname'];
	$user->userName = $dati['uname'];
	$user->password = $dati['pword'];
	$user->address = $dati['address'];
	$user->city = $dati['city'];
	$user->state = $dati['state'];
	$user->gender = $dati['gender'];
	$user->prefix = $dati['prefix'];
	$user->phoneNumber = $dati['number'];
	$user->value = $dati['roles1'];
	

	// create user
	if($user->create()) {
		print_r json_encode(
			array('message' => 'user Created')
		);
	}	
	else {
			print_r json_encode(
				array('message' => 'user not Created')
			);
	}

?>

		
