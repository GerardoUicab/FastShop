<?php include 'headerAdmin.php';
      include  '../DAO/CategoriaDAO.php';

      $con=Conexion::conectar();
      $eje="SELECT * FROM categoria";
      $hola=$con->query($eje);
      $lista=$hola->fetchAll(PDO::FETCH_ASSOC);
     
      $txtId=(isset($_POST['txtId']))?$_POST['txtId']:NULL;
      $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
      $optSele=(isset($_POST['optSele']))?$_POST['optSele']:"";

?>

    <div class="container">
        <div class="row col-md-12"><br><br>
            <h1 class="heading-tittle" align="center">
                Sub-Categorias
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
                                                    <div class="col-md-6"><h3 class="modal-title" id="exampleModalLabel">SubCategorias</h3></div>
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
                                        
                                        <input type="hidden" class="form-control" name="txtId">
                                        </div>
                                        <div class="form-group">
                                        <label for="usr">Séleccione la categoria padre:</label>
                                            <select name="Categorias" style="width:560px; height:40px;"  class="caja">
                                          <?php foreach ($lista as $cate) { ?>
                                            <option id="optsele" name="optSele" value="<?php echo $cate['id_Categoria'] ?>" ><?php echo $cate['NombreCategoria'] ?></option>
                                          <?php }?>
                                            </select>
                                    
                                        
                                            <label for="usr">Nombre de categoria:</label>
                                            <input type="text" class="form-control" name="txtCate">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="submit" height="48" class="myButton" name="btnAgregar">Agregar</button>
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
      				<th scope="col" width="10px" hidden="true">idSubCategoria</th>
                     <th scope="col" width="400px">Nombre de subcategoria</th>
                     <th scope="col" width="10px" hidden="true">idCategoria</th>
                     <th scope="col" width="400px">Nombre de categoria</th>
                     <th scope="col">Selecione opción</th>
    			</tr>
  			</thead>
  			<tbody>
    			<tr>
     				       <td hidden="true">1</td>
                            <td>Agua</td>
                            <td hidden="true">2</td>
                            <td>Mineral</td>

                          
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
<?php

$objcate=new CategoriaDAO();
    

function asignar()
{
    $categoria=new CategoriaBO();
    
    $categoria->setId($_REQUEST["txtId"]);
    $categoria->setNombre($_REQUEST["txtCate"]);
    $categoria->setId_sub($_REQUEST["Categorias"]);
    return $categoria;

}

if(isset($_REQUEST["btnAgregar"]))
{
    $objcate->insertar(asignar());
    

}

?>

<?php include 'footerAdmin.php' ?>