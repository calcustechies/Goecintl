<?php
	include'config.php';
	include'head.php';

	updateXML();
?>


<div id="wrapper">
<?php
	include'side_bar.php';
	$query6="SELECT * FROM users";
	$rs4=mysqli_query($mysqli,$query6);
?>
<script>
function autofill(){

	var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	function reportStatus() {

		if (oXHR.readyState == 4)               // REQUEST COMPLETED.
			getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
	}
	oXHR.onreadystatechange = reportStatus;
	// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
	oXHR.open("GET", "userrights.xml", true);
	oXHR.send();
			function getXmlData(xml) {        // THE PARENT DIV.

				var right = xml.getElementsByTagName('right');
				var getitemcode=document.getElementById('user_r_code').value;

				for (var i = 0; i < right.length; i++) {


					// CREATE CHILD DIVS INSIDE THE PARENT DIV.
					var user_r_code1 = right[i].getElementsByTagName("user_rts_code")[0].childNodes[0].nodeValue;
					var b_m_create1=right[i].getElementsByTagName("b_m_create")[0].childNodes[0].nodeValue;
					var b_m_edit1=right[i].getElementsByTagName("b_m_edit")[0].childNodes[0].nodeValue;
					var purchase1=right[i].getElementsByTagName("purchase")[0].childNodes[0].nodeValue;
					var sales1=right[i].getElementsByTagName("sales")[0].childNodes[0].nodeValue;
					var c_m_create1=right[i].getElementsByTagName("c_m_create")[0].childNodes[0].nodeValue;
					var c_m_edit1=right[i].getElementsByTagName("c_m_edit")[0].childNodes[0].nodeValue;
					var c_m_rates1=right[i].getElementsByTagName("c_m_rates")[0].childNodes[0].nodeValue;
					var cus_m_create1=right[i].getElementsByTagName("cus_m_create")[0].childNodes[0].nodeValue;
					var cus_m_edit1=right[i].getElementsByTagName("cus_m_edit")[0].childNodes[0].nodeValue;
					var cus_m_black1=right[i].getElementsByTagName("cus_m_black")[0].childNodes[0].nodeValue;
					var u_m_create1=right[i].getElementsByTagName("u_m_create")[0].childNodes[0].nodeValue;
					var u_m_edit1=right[i].getElementsByTagName("u_m_edit")[0].childNodes[0].nodeValue;
					var u_m_des1=right[i].getElementsByTagName("u_m_des")[0].childNodes[0].nodeValue;
					var tr_h1=right[i].getElementsByTagName("tr_h")[0].childNodes[0].nodeValue;
					var re_b1=right[i].getElementsByTagName("re_b")[0].childNodes[0].nodeValue;
					var ledger1=right[i].getElementsByTagName("ledger")[0].childNodes[0].nodeValue;
					var topsheet1=right[i].getElementsByTagName("topsheet")[0].childNodes[0].nodeValue;
					var utili_calc1=right[i].getElementsByTagName("utili_calc")[0].childNodes[0].nodeValue;
					var utili_backup1=right[i].getElementsByTagName("utili_backup")[0].childNodes[0].nodeValue;
					var voucher1=right[i].getElementsByTagName("voucher")[0].childNodes[0].nodeValue;
					var transaction1=right[i].getElementsByTagName("transaction")[0].childNodes[0].nodeValue;
					var set_ch_pass1=right[i].getElementsByTagName("set_ch_pass")[0].childNodes[0].nodeValue;

					if(user_r_code1==getitemcode){
						// ADD THE CHILD TO THE PARENT DIV.
						//alert("hello");

						if(b_m_create1 == '1')
						{
							document.getElementById("b_m_create").checked=true;
						}else
						{
							document.getElementById("b_m_create").checked=false;
						}

						if(b_m_edit1 == '1')
						{
							document.getElementById("b_m_edit").checked=true;
						}else
						{
							document.getElementById("b_m_edit").checked=false;
						}

						if(purchase1 == '1')
						{
							document.getElementById("purchase").checked=true;
						}else
						{
							document.getElementById("purchase").checked=false;
						}

						if(sales1 == '1')
						{
							document.getElementById("sales").checked=true;
						}else
						{
							document.getElementById("sales").checked=false;
						}

						if(c_m_create1 == '1')
						{
							document.getElementById("c_m_create").checked=true;
						}else
						{
							document.getElementById("c_m_create").checked=false;
						}

						if(c_m_edit1 == '1')
						{
							document.getElementById("c_m_edit").checked=true;
						}else
						{
							document.getElementById("c_m_edit").checked=false;
						}

						if(c_m_rates1 == '1')
						{
							document.getElementById("c_m_rates").checked=true;
						}else
						{
							document.getElementById("c_m_rates").checked=false;
						}

						if(cus_m_create1 == '1')
						{
							document.getElementById("cus_m_create").checked=true;
						}else
						{
							document.getElementById("cus_m_create").checked=false;
						}

						if(cus_m_edit1 == '1')
						{
							document.getElementById("cus_m_edit").checked=true;
						}else
						{
							document.getElementById("cus_m_edit").checked=false;
						}

						if(cus_m_black1 == '1')
						{
							document.getElementById("cus_m_black").checked=true;
						}else
						{
							document.getElementById("cus_m_black").checked=false;
						}

						if(u_m_create1 == '1')
						{
							document.getElementById("u_m_create").checked=true;
						}else
						{
							document.getElementById("u_m_create").checked=false;
						}

						if(u_m_edit1 == '1')
						{
							document.getElementById("u_m_edit").checked=true;
						}else
						{
							document.getElementById("u_m_edit").checked=false;
						}

						if(u_m_des1 == '1')
						{
							document.getElementById("u_m_des").checked=true;
						}else
						{
							document.getElementById("u_m_des").checked=false;
						}

						if(tr_h1 == '1')
						{
							document.getElementById("tr_h").checked=true;
						}else
						{
							document.getElementById("tr_h").checked=false;
						}

						if(re_b1 == '1')
						{
							document.getElementById("re_b").checked=true;
						}else
						{
							document.getElementById("re_b").checked=false;
						}

						if(ledger1 == '1')
						{
							document.getElementById("ledger").checked=true;
						}else
						{
							document.getElementById("ledger").checked=false;
						}

						if(topsheet1 == '1')
						{
							document.getElementById("topsheet").checked=true;
						}else
						{
							document.getElementById("topsheet").checked=false;
						}
						
						if(transaction1 == '1')
						{
							document.getElementById("transaction").checked=true;
						}else
						{
							document.getElementById("transaction").checked=false;
						}

						if(utili_calc1 == '1')
						{
							document.getElementById("utili_calc").checked=true;
						}else
						{
							document.getElementById("utili_calc").checked=false;
						}

						if(utili_backup1 == '1')
						{
							document.getElementById("utili_backup").checked=true;
						}else
						{
							document.getElementById("utili_backup").checked=false;
						}
						
						if(voucher1 == '1')
						{
							document.getElementById("voucher").checked=true;
						}else
						{
							document.getElementById("voucher").checked=false;
						}

						if(set_ch_pass1 == '1')
						{
							document.getElementById("set_ch_pass").checked=true;
						}else
						{
							document.getElementById("set_ch_pass").checked=false;
						}

					}

				}
			}
		}
</script>
	<div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="content-main">
			<!--banner-->
		 	<div class="banner">
		  	<h2>
						<a href="index.php">Home</a>
						<i class="fa fa-angle-right"></i>
						<span>User Rights</span>
				</h2>
			</div>
			<!--//banner-->
	 	 	<div class="container">
			<br/>
				<form class="form-horizontal" action="" method="POST">
				<div class="row">
						<div class="col-lg-3 col-md-3 text-center">
						</div>
						<div class="col-lg-4 col-md-4 text-center">
							<select class="form-control" id="user_r_code" name="user_r_code" onChange="autofill()">
								<option value="">--select--</option>
							<?php
								while($row=mysqli_fetch_array($rs4))
								{
									$fc=$row["us_code"];
									if($fc != '5')
									{
									?>
									<option value="<?php echo $fc; ?>"><?php  echo $row["us_name"]; ?></option>
									<?php
									}
					 			} ?>
							</select>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Branch Master</div>
								<div class="panel-body">
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="b_m_create" id="b_m_create">Branch Create</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="b_m_edit" id="b_m_edit">Branch Edit</label>
										</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Purchase</div>
								<div class="panel-body">
									<div class="checkbox">
											<label><input type="checkbox" value="1" name="purchase" id="purchase">Purchase</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" value="1" name="sales" id="sales">Sales</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Currency Master</div>
								<div class="panel-body">
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="c_m_create" id="c_m_create">Currency Create</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="c_m_edit" id="c_m_edit">currency Edit</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="c_m_rates" id="c_m_rates">Rates & History</label>
										</div>
								</div>
							</div>
						</div>
				</div>

				<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Customer Master</div>
								<div class="panel-body">
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="cus_m_create" id="cus_m_create">Customer Create</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="cus_m_edit" id="cus_m_edit">Customer Edit</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="cus_m_black" id="cus_m_black">Customer Black List</label>
										</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">User Master</div>
								<div class="panel-body">
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="u_m_create" id="u_m_create">User Create</label>
											</div>
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="u_m_edit" id="u_m_edit">User Edit</label>
											</div>
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="u_m_des" id="u_m_des">User Designation</label>
											</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Reports</div>
								<div class="panel-body">
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="tr_h" id="tr_h">Transaction History</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="re_b" id="re_b">Reprint Bill</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="ledger" id="ledger">Ledger</label>
										</div>
										<div class="checkbox">
												<label><input type="checkbox" value="1" name="topsheet" id="topsheet">Top Sheet</label>
										</div>
								</div>
							</div>
						</div>
				</div>

				<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Utilities</div>
								<div class="panel-body">
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="utili_calc" id="utili_calc">Calculator</label>
											</div>
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="utili_backup" id=utili_backup>Backup</label>
											</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">Settings</div>
								<div class="panel-body">
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="set_ch_pass" id="set_ch_pass">Change Password</label>
											</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel panel-primary" style="min-height:165px">
								<div class="panel-heading">More</div>
								<div class="panel-body">
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="voucher" id="voucher">Voucher</label>
											</div>
											<div class="checkbox">
													<label><input type="checkbox" value="1" name="transaction" id="transaction">Transaction</label>
											</div>
								</div>
							</div>
						</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3">
							
											<button type="submit" class="btn btn-danger btn-block" name="apply" id="apply">Apply</button>

						</div>
				</div>

			</form>
		 	</div>
		</div>
	</div>
</div>
<?php include'footer.php'; ?>
<?php

		//Updates User Rights
		if(isset($_POST['apply']))
		{
			$user_r_code= mysqli_real_escape_string($mysqli,$_POST['user_r_code']); //user Code

			$b_m_create= mysqli_real_escape_string($mysqli,$_POST['b_m_create']); //branch create
			if($b_m_create == NULL)
			{
				$b_m_create = '0';
			}

			$b_m_edit= mysqli_real_escape_string($mysqli,$_POST['b_m_edit']); //branch edit
			if($b_m_edit == NULL)
			{
				$b_m_edit = '0';
			}

			$c_m_create= mysqli_real_escape_string($mysqli,$_POST['c_m_create']); //currency create
			if($c_m_create == NULL)
			{
				$c_m_create = '0';
			}

			$c_m_edit= mysqli_real_escape_string($mysqli,$_POST['c_m_edit']); //currency edit
			if($c_m_edit == NULL)
			{
				$c_m_edit = '0';
			}

			$c_m_rates= mysqli_real_escape_string($mysqli,$_POST['c_m_rates']); //currency rates
			if($c_m_rates == NULL)
			{
				$c_m_rates = '0';
			}

			$purchase= mysqli_real_escape_string($mysqli,$_POST['purchase']); //purchase
			if($purchase == NULL)
			{
				$purchase = '0';
			}

			$sales= mysqli_real_escape_string($mysqli,$_POST['sales']); //Sales
			if($sales == NULL)
			{
				$sales = '0';
			}

			$cus_m_create= mysqli_real_escape_string($mysqli,$_POST['cus_m_create']); //customer create
			if($cus_m_create == NULL)
			{
				$cus_m_create = '0';
			}

			$cus_m_edit= mysqli_real_escape_string($mysqli,$_POST['cus_m_edit']); //customer edit
			if($cus_m_edit == NULL)
			{
				$cus_m_edit = '0';
			}

			$cus_m_black= mysqli_real_escape_string($mysqli,$_POST['cus_m_black']); //customer black list
			if($cus_m_black == NULL)
			{
				$cus_m_black = '0';
			}

			$tr_h= mysqli_real_escape_string($mysqli,$_POST['tr_h']); //transaction History
			if($tr_h == NULL)
			{
				$tr_h = '0';
			}

			$re_b= mysqli_real_escape_string($mysqli,$_POST['re_b']); //reprint Bill
			if($re_b == NULL)
			{
				$re_b = '0';
			}

			$ledger= mysqli_real_escape_string($mysqli,$_POST['ledger']); //Ledger
			if($ledger == NULL)
			{
				$ledger = '0';
			}

			$topsheet= mysqli_real_escape_string($mysqli,$_POST['topsheet']); //Top Sheet
			if($topsheet == NULL)
			{
				$topsheet = '0';
			}

			$transaction= mysqli_real_escape_string($mysqli,$_POST['transaction']); //Transaction
			if($transaction == NULL)
			{
				$transaction = '0';
			}
			
			$u_m_create= mysqli_real_escape_string($mysqli,$_POST['u_m_create']); //user create
			if($u_m_create == NULL)
			{
				$u_m_create = '0';
			}

			$u_m_edit= mysqli_real_escape_string($mysqli,$_POST['u_m_edit']); //user edit
			if($u_m_edit == NULL)
			{
				$u_m_edit = '0';
			}

			$u_m_des= mysqli_real_escape_string($mysqli,$_POST['u_m_des']); //user Designation
			if($u_m_des == NULL)
			{
				$u_m_des = '0';
			}

			$utili_calc= mysqli_real_escape_string($mysqli,$_POST['utili_calc']); //Calculator
			if($utili_calc == NULL)
			{
				$utili_calc = '0';
			}

			$utili_backup= mysqli_real_escape_string($mysqli,$_POST['utili_backup']); //Backup
			if($utili_backup == NULL)
			{
				$utili_backup = '0';
			}
			
			$voucher= mysqli_real_escape_string($mysqli,$_POST['voucher']); //voucher
			if($voucher == NULL)
			{
				$voucher = '0';
			}

			$set_ch_pass= mysqli_real_escape_string($mysqli,$_POST['set_ch_pass']); //Change Password
			if($set_ch_pass == NULL)
			{
				$set_ch_pass = '0';
			}

			//Branch Master
			if($b_m_create == '1' || $b_m_edit == '1')
			{
				$b_m = '1';
			}else {
				$b_m = '0';
			}

			//Currency Master
			if($c_m_create == '1' || $c_m_edit == '1' || $c_m_rates)
			{
				$c_m = '1';
			}else {
				$c_m = '0';
			}

			//Customer Master
			if($cus_m_create == '1' || $cus_m_edit == '1' || $cus_m_black == '1')
			{
				$cus_m = '1';
			}else {
				$cus_m = '0';
			}

			//User Master
			if($u_m_create == '1' || $u_m_edit == '1' || $u_m_des == '1')
			{
				$u_m = '1';
			}else {
				$u_m = '0';
			}

			//Utilities
			if($utili_calc == '1' || $utili_backup == '1')
			{
				$utili = '1';
			}else {
				$utili = '0';
			}

			
			//Settings
			if($set_ch_pass == '1')
			{
				$settings = '1';
			}else {
				$settings = '0';
			}

			//report
			if($tr_h == '1' || $re_b == '1' || $ledger == '1')
			{
				$reports = '1';
			}else {
				$reports = '0';
			}
			
			

			$query2 = mysqli_query($mysqli,"UPDATE `rights` SET
				`b_m`='$b_m',
				`b_m_create`='$b_m_create',
				`b_m_edit`='$b_m_edit',
				`purchase`='$purchase',
				`sales`='$sales',
				`c_m`='$c_m',
				`c_m_create`='$c_m_create',
				`c_m_edit`='$c_m_edit',
				`c_m_rates`='$c_m_rates',
				`cus_m`='$cus_m',
				`cus_m_create`='$cus_m_create',
				`cus_m_edit`='$cus_m_edit',
				`cus_m_black`='$cus_m_black',
				`u_m`='$u_m',
				`u_m_create`='$u_m_create',
				`u_m_edit`='$u_m_edit',
				`u_m_des`='$u_m_edit',
				`reports`='$reports',
				`tr_h`='$tr_h',
				`re_b`='$re_b',
				`ledger`='$ledger',
				`topsheet`='$topsheet',
				`utili`='$utili',
				`utili_calc`='$utili_calc',
				`utili_backup`='$utili_backup',
				`voucher`='$voucher',
				`transaction`='$transaction',
				`settings`='$settings',
				`set_ch_pass`='$set_ch_pass'
				 WHERE user_rts_code='$user_r_code'");

				 if($query2){

	 				echo "<script>alert('Success');window.location='rights.php';</script>";

	 				}
		}

 ?>
 <?php
		 function updateXML()
			{
				include'config.php';

				// create a dom document with encoding utf8
				$createxml = new DOMDocument('1.0', 'UTF-8');

				// create the root element of the xml tree
				$xmlRoot = $createxml->createElement('xml');

				//append it to the document created
				$xmlRoot = $createxml->appendChild($xmlRoot);

				$get=mysqli_query($mysqli,"SELECT * FROM rights ORDER BY user_rts_id ASC;");
				while($getitem=mysqli_fetch_array($get))
				{
					$currentTrack = $createxml->createElement("right");
					$currentTrack = $xmlRoot->appendChild($currentTrack);
					$currentTrack->appendChild($createxml->createElement('user_rts_code',$getitem['user_rts_code']));
					$currentTrack->appendChild($createxml->createElement('b_m_create',$getitem['b_m_create']));
					$currentTrack->appendChild($createxml->createElement('b_m_edit',$getitem['b_m_edit']));
					$currentTrack->appendChild($createxml->createElement('purchase',$getitem['purchase']));
					$currentTrack->appendChild($createxml->createElement('sales',$getitem['sales']));
					$currentTrack->appendChild($createxml->createElement('c_m_create',$getitem['c_m_create']));
					$currentTrack->appendChild($createxml->createElement('c_m_edit',$getitem['c_m_edit']));
					$currentTrack->appendChild($createxml->createElement('c_m_rates',$getitem['c_m_rates']));
					$currentTrack->appendChild($createxml->createElement('cus_m_create',$getitem['cus_m_create']));
					$currentTrack->appendChild($createxml->createElement('cus_m_edit',$getitem['cus_m_edit']));
					$currentTrack->appendChild($createxml->createElement('cus_m_black',$getitem['cus_m_black']));
					$currentTrack->appendChild($createxml->createElement('u_m_create',$getitem['u_m_create']));
					$currentTrack->appendChild($createxml->createElement('u_m_edit',$getitem['u_m_edit']));
					$currentTrack->appendChild($createxml->createElement('u_m_des',$getitem['u_m_des']));
					$currentTrack->appendChild($createxml->createElement('tr_h',$getitem['tr_h']));
					$currentTrack->appendChild($createxml->createElement('re_b',$getitem['re_b']));
					$currentTrack->appendChild($createxml->createElement('ledger',$getitem['ledger']));
					$currentTrack->appendChild($createxml->createElement('topsheet',$getitem['topsheet']));
					$currentTrack->appendChild($createxml->createElement('utili_calc',$getitem['utili_calc']));
					$currentTrack->appendChild($createxml->createElement('utili_backup',$getitem['utili_backup']));
					$currentTrack->appendChild($createxml->createElement('voucher',$getitem['voucher']));
					$currentTrack->appendChild($createxml->createElement('transaction',$getitem['transaction']));
					$currentTrack->appendChild($createxml->createElement('set_ch_pass',$getitem['set_ch_pass']));
				}
				$createxml->save('userrights.xml');
			}

  ?>
