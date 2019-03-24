<?php 

class CarritoBO
{
    private $idCar;
    private $statusCar;
    private $subTot;
    private $Total;
    private $idUsu;
    private $costoEnvioC;

    public function CarritoBO()
    {
        # code...
    }

    public function getIdCar(){
		return $this->idCar;
	}

	public function setIdCar($idCar){
		$this->idCar = $idCar;
    }
    
    public function getStatusCar(){
		return $this->statusCar;
	}

	public function setStatusCar($statusCar){
		$this->statusCar = $statusCar;
	}

	public function getSubTot(){
		return $this->subTot;
	}

	public function setSubTot($subTot){
		$this->subTot = $subTot;
	}

	public function getTotal(){
		return $this->Total;
	}

	public function setTotal($Total){
		$this->Total = $Total;
	}

	public function getIdUsu(){
		return $this->idUsu;
	}

	public function setIdUsu($idUsu){
		$this->idUsu = $idUsu;
	}

	public function getCostoEnvioC(){
		return $this->costoEnvioC;
	}

	public function setCostoEnvioC($costoEnvioC){
		$this->costoEnvioC = $costoEnvioC;
    }
    
}












?>