<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/Car.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$car = new Car($db);

	// get raw user json_input
	$json_input = json_decode(file_get_contents("php://input"),true);
	

	// update user
	echo json_encode($car->update($json_input['id'],$json_input['model'],$json_input['maxSpeed'],$json_input['numberOfPassengers'],$json_input['seller']));
	 

?>