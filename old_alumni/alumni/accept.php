<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `alm_id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name=$row['alm_name'];
            $id=$row['alm_id'];
            $department= $row['alm_department'];
            $email= $row['alm_email'];
            $password= $row['alm_password'];
            $contact_no= $row['alm_contact_no'];
            $batch_no= $row['alm_batch_no'];

            $personal_email=$row['alm_p_email'];
            $current_country=$row['alm_curr_country'];
            $job_post=$row['alm_curr_job_pos']; 
			$Organizaton=$row['alm_curr_job_organization'];
			$studying=$row['alm_curr_study'];
			$picture=$row['alm_photo'];
            $query = "INSERT INTO `alumnus`(`alm_id`, `alm_name`, `alm_department`, `alm_email`, `alm_contact_no`, `alm_batch_no`, `alm_password`,`alm_p_email`,`alm_curr_country`,`alm_curr_job_pos`,`alm_curr_job_organization`,`alm_curr_study`,`alm_photo`) VALUES ('$id','$name','$department','$email','$contact_no','$batch_no','$password',' $personal_email','$current_country',' $job_post','$Organizaton','$studying','$picture')";
            if(performQuery($query)){
                echo "--";
            }

        }
        $query= "DELETE FROM `requests` WHERE `requests`.`alm_id` = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted--.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="admin-panel.php">Back</a>