<?php
	include_once('include/data.php');
    if(isset($_POST['register'])){
    $Username=$_POST['username'];
    $Password=$_POST['password'];
  	$Name=$_POST['name'];
  	$Age=$_POST['age'];
  	$Gender=$_POST['sex'];
  	$Address=$_POST['address'];
  	$Phone=$_POST['phone'];
  	$Email=$_POST['email'];
  	$Query="INSERT INTO `tb-information`(Name,Age,Gender,Address,Email,Phone_number)
  	Values('$Name','$Age','$Gender','$Address','$Email','$Phone')";
  		if($result=mysqli_query($conn,$Query)){
  			$login_query="INSERT INTO `tb-login`(Username,Password) Values
  			('$Username','$Password')";
  				if($login_result=mysqli_query($conn,$login_query)){
  					echo"<script>window.location.href='login.php';
  					alert('Successfully Register');</script>";

  				}else{
  					echo"<script>alert('Fails to Register Login');</script>";
  				}
  		}else{
  			echo "<script>alert('Fails to Register User');</script>";
  		}


    }
    ?>

<head>
	<script src="js/jquery.min.js">
	</script>
</head>

<div class="container">
	<form class="form horizontal" action="register.php" method="post">
		<div class="control group">
			<label class="control label">Username</label>
				<div class="controls">
					<input type="text" name="username" placeholder="Username" required="required">
				</div>
		</div>

		<div class="control group">
			<label class="control label">Password</label>
				<div class="controls">
					<input type="password" name="password" id="txtNewPassword" placeholder="Password" required="required">
				</div>
		</div>

		<div class="control group">
			<label class="control label">Confirm Password</label>
				<div class="controls">
					<input type="password" name="password" id="txtConfirmPassword" placeholder="Password" required="required">
					<div class="registrationFormAlert" id="divCheckPasswordMatch" style="display:inline-block;"></div>
				</div>
		</div>

		<div class="control group">
			<label class="control label">Name</label>
			<div class="controls">
				<input type="name" name="name" placeholder="Name" required="required">
			</div>
		</div>

		<div class="control group">
			<label class="control label">Age</label>
			<div class="controls">
				<input type="text" name="age" placeholder="Age" required="required">
			</div>
		</div>

		<div class="control group">
			<label class="control label">Gender</label>
			<label><input type="radio" name="sex" value="male" required="required">Male</label>
			<label><input type="radio" name="sex" value="female" required="required">Female</label>
		</div>

		<div class="control group">
			<label class="control label">Address</label>
			<div class="controls">
				<input type="text" name="address" placeholder="Address" required="required">
			</div>
		</div>

		<div class="control group">
			<label class="control label">Email</label>
			<div class="controls">
				<input type="email" name="email" placeholder="Email" required="required">
			</div>
		</div>

		<div class="control group">
			<label class="control label">Contact Number</label>
			<div class="controls">
				<input type="text" name="phone" placeholder="Contact Number" required="required">
			</div>
		</div><br>
					<div class="control group">
						<div class="controls">
							<button type="submit" name="register" id="register" value="register" class="btn">Submit</button>
							<button type="button" onclick="window.location.href='login.php'" class="btn">Back</button>
						</div>
					</div>
				</form>
			</div>

<style>
	.btn{
		font-weight: 700
		height:36px;
		cursor: default;
		width: 100px
	}

	.label{
		display: inline-block;
		margin-bottom: 5px;
		font-weight: bold;
	}

	input{
		font-weight: bold;
		height: 28px;
	}

	label input{height: unset}
	.group{margin: 10px;}
	body{font-family: Courier New;}
</style>

<!--check the password and confirm password is match or not-->
<script>
	$(function(){
		$("#txtConfirmPassword").on('keyup',function()
			{var password=$("#txtNewPassword").val();
			var btn=document.getElementById("register");
			if(password==$(this).val()){
				btn.disabled=false;
				$('#divCheckPasswordMatch').html('Matching').css('color','green');
			}else{
				btn.disabled=true;
				$('#divCheckPasswordMatch').html('Not Matching').css('color','red');
			}

		});
	});
</script>