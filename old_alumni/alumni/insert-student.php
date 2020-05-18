<?php
	include 'conn.php';

	if(isset($_POST['done'])){

		$name=$_POST['name'];
		$id=$_POST['id'];
		$department=$_POST['department'];
		$email=$_POST['email'];
		$contact_no=$_POST['contact_no'];
		$batch_no=$_POST['batch_no'];

		$q = "INSERT INTO `students`(`s_id`, `s_name`, `s_department`, `s_email`, `s_contact_no`, `s_batch_no`) VALUES ('$id','$name','$department','$email','$contact_no','$batch_no')";

		$query = mysqli_query($con,$q);

		echo "<script>location.href='admin-students.php'</script>";
	}


?>