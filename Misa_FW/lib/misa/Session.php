<?php
	require('lib/misa/session/base.php');
	/**
	* 
	*/
	class MisaSession
	{
		public static function start()
		{
			@session_start();
			$handler = new MySession();
			session_set_save_handler($handler, true);
		}

		public static function set($name, $value)
		{
			$_SESSION[$name] = $value;
		}

		public static function get($name)
		{
			return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
		}

		public static function delete($name)
		{
			if (isset($_SESSION[$name])) {
				unset($_SESSION[$name]);
			}
		}
		
		public static function destroy()
		{
			@session_destroy();
		}
	}