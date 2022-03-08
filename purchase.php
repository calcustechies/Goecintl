<?php
	include'head.php';
	include'config.php';
	$query5 = mysqli_query($mysqli,"SELECT `tr_id` FROM transaction ORDER BY sr_no DESC");
	$row5 = mysqli_fetch_assoc($query5);
	$maxcode= $row5['tr_id'];
	$newcode = $maxcode+1;
	date_default_timezone_set("Asia/Muscat");

	$query43="SELECT iso3,name FROM country  ";
	$rs43=mysqli_query($mysqli,$query43);
	
?>


<div id="wrapper">
	<?php
		include'side_bar.php';
		//retrieve avaliable currencies
		$query6="SELECT cy_code,cy_name FROM currency WHERE cy_frz='0'";
		$rs4=mysqli_query($mysqli,$query6);
		$query44="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' and cy_frz='0' and cy_code='2'";
		$rs44=mysqli_query($mysqli,$query44);

		

	?>



	<div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="content-main">
			<!--banner-->
			<div class="banner">
				<h2>
					<a href="index.php">Home</a>
					<i class="fa fa-angle-right"></i>
					<span>Purchase </span>
				</h2>
			</div>
			<!--//banner-->
			<!--<div class="container">-->

			<form class="form-horizontal" action="" name="form" method="POST">
			<div class="row" style=" margin-right: 30px;margin-left: 80px;">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="form-group">
						<label class="control-label col-sm-6 col-md-6" for="email">DATE : &nbsp;&nbsp;&nbsp;<font color="green"><?php echo date("Y/m/d"); ?></font></label>
					</div>
				</div>
				<div class="col-lg-4 col-md-4" style="text-align:center">
					<div class="form-group">
						<label class="control-label col-sm-6 col-md-6" for="email"><p id="bk">Customer Type</p></label>
					</div>
				</div>

				<div class="col-lg-2 col-md-2">
					<div class="form-group">
						<input type="hidden" name="sale_pur" id="sale_pur" value="0">
					</div>
				</div>

			</div>
			<div class="row">

				<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Source of Fund:</label>
					<div class="col-sm-6">
						<select class="form-control" id="" name="source">
							<option value="Salary" selected>Salary</option>
							<option value="Business">Business</option>
							<option value="Others">Others</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Purpose:</label>
					<div class="col-sm-6">
						<select class="form-control" id="" name="purpose">
						<option value="Travelling" selected>Travelling</option>
						<option value="Trade">Trade</option>
						<option value="Others">Others</option>
					</select>
					</div>
				</div>
			</div>

			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Transaction ID</label>
		 				<div class="col-sm-6 col-md-6">
			 				<input type="text" class="form-control" id="email" placeholder="" name="trans_id" value="<?php echo $newcode ?>" readonly>
		 				</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Customer Code</label>
		 				<div class="col-sm-6 col-md-6">
			 				<input type="text" class="form-control" id="cus_id" placeholder="" name="cus_code" readonly>
		 				</div>
					</div>
			</div>
			</div>
			<div class="row">

				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Customer Name</label>
		 				<div class="col-sm-6 col-md-6">

							 <input type="text" class="form-control" id="cus_name" placeholder="Enter Customer Name" name="cus_name"  autocomplete="off" required>
		 				</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Telephone</label>
						<div class="col-sm-6 col-md-6">
							<input type="text" class="form-control" list="phlist" min="1" max="5" id="tel" placeholder="Enter Telephone Number" name="cus_tel"   onChange="showUser(this.value)" autocomplete="off" required>
						</div>
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label class="control-label col-sm-4 col-md-4" for="email">Civil No</label>
					<div class="col-sm-3 col-md-3">
						<input type="text" class="form-control" id="civil" list="cuscivil" placeholder="Enter Civil No" name="cus_civil"  onChange="showUser3(this.value)" autocomplete="off"  required>
					</div>
					<div class="col-sm-3">
						<select class="form-control" id="customer_country" name="customer_country">
						<option value="0" selected>--Country--</option>
						<?php
						while($row43=mysqli_fetch_array($rs43))
						{
							?>

							<option value="<?php echo $row43["iso3"]; ?>"><?php  echo $row43["name"]; ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label class="control-label col-sm-4 col-md-4" for="email">PP No</label>
					<div class="col-sm-6 col-md-6">
						<input type="text" class="form-control" id="pp" list="cuspp" placeholder="Enter PP No" name="cus_pp"  onChange="showUser2(this.value)"  autocomplete="off" required>
					</div>
				</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Customer Address</label>
				<div class="col-sm-6 col-md-6">
					<textarea class="form-control" rows="2" id="cus_addr"placeholder="Enter Customer Address" name="cus_addr" required></textarea>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Average  Ex.Rate</label>
				<div class="col-sm-6 col-md-6">
					<input type="text" id="avg_ex"  class="form-control" readonly />
				</div>
			</div>
		</div>
	</div>

<!-- dfsdfsd-->
<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4" for="email">Foreign currency</label>
			<div class="col-sm-3 col-md-3">
				<select class="form-control" id="from_c" name="from_c" onChange="calc_rate(this.value,bh_c.value)">
					<option value="">--select--</option>
				<?php
					while($row=mysqli_fetch_array($rs4))
					{
						$fc=$row["cy_code"];
						if($fc != '2')
						{
						?>
						<option value="<?php echo $fc; ?>"><?php  echo $row["cy_name"]; ?></option>
						<?php
						}
		 			} ?>
				</select>
			</div>
			<div class="col-sm-1">
				<input type="text" class="input-sm" id="stk_v" size="12" readonly />
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Commission</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" step="any" class="form-control" id="cmsn" placeholdder="Enter Commission" name="cmsn" onChange="cmsn_fun()" value="0.000" required>
			</div>
		</div>
</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Enter Amount</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" step="any" class="form-control" id="from_amt" placeholder="Enter Amount" name="frm_amt"  onChange="calc_rate_change()" required>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Equivalent Amount</label>
			<div class="col-sm-6 col-md-6">
				<input type="text" class="form-control" id="to_amt" placeholder="" name="to_amt" step="any" onchange="rev_cal()" required>
			</div>
		</div>
</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Exchange Rate</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" class="form-control" id="rate" onChange="calc_ex_rate_change(from_c.value)" placeholder="" name="rate" step="any" required>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Total Amount</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" step="any" class="form-control" id="tot"  placeholder="" name="tot" step="any" onchange="tot_fun()" required>
			</div>
		</div>
	</div>

</div>

<div class="row">
		<div class="col-lg-6 col-md-6">

			<div class="col-sm-1 col-md-1">
				<input type="hidden" name="cus_t" value="" id="cus_t">
			</div>
			<div class="col-sm-1 col-md-1">
				<input type="hidden" name="tr_rate_sr_no" value="" id="tr_rate_sr_no">
			</div>
			<div class="col-sm-1 col-md-1">
				<input type="hidden" name="bh_c" value="<?php echo $bh_id; ?>" id="bh_c">
			</div>
		</div>

	<div class="col-lg-6 col-md-6">
		<div class="form-group">

			<div class="col-sm-2 col-md-2">
				<button type="reset" class="btn btn-primary btn-block" onclick="myFunction()">Reset</button>
			</div>
			<div class="col-sm-3 col-md-3">
				<button type="submit" id="sub" name="sub" class="btn btn-primary btn-block">Save & Print</button>
			</div>
			<div class="col-sm-2 col-md-2">
				<font style="font-size:10px">Rounding: <input type="text" name="r" id="r" readonly></font>
		</div>
	</div>
</div>


</div>

				<fieldset id='to-clone'>

					<datalist id='cuspp'>
						<?php
							$getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemscode=mysqli_fetch_array($getitem2))
							{
						?>
								<option value='<?php echo $itemscode['cus_pp'] ?>'>
						<?php
							}
						?>
					</datalist>

					<datalist id='phlist'>
						<?php
							$getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemscode=mysqli_fetch_array($getitem2))
							{
						?>
								<option value='<?php echo $itemscode['cus_tel'] ?>'>
						<?php
							}
						?>
					</datalist>

					<datalist id='cuscivil'>
						<?php
							$getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemscode=mysqli_fetch_array($getitem2))
							{
						?>
								<option value='<?php echo $itemscode['cus_civil'] ?>'>
						<?php
							}
						?>
					</datalist>

				</fieldset>
			</form>
			<!--</div> container-->
		</div>
	</div>
</div>
<?php include'footer.php'; ?>



<?php
					//create customer
					if(isset($_POST['sub']))
					{
						//Customer
						$transaction_id= mysqli_real_escape_string($mysqli,$_POST['trans_id']); //transaction id
						$customer_code= mysqli_real_escape_string($mysqli,$_POST['cus_code']); //customer code
						$customer_name= mysqli_real_escape_string($mysqli,$_POST['cus_name']); //customer name
						$customer_address= mysqli_real_escape_string($mysqli,$_POST['cus_addr']); //customer address
						$customer_telephone= mysqli_real_escape_string($mysqli,$_POST['cus_tel']); //customer telephone
						$customer_pp= mysqli_real_escape_string($mysqli,$_POST['cus_pp']); //customer id/pp number
						$customer_civil= mysqli_real_escape_string($mysqli,$_POST['cus_civil']); //customer id/pp number
						$customer_country= mysqli_real_escape_string($mysqli,$_POST['customer_country']);

						//Transaction
						$from_cy= mysqli_real_escape_string($mysqli,$_POST['from_c']); //from currency
						$frm_amt= mysqli_real_escape_string($mysqli,$_POST['frm_amt']); //from Amount
						$to_cy="2"; //to Currency
						$equavalent= mysqli_real_escape_string($mysqli,$_POST['to_amt']); //Equivalent
						$tr_ex_rate= mysqli_real_escape_string($mysqli,$_POST['rate']); //Exchange Rate
						$sale_pur= mysqli_real_escape_string($mysqli,$_POST['sale_pur']); //Purchase / Sales
						$source= mysqli_real_escape_string($mysqli,$_POST['source']); //Source
						$purpose= mysqli_real_escape_string($mysqli,$_POST['purpose']); //Purpose
						$cmsn= mysqli_real_escape_string($mysqli,$_POST['cmsn']); //Commission
						$to_amt= mysqli_real_escape_string($mysqli,$_POST['tot']); //To Amount
						$round= mysqli_real_escape_string($mysqli,$_POST['r']); //To Amount


						$query551 = mysqli_query($mysqli,"SELECT `tr_id` FROM transaction ORDER BY sr_no DESC");
						$row551 = mysqli_fetch_assoc($query551);
						$maxcode55= $row551['tr_id'];
						$newcode55 = $maxcode55+1;
						
						//----------------------------------------------------
						if (strpos($to_amt, ".") != false) {

							$tm = explode(".", $to_amt);
							$tm1= $tm[0]; // number
							$tm2= $tm[1]; // decimal
							$tmlen=strlen($tm2);
								if($tmlen < '3')
								{
									if($tmlen == '1')
									{
										$to_amt = $to_amt."00";
										
									}elseif ($tmlen == '2') {
										$to_amt=$to_amt."0";
									
									}
								}else {
									$subtm2=substr($tm2,0,3);
									$to_amt=$tm1.".".$subtm2;
									
								}
							}
							else{
										$to_amt=$to_amt.".000";
										
							}
						//----------------------------------------------------

						//$_SESSION['round']=$round;

						$tr_rate_sr_no= mysqli_real_escape_string($mysqli,$_POST['tr_rate_sr_no']); //Exchange rate original
						$tr_sale_rate="2";
						$tr_pur_rate="3";
						$query22 = "SELECT * FROM customer WHERE cus_pp='$customer_pp' ";
						$result22 = mysqli_query($mysqli,$query22)or die(mysqli_error());


						$num_row = mysqli_num_rows($result22);
						$row22=mysqli_fetch_array($result22);
						$date = date("Y-m-d");
						$time = date("h:i:a");
						if($to_amt == '0')
						{
								echo "<script>alert('invalid Data');</script>";
						}else {
						if( $num_row == '0' )
						{
							$query51 = mysqli_query($mysqli,"SELECT cus_code FROM customer ORDER BY sr_no DESC ");
							$row51 = mysqli_fetch_assoc($query51);
							$maxcod= $row51['cus_code'];
							$newcod = $maxcod+1;
							$sql = "INSERT INTO `customer` (`cus_code`, `cus_name`, `cus_addr`, `cus_tel`, `cus_pp`,`bh_id`,`cus_civil`,`nationality`) VALUES ('$newcod', '$customer_name', '$customer_address', '$customer_telephone', '$customer_pp','$bh_id','$customer_civil','$customer_country');";
							mysqli_query($mysqli, $sql);

							$sql2 = "INSERT INTO `transaction` (`tr_id`,`cus_id`,`from_cy`, `to_cy`,`frm_amt`,`equvallent`,`to_amt`,`tr_ex_rate`,`tr_rate_sr_no`,`cmsn`,`sale_pur`,`source`,`purpose`,`bh_code`,`trans_date`,`trans_time`,`us_code`,`round`) VALUES ('$newcode55','$newcod','$from_cy','$to_cy','$frm_amt','$equavalent','$to_amt','$tr_ex_rate','$tr_rate_sr_no','$cmsn','$sale_pur','$source','$purpose','$bh_id','$date','$time','$user_code','$round');";
							if (mysqli_query($mysqli, $sql2)) {
								if($sale_pur == '1')
								{
										echo "<script>window.location='purchase.php';window.open('treport2.php?tr_id_n=$newcode55','_blank');</script>";
								}else {
										echo "<script>window.location='purchase.php';window.open('treport.php?tr_id_n=$newcode55','_blank');</script>";
								}

							} else {
								echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
							}
						}else
							if($num_row == '1'){
								$date = date("Y-m-d");
								$time = date("h:i:a");
								$sql2 = "INSERT INTO `transaction` (`tr_id`,`cus_id`,`from_cy`, `to_cy`,`frm_amt`,`equvallent`,`to_amt`,`tr_ex_rate`,`tr_rate_sr_no`,`cmsn`,`sale_pur`,`source`,`purpose`,`bh_code`,`trans_date`,`trans_time`,`us_code`,`round`) VALUES ('$newcode55','$customer_code','$from_cy','$to_cy','$frm_amt','$equavalent','$to_amt','$tr_ex_rate','$tr_rate_sr_no','$cmsn','$sale_pur','$source','$purpose','$bh_id','$date','$time','$user_code','$round');";
								if (mysqli_query($mysqli, $sql2)) {
									if($sale_pur == '1')
									{
											echo "<script>window.location='purchase.php';window.open('treport2.php?tr_id_n=$newcode55','_blank');</script>";
									}else {
											echo "<script>window.location='purchase.php';window.open('treport.php?tr_id_n=$newcode55','_blank');</script>";
									}
								} else {
									echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
								}
						}


					}

					}
 ?>
	<script>

	function myFunction()
	{
		document.getElementById("customer_country").disabled = false;
	}

	$(function(){
	$("#from_amt").keypress(function (e) {
		if (e.keyCode == 13) {
			document.getElementById("rate").focus();
				return false;
			}
		});
	});
	$(function(){
	$("#rate").keypress(function (e) {
		if (e.keyCode == 13) {
			document.getElementById("cmsn").focus();
				return false;
			}
		});
	});
	$(function(){
	$("#tel").keypress(function (e) {
		if (e.keyCode == 13) {
			document.getElementById("from_c").focus();
			}
		});
	});
	$(function(){
	$("#cmsn").keypress(function (e) {
		if (e.keyCode == 13) {
			document.getElementById("to_amt").focus();
				return false;
			}
		});
	});
	$(function(){
	$("#to_amt").keypress(function (e) {
		if (e.keyCode == 13) {
			document.getElementById("tot").focus();
				return false;
			}
		});
	});

function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	}
	return true;
}

</script>


<script>
//Telephone
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


				var a= JSON.parse(xmlhttp.responseText);
				var cus_id = a['cus_code'];
				var cus_name = a['cus_name'];
				var cus_addr = a['cus_addr'];
				var cus_pp = a['cus_pp'];
				var cus_nationality = a['nationality'];
				var cus_civil = a['cus_civil'];
				var cus_bank = a['bank'];


				document.getElementById("cus_id").value=cus_id;
				document.getElementById("cus_name").value=cus_name;
				document.getElementById("civil").value=cus_civil;
				
				document.getElementById("pp").value=cus_pp;
				document.getElementById("cus_addr").value=cus_addr;

				document.getElementById("customer_country").value = cus_nationality;
				document.getElementById("customer_country").disabled = true;
				if(cus_bank == '1')
				{
					document.getElementById("bk").innerHTML = "Bank Customer";
					document.getElementById("bk").style.color = "#ff0000";
				}else
				{
					document.getElementById("bk").innerHTML = "Normal Customer";
					document.getElementById("bk").style.color = "#008000";
				}
				

				

				
            }
        };
        xmlhttp.open("GET","getcustomer.php?q="+str,true);
        xmlhttp.send();
    }
}

//PP NO
function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


				var a= JSON.parse(xmlhttp.responseText);
				var cus_id = a['cus_code'];
				var cus_name = a['cus_name'];
				var cus_addr = a['cus_addr'];
				var cus_civil = a['cus_civil'];
				var cus_tel = a['cus_tel'];
				var cus_nationality = a['nationality'];
				var cus_bank = a['bank'];


				document.getElementById("cus_id").value=cus_id;
				document.getElementById("cus_name").value=cus_name;
				document.getElementById("civil").value=cus_civil;
				document.getElementById("tel").value=cus_tel;
				document.getElementById("cus_addr").value=cus_addr;
				
				document.getElementById("customer_country").value = cus_nationality;
				document.getElementById("customer_country").disabled = true;
				if(cus_bank == '1')
				{
					document.getElementById("bk").innerHTML = "Bank Customer";
					document.getElementById("bk").style.color = "#ff0000";
				}else
				{
					document.getElementById("bk").innerHTML = "Normal Customer";
					document.getElementById("bk").style.color = "#008000";
				}
						
				
            }
        };
        xmlhttp.open("GET","getcustomer2.php?q="+str,true);
        xmlhttp.send();
    }
}


//PP NO
function showUser3(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


				var a= JSON.parse(xmlhttp.responseText);
				var cus_id = a['cus_code'];
				var cus_name = a['cus_name'];
				var cus_addr = a['cus_addr'];
				var cus_civil = a['cus_civil'];
				var cus_tel = a['cus_tel'];
				var cus_pp = a['cus_pp'];
				var cus_nationality = a['nationality'];
				var cus_bank = a['bank'];


				document.getElementById("cus_id").value=cus_id;
				document.getElementById("cus_name").value=cus_name;
				document.getElementById("civil").value=cus_civil;
				document.getElementById("tel").value=cus_tel;
				document.getElementById("cus_addr").value=cus_addr;
				document.getElementById("pp").value=cus_pp;
				
				document.getElementById("customer_country").value = cus_nationality;
				document.getElementById("customer_country").disabled = true;
				if(cus_bank == '1')
				{
					document.getElementById("bk").style.color = "#ff0000";
					document.getElementById("bk").innerHTML = "Bank Customer";
				}else
				{
					document.getElementById("bk").style.color = "#ff00ff";
					document.getElementById("bk").innerHTML = "Normal Customer";
				}
				document.getElementById("bk").style.color = "#008000";
				

				
            }
        };
        xmlhttp.open("GET","getcustomer3.php?q="+str,true);
        xmlhttp.send();
    }
}

//calculate rate
function calc_rate(str,strr) {
	//var b=document.getElementById("bh_c").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

				//return json array
				var a= JSON.parse(xmlhttp.responseText);
				var len= a.length;

				//getting input values for rate
				var cmsn=document.getElementById('cmsn').value;
				var fromc=document.getElementById('from_c').value;
				var from_amt=document.getElementById('from_amt').value;
				var t_amt=document.getElementById('tot').value;

				/*checker*/
				console.log(a);

				//array values into variable(stock details)
				var fcamt= a['fcamt'];
				
				//array values into variable(rate details)
				var tr_rate_sr_no = a['sr_no'];
				var frm_cy = a['to_cy'];
				var cy_ex_rate = a['cy_ex_rate'];
				var cy_pur_rate = a['cy_pur_rate'];
				var cy_sale_rate = a['cy_sale_rate'];

				//array values into variable(rate details)
				var avg_x = a['avg_x'];


				//rate update


					document.getElementById("rate").value=cy_pur_rate;
					var eq_amt = from_amt*cy_pur_rate;
					document.getElementById("tr_rate_sr_no").value=tr_rate_sr_no;
					var eq=document.getElementById("to_amt").value=Math.round((eq_amt)*1000)/1000;
					var to_amt = eq-cmsn;
					document.getElementById("tot").value=Math.round((to_amt)*1000)/1000;
					document.getElementById("rate").value=cy_ex_rate;
					document.getElementById("r").value="0";
					
					




				//stock update
				document.getElementById("stk_v").value=Math.round((fcamt)*10000)/10000;

				//avg exchange rate
				document.getElementById("avg_ex").value=Math.round((avg_x)*10000)/10000;

				if(a['error1'] == 1)
				{
				
				//stock update
				document.getElementById("stk_v").value="0.000";

				//avg exchange rate
				document.getElementById("avg_ex").value="0.000";

				//Eq amount
				document.getElementById("to_amt").value="0.000";

				}
				

				
				
				
            }
        };
		//var b=document.getElementById("bh_c").value;
        xmlhttp.open("GET","stockdetail.php?q="+str+ "&b=" +strr,true);
        xmlhttp.send();
    }
}




//calculate rate change [enter amount]
function calc_rate_change() {
	//var b=document.getElementById("bh_c").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {



				var from_amt=document.getElementById('from_amt').value;
				var cy_rate=document.getElementById('rate').value;
				var cmsn=document.getElementById('cmsn').value;
				
					if(cy_rate != '0')
					{
						var eq_amt = from_amt * cy_rate;
						var to_amt =eq_amt-cmsn;
						document.getElementById("tot").value=Math.round((to_amt)*1000)/1000;
						document.getElementById("to_amt").value=Math.round((eq_amt)*1000)/1000;
						document.getElementById("r").value="0";

					}else {
						document.getElementById("to_amt").value=0;
						document.getElementById("r").value="0";
					}


				
				
            }
        };
		var str=document.getElementById("bh_c").value;
        xmlhttp.open("GET","ratedetail.php?q="+str,true);
        xmlhttp.send();
    }
}


//onchange exchange rate

function calc_ex_rate_change(str) {
	//var b=document.getElementById("bh_c").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

				//getting element ids
				var fromc=document.getElementById('from_c').value;
				var from_amt=document.getElementById('from_amt').value;
				var cy_rate=document.getElementById('rate').value;
				var cmsn=document.getElementById('cmsn').value;
				var cus_id=document.getElementById('cus_id').value;
				var cus_type=document.getElementById('cus_t').value;
				var cmsn=document.getElementById('cmsn').value;

				//return json array
				var a= JSON.parse(xmlhttp.responseText);

				/*checker*/
				console.log(a);

				//array to variable
				var cy_ex_rate = a['cy_ex_rate'];
				var cy_pur_rate = a['cy_pur_rate'];
				var cy_sale_rate = a['cy_sale_rate'];

						if(cy_rate > cy_ex_rate)
                        {
                                alert("Purchase Rate greater than exchange rate");
                                document.getElementById("rate").value=cy_rate;
                                var eq_amt2=from_amt*cy_rate;
                                var to_amt2 = eq_amt2-cmsn;
                                document.getElementById("to_amt").value=Math.round((eq_amt2)*1000)/1000;
                                document.getElementById("tot").value=Math.round((to_amt2)*1000)/1000;
                                document.getElementById("r").value="0";
                        }
                        else
                        {
                                document.getElementById("rate").value=cy_rate;
                                var eq_amt2=from_amt*cy_rate;
                                var to_amt2 = eq_amt2-cmsn;
                                document.getElementById("to_amt").value=Math.round((eq_amt2)*1000)/1000;
                                document.getElementById("tot").value=Math.round((to_amt2)*1000)/1000;
                                document.getElementById("r").value="0";
                        }





				
				
            }
        };
        xmlhttp.open("GET","ratedetail.php?q="+str,true);
        xmlhttp.send();
    }
}


//cmsn_fun()
function cmsn_fun() {
	//var b=document.getElementById("bh_c").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


				var to_amt=document.getElementById('to_amt').value;
				var cmsn=document.getElementById('cmsn').value;


				var total = to_amt-cmsn;
				document.getElementById("tot").value=Math.round((total)*1000)/1000;
				document.getElementById("r").value="0";
				
				
				
            }
        };
		var str=document.getElementById("bh_c").value;
        xmlhttp.open("GET","ratedetail.php?q="+str,true);
        xmlhttp.send();
    }
}

//rev_cal()
function rev_cal() {
	//var b=document.getElementById("bh_c").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


				var from_amt=document.getElementById('from_amt').value;
				var cy_rate=document.getElementById('rate').value;
				var to_amt=document.getElementById('to_amt').value;
				var cmsn=document.getElementById('cmsn').value;


				var frm_amt2 = to_amt/cy_rate;
				document.getElementById("from_amt").value=Math.round((frm_amt2)*1000)/1000;
				var total_v= to_amt-cmsn;
				document.getElementById("tot").value=Math.round((total_v)*1000)/1000;
				document.getElementById("r").value="0";
				
				
				
            }
        };
		var str=document.getElementById("bh_c").value;
        xmlhttp.open("GET","ratedetail.php?q="+str,true);
        xmlhttp.send();
    }
}

//tot_fun()

function tot_fun() {
	//var b=document.getElementById("bh_c").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


				var to_amt=document.getElementById('to_amt').value;
				var cmsn=document.getElementById('cmsn').value;
				var total=document.getElementById('tot').value;
				var round1=to_amt-cmsn;
				var round = total-round1;
				document.getElementById("r").value=Math.round((round)*1000)/1000;
				
				
				
            }
        };
		var str=document.getElementById("bh_c").value;
        xmlhttp.open("GET","ratedetail.php?q="+str,true);
        xmlhttp.send();
    }
}




</script>

