<!--/ Delete Notice /-->
  <?php
  include 'conn.php';

  $id=$_GET['id'];

  $q="DELETE FROM `notice_board` WHERE id='$id'";

  mysqli_query($con,$q);

  header('location:admin-notice-board.php');

  ?>