<?php
 class CarruselBO
 {

    private $id;
    private $NombreFoto;


    public function CarruselBO()
    {

    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombreFoto(){
		return $this->NombreFoto;
	}

	public function setNombreFoto($NombreFoto){
		$this->NombreFoto = $NombreFoto;
	}



 }








?>