<?php include '../DAO/Conexion.php'; ?>
<?php

$conex=Conexion::conectar();
$idArticulo=$_REQUEST['id_Articulo'];

$cmd="select a.NombreArt,a.ReseñaArt,a.FotoArt,a.CostoEnvio,u.Nombre,
c.NombreCategoria,m.NombreMarca,cm.precio,cm.stock,
cr.NombreCarac,d.NombreDominio
from articulo a, usuario u, categoria c, marca m,combinacion cm, caracteristicas cr, dominio d
where a.id_Categoria=c.id_Categoria and a.id_Marca=m.id_Marca 
and a.id_Usuario=u.id_Usuario and cm.id_Articulo=a.id_Articulo 
and cr.id_Carac=(select id_Carac from artcarac where id_Articulo=a.id_Articulo) and d.id_UsuarioDomi=a.id_Articulo
and a.id_Articulo='$idArticulo'";
$lista=$conex->query($cmd);



$dato[]=array();

foreach($lista as $pro)
{
    $dato[]=$pro;
}
echo json_encode($dato);






?>