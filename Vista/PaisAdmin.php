<?php include 'headerAdmin.php';
 include '../DAO/PaisDAO.php';

 $con=Conexion::conectar();
 $eje="SELECT * FROM pais";
 $hola=$con->query($eje);
 $lista=$hola->fetchAll(PDO::FETCH_ASSOC);

 $txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
 $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
 

?>
 <body>
     <div class="container">
            <h1 class="heading-tittle" align="center">
                Gestión País
            </h1> <!--Boton que habla al modal-->
            <button type="button" class="myButton" data-toggle="modal" data-target="#exampleModal">Agregar</button>
        <!--Modal-->
         <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-row">
                                                <div class="row">
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Gestión País</h3></div>
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
                                        
                                        <input type="hidden" class="form-control" id="txtId" value="<?php echo $txtId; ?>" name="txtId">
                                        </div>
                                        <div class="form-group">
                                        <label for="usr">Nombre del Pais:</label>
                                        <input type="text" class="form-control" id="txtNombre" required value="<?php echo $txtNombre; ?>" name="txtNombre" placeholder="Nombre País">
                                        </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="submit" height="48" class="myButton" value="Agregar" name="btnAgregar">Agregar</button>
                                            <button type="submit" class="myButton" value="modificar" name="btnModificar">Modificar</button>
                                            <button type="submit" class="myButton" value="eliminar" name="btnEliminar">Eliminar</button>
                                        </div>
                                    </div>
                                 </div>
                            </div>
        </form><br>
        <!--Tabla de registros -->
        <table class="table" id="idPais">
  			<thead>
   				 <tr>
      				<th scope="col" width="300px" hidden="true">id</th>
                     <th scope="col" width="700px">Nombre de País</th>
                     <th scope="col">Selecione opción</th>
    			</tr>
  			</thead>
  			<tbody>
              <?php foreach ($lista as $pais) {?>
                  
              
    			<tr>
     				 <th hidden="true"><?php echo $pais['id_Pais'] ?></th>
     					 <td><?php echo $pais['NombrePais'] ?></td>

                          <td>
                          <form method="post" action="">
                          <input type="hidden" name="txtId" value="<?php echo $pais['id_Pais']; ?>">
                          <input type="hidden" name="txtNombre" value="<?php echo $pais['NombrePais']; ?>">
                          <button type="submit" class="btn btn-success"  name="btnSeleccionar">Seleccionar</button>
                          <button type="submit" class="btn btn-danger" name="btnEliminar">Eliminar</button>
                          </form>
                        </td>
   			    </tr>
              <?php }?>
			</tbody>
		</table>
   </div>
 </body>
 <?php
    
    $agre=new PaisDAO();
    

    function asignar()
    {
        $pais=new PaisBO();
        
        $pais->setId($_REQUEST["txtId"]);
        $pais->setNombre($_REQUEST["txtNombre"]);
        return $pais;

    }
    function obtener()
    {
        $pais=new PaisBO();
        $pais->setNombre($_REQUEST["txtNombre"]);
        return $pais;
    }
    if(isset($_REQUEST["btnAgregar"]))
    {
        $agre->insertar(obtener());

    }
    if(isset($_REQUEST["btnModificar"]))
    {
        $agre->modificar(asignar());
    }
    if(isset($_REQUEST["btnEliminar"]))
    {
        $agre->eliminar(asignar());
    }

    if(isset($_REQUEST["btnSeleccionar"]))
    {
    

    }

?>

<?php include 'footerAdmin.php'?>


<script>

    $('#exampleModal').modal('show');


</script>
