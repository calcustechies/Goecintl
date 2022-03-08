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

if(isset($_GET['cus_code']))
{
	$id = $_GET['cus_code'];
	$query = mysqli_query($mysqli,"SELECT * FROM customer WHERE cus_code='$id'");
	if(mysqli_num_rows($query)==1){
	$row = mysqli_fetch_assoc($query);
	$code = $row['cus_code'];
	$name = $row['cus_name'];
	$address = $row['cus_addr'];
	$telephone = $row['cus_tel'];
	$pp = $row['cus_pp'];
	$civil = $row['cus_civil'];
	$nationality = $row['nationality'];
	$query44="SELECT iso3,name FROM country";
	$rs44=mysqli_query($mysqli,$query44);

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
		<br/>
		<form class="form-horizontal" action="" method="POST">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Customer Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Code" name="customer_code"  value="<?php  echo $code; ?>" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Customer Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Customer Name" name="customer_name"  value="<?php  echo $name; ?>" required>
			  </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Customer Address</label>
				<div class="col-sm-8">
					<textarea class="form-control" rows="4" id="comment"placeholder="Enter Customer Address" name="customer_address" required><?php  echo $address; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Telephone</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Telephone Number" name="customer_telephone"  value="<?php  echo $telephone; ?>" onkeypress="return isNumber(event)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Civil ID</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Civil ID" name="customer_civil"  value="<?php  echo $civil; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">ID/PP No</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter PP No" name="customer_pp"  value="<?php  echo $pp; ?>" required>
				</div>
			</div>
			<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Nationality By</label>
				  <div class="col-sm-8">
					<select class="form-control" id="customer_country" name="customer_country">

						
					<?php
					while($row44=mysqli_fetch_array($rs44))
					{
						if($row44['iso3'] == $nationality)
						{
						?>

						<option value="<?php echo $row44["iso3"]; ?>" selected><?php  echo $row44["name"]; ?></option>
					<?php }?>
						<?php
						if($row44['iso3'] != $nationality)
						{
						?>

						<option value="<?php echo $row44["iso3"]; ?>"><?php  echo $row44["name"]; ?></option>
					<?php }?>

<?php
				} ?>
					</select>
				  </div>
				</div>
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="customer_update">Update Customer</button>
			  </div>
			</div>
			
		  </form>

	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//update Customer
	if(isset($_POST['customer_update']))
	{
		$customer_code = $_POST['customer_code'];
		$customer_name = $_POST['customer_name'];
		$customer_address = $_POST['customer_address'];
		$customer_telephone= $_POST['customer_telephone'];
		$customer_pp = $_POST['customer_pp'];
		$customer_civil = $_POST['customer_civil'];
		$customer_country = $_POST['customer_country'];
		
		$query2 = mysqli_query($mysqli,"UPDATE customer SET cus_code='$customer_code',cus_name='$customer_name',cus_addr='$customer_address',cus_tel='$customer_telephone',cus_pp='$customer_pp',cus_civil='$customer_civil',nationality='$customer_country' WHERE cus_code ='$id'");
		if($query2){
			echo "<script>alert('Success');window.location='cus_edit.php';</script>";
		}else{
			echo "<script>alert('fail');window.location='edit_cus.php?cus_code=$id';</script>";
		}
	}
?>
