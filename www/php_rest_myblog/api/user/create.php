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
	$car = new User($db);

	// Get value, user name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);
	
	//Set user variable
	$car->firstName 	= $json_input['firstName'];
	$car->lastName 	= $json_input['lastName'];
	$car->username 	= $json_input['username'];
	$car->password 	= $json_input['password'];
	$car->address 		= $json_input['address'];
	$car->city 		= $json_input['city'];
	$car->state 		= $json_input['state'];
	$car->gender 		= $json_input['gender'];
	$car->prefix 		= $json_input['prefix'];
	$car->phoneNumber 	= $json_input['phoneNumber'];
	$car->role 		= $json_input['role'];
	
	$car->create();
	$car->read_single();
	
	// create array
	$user_arr = array(
		'id' => $car->id,
		'firstName' 	=> $car->firstName,
		'lastName' 		=> $car->lastName,
		'username' 		=> $car->username,
		'password' 		=> $car->password,
		'address' 		=> $car->address,
		'city' 			=> $car->city,
		'state' 		=> $car->state,
		'gender' 		=> $car->gender,
		'prefix' 		=> $car->prefix,
		'phoneNumber' 	=> $car->phoneNumber,
		'role' 		=> $car->role
	);

	// make JSON
	print_r(json_encode($user_arr));
?>

		
