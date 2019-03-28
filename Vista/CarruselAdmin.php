<?php include 'headerAdmin.php'; ?>
<?php
    include '../DAO/CarruselDAO.php';

    $conex=Conexion::Conectar();
    $cmd="select * from carrusel";
    $lista=$conex->query($cmd);
    $barrido=$lista->fetchAll();

?>
 <body>
     <div class="container">
            <h1 class="heading-tittle" align="center">
                Gestión Carrusel
            </h1><br> <!--Boton que habla al modal-->
            <div class="row">
            <div class="col-md-5">
            <button type="button" class="myButton" data-toggle="modal" data-target="#modalCarrusel"><i class="fa fa-plus-circle"></i></button>
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
                            <div class="modal fade" id="modalCarrusel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-row">
                                                <div class="row">
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Gestión Carrusel</h3></div>
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
                                        <label for="usr">Seleccione la imagen:</label>
                                        <input type="file" accept="image/jpeg" class="form-control" id="txtNombre" required value="" name="txtNombre" placeholder="seleccione foto">
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

        <table class="table" id="idCarrusel">
  			<thead>
   				 <tr>
      				<th scope="col" width="300px" hidden="true">id</th>
                     <th scope="col" width="700px">Foto</th>
                     <th scope="col">Selecione opción</th>
    			</tr>
  			</thead>
  			<tbody>
              <?php foreach ($barrido as $foto) {?>
                  
              
    			<tr>
     				 <td hidden="true"><?php echo $foto['id'] ?></td>
     					 <td><img class="img-thumbnail" width="100px" src="../Recursos/images/<?php echo $foto['NombreFoto'] ?>"></td>

                          <td>
                          <!--<form method="post" action="">
                          <input type="hidden" name="txtId" value="<?php echo $foto['id']; ?>">
                          <input type="hidden" name="txtNombre" value="<?php echo $foto['NombreFoto']; ?>">
                          <button type="submit" class="btn btn-primary"  name="btnSeleccionar"><i class="fa fa-pencil-square-o"></i></button>
                          <button type="submit" class="btn btn-primary" name="btnEliminar"><i class="fa fa-times"></i></button>
                          </form>-->
                        </td>
   			    </tr>
              <?php }?>
			</tbody>
		</table>
        <!--Tabla de registros -->
   </div>
 </body>
<?php
 
    $objCarrusel=new CarruselDAO();

    function asignar()
    {
        $objCarruselBO=new CarruselBO();
        $fecha= new DateTime();
        $archivo=($_FILES["txtNombre"] !="")?$fecha->getTimestamp()."_".$_FILES["txtNombre"]["name"]:"usuario.png";
        $tmpFoto=$_FILES["txtNombre"]["tmp_name"];
        if($tmpFoto !="")
        {
            move_uploaded_file($tmpFoto,"../Recursos/images/".$archivo);
        }
        $objCarruselBO->setNombreFoto($archivo);
        return $objCarruselBO;
    }

if(isset($_REQUEST['btnAgregar']))
{
    $objCarrusel->Insertar(asignar());
}



?>


<?php  include 'footerAdmin.php'  ?>