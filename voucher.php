<?php
include'config.php';
include'head.php';
?>
<div id="wrapper">
<?php
    include'side_bar.php';
    $query6="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' AND cy_frz='0'";
  	$rs4=mysqli_query($mysqli,$query6);
	
	
	//BRANCH NAME
	$query66="SELECT bh_name FROM branch WHERE bh_code='$bh_id'";
  	$rs66=mysqli_query($mysqli,$query66);
	$row66=mysqli_fetch_array($rs66);


    //Selecting avaliable currencies
    $query2="SELECT * FROM currency";
	$rs2=mysqli_query($mysqli,$query2);

    

?>


<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Voucher</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
    <div class="row">
      <div class="col-lg-12 text-center">
          <h1>Voucher</h1>
      </div>
    </div>
    <br/> <br/>
	<form action="" method="POST" class="form-inline">
      <div class="row">
          <div class="col-lg-12 col-md-12">
            <label class="radio-inline"><input type="radio" value="2" name="trans_type" checked>TR TO INCOME A/c (Gain)</label>
            <label class="radio-inline"><input type="radio" value="3" name="trans_type">TR FROM INCOME A/c (Loss)</label>
          </div>
      </div>
      <br/>
      <div class="row">
      <?php   $d=$date = date('Y-m-d'); ?>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="from_date">Branch</label>
              <input type="text" class="form-control" id="branch" name="branch" value="<?php echo $row66['bh_name']; ?>" size="25" readonly>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="to_date">Date</label>
              <input type="text" class="form-control" id="t_date" name="t_date" value="<?php echo date("Y/m/d"); ?>"  readonly>
            </div>
          </div>
      </div>
      <br/>
      <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="branch">Foreign Currency</label>
              <select class="form-control" id="fc" name="fc">
              	<option value="0" selected>--Currency--</option>
                <?php
        					while($row2=mysqli_fetch_array($rs2))
        					{
								if($row2['cy_code'] != '2')
								{
                  ?>
                  <option value="<?php echo $row2['cy_code']; ?>"><?php echo $row2['cy_name']; ?></option>
                  <?php
								}
      						}
      		 		     ?>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="to_date">RO Amount</label>
              <input type="text" class="form-control" id="ro_amt" name="ro_amt" value="" required>

            </div>
          </div>
      </div>
      <br/>
      <div class="row">

      </div>
      <br/>
      <div class="row">
          <div class="col-lg-2 col-md-2">
              <button type="submit" class="btn btn-primary" name="post_btn">POST</button>
          </div>
      </div>
	</form>
    <br/><br/><br/><br/>
	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

  <?php
 if(isset($_POST['post_btn']))
    {
		$trans_type = $_POST['trans_type'];
		$branch = $_POST['branch'];
		$t_date = $_POST['t_date'];
		$fc = $_POST['fc'];
		$ro_amt = $_POST['ro_amt'];

		//Checking currency value is null or not
		if ($fc == 0) {
			echo "<script>alert('Please Select a Valid Currency');window.location='voucher.php';</script>";
		}

     
	//Transaction Details
		$source = "others";
		$purpose = "others";
	//Customer Details
		//Selecting Customer
		$query3="SELECT * FROM customers WHERE cus_code='1'";
		$rs3=mysqli_query($mysqli,$query3);
		$row3=mysqli_fetch_array($rs3);
		
		//Customer Details
		$cus_code = $row3['cus_code'];
		$cus_name = $row3['cus_name'];
		$cus_addr = $row3['cus_addr'];
		$cus_tel = $row3['cus_tel'];
		$cus_pp = $row3['cus_pp'];
		$cus_civil = $row3['cus_civil'];
		$bh_c = $row3['bh_id'];
		
		//Amount Details
		$from_amt = "0";
		$exchnge = "0";
		$eq_amt = "0";
		$round = "0";
		$tot_amt = $ro_amt;
		$cmsn = "0";
		$tr_rate_sr_no= "0";
		
		//Transaction ID
		$query5 = mysqli_query($mysqli,"SELECT `tr_id` FROM transaction ORDER BY sr_no DESC");
		$row5 = mysqli_fetch_assoc($query5);
		$maxcode= $row5['tr_id'];
		$newcode = $maxcode+1;
		
		date_default_timezone_set("Asia/Muscat");
		$time = date("h:i:a");
		
		
		//Query
		$to_cy ="2";
		if($trans_type == "2")
		{
		$sql2 = "INSERT INTO `transaction` (`tr_id`,`cus_id`,`from_cy`, `to_cy`,`frm_amt`,`equvallent`,`to_amt`,`tr_ex_rate`,`tr_rate_sr_no`,`cmsn`,`sale_pur`,`source`,`purpose`,`bh_code`,`trans_date`,`trans_time`,`us_code`,`round`) VALUES ('$newcode','1','$fc','$to_cy','$from_amt','$eq_amt','$tot_amt','$exchnge','$tr_rate_sr_no','$cmsn','$trans_type','$source','$purpose','$bh_id','$t_date','$time','$user_code','$round');";
		}else
		{
		$sql2 = "INSERT INTO `transaction` (`tr_id`,`cus_id`,`from_cy`, `to_cy`,`frm_amt`,`equvallent`,`to_amt`,`tr_ex_rate`,`tr_rate_sr_no`,`cmsn`,`sale_pur`,`source`,`purpose`,`bh_code`,`trans_date`,`trans_time`,`us_code`,`round`) VALUES ('$newcode','1','$to_cy','$fc','$from_amt','$eq_amt','$tot_amt','$exchnge','$tr_rate_sr_no','$cmsn','$trans_type','$source','$purpose','$bh_id','$t_date','$time','$user_code','$round');";
		}
		
		
		if (mysqli_query($mysqli, $sql2)) {

				echo "<script>alert('Success..');window.location='voucher.php';</script>";
		} else {
				echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
			}

    	}


  ?>
