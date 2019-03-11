<?php include 'headerAdmin.php'; ?>
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
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">Gestión Usuario</h3></div>
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
                                        <label for="usr">Nombre del usuario:</label>
                                        <input type="text" class="form-control" id="txtNombre" required value="" name="txtNombre" placeholder="Nombre de la marca">
                                        <label for="usr">Apellido (s) del usaurio:</label>
                                        <input type="text" class="form-control" id="txtApellidos" required value="" name="txtApellidos" placeholder="Nombre de la marca">
                                        <label for="usr">E-mail del usuario:</label>
                                        <input type="email" class="form-control" id="txtEmail" required value="" name="txtEmail" placeholder="Nombre de la marca">
                                        <label for="usr">Contraseña del usuario:</label>
                                        <input type="password" class="form-control" id="txtPassword" required value="" name="txtPassword" placeholder="Nombre de la marca">
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
   </div>
 </body>

<?php include 'footerAdmin.php';?>