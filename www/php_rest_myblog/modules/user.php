<?php

	class User {
		//DB stuff
		private $conn;
		private $table = 'User';

		//user properties
		public $id;
		public $firstName;
		public $lastName;
		public $userName;
		public $address;
		public $city;
		public $state;
		public $gender;
		public $prefix;
		public $phoneNumber;
		public $value;

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
		public function read_single() {
			
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? ';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind ID
			$stmt->bindParam(1, $this->id);

			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Set properties
			$this->firstName = $row['firstName'];
			$this->lastName = $row['lastName'];
			$this->userName = $row['userName'];
			$this->address = $row['address'];
			$this->city = $row['city'];
			$this->state = $row['state'];
			$this->gender = $row['gender'];
			$this->prefix = $row['prefix'];
			$this->phoneNumber = $row['phoneNumber'];
			$this->value = $row['value'];

		}

		// Create a user

		public function create() {

			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					firstName = :firstName,
					lastName = :lastName,
					userName = :userName,
					address = :address,
					city = :city,
					state = :state,
					gender = :gender,
					prefix = :prefix,
					phoneNumber = :phoneNumber,
					value = :value';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$this->firstName = htmlspecialchars(strip_tags($this->firstName));	
			$this->lastName = htmlspecialchars(strip_tags($this->lastName));	
			$this->userName = htmlspecialchars(strip_tags($this->userName));	
			$this->address = htmlspecialchars(strip_tags($this->address));	
			$this->city = htmlspecialchars(strip_tags($this->city));		
			$this->state = htmlspecialchars(strip_tags($this->state));	
			$this->gender = htmlspecialchars(strip_tags($this->gender));	
			$this->prefix = htmlspecialchars(strip_tags($this->prefix));	
			$this->phoneNumber = htmlspecialchars(strip_tags($this->phoneNumber));	
			$this->value = htmlspecialchars(strip_tags($this->value));

			// bind data
			$stmt->bindParam(':firstName', $this->firstName);
			$stmt->bindParam(':lastName', $this->lastName);
			$stmt->bindParam(':userName', $this->userName);
			$stmt->bindParam(':address', $this->address);
			$stmt->bindParam(':city', $this->city);
			$stmt->bindParam(':state', $this->state);
			$stmt->bindParam(':gender', $this->gender);
			$stmt->bindParam(':prefix', $this->prefix);
			$stmt->bindParam(':phoneNumber', $this->phoneNumber);
			$stmt->bindParam(':value', $this->value);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			// print error if something goes wrong 
			printf("Error: %s. \n", $stmt->error);
			return false;
		}

		// Update a user

		public function update() {

			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					firstName = :firstName,
					lastName = :lastName,
					userName = :userName,
					address = :address,
					city = :city,
					state = :state,
					gender = :gender,
					prefix = :prefix,
					phoneNumber = :phoneNumber,
					value = :value
				WHERE
					id = :id'	;

			// prepare statement
					$stmt = $this->conn->prepare($query);

			// clean data
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->firstName = htmlspecialchars(strip_tags($this->firstName));	
			$this->lastName = htmlspecialchars(strip_tags($this->lastName));	
			$this->userName = htmlspecialchars(strip_tags($this->userName));	
			$this->address = htmlspecialchars(strip_tags($this->address));	
			$this->city = htmlspecialchars(strip_tags($this->city));		
			$this->state = htmlspecialchars(strip_tags($this->state));	
			$this->gender = htmlspecialchars(strip_tags($this->gender));	
			$this->prefix = htmlspecialchars(strip_tags($this->prefix));	
			$this->phoneNumber = htmlspecialchars(strip_tags($this->phoneNumber));	
			$this->value = htmlspecialchars(strip_tags($this->value));

			// bind data
			$stmt->bindParam(':id', $this->id);
			$stmt->bindParam(':firstName', $this->firstName);
			$stmt->bindParam(':lastName', $this->lastName);
			$stmt->bindParam(':userName', $this->userName);
			$stmt->bindParam(':address', $this->address);
			$stmt->bindParam(':city', $this->city);
			$stmt->bindParam(':state', $this->state);
			$stmt->bindParam(':gender', $this->gender);
			$stmt->bindParam(':prefix', $this->prefix);
			$stmt->bindParam(':phoneNumber', $this->phoneNumber);
			$stmt->bindParam(':value', $this->value);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
			return false;
		}

		// Delete a user
		public function delete() {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$this->id = htmlspecialchars(strip_tags($this->id));

			// bind data
			$stmt->bindParam(':id', $this->id);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
			return false;
		

		}

	}
?>