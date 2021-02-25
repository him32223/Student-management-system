<?php
include_once('include/data.php');
if(isset($_POST['login'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$Username=$_POST['username'];
		$Password=$_POST['password'];
		$Query="SELECT * FROM `tb-login` WHERE Username= '".$Username."' AND Password='".$Password."'";
		$result=mysqli_query($conn,$Query);
		$rows=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if($rows==1){
			echo"<script>window.location.href='index.php';
			alert('Successfully login');</script>";

		}else{
			echo"<script>alert('Wrong Username or Password!Please try again');</script>";
		}
	}else{
		echo"<script>alert('Please Insert Username or Password');
				</script>";
	}

}
?>
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

	<br>
		<div class="control-group">
			<button type="submit" name="login" value="logout" class="btn">Sign in</button>
			<button type="submit" onclick="window.location.href='register.php'" class="btn">Register</button>
		</div>
	</form>
</div>
