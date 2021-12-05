<?php
require '././Modelos/conexion.php';

$resultado = $conexion->query("SELECT * FROM cuerpo_bomberos")or die ($conexion->error);

?>
  
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CUERPO DE BOMBEROS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Bomberos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <?php
          if(isset($_GET['error'])){
        ?>
        <div class="alert alert-danger" role="alert">
         <?php echo $_GET['error']; ?>
         <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  } ?>

        <?php
          if(isset($_GET['success'])){
        ?>
        <div class="alert alert-success" role="alert">
           Se ha insertado correctamente
         <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  } ?>

        <div class="input-group input-group-sm col-6 float-right">
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="telefono">
            <span class="input-group-append">
              <button type="button" class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
            </span>
        </div>

        <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#ModalInsertar">
          <i class="fa fa-plus mr-2"></i>Agregar Bomberos</button>
        </div>
        <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">Id Cuerpo</th>
                    <th class="text-center" >Tel emergencia1</th>
                    <th class="text-center" >Tel emergencia2</th>
                    <th class="text-center" >Hombres</th>
                    <th class="text-center" >Camiones</th>
                    <th class="text-center" >Cisternas</th>
                    <th class="text-center" >Helicoptero</th>
                    <th class="text-center" >Acciones</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
                 while($fila= mysqli_fetch_array($resultado)){
               ?>
            <tr>

             <td><?php echo $fila['id_cuerpo'];?></td>
             <td><?php echo $fila['tel_emer1'];?></td>
             <td><?php echo $fila['tel_emer2'];?></td>
             <td><?php echo $fila['no_hombres'];?></td>
             <td><?php echo $fila['no_camiones'];?></td>
             <td><?php echo $fila['no_cisternas'];?></td>
             <td><?php echo $fila['no_helicoptero'];?></td>

             <td class="text-center"><button class="btn btn-success btnEditar mr-3" 
             data-id="<?php echo $fila['id_cuerpo'];?>"
             data-tel1="<?php echo $fila['tel_emer1'];?>"
             data-tel2="<?php echo $fila['tel_emer2'];?>"
             data-hombres="<?php echo $fila['no_hombres'];?>"
             data-camiones="<?php echo $fila['no_camiones'];?>"
             data-cisternas="<?php echo $fila['no_cisternas'];?>"
             data-helicoptero="<?php echo $fila['no_helicoptero'];?>"
             data-toggle="modal" data-target="#modalEditar">
             <i class="fa fa-edit"></i></button>

             <button class="btn btn-danger btnEliminar" 
             data-id="<?php echo $fila['id_cuerpo'];?>"
             data-toggle="modal" data-target="#modalEliminar">
             <i class="fa fa-trash"></i></button></td>

            </tr>
               <?php } ?>
                </tbody>
                        
                </table>
              </div>
              <!-- /.card-body -->

        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal Insertar-->
<div class="modal fade" id="ModalInsertar" tabindex="-1" aria-labelledby="ModalInsertarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="././Modelos/insertarCuerpo.php" method="POST" enctype="multipart/form-data" > 
      <div class="modal-header">
        <h5 class="modal-title" id="ModalInsertarLabel">Agregar Cuerpo de Bombero</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="form-group col-6">
          <label>Teléfono emergencia 1</label> 
          <input type="number" min="0" name="tel1" placeholder="Teléfono 1" id="tel1" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Teléfono emergencia 2</label> 
          <input type="number" min="0" name="tel2" placeholder="Teléfono 2" id="tel2" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Número Hombres:</label> 
          <input type="number" min="0" name="hombre" placeholder="Numero" id="hombre" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Número Camiones:</label> 
          <input type="number" min="0" name="camion" placeholder="Numero" id="camion" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Número Cisternas:</label> 
          <input type="number" min="0" name="cisterna" placeholder="Numero" id="cisterna" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Número Helicoptero:</label> 
          <input type="number" min="0" name="helicoptero" placeholder="Numero" id="helicoptero" class="form-control" required> 
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Insertar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Eliminar -->
  <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminarLabel">Eliminar Cuerpo Bomberos</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar este cuerpo de bomberos?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal Editar -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <form action="././Modelos/editarCuerpo.php" method="POST" enctype="multipart/form-data" > 
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Cuerpo Bomberos</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idEdit" name="id" class="form-control" >
       <div class="row">
        <div class="form-group col-6">
          <label>Teléfono emergencia 1</label> 
          <input type="number" min="0" name="tel1" placeholder="Teléfono 1" id="tel1Edit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Teléfono emergencia 2</label> 
          <input type="number" min="0" name="tel2" placeholder="Teléfono 2" id="tel2Edit" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Número Hombres:</label> 
          <input type="number" min="0" name="hombre" placeholder="Numero" id="hombreEdit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Número Camiones:</label> 
          <input type="number" min="0" name="camion" placeholder="Numero" id="camionEdit" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Número Cisternas:</label> 
          <input type="number" min="0" name="cisterna" placeholder="Numero" id="cisternaEdit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Número Helicoptero:</label> 
          <input type="number" min="0" name="helicoptero" placeholder="Numero" id="helicopteroEdit" class="form-control" required> 
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary editar">Actualizar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="assets/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/jquery-ui/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
  var idEliminar= -1;
  var idEditar= -1;
  var fila;
  $(".btnEliminar").click(function(){
    idEliminar=$(this).data('id');
    fila=$(this).parent('td').parent('tr');
  });
  $(".eliminar").click(function(){
    $.ajax({
      url: '././Modelos/eliminarCuerpo.php',
      method: 'POST',
      data:{
        id:idEliminar
      }
    }).done(function(res){
      alert(res);
      $(fila).fadeOut(1000);
    });
  });
  $(".btnEditar").click(function(){
    idEditar=$(this).data('id');
    var tel1=$(this).data('tel1');
    var tel2=$(this).data('tel2');
    var hombres=$(this).data('hombres');
    var camiones=$(this).data('camiones');
    var cisternas=$(this).data('cisternas');
    var helicoptero=$(this).data('helicoptero');
    $("#idEdit").val(idEditar);
    $("#tel1Edit").val(tel1);
    $("#tel2Edit").val(tel2);
    $("#hombreEdit").val(hombres);
    $("#camionEdit").val(camiones);
    $("#cisternaEdit").val(cisternas);
    $("#helicopteroEdit").val(helicoptero);

});

});
</script>