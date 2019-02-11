<?php include 'headerAdmin.php' ?>

    <div class="container">
        <div class="row col-md-12"><br><br>
            <h1 class="heading-tittle" align="center">
              listas  Categorias Padres
            </h1> 
            <button type="button" class="myButton" data-toggle="modal" data-target="#exampleModal">Agregar</button>

<br>
<!-- Modal -->
                    <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-row">
                                                <div class="row">
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Categoria</h3></div>
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
                                        <label for="usr">Nombre de categoria:</label>
                                        <input type="text" class="form-control" id="usr">
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



            <table class="table">
  			<thead>
   				 <tr>
      				<th scope="col" width="300px">id</th>
                     <th scope="col" width="500px">Nombre de categoria</th>
                     <th scope="col">Selecione opción</th>
    			</tr>
  			</thead>
  			<tbody>
    			<tr>
     				 <th scope="row">1</th>
     					 <td>Mark</td>
                          <td>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="">Eliminar</i></button>
                        </td>
   					 </tr>
			</tbody>
			</table>
            

        </div>

            <!--Aqui empieza el modal para hacer CRUD de las categorias-->
    </div>



<?php include 'footerAdmin.php' ?>