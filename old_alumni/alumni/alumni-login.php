<?php
	session_start();
	$host = "localhost:3306";
	$dbUsername= "proconfl_mahedy";
	$dbPassword = "mahedy01798173317";
	$dbname = "proconfl_csepc_db";
	//mysql_connect($host,$dbUsername,$dbPassword);
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	//mysql_select_db($dbname);

	if(isset($_POST['alm_id'])){
			$alm_id=$_POST['alm_id'];
			$alm_password=$_POST['alm_password'];
			
			$sql="select * from alumnus where alm_id='".$alm_id."'AND alm_password='".$alm_password."' limit 1";
			
			//$result=mysql_query($sql);
			$result = $conn-> query($sql);
			
			//if(mysql_num_rows($result)==1){
			if($result-> num_rows == 1){
					$_SESSION["alm_id"]=$alm_id;
					
					//echo "You have Successfully Logged in";
					echo "<script>alert('You have Successfully Logged in'); location.href='alumni-home.php';</script>";
			}else{
					//echo "<script>alert('You Have Entered wrong information')'</script>";
					echo "<script>alert('wrong username or password!'); location.href='alumni-login-error.php';</script>";
					
			}
		
	}
?>