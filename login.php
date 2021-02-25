<?php
session_start();
include_once('include/db.php');
if(isset($_POST['login'])){
	if(!empty($_POST['Username']) && !empty($_POST['Password']) && !empty($_POST['Permission'])){
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];
		$Permission=$_POST['Permission']
		$Query="SELECT * FROM tb_login WHERE Username= '".$Username."' AND Password='".$Password."' AND Permission='".$Permission."' " ;
		$result=mysqli_query($conn,$Query);
		$rows=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if($rows==1){
			echo"<script>window.location.href='index.php?user=".$row['Id']."';
			alert('Successfully login');</script>";
			$_SESSION["per"]=$row['Permission'];

		}else{
			echo"<script>alert('Wrong Username or Password!Please try again');</script>";
		}
	}else{
		echo"<script>alert('Please Insert Username or Password');
				</script>";
	}

}
?>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<style>
	.btn{
		font-weight:700;
		height:36px;
		coursor:default;
	}

	.control-label{
		display: inline-black;
		margin-bottom: 5px;
		font-weight: bold;

	}

	.input{
		font-weight: bold;
		height: 28px;
	}
</style>
</head>

	<div class="container">
		<form class="form-horizontal" action="login.php" method="post">
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
					<input type="text" name="username" placeholder="username">
				</div>
			</div>
	</div>

	<div class="control-group">
		<label class="control-lable">Password</label>
		<div class="controls">
			<input type="password" name="password" placeholder="Password">
		</div>
	</div>

	<div class="control-group">
		<label class="control-lable">Permission</label>
		<div class="controls">
			<input type="text" name="Permission" placeholder="Permission">
		</div>
	</div>


	<br>
		<div class="control-group">
			<button type="submit"  name="login" value="login" class="btn">Sign in</button>
			<button type="button" onclick="window.location.href='register.php'" class="btn">Register</button>
		</div>
	</form>
</div>