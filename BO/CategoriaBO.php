<?php

class CategoriaBO
{
    public $id;
    public $nombre;
    public $id_sub=null;


    public function CategoriaBO()
    {

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($valor)
    {
        $this->id=$valor;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($valor)
    {
        $this->nombre=$valor;
    }
    public function getId_sub()
    {
       return $this->id_sub;
    }

    public function setId_sub($valor){
        $this->id_sub=$valor;
    }

    
}
?>