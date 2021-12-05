<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión | Incendios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- NavBar -->
  <?php

  include "Vistas/estructura/header.php";
  
  include "Vistas/estructura/menu.php";

  /*rutas cortas para la url de las vistas*/
  if(isset($_GET["enlace"])){
    if($_GET["enlace"]=="inicio" ||
       $_GET["enlace"]=="zonas" ||
       $_GET["enlace"]=="puestoControl" ||
       $_GET["enlace"]=="guardas" ||
       $_GET["enlace"]=="bomberos" ||
       $_GET["enlace"]=="frecuencias" 
    ){
      include "Vistas/modulos/".$_GET["enlace"].".php";
    }
  }
     include "Vistas/modulos/inicio.php";
  ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
  include "Vistas/estructura/footer.php";
  
  ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>

<script src="assets/js/peticion.js"></script>

</body>
</html>
