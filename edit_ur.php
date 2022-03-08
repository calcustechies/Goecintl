<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<?php
include'config.php';
include'head.php';
?>

<?php

if(isset($_GET['us_code']))
{
	$id = $_GET['us_code'];
	$query = mysqli_query($mysqli,"SELECT * FROM users WHERE us_code='$id'");
	if(mysqli_num_rows($query)==1){
	$row = mysqli_fetch_assoc($query);
	$code = $row['us_code'];
	$name = $row['us_name'];
	$username = $row['user_nam'];
	$address = $row['us_addr'];
	$telephone = $row['us_tel'];
	$pp = $row['us_pp'];
	$des = $row['us_des'];
	$bhcode = $row['bh_code'];

}
else{

	echo "<script>alert('error');window.location='index.php'</script>";

	}

}
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
				<span>Edit Customer</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<?php
			$query51="SELECT * FROM designation WHERE bh_code='$bh_id'";
			$rs51=mysqli_query($mysqli,$query51);
			$query52="SELECT * FROM branch";
			$rs52=mysqli_query($mysqli,$query52);
		?>
		<br/>
		<form class="form-horizontal" action="" method="POST">

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">User Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder=""  value="<?php echo $code; ?>"  name="user_code" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Name of User" name="user_name" value="<?php echo $name; ?>" required>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Username</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
			  </div>
			</div>

			<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Designation</label>
				  <div class="col-sm-8">
					<select class="form-control" id="sel1" name="des">
					<?php
					while($row51=mysqli_fetch_array($rs51))
					{
						if($row51["des_id"] == $des)
						{
						?>

						<option value="<?php echo $row51["des_id"]; ?>" selected><?php  echo $row51["des_name"]; ?></option>

						<?php
						}else{
						?>
						<option value="<?php echo $row51["des_id"]; ?>"><?php  echo $row51["des_name"]; ?></option>
						<?php }} ?>
					</select>
				  </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Address</label>
				<div class="col-sm-8">
					<textarea class="form-control" rows="4" id="comment"placeholder="Enter User Address" name="user_address" required><?php echo $address; ?>
					</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Telephone</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Telephone Number" name="user_telephone" value="<?php echo $telephone; ?>" onkeypress="return isNumber(event)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">ID/PP No</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter ID/PP No" name="user_pp" value="<?php echo $pp; ?>" required>
				</div>
			</div>
			<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Branch Name</label>
				  <div class="col-sm-8">
					<select class="form-control" id="sel1" name="branchname">
					<?php
					while($row52=mysqli_fetch_array($rs52))
					{
						if($row52["bh_code"] == $bhcode)
						{
						?>

						<option value="<?php echo $row52["bh_code"]; ?>" selected><?php  echo $row52["bh_name"]; ?></option>

						<?php
						}else{
						?>
						<option value="<?php echo $row52["bh_code"]; ?>"><?php  echo $row52["bh_name"]; ?></option>
						<?php }} ?>
					</select>
				  </div>
			</div>
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="user_update">Update</button>
			  </div>
			</div>
		  </form>

	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//update User
	if(isset($_POST['user_update']))
	{
		$user_code= mysqli_real_escape_string($mysqli,$_POST['user_code']);
		$user_name= mysqli_real_escape_string($mysqli,$_POST['user_name']);
		$username= mysqli_real_escape_string($mysqli,$_POST['username']);
		$user_address= mysqli_real_escape_string($mysqli,$_POST['user_address']);
		$user_telephone= mysqli_real_escape_string($mysqli,$_POST['user_telephone']);
		$user_pp= mysqli_real_escape_string($mysqli,$_POST['user_pp']);
		$des= mysqli_real_escape_string($mysqli,$_POST['des']);
		$branchname= mysqli_real_escape_string($mysqli,$_POST['branchname']);
		$query2 = mysqli_query($mysqli,"UPDATE users SET us_code='$user_code',user_nam='$username',us_name='$user_name',us_addr='$user_address',us_tel='$user_telephone',us_pp='$user_pp',bh_code='$branchname',us_des='$des' WHERE us_code ='$id'");
		if($query2){
			echo "<script>alert('Success');window.location='edit_ur.php?us_code=$id';</script>";
		}else{
			echo "<script>alert('fail');window.location='edit_ur.php?ur_code=$id';</script>";
		}
	}
?>
