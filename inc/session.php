<?php
	session_start();
	include 'inc/db.php';;

	if(isset($_SESSION['admin'])){
		$sql = mysqli_query($db, "SELECT * FROM admin where `username` = '".$_SESSION['admin']."'");
		$user = mysqli_fetch_assoc($sql);
	}
	else{
		header('location: login.php');
		exit();
	}
	
?>