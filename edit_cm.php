<?php
include'config.php';
include'head.php';
?>

<?php

if(isset($_GET['cy_code']))
{
	$id = $_GET['cy_code'];
	$query = mysqli_query($mysqli,"SELECT * FROM currency WHERE cy_code='$id'");
	if(mysqli_num_rows($query)==1){
	$row = mysqli_fetch_assoc($query);
	$code = $row['cy_code'];
	$name = $row['cy_name'];
	$nname = $row['cy_nname'];
	$country= $row['cy_country'];

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
				<span>Edit Currency</span>
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
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Code" name="currency_code" value="<?php  echo $code; ?>" readonly>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Currency Code</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Code" name="currency_name" value="<?php  echo $name; ?>" required >
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Currency Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Currency Code" name="currency_nname" value="<?php  echo $nname; ?>" required >
			  </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="comment">Country</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" placeholder="Enter Country" name="currency_country" value="<?php  echo $country; ?>" required>
				</div>
			</div>
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="currency_update">create</button>
			  </div>
			</div>
		</form>

	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//update Currency
	if(isset($_POST['currency_update']))
	{
		$currency_code = $_POST['currency_code'];
		$currency_name = $_POST['currency_name'];
		$currency_nname = $_POST['currency_nname'];
		$currency_country = $_POST['currency_country'];
		$query2 = mysqli_query($mysqli,"UPDATE currency SET cy_code='$currency_code',cy_name='$currency_name',cy_nname='$currency_nname',cy_country='$currency_country' WHERE cy_code ='$id'");
		if($query2){
			echo "<script>alert('Success');window.location='edit_cm.php?cy_code=$id';</script>";
		}
	}
?>
