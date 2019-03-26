<?php 

class CalificarBO
{
    private $idCalificar;
    private $idCarrito;
    private $titulo;
    private $comentario;
    private $calificacion;

    public function CalificarBO()
    {

    }
    public function getIdCalificar(){
		return $this->idCalificar;
	}

	public function setIdCalificar($idCalificar){
		$this->idCalificar = $idCalificar;
	}

	public function getIdCarrito(){
		return $this->idCarrito;
	}

	public function setIdCarrito($idCarrito){
		$this->idCarrito = $idCarrito;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getComentario(){
		return $this->comentario;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}

	public function getCalificacion(){
		return $this->calificacion;
	}

	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion;
	}






}















?>