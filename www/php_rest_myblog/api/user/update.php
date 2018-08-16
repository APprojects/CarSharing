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
	$user = new User($db);

	// get raw user json_input
	$json_input = json_decode(file_get_contents("php://input"),true);

	// update user
     echo json_encode($user->update($json_input['id'], $json_input['firstName'], $json_input['lastName'], $json_input['username'], $json_input['password'],
	        $json_input['address'], $json_input['city'], $json_input['state'], $json_input['gender'], $json_input['prefix'],
	        $json_input['phoneNumber'], $json_input['role']));
     
     
?>