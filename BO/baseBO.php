<?php

///teste teste
//teste




class baseBO{
	public function baseBO(){}
	public function getDTO($dto,$path=""){
		include_once ($path."DTO/".$dto."DTO.php");
		$class = $dto."DTO";
		return new $class();
	}
	public function getBO($bo,$dto,$path=""){
		include_once ($path."BO/".$bo."BO.php");
		include_once ($path."DTO/".$bo."DTO.php");
		include_once ($path."DAO/".$bo."DAO.php");
		$class = $bo."BO";
		return new $class($dto);
	}
	
	public function getDAO($bo,$dto,$path=""){
		include_once ($path."DTO/".$bo."DTO.php");
		include_once ($path."DAO/".$bo."DAO.php");
		$class = $bo."DAO";
		return new $class($dto);
	}

	public function ToString($str=""){
		echo "<pre>";
		if($str!="")
			print_r($str);
		else
			print_r($this);
		echo "</pre>";
	}

}
?>
