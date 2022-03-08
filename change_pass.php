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
				<span>Change Password</span>
				</h2>
		</div>
		<!--//banner-->
 	<div class="container">
		 <br/>
		  <form class="form-horizontal" action="" method="POST">
			
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Current Password</label>
			  <div class="col-sm-8">
				<input type="password" class="form-control" id="email" placeholder="Enter Current Password"   name="old_pass" required >
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">New Password</label>
			  <div class="col-sm-8">
				<input type="password" class="form-control" id="email" placeholder="Enter New Password" name="new_pass" required>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Re-Type New Password</label>
			  <div class="col-sm-8">
				<input type="password" class="form-control" id="email" placeholder="Re-Type New Password" name="re_new_pass" required>
			  </div>
			</div>
			
			<div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="change_pass">Change Password</button>
			  </div>
			</div>
			
		  </form>
	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//change password
	if(isset($_POST['change_pass']))
	{
		$old_pass= mysqli_real_escape_string($mysqli,$_POST['old_pass']);
		$new_pass= mysqli_real_escape_string($mysqli,$_POST['new_pass']); 
		$re_new_pass= mysqli_real_escape_string($mysqli,$_POST['re_new_pass']); 

		$query21 = mysqli_query($mysqli,"SELECT pass_wor FROM users WHERE us_code='$user_code'");
		$row21 = mysqli_fetch_assoc($query21);
		$user_password = $row21['pass_wor'];
		
		
		
		
		if($old_pass == $user_password && $new_pass == $re_new_pass )
		{
			$query22 = mysqli_query($mysqli,"UPDATE users SET pass_wor='$new_pass' WHERE us_code ='$user_code'");
			if($query22){	
				echo "<script>alert('Successfully Changed Password');window.location='index.php';</script>";
			}
		}else
		if($old_pass != $user_password)
		{
			echo "<script>alert('current password is wrong');</script>";
		}else
			if($new_pass != $re_new_pass)
		{
			echo "<script>alert('new password and re-typed password is not matching');</script>";
		}
		
	}
?>