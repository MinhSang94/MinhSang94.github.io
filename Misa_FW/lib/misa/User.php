<?php
	/**
	* 
	*/
	class MisaUser extends MisaSession
	{
		public static $info;

		public static function getId()
		{
			return self::get('MisaUserId');
		}

		public static function setId($id)
		{
			self::set('MisaUserId', $id);
		}

		public static function getInfo()
		{
			return self::get('MisaUserInfo');
		}

		public static function setInfo($info)
		{
			self::set('MisaUserInfo', $info);
		}

		public static function logged()
		{
			if (self::getId() !== null) {
				return true;
			}
			return false;
		}

		public static function logout()
		{
			self::delete(self::getId());
			if (self::getId() !== null) {
				return false;
			}
			return true;
		}
	}