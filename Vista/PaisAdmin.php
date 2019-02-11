<?php include 'headerAdmin.php' ?>
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
                                        
                                        <input type="hidden" class="form-control" id="txtId">
                                        </div>
                                        <div class="form-group">
                                        <label for="usr">Nombre del Pais:</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre País">
                                        </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="submit" height="48" class="myButton" value="Agregar" name="btnAgregar">Agregar</button>
                                            <button type="button" class="myButton">Modificar</button>
                                            <button type="button" class="myButton">Eliminar</button>
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
    			<tr>
     				 <th scope="row" hidden="true">1</th>
     					 <td>México</td>
                          <td>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="">Eliminar</i></button>
                        </td>
   					 </tr>
			</tbody>
		</table>
   </div>
 </body>
 <?php
    include '../DAO/PaisDAO.php';
    $agre=new PaisDAO();

    function asignar()
    {
        $pais=new PaisBO();

        $pais->setNombre($_REQUEST["txtNombre"]);
        return $pais;

    }
    if(isset($_REQUEST["btnAgregar"]))
    {
        $agre->insertar(asignar());

    }



?>
<?php include 'footerAdmin.php'?>