<?php
	/**
		* Function validate string value
		* @param {string} $param
		* @return true if $param is a string else return false
	*/
	function validateParameter($param)
	{
		if (is_string($param)) {
			return true;
		}
		return false;
	}
	/**
		* Function writeBySingleQuote
	*/
	function writeBySingleQuote()
	{
		echo 'Ex1:write by single quote: money $__$ money<br/>';
	}
	/**
		* Function writeByDoubleQuotes
	*/
	function writeByDoubleQuotes()
	{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write by double quotes: money \$__\$ money<br/>";
	}
	/**
		* Function check if find $strFind in $strSource
		* @param {string} $strFind
		* @param {string} $strSource
		* @return true if $strFind is inside $strSource else return false
	*/
	function findString($strFind, $strSource)
	{
		$temp = strpos($strSource, $strFind);
		if ($temp == false) {
			return false;
			echo $strFind;
		} else {
			return true;
		}

	}
	/**
		*Function check $str is made by sigle byte
		* @param {string} $str
		* @return true if $str is made by sigle byte return false
	*/
	function isSingleByte($str)
	{
		if (mb_strlen($str) != strlen($str)) {
			return false;
		}
		return true;
	}
	/**
		*Function delete "m" from "trim"
		* @param {string} $str
		* @return "tri"
	*/
	function demoRtrim($str)
	{
		return rtrim($str, 'm');
	}
	/**
		*Function delete "m" from "mirt"
		* @param {string} $str
		* @return "irt"
	*/
	function demoLtrim($str)
	{
		$str = strrev($str);
		return ltrim($str, 'm');
	}
	 
	function main() 
	{
		$str1 = "По своей природе";
		$str2 = "DOMINH";
		$str3 = "DOMINH";
		$trim = 'trim';
		echo "String str1: ".$str1."<br/>";
		echo "String str2: ".$str2."<br/>";
		echo "String str3: ".$str3."<br/>";
		echo "String trim: ".$str3."<br/>";
		writeBySingleQuote();
		writeByDoubleQuotes();
		if (findString($str2, $str3)) {
			echo "Ex2: str1 FOUND in $str3"."<br/>";
		} else {
			echo "Ex2: str1 NOT FOUND $str3"."<br/>";
		}
		if (findString($trim, $str3)) {
			echo "Ex2: trim FOUND in $str3"."<br/>";
		} else {
			echo "Ex2: trim NOT FOUND $str3"."<br/>";
		}
		if (isSingleByte($str1)) {
			echo "Ex3: str1 is single byte"."<br/>";
		} else {
			echo "Ex3: $str1 is multiple bytes"."<br/>";
		}
		echo "Ex4: Left trim 'trim': ".demoLtrim($trim)."<br/>";
		echo "Ex5: Right trim 'trim': ".demoRtrim($trim)."<br/>";
	}

	main();