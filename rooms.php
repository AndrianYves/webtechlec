<?php 
  include 'inc/session.php';
  include 'inc/header.php';
  include 'inc/db.php';
 ?>
<?php
$link = "Rooms";
if(isset($_POST['update'])){ 
  $roomid = $_POST["roomid"];
  $roomstatus = $_POST["roomstatus"];

  $sql = mysqli_query($db,"UPDATE rooms SET status = '$roomstatus' WHERE id = '$roomid'");
  echo "<script>alert('Room Updated!);</script>";
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
            <h1 class="m-0 text-dark">Rooms</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rooms</li>
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
                    <th width="200">Tower</th>
                    <th width="100">Room</th>
                    <th width="100">Status</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM rooms");
                  while ($row = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $row['tower'];?></td>
                    <td><?php echo $row['room'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                       <div class="btn-group btn-group-sm">
                         <a data-toggle='modal' data-target='#editpersonnel<?php echo $row['id']; ?>' href='#editpersonnel?id=<?php echo $row['id']; ?>' class="btn btn-info">Update</a>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="editpersonnel<?php echo $row['id']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Room</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="rooms.php" method="POST">               
                           <div class="card-body">
                              <div class="form-group">
                                <input class="form-check-input" type="text" name="roomid" id="roomid" value="<?php echo $row['id'];?>" style="visibility: hidden;">
                                <label for="exampleInputEmail1">Status</label>
                                 <select id="one" class="form-control" name="roomstatus">
                                  <option><?php echo $row['status'];?></option>
                                  <option value="2">Vacant</option>
                                  <option value="3">Reserved</option>
                                  <option value="4">Not Available</option>
                                </select>
                              </div>
                            </div>
                            <!-- /.card-body -->
                          
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="update">Update Room</button>
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
