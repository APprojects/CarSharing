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

	// Get value, user name and password 
//	$user->id = isset($_GET['id']) ? $_GET['id'] : die();
	$json_input = json_decode(file_get_contents('php://input'), true);
	$user->value = $json_input['roles'];
	$user->userName = $json_input['user'];
	$user->password = $json_input['password'];

	// get user 
	$user->read_single();

	// create array
	$user_arr = array(
		'id' => $user->id,
		'firstName' => $user->firstName,
		'lastName' => $user->lastName,
		'userName' => $user->userName,
		'address' => $user->address,
		'city' => $user->city,
		'state' => $user->state,
		'gender' => $user->gender,
		'prefix' => $user->prefix,
		'phoneNumber' => $user->phoneNumber,
		'value' => $user->value
	);

	// make JSON
	print_r(json_encode($user_arr));

 ?>