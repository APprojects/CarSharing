<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/User.php';

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
	$user->rules 		= $json_input['roles'];
	
	$user->create();
	$user->read_single();
	
	// create array
	$user_arr = array(
		'id' => $user->id,
		'firstName' 	=> $user->firstName,
		'lastName' 		=> $user->lastName,
		'userName' 		=> $user->userName,
		'password' 		=> $user->password,
		'address' 		=> $user->address,
		'city' 			=> $user->city,
		'state' 		=> $user->state,
		'gender' 		=> $user->gender,
		'prefix' 		=> $user->prefix,
		'phoneNumber' 	=> $user->phoneNumber,
		'rules' 		=> $user->rules
	);

	// make JSON
	print_r(json_encode($user_arr));
?>

		
