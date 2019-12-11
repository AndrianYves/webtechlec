<?php include 'inc/db.php'; ?>
<?php
  $sql = mysqli_query($db,"UPDATE personnel SET status = 'On Duty' WHERE id=".$_GET['id']."");
  header('location: users.php');
?>