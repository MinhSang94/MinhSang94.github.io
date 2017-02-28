<?php
	/**
	* 
	*/
	class MisaModelDatabase
	{
		private $conn;
		private $table;
		private $sql;
		private $maps;

		function __construct($table = null)
		{
			$this->connect();
			$this->maps = $this->maps();
			$this->table = $table;
		}

		public function connect()
		{
			try {
				$this->conn = new PDO(
					MisaControllerBase::$config['db']['connectionString'], 
					MisaControllerBase::$config['db']['username'], 
					MisaControllerBase::$config['db']['password']
				);
				$this->conn->setAttribute(
					PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION
				);
				$this->conn->exec("SET character_set_results = utf8");
				$this->conn->query("SET NAMES utf8");
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function findAll($condition = null, $param = null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT * FROM $this->table";
					if ($condition) {
						$sql .= "WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					$stmt->execute($param);
					return $stmt->fetchAll(PDO::FETCH_OBJ);
				} else {
					throw MisaLog::write($e);
				}
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function find($condition = null, $param = null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT * FROM $this->table";
					if ($condition) {
						$sql .= " WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					$stmt->execute($param);
					return $stmt->fetch(PDO::FETCH_OBJ);
				} else {
					throw MisaLog::write($e);
				}
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function findAllWithColumn($column = '*', $condition = null, $param = null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT $column FROM $this->table";
					if ($condition) {
						$sql .= "WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					echo count($param);
					$stmt->execute($param);
					return $stmt->fetchAll(PDO::FETCH_OBJ);
				} else {
					throw MisaLog::write($e);
				}
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function findWithColumn($column = '*', $condition =null, $param =null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT $column FROM $this->table";
					if ($condition) {
						$sql .= "WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					$stmt->execute($param);
					return $stmt->fetch(PDO::FETCH_OBJ);
				} else {
					throw MisaLog::write($e);
				}
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function findALlBySql($sql, $param = null)
		{
			try {
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($param);
				return $stmt->fetchAll(PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function findBySql($sql, $param = null)
		{
			try {
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($param);
				return $stmt->fetch(PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function getCount($column = '*', $condition = null, $param =null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT count($column) FROM $this->table";
					if ($condition) {
						$sql .= "WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					$stmt->execute($param);
					return $stmt->fetchColumn();
				} else {
					throw MisaLog::write($e);
				}
			} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
		}
		
		public function __destruct()
		{
			$this->conn = null;
		}

		public function select($column = '*')
		{
			$this->sql = "SELECT $column";
			return $this;
		}

		public function from($table)
		{
			$this->sql .= " FROM $table";
		}
	     
	    public function join($table, $on)
	    {
	    	$this->sql .= " JOIN $table ON $on";
	    }
	     
	    public function where($condition)
	    {
	    	$this->sql .= ($condition != '') ? $condition : '';
	    	return $this;
	    }
	     
	    // public function searchCondition()
	    // {

	    // }
	     
	    // public function searchCondition()
	    // {
	    //     $condition = array(
	    //         'condition' => '',
	    //         'param' => array()
	    //     );
	    //     foreach($this->maps as $attr => $detail){
	    //         if($this->$attr != null && trim($this->$attr) != ''){
	    //             if($condition['condition'] != ''){
	    //                 $condition['condition'] .= (isset($detail['operator']) ? $detail['operator'] : ' and ') . $this->tableAlias . '.' . $attr;
	    //             }else{
	    //                 $condition['condition'] .= $this->tableAlias . '.' . $attr;
	    //             }
	    //             if(isset($detail['match']) && $detail['match']){
	    //                 $condition['condition'] .= ' = :s_' . $attr;
	    //                 $condition['param'][':s_' . $attr] = $this->$attr;
	    //             }else{
	    //                 $condition['condition'] .= ' like :s_' . $attr;
	    //                 $condition['param'][':s_' . $attr] = '%' . $this->$attr . '%';
	    //             }
	    //         }
	    //     }
	    //     return $condition;
	    // }
	    public function groupBy($group)
	    {
	    	$this->sql .= " GROUP BY $group";
	    	return $this;
	    }
	    
	    public function having($having)
	    {
	    	$this->sql .= " HAVING $having";
	    	return $this;
	    }
	    
	    public function orderBy($order)
	    {
	    	$this->sql .= " ORDER BY $order";
	    	return $this;
	    }
	    
	    public function limit($offset, $count)
	    {
	    	$this->sql .= " LIMIT $offset, $count";
	    	return $this;
	    }
	     
	    public function execute($param = null)
	    {
	    	try {
	    		$this->stmt = $this->conn->prepare($this->sql);
	    		$this->stmt->execute();
	    		return $this;
	    	} catch (PDOException $e) {
	    		throw MisaLog::write($e);
	            return null;
	    	}
	    }
	    public function fetch($fetchMode = PDO::FETCH_OBJ)
	    {
	    	try {
	    		return $this->stmt->fetch($fetchMode);
	    	} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
	    }
	     
	     
	    public function fetchAll($fetchMode = PDO::FETCH_OBJ)
	    {
	        try {
	        	return $this->sth->fetchAll($fetchMode);
	        } catch (PDOException $e) {
				throw MisaLog::write($e);
			}
	    }
	    
	    public function insert()
	    {
	    	try {
	    		$this->beforeInsert();
		    	$sql = "INSERT INTO $this->table (";
		    	$param = array();
		    	$values = ") VALUES(";
		    	foreach ($this->maps as $key => $value) {
		    		$sql .= "$value[0], ";
		    		$values .= ":$value[0], ";
		    		$param[":$value[0]"] = $this->$key;
		    	}
		    	$sql = substr($sql, 0, strlen($sql) - 2);
		    	$values = substr($values, 0, strlen($values) - 2) . ')';
		    	$sql = $sql.$values;
		    	var_dump($param);
		    	$stmt = $this->conn->prepare($sql);
		    	return $stmt->execute($param);
	    	} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
	    }
	    
	    public function update($condition = null, $param = array())
	    {
	    	try {
		    	$this->beforeUpdate();
		    	$param = array();
		    	$values = '';
		    	$sql = "UPDATE $this->table SET ";
		    	foreach ($this->maps as $key => $value) {
		    		if ($this->$key != null && strpos($key, 'id') === false) {
		    			$sql .= "$key = :$value[0], ";
		    			$param[":$value[0]"] = $this->$key;
		    		}
		    	}
		    	$sql = substr($sql, 0, strlen($sql) - 2);
		    	if ($condition) {
		    		$sql .= " WHERE $condition";
		    	}
		    	$stmt = $this->conn->prepare($sql);
		    	return $stmt->execute($param);
	    	} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
	    }
	    public function updateByColumns($columns, $condition = null, $param = array())
	    {
	    	try {
	    		$sql = "UPDATE $this->table SET $columns";
		    	if ($condition) {
		    		$sql .= " WHERE $condition";
		    	}
		    	$stmt = $this->conn->prepare($sql);
		    	return $stmt->execute($param);
	    	} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
	    }
	    
	    public function delete($condition = null, $param = array())
	    {
	    	try {
	    		$sql = "DELETE FROM $this->table";
		    	if ($condition) {
		    		$sql .= " WHERE $condition";
		    	}
		    	$stmt = $this->conn->prepare($sql);
		    	return $stmt->execute();
	    	} catch (PDOException $e) {
				throw MisaLog::write($e);
			}
	    }
	}