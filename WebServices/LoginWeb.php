<?php include '../DAO/Conexion.php'; ?>
<?php

$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];

$cnx=Conexion::conectar();


$sql=$cnx->query("SELECT * FROM usuario where Email='$email' and Contrasenia='$pass' and id_TipoUsu=2");

$usuario=Array();

foreach($sql as $datos)
{
    $usuario[]=$datos;
    
}
echo json_encode($usuario);
?>