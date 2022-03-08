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
<?php
include'config.php';
include'head.php';
?>

<?php

if(isset($_GET['cus_code']))
{
	$id = $_GET['cus_code'];
	$query = mysqli_query($mysqli,"SELECT * FROM customer WHERE cus_code='$id'");
	if(mysqli_num_rows($query)==1){
	$row = mysqli_fetch_assoc($query);
	$code = $row['cus_code'];
	$name = $row['cus_name'];
	$address = $row['cus_addr'];
	$telephone = $row['cus_tel'];
	$pp = $row['cus_pp'];
  $f_name = $row['father_name'];
  $gf_name = $row['gf_name'];
  $family_name = $row['family_name'];
  $title = $row['title'];
  $desig = $row['desig'];
  $cus_dob = $row['cus_dob'];
  $pob = $row['pob'];
  $good_q = $row['good_q'];
  $low_q = $row['low_q'];
  $nat = $row['nat'];
  $listed_on = $row['listed_on'];
  $date_amended = $row['date_amended'];

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
				<span>Add to Black List-Customer</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<br/>
		<form class="form-horizontal" action="" method="POST">
      <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">First Name:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="email" placeholder="Enter Customer Name" name="customer_name"  value="<?php  echo $name; ?>" required>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Father Name:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="email" placeholder="Enter Father Name" name="father_name"  value="<?php  echo $f_name; ?>" >
              </div>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">G/Father Name:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="email" placeholder="Enter G/Father Name" name="gf_name"  value="<?php  echo $gf_name; ?>" >
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Family Name:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="email" placeholder="Enter Family Name" name="family_name"  value="<?php  echo $family_name; ?>" >
              </div>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Title:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="email" placeholder="Enter Title" name="title"  value="<?php  echo $title; ?>" >
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Designtion:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="email" placeholder="Enter Designation" name="desig"  value="<?php  echo $desig; ?>" >
              </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">DOB:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="example1" placeholder="yyyy-mm-dd" name="cus_dob" value="<?php  echo $cus_dob; ?>">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Customer Address:</label>
            <div class="col-sm-6">
              <textarea class="form-control" rows="2" id="cus_addr"placeholder="Enter Customer Address" name="cus_addr" required><?php echo $address; ?></textarea>
            </div>
          </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">POB:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" placeholder="Enter POB" name="pob"  value="<?php  echo $pob; ?>" >
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Good Quality:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" placeholder="Enter Good Qulity" name="good_q"  value="<?php  echo $good_q; ?>" >
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Low Quality:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" placeholder="Enter Low Quality" name="low_q"  value="<?php  echo $low_q; ?>" >
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Nationality:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" placeholder="Enter Nationality" name="nat"  value="<?php  echo $nat; ?>" >
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">PP/ID No:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" placeholder="Enter ID/PP" name="pp"  value="<?php  echo $pp; ?>" required>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Listed on:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" placeholder="Enter Listed on:" name="listed_on"  value="<?php  echo $listed_on; ?>" >
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Date Amended:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" placeholder="Enter Father Name" name="date_amended"  value="<?php echo date("d/m/Y"); ?>" readonly>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-lg-9">
            <div class="form-group">
                <input type="hidden" name="customer_code" value="<?php  echo $code; ?>">
            </div>
          </div>
          <div class="col-lg-3 ">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md" name="cus_black">Add to Black List</button>
            </div>
          </div>
        </div>


	</form>
</div> <!-- Container DIV -->
</div> <!-- Content main -->
</div>  <!-- Page-Wrapper -->
</div>  <!-- wrapper -->
<?php include'footer.php'; ?>


<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

                $('#example1').datepicker({
                    format: "yyyy/mm/dd"
                });


            });
			  $(document).ready(function () {

                $('#example2').datepicker({
                    format: "yyyy/mm/dd"
                });


            });
</script>


<?php
	//update Customer
	if(isset($_POST['cus_black']))
	{
		$customer_code = $_POST['customer_code'];
		$customer_name = $_POST['customer_name'];
		$cus_addr = $_POST['cus_addr'];
		$pp = $_POST['pp'];
    $father_name = $_POST['father_name'];
    $gf_name = $_POST['gf_name'];
    $family_name = $_POST['family_name'];
    $title = $_POST['title'];
    $desig = $_POST['desig'];
    $pob = $_POST['pob'];
    $good_q = $_POST['good_q'];
    $low_q = $_POST['low_q'];
    $nat = $_POST['nat'];
    $cus_dob=$_POST['cus_dob'];
    $listed_on = $_POST['listed_on'];
    $date_amended =  date("Y/m/d");

		$query2 = mysqli_query($mysqli,"UPDATE customer SET
      cus_name='$customer_name',
      cus_addr='$cus_addr',
      cus_pp='$pp',
      father_name='$father_name',
      gf_name='$gf_name',
      family_name='$family_name',
      title='$title',
      desig='$desig',
      cus_dob='$cus_dob',
      pob='$pob',
      good_q='$good_q',
      low_q='$low_q',
      nat='$nat',
      listed_on='$listed_on',
      date_amended='$date_amended'
       WHERE cus_code ='$customer_code'");
		if($query2){
      $query22 = mysqli_query($mysqli,"UPDATE customer SET cus_blk='1' WHERE cus_code='$customer_code'");
    	if($query22){

    		echo "<script>alert('Success');window.location='cus_edit.php';</script>";
    		}
		}else{
			echo "<script>alert('fail');window.location='cus_blk_edit.php?cus_code=$id';</script>";
		}
	}
?>
