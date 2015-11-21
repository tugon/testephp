<?

class CarroDTO{


			private $id;
			private $idmarca;
			private $modelo;
			private $ano;
	



		public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}	 

		public function getIdmarca(){
		return $this->idmarca;
	}
	
	public function setIdmarca($idmarca){
		$this->idmarca = $idmarca;
	}	 

		public function getModelo(){
		return $this->modelo;
	}
	
	public function setModelo($modelo){
		$this->modelo = $modelo;
	}	 

		public function getAno(){
		return $this->ano;
	}
	
	public function setAno($ano){
		$this->ano = $ano;
	}	 


public function CarroDTO(){
	
	
		$this->id = null;
	
		$this->idmarca = null;
	
		$this->modelo = null;
	
		$this->ano = null;
	}

}
?>
