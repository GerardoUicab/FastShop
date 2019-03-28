<?php include 'headerAdmin.php'; ?><br>
    <body>
            <div class="container">
            <h1 class="heading-tittle" align="center">
                Gestión Municipio
            </h1> <br><!--Boton que invoca al modal-->
            <div class="row">
                <div class="col-md-7">
                <button type="button" class="myButton"  data-toggle="modal" data-target="#ModalMunicipio"><i class="fa fa-plus-circle"></i></button>
                </div>
                <div class="col-md-3">
                    <input type="text" style="width100%;"  class="form-control" id="txtEstado">
                </div>
                <div class="col-md-2">
                <button type="button" class="myButton fa fa-search align-bottom" align="center" data-toggle="modal" style="width:50px; height:40px;" data-target="#ModalMunicipio"></button>
                </div>
            </div>
            
            <!--Modal de la tabla estado-->
            <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal fade" id="ModalMunicipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-row">
                                                <div class="row">
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Gestion Municipio</h3></div>
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
                                            <select name="Pais" style="width:560px; height:40px;" class="caja">
                                          
                                            <option>Seleccione</option>

                                            <option>México</option>

                                            <option>Argemtina</option>
                                            <option>Uruguay</option>

                                            <option>Colombia</option>

                                            <option>Canada</option>
                                            </select>

                                            <label for="usr">Séleccione Estado:</label>
                                            <select name="Estado" style="width:560px; height:40px;" class="caja">
                                          
                                            <option>Seleccione</option>

                                            <option>Yucatan</option>

                                            <option>Campeche</option>
                                            </select>
                                            <label for="usr">Nombre del Municipio:</label>
                                            <input type="hidden" class="form-control" id="txtIdMunicipio">
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
                        <th scope="col" width="10px" hidden="true">idMunicipio</th>
                        <th scope="col" width="300px">Nombre del Municipio</th>
                        <th scope="col" width="10px" hidden="true">idEstado</th>
                        <th scope="col" width="300px">Nombre del Estado</th>
                        <th scope="col" width="10px" hidden="true">idPais</th>
                        <th scope="col" width="300px">Nombre del País</th>
                        <th scope="col">Selecione opción</th>
    			    </tr>
                </thead>
  			        <tbody>
                          <?php for($i=0; $i<=10; $i++){?>
    			         <tr>
                            <td hidden="true">1</td>
                                <td>Acanceh</td>
                                <td hidden="true">2</td>
                                <td>Yucatan</td>
                                <td hidden="true">3</td>
                                <td>México</td>

                          
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMunicipio"><i class="fa fa-pencil-square-o"></i></button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMunicipio"><i class="fa fa-times"></i></button>
                                </td>
                        </tr>
                          <?php }?>
			            </tbody>
			</table>







            </div>

    </body>
<?php include 'footerAdmin.php' ?>