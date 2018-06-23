<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/Basement.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate basement objects
	$basement = new Basement($db);

	// Get value, basement name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);

	$basement->name = $json_input['name'];
	
	// get user 
	$basement->read_single();

	// create array
	$basement_arr = array(
		'name' => $user->name,
		'address' => $user->address
	);

	// make JSON
	print_r(json_encode($basement_arr));
 ?>