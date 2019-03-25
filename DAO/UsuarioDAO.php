<?php
include '../BO/usuarioBO.php';

class UsuarioDAO
{


    public function UsuarioDAO()
    { }

    public function insertar($objusu)
    {
        $con = Conexion::conectar();
        $nombre = $objusu->getNombre();
        $email = $objusu->getEmail();
        $contraseña = $objusu->getContraseña();
        $idTipoUsu = $objusu->getIdTipoUsu();
        $comando = "insert into usuario (id_TipoUsu,Nombre,Contrasenia,Email) values ('$idTipoUsu','$nombre','$contraseña','$email')";


        if (!$con->query($comando)) {
                print 'error al insertar';
            } else {
                print '<script languaje="JavaScript">alert("se creo la cuenta");</script>';
            }

        $con = null;
    }
    public function InsertarAdmin($objusu)
    {
        $con = Conexion::conectar();
        $nombre = $objusu->getNombre();
        $email = $objusu->getEmail();
        $contraseña = $objusu->getContraseña();
        $idTipoUsu = $objusu->getIdTipoUsu();
        $comando = "insert into usuario (id_TipoUsu,Nombre,Contrasenia,Email) values ('$idTipoUsu','$nombre','$contraseña','$email')";


        if (!$con->query($comando)) {
                print 'error al insertar';
            } else {
                print '<script languaje="JavaScript">alert("se creo la cuenta");</script>';
            }

        $con = null;
    }

    public function ModificarFoto($objfoto)
    {
        $conex = Conexion::conectar();
        $nombre = $objfoto->getFoto();
        $idUsuario = $objfoto->getId();
        $comando = "update Usuario set fotoUsuario='$nombre' where id_Usuario=$idUsuario";
        if (!$conex->query($comando)) {

                echo '<script>swal("Advertencia", "No se pudo modificar su foto","warning");</script>';
            } else {

                echo '<script>swal(
                    {
                        title:"Exito",
                        text: "Usted modifico su foto correctamente",
                        icon: "success",
                        button:"Aceptar",
                    }
                ).then((value)=>
                {
                    window.location.replace("EditarUsuario.php");
                });</script>';
            }
        $conex = null;
    }
    public function ModificarDatos($objmodificar)
    {
        $conex = Conexion::conectar();
        $nom = $objmodificar->getNombre();
        $apelli = $objmodificar->getApellido();
        $email = $objmodificar->getEmail();
        $contra = $objmodificar->getContraseña();
        $idusu = $objmodificar->getId();

    $cmd = "UPDATE usuario set Nombre='$nom', Apellido='$apelli', Contrasenia='$contra', Email='$email' where id_Usuario='$idusu'";

        if (!$conex->query($cmd)) {
                echo '<script>swal("Advertencia", "No se pudo modificar su foto","warning");</script>';
            } else {
               
                echo '<script>
                swal(
                    {
                        title: "Exito",
                        text: "Usted modifico sus datos",
                        icon: "success",
                        button: "Aceptar",
                    }).then((value)=>
                    {
                        window.location.replace("EditarUsuario.php");
                    });</script>';
            }

        $conex = null;
    }
}
 