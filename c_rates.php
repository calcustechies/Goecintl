<?php
	include'head.php';
	include'config.php';
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

function showUser() {
  //var f=  document.getElementById('from_c').value;
	var t=	document.getElementById('to_c').value;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?t="+t,true);
  xmlhttp.send();
}

</script>
<div id="wrapper">
<?php
	include'side_bar.php';
	//retrieve avaliable currencies
	//$query6="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' ";
        $query6="SELECT cy_code,cy_name FROM currency  ";

	$rs4=mysqli_query($mysqli,$query6);
	//$query44="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' ";
        $query44="SELECT cy_code,cy_name FROM currency ";
	$rs44=mysqli_query($mysqli,$query44);

	//$sql45=" SELECT * from currency_rates where bh_code='$bh_id'";
        $sql45=" SELECT * from currency_rates ";
	$rs45=mysqli_query($mysqli,$sql45);
 ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a><i class="fa fa-angle-right"></i><span>Currency Rates & History</span>
				</h2>
		</div>
		<!--//banner-->
		<div class="container">
		<br/>
			<form class="form-horizontal form-inline" action="" method="POST">
			<div>

				<div class="form-group">
				  <label class="control-label col-sm-4" for="email">currency</label>
				  <div class="col-sm-8">
					<select class="form-control" id="to_c" name="to_c">
						<option value="0">--Currency--</option>
					<?php
					while($row44=mysqli_fetch_array($rs44))
					{
							if($row44['cy_code'] != '2')
							{
						?>

						<option value="<?php echo $row44["cy_code"]; ?>"><?php  echo $row44["cy_name"]; ?></option>
					<?php }} ?>
					</select>
				  </div>
				</div>
				&nbsp;&nbsp;&nbsp;
				<button type="button" onclick="showUser()" class="btn btn-primary btn-xs"><i class="fa fa-refresh "></i> Refresh History </button>
				<br/><br/>
				<!--
				<div class="form-group">
					<div class="col-sm-2">
						<input type="number" class="form-control" id="ex_rate" placeholder="Exchange Rate" name="ex_rate" step="any" hidden="true">
					</div>
				</div>
				-->
				<div class="form-group">
					<div class="col-sm-2">
						<input type="number" class="form-control" id="pur_rate" placeholder="Purchase Rate" name="pur_rate" step="any" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<input type="number" class="form-control" id="sell_rate" placeholder="Sell Rate" name="sell_rate" step="any" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-2">
							<input type="text" class="form-control" id="from_date" name="from_date" placeholder="dd-mm-yyyy" value="<?php echo date("Y-m-d");?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<input type="text" class="form-control" id="to_date" name="to_date" placeholder="dd-mm-yyyy" value="2999-12-31" required>
					</div>
				</div>


				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-default" name="curr_rate">Update</button>
					</div>
				</div>
			</div>
			</form>
			<br/>
			<div>
			<h4 style="color:#2ECC71">History</h4><br/>
			<div id="txtHint">

			</div>
			</div>
		</div>
</div>
</div>
</div>

<?php include'footer.php'; ?>

<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

                $('#from_date').datepicker({
                    format: "yyyy/mm/dd"
                });


            });
					  $(document).ready(function () {

                $('#to_date').datepicker({
                    format: "yyyy/mm/dd"
                });


            });
        </script>

<?php
	//create user
	if(isset($_POST['curr_rate']))
	{
		//$from_c= mysqli_real_escape_string($mysqli,$_POST['from_c']);
		$to_c= mysqli_real_escape_string($mysqli,$_POST['to_c']);
		$pur_rate= mysqli_real_escape_string($mysqli,$_POST['pur_rate']);
		$ex_rate= $pur_rate;
		$sell_rate= mysqli_real_escape_string($mysqli,$_POST['sell_rate']);
		$from_date= mysqli_real_escape_string($mysqli,$_POST['from_date']);
		$to_date= mysqli_real_escape_string($mysqli,$_POST['to_date']);

		//Check currency selected
		if ($to_c == 0) {
			echo "<script>alert('Please Select a Valid Currency');window.location='c_rates.php';</script>";
		}

		mysqli_query($mysqli,"UPDATE currency_rates SET active='0' WHERE to_cy ='$to_c' AND bh_code ='$bh_id'");
		$sql = "INSERT INTO `currency_rates` (`to_cy`,`cy_ex_rate`,`cy_pur_rate`,`cy_sale_rate`, `from_date`, `to_date`, `bh_code`,`us_code`,`active`) VALUES ('$to_c', '$ex_rate','$pur_rate', '$sell_rate','$from_date', '$to_date', '$bh_id','$user_code','1');";

		if (mysqli_query($mysqli, $sql)) {
			echo "<script>alert('Successfully Updated Currency Rate..');</script>";
			echo " <script>window.location='c_rates.php';</script>";

		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
	}
?>
