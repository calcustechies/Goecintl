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
	$query5 = mysqli_query($mysqli,"SELECT bh_code as max FROM branch ORDER BY sr_no DESC");
	$row5 = mysqli_fetch_assoc($query5);
	$maxcode= $row5['max'];
	$newcode = $maxcode+1;
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
				<span>Create Branch</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	 <div class="container">
			<br/>
		  <form class="form-horizontal" action="" method="POST">
        <div class="row">
          <div class="col-md-12">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Branch Code</label>
			  <div class="col-sm-8 col-md-6">
				<input type="text" class="form-control" id="email" placeholder="Enter Branch Code" name="branch_code" size="4" value="<?php echo $newcode ?>" readonly>
			  </div>
			</div>
    </div>
    </div>
      <div class="row">
        <div class="col-md-12">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Branch Name</label>
			  <div class="col-sm-8 col-md-6">
				<input type="text" class="form-control" id="email" placeholder="Enter Branch Name" name="branch_name" required>
			  </div>
			</div>
    </div>
    </div>

      <div class="row">
        <div class="col-md-12">
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Address</label>
				<div class="col-sm-8 col-md-6">
					<textarea class="form-control" rows="4" id="comment" placeholder="Enter Branch Address" name="branch_addr" required></textarea>
				</div>
			</div>
    </div>
    </div>

      <div class="row">
        <div class="col-md-12">
			<div class="form-group">
			  <label class="control-label col-sm-2 col-md-2" for="email">Telephone</label>
			  <div class="col-sm-8 col-md-6">
				<input type="name" class="form-control" id="email" placeholder="Enter Telephone" name="branch_telephone" onkeypress="return isNumber(event)" required>
			  </div>
			</div>
    </div>
    </div>

      <div class="row">
        <div class="col-md-12">
			<div class="form-group">
			  <label class="control-label col-sm-2 col-md-2" for="email">Contact Person</label>
			  <div class="col-sm-8 col-md-6">
				<input type="name" class="form-control" id="email" placeholder="Enter Contact Person Name" name="branch_contact" required>
			  </div>
			</div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-12">
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-2" for="email">BM Username</label>
      <div class="col-sm-8 col-md-6">
      <input type="name" class="form-control" id="email" placeholder="Enter Branch Master Username" name="branch_uname" required>
      </div>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-12">
  <div class="form-group">
    <label class="control-label col-sm-2 col-md-2" for="email">BM Password</label>
    <div class="col-sm-8 col-md-6">
    <input type="name" class="form-control" id="email" placeholder="Enter Branch Master Password" name="branch_pwd" required>
    </div>
  </div>
</div>
</div>

      <div class="row">
        <div class="col-md-12">
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10 col-md-6">
				<button type="submit" class="btn btn-default" name="branch_create">create</button>
			  </div>
			</div>
    </div>
    </div>
		  </form>
	 </div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//create branch
	if(isset($_POST['branch_create']))
	{
		$branch_code= mysqli_real_escape_string($mysqli,$_POST['branch_code']); //branch code
		$branch_name= mysqli_real_escape_string($mysqli,$_POST['branch_name']); //branch name
		$branch_addr= mysqli_real_escape_string($mysqli,$_POST['branch_addr']); //branch address
		$branch_telephone= mysqli_real_escape_string($mysqli,$_POST['branch_telephone']); //branch telephone
		$branch_contact= mysqli_real_escape_string($mysqli,$_POST['branch_contact']); //branch contact person
    $branch_uname= mysqli_real_escape_string($mysqli,$_POST['branch_uname']); //branch contact person
    $branch_pwd= mysqli_real_escape_string($mysqli,$_POST['branch_pwd']); //branch contact person

    $query52 = mysqli_query($mysqli,"SELECT us_code FROM users ORDER BY sr_no DESC");
  	$row52 = mysqli_fetch_assoc($query52);
  	$maxcode2= $row52['us_code'];
  	$newcode2 = $maxcode2+1;

		$sql = "INSERT INTO `branch` (`bh_code`, `bh_name`, `bh_adrs`, `bh_tel`, `bh_contact`) VALUES ('$branch_code', '$branch_name', '$branch_addr', '$branch_telephone', '$branch_contact');";
    $sql2 = "INSERT INTO `users` (`us_code`, `us_name`,`user_nam`, `us_addr`, `us_tel`, `us_pp`,`pass_wor`,`bh_code`, `us_des`) VALUES ('$newcode2','$branch_name','$branch_uname', '$branch_addr', '$branch_telephone','0','$branch_pwd', '$branch_code','2');";
    $sqlr = "INSERT INTO `rights` (`user_rts_code`, `bh_code`,`c_m`,`c_m_create`,`c_m_edit`,`c_m_rates`,`u_m`,`u_m_create`,`u_m_edit`,`u_m_des`) VALUES ('$newcode2',  '$branch_code','1','1','1','1','1','1','1','1');";
    if (mysqli_query($mysqli, $sql)) {
      if (mysqli_query($mysqli, $sql2) && mysqli_query($mysqli, $sqlr))
      {
			echo "<script>alert('Branch $branch_name Added  Successfully..');</script>";
			echo " <script>window.location='bm_create.php';</script>";
      }
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
	}
?>
