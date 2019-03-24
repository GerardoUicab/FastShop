<?php

class CaracArticuloBO
{
    private $idCaracArt;
    private $idArticulo;
    private $idCarac;
    private $idDominio;
		private $nombreDominio;
		private $idUsuario;

    public function CaracArticuloBO()
    {
        
    }

		public function getIdUsuario(){
			return $this->idUsuario;
		}
	
		public function setIdUsuario($valor){
			$this->idUsuario = $valor;
		}
    public function getIdCaracArt(){
		return $this->idCaracArt;
	}

	public function setIdCaracArt($idCaracArt){
		$this->idCaracArt = $idCaracArt;
	}

	public function getIdArticulo(){
		return $this->idArticulo;
	}

	public function setIdArticulo($idArticulo){
		$this->idArticulo = $idArticulo;
	}

	public function getIdCarac(){
		return $this->idCarac;
	}

	public function setIdCarac($idCarac){
		$this->idCarac = $idCarac;
	}

	public function getIdDominio(){
		return $this->idDominio;
	}

	public function setIdDominio($idDominio){
		$this->idDominio = $idDominio;
	}

	public function getNombreDominio(){
		return $this->nombreDominio;
	}

	public function setNombreDominio($nombreDominio){
		$this->nombreDominio = $nombreDominio;
	}





}





?>

