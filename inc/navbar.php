<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="nav-icon fas fa-sign-out-alt"></i> Sign-out</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-gray elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Imperfecto</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $user['firstname']. ' '.$user['lastname']; ?></a>
        </div>
      </div>
    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($link == 'Dashboard') {echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rooms.php" class="nav-link <?php if($link == 'Rooms') {echo 'active';} ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Rooms
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="request.php" class="nav-link <?php if($link == 'Request') {echo 'active';} ?>">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
                Requests
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tenants.php" class="nav-link <?php if($link == 'Tenants') {echo 'active';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tenants
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link <?php if($link == 'Personnel') {echo 'active';} ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Personnel
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>