<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/User.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$history = new History($db);

	// get raw user json_input
	$json_input = json_decode(file_get_contents("php://input"));

	// update user
	echo json_encode($history->update($json_input['idHistory'], $json_input['idCar'], $json_input['user'], $json_input['idBasementStart'], $json_input['pickUpDay'],
	    $json_input['pickUpHour'], $json_input['idBasementEnd'], $json_input['deliveryDay'], $json_input['deliveryHour']));
?>