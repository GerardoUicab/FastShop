<?php
    include '../BO/usuarioBO.php';
    include 'Conexion.php';

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
            $comando="insert into usuario (id_TipoUsu,Nombre,Contrasenia,Email) values ('$idTipoUsu','$nombre','$contraseña','$email')";
            

            if(!$con->query($comando))
            {
                print 'error al insertar'.$comando;
            }
            else
            {
                print '<div class="alert alert-danger">Guardado con exito</div>';
            }

            $con=null;

        }

        public function mostrar()
        {
            $con=Conexion::conectar();
            $comando="select * from usuario";
            $con->execute($comando);
        }



    }



?>