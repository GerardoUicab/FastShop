<?php

class CombinacionBO
{
    private $idCombinacion;
    private $precio;
    private $stock;
    private $idArticulo;

    public function CombinacionBO()
    {
        # code...
    }

    public function getIdCombinacion(){
		return $this->idCombinacion;
	}

	public function setIdCombinacion($idCombinacion){
		$this->idCombinacion = $idCombinacion;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getStock(){
		return $this->stock;
	}

	public function setStock($stock){
		$this->stock = $stock;
	}

	public function getIdArticulo(){
		return $this->idArticulo;
	}

	public function setIdArticulo($idArticulo){
		$this->idArticulo = $idArticulo;
	}



}







?>