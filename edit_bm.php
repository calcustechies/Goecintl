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

if(isset($_GET['bh_code']))
{
	$id = $_GET['bh_code'];
	$query = mysqli_query($mysqli,"SELECT * FROM branch WHERE bh_code='$id'");
	if(mysqli_num_rows($query)==1){
	$row = mysqli_fetch_assoc($query);
	$code = $row['bh_code'];
	$name = $row['bh_name'];
	$address = $row['bh_adrs'];
	$telephone = $row['bh_tel'];
	$contact = $row['bh_contact'];

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
				<span>Edit Branch</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
		<form class="form-horizontal" action="" method="POST">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Branch Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Branch Code" name="branch_code" value="<?php  echo $code; ?>" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Branch Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Branch Name" name="branch_name" value="<?php  echo $name; ?>" required>
			  </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Address</label>
				<div class="col-sm-8">
					<textarea class="form-control" rows="4" id="comment" placeholder="Enter Branch Address" name="branch_addr" required ><?php  echo $address; ?></textarea>
				</div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Telephone</label>
			  <div class="col-sm-8">
				<input type="name" class="form-control" id="email" placeholder="Enter Telephone" name="branch_telephone" value="<?php  echo $telephone; ?>" onkeypress="return isNumber(event)" required>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Contact Person</label>
			  <div class="col-sm-8">
				<input type="name" class="form-control" id="email" placeholder="Enter Contact Person Name" name="branch_contact" value="<?php  echo $contact; ?>" required>
			  </div>
			</div>

			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="branch_update">Update</button>
			  </div>
			</div>
		</form>

	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//update Branch
	if(isset($_POST['branch_update']))
	{
		$branch_code = $_POST['branch_code'];
		$branch_name = $_POST['branch_name'];
		$branch_addr = $_POST['branch_addr'];
		$branch_telephone= $_POST['branch_telephone'];
		$branch_contact = $_POST['branch_contact'];
		$query2 = mysqli_query($mysqli,"UPDATE branch SET bh_code='$branch_code',bh_name='$branch_name',bh_adrs='$branch_addr',bh_tel='$branch_telephone',bh_contact='$branch_contact' WHERE bh_code ='$id'");
		if($query2){
			echo "<script>alert('Success');window.location='edit_bm.php?bh_code=$id';</script>";
		}
	}
?>
