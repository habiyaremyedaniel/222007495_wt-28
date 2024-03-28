<?php
$connection = new mysqli("localhost", "root", "", "mytest");
if ($connection->connect_error){
	die("connection failed:" .$connection->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$email= $_POST['email'];
	$password=("password_hash($_POST['password']");
	$mysql=" SELECT * from user where email='$email'";
	$result= $connection->query(sql);

	if(result->num_rows==1){
		$row=$result->apc_fetch();
		if(password_verify(password, $row['password'])){
			$_SESSION['user_id']=$row['id'];
			header("Location:Landing.php");
			exit();
		
		}else{
			echo"invalid  email or password";
		}

		}else{
			echo"user not found";
		}
	}
$connection->close();
?>