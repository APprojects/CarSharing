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
		public function read_single($name, $seller) {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE name = :name and seller = :seller';
			
			//Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind the name of basement
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':seller', $seller);
			// execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
            
			return array(
			    'id'         => $row['id'],
			    'name'       => $row['name'],
			    'address'    => $row['address'],
			    'seller'     => $row['seller']
			);
			
		}

		// Create a basement

		public function create($name, $address, $seller) {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					name = :name,
					address = :address,
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
			    return $this->read_single($name,$seller);
			    
			}

			return array('message', "creation failed");
		}

		// Update a basement
		public function update($id, $name, $address, $seller) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					name = :name,
					address = :address
				WHERE
					id = :id AND seller = :seller'	;

			// prepare statement
					$stmt = $this->conn->prepare($query);

					
			// clean data
			$id = htmlspecialchars(strip_tags($id));
			$name = htmlspecialchars(strip_tags($name));
			$address = htmlspecialchars(strip_tags($address));
			$seller = htmlspecialchars(strip_tags($seller));
			

			// bind data
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':address', $address);
			$stmt->bindParam(':seller', $seller);
			

			// execute query
			if($stmt->execute()) {
			    return array(
			        'id' => $id,
			        'name' => $name,
			        'address' => $address,
			        'seller' => $seller
			    );
			}

			// print error if something goes wrong 

			return array('message', "update failed");
		}

		// Delete a basement
		public function delete($id, $seller) {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' WHERE id = :id AND seller = :seller';

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