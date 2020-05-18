<?php

include "conn.php";
$q = "TRUNCATE TABLE slider";
$query= mysqli_query($con,$q);
echo "<script>alert('removed  Successfully'); location.href='admin-panel.php';</script>";
?>