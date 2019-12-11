<?php include 'inc/session.php'; ?>
<?php include 'inc/header.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php
$link = "Dashboard";
include 'inc/navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM tenants";
                $query = mysqli_query($db, $sql);
                
                echo "<h3>".mysqli_num_rows($query)."</h3>";
                ?>

                <p>Tenants</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM rooms where status ='Vacant'";
                $query = mysqli_query($db, $sql);
                
                echo "<h3>".mysqli_num_rows($query)."</h3>";
                ?>

                <p>Vacant Rooms</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-home"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM requests";
                $query = mysqli_query($db, $sql);
                
                echo "<h3>".mysqli_num_rows($query)."</h3>";
                ?>

                <p>Request</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-scroll"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $sql = "SELECT * FROM personnel";
                $query = mysqli_query($db, $sql);
                
                echo "<h3>".mysqli_num_rows($query)."</h3>";
                ?>

                <p>Personnels</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users-cog"></i>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'inc/footer.php'; ?>

</div>
<!-- ./wrapper -->
<?php include 'inc/scripts.php'; ?>

</body>
</html>
