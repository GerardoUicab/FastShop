<?php
class MarcaBO
{
    private $id;
    private $nombre;
    private $fotoMarca;

    public function MarcaBO()
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

	public function getFotoMarca(){
		return $this->fotoMarca;
    }
    public function setFotoMarca($fotoMarca){
		$this->fotoMarca = $fotoMarca;
	}




}





?>