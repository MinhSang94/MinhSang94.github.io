<?php
	/** 
		* Function validate variable 
		* @param {variable} $param
		* @return true if param is an array else return false
	*/
	function  validateParam($param)
	{
		if (!is_array($param)) {
			return false;
		}
		return true;
	}
	/** 
		* Function execute array check $param1 is an array? merge $param2, $param3 and delete duplicate value if $param2, $param3 are array
		* @param {array} $param1
		* @param {array} $param2
		* @param {array} $param3
		* @return merge $param2, $param3
	*/
	function executeArray($param1, $param2, $param3) {
		if (validateParam($param1)) {
			if (in_array(1, $param1)) {
				echo "1.Parameter 1 has value 1<br/>";
			} else {
				echo "1.Parameter 1 has not value 1<br/>";
			}
		}
		if (validateParam($param2) && validateParam($param3)) {
			$mergeReulst = array_merge($param2, $param3);
			$mergeReulst = array_unique($mergeReulst);
			$result = implode(', ', $mergeReulst);
			echo "2.Array after merge parameter 2 and parameter 3: ".$result.'<br/>';
			return $mergeReulst;
		}
	}
	/** 
		* Function check the sum of its digits is divisible by 2
		* @param {number} $var
		* @return $var if $var is an even number else not return;
	*/
	function even($var)
   	{
   		if (is_numeric($var)) {
   			if (strlen($var) == 1 && ($var % 2) == 0) {
				return($var);
	   		} elseif (strlen($var) != 1) {
	   			$sum = 0;
	   			for ($i = 0; $i < strlen($var); $i++) {
	   				$sum +=(int)$var[$i];
	   			}
	   			if($sum % 2 == 0) {
	   				return $var;
	   			}
	   		}
   		}
   	}
   	/**
		* Function find even number find all value of array that the sum of its digits is divisible by 2
		* @param {array} $array
		* @return even number in array
   	*/
	function findEvenNumber($array) 
	{
		if (validateParam($array)) {
			$result = array_filter($array, 'even');
			echo "3.Array after find even number: ".implode(', ', $result).'<br/>';
			return $result;
		}
	}
	/**
		* Function find all of value (sorted ascending) of the $paramFind array that exists in $paramSource
		* @param {array} $paramFind
		* @param {array} $paramSource
		* @return {array} $result
	*/
	function findValueInArray($paramFind, $paramSource) 
	{
		rsort($paramFind);
		$result = array_intersect($paramFind , $paramSource);
		echo "4.Array: ".implode(', ', $result).'<br/>';
		return $result;
	}
	/**
		* Function find all of value (sorted descending) of the $paramFind array, but its key is not in $paramSource
		* @param {array} $paramFind
		* @param {array} $paramSource
		* @return {array} $result
	*/
	function findKeyNotInArray($paramFind, $paramSource) 
	{
		rsort($paramFind);
		$result = array_diff_key($paramFind , $paramSource);
		echo "5.Array: ".implode(', ', $result).'<br/>';
		return $result;
	}
	function main()
	{
		$param1 = array(1, 2, 3, 4, 5);
		$param2 = array(1, 2, 3, 4, 5, 13);
		$param3 = array(7, 2, 3, 4, 6);
		echo "Array 1: [".implode(', ', $param1).']<br/>';
		echo "Array 2: [".implode(', ', $param2).']<br/>';
		echo "Array 3: [".implode(', ', $param3).']<br/>';
		$function4 = executeArray($param1, $param2, $param3);
		$function5 = findEvenNumber($function4);
		findValueInArray($param1, $function5);
		findKeyNotInArray($param1, $function5);
	}
	main();
