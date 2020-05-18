<?php
  include 'conn.php';

  $id=$_GET['id'];

  $q="DELETE FROM `events` WHERE id='$id'";

  mysqli_query($con,$q);

  header('location:admin-events.php');

  ?>