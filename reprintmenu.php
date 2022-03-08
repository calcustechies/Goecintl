<?php
include'config.php';
include'head.php';
date_default_timezone_set("Asia/Muscat");
        $date = date("Y-m-d");
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
				<span>Reprint Bill</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
    <div class="row">
      <div class="col-lg-12 text-center">
          <h1>Reprint Bill</h1>
      </div>
    </div>
    <br/> <br/>
	<form action="" method="POST" class="form-inline">
      <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="form-group">
              <label for="email">Reference Number :</label>
              <input type="ref_num" class="form-control" id="ref_num" name="ref_num" onkeypress="return isNumber(event)" required>
            </div>
          </div>
      </div>
      <br/>
      <div class="row">
          <div class="col-lg-2 col-md-2">
              <button type="submit" class="btn btn-primary" name="generate">Reprint</button>
          </div>
      </div>
	</form>
    <br/><br/><br/><br/>
	</div>
</div>


<h4 style="color:#2ECC71">&nbsp;&nbsp;Transactions</h4>
			<div id="txtHint" >

			<?php
			$bh_id=$_SESSION['bh_id'];
			$sql="SELECT * FROM transaction WHERE bh_code = '".$bh_id."' AND trans_date = '".$date."'  ORDER BY sr_no DESC";
$result = mysqli_query($mysqli,$sql);

echo "<table class='table table-hover' style='width:95%'' >

  <thead>
    <tr class='danger'>
    <th>Sl.No</th>
    <th>Tr.ID</th>
    <th>Customer</th>
		<th>Date</th>
    <th>Time</th>
    <th>Currency</th>
    <th>From Amount</th>
    <th>To Amount</th>
    </tr>
  </thead>
  <tbody>";
	$i=1;
while($row = mysqli_fetch_array($result)) {

		//$frm_cc=$row["frm_cy"];
		//$to_cc=$row["to_cy"];
		$f_cy=$row['from_cy'];
		$query46 = mysqli_query($mysqli,"SELECT cy_name FROM currency WHERE cy_code='$f_cy'");
		$row46 = mysqli_fetch_assoc($query46);
		$c_id=$row['cus_id'];
		$query47 = mysqli_query($mysqli,"SELECT cus_name FROM customer WHERE cus_code='$c_id'");
		$row47 = mysqli_fetch_assoc($query47);

    echo "<tr>";
		echo "<td>" . $i . "</td>";
    echo "<td>" . $row['tr_id'] . "</td>";
    //echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row47['cus_name'] . "</td>";
		echo "<td>" . $row['trans_date'] . "</td>";
    echo "<td>" . $row['trans_time'] . "</td>";
		echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row['frm_amt'] . "</td>";
    echo "<td>" . $row['to_amt'] . "</td>";
    echo "</tr>";
		$i++;
}
echo "</tbody></table>";
?>
			
			
			
			</div>




</div>
</div>
<?php include'footer.php'; ?>
  <?php
    if(isset($_POST['generate']))
    {
      $ref_num = $_POST['ref_num'];
      
      $sql_chk="SELECT * FROM transaction WHERE bh_code = '".$bh_id."' AND tr_id = '".$ref_num."'";
      $result_chk = mysqli_query($mysqli,$sql_chk);
      $num_row = mysqli_num_rows($result_chk);
      if($num_row == 1)
      {
          $_SESSION['ref_num']=$ref_num;
          echo " <script>window.open('reprint.php','_blank');</script>";
      }else
      {
         echo " <script>alert('Please Enter Valid Reference Number');window.location='reprintmenu.php';</script>";
      }

    }


  ?>
