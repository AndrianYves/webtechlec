<?php 
  include 'inc/session.php';
  include 'inc/header.php';
  include 'inc/db.php';
 ?>
<?php
$link = "Request";
if(isset($_POST['submit'])){ 
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $contact = $_POST["contact"];
  $role = $_POST["role"];

  $sql = "INSERT INTO personnel(firstname, lastname, contact, role) VALUES('$firstname', '$lastname', '$contact', '$role')";   
  mysqli_query($db, $sql);
  echo "<script>alert('Personnel Created!);</script>";
}
?>
<?php
if(isset($_POST['update'])){ 
  $requestid = $_POST["requestid"];
  $personnel = $_POST["personnel"];

  $sql = mysqli_query($db,"UPDATE requests SET personincharge = '$personnel' WHERE id = '$requestid'");
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
            <h1 class="m-0 text-dark">Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Request</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               Request
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="200">Full Name</th>
                    <th width="100">Room</th>
                    <th width="100">Request</th>
                    <th width="100">Status</th>
                    <th width="100">Person in Charge</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM tenants join requests on tenants.id = requests.tenantID");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo ucfirst($row['lastname']);?>, <?php echo ucfirst($row['firstname']);?></td>
                    <td><?php echo $row['room'];?></td>
                    <td><?php echo $row['request'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo ucwords($row['personincharge']);?></td>
                    <td>
                      <a data-toggle='modal' data-target='#editpersonnel<?php echo $row['id']; ?>' href='#editpersonnel?id=<?php echo $row['id']; ?>' class="btn btn-info">Edit</a>
                    </td>
                  </tr>
                  <div class="modal fade" id="editpersonnel<?php echo $row['id']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Person in Charge</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="request.php" method="POST">               
                           <div class="card-body">
                              <div class="form-group">
                                <input class="form-check-input" type="text" name="requestid" id="requestid" value="<?php echo $row['id'];?>" style="visibility: hidden;">
                                <label for="exampleInputEmail1">Personnel</label>
                                <select id="one" class="form-control" name="personnel">
                                  <?php $person = mysqli_query($db, "SELECT * from personnel where status = 'On Duty'");?>
                                  <?php foreach($person as $per): ?>
                                    <option value="<?= $per['firstname']; ?> <?= $per['lastname']; ?>"><?= ucfirst($per['firstname']); ?> <?= ucfirst($per['lastname']); ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <!-- /.card-body -->
                          
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="update">Save</button>
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
          
                  <?php   } ?>


                  </tbody>
                </table>
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
