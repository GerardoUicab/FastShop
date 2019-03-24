<?php 

class GaleriaArtBO
{
    private $idFoto;
    private $nombreFoto;
    private $idArt;

    public function GaleriaArtBO()
    {
        # code...
    }

    public function getIdFoto(){
		return $this->idFoto;
	}

	public function setIdFoto($idFoto){
		$this->idFoto = $idFoto;
	}

	public function getNombreFoto(){
		return $this->nombreFoto;
	}

	public function setNombreFoto($nombreFoto){
		$this->nombreFoto = $nombreFoto;
	}

	public function getIdArt(){
		return $this->idArt;
	}

	public function setIdArt($idArt){
		$this->idArt = $idArt;
	}

}








?>