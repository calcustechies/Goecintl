<?php
	include'head.php';
	include'config.php';
        date_default_timezone_set("Asia/Muscat");
        $date = date("Y-m-d");
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
  xmlhttp.open("GET","gettrans.php?frm="+frm+"&to="+to,true);
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
          <h4 class="modal-title">Are you sure to delete ?</h4>
        </div>
        <div class="modal-body text-center">
          Nothing..
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </div>
      </div>
    </div>
  </div>
  </form>
	 
	 
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a><i class="fa fa-angle-right"></i><span>Transaction</span>
				</h2>
		</div>
<br/>
			<h4 style="color:#2ECC71">&nbsp;&nbsp;Transactions</h4><br/>
			<div id="txtHint" >

			<?php
			$bh_id=$_SESSION['bh_id'];
			$sql="SELECT * FROM transaction WHERE bh_code = '".$bh_id."' AND trans_date = '".$date."'  ORDER BY sr_no DESC";
$result = mysqli_query($mysqli,$sql);

echo "<table class='table table-hover' style='width:95%''>

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
	<th>Delete</th>
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
	 echo "<td class='text-center'><a href='#' id='" . $row['tr_id'] . "' data-toggle='modal' data-target='#myModal' ><i class='fa fa-trash-o'></i></a></td>";
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
	
	<?php 
	if(isset($_POST['delete']))
	{

		$id = $_POST['del'];
		$query_del = mysqli_query($mysqli,"INSERT INTO `deleted_transaction`(`sr_no`, `tr_id`, `cus_id`, `from_cy`, `to_cy`, `frm_amt`, `equvallent`, `to_amt`, `tr_ex_rate`, `tr_rate_sr_no`, `cmsn`, `sale_pur`, `source`, `purpose`, `bh_code`, `trans_date`, `trans_time`, `us_code`, `round`) SELECT * FROM transaction WHERE `tr_id`='$id'");	
		$query = mysqli_query($mysqli,"DELETE FROM transaction WHERE tr_id='$id'");
		if($query && $query_del){
			echo "<script>alert('SUCCESS');window.location.href='transaction.php';</script>";	
		}
		else{		
			echo "<script>alert('ERROR');window.location.href='transaction.php';</script>";		
			}
	
	}

?>
