<?php 

class usuarioBO
{
    public $id;
    public $nombre;
    public $email;
    public $contraseña;
		public $idTipoUsu;
		
		public function usuarioBO()
		{

		}

    public function getId(){
		return $this->id;
	}

	public function setId($valor)
	{
		$this->id = $valor;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($valor){
		$this->nombre = $valor;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($valor){
		$this->email = $valor;
	}

	public function getContraseña(){
		return $this->contraseña;
	}

	public function setContraseña($valor){
		$this->contraseña = $valor;
	}

	public function getIdTipoUsu(){
		return $this->idTipoUsu;
	}

	public function setIdTipoUsu($valor){
		$this->idTipoUsu = $valor;
	}
}
?>