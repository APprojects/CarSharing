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
	$dati1 = json_decode(file_get_contents("php://input"), true);
	  
	
	$user->firstName = $dati1['fname'];
	$user->lastName = $dati1['lname'];
	$user->userName = $dati1['uname'];
	$user->password = $dati1['pword'];
	$user->address = $dati1['address'];
	$user->city = $dati1['city'];
	$user->state = $dati1['state'];
	$user->gender = $dati1['gender'];
	$user->prefix = $dati1['prefix'];
	$user->phoneNumber = $dati1['number'];
	$user->value = $dati1['roles1'];
	

	// create user
	if($user->create()) {
		echo json_encode(
			array('message' => 'user Created')
		);
	}	
	else {
			echo json_encode(
				array('message' => 'user not Created')
			);
	}

?>

		