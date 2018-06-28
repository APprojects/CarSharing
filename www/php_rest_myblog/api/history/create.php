<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/History.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate user objects
	$history = new History($db);

	// Get value, user name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);
	
	var_dump($json_input);
	$user_arr = $history->create($json_input['idCar'], $json_input['user'], $json_input['idBasementStart'], $json_input['pickUpDay'], 
	    $json_input['idBasementEnd'], $json_input['deliveryDay']);

	
	// make JSON
	echo json_encode($user_arr);
?>

		
