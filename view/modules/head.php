    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Settings Dropdown Menu -->
        <li class="dropdown user user-menu">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php
            if($_SESSION["photo"] != ""){
              echo '<img src="'.$_SESSION["photo"].'" alt="User Image" class="user-image">';
            }else{
              echo '<img src="img/users/anonymous.png" alt="User Image" class="user-image">';
            }
            ?>

            <i class="far fa-user"></i>
            <span><?php echo $_SESSION["name"]." / ".$_SESSION["profile"];?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Settings</span>
            <div class="dropdown-divider"></div>
            <a href="logout" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->