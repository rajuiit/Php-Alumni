
<?php
		 include 'conn.php';
		 include 'functions.php';
        if(isset($_POST['done2'])){
			$alm_photo=$_FILES['alm_photo'];

			$imagename=$alm_photo['name'];
			$imageerror=$alm_photo['error'];
			$imagetmp=$alm_photo['tmp_name'];

			$imageext=explode('.', $imagename);
			$imagecheck=strtolower(end($imageext));

			$imageextstored= array('png', 'jpg', 'jpeg');

			if (in_array($imagecheck, $imageextstored)) {
				$destinationimage='profilepictures/'.$imagename;
				move_uploaded_file($imagetmp, $destinationimage);
			}

			$name=$_POST['name'];
			$id=$_POST['id'];
			$department=$_POST['department'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$contact_no=$_POST['contact_no'];
			$batch_no=$_POST['batch_no'];
			$personal_email=$_POST['personal_email']; 
			$current_country=$_POST['curr_country'];
			$job_post=$_POST['curr_job_pos'];
			$Organizaton=$_POST['curr_job_organization'];
			$studying=$_POST['curr_study'];
            $query = "INSERT INTO `requests`(`alm_id`, `alm_name`, `alm_department`, `alm_email`, `alm_contact_no`, `alm_batch_no`, `alm_password`,`alm_p_email`,`alm_curr_country`,`alm_curr_job_pos`,`alm_curr_job_organization`,`alm_curr_study`,`alm_photo`) VALUES ('$id','$name','$department','$email','$contact_no','$batch_no','$password','$personal_email','	$job_post','$current_country','$Organizaton','$studying','$destinationimage')";
			
			if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
			}
			
			
		}
		

?>
    
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<a href="index.php">Back to Home</a>
</body>
</html>