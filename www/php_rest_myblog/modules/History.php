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
		    $stmt->bindParam(':DeliveryDay', $DeliveryDay);
		    $stmt->bindParam(':DeliveryHour', $DeliveryHour);
		    
		    // execute query
		    $stmt->execute();
		    
		    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		    
		    // Set properties
		    return array(
		        'idHistory'          => $row['idHistory'],
		        'idCar'              => $row['idCar'],
		        'customer'           => $row['customer'],
		        'idBasementStart'    => $row['idBasementStart'],
		        'PickUpDay' 	     => $row['PickUpDay'],
		        'PickUpHour' 	     => $row['PickUpHour'],
		        'idBasementEnd' 	 => $row['idBasementEnd'],
		        'DeliveryDay' 	     => $row['DeliveryDay'],
		        'DeliveryHour'  	 => $row['DeliveryHour']
		    );
		}
		
		// get single History
		public function read_single($idCar, $DeliveryDay, $DeliveryHour) {
			// Create query
			return $this->commonReadSingle('SELECT * FROM ' . $this->table . ' WHERE idCar = :idCar AND DeliveryDay = :DeliveryDay AND DeliveryHour = :DeliveryHour');
		}
		
		// Get single History by idHistory
		public function read_single($idHistory) {
		    // Create query
		    return $this->commonReadSingle('SELECT * FROM ' . $this->table . ' WHERE idHistory = :idHistory');
		}
		

		// Create a History

		public function create($idCar, $customer, $idBasementStart, $PickUpDay, $PickUpHour, $idBasementEnd, $DeliveryDay, $DeliveryHour) {
			//create query
			$query = 'INSERT INTO ' . $this->table . '
				SET
					idCar 		    = :idCar,
					customer 		= :customer,
					basementStart 	= :basementStart,
					PickUpDay 		= :PickUpDay,
					PickUpHour		= :PickUpHour,
					idBasementEnd 	= :idBasementEnd,
					DeliveryDay 	= :DeliveryDay,
					DeliveryHour 	= :DeliveryHour';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$idCar           = htmlspecialchars(strip_tags($idCar));	
			$customer        = htmlspecialchars(strip_tags($customer));	
			$idBasementStart = htmlspecialchars(strip_tags($idBasementStart));
			$PickUpDay       = htmlspecialchars(strip_tags($PickUpDay));	
			$PickUpHour      = htmlspecialchars(strip_tags($PickUpHour));	
			$idBasementEnd   = htmlspecialchars(strip_tags($idBasementEnd));		
			$DeliveryDay     = htmlspecialchars(strip_tags($DeliveryDay));	
			$DeliveryHour    = htmlspecialchars(strip_tags($DeliveryHour));

			// bind data
			$stmt->bindParam(':idCar', 		    $idCar);
			$stmt->bindParam(':customer', 		$customer);
			$stmt->bindParam(':idBasementStart',$idBasementStart);
			$stmt->bindParam(':PickUpDay', 		$PickUpDay);
			$stmt->bindParam(':PickUpHour', 	$PickUpHour);
			$stmt->bindParam(':idBasementEnd', 	$idBasementEnd);
			$stmt->bindParam(':DeliveryDay', 	$DeliveryDay);
			$stmt->bindParam(':DeliveryHour', 	$DeliveryHour);

			// execute query
			if($stmt->execute()) {
			    return $this->read_single($idCar, $DeliveryDay, $DeliveryHour);
			}

			// print error if something goes wrong 
			printf("Error: %s. \n", $stmt->error);
			return array('message' => "Creation failed");
		}

		// Update a History

		public function update($idHistory, $idCar, $user, $idBasementStart, $PickUpDay, $PickUpHour, $idBasementEnd, $DeliveryDay, $DeliveryHour) {
			//create query
			$query = 'UPDATE ' . $this->table . '
				SET
					idCar 		    = :idCar,
					basementStart 	= :basementStart,
					PickUpDay 		= :PickUpDay,
					PickUpHour		= :PickUpHour,
					idBasementEnd 	= :idBasementEnd,
					DeliveryDay 	= :DeliveryDay,
					DeliveryHour 	= :DeliveryHour
				WHERE
					idHistory = :idHistory AND (customer = :customer OR :seller = (SELECT seller FROM Car as c WHERE his.idCar = c.id))';

			// prepare statement
			$stmt = $this->conn->prepare($query);

			// clean data
			$idHistory       = htmlspecialchars(strip_tags($idHistory));
			$idCar           = htmlspecialchars(strip_tags($idCar));
			$user        = htmlspecialchars(strip_tags($user));
			$idBasementStart = htmlspecialchars(strip_tags($idBasementStart));
			$PickUpDay       = htmlspecialchars(strip_tags($PickUpDay));
			$PickUpHour      = htmlspecialchars(strip_tags($PickUpHour));
			$idBasementEnd   = htmlspecialchars(strip_tags($idBasementEnd));
			$DeliveryDay     = htmlspecialchars(strip_tags($DeliveryDay));
			$DeliveryHour    = htmlspecialchars(strip_tags($DeliveryHour));
			
			// bind data
			$stmt->bindParam(':idHistory', 		$idHistory);
			$stmt->bindParam(':idCar', 		    $idCar);
			$stmt->bindParam(':idBasementStart',$idBasementStart);
			$stmt->bindParam(':PickUpDay', 		$PickUpDay);
			$stmt->bindParam(':PickUpHour', 	$PickUpHour);
			$stmt->bindParam(':idBasementEnd', 	$idBasementEnd);
			$stmt->bindParam(':DeliveryDay', 	$DeliveryDay);
			$stmt->bindParam(':DeliveryHour', 	$DeliveryHour);
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