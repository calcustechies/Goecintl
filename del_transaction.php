<?php
	include'head.php';
	include'config.php';
?>
<style>
	.fa-trash-o {
	color: blue;
	}
	
	i.fa-trash-o:hover{
		color: red;
	}
</style>
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
	
	jQuery('#txtHint div').html('');
  //var f=  document.getElementById('from_c').value;

	var frm=document.getElementById('from_date').value;
	var to=	document.getElementById('to_date').value;
	
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
  xmlhttp.open("GET","gettrans2.php?frm="+frm+"&to="+to,true);
  xmlhttp.send();
}


</script>
<div id="wrapper">
<?php
	include'side_bar.php';
 ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
	 
	 
	 <!-- Modal -->
	 <form method="POST">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Transaction ID ?</h4>
        </div>
        <div class="modal-body text-center">
          Nothing..
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" name="delete">Get Tr.ID</button>
        </div>
      </div>
    </div>
  </div>
  </form>
	 
	 
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a><i class="fa fa-angle-right"></i><span>Deleted Transaction</span>
				</h2>
		</div>
		<!--//banner-->
		<div class="container">
		<br/>
			<form class="form-horizontal form-inline" action="" method="POST">
			<div>

				<div class="form-group">
				<label class="control-label col-sm-5" for="email">From Date:</label>
					<div class="col-sm-2">
							<input type="text" class="form-control" id="from_date" name="from_date" placeholder="dd-mm-yyyy" value="<?php echo date("Y/m/d");?>" required>
					</div>
				</div>
				&nbsp;&nbsp;
				<div class="form-group">
				<label class="control-label col-sm-4" for="email">To Date:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="to_date" name="to_date" placeholder="dd-mm-yyyy" value="2999/12/31" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="button" class="btn btn-default" name="curr_rate" onclick="showUser()">Search</button>
					</div>
				</div>
			</div>
			</form>
			<br/>
			<div>
			<h4 style="color:#2ECC71">Deleted Transactions</h4><br/>
			<div id="txtHint" >

			<?php
			$bh_id=$_SESSION['bh_id'];
			$sql="SELECT * FROM deleted_transaction WHERE bh_code = '".$bh_id."'  ORDER BY sr_no DESC";
$result = mysqli_query($mysqli,$sql);

echo "<table class='table table-hover' style='width:95%''>

  <thead>
    <tr class='danger'>
    <th>Sl.No</th>
    <th>Customer</th>
		<th>Date</th>
    <th>Time</th>
    <th>Currency</th>
    <th>FC Amount</th>
    <th>RO Amount</th>
	<th>TR.ID</th>
      <th>Bh.Code</th>
    </tr>
  </thead>
  <tbody>";
	$i=1;
while($row = mysqli_fetch_array($result)) {

		$f_cy=$row['from_cy'];
		$query46 = mysqli_query($mysqli,"SELECT cy_name FROM currency WHERE cy_code='$f_cy'");
		$row46 = mysqli_fetch_assoc($query46);
		$c_id=$row['cus_id'];
		$query47 = mysqli_query($mysqli,"SELECT cus_name FROM customer WHERE cus_code='$c_id'");
		$row47 = mysqli_fetch_assoc($query47);

    echo "<tr>";
		echo "<td>" . $i . "</td>";
    //echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row47['cus_name'] . "</td>";
		echo "<td>" . $row['trans_date'] . "</td>";
    echo "<td>" . $row['trans_time'] . "</td>";
		echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row['frm_amt'] . "</td>";
    echo "<td>" . $row['to_amt'] . "</td>";
	 echo "<td>" . $row['tr_id'] . "</td>";
    echo "<td>" . $row['bh_code'] . "</td>";
    echo "</tr>";
		$i++;
}
echo "</tbody></table>";
?>
			
			
			
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
		
		  <script>
        $('#myModal').on('show.bs.modal', function(e) {
            
            var $modal = $(this),
                esseyId = e.relatedTarget.id;
				
                    $modal.find('.modal-body').html("Tr ID:  <input type='text' value='"+esseyId+"' size='4' id='del' name='del' style='border:none' readonly>");

            
        })
    </script>
	
