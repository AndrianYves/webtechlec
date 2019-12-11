<?php 
  include 'inc/session.php';
  include 'inc/header.php';
  include 'inc/db.php';
 ?>
<?php
$link = "Tenants";
if(isset($_POST['submit'])){ 
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $contact = $_POST["contact"];
  $datestart = $_POST["datestart"];
  $dateend = $_POST["dateend"];
  $room = $_POST["room"];
  $price = $_POST["price"];
  $status = $_POST["status"];
  $d1 = mktime(0, 0, 1, date('m', strtotime($datestart)), 1, date('Y', strtotime($datestart)));
  $d2 = mktime(0, 0, 1, date('m', strtotime($dateend)), 1, date('Y', strtotime($dateend)));

   $total_month = 0;
   while (($d1 = strtotime("+1 MONTH", $d1)) <= $d2) {
       $total_month++;
   }

  $total = ($total_month * $price);

  $sql = "INSERT INTO tenants(firstname, lastname, contact, datestart, dateend, months, room, totalpayment, status) VALUES('$firstname', '$lastname', '$contact', '$datestart', '$dateend', '$total_month', '$room', '$total', '$status')";   
  mysqli_query($db, $sql);

  $sql1 = mysqli_query($db,"UPDATE rooms SET status = 'Occupied' WHERE room = '$room'");
  echo "<script>alert('New Tenants Created!);</script>";
}
?>
<?php
if(isset($_POST['update'])){ 
  $personnelid = $_POST["personnelid"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $contact = $_POST["contact"];
  $role = $_POST["role"];

  $sql = mysqli_query($db,"UPDATE personnel SET firstname = '$firstname', lastname = '$lastname', contact = '$contact', role = '$role' WHERE id = '$personnelid'");
  echo "<script>alert('Personnel Updated!);</script>";
}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include 'inc/navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tenants</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tenants</li>
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
            <div class="col-md-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Tower A</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Tower B</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Tower C</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                  <table class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="200">Full Name</th>
                    <th width="100">Contact</th>
                    <th width="100">Contract Start</th>
                    <th width="100">Contract Date</th>
                    <th width="100">Months</th>
                    <th width="100">Tower</th>
                    <th width="100">Room</th>
                    <th width="100">Total Payment</th>
                    <th width="100">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM tenants");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['datestart'];?></td>
                    <td><?php echo $row['dateend'];?></td>
                    <td><?php echo number_format($row['months']);?></td>
                    <td><?php echo substr($row['room'], 0, -1);?></td>
                    <td><?php echo $row['room'];?></td>
                    <td><?php echo $row['totalpayment'];?></td>
                    <td><?php echo $row['status'];?></td>
                  </tr>
          
                  <?php   } ?>


                  </tbody>
                </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                  <table class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="200">Full Name</th>
                    <th width="100">Contact</th>
                    <th width="100">Contract Start</th>
                    <th width="100">Contract Date</th>
                    <th width="100">Months</th>
                    <th width="100">Tower</th>
                    <th width="100">Room</th>
                    <th width="100">Total Payment</th>
                    <th width="100">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM tenants where room like 'A%'");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['datestart'];?></td>
                    <td><?php echo $row['dateend'];?></td>
                    <td><?php echo number_format($row['months']);?></td>
                    <td><?php echo substr($row['room'], 0, -1);?></td>
                    <td><?php echo $row['room'];?></td>
                    <td><?php echo $row['totalpayment'];?></td>
                    <td><?php echo $row['status'];?></td>
                  </tr>
          
                  <?php   } ?>


                  </tbody>
                </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                  <table class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="200">Full Name</th>
                    <th width="100">Contact</th>
                    <th width="100">Contract Start</th>
                    <th width="100">Contract Date</th>
                    <th width="100">Months</th>
                    <th width="100">Tower</th>
                    <th width="100">Room</th>
                    <th width="100">Total Payment</th>
                    <th width="100">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM tenants where room like 'B%'");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['datestart'];?></td>
                    <td><?php echo $row['dateend'];?></td>
                    <td><?php echo number_format($row['months']);?></td>
                    <td><?php echo substr($row['room'], 0, -1);?></td>
                    <td><?php echo $row['room'];?></td>
                    <td><?php echo $row['totalpayment'];?></td>
                    <td><?php echo $row['status'];?></td>
                  </tr>
          
                  <?php   } ?>


                  </tbody>
                </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                   <table class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="200">Full Name</th>
                    <th width="100">Contact</th>
                    <th width="100">Contract Start</th>
                    <th width="100">Contract Date</th>
                    <th width="100">Months</th>
                    <th width="100">Tower</th>
                    <th width="100">Room</th>
                    <th width="100">Total Payment</th>
                    <th width="100">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM tenants where room like 'C%'");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['datestart'];?></td>
                    <td><?php echo $row['dateend'];?></td>
                    <td><?php echo number_format($row['months']);?></td>
                    <td><?php echo substr($row['room'], 0, -1);?></td>
                    <td><?php echo $row['room'];?></td>
                    <td><?php echo $row['totalpayment'];?></td>
                    <td><?php echo $row['status'];?></td>
                  </tr>
          
                  <?php   } ?>


                  </tbody>
                </table> 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>


        </div><!-- /.row -->

         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               Create Tenants
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form class="form-horizontal" action="tenants.php" method="post" >
                  <div class="form-group row">
                    <div class="col-sm-4">             
                      <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                    </div>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" placeholder="Contact Number" name="contact" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Date Started</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control" placeholder="Date Started" name="datestart" required>
                    </div>
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Contract End</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control" placeholder="Contract End" name="dateend" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Room Number</label>
                    <div class="col-sm-3">
                      <select id="one" class="form-control" name="room">
                        <?php $room = mysqli_query($db, "SELECT * from rooms where status = 'Vacant'");?>
                        <?php foreach($room as $vacant): ?>
                          <option value="<?= $vacant['room']; ?>"><?= ucfirst($vacant['tower']); ?> - <?= ucfirst($vacant['room']); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Monthly Rent Price</label>
                    <div class="col-sm-3">
                      <input type="int" class="form-control" placeholder="Monthly Rent Price" name="price">
                    </div>
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-3">
                      <select id="one" class="form-control" name="status">
                          <option value="1">Paid</option>
                          <option value="2">Pending</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submit">Create Tenant</button>
                  </form>
              </div>
              <!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->


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
