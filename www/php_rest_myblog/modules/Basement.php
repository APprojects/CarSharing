<?php

	class Basement {
		//DB stuff
		private $conn;
		private $table = 'Basement';

		//basement properties
		public $name;
		public $address;

		// Constructor with DB
		public function __construct($db){
			$this->conn = $db;
		}

		// Get Basements
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

		// get single basement
		public function read_single() {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE name = ?';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind value, userName and password
			$stmt->bindParam(1, $this->name);
			
			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Set properties
			$this->name = $row['id'];
			$this->address = $row['address'];
		}

		// Create a basement

		public function create() {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					name = :name,
					address = :address';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$this->name = htmlspecialchars(strip_tags($this->name));	
			$this->address = htmlspecialchars(strip_tags($this->address));	

			// bind data
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':address', $this->address);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			// print error if something goes wrong 
			printf("Error: %s. \n", $stmt->error);
			return false;
		}

		// Update a basement

		public function update(String $oldName) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					name = :name,
					address = :address
				WHERE
					name = :oldName'	;

			// prepare statement
					$stmt = $this->conn->prepare($query);

			// clean data
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->address = htmlspecialchars(strip_tags($this->address));

			// bind data
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':address', $this->address);
			$stmt->bindPatam(':oldName', $oldName);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
			return false;
		}

		// Delete a basement
		public function delete() {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' WHERE name = :name';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$this->name = htmlspecialchars(strip_tags($this->name));

			// bind data
			$stmt->bindParam(':name', $this->name);

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