<?php
include_once("DB/DB.php");
include_once("DB/mysql.php");
class baseDAO{
	public $conn;
	public function baseDAO(){
		if($_SERVER["SERVER_NAME"]=="localhost")
		$this->conn=Connection::factory("mysql","dbName","localhost","root","","");
		else
		$this->conn=Connection::factory("mysql","dbName","localhost","root","","");
	}

	public function parseSql($sql){
		$this->conn->query($sql);
		return $this->getList();
	}

	public function exec($sql){
		$this->conn->exec($sql);
	}
	
	public function execute($sql){
		$this->conn->exec($sql);
	}

	public function setDBNull($value){
		if($value!="" && $value!=null){
			switch(strtolower(gettype($value))){
				case "string" :
					return "'".addslashes($value)."'";
					break;
				default:
					return $value;
					break;
			}
		}else{

			return "null";
		}
	}

	public function ToString($str){
		echo "<pre>";
		print_r($str);
		echo "</pre>";
	}
}
?>
