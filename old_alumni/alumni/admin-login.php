<?php
	session_start();
	$host = "localhost:3306";
	$dbUsername= "proconfl_mahedy";
	$dbPassword = "mahedy01798173317";
	$dbname = "proconfl_csepc_db";
	
	//mysql_connect($host,$dbUsername,$dbPassword);
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	//mysql_select_db($dbname);

	if(isset($_POST['username'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$sql="select * from admin where username='".$username."'AND password='".$password."' limit 1";
			
			//$result=mysql_query($sql);
			$result = $conn-> query($sql);
			
			//if(mysql_num_rows($result)==1){
			if($result-> num_rows == 1){
					$_SESSION["username"]=$username;
					//echo "You have Successfully Logged in";
					echo "<script>alert('You have Successfully Logged in'); location.href='admin-panel.php';</script>";
			}else{
				echo "<script>alert('wrong username or password!'); location.href='admin-login-error.php';</script>";
			}
		
	}
?>