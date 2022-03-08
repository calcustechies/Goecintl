<?php
include'config.php';
include'head.php';
?>
<div id="wrapper">
<?php
    include'side_bar.php';
    $query6="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' AND cy_frz='0'";
  	$rs4=mysqli_query($mysqli,$query6);

    //Selecting avaliable branches
    $query1="SELECT * FROM branch";
		$rs1=mysqli_query($mysqli,$query1);

    //Selecting avaliable currencies
    $query2="SELECT * FROM currency";
		$rs2=mysqli_query($mysqli,$query2);

    //Selecting avaliable Users
    $query3="SELECT * FROM users";
		$rs3=mysqli_query($mysqli,$query3);

    $query44="SELECT iso3,name FROM country  ";
  $rs44=mysqli_query($mysqli,$query44);

?>

<script>
        $(document).ready(function() {
        $('#cus_all').change(function() {
          if ($(this).prop('checked')) {
              document.getElementById("customer").disabled = true; //checked
              document.getElementById("customer").value = "";
          }
          else {
              document.getElementById("customer").disabled = false; //not checked
          }
        });
        });
</script>


<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Transaction History Report</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
    <div class="row">
      <div class="col-lg-12 text-center">
          <h1>Transaction History Report</h1>
      </div>
    </div>
    <br/> <br/>
	<form action="" method="POST" class="form-inline">
      <div class="row">
          <div class="col-lg-12 col-md-12">
            <label class="radio-inline"><input type="radio" value="1" name="trans_type" checked>Sales Report</label>
            <label class="radio-inline"><input type="radio" value="0" name="trans_type">Purchase Report</label>
            <label class="radio-inline"><input type="radio" value="2" name="trans_type">All(Statement of Accounts)</label>
          </div>
      </div>
      <br/>
      <div class="row">
      <?php   $d=$date = date('Y-m-d'); ?>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="from_date">From Date</label>
              <input type="text" class="form-control" id="from_date" name="from_date" value="<?php echo $d; ?>">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="to_date">To Date</label>
              <input type="text" class="form-control" id="to_date" name="to_date" value="<?php echo $d; ?>">
            </div>
          </div>
      </div>
      <br/>
      <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="branch">Branch:</label>
              <select class="form-control" id="branch" name="branch">
                <option value="0" selected>All</option>
                <?php
        					while($row1=mysqli_fetch_array($rs1))
        					{
                  ?>
                  <option value="<?php echo $row1['bh_code']; ?>"><?php echo $row1['bh_name']; ?></option>
                  <?php
      						}
      		 		     ?>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label for="to_date">Customer</label>
              <input type="text" class="form-control" id="customer" name="customer" value="" list="cusname" autocomplete="off" disabled>

              <div class="checkbox">
                <label><input type="checkbox" value="0" id="cus_all" name="cus_all" checked>All</label>
              </div>

            </div>
          </div>
      </div>
      <br/>

      <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="form-group">
              <label for="currency">Currency:</label>
              <select class="form-control" id="currency" name="currency">
                <option value="0" selected>All</option>
                <?php
        					while($row2=mysqli_fetch_array($rs2))
        					{
                    if( $row2['cy_code'] != '2')
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

          <div class="col-lg-3 col-md-3">
            <div class="form-group">
              <label for="user">User :</label>
              <select class="form-control" id="user" name="user">
                <option value="0" selected>All</option>
                <?php
        					while($row3=mysqli_fetch_array($rs3))
        					{
                    if( $row3['cy_code'] != '2')
                      {
                  ?>
                  <option value="<?php echo $row3['us_code']; ?>"><?php echo $row3['us_name']; ?></option>
                  <?php
                    }
      						}
      		 		     ?>
              </select>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="form-group">
              <label for="user">Nationality By:</label>

              <select class="form-control" id="customer_country" name="customer_country" style="width:140px">
                <option value="" selected>--All--</option>
              <?php
              while($row44=mysqli_fetch_array($rs44))
              {
                ?>

                <option value="<?php echo $row44["iso3"]; ?>"><?php  echo $row44["name"]; ?></option>
              <?php } ?>
              </select>
            </div>

            </div>
          </div>
          <br>
          <div class="col-lg-4 col-md-4">
            <div class="checkbox">
              <label><input type="checkbox" value="1" name="gain">With Gain</label>
            </div>
          </div>
      </div>
      <br/>
      <div class="row">
          <div class="col-lg-2 col-md-2">
              <button type="submit" class="btn btn-primary" name="generate">Generate Report</button>
          </div>
      </div>
	</form>
    <br/><br/><br/><br/>
    <datalist id='cusname'>
      <?php
        $getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
        while($itemscode=mysqli_fetch_array($getitem2))
        {
      ?>
          <option value='<?php echo $itemscode['cus_tel']."-".$itemscode['cus_name'].",".$itemscode['cus_pp'].",".$itemscode['cus_civil'] ?>'>
      <?php
        }
      ?>
    </datalist>

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
    if(isset($_POST['generate']))
    {
      $trans_type = $_POST['trans_type'];
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $branch = $_POST['branch'];
      $customer = $_POST['customer'];
      $currency = $_POST['currency'];
      $user = $_POST['user'];
      $gain  = $_POST['gain'];
      $customer_country  = $_POST['customer_country'];
      //$_SESSION['from_c']=$from_c;
      //$_SESSION['from_date']=$from_date;
	    //$_SESSION['to_date']=$to_date;
      if($gain == NULL)
      {
        $gain=0;
      }
      if($customer == NULL)
      {
        $customer=0;
      }

      $_SESSION['trans_type']=$trans_type;
      $_SESSION['from_date']=$from_date;
      $_SESSION['to_date']=$to_date;
      $_SESSION['branch']=$branch;
      $_SESSION['customer']=$customer;
      $_SESSION['customer_country']=$customer_country;
      $_SESSION['currency']=$currency;
      $_SESSION['user']=$user;
      $_SESSION['gain']=$gain;
      if($gain == '0')
      {
        echo " <script>window.open('report_main.php','_blank');</script>";
      }else {
        echo " <script>window.open('report_main2.php','_blank');</script>";
      }


      //if($from_c == "0")
      //{
        //$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$from_date' AND '$to_date'";
    //  }else{
      //$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$from_date' AND '$to_date'AND from_cy='$from_c'";
      //}
    	//$sql2 = "SELECT * FROM bill_transactions";
    	//$sql2 = "SELECT * FROM transaction";

    	//$resultset = mysqli_query($mysqli,$sql1) or die("database error:". mysqli_error($mysqli));
    	//$num_row = mysqli_num_rows($resultset);
    	//if($num_row == '0')
    	//{
    		//echo "<script>alert('Empty Data..');</script>";
    		//echo " <script>window.location='reports.php';</script>";
    	//}else {
        //echo "<script>window.open('trans_report.php','_blank');</script>";
   	  //}
    	}


  ?>
