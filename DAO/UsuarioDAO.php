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
            $comando="insert into usuario (id_TipoUsu,Nombre,Contraseña,Email) values ($idTipoUsu,'$nombre','$contraseña','$email')";
            $prueba=$con->query($comando);

            if($prueba==0)
            {
                print 'error al insertar';
            }
            else
            {
                print '<div class="alert alert-danger">Guardado con exito</div>';
            }

            $con=null;

        }



    }



?>