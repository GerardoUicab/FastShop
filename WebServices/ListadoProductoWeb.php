<?php include '../DAO/Conexion.php'; ?>
<?php
$cnx=Conexion::conectar();

$cmdProducto="select a.id_Articulo, a.NombreArt,a.FotoArt,a.costoEnvio,u.nombre,c.precio,c.stock 
	from 
	articulo a,combinacion c, usuario u 
    where a.id_Usuario=u.id_Usuario 
    and c.id_Articulo=a.id_Articulo and a.StatusArt='Públicado' 
    and c.stock !=0 order by a.id_Articulo desc";
$listaProducto=$cnx->query($cmdProducto);
$dato=array();
$asignar=array();

foreach($listaProducto as $producto)
{
    $dato[]=$producto;
}
$asignar['Productos']=$dato;
echo json_encode($asignar,JSON_PRETTY_PRINT);





?>