<?php include 'headerAdmin.php'?><br>
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
                                        
                                        <input type="hidden" class="form-control" id="txtId">
                                        </div>
                                        <div class="form-group">
                                        <label for="usr">Séleccione País:</label>
                                            <select name="Categorias" style="width:560px; height:40px;" class="caja">
                                          
                                            <option>Seleccione</option>

                                            <option>México</option>

                                            <option>Argemtina</option>
                                            <option>Uruguay</option>

                                            <option>Colombia</option>

                                            <option>Canada</option>
                                            </select>
                                    
                                        
                                            <label for="usr">Nombre del Estado:</label>
                                            <input type="hidden" class="form-control" id="txtIdEstado">
                                            <input type="text" class="form-control" id="txtEstado">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="button" height="48" class="myButton" data-dismiss="modal">Agregar</button>
                                            <button type="button" class="myButton">Modificar</button>
                                            <button type="button" class="myButton">Eliminar</button>
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
    			         <tr>
                            <td hidden="true">1</td>
                                <td>Yucatan</td>
                                <td hidden="true">2</td>
                                <td>México</td>

                          
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o"></i></button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times"></i></button>
                                </td>
                        </tr>
			            </tbody>
			</table>







            </div>

    </body>
<?php include 'footerAdmin.php' ?>