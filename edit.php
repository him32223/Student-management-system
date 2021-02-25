<?php
	include_once('include/data.php'); 
	$qry="SELECT * FROM `tb-information` WHERE id='".$_GET['id']."'";
	$sql=mysqli_query($conn,$qry);
	$row=mysqli_fetch_array($sql);

	if(isset($_POST['edit'])&& isset($_GET['id'])){
		$Name=$_POST['name'];
		$Age=$_POST['Age'];
		$Gender=$_POST['sex'];
		$Address=$_POST['address'];
		$Phone=$_POST['phone'];
		$Email=$_POST['email'];

		$Query="UPDATE tb_user SET Name='$Name',Age='$Age',Gender='$Gender',Address='$Address',Email='$Email',Phone_number='$Phone' WHERE Id='".$_GET['id']."'";

		if($result=mysqli_query($conn,$Query)){
			echo"<script>window.location.href='indexx.php';
			alert('Record Success to Edit');
			</script>";
		}else{
			echo"<script>alert('record Fails to Edit')</script>";
		}

	}
?>

<style>
	btn{
		font-weight: bold;
		height:36px;
		cursor: default;
		width: 100px;
	 }

	label{
		display: inline-block;
		margin-bottom: 5px;
		font-weight: bold;
	}

	label input{
		height: unset;
	}

	.group{
		margin: 10px;
	}

	body{
		font-family: Courier New;
	}
</style>

<form class="form horizonatal" action="edit.php?id=<?=$_GET['id']?>"
	method="post" enctype="multipart/form-date">
		<div class="controls group">
			<label class="control label">Name</label>
				<div class="controls">
					<input type="text" name="name" placeholder="Name" value="<?=$row['Name']?>" required>

				</div>
		</div>

<div>
	<div class="control group">
		<label class="control label">Age</label>
			<div class="controls">
				<input type="text" name="Age" placeholder="Age" value="<?=$row['Age']?>" required>
			</div>
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">Gender</label>
			<div class="controls">
				 <label><input type="radio" name="sex" value="male" <?php if($row['Gender']=='male'){echo 'checked="checked"';}?> required="required">Male</label>
				 <label><input type="radio" name="sex" value="female" <?php if($row['Gender']=='female'){echo 'checked="checked"';}?> required="required" >female</label>
			</div>
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">Address</label>
			<div class="controls">
				<input type="text" name="address" placeholder="Address" value="<?=$row['Address']?>" required>
			</div>
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">Email</label>
			<div class="controls">
				<input type="email" name="email" placeholder="Email" value="<?=$row['Email']?>" required>
			</div>
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">Phone number</label>
			<div class="controls">
				<input type="text" name="phone" placeholder="Phone Number" value="<?=$row['Phone_number']?>" required>
			</div>
	</div>

</div>

<div><br>
	<div class="control group">
		<div class="controls">
			<button type="submit" name="edit" value="edit" class="btn">submit</button>
			<button type="button" onclick="window.location.href='indexx.php'" class="btn">Back</button>
		</div>
	</div>
</div>
</form>


