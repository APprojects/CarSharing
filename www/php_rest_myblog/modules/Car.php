<?php

	class Car {
		//DB stuff
		private $conn;
		private $table = 'Car';

		//car properties
		public $id;
		public $model;
		public $maxSpeed;
		public $numberOfPassengers;
		public $seller;

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

		// get single car
		public function read_single() {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind model 
			$stmt->bindParam(1, $this->id);
			
			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Set properties
			$this->id = $row['id'];
			$this->model = $row['model'];
			$this->maxSpeed = $row['maxSpeed'];
			$this->numberOfPassengers = $row['numberOfPassengers'];
			$this->seller = $row['seller'];
		}

		// Create a basement

		public function create() {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					id = :id,
					model = :model,
					maxSpeed = :maxSpeed,
					numberOfPassengers = :numberOfPassengers,
					seller = :seller ';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->model = htmlspecialchars(strip_tags($this->model));	
			$this->maxSpeed = htmlspecialchars(strip_tags($this->maxSpeed));	
			$this->numberOfPassengers = htmlspecialchars(strip_tags($this->numberOfPassengers));
			$this->seller = htmlspecialchars(strip_tags($this->seller));

			// bind data
			$stmt->bindParam(':id', $this->id);
			$stmt->bindParam(':model', $this->model);
			$stmt->bindParam(':maxSpeed', $this->maxSpeed);
			$stmt->bindParam(':numberOfPassengers', $this->numberOfPassengers);
			$stmt->bindParam(':seller', $this->seller);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			// print error if something goes wrong 
			printf("Error: %s. \n", $stmt->error);
			return false;
		}

		// Update a basement

		public function update() {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					model = :model,
					maxSpeed = :maxSpeed,
					numberOfPassengers = :numberOfPassengers
				WHERE
					id = :id'	;

			// prepare statement
					$stmt = $this->conn->prepare($query);

			// clean data
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->model = htmlspecialchars(strip_tags($this->model));
			$this->maxSpeed = htmlspecialchars(strip_tags($this->maxSpeed));
			$this->numberOfPassengers = htmlspecialchars(strip_tags($this->numberOfPassengers));
			$this->seller = htmlspecialchars(strip_tags($this->seller));

			// bind data
			$stmt->bindParam(':id', $this->id);
			$stmt->bindParam(':model', $this->model);
			$stmt->bindPatam(':maxSpeed', $this->maxSpeed);
			$stmt->bindPatam(':numberOfPassengers', $this->numberOfPassengers);
			$stmt->bindPatam(':seller', $this->seller);

			

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