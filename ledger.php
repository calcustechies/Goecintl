<?php
include'config.php';
include'head.php';
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

?>




<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Ledger</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
    <div class="row">
      <div class="col-lg-12 text-center">
          <h1>Ledger</h1>
      </div>
    </div>
    <br/> <br/>
	<form action="" method="POST" class="form-inline">

    <div class="row">
    <?php   $d=$date = date('Y-m-d'); ?>
        <div class="col-lg-6 col-md-6 text-center">
          <div class="form-group">
            <label for="from_date">From Date</label>
            <input type="text" class="form-control" id="from_date" name="from_date" value="<?php echo $d; ?>">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 text-center">
          <div class="form-group">
            <label for="to_date">To Date</label>
            <input type="text" class="form-control" id="to_date" name="to_date" value="<?php echo $d; ?>">
          </div>
        </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-lg-12 col-md-12 text-center">
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
    </div>
    <br/>
    <div class="row">
      <div class="col-lg-12 col-md-12 text-center">
        <div class="form-group">
          <label for="currency">Currency:</label>
          <select class="form-control" id="currency" name="currency">
            <option value="0" selected>--Currency--</option>
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
    </div>


      <br/>
      <div class="row">
          <div class="col-lg-6 col-md-6">
          </div>
          <div class="col-lg-6 col-md-6">
              <button type="submit" class="btn btn-primary" name="generate" style="align:center">Generate</button>
          </div>
      </div>
	</form>
    <br/><br/><br/><br/>
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
      $currency = $_POST['currency'];
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $branch = $_POST['branch'];

      if ($currency == 0) {
      echo "<script>alert('Please Select a Valid Currency');window.location='ledger.php';</script>";
      }

      $_SESSION['branch']=$branch;
      $_SESSION['from_date']=$from_date;
	    $_SESSION['to_date']=$to_date;
      $_SESSION['currency']=$currency;
        echo " <script>window.open('closingreport.php','_blank');</script>";

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
