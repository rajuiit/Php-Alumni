<?php
    include('functions.php');
    $id = $_GET['id'];
    $query= "DELETE FROM `requests` WHERE `requests`.`alm_id` = '$id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="admin-panel.php">Back</a>