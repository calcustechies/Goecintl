<?php 
	include'config.php';
	include'head.php'; 
	$query5 = mysqli_query($mysqli,"SELECT max(des_id) as max FROM designation ");
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
				<span>Create Designation</span>
				</h2>
		</div>
		<!--//banner-->
 	<div class="container">
		 <br/>
		  <form class="form-horizontal" action="" method="POST">
			
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Designation Id</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder=""  value="<?php echo $newcode; ?>"  name="des_id" readonly>
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Desination Name</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Enter Designation Name" name="des_name" required>
			  </div>
			</div>
			<div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="des_create">create</button>
			  </div>
			</div>
		  </form>
	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php
	//create user designation
	if(isset($_POST['des_create']))
	{
		$des_id= mysqli_real_escape_string($mysqli,$_POST['des_id']);
		$des_name= mysqli_real_escape_string($mysqli,$_POST['des_name']); 

		$sql = "INSERT INTO `designation` (`des_id`, `des_name`, `bh_code`) VALUES ('$des_id', '$des_name', '$bh_id');";
		
		if (mysqli_query($mysqli, $sql)) {
			echo "<script>alert('Designation $des_name Added  Successfully..');</script>";
			echo " <script>window.location='ur_des.php';</script>";

		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
	}
?>