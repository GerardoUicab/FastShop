<?php
    include '../BO/usuarioBO.php';

    class UsuarioDAO
    {

        
        public function UsuarioDAO()
        {

        }

        public function insertar($objusu)
        {
            $con=Conexion::conectar();
            $nombre=$objusu->getNombre();
            $email=$objusu->getEmail();
            $contraseña=$objusu->getContraseña();
            $idTipoUsu=$objusu->getIdTipoUsu();
            $comando=("insert into usuario (id_TipoUsu,Nombre,Contrasenia,Email) values ('$idTipoUsu','$nombre','$contraseña','$email')");
            
            
            if(!$con->query($comando))
            {
                print 'error al insertar';
            }
            else
            {
                print '<script languaje="JavaScript">alert("se creo la cuenta");</script>';
                
            }

            $con=null;

        }




    }



?>