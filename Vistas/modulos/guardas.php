<?php
require '././Modelos/conexion.php';

$resultado = $conexion->query("SELECT * FROM guardas")or die ($conexion->error);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GUARDAS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Guardas</li>
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
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
            <span class="input-group-append">
              <button type="button" class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
            </span>
        </div>

        <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#ModalInsertar">
          <i class="fa fa-plus mr-2"></i>Agregar Guardas</button>
        </div>
        <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">Dni Guarda</th>
                    <th class="text-center" >Nombre</th>
                    <th class="text-center" >Teléfono</th>
                    <th class="text-center" >Dirección</th>
                    <th class="text-center" >Antiguedad</th>
                    <th class="text-center" >Rol</th>
                    <th class="text-center" >Contraseña</th>
                    <th class="text-center" >Punto geo</th>
                    <th class="text-center" >Acciones</th>
                  </tr>
                  </thead>
                <tbody>
                <?php

                 while($fila= mysqli_fetch_array($resultado)){
               ?>
            <tr>

             <td><?php echo $fila['dni_guarda'];?></td>
             <td><?php echo $fila['nombre'];?></td>
             <td><?php echo $fila['telefono'];?></td>
             <td><?php echo $fila['direccion'];?></td>
             <td><?php echo $fila['antiguedad_anios'];?></td>
             <td><?php echo $fila['rol'];?></td>
             <td><?php echo $fila['contraseña'];?></td>
             <td><?php echo $fila['punto_geo'];?></td>

             <td class="text-center"><button class="btn btn-success btnEditar mr-3" 
             data-id="<?php echo $fila['id_guarda'];?>"
             data-dni="<?php echo $fila['dni_guarda'];?>"
             data-nombre="<?php echo $fila['nombre'];?>"
             data-telefono="<?php echo $fila['telefono'];?>"
             data-direccion="<?php echo $fila['direccion'];?>"
             data-antiguedad="<?php echo $fila['antiguedad_anios'];?>"
             data-rol="<?php echo $fila['rol'];?>"
             data-contraseña="<?php echo $fila['contraseña'];?>"
             data-punto_geo="<?php echo $fila['punto_geo'];?>"
             data-toggle="modal" data-target="#modalEditar">
             <i class="fa fa-edit"></i></button>

             <button class="btn btn-danger btnEliminar" 
             data-id="<?php echo $fila['id_guarda'];?>"
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
      <form action="././Modelos/insertarGuarda.php" method="POST" enctype="multipart/form-data" > 
      <div class="modal-header">
        <h5 class="modal-title" id="ModalInsertarLabel">Agregar Guardas</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>DNI Guarda</label> 
          <input type="text" name="dni" placeholder="DNI guarda" id="dni" class="form-control" required> 
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Nombre</label> 
          <input type="text" min="0" name="nombre" placeholder="Nombre" id="nombre" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Teléfono</label> 
          <input type="number" min="0" name="telefono" placeholder="Teléfono" id="telefono" class="form-control" required> 
        </div>
        </div>
        <div class="form-group">
          <label>Dirección</label> 
          <input type="text" name="direccion" placeholder="Direccion" id="direccion" class="form-control" required> 
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Antiguedad</label> 
          <input type="number" min="0" name="antiguedad" placeholder="Años de antiguedad" id="antiguedad" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Rol</label> 
          <input type="text" min="0" name="rol" placeholder="Rol guarda" id="rol" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Contraseña</label> 
          <input type="number" min="0" name="contraseña" placeholder="Contraseña" id="contraseña" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Punto geodésico</label> 
          <input type="number" min="0" name="punto_geo" placeholder="Punto geodésico" id="punto_geo" class="form-control" required> 
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
        <h5 class="modal-title" id="modalEliminarLabel">Eliminar Guarda</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar a este guarda?
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
      <form action="././Modelos/editarGuarda.php" method="POST" enctype="multipart/form-data" > 
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Guarda</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idEdit" name="id" class="form-control" >
         <div class="form-group">
          <label>DNI Guarda</label> 
          <input type="text" name="dni" placeholder="DNI guarda" id="dniEdit" class="form-control" required> 
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Nombre</label> 
          <input type="text" min="0" name="nombre" placeholder="Nombre" id="nombreEdit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Teléfono</label> 
          <input type="number" min="0" name="telefono" placeholder="Teléfono" id="telefonoEdit" class="form-control" required> 
        </div>
        </div>
        <div class="form-group">
          <label>Dirección</label> 
          <input type="text" name="direccion" placeholder="Direccion" id="direccionEdit" class="form-control" required> 
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Antiguedad</label> 
          <input type="number" min="0" name="antiguedad" placeholder="Años de antiguedad" id="antiguedadEdit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Rol</label> 
          <input type="text" min="0" name="rol" placeholder="Rol guarda" id="rolEdit" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label>Contraseña</label> 
          <input type="number" min="0" name="contraseña" placeholder="Contraseña" id="contraseñaEdit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label>Punto geodésico</label> 
          <input type="number" min="0" name="punto_geo" placeholder="Punto geodésico" id="punto_geoEdit" class="form-control" required> 
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
      url: '././Modelos/eliminarGuarda.php',
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
    var dni=$(this).data('dni');
    var nombre=$(this).data('nombre');
    var telefono=$(this).data('telefono');
    var direccion=$(this).data('direccion');
    var antiguedad=$(this).data('antiguedad');
    var rol=$(this).data('rol');
    var contraseña=$(this).data('contraseña');
    var punto_geo=$(this).data('punto_geo');
    $("#idEdit").val(idEditar);
    $("#dniEdit").val(dni);
    $("#nombreEdit").val(nombre);
    $("#telefonoEdit").val(telefono);
    $("#direccionEdit").val(direccion);
    $("#antiguedadEdit").val(antiguedad);
    $("#rolEdit").val(rol);
    $("#contraseñaEdit").val(contraseña);
    $("#punto_geoEdit").val(punto_geo);

});

});
</script>