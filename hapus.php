<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM class_profile WHERE id='$id'");
	header("location:main.php");
 ?>