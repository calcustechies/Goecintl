<?php 
include'config.php';
include'head.php'; 
?>
<div id="wrapper">
<?php include'side_bar.php'; ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->	
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Edit User</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<?php
		$sql1=" SELECT * from users where us_frz='0' and bh_code='$bh_id'";

		$rs=mysqli_query($mysqli,$sql1);

	?>
		<br/>
		<table class="table table-hover">
			<thead style="background-color:#33d28b;color:black">
			  <tr>
				<th>Sl.No</th>
				<th>User Code</th>
				<th>Name</th>
				<th>Username</th>
				<th>Designation</th>
				<th>ID/PP No</th>
				<th>Edit</th>
				<th>Black List</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$i=1;
				while($row=mysqli_fetch_array($rs))
				{ 
					$des_idd=$row["us_des"];
					$query51 = mysqli_query($mysqli,"SELECT * FROM designation WHERE des_id='$des_idd'");
					$row21 = mysqli_fetch_assoc($query51);
			?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php  echo $row["us_code"]; ?></td>
					<td><?php  echo $row["us_name"]; ?></td>
					<td><?php  echo $row["user_nam"]; ?></td>
					<td><?php  echo $row21["des_name"]; ?></td>
					<td><?php  echo $row["us_pp"]; ?></td>
					<td><a href="edit_ur.php?us_code=<?php echo $row["us_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<td><a href="ur_edit.php?us_code=<?php echo $row["us_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
					</tr>
				
				<?php $i++;}
			?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php

if(isset($_GET['us_code']))
{
	$id = $_GET['us_code'];	
	$query2 = mysqli_query($mysqli,"UPDATE users SET us_frz='1' WHERE us_code='$id'");
	if($query2){
		
		echo "<script>alert('Success');window.location='ur_edit.php';</script>";
		}
}
?>