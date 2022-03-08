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
	$query5 = mysqli_query($mysqli,"SELECT us_code FROM users ORDER BY sr_no DESC");
	$row5 = mysqli_fetch_assoc($query5);
	$maxcode= $row5['us_code'];
	$newcode = $maxcode+1;


?>
<div id="wrapper">
<?php
	include'side_bar.php';
	//retrieve avaliable designation
	$query6="SELECT des_id,des_name FROM designation WHERE bh_code='$bh_id'";
	$rs4=mysqli_query($mysqli,$query6);
 ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Create User</span>
				</h2>
		</div>
		<!--//banner-->
 	<div class="container" >
		 <br/>
		  <form class="form-horizontal" action="" method="POST">

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">User Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder=""  value="<?php echo $newcode; ?>"  name="user_code" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Name of User" name="user_name" required>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Username</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Username" name="username" required>
			  </div>
			</div>

			<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Designation</label>
				  <div class="col-sm-8">
					<select class="form-control" id="sel1" name="des">
					<?php
					while($row=mysqli_fetch_array($rs4))
					{ ?>
						<option value="<?php echo $row["des_id"]; ?>"><?php  echo $row["des_name"]; ?></option>
					<?php } ?>
					</select>
				  </div>
				</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Address</label>
				<div class="col-sm-8">
					<textarea class="form-control" rows="4" id="comment"placeholder="Enter User Address" name="user_address" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Telephone</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Telephone Number" name="user_telephone" onkeypress="return isNumber(event)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">ID/PP No</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter ID/PP No" name="user_pp" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Password</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email" placeholder="Enter Password" name="user_pwd" required>
				</div>
				<div class="col-sm-2">
				<button type="submit" class="btn btn-default btn-success" name="user_create">create</button>
			  </div>
			</div>
			<div class="form-group">
			  
			</div>
		  </form>
	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//create user
	if(isset($_POST['user_create']))
	{
    date_default_timezone_set("Asia/Muscat");
		$user_code= mysqli_real_escape_string($mysqli,$_POST['user_code']);
		$user_name= mysqli_real_escape_string($mysqli,$_POST['user_name']);
		$username= mysqli_real_escape_string($mysqli,$_POST['username']);
		$user_address= mysqli_real_escape_string($mysqli,$_POST['user_address']);
		$user_telephone= mysqli_real_escape_string($mysqli,$_POST['user_telephone']);
		$user_pp= mysqli_real_escape_string($mysqli,$_POST['user_pp']);
		$user_pwd= mysqli_real_escape_string($mysqli,$_POST['user_pwd']);
		$des= mysqli_real_escape_string($mysqli,$_POST['des']);
		$sql = "INSERT INTO `users` (`us_code`, `us_name`,`user_nam`, `us_addr`, `us_tel`, `us_pp`,`pass_wor`,`bh_code`, `us_des`) VALUES ('$user_code', '$user_name', '$username','$user_address', '$user_telephone', '$user_pp', '$user_pwd', '$bh_id','$des');";

    $sqlr = "INSERT INTO `rights` (`user_rts_code`, `bh_code`) VALUES ('$user_code',  '$bh_id');";

		if (mysqli_query($mysqli, $sql)) {
      if(mysqli_query($mysqli,$sqlr))
      {
			echo "<script>alert('user $user_name Added  Successfully..');</script>";
			echo " <script>window.location='ur_create.php';</script>";
    }

		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
	}
?>
