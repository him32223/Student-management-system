<?php
include_once('include/data.php');

$query="Select*FROM `tb-information`";
$sql=mysqli_query($conn,$query);
//check if button delete is click
if(isset($_GET['id']) && isset($_GET['action'])&& $_GET['action']=='delete'){
	//get the data using $_Get[],inside the $_Get[] is the name on the url
	$ID=$_GET['id'];
	//delete user query
	$Query="DELETE FROM `tb-information` WHERE ID='$ID'";
	//check if the query run seccess then messagebox will show
	if($result=mysqli_query($conn,$Query)) {
		echo"<script>window.location.href='index.php';
		alert('Record Succesfully Delete');</script>";
		//messagebox will show when users fail to delete
		}else{
			echo"<script>alert('Record Fails to Delete')</script>";
	}
}
?>

<style>
table{
	border-collapse:collapse ; 
	width:100%;
}
th,td{text-align:left ; padding:8px;}
tr:nth-child(even){background-color:#f2f2f2;}
th{background-color:#4CAF50; color:white;}
.pull-left{float:left;}
.pull-right{float:right;}
.block{background-color:#87CEEB;width:100%;float:left;}
</style>

<div class="blocks">
	<span class="pull-right"><button type="submit" onclick="window.location.href='studentlogin.php?action=logout'">
	logout</button></span>
	</div><br>
	<div class="container">
		<table>
			<thead>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Email</th>
				<th>User ID</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>	
			<tbody>
			<?php while($row=mysqli_fetch_array($sql)){?>
			<tr>
				<td><?=$row['Name']?></td>
				<td><?=$row['Age']?></td>
				<td><?=$row['Gender']?></td>
				<td><?=$row['Address']?></td>
				<td><?=$row['Phone_number']?></td>
				<td><?=$row['Email']?></td>
				<td><?=$row['User_Id']?></td>
				
				<td>
					<button type="button" onclick="window.location.href='edit.php?id=<?=$row['ID']?>'" class="bth">Edit</button>
				</td>
				<td>
					<a href="indexx.php?id=<?=$row['ID']?>&action=delete" 
					 onclick="return confirm('Are you sure you want to Delete');">
					<button type="button">Delete"</button>
						
					</a>
				</td>
				</tr>
				<?php }?>

						




				
					




		
</tbody>
		</table>
	</div>
