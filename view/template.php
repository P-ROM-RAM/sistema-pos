<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/template/icono-negro.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="view/plugins/ionicons/css/ionic.css"> -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="view/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="view/plugins/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="view/plugins/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="view/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="view/dist/js/demo.js"></script> -->
</head>

<body class="hold-transition sidebar-collapse sidebar-mini ">
<!-- <body class="hold-transition sidebar-collapse sidebar-mini login-page"> -->
  <!-- Site wrapper -->
  <?php
  if(isset($_SESSION["sesionActive"]) && $_SESSION["sesionActive"] == "ok"){


    echo '<div class="wrapper">';

      include "modules/head.php";
      include "modules/menu.php";
      if(isset($_GET["ruta"])){
        if( $_GET["ruta"] == "start" ||
            $_GET["ruta"] == "users" ||
            $_GET["ruta"] == "categories" ||
            $_GET["ruta"] == "products" ||
            $_GET["ruta"] == "customers" ||
            $_GET["ruta"] == "manage-sales" ||
            $_GET["ruta"] == "create-sales" ||
            $_GET["ruta"] == "sales-report" ||
            $_GET["ruta"] == "logout"){
          include "modules/".$_GET["ruta"].".php";
        }else{
          include "modules/404.php";
        }
      }
      include "modules/footer.php";

    echo '</div>';
  } else {
    include "modules/login.php";
  }
    ?>
  </div>
  <!-- ./wrapper -->
  <script src="js/template.js"></script>
</body>

</html>