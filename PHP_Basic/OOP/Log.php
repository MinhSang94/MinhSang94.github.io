<?php
	/**
	* 
	*/
	class Log
	{
		
		private $logFile;
		private $filePointer;
		/** 
			* Function set file path for $logFile
			* @param {string} $filePath
		*/
		public function setLogFile($filePath)
		{
			$this->logFile = $filePath;
		}
		/**
			* Function write log
			* @param {string} $message
		*/
		public function writeLog($message)
		{
			if (!is_resource($this->filePointer)) {
				$this->openWrite();
			}
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$dateTimeWrite = @Date('Y-m-d H:i:s');
			$type = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
			fwrite($this->filePointer, "$dateTimeWrite ($type) $message".PHP_EOL);
			$this->closeLogFile();
		}
		public function readLog()
		{
			if (!is_resource($this->filePointer)) {
				$this->openRead();
			}
			$message = "";
			while (!feof($this->filePointer)) {
				$message .= "<p>".fgets($this->filePointer)."</p>";
			}
			$this->closeLogFile();
			return $message;
		}
		/**
			* Funtion open log file for write log
		*/
		public function openWrite()
		{
			if (isset($this->logFile)) {
				$this->filePointer = fopen($this->logFile, 'a') or exit ('Can not open log file.');
			}
		}
		/**
			* Funtion open log file for read log
		*/
		public function openRead()
		{
			if (isset($this->logFile)) {
				$this->filePointer = fopen($this->logFile, 'r') or exit ('Can not open log file.');
			}
		}
		/**
			* Funtion close log file
		*/
		private function closeLogFile()
		{
			fclose($this->filePointer);	
		}
	}