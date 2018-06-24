<?php

	class User {
		//DB stuff
		private $conn;
		private $table = 'User';

		// Constructor with DB
		public function __construct($db){
			$this->conn = $db;
		}

		// Get Users
		public function read() {
			// Create query
			$query = 'SELECT * FROM ' . $this->table;
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Execute query
			$stmt->execute();
			//echo "dopo";
			return $stmt;
		}

		// get single user
		public function read_single($role, $username, $password) {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE role = :role AND username = :username AND  password = :password';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind rules, username and password
			$stmt->bindParam(':role', $role);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);

			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Set properties
			return array(
			    'id' 			=> $row->id,
			    'firstName' 	=> $row->firstName,
			    'lastName' 		=> $row->lastName,
			    'username' 		=> $row->username,
			    'password' 		=> $row->password,
			    'address' 		=> $row->address,
			    'city' 			=> $row->city,
			    'state' 		=> $row->state,
			    'gender' 		=> $row->gender,
			    'prefix' 		=> $row->prefix,
			    'phoneNumber' 	=> $row->phoneNumber,
			    'role' 		    => $row->role
			);		
		}

		// Create a user

		public function create($firstName, $lastName, $username, $password, $address, $city, $state, $gender, $prefix, $phoneNumber, $role) {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					firstName 		= :firstName,
					lastName 		= :lastName,
					username 		= :username,
					password 		= :password,
					address			= :address,
					city 			= :city,
					state 			= :state,
					gender 			= :gender,
					prefix 			= :prefix,
					phoneNumber 	= :phoneNumber,
					role 			= :role';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$firstName       = htmlspecialchars(strip_tags($firstName));	
			$lastName        = htmlspecialchars(strip_tags($lastName));	
			$username        = htmlspecialchars(strip_tags($username));
			$password        = htmlspecialchars(strip_tags($password));	
			$address         = htmlspecialchars(strip_tags($address));	
			$city            = htmlspecialchars(strip_tags($city));		
			$state           = htmlspecialchars(strip_tags($state));	
			$gender          = htmlspecialchars(strip_tags($gender));	
			$prefix          = htmlspecialchars(strip_tags($prefix));	
			$phoneNumber     = htmlspecialchars(strip_tags($phoneNumber));	
			$role            = htmlspecialchars(strip_tags($role));

			// bind data
			$stmt->bindParam(':firstName', 		$firstName);
			$stmt->bindParam(':lastName', 		$lastName);
			$stmt->bindParam(':username', 		$username);
			$stmt->bindParam(':password', 		$password);
			$stmt->bindParam(':address', 		$address);
			$stmt->bindParam(':city', 			$city);
			$stmt->bindParam(':state', 			$state);
			$stmt->bindParam(':gender', 		$gender);
			$stmt->bindParam(':prefix', 		$prefix);
			$stmt->bindParam(':phoneNumber',	$phoneNumber);
			$stmt->bindParam(':role', 			$role);

			// execute query
			if($stmt->execute()) {
			    return $this->read_single($role, $username, $password);
			}

			// print error if something goes wrong 
			printf("Error: %s. \n", $stmt->error);
			return array('message' => "Creation failed");
		}

		// Update a user

		public function update($id, $firstName, $lastName, $username, $password, $address, $city, $state, $gender, $prefix, $phoneNumber, $role) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					firstName 		= :firstName,
					lastName 		= :lastName,
					username 		= :username,
					address 		= :address,
					city 			= :city,
					state 			= :state,
					gender 			= :gender,
					prefix 			= :prefix,
					phoneNumber 	= :phoneNumber,
					role 			= :role
				WHERE
					id = :id';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$id              = htmlspecialchars(strip_tags($id));
			$firstName       = htmlspecialchars(strip_tags($firstName));	
			$lastName        = htmlspecialchars(strip_tags($lastName));	
			$username        = htmlspecialchars(strip_tags($username));	
			$address         = htmlspecialchars(strip_tags($address));	
			$city            = htmlspecialchars(strip_tags($city));		
			$state           = htmlspecialchars(strip_tags($state));	
			$gender          = htmlspecialchars(strip_tags($gender));	
			$prefix          = htmlspecialchars(strip_tags($prefix));	
			$phoneNumber     = htmlspecialchars(strip_tags($phoneNumber));	
			$role 		     = htmlspecialchars(strip_tags($role));

			// bind data
			$stmt->bindParam(':firstName', 		$firstName);
			$stmt->bindParam(':lastName', 		$lastName);
			$stmt->bindParam(':username', 		$username);
			$stmt->bindParam(':address', 		$address);
			$stmt->bindParam(':city', 			$city);
			$stmt->bindParam(':state', 			$state);
			$stmt->bindParam(':gender', 		$gender);
			$stmt->bindParam(':prefix', 		$prefix);
			$stmt->bindParam(':phoneNumber', 	$phoneNumber);
			$stmt->bindParam(':role', 			$role);

			// execute query
			if($stmt->execute()) {
			    return array(
			        'id' 			=> $id,
			        'firstName' 	=> $firstName,
			        'lastName' 		=> $lastName,
			        'username' 		=> $username,
			        'password' 		=> $password,
			        'address' 		=> $address,
			        'city' 			=> $city,
			        'state' 		=> $state,
			        'gender' 		=> $gender,
			        'prefix' 		=> $prefix,
			        'phoneNumber' 	=> $phoneNumber,
			        'role' 		    => $role
			    );
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
			return array('message' => "Update failed");
		}

		// Delete a user
		public function delete($id, $username, $password) {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' WHERE id = :id AND username = :username AND password = :password';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$id = htmlspecialchars(strip_tags($id));
			$username = htmlspecialchars(strip_tags($username));
			$password = htmlspecialchars(strip_tags($password));

			// bind data
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);

			// execute query
			if($stmt->execute()) {
			    return array('message' => "Delete completed");
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
		}

	}
?>