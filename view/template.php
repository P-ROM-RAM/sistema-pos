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
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="view/plugins/less/dropdown.less">
  <!-- DataTables -->
  <link rel="stylesheet" href="view/plugins/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="view/plugins/datatables-responsive/css/responsive.bootstrap4.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="view/plugins/ionicons/css/ionic.css"> -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="view/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="view/plugins/jquery-3.7.1.js"></script>
  <!-- Bootstrap 4 -->
  <script src="view/plugins/bootstrap/bootstrap.min.js"></script>
  <!-- <script src="view/plugins/popper.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="view/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="view/plugins/datatables/dataTables.js"></script>
  <script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="view/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
  <script src="view/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- SweetAlert 2 -->
  <script src="view/plugins/sweetalert/sweetalert.all.js"></script>
  <!-- <script src="view/dist/js/demo.js"></script> -->
</head>

<body class="hold-transition sidebar-collapse sidebar-mini ">
  <!-- <body class="hold-transition sidebar-collapse sidebar-mini login-page"> -->
  <!-- Site wrapper -->
  <?php
  if (isset($_SESSION["sesionActive"]) && $_SESSION["sesionActive"] == "ok") {


    echo '<div class="wrapper">';

    include "modules/head.php";
    include "modules/menu.php";
    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "start" ||
        $_GET["ruta"] == "users" ||
        $_GET["ruta"] == "categories" ||
        $_GET["ruta"] == "products" ||
        $_GET["ruta"] == "customers" ||
        $_GET["ruta"] == "manage-sales" ||
        $_GET["ruta"] == "create-sales" ||
        $_GET["ruta"] == "sales-report" ||
        $_GET["ruta"] == "logout"
      ) {
        include "modules/" . $_GET["ruta"] . ".php";
      } else {
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
  <script src="view/js/template.js"></script>
  <script src="view/js/users.js"></script>
  <!-- <script>
    Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!"
            }).then((result)=>{
                if(result.value){
                    window.location = "user";
                }
            });
  </script> -->
</body>

</html>