<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../modules/History.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate user objects
	$history = new History($db);

	// Get value, user name and password 
	$json_input = json_decode(file_get_contents('php://input'), true);

	$user_arr = $history->read_single_byID($json_input['idHistory']);

	// make JSON
	print_r(json_encode($user_arr));
 ?>