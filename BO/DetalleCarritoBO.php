<?php

class DetalleCarritoBO
{
    private $idDetalleCarrito;
    private $piezasProduc;
    private $precioProducto;
    private $idArticulo;
    private $idUsuario;
    private $statusDetalleCarrito;
    private $costoEnvioD;



    public function DetalleCarritoBO()
    {
        
    }

    public function getCostoEnvioD(){
      return $this->costoEnvioD;
    }
  
    public function setCostoEnvioD($costoEnvioD){
      $this->costoEnvioD = $costoEnvioD;
    }
    public function getIdDetalleCarrito()
    {
		return $this->idDetalleCarrito;
    }
    
    public function setIdDetalleCarrito($dato)
    {
		$this->idDetalleCarrito = $dato;
    }


    public function getPiezasProduc()
    {
		return $this->piezasProduc;
    }
    
    public function setPiezasProduc($dato)
    {
		$this->piezasProduc = $dato;
    }


    public function getPrecioProducto()
    {
		return $this->precioProducto;
    }
    
    public function setPrecioProducto($dato)
    {
		$this->precioProducto = $dato;
    }



    public function getidArticulo()
    {
		return $this->idArticulo;
    }
    
    public function setIdArticulo($dato)
    {
		$this->idArticulo = $dato;
    }



    public function getIdUsuario()
    {
		return $this->idUsuario;
    }
    
    public function setIdUsuario($dato)
    {
		$this->idUsuario = $dato;
    }


    

    public function getStatusDetalleCarrito()
    {
		return $this->statusDetalleCarrito;
    }
    
    public function setStatusDetalleCarrito($dato)
    {
		$this->statusDetalleCarrito = $dato;
    }

}





?>