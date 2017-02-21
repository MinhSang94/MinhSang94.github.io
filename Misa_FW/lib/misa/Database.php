<?php
	/**
	* 
	*/
	class MisaDatabase
	{
		private $conn;
		private $table;
		private $sql;
		private $maps;

		function __construct($table = null)
		{
			$this->connect();
			$this->maps = $this->map();
			$this->table = $table
		}

		public function connect()
		{
			try {
				$this->conn = new PDO(
					MisaBase::$config['db']['connectionString'], 
					MisaBase::$config['db']['username'], 
					MisaBase::$config['db']['password']
				);
				$this->conn->setAttribute(
					PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEOPTION
				);
				$this->conn->exec("SET character_set_results = utf8");
				$this->conn->query("SET NAMES utf8");
			} catch (PDOException $e) {
				throw new Exception("No connect to database!");
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
					throw new Exception("Table not found!");
				}
			} catch (PDOException $e) {
				throw new Exception("Wrong sql!");
			}
		}
		public function find($condition = null, $param = null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT * FROM $this->table";
					if ($condition) {
						$sql .= "WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					$stmt->execute($param);
					return $stmt->fetch(PDO::FETCH_OBJ);
				} else {
					throw new Exception("Table not found!");
				}
			} catch (PDOException $e) {
				throw new Exception("Wrong sql!");
			}
		}
		public function findAllWithColumn($column = '*', $condition =null, $param =null)
		{
			try {
				if ($this->table) {
					$sql = "SELECT $column FROM $this->table";
					if ($condition) {
						$sql .= "WHERE $condition";
					}
					$stmt = $this->conn->prepare($sql);
					$stmt->execute($param);
					return $stmt->fetchAll(PDO::FETCH_OBJ);
				} else {
					throw new Exception("Table not found!");
				}
			} catch (PDOException $e) {
				throw new Exception("Wrong sql!");
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
					throw new Exception("Table not found!");
				}
			} catch (PDOException $e) {
				throw new Exception("Wrong sql!");
			}
		}
		public function findALlBySql($sql, $param = null)
		{
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($param);
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		public function findBySql($sql, $param = null)
		{
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($param);
			return $stmt->fetch(PDO::FETCH_OBJ);
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
					throw new Exception("Table not found!");
				}
			} catch (PDOException $e) {
				throw new Exception($e;
			}
		}
		public function __destruct()
		{
			$this->conn = null;
		}
		public function select($column = '*'){
	        $this->sql = 'select ' . $column;
	        return $this;
	    }
	     
	    public function from($table){
	        $this->sql .= ' from ' . $table;
	        return $this;
	    }
	     
	    public function join($table, $on){
	        $this->sql .= ' join ' . $table . ' on ' . $on;  
	        return $this;
	    }
	     
	    public function where($condition){
	        $this->sql .= $condition != '' ? (' where ' . $condition) : '';
	        return $this;
	    }
	     
	    public function searchCondition(){
	        $condition = array(
	            'condition' => '',
	            'param' => array()
	        );
	        foreach($this->maps as $attr => $detail){
	            if($this->$attr != null && trim($this->$attr) != ''){
	                if($condition['condition'] != ''){
	                    $condition['condition'] .= (isset($detail['operator']) ? $detail['operator'] : ' and ') . $this->tableAlias . '.' . $attr;
	                }else{
	                    $condition['condition'] .= $this->tableAlias . '.' . $attr;
	                }
	                if(isset($detail['match']) && $detail['match']){
	                    $condition['condition'] .= ' = :s_' . $attr;
	                    $condition['param'][':s_' . $attr] = $this->$attr;
	                }else{
	                    $condition['condition'] .= ' like :s_' . $attr;
	                    $condition['param'][':s_' . $attr] = '%' . $this->$attr . '%';
	                }
	            }
	        }
	        return $condition;
	    }
	     
	    public function groupBy($group){
	        $this->sql .= ' group by ' . $group;
	        return $this;
	    }
	     
	    public function having($having){
	        $this->sql .= ' having ' . $having;
	        return $this;
	    }
	     
	    public function orderBy($order){
	        $this->sql .= ' order by ' . $order;
	        return $this;
	    }
	     
	    public function limit($offset, $count){
	        $this->sql .= ' limit ' . $offset . ', ' . $count;
	        return $this;
	    }
	     
	    public function execute($param = null){
	        try{
	            $this->sth = $this->conn->prepare($this->sql);
	            $this->sth->execute($param);
	            return $this;
	        }catch(PDOException $e){
	            throw new Exception($e);
	            return null;
	        }
	    }
	     
	    public function fetch($fetchMode = PDO::FETCH_OBJ){
	        return $this->sth->fetch($fetchMode);
	    }
	     
	    public function fetchAll($fetchMode = PDO::FETCH_OBJ){
	        return $this->sth->fetchAll($fetchMode);
	    }
	     
	    public function insert(){
	        $this->beforeInsert();
	        $sql = 'insert into '.$this->table.'(';
	        $param = array();
	        $values = '';
	        foreach($this->maps as $key => $value){
	            $sql .= $value[0] . ',';
	            $values .= ':' . $value[0] . ',';
	            $param[':' . $value[0]] = $this->$key;
	        }
	        $sql = substr($sql, 0, strlen($sql) - 1);
	        $values = substr($values, 0, strlen($values) - 1);
	        $sql .= ')values(' . $values . ')';
	        $sth = $this->conn->prepare($sql);
	        return $sth->execute($param);
	    }
	     
	    public function update($condition = null, $param = array()){
	        $this->beforeUpdate();
	        $fields = '';
	        $values = '';
	        $sql = 'update ' . $this->table . ' set ';
	        foreach($this->maps as $key => $value){
	            if($this->$key !== null){
	                $sql .= $value[0] . '=:_' . $value[0] . ',';
	                $param[':_' . $value[0]] = $this->$key;
	            }
	        }
	        $sql = substr($sql, 0, strlen($sql) - 1);
	        if($condition){
	            $sql .= ' where ' . $condition;
	        }
	        $sth = $this->conn->prepare($sql);
	        return $sth->execute($param);
	    }
	     
	    public function updateByColumns($columns, $condition = null, $param = array()){
	        $sql = 'update ' . $this->table . ' set ' . $columns;
	        if($condition){
	            $sql .= ' where ' . $condition;
	        }
	        $sth = $this->conn->prepare($sql);
	        return $sth->execute($param);
	    }
	     
	    public function delete($condition = null, $param = array()){
	        $sql = 'delete from '.$this->table;
	        if($condition){
	            $sql .= ' where ' . $condition;
	        }
	        $sth = $this->conn->prepare($sql);
	        return $sth->execute($param);
	    }
	}