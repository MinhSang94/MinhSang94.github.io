<?php 
	class MySession implements SessionHandlerInterface
	{
		private $link;
		private $host = "mysql.hostinger.vn";
		private $user = "u979673765_root";
		private $pass = "icub4ucm";
		private $dbName = "u979673765_test";
		/**
			* Function open connection to database
			* @param {string} $savePath
			* @param {string} $sessionName
			* @return true if open connection complete else return false
		*/
		public function open ($savePath, $sessionName)
		{
			$link = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
			if ($link) {
				$this->link = $link;
				return true;
			}
			return false;
		}
		/**
			* Function close connection to database
			* @return true if close connection complete else return false
		*/
		public function close ()
		{
			mysqli_close($this->link);
			return true;
		}
		/**
			* Function read session data by data id
			* @param {string} $id
			* @return session data if session id already exists else return ""
		*/
		public function read($id)
		{
			$result = mysqli_query($this->link, "SELECT data FROM session WHERE id = '". $id ."' && setTime > '". date('Y-m-d H:i:s') ."'");
			if ($row = mysqli_fetch_assoc($result)) {
				return $row['data'];
			} else {
				return "";
			}
		}
		/**
			* Function write session data
			* @param {string} $id
			* @param {string} $data
			* @return true if session data was written else return false
		*/
		public function write($id, $data) {
			$dataTime = date('Y-m-d H:i:s');
			$newDateTime = date('Y-m-d H:i:s', strtotime($dataTime.' + 1 hour'));
			$result = mysqli_query($this->link, "REPLACE INTO session SET id ='".$id."', setTime = '".$newDateTime."', data = '".$data."'");
			if ($result) {
				return true;
			}
			return false;
		}
		/**
			* Function destroy session
			* @param {string} $id
			* @return true if session data was destroyed else return false
		*/
		function destroy($id)
		{
			$result = mysqli_query($this->link,"DELETE FROM session WHERE id = '". $id ."'");
			if ($result) {
				return true;
			}
			return false;
		}
		/**
			* Function delete session was expire
			* @param {datime with format 'Y-m-d H:i:s'} $maxLifeTime
			* @return true if delete complete else return false
		*/
		public function gc($maxLifeTime) {
			$result = mysqli_query($this->link,"DELETE FROM session WHERE ((UNIX_TIMESTAMP(Session_Expires) + ".$maxlifetime.") < ".$maxlifetime.")");
			if ($result) {
				return true;
			}
			return false;
		}
	}
	//Create handler
	$handler = new MySession();
	//Set handler for session
	session_set_save_handler($handler, true);