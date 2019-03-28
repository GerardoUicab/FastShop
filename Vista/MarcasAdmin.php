<?php include 'headerAdmin.php'; ?>
<?php
    include '../DAO/MarcaDAO.php';
    $conex=Conexion::conectar();
    $cmd="SELECT * FROM marca ORDER BY id_Marca desc";
    $lis=$conex->prepare($cmd);
    $lis->execute();
    $listado=$lis->fetchAll();
?>
 <body>
     <div class="container">
            <h1 class="heading-tittle" align="center">
                Gestión País
            </h1><br> <!--Boton que habla al modal-->
            <div class="row">
            <div class="col-md-5">
            <button type="button" class="myButton" data-toggle="modal" data-target="#modalMarca"><i class="fa fa-plus-circle"></i></button>
            </div>
             <form mwthod="post" enctypr="multipart/form-data">
                <div class="col-md-4">
                    <input type="text"  name="txtPais" style="width:108%;" class="form-control" id="txtPais">
                 </div>
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary" style="width:30%; height:50%;" name="btnBuscar"><i class="fa fa-search"></i></button>
                </div>
             </form>
            </div>
            
        <!--Modal-->
         <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-row">
                                                <div class="row">
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Gestión Marcas</h3></div>
                                                <div class="col-md-6">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                                </div>
                                           
                                                </div>
                                            
                                            </div>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                            <div class="form-group">
                                        
                                        <input type="hidden" class="form-control" id="txtId" value="" name="txtId">
                                        </div>
                                        <div class="form-group">
                                        <label for="usr">Nombre de la marca:</label>
                                        <input type="text" class="form-control" id="txtNombreMarca" required value="" name="txtNombreMarca" placeholder="Nombre de la marca">
                                        <label for="usr">seleccione la foto:</label>
                                        <input type="file" accept="image/jpeg" class="form-control" id="txtFotoMarca" required value="" name="txtFotoMarca" placeholder="seleccione foto">
                                        
                                        
                                        </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="submit" height="48" class="myButton" value="Agregar" name="btnAgregar">Agregar</button>
                                            <button type="submit" class="myButton"  value="modificar" name="btnModificar">Modificar</button>
                                            <button type="submit" class="myButton"   value="eliminar" name="btnEliminar">Eliminar</button>
                                        </div>
                                    </div>
                                 </div>
                            </div>
        </form><br>
        <!--Tabla de registros -->
        <table class="table" id="idMarca">
  			<thead>
   				 <tr>
      				<th scope="col" width="300px" hidden="true">id</th>
                     <th scope="col" width="700px">Nombre de la Marca</th>
                     <th scope="col">Foto de la Marca</th>
                     <th scope="col">Seleccione Opcion</th></th>
    			</tr>
  			</thead>
  			<tbody>
              <?php foreach ($listado as $barrido) {?>
                  
              
    			<tr>
     				 <td hidden="true"><?php echo $barrido['id_Marca'] ?></td>
                      <td><?php echo $barrido['NombreMarca'] ?></td>
     					 <td><img class="img-thumbnail" width="40px" src="../Recursos/images/<?php echo $barrido['FotoMarca'] ?>"></td>
                        
                          <td>
                          <!--<form method="post" action="">
                          <input type="hidden" name="txtId" value="<?php echo $foto['id']; ?>">
                          <input type="hidden" name="txtNombre" value="<?php echo $foto['NombreFoto']; ?>">-->
                          <button type="submit" class="btn btn-primary"  name="btnSeleccionar"><i class="fa fa-pencil-square-o"></i></button>
                          <button type="submit" class="btn btn-primary" name="btnEliminar"><i class="fa fa-times"></i></button>
                          </form>
                        </td>
   			    </tr>
              <?php }?>
			</tbody>
		</table>
   </div>
 </body>
<?php #endregion

    $MarcaDAO=new MarcaDAO();

    function asignar()
    {
        $MarcaBO= new MarcaBO();
        $fecha= new DateTime();
        $archivo=($_FILES["txtFotoMarca"] !="")?$fecha->getTimestamp()."_".$_FILES["txtFotoMarca"]["name"]:"usuario.png";
        $tmpFoto=$_FILES["txtFotoMarca"]["tmp_name"];
        if($tmpFoto !="")
        {
            move_uploaded_file($tmpFoto,"../Recursos/images/".$archivo);
        }
        $MarcaBO->setFotoMarca($archivo);
        $MarcaBO->setNombre($_REQUEST["txtNombreMarca"]);
        return $MarcaBO;

    }
if(isset($_REQUEST["btnAgregar"]))
{
    $MarcaDAO->InsertarMarca(asignar());

}

?>
<script>
<?php if(isset($_REQUEST["btnAgregar"])==true){?>
 window.location.replace("MarcasAdmin.php");
<?php }?>
</script>
<?php 
include 'footerAdmin.php';
 ?>