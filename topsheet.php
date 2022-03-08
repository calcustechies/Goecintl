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

     //Selecting avaliable branches
    $query1="SELECT * FROM branch";
    $rs1=mysqli_query($mysqli,$query1);
    $d=$date = date('Y-m-d');
/*
    
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
*/
?>




<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Top Sheet</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
    <div class="row">
      <div class="col-lg-12 text-center">
          <h1>Top Sheet</h1>
      </div>
    </div>
    <br/> <br/>
	<form action="" method="POST" class="form-inline">
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
      <br>
      <div class="row">
          <div class="col-lg-12 col-md-12 text-center">
            <div class="form-group">
              <label for="branch">As On :</label>
              <input type="text" class="form-control" id="to_date" name="to_date" value="<?php echo $d; ?>">
            </div>
          </div>
      </div>
      <br/>
      <center>
      <div class="row">
          <div class="col-lg-12 col-md-12 text-center">
             <button type="submit" class="btn btn-primary" name="generate">Generate</button>
          </div>
      </div>
      </center> 
	</form>
    <br/><br/><br/><br/>
	</div>
</div>
</div>
</div>

<script src="js/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
    // When the document is ready

    $(document).ready(function () {
      $('#to_date').datepicker({
        format: "yyyy/mm/dd"
      });
    });
  </script>

<?php include'footer.php'; ?>
  <?php
    if(isset($_POST['generate']))
    {
      $branch = $_POST['branch'];
      $to_date = $_POST['to_date'];
      $_SESSION['branch']=$branch;
      $_SESSION['to_date']=$to_date;
        echo " <script>window.open('topsheetreport.php','_blank');</script>";

    }


  ?>
