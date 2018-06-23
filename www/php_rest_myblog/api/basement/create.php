<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/Basement.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate basement objects
	$basement = new Basement($db);

	// Get value, basement name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);
	
	//Set user variable
	$basement->name 	= $json_input['name'];
	$basement->address 	= $json_input['address'];
	
	$basement->create();
	$basement->read_single();
	
	// create array
	$user_arr = array(
		'name' => $basement->name,
		'address' => $basement->address
	);

	// make JSON
	print_r(json_encode($user_arr));
?>

		
