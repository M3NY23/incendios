<?php
require '././Modelos/conexion.php';

$salida = "";
$resultado = $conexion->query("SELECT * FROM zonas ORDER BY punto_geo") or die($conexion->error);

if (isset($_POST['consulta'])) {
    $res = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM zonas WHERE nombre LIKE '%" . $res . "%'   ";
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ZONAS </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Zonas</li>
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
                if (isset($_GET['error'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php  } ?>

                <?php
                if (isset($_GET['success'])) {
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
            </div>
            <div class="card-body" id="datos">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Punto geo</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Frecuencia</th>
                            <th class="text-center">Latitud</th>
                            <th class="text-center">Longitud</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>

                                <td><?php echo $fila['punto_geo']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['frecuencia']; ?></td>
                                <td><?php echo $fila['latitud']; ?></td>
                                <td><?php echo $fila['longitud']; ?></td>

                                <td class="text-center"><button class="btn btn-success btnEditar mr-3" data-id="<?php echo $fila['punto_geo']; ?>" data-nombre="<?php echo $fila['nombre']; ?>" data-frecuencia="<?php echo $fila['frecuencia']; ?>" data-latitud="<?php echo $fila['latitud']; ?>" data-longitud="<?php echo $fila['longitud']; ?>" data-toggle="modal" data-target="#modalEditar">
                                        <i class="fa fa-edit"></i></button>

                                    <button class="btn btn-danger btnEliminar" data-id="<?php echo $fila['punto_geo']; ?>" data-toggle="modal" data-target="#modalEliminar">
                                        <i class="fa fa-trash"></i></button>
                                </td>

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
            <form action="././Modelos/insertarZona.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalInsertarLabel">Agregar Zona</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" placeholder="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Frecuencia:</label>
                        <input type="text" name="frecuencia" placeholder="frecuencia" id="frecuencia" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Latitud</label>
                            <input type="number" min="0" name="latitud" placeholder="latitud" id="latitud" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Longitud</label>
                            <input type="number" min="0" name="longitud" placeholder="longitud" id="longitud" class="form-control" required>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Eliminar Zona</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar esta zona?
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="././Modelos/editarZona.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Zona</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idEdit" name="id" class="form-control">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" placeholder="nombre" id="nombreEdit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Frecuencia:</label>
                        <input type="text" name="frecuencia" placeholder="frecuencia" id="frecuenciaEdit" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Latitud</label>
                            <input type="number" min="0" name="latitud" placeholder="latitud" id="latitudEdit" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Longitud</label>
                            <input type="number" min="0" name="longitud" placeholder="longitud" id="longitudEdit" class="form-control" required>
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
    $(document).ready(function() {
        var idEliminar = -1;
        var idEditar = -1;
        var fila;
        $(".btnEliminar").click(function() {
            idEliminar = $(this).data('id');
            fila = $(this).parent('td').parent('tr');
        });
        $(".eliminar").click(function() {
            $.ajax({
                url: '././Modelos/eliminarZona.php',
                method: 'POST',
                data: {
                    id: idEliminar
                }
            }).done(function(res) {
                alert(res);
                $(fila).fadeOut(1000);
            });
        });
        $(".btnEditar").click(function() {
            idEditar = $(this).data('id');
            var nombre = $(this).data('nombre');
            var frecuencia = $(this).data('frecuencia');
            var latitud = $(this).data('latitud');
            var longitud = $(this).data('longitud');
            $("#idEdit").val(idEditar);
            $("#nombreEdit").val(nombre);
            $("#frecuenciaEdit").val(frecuencia);
            $("#latitudEdit").val(latitud);
            $("#longitudEdit").val(longitud);

        });

    });
</script>