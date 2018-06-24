<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/Basement.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate basement objects
	$basement = new Basement($db);

	// get raw basement json_input
	$json_input = json_decode(file_get_contents("php://input"));

	
	// set oldName  to update
	$oldName = $json_input->oldName;

	//new values
	$basement->name = $json_input->name;
	$basement->address = $json_input->address;
	

	// update user
	if($basement->update($oldName)) {
		echo json_encode(
			array('message' => 'basement updated')
		);
	}	
	else {
			echo json_encode(
				array('message' => 'basement not updated')
			);
	}

?>