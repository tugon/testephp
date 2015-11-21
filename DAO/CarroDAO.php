<?bbb
include_once("DAO/baseDAO.php");
include_once("DTO/CarroDTO.php");

class CarroDAO extends baseDAO{

	private $carroDTO;

	public function CarroDAO(CarroDTO $carroDTO){
		parent::baseDAO();
		$this->carroDTO = $carroDTO;
	}
 
	public function Create(){
try
			{
$sqlValues="";
$sqlFields="";
$sql="INSERT INTO Carro(";
if($this->carroDTO->getId()!=""){
	$sqlFields.="Id,";
	$sqlValues.="'".addslashes($this->carroDTO->getId())."',";
}
if($this->carroDTO->getIdmarca()!=""){
	$sqlFields.="IdMarca,";
	$sqlValues.="'".addslashes($this->carroDTO->getIdmarca())."',";
}
if($this->carroDTO->getModelo()!=""){
	$sqlFields.="Modelo,";
	$sqlValues.="'".addslashes($this->carroDTO->getModelo())."',";
}
if($this->carroDTO->getAno()!=""){
	$sqlFields.="Ano,";
	$sqlValues.="'".addslashes($this->carroDTO->getAno())."',";
}
$sql.=substr($sqlFields,0,-1).") VALUES (";
$sql.=substr($sqlValues,0,-1);
$sql.=")";
		
                $this->conn->exec($sql);
$this->carroDTO->set(mysql_insert_id());
return $this->carroDTO;

			}catch(Exception $e){
				throw $e;
			}
	}	


	public function Read(){


			try
			{

  		$list = array();
$sql="SELECT 	Id,
	IdMarca,
	Modelo,
	Ano FROM Carro WHERE ";

if($this->carroDTO->getId() != "")
		$sql.="Id='".addslashes( $this->carroDTO->getId() )."' AND ";
if($this->carroDTO->getIdmarca() != "")
		$sql.="IdMarca='".addslashes( $this->carroDTO->getIdmarca() )."' AND ";
if($this->carroDTO->getModelo() != "")
		$sql.="Modelo='".addslashes( $this->carroDTO->getModelo() )."' AND ";
if($this->carroDTO->getAno() != "")
		$sql.="Ano='".addslashes( $this->carroDTO->getAno() )."' AND ";
		
                $this->conn->query(substr($sql,0,-5));
		

                
		return $this->getList();
			}catch(Exception $e){
				throw $e;
			}
	}	
	
	private function Fill($row){
		$carro = new CarroDTO();
					
			$carro->setId( $row->Id);
					
			$carro->setIdmarca( $row->IdMarca);
					
			$carro->setModelo( $row->Modelo);
					
			$carro->setAno( $row->Ano);
				
		return $carro;
	}
	
	public function Update(){

try
			{

$sql="UPDATE Carro SET ";
//if($this->carroDTO->getId()!="")
	$sql.="Id = '".addslashes($this->carroDTO->getId())."',";
//if($this->carroDTO->getIdmarca()!="")
	$sql.="IdMarca = '".addslashes($this->carroDTO->getIdmarca())."',";
//if($this->carroDTO->getModelo()!="")
	$sql.="Modelo = '".addslashes($this->carroDTO->getModelo())."',";
//if($this->carroDTO->getAno()!="")
	$sql.="Ano = '".addslashes($this->carroDTO->getAno())."',";
$sql=substr($sql,0,-1);
$sql.=" WHERE =".$this->carroDTO->get()."";
                $this->conn->exec($sql);

			}catch(Exception $e){
				throw $e;
			}			

	} 

	public function Delete(){
try{
	$sql="DELETE FROM Carro ";
$sql.=" WHERE =".$this->carroDTO->get()."";
                $this->conn->exec($sql);

			}catch(Exception $e){
				throw $e;
			}
	} 
	
	public function getList(){
		$list = array();
		while($row=$this->conn->getObject()){
			$carro=$this->Fill($row);
			array_push($list,$carro);
		}

		$this->conn->free();
		return $list;
	}

	public function getOne(){
		$row=$this->conn->getObject();
		$carro=$this->Fill($row);

		$this->conn->free();
		return $carro;
	}

	}

?>
