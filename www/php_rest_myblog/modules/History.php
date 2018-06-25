<?php

	class History {
		//DB stuff
		private $conn;
		private $table = 'History';

		// Constructor with DB
		public function __construct($db){
			$this->conn = $db;
		}

		// Get History
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

		
		private function commonReadSingle($query){
		    //Prepare statement
		    $stmt = $this->conn->prepare($query);
		    
		    // Bind values
		    $stmt->bindParam(':idCar', $idCar);
		    $stmt->bindParam(':deliveryDay', $deliveryDay);
		    $stmt->bindParam(':deliveryHour', $deliveryHour);
		    
		    // execute query
		    $stmt->execute();
		    
		    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		    
		    // Set properties
		    return array(
		        'idHistory'          => $row['idHistory'],
		        'idCar'              => $row['idCar'],
		        'customer'           => $row['customer'],
		        'idBasementStart'    => $row['idBasementStart'],
		        'pickUpDay' 	     => $row['pickUpDay'],
		        'pickUpHour' 	     => $row['pickUpHour'],
		        'idBasementEnd' 	 => $row['idBasementEnd'],
		        'deliveryDay' 	     => $row['deliveryDay'],
		        'deliveryHour'  	 => $row['deliveryHour']
		    );
		}
		
		// get single History
		public function read_single($idCar, $deliveryDay, $deliveryHour) {
			// Create query
			return $this->commonReadSingle('SELECT * FROM ' . $this->table . ' WHERE idCar = :idCar AND deliveryDay = :deliveryDay AND deliveryHour = :deliveryHour');
		}
		
		// Get single History by idHistory
		public function read_single($idHistory) {
		    // Create query
		    return $this->commonReadSingle('SELECT * FROM ' . $this->table . ' WHERE idHistory = :idHistory');
		}
		

		// Create a History

		public function create($idCar, $customer, $idBasementStart, $pickUpDay, $pickUpHour, $idBasementEnd, $deliveryDay, $deliveryHour) {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					idCar 		    = :idCar,
					customer 		= :customer,
					basementStart 	= :basementStart,
					pickUpDay 		= :pickUpDay,
					pickUpHour		= :pickUpHour,
					idBasementEnd 	= :idBasementEnd,
					deliveryDay 	= :deliveryDay,
					deliveryHour 	= :deliveryHour';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$idCar           = htmlspecialchars(strip_tags($idCar));	
			$customer        = htmlspecialchars(strip_tags($customer));	
			$idBasementStart = htmlspecialchars(strip_tags($idBasementStart));
			$pickUpDay       = htmlspecialchars(strip_tags($pickUpDay));	
			$pickUpHour      = htmlspecialchars(strip_tags($pickUpHour));	
			$idBasementEnd   = htmlspecialchars(strip_tags($idBasementEnd));		
			$deliveryDay     = htmlspecialchars(strip_tags($deliveryDay));	
			$deliveryHour    = htmlspecialchars(strip_tags($deliveryHour));

			// bind data
			$stmt->bindParam(':idCar', 		    $idCar);
			$stmt->bindParam(':customer', 		$customer);
			$stmt->bindParam(':idBasementStart',$idBasementStart);
			$stmt->bindParam(':pickUpDay', 		$pickUpDay);
			$stmt->bindParam(':pickUpHour', 	$pickUpHour);
			$stmt->bindParam(':idBasementEnd', 	$idBasementEnd);
			$stmt->bindParam(':deliveryDay', 	$deliveryDay);
			$stmt->bindParam(':deliveryHour', 	$deliveryHour);

			// execute query
			if($stmt->execute()) {
			    return $this->read_single($idCar, $deliveryDay, $deliveryHour);
			}

			// print error if something goes wrong 
			printf("Error: %s. \n", $stmt->error);
			return array('message' => "Creation failed");
		}

		// Update a History
		// Could Update a History only the customer or the seller of picked car
		public function update($idHistory, $idCar, $user, $idBasementStart, $pickUpDay, $pickUpHour, $idBasementEnd, $deliveryDay, $deliveryHour) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					idCar 		    = :idCar,
					basementStart 	= :basementStart,
					pickUpDay 		= :pickUpDay,
					pickUpHour		= :pickUpHour,
					idBasementEnd 	= :idBasementEnd,
					deliveryDay 	= :deliveryDay,
					deliveryHour 	= :deliveryHour
				WHERE
					idHistory = :idHistory AND (customer = :customer OR :seller = (SELECT seller FROM Car as c WHERE his.idCar = c.id))';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$idHistory       = htmlspecialchars(strip_tags($idHistory));
			$idCar           = htmlspecialchars(strip_tags($idCar));
			$user        = htmlspecialchars(strip_tags($user));
			$idBasementStart = htmlspecialchars(strip_tags($idBasementStart));
			$pickUpDay       = htmlspecialchars(strip_tags($pickUpDay));
			$pickUpHour      = htmlspecialchars(strip_tags($pickUpHour));
			$idBasementEnd   = htmlspecialchars(strip_tags($idBasementEnd));
			$deliveryDay     = htmlspecialchars(strip_tags($deliveryDay));
			$deliveryHour    = htmlspecialchars(strip_tags($deliveryHour));
			
			// bind data
			$stmt->bindParam(':idHistory', 		$idHistory);
			$stmt->bindParam(':idCar', 		    $idCar);
			$stmt->bindParam(':idBasementStart',$idBasementStart);
			$stmt->bindParam(':pickUpDay', 		$pickUpDay);
			$stmt->bindParam(':pickUpHour', 	$pickUpHour);
			$stmt->bindParam(':idBasementEnd', 	$idBasementEnd);
			$stmt->bindParam(':deliveryDay', 	$deliveryDay);
			$stmt->bindParam(':deliveryHour', 	$deliveryHour);
			$stmt->bindParam(':customer', 		$user);
			$stmt->bindParam(':seller', 		$user);
			

			// execute query
			if($stmt->execute()) {
			    return $this->read_single($idHistory);
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
			return array('message' => "Update failed");
		}

		// Delete a History
		// Could delete a History only the customer or the seller of picked car
		public function delete($idHistory, $user) {
			//create query 
			$query = 'DELETE FROM ' . $this->table . ' as his WHERE idHistory= :idHistory AND (customer = :customer OR :seller = (SELECT seller FROM Car as c WHERE his.idCar = c.id))';
			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$idHistory   = htmlspecialchars(strip_tags($idHistory));
			$user        = htmlspecialchars(strip_tags($user));
			
			// bind data
			$stmt->bindParam(':idHistory', $idHistory);
			$stmt->bindParam(':customer', $user);
			$stmt->bindParam(':seller', $user);
			
			// execute query
			if($stmt->execute()) {
			    return array('message' => "Delete completed");
			}

			// print error if something goes wrong 

			printf("Error: %s. \n", $stmt->error);
		}

	}
?>