<?php
	// header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: DELETE');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once '../../config/Database.php';
	include_once '../../modules/User.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();
	
	//Instantiate user objects
	$user = new User($db);

	// get raw user json_input
	$json_input = json_decode(file_get_contents("php://input"));

	
	// set ID  to update
	$user->id = $json_input['id'];
	$user->username = $json_input['username'];
	$user->password = $json_input['password'];

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