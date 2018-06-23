<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: DELETE');
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

	
	// set ID  to update
	$basement->name = $json_input->name;

	
	

	// Delete user
	if($basement->delete()) {
		echo json_encode(
			array('message' => 'user deleted')
		);
	}	
	else {
			echo json_encode(
				array('message' => 'user not deleted')
			);
	}

?>