<?php  #endregion

class usuario
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $contraseña;
    private $foto;
    private $idTipoUsu;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getContraseña(){
		return $this->contraseña;
	}

	public function setContraseña($contraseña){
		$this->contraseña = $contraseña;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getIdTipoUsu(){
		return $this->idTipoUsu;
	}

	public function setIdTipoUsu($idTipoUsu){
		$this->idTipoUsu = $idTipoUsu;
	}
    




}