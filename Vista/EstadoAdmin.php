<?php include 'headerAdmin.php'; ?>
<?php 
        include '../DAO/EstadoDAO.php';
        $conex=Conexion::conectar();
        $objPais="select * from pais";
        $consulta=$conex->query($objPais);
        $lisP=$consulta->fetchAll(PDO::FETCH_ASSOC);

        $consultaEstado="select e.id_Estado, e.NombreEstado,e.id_Pais, p.NombrePais from estado e, pais p where e.id_Pais=p.id_Pais";
        $ejecutarEstado=$conex->query($consultaEstado);
        $estado=$ejecutarEstado->fetchAll(PDO::FETCH_ASSOC);

        $txtIdEstado=(isset($_POST['txtIdEstado']))?$_POST['txtIdEstado']:"";
        $txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
        $txtIdpais=(isset($_POST['Categorias']))?$_POST['Categorias']:"";
?><br>
    <body>
            <div class="container">
            <h1 class="heading-tittle" align="center">
                Gestión Estado
            </h1> <!--Boton que invoca al modal-->
            <button type="button" class="myButton" data-toggle="modal" data-target="#ModalEstado"><i class="fa fa-plus-circle"></i></button>
            <!--Modal de la tabla estado-->
            <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal fade" id="ModalEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-row">
                                                <div class="row">
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Gestion Estado</h3></div>
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
                                        
                                        </div>
                                        <div class="form-group">
                                        <label for="usr">Séleccione País:</label>
                                            <select name="Categorias" style="width:560px; height:40px;" class="caja">
                                            <?php foreach ($lisP as $Pais) {?>
                                            <option  value="<?php echo $Pais['id_Pais'] ?>"><?php echo $Pais['NombrePais']?></option>
                                            <?php }?>
                                            </select>
                                    
                                        
                                            <label for="usr">Nombre del Estado:</label>
                                            <input type="hidden" class="form-control" name="txtIdEstado" value="<?php echo $txtIdEstado ?>" id="txtIdEstado">
                                            <input type="text" class="form-control" id="txtEstado" value="<?php echo $txtEstado?>" name="txtEstado">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="submit" height="48" name="btnAgregar" class="myButton">Agregar</button>
                                            <button type="submit" class="myButton">Modificar</button>
                                            <button type="submit" class="myButton">Eliminar</button>
                                        </div>
                                    </div>
                                 </div>
                            </div>

                        
            </form>
            <!--Tabla donde se mostraran los datos-->
            <table class="table">
  			    <thead>
   				    <tr>
                        <th scope="col" width="10px" hidden="true">idEstado</th>
                        <th scope="col" width="400px">Nombre del Estado</th>
                        <th scope="col" width="10px" hidden="true">idPais</th>
                        <th scope="col" width="400px">Nombre del País</th>
                        <th scope="col">Selecione opción</th>
    			    </tr>
                </thead>
  			        <tbody>
                      <?php foreach ($estado as $lisEstado) {?>
    			         <tr>
                        
                            <td hidden="true"><?php echo $lisEstado ['id_Estado'] ?></td>
                                <td><?php echo $lisEstado ['NombreEstado'] ?></td>
                                <td hidden="true"><?php echo $lisEstado ['id_Pais'] ?></td>
                                <td><?php echo $lisEstado ['NombrePais'] ?></td>

                          
                        <td>
                          <form method="post" action="">
                          <input type="hidden" name="Categorias" value="<?php echo $lisEstado['id_Pais']; ?>">
                          <input type="hidden" name="txtIdEstado" value="<?php echo $lisEstado['id_Estado']; ?>">
                          <input type="hidden" name="txtEstado" value="<?php echo $lisEstado['NombreEstado']; ?>">
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
    <?php
     $cmd= new EstadoDAO();

     function asignar()
    {
        $Estado=new EstadoBO();
        $Estado->setId($_REQUEST["txtIdEstado"]);
        $Estado->setIdPais($_REQUEST["Categorias"]);
        $Estado->setNombre($_REQUEST["txtEstado"]);
        return $Estado;

    }

    if(isset($_REQUEST["btnAgregar"]))
    {
        $cmd->insertar(asignar());

    }

 ?>
<?php include 'footerAdmin.php' ?>
<script>
<?php if(isset($_REQUEST["btnSeleccionar"])) {?>
 

    $('#ModalEstado').modal('show');
    
<?php }?>
   
    
</script>