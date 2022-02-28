<?php
class BaseModel extends Database
{
	protected $connect;

	public function __construct(){
		$this->connect = $this->connect();
	}
	public function select($table, $select = ['*'], $orderBys = []){
		
		$columns = implode(',', $select);
		$orderByString = implode(' ', $orderBys);
		if($orderByString){
			$sql = "SELECT ${columns} FROM ${table} ORDER BY ${orderByString}";
		}else{
			$sql = "SELECT ${columns} FROM ${table}";
		}
		//echo $sql;

		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function find($table, $column, $s = ''){
		$sql = "SELECT * FROM ${table} WHERE ${column} LIKE '%${s}%'";

		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function selectById($table, $id){
		$sql = "SELECT * FROM ${table} WHERE id_${table} = ${id}";

		//echo $sql;
		$query = $this->_query($sql);
		$data = null;
		if($query != null){
			$data = mysqli_fetch_array($query, 1);
		}
		return $data;
	}
	public function sum($table, $select ,$column, $id, $column1, $action){
		$sql = "SELECT SUM(${select}) AS total FROM ${table} WHERE ${column} = ${id} AND ${column1} = '${action}'";
		
		$query = $this->_query($sql);
		$data = null;
		if($query != null){
			$data = mysqli_fetch_array($query, 1);
		}
		return $data;
	}
	public function selectByIdLink($table, $column, $id){
		$sql = "SELECT * FROM ${table} WHERE ${column} = ${id}";

		//echo $sql;
		$query = $this->_query($sql);
		$data = null;
		if($query != null){
			$data = mysqli_fetch_array($query, 1);
		}
		return $data;
	}
	public function selectByIdAllRecord($table, $column, $id){
		$sql = "SELECT * FROM ${table} WHERE ${column} = ${id}";

		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}
	public function selectJoinById($table, $table1, $select = [''], $select1 = [''], $id, $name_column, $id_key){
		$unite = [];
		$unite1 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}

		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		
		$sql = "SELECT ${final}, ${final1} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id WHERE ${name_column} = '${id_key}'";

		$query = $this->_query($sql);
		$data = null;
		if($query != null){
			$data = mysqli_fetch_array($query, 1);
		}
		return $data;
	}
	public function selectAllJoinById($table, $table1, $select = [''], $select1 = [''], $id, $name_column, $id_key){
		$unite = [];
		$unite1 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}

		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		
		$sql = "SELECT ${final}, ${final1} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id WHERE ${name_column} = '${id_key}'";

		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}
	public function selectJoinByName($table, $table1, $select = [''], $select1 = [''], $id, $name_column, $name){
		$unite = [];
		$unite1 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}

		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		
		$sql = "SELECT ${final}, ${final1} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id WHERE ${name_column} LIKE '%${name}%' LIMIT 8";
		
		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function innerjoin($table, $table1, $select = [''], $select1 = [''], $id){
		$unite = [];
		$unite1 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}

		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		
		$sql = "SELECT ${final}, ${final1} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id";
		
		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function innerjoinPaging($table, $table1, $select = [''], $select1 = [''], $id, $limit, $page){

		$firstIndex = ($page-1)*$limit;
		$unite = [];
		$unite1 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}

		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		
		$sql = "SELECT ${final}, ${final1} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id LIMIT ${firstIndex} , ${limit}";
		
		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function triplejoin($table, $table1, $table2, $select = [''], $select1 = [''], $select2 = [''], $id, $id1){
		
		$unite = [];
		$unite1 = [];
		$unite2 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}
		for($i=0; $i<count($select2); $i++){
			$unite2[] = $table2.'.'.$select2[$i];
		}
		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		$final2 = implode(",", $unite2);
		
		$sql = "SELECT ${final}, ${final1}, ${final2} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id RIGHT JOIN ${table2} ON ${table}.$id1 = ${table2}.$id1";

		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function triplejoinPaging($table, $table1, $table2, $select = [''], $select1 = [''], $select2 = [''], $id, $id1, $limit, $page){
		$firstIndex = ($page-1)*$limit;

		$unite = [];
		$unite1 = [];
		$unite2 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}
		for($i=0; $i<count($select2); $i++){
			$unite2[] = $table2.'.'.$select2[$i];
		}
		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		$final2 = implode(",", $unite2);
		
		$sql = "SELECT ${final}, ${final1}, ${final2} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id RIGHT JOIN ${table2} ON ${table}.$id1 = ${table2}.$id1 LIMIT ${firstIndex} , ${limit}";

		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function triplejoinById($table, $table1, $table2, $select = [''], $select1 = [''], $select2 = [''], $id, $id1, $id_account){
		

		$unite = [];
		$unite1 = [];
		$unite2 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}
		for($i=0; $i<count($select2); $i++){
			$unite2[] = $table2.'.'.$select2[$i];
		}
		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		$final2 = implode(",", $unite2);
		
		$sql = "SELECT ${final}, ${final1}, ${final2} FROM ${table} INNER JOIN ${table1} ON ${table}.$id = ${table1}.$id RIGHT JOIN ${table2} ON ${table}.$id1 = ${table2}.$id1 WHERE ${table2}.id_account = ${id_account}";

		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function insert($table, $select = [''], $data = ['']){
		$columns = implode(",", $select); 
		$values = implode("','", $data);
		$sql = "INSERT INTO ${table}($columns) VALUES ('${values}');";

		//echo $sql;
		$query = $this->_query($sql);
	}

	public function delete($table, $id){
		$sql = "DELETE FROM ${table} where id_${table} = ${id}";
		//echo $sql;
		$query = $this->_query($sql);
	}

	public function deleteLink($table, $select, $id, $select1, $id1){
		$sql = "DELETE FROM ${table} where ${select} = ${id} AND ${select1} = ${id1}";
		//echo $sql;
		$query = $this->_query($sql);
	}

	public function update($table, $select = [''], $data = [''], $id){
		function combined($n, $m){
			return "${n} = '${m}'";
		}
		$unite = array_map('combined', $select, $data);
		
		$final = implode(",", $unite);

		$sql = "UPDATE ${table} SET ${final} WHERE id_${table} = ${id}";
		//echo $sql;

		$query = $this->_query($sql);
	}

	public function updateAccRole($table, $selectColumn, $selectColumn1, $select = [''], $data = [''], $id, $id1){
		function combined($n, $m){
			return "${n} = '${m}'";
		}
		$unite = array_map('combined', $select, $data);
		
		$final = implode(",", $unite);
		$sql = "UPDATE ${table} SET ${final} WHERE id_${selectColumn} = ${id} AND id_${selectColumn1} = ${id1}";
		
		echo $sql;

		$query = $this->_query($sql);
	}

	public function pagination($table, $limit, $page){
		$firstIndex = ($page-1)*$limit;

		$sql = "SELECT * FROM ${table} where 1 limit ${firstIndex} , ${limit}";
		
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}
	public function check($table, $table1, $select = [], $select1 = [], $id, $username, $password){
		$unite = [];
		$unite1 = [];

		for($i=0; $i<count($select); $i++){
			$unite[] = $table.'.'.$select[$i];
		}
		for($i=0; $i<count($select1); $i++){
			$unite1[] = $table1.'.'.$select1[$i];
		}
		$final = implode(",", $unite);
		$final1 = implode(",", $unite1);
		
		$sql = "SELECT ${final}, ${final1} FROM ${table} LEFT JOIN ${table1} ON ${table}.$id = ${table1}.$id WHERE ${table}.userName = '${username}' AND ${table}.passWord = '${password}'" ;
		//echo $sql;
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public function _query($sql){
		return mysqli_query($this->connect, $sql);
	}
}