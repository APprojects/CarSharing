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

		// Get Posts
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
	}

	?>