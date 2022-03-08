
<?php
	include'config.php';
	include'head.php';
	updateXML2();
	$query5 = mysqli_query($mysqli,"SELECT cus_code FROM customer ORDER BY sr_no DESC");
	$row5 = mysqli_fetch_assoc($query5);
	$maxcode= $row5['cus_code'];
	$newcode = $maxcode+1;

	$query44="SELECT iso3,name FROM country  ";
	$rs44=mysqli_query($mysqli,$query44);
?>

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

<div id="wrapper">
<?php include'side_bar.php'; ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Create Customer</span>
				</h2>
		</div>
		<!--//banner-->
 	<div class="container">
		 <br/>
		  <form class="form-horizontal" action="" method="POST">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Customer Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Customer Code" name="customer_code" value="<?php echo $newcode ?>" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Customer Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Customer Name" name="customer_name" required>
			  </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Customer Address</label>
				<div class="col-sm-8">
					<textarea class="form-control" rows="4" id="comment"placeholder="Enter Customer Address" name="customer_address" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Telephone</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Telephone Number" name="customer_telephone" onkeypress="return isNumber(event)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Civil ID</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Civil ID" name="customer_civil" >
				</div>
			</div>
     		 <div class="form-group">
				<label class="control-label col-sm-2" for="comment">PP No</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter PP No" name="customer_pp" >
				</div>
			</div>
			<!-- //Country  New Field -->

			<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Nationality By</label>
				  <div class="col-sm-8">
					<select class="form-control" id="customer_country" name="customer_country">
						<option value="0" selected>--Country--</option>
					<?php
					while($row44=mysqli_fetch_array($rs44))
					{
						?>

						<option value="<?php echo $row44["iso3"]; ?>"><?php  echo $row44["name"]; ?></option>
					<?php } ?>
					</select>
				  </div>
				</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment"><h4><span class="label label-primary">Bank</span></h4></label>
				<div class="col-sm-8">
					<div class="checkbox">
					<input type="checkbox" value="1" name="bank">
				</div>
				</div>
			</div>
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="customer_create">create</button>
			  </div>
			</div>
		  </form>


	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//create customer
	if(isset($_POST['customer_create']))
	{
		$customer_code= mysqli_real_escape_string($mysqli,$_POST['customer_code']); //customer code
		$customer_name= mysqli_real_escape_string($mysqli,$_POST['customer_name']); //customer name
		$customer_address= mysqli_real_escape_string($mysqli,$_POST['customer_address']); //customer address
		$customer_telephone= mysqli_real_escape_string($mysqli,$_POST['customer_telephone']); //customer telephone
		$customer_civil= mysqli_real_escape_string($mysqli,$_POST['customer_civil']); //civil Number
		$customer_pp= mysqli_real_escape_string($mysqli,$_POST['customer_pp']); //customer id/pp number
		$bank= mysqli_real_escape_string($mysqli,$_POST['bank']); //customer id/pp number

		$customer_country= mysqli_real_escape_string($mysqli,$_POST['customer_country']);
		if ($customer_country == 0) {
			echo "<script>alert('Please Select a Valid Country');window.location='c_rates.php';</script>";
		}
		

		if($customer_pp != NULL)
		{
			//checking pp number is existing or not
			$q1 = "SELECT * FROM customer WHERE cus_pp='$customer_pp' AND bh_id='$bh_id' ";
			$result1 = mysqli_query($mysqli,$q1)or die(mysqli_error());
			$num_row1 = mysqli_num_rows($result1);
		}else
		{
			$customer_pp = $customer_civil;
		}
		
		if($customer_civil != NULL)
		{
			//checking civil number is existing or not
			$q2 = "SELECT * FROM customer WHERE cus_civil='$customer_civil' AND bh_id='$bh_id' ";
			$result2 = mysqli_query($mysqli,$q2)or die(mysqli_error());
			$num_row2 = mysqli_num_rows($result2);
		}else
		{
			$customer_civil = $customer_pp;
		}
		
		if($customer_telephone != NULL)
		{
			//checking Telephone number is existing or not
			$q3 = "SELECT * FROM customer WHERE cus_tel='$customer_telephone' AND bh_id='$bh_id' ";
			$result3 = mysqli_query($mysqli,$q3)or die(mysqli_error());
			$num_row3 = mysqli_num_rows($result3);
		}
		

		if($bank == NULL)
		{
			$bank="0";
		}
		
		$sql = "INSERT INTO `customer` (`cus_code`, `cus_name`, `cus_addr`, `cus_tel`, `cus_pp`, `bank`,`bh_id`,`cus_civil`,`nationality`) VALUES ('$customer_code', '$customer_name', '$customer_address', '$customer_telephone', '$customer_pp', '$bank', '$bh_id','$customer_civil','$customer_country');";
    //echo $sql;
		if($num_row3 == 0)
		{
			if($customer_civil == NULL)
			{
				if($num_row1 == 0 )
				{
					
					if (mysqli_query($mysqli, $sql)) {
						echo "<script>alert('customer $customer_name Added  Successfully..');window.location='cus_create.php';</script>";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				}else
				{
					echo "<script>alert('Please check PP Number..');window.location='cus_create.php';</script>";
				}
			}elseif($customer_pp == NULL)
			{
				if($num_row2 == 0 )
				{
					
					if (mysqli_query($mysqli, $sql)) {
						echo "<script>alert('customer $customer_name Added  Successfully..');window.location='cus_create.php';</script>";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				}else
				{
					echo "<script>alert('Please check Civil Number..');window.location='cus_create.php';</script>";
				}
			}else{
				if($num_row1 == 0 && $num_row2 == 0 )
				{
					
					if (mysqli_query($mysqli, $sql)) {
						echo "<script>alert('customer $customer_name Added  Successfully..');window.location='cus_create.php';</script>";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				}else
				{
					echo "<script>alert('Please check Civil/PP Number..');window.location='cus_create.php';</script>";
				}
			}
		}else
		{
			echo "<script>alert('Please check Phone Number..');window.location='cus_create.php';</script>";
		}
	}
?>
<?php
	function updateXML2()
	{
		include'config.php';
		// this file is to refresh item stockdetail every time a page is loaded

		// create a dom document with encoding utf8
		$createxml = new DOMDocument('1.0', 'UTF-8');
		// create the root element of the xml tree
		$xmlRoot = $createxml->createElement('xml');
		//append it to the document created
		$xmlRoot = $createxml->appendChild($xmlRoot);
		$get=mysqli_query($mysqli,"SELECT * FROM country;");
		while($getitem=mysqli_fetch_array($get))
		{
			$currentTrack = $createxml->createElement("country");
			$currentTrack = $xmlRoot->appendChild($currentTrack);
			$currentTrack->appendChild($createxml->createElement('iso',$getitem['iso3']));
			$currentTrack->appendChild($createxml->createElement('name',$getitem['name']));
		}
	$createxml->save('countrydetail.xml');
	}
?>
