<?php
	require_once('fpdf/fpdf.php');
	require_once('config.php');
	$date = date('d-m-Y');
	$time = date("h:i:a");
	session_start();
	if(isset($_SESSION['bh_id'])){
		$bh_id=$_SESSION['bh_id'];
		$branch= $_SESSION['branch'];
		$trans_date= $_SESSION['to_date'];
	}
	if ($branch == '0') {

		$getDet=mysqli_query($mysqli,"SELECT fc_cy,sum(fc_amt) as fc_amt FROM vw_fc_transaction WHERE `trans_date`<='$trans_date' GROUP BY fc_cy;");
		
	} else {

		$getDet=mysqli_query($mysqli,"SELECT fc_cy,sum(fc_amt) as fc_amt FROM vw_fc_transaction WHERE `bh_code`='$branch' AND `trans_date`<='$trans_date' GROUP BY fc_cy;");
		
	}
	
	
	
	$nice_date2 = date('d-m-Y', strtotime($trans_date ));
	


	$pdf = new FPDF('P', 'mm', 'A4' );

	$pdf->AliasNbPages();
	$pdf->AddPage();

	//$pdf->Cell(75);
	$pdf->Image('images/money.jpg',25,8,-175);
	$pdf->Ln();

	$pdf->SetFont('Arial','B',8);
	$pdf->SetTextColor(10,81,174);
	$pdf->Cell(75);
	$pdf->Cell(25,5,'','','','C');

	$pdf->Cell(-10);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(8,8,'','','1','C');

	//$pdf->Line(10, 15, 200,15);
$pdf->Ln(12);

	if($getDet)
	{

			$pdf->Cell(20);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(90,4,"Foreign Currency Affairs as on :",0,0,'R');
			$pdf->Cell(2);
			$pdf->Cell(10,4,$nice_date2,0,0,'L');
			$pdf->Ln();$pdf->Ln();

			$pdf->Cell(20);
			$pdf->Cell(10,4,"Branch",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			if ($branch == '0') {

				$pdf->Cell(30,4,"All",0,0,'L');
				
			} else {
				
				$sqlb="SELECT * FROM branch WHERE `bh_code` = '$branch'";
				$resultsetb = mysqli_query($mysqli,$sqlb);
				$rowsb = mysqli_fetch_array($resultsetb);
				$pdf->Cell(30,4,$rowsb['bh_name'],0,0,'L');

			}
			
			
			$pdf->Ln();
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(20);
			$pdf->Cell(15,8,"Sl.No",1,0,'C');
			$pdf->Cell(25,8,"Currency Code",1,0,'L');
			$pdf->Cell(50,8,"Currency Name",1,0,'L');
			$pdf->Cell(30,8,"Amount in OMR",1,0,'R');
			$pdf->Cell(30,8,"Amount in FC",1,0,'R');

			$i=1;
			$tot_omr_amt=0;
			while($rows = mysqli_fetch_assoc($getDet)) {
			$pdf->Ln();
			$pdf->Cell(20);
			$pdf->Cell(15,6,$i,1,0,'C');

			$tcc=$rows['fc_cy'];
			//Currency Name
			$sqltt="SELECT * FROM currency WHERE `cy_code` = '$tcc'";
			$resultsettt = mysqli_query($mysqli,$sqltt);
			$rowstt = mysqli_fetch_array($resultsettt);

			$pdf->Cell(25,6,$rowstt['cy_name'],1,0,'L');
			$pdf->Cell(50,6,$rowstt['cy_nname'],1,0,'L');


			//Avg EXchange Rate
			if ($branch == '0') {

				$get=mysqli_query($mysqli,"SELECT sum(omr_amt)/sum(fc_amt) as avg_x from vw_fc_transaction where fc_cy='$tcc' and  tr_type='0' and `trans_date`<='$trans_date' group by fc_cy;");
				
			} else {
				
				$get=mysqli_query($mysqli,"SELECT sum(omr_amt)/sum(fc_amt) as avg_x from vw_fc_transaction where fc_cy='$tcc' and  tr_type='0' and bh_code='$branch' and `trans_date`<='$trans_date' group by fc_cy;");

			}
			
			
			$getitem=mysqli_fetch_array($get);

			$omr_a=$getitem['avg_x'] * $rows['fc_amt'];


			//$pdf->Cell(30,6,round($omr_a,3),1,0,'R');

			$omr_aa=round($omr_a,3);

			//----------------------------------------------------
			if (strpos($omr_aa, ".") != false) {

				$tm = explode(".",$omr_aa);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,6,$omr_aa.".000",1,0,'R');
							
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,6,$omr_aa."0",1,0,'R');
				
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
		
					}
				}
				else{
							$pdf->Cell(30,6,$omr_aa.".000",1,0,'R');
							
				}
					//----------------------------------------------------








			$f_amt=$rows['fc_amt'];
			//----------------------------------------------------
			if (strpos($f_amt, ".") != false) {

				$tm = explode(".",$f_amt);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,6,$f_amt.".000",1,0,'R');
							
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,6,$f_amt."0",1,0,'R');
				
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
		
					}
				}
				else{
							$pdf->Cell(30,6,$f_amt.".000",1,0,'R');
							
				}
					//----------------------------------------------------

			$i++;
			$tot_omr_amt=$tot_omr_amt+$omr_a;
			}
			$pdf->Ln();
			$pdf->Cell(20);
			$pdf->Cell(90,6,"Total",1,0,'L');
			//$pdf->Cell(30,6,$tot_omr_amt,1,0,'R');

			//----------------------------------------------------
			if (strpos($tot_omr_amt, ".") != false) {

				$tm = explode(".",$tot_omr_amt);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,6,$tot_omr_amt.".000",1,0,'R');
							
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,6,$tot_omr_amt."0",1,0,'R');
				
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
		
					}
				}
				else{
							$pdf->Cell(30,6,$tot_omr_amt.".000",1,0,'R');
							
				}
					//----------------------------------------------------


			$pdf->Cell(30,6,"",1,0,'R');


		}

$pdf->Output();

?>
