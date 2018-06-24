<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/Car.php';
	
	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate car object
	$user = new Car($db);

	// Get value, user name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);

	$car_arr = $user->create($json_input['id'],$json_input['model'],$json_input['maxSpeed'],$json_input['numberOfPassengers'],$json_input['seller']);

	// make JSON
	echo(json_encode($car_arr));
?>

		