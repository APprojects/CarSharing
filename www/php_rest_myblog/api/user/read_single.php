<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/User.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate user objects
	$car = new User($db);

	// Get value, user name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);

	$car->role 	= $json_input['role'];
	$car->username = $json_input['username'];
	$car->password = $json_input['password'];

	// get user 
	$car->read_single();

	// create array
	$user_arr = array(
		'id' 			=> $car->id,
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