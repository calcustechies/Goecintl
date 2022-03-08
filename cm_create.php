<?php
	include'config.php';
	include'head.php';
	$query5 = mysqli_query($mysqli,"SELECT cy_code as max FROM currency ORDER BY sr_no DESC");
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
				<span>Create Currency</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	 <div class="container">
	 <br/>
		  <form class="form-horizontal" action="" method="POST">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Currency ID</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Code" name="currency_code" size="4" value="<?php echo $newcode ?>" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Currency Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Code" name="currency_name" required>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Currency Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Name" name="currency_nname" required>
			  </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Country</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Country" name="currency_country" required>
				</div>
			</div>
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="currency_create">create</button>
			  </div>
			</div>
		  </form>

	 	 </div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//create currency
	if(isset($_POST['currency_create']))
	{
		$currency_code= mysqli_real_escape_string($mysqli,$_POST['currency_code']); //currency code
		$currency_name= mysqli_real_escape_string($mysqli,$_POST['currency_name']); //currency name
		$currency_nname= mysqli_real_escape_string($mysqli,$_POST['currency_nname']); //currency name
		$currency_country= mysqli_real_escape_string($mysqli,$_POST['currency_country']); //currency country

		$sql = "INSERT INTO `currency` (`cy_code`,`cy_nname`, `cy_name`, `cy_country`,`bh_code`) VALUES ('$currency_code', '$currency_nname','$currency_name', '$currency_country','$bh_id');";

		if (mysqli_query($mysqli, $sql)) {
			echo "<script>alert('currency $currency_name Added  Successfully..');</script>";
			echo " <script>window.location='cm_create.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
	}
?>
