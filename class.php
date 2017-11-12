<?php
	require 'connection/config.php';
 
	class db_class{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASSWORD;
		public $dbname = DB_DATABASE;
		public $conn;
		public $error;
 
		public function __construct(){
			$this->connect();
		}
 
		private function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->conn){
				$this->error = "Fatal Error: Can't connect to database".$this->conn->connect_error;
				return false;
			}
		}
 
		public function save($username, $password, $firstname, $lastname){
			$stmt = $this->conn->prepare("INSERT INTO `admin` (username, password, firstname, lastname) VALUES(?, ?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("ssss", $username, $password, $firstname, $lastname);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 
		public function login($username, $password){
			$stmt = $this->conn->prepare("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$valid = $result->num_rows;
				$fetch = $result->fetch_array();
				return array(
					'user_id'=> $fetch['user_id'],
					'count'=>$valid
				);
			}
		}
 
		public function user_account($user_id){
			$stmt = $this->conn->prepare("SELECT * FROM `admin` WHERE `user_id` = '$user_id'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				return array(
					'firstname'=> $fetch['firstname'],
					'lastname'=>$fetch['lastname']
				);
			}	
		}
	}	
?>