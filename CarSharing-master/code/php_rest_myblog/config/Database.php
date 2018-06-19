<?php 
	class Database {
		//DB parameters
		private $port = '3306';
		private $host = 'mysql';
		private $db_name = 'CarSharing';
		private $username = 'carUser';
		private $password = 'carPassword';
		private $conn;

		//DB connect
		public function connect() {
			$this->conn = null;

			try {
				$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
				$this->conn->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e){
				echo 'Connection Error: ' . $e->getMessage();
			}

			return $this->conn;
		}

		public function getConnection(){
 
        $this->conn = null;
 
        
            $this->conn = new mysqli($this->host,  $this->username, $this->password, $this->db_name, $this->port);
if(!$this->conn){
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
         echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($this->conn) . PHP_EOL;
 
        return $this->conn;
	}

}

?>	