<?php 
  include 'inc/session.php';
  include 'inc/header.php';
  include 'inc/db.php';
 ?>
<?php
$link = "Personnel";
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
            <h1 class="m-0 text-dark">Personnel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Personnel</li>
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
               Admins
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="200">Full Name</th>
                    <th width="100">Contact</th>
                    <th width="100">Role</th>
                    <th width="100">Status</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM personnel");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['role'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                       <div class="btn-group btn-group-sm">
                        <a href='personnelduty.php?id=<?php echo $row['id']; ?>' class="btn btn-success">On Duty</a>
                        <a href='personnelabsent.php?id=<?php echo $row['id']; ?>' class="btn btn-danger">Absent</a>
                         <a data-toggle='modal' data-target='#editpersonnel<?php echo $row['id']; ?>' href='#editpersonnel?id=<?php echo $row['id']; ?>' class="btn btn-info">Edit</a>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="editpersonnel<?php echo $row['id']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Personnel</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="users.php" method="POST">               
                           <div class="card-body">
                              <div class="form-group">
                                <input class="form-check-input" type="text" name="personnelid" id="personnelid" value="<?php echo $row['id'];?>" style="visibility: hidden;">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <input type="text" class="form-control" name="role" value="<?php echo $row['role']; ?>">
                              </div>
                            </div>
                            <!-- /.card-body -->
                          
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="update">Update Personnel</button>
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

         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               Create Personnel
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form class="form-horizontal" action="users.php" method="post" >
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Firstname</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Lastname</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Contact Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Contact Number" name="contact" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Role" name="role" required>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submit">Create Personnel</button>
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
