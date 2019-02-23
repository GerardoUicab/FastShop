<?php

class EstadoBO
{
    private $id;
    private $nombre;
    private $idPais=null;

    public function EstadoBO()
    {

    }

    public function getId()
    {
        return $this->id;

    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getIdPais()
    {
        return $this->idPais;
    }

    public function setId($valor)
    {
        $this->id=$valor;
    }
    public function setNombre($valor)
    {
        $this->nombre=$valor;
    }
    public function setIdPais($valor)
    {
        $this->idPais=$valor;
    }





}