<?php

	class Car {
		//DB stuff
		private $conn;
		private $table = 'Car';

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
		public function read_single($id) {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind model 
			$stmt->bindParam(':id', $id);
			
			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Set properties
			return array(
			    'id' 			     => $row['id'],
			    'model' 	         => $row['model'],
			    'maxSpeed' 		     => $row['maxSpeed'],
			    'numberOfPassengers' => $row['numberOfPassengers'],
			    'seller' 		     => $row['seller']
			);
			
		}

		// Create a car

		public function create($id, $model, $maxSpeed, $numberOfPassengers, $seller) {
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
			$id = htmlspecialchars(strip_tags($id));
			$model = htmlspecialchars(strip_tags($model));	
			$maxSpeed = htmlspecialchars(strip_tags($maxSpeed));	
			$numberOfPassengers = htmlspecialchars(strip_tags($numberOfPassengers));
			$seller = htmlspecialchars(strip_tags($seller));

			// bind data
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':model', $model);
			$stmt->bindParam(':maxSpeed', $maxSpeed);
			$stmt->bindParam(':numberOfPassengers', $numberOfPassengers);
			$stmt->bindParam(':seller', $seller);

			// execute query
			if($stmt->execute()) {
			    return array(
			        'id' 			     => $id,
			        'model' 	         => $model,
			        'maxSpeed' 		     => $maxSpeed,
			        'numberOfPassengers' => $numberOfPassengers,
			        'seller' 		     => $seller
			    );
			    
			}

	
			return array('message', "creation failed");
		}

		// Update a car

		public function update($id, $model, $maxSpeed, $numberOfPassengers, $seller) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					model = :model,
					maxSpeed = :maxSpeed,
					numberOfPassengers = :numberOfPassengers
				WHERE
					id = :id AND seller = :seller' ;

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$id                  = htmlspecialchars(strip_tags($id));
			$model               = htmlspecialchars(strip_tags($model));
			$maxSpeed            = htmlspecialchars(strip_tags($maxSpeed));
			$numberOfPassengers  = htmlspecialchars(strip_tags($numberOfPassengers));
			$seller              = htmlspecialchars(strip_tags($seller));

			// bind data
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':model', $model);
			$stmt->bindParam(':maxSpeed', $maxSpeed);
			$stmt->bindParam(':numberOfPassengers', $numberOfPassengers);
			$stmt->bindParam(':seller', $seller);

			// execute query
			if($stmt->execute()) {
			    return array(
			        'id' 			     => $id,
			        'model' 	         => $model,
			        'maxSpeed' 		     => $maxSpeed,
			        'numberOfPassengers' => $numberOfPassengers,
			        'seller' 		     => $seller
			    );
			}

			// print error if something goes wrong 
            return array('message', "update failed");
		}

		// Delete a car
		public function delete($id, $seller) {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' WHERE id = :id and seller = :seller';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$id = htmlspecialchars(strip_tags($id));
			$seller = htmlspecialchars(strip_tags($seller));
			
			// bind data
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':seller', $seller);

			// execute query
			if($stmt->execute()) {
			    return  array('message', "delete completed");
			}

			// print error if something goes wrong 

			return array('message', "delete failed");
		}

	}
?>