<?php 
	class Database {
		//DB parameters
		//private $port = '3306';
		private $host = 'localhost';
		private $db_name = 'id6816459_carsharing';
		private $username = 'id6816459_caruser';
		private $password = 'carPassword';
		private $conn;

		//DB connect
		public function connect() {
			$this->conn = null;

			try {
				$this->conn = new PDO('mysql:host=' . $this->host /*. ';port=' . $this->port*/ . ';dbname=' . $this->db_name, $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e){
					echo 'Connection Error: ' . $e->getMessage();
			}
			return $this->conn;
		}

		public function getConnection(){			
			$this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name, $this->port);

			if (!$this->conn) {
				die("Connection failed: " . $conn->connect_error);
			} 
			echo "Connected successfully";
			return $this->conn;
		}

	}

?>	