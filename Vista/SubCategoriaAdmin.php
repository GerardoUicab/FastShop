<?php include 'headerAdmin.php'; ?>
<?php 
      include  '../DAO/CategoriaDAO.php';

      $con=Conexion::conectar();
      $eje="SELECT * FROM categoria";
      $hola=$con->prepare($eje);
      $hola->execute();
      $lista=$hola->fetchAll();
      $categoria="SELECT * FROM categoria order by id_Categoria desc";
      $lisC=$con->prepare($categoria);
      $lisC->execute();
      $listaC=$lisC->fetchAll();
     
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
                                            <option id="optsele" name="optSele" value="null" >Seleccione Categoria</option>
                                          <?php foreach ($lista as $cate) { ?>
                                            <option id="optsele" name="optSele" value="<?php echo $cate['id_Categoria'] ?>" ><?php echo $cate['NombreCategoria'] ?></option>
                                          <?php }?>
                                            </select>
                                    
                                        
                                            <label for="usr">Nombre de categoria:</label>
                                            <input type="text" class="form-control" required name="txtCate">
                                            <label for="usr">Seleccione la imagen:</label>
                                        <input type="file" accept="image/jpeg" class="form-control" id="txtFoto" required value="" name="txtFoto" placeholder="seleccione foto">
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
      				<th scope="col" width="10px" hidden="true">idcategoria</th>
                     <th scope="col" width="400px">Nombre de la categoria</th>
                     <th scope="col" width="10px" hidden="true">idsubCategoria</th>
                     <th scope="col" width="400px">Foto</th>
                     <th scope="col">Selecione opción</th>
    			</tr>
  			</thead>
  			<tbody>
              <?php foreach($listaC as $barridoC){ ?>
    			<tr>
     				       <td hidden="true"><?php echo $barridoC['id_Categoria']?></td>
                            <td><?php echo $barridoC['NombreCategoria']?></td>
                            <td hidden="true"><?php echo $barridoC['id_SubCate']?></td>
                            <td><img src="../Recursos/images/<?php echo $barridoC['fotoCategoria'] ?>" style="width:40px;" class="img-thumbnail"></td>

                          
                          <td>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="">Eliminar</i></button>
                        </td>
   			 </tr>
              <?php }?>
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
    $fecha= new DateTime();
        $archivo=($_FILES["txtFoto"] !="")?$fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"usuario.png";
        $tmpFoto=$_FILES["txtFoto"]["tmp_name"];
        if($tmpFoto !="")
        {
            move_uploaded_file($tmpFoto,"../Recursos/images/".$archivo);
        }
        $categoria->setFotoCategoria($archivo);
    return $categoria;

}

if(isset($_REQUEST["btnAgregar"]))
{
    $objcate->insertar(asignar());
    

}

?>
<script>
<?php if(isset($_REQUEST["btnAgregar"])==true) {?>
window.location.replace("SubCategoriaAdmin.php");
<?php }?>
</script>
<?php include 'footerAdmin.php' ?>