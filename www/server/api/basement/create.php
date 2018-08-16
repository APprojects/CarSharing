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
	
	
	$basement_arr = $basement->create($json_input['name'], $json_input['address'],$json_input['seller']);

	
	echo(json_encode($basement_arr));
?>

		
