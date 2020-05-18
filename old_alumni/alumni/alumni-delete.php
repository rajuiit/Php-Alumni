<?php
	include 'conn.php';

	$alm_id=$_GET['alm_id'];

	$q="DELETE FROM `alumnus` WHERE alm_id='$alm_id'";

	mysqli_query($con,$q);

	header('location:admin-alumnus.php');

?>