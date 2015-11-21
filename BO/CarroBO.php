<?
include_once("BO/baseBO.php");
include_once("DAO/CarroDAO.php");
include_once("DTO/CarroDTO.php");
//zx\zx
class CarroBO extends baseBO{

	private $carroDTO;

	public function CarroBO(CarroDTO $carroDTO){
		$this->carroDTO=$carroDTO;
	}

	public function Create(){

		$dao =new CarroDAO($this->carroDTO);
		return $dao->Create();

	}

	public function Read(){

		$carroDAO = new CarroDAO($this->carroDTO);
		$list = array();
		
		$list = $carroDAO->Read();
		
						
						
						
						
			
		
		return $list;
	}
	
	public function Update(){

			$dao = new CarroDAO($this->carroDTO);
			$dao->Update();
	} 

	public function Delete(){

			$dao=new CarroDAO($this->carroDTO);
			$dao->Delete();

	}
	
	public function parseSql($sql){
		$dao=new CarroDAO();
		return $dao->parseSql($sql);
	} 

}
?>
