<?php
  include 'conn.php';

  $id=$_GET['id'];

  $q="DELETE FROM `contact_message` WHERE id='$id'";

  mysqli_query($con,$q);

  header('location:admin-contact.php');

  ?>