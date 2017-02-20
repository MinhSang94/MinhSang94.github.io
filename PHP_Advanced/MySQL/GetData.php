<?php
	/**
	* Class execute data from database
	*/
	class GetData
	{
		private $hostName = "localhost";
		private $user = "root";
		private $pass = "";
		private $dbName = "ms_fw_database";
		private $conn;
		/**
			* Function construct
			* This will open a connection if obj do not have a connection
		*/
		function __construct()
		{
			if (!isset($conn)) {
				$this->openConnetion();
			}
		}
		/**
			* Function open connection
			* Open a connection to mysql server
			* Create a database if it not exists
			* Create a table if it not exists
		*/
		private function openConnetion()
		{
			try {
				$this->conn = new mysqli($this->hostName, $this->user, $this->pass);
				$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS ms_fw_database";
				$this->conn->query($sqlCreateDB);
				$this->conn->select_db($this->dbName);
				$sqlCreateTB = "CREATE TABLE IF NOT EXISTS user(
									userID VARCHAR(40) NOT NULL,
									userName VARCHAR(20) NOT NULL,
									pass VARCHAR(40) NOT NULL,
									email VARCHAR(40) NOT NULL,
									birthdate VARCHAR(10) NOT NULL,
									PRIMARY KEY (userID))
								";
				$this->conn->query($sqlCreateTB);
			} catch (mysqli_sql_exception $e) {
				echo "Error: ".$e->getMessage();
			}
		}
		/**
			* Function select all user info
			* @return {array} $result
		*/
		public function selectAllUser()
		{
			try {
				$resultQuery = $this->conn->query("SELECT userName , email, birthdate FROM user");
				$result = array();
				while ($row = $resultQuery->fetch_assoc()) {
					$result[] = $row;
				}
				return $result;
			} catch (mysqli_sql_exception $e) {
				echo "Error: ".$e->getMessage();
			}
		}
		/**
			* Function select an user info
			* @param {int} $userID
			* @return {array} $result
		*/
		public function selectOneUser($userID)
		{
			try {
				$stmt = $this->conn->prepare("SELECT userName , email, birthdate FROM user WHERE userID = ?");
				$stmt->bind_param('s', $userID);
				$stmt->execute();
				$stmt->bind_result($userName, $email, $birthdate);
				$result = array();
				while ($stmt->fetch()) {
					$result['userName'] =  $userName;
					$result['email'] =  $email;
					$result['birthdate'] =  $birthdate;
				}
				return $result;
			} catch (mysqli_sql_exception $e) {
				echo "Error: ".$e->getMessage();
			}
		}
		/**
			* Function insert an user info
			* @param {array} $data
			* @return {boolean} $result
		*/
		public function insertUser($data)
		{
			try {
				$count = count($this->selectAllUser()) + 1;
				$userID = sha1(md5($count));
				$data['password'] = sha1(md5(sha1($data['password'])));
				$stmt = $this->conn->prepare("INSERT INTO user(userID, userName, pass, email, birthdate) VALUES(?, ?, ?, ?, ?)");
				$stmt->bind_param('sssss', $userID, $data['userName'], $data['password'], $data['email'], $data['birthdate']);
				if ($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (mysqli_sql_exception $e) {
				echo "Error: ".$e->getMessage();
			}
		}
		/**
			* Function update an user info
			* @param {array} $data
			* @return {boolean} $result
		*/
		public function updateUser($data)
		{
			try {
				$stmt = $this->conn->prepare("UPDATE user SET userName = ?, pass = ?, email = ?, birthdate = ? WHERE userID = ?");
				$stmt->bind_param('sssss', $data['userName'], $data['password'], $data['email'], $data['birthdate'], $data['userID']);
				if ($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (mysqli_sql_exception $e) {
				echo "Error: ".$e->getMessage();
			}
		}
		/**
			* Function delete an user info
			* @param {int} $userID
			* @return {boolean} $result
		*/
		public function deleteUser($userID) {
			try {
				$stmt = $this->conn->prepare("DELETE FROM user WHERE userID = ?");
				$stmt->bind_param('s', $userID);
				if ($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (mysqli_sql_exception $e) {
				echo "Error: ".$e->getMessage();
			}
		}
	}