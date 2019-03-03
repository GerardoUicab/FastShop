<?php 

  class Conexion
 {
     public function conectar()
     {
         try{
             /*conecta a la base de datos */
             $conex=new PDO("mysql:host=localhost; dbname=fastshop","root","");
             $conex->exec("set names utf8");
             return $conex;
             

         }catch(PDOException $e){
             /*devuelve el error si no se conecta en la base de datos */
             die($e->getMessage());

         }
     }    
 }
 ?>