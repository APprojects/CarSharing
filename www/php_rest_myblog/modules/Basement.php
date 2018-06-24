<?php

	class Basement {
		//DB stuff
		private $conn;
		private $table = 'Basement';

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
		public function read_single($name) {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE name = :name';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind the name of basement
			$stmt->bindParam(':name', $name);
			
			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
            
			return array(
			    'name' => $row->name,
			    'address' => $row->address,
			    'seller' => $row->seller
			);
			
		}

		// Create a basement

		public function create($name, $address, $seller) {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					name = :name,
					address = :address
					seller = :seller';
					

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$name = htmlspecialchars(strip_tags($name));	
			$address = htmlspecialchars(strip_tags($address));
			$seller = htmlspecialchars(strip_tags($seller));

			// bind data
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':address', $address);
			$stmt->bindParam(':seller', $seller);

			// execute query
			if($stmt->execute()) {
			    return array(
			        'name' => $row->name,
			        'address' => $row->address,
			        'seller' => $row->seller
			    );
			}

			return array('message', "creation failed");
		}

		// Update a basement
		public function update($name, $seller) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					name = :name,
					address = :address
					seller = :seller
				WHERE
					name = :name AND seller = :seller'	;

			// prepare statement
					$stmt = $this->conn->prepare($query);

			// clean data
			$name = htmlspecialchars(strip_tags($name));
			$address = htmlspecialchars(strip_tags($address));
			$seller = htmlspecialchars(strip_tags($seller));
			

			// bind data
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':address', $address);
			$stmt->bindParam(':seller', $seller);
			

			// execute query
			if($stmt->execute()) {
			    return array(
			        'name' => $row->name,
			        'address' => $row->address,
			        'seller' => $row->seller
			    );
			}

			// print error if something goes wrong 

			return array('message', "update failed");
		}

		// Delete a basement
		public function delete($name, $seller) {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' WHERE name = :name AND seller = :seller';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$name = htmlspecialchars(strip_tags($name));
			$seller = htmlspecialchars(strip_tags($seller));
			
			// bind data
			$stmt->bindParam(':name', $name);
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