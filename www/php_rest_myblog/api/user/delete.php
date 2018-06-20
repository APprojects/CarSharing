<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: DELETE');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/user.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$user = new User($db);

	// get raw user data
	$data = json_decode(file_get_contents("php://input"));

	
	// set ID  to update
	$user->id = $data->id;

	
	

	// Delete user
	if($user->delete()) {
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