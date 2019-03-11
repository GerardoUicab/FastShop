<?php 

class usuarioBO
{
    private $id;
    private $nombre;
		private $email;
		private $apellido;
		private $foto;
    private $contraseña;
		private $idTipoUsu=2;
		
		public function usuarioBO()
		{

		}

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
	
		public function getIdTipoUsu(){
			return $this->idTipoUsu;
		}
	
		public function setIdTipoUsu($idTipoUsu){
			$this->idTipoUsu = $idTipoUsu;
		}
		public function getFoto(){
			return $this->foto;
		}
	
		public function setFoto($foto){
			$this->foto = $foto;
		}
		public function getApellido(){
			return $this->id;
		}
	
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
}
?>