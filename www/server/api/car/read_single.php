<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/Car.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate user objects
	$car = new Car($db);

	// Get id car  
	$json_input = json_decode(file_get_contents('php://input'), true);


	// get car 
	$car_arr = $car->read_single($json_input['id']);

	// make JSON
	print_r(json_encode($car_arr));
 ?>