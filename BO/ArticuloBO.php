<?php

class ArticuloBO
{
    private $idArticulo;
    private $nombreArticulo;
    private $fotoArticulo;
    private $ReseñaArticulo;
    private $precio;
    private $Idmarca;
    private $categoria;
    private $fechaSubido;
    private $idUsuario;

    public function ArticuloBO()
    {
       
    }

    public function getIdArticulo(){
		return $this->idArticulo;
	}

    public function setIdArticulo($idArticulo)
    {
		$this->idArticulo = $idArticulo;
    }
    public function getNombreArticulo(){
		return $this->nombreArticulo;
	}

	public function setNombreArticulo($nombreArticulo){
		$this->nombreArticulo = $nombreArticulo;
	}

	public function getFotoArticulo(){
		return $this->fotoArticulo;
	}

	public function setFotoArticulo($fotoArticulo){
		$this->fotoArticulo = $fotoArticulo;
	}

	public function getReseñaArticulo(){
		return $this->ReseñaArticulo;
	}

	public function setReseñaArticulo($ReseñaArticulo){
		$this->ReseñaArticulo = $ReseñaArticulo;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getIdmarca(){
		return $this->Idmarca;
	}

	public function setIdmarca($Idmarca){
		$this->Idmarca = $Idmarca;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getFechaSubido(){
		return $this->fechaSubido;
	}

	public function setFechaSubido($fechaSubido){
		$this->fechaSubido = $fechaSubido;
	}

    public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}


}



?>