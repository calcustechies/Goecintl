<?php
	require_once('fpdf/fpdf.php');
	require_once('config.php');
	$date = date('d-m-Y');
	session_start();
	if(isset($_SESSION['branch'])){

		//$trans_type=$_SESSION['trans_type'];
		$from_date=$_SESSION['from_date'];
		$to_date=$_SESSION['to_date'];
		$branch=$_SESSION['branch'];
		$currency=$_SESSION['currency'];
		$nice_date1 = date('d-m-Y', strtotime($from_date));
		$nice_date2 = date('d-m-Y', strtotime($to_date ));
	}
	$formula="";
	$formulax="";
	if($branch != '0')
	{
		$formula2= "AND bh_code='$branch'";
		$formula= $formula." ".$formula2;
	}

	if ($currency != '0')
	{
				$formula5="AND (from_cy='$currency' OR to_cy='$currency')";
				$formula= $formula." ".$formula5;
	}

$sql4="SELECT * FROM transaction WHERE `trans_date` BETWEEN '$from_date' AND '$to_date' $formula ";
	$resultset = mysqli_query($mysqli,$sql4) or die("database error:". mysqli_error($mysqli));

	//select sum(to_amt) from transaction where sale_pur='1' and bh_code='001' and trans_date between '2017/12/21' and '2017/12/21'
	//select sum(to_amt) from transaction where sale_pur='0' and bh_code='001' and trans_date between '2017/12/21' and '2017/12/21'

	$pdf = new FPDF('P', 'mm', 'A4' );



	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->Image('images/money.jpg',25,8,-175);
	//$pdf->SetTextColor(10,81,174);
	$pdf->Cell(75);
	$pdf->Cell(25,5,'','','','C');
	//$pdf->Cell(55);
	//$pdf->SetFont('Arial','',9);
	//$pdf->Cell(25,1,'From Date - '.$from_date.'','','','C');
	//$pdf->Cell(-25,9,'To Date - '.$to_date.'','','','C');
	//$pdf->Cell(25,17,' ','','','C');
	$pdf->Cell(-10);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(8,8,'','','1','C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B',9);

	$pdf->Cell(2);
		$pdf->Cell(25,5,"Daily Closing Report [ Ledger ]",'','','L');
	$pdf->Cell(135);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,1,'From Date : '.$nice_date1.'','','','R');
	$pdf->Cell(-1,9,'To Date    : '.$nice_date2.'','','','R');
	$pdf->Cell(25,17," ",'','','C');
	$pdf->Cell(-25,25,  '','','','C');

	$pdf->Line(10, 42, 200,42);

	$pdf->Ln(12);


		//ALL VALUES ARE 0
		$pdf->Cell(25,5,'Branch','','','L');
		$pdf->cell(3);
		$pdf->Cell(2,5,':','','','L');
		$pdf->cell(1);
		if($branch != '0')
		{
			$sqlb="SELECT * FROM branch WHERE `bh_code` = '$branch'";
			$resultsetb = mysqli_query($mysqli,$sqlb);
			$rowsb = mysqli_fetch_array($resultsetb);;
			$pdf->Cell(25,5,$rowsb['bh_name'],'','','L');
		}else {
			$pdf->Cell(25,5,"All",'','','L');
		}

		$pdf->Ln();


		$pdf->Cell(25,5,"Currency",'','','L');
		$pdf->cell(3);
		$pdf->Cell(2,5,':','','','L');
		$pdf->cell(1);
		if($currency != '0')
		{
			$sqlcc="SELECT * FROM currency WHERE `cy_code` = '$currency'";
			$resultsetcc = mysqli_query($mysqli,$sqlcc);
			$rowscc = mysqli_fetch_array($resultsetcc);
			$pdf->Cell(25,5,$rowscc['cy_nname'],'','','L');
		}else {
			$pdf->Cell(25,5,"All",'','','L');
		}
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(12,8,"Sl.No",1,0,'C');
		$pdf->Cell(18,8,"Date",1,0,'C');
		$pdf->Cell(25,8,"FC Sale(Dr)",1,0,'R');
		$pdf->Cell(25,8,"FC Purch(Cr)",1,0,'R');
		$pdf->Cell(23,8,"RO (Dr)",1,0,'R');
		$pdf->Cell(23,8,"RO (Cr)",1,0,'R');
		$pdf->Cell(30,8,"RO Balance",1,0,'R');
		$pdf->Cell(30,8,"FC Balance",1,0,'R');
		//$pdf->Cell(10,8,"Curr",1,0,'C');
		//$pdf->Cell(10,8,"Com",1,0,'C');
		//$pdf->Cell(20,8,"Ex.Gain",1,0,'C');
		if($branch != '0')
		{
			$formulax= "AND bh_code='$branch'";
		}

if($branch != '0')
	{
		
$ro_query_op="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE (sale_pur='1' OR sale_pur='3') AND trans_date < '$from_date' 
AND to_cy='$currency' AND bh_code='$branch' $formulax";

$ro_query2_op="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE (sale_pur='0' OR sale_pur='2') AND  trans_date < '$from_date' 
AND from_cy='$currency' AND bh_code='$branch' $formulax ";
}
	else
{
$ro_query_op="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE (sale_pur='1' OR sale_pur='3') AND trans_date < '$from_date' 
AND to_cy='$currency' 
$formulax";

$ro_query2_op="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE (sale_pur='0' OR sale_pur='2') AND  trans_date < '$from_date' 
AND from_cy='$currency' 
$formulax ";
	}


//		$ro_query_op="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE sale_pur='1' AND trans_date < '$from_date' $formulax";
		$resultsetrq_op = mysqli_query($mysqli,$ro_query_op);
		$rowsrq_op = mysqli_fetch_array($resultsetrq_op);

//		$ro_query2_op="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE sale_pur='0' AND  trans_date < '$from_date' $formulax ";
		$resultsetrq2_op = mysqli_query($mysqli,$ro_query2_op);
		$rowsrq2_op = mysqli_fetch_array($resultsetrq2_op);

		$ro_tot_op =$rowsrq2_op['ro_b']- $rowsrq_op['ro_b'];
		$fc_tot_op = $rowsrq2_op['fc_b']-$rowsrq_op['fc_b'];
		$pdf->SetFont('Arial','',9);
		$pdf->Ln();
		$pdf->Cell(126,6,"Opening Balance",1,0,'L');

		//----------------------------------------------------
		if (strpos($ro_tot_op, ".") != false) {

			$tm = explode(".", $ro_tot_op);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(30,6,$ro_tot_op."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(30,6,$ro_tot_op."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(30,6,$ro_tot_op.".000",1,0,'R');
			}
			//----------------------------------------------------

		//$pdf->Cell(30,6,$ro_tot_op,1,0,'R');
		//----------------------------------------------------
		if (strpos($fc_tot_op, ".") != false) {

			$tm = explode(".", $fc_tot_op);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(30,6,$fc_tot_op."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(30,6,$fc_tot_op."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(30,6,$fc_tot_op.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(30,6,$fc_tot_op,1,0,'R');




		$i=1;
		$tot_fc_sale=0;
		$tot_fc_purch=0;
		$tot_ro_purch=0;
		$tot_ro_sale=0;

$ro_tot = $ro_tot_op;
$fc_tot = $fc_tot_op;

		while($rows = mysqli_fetch_assoc($resultset)) {
//
//			$tr=$rows['tr_id'];
//
//
//
//			$ro_query1="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE sale_pur='1' AND tr_id <= '$tr' $formulax ";
//			$resultsetrq1 = mysqli_query($mysqli,$ro_query1);
//			$rowsrq1 = mysqli_fetch_array($resultsetrq1);
//			$ro_query2="SELECT sum(to_amt) as ro_b,sum(frm_amt) as fc_b FROM transaction WHERE sale_pur='0' AND tr_id <= '$tr' $formulax ";
//			$resultsetrq2 = mysqli_query($mysqli,$ro_query2);
//			$rowsrq2 = mysqli_fetch_array($resultsetrq2);
//
//
//			$ro_tot =$rowsrq2['ro_b']- $rowsrq1['ro_b'];
//			$fc_tot = $rowsrq2['fc_b']-$rowsrq1['fc_b'];
//
			$pdf->SetFont('Arial','',9);
			$pdf->Ln();
			$pdf->Cell(12,6,$i,1,0,'L');
			$d=date('d/m/Y', strtotime($rows['trans_date']));
			$pdf->Cell(18,6,$d,1,0,'L');
			//FC SALE
			if($rows['sale_pur'] == '1' || $rows['sale_pur'] == '3')
			{
				
$ro_tot = $ro_tot - $rows['to_amt'];
$fc_tot = $fc_tot - $rows['frm_amt'];

				//----------------------------------------------------
				if (strpos($rows['frm_amt'], ".") != false) {

					$tm = explode(".", $rows['frm_amt']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(25,6,$rows['frm_amt']."00",1,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(25,6,$rows['frm_amt']."0",1,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(25,6,$tm1.".".$subtm2,1,0,'R');
						}
					}
					else{
								$pdf->Cell(25,6,$rows['frm_amt'].".000",1,0,'R');
					}
					//----------------------------------------------------
				//$pdf->Cell(25,6,$rows['frm_amt'],1,0,'R');
			}else {
				$pdf->Cell(25,6,"",1,0,'R');
			}
			//FC PURCHASE
			if($rows['sale_pur'] == '0' || $rows['sale_pur'] == '2')
			{
$ro_tot = $ro_tot + $rows['to_amt'];
$fc_tot = $fc_tot + $rows['frm_amt'];
				//----------------------------------------------------
				if (strpos($rows['frm_amt'], ".") != false) {

					$tm = explode(".", $rows['frm_amt']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(25,6,$rows['frm_amt']."00",1,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(25,6,$rows['frm_amt']."0",1,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(25,6,$tm1.".".$subtm2,1,0,'R');
						}
					}
					else{
								$pdf->Cell(25,6,$rows['frm_amt'].".000",1,0,'R');
					}
					//----------------------------------------------------
				//$pdf->Cell(25,6,$rows['frm_amt'],1,0,'R');
			}else {
				$pdf->Cell(25,6,"",1,0,'R');
			}

			//RO Sale
			if($rows['sale_pur'] == '0' || $rows['sale_pur'] == '2')
			{
				//----------------------------------------------------
				if (strpos($rows['to_amt'], ".") != false) {

					$tm = explode(".", $rows['to_amt']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(23,6,$rows['to_amt']."00",1,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(23,6,$rows['to_amt']."0",1,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(23,6,$tm1.".".$subtm2,1,0,'R');
						}
					}
					else{
								$pdf->Cell(23,6,$rows['to_amt'].".000",1,0,'R');
					}
					//----------------------------------------------------
				//$pdf->Cell(23,6,$rows['to_amt'],1,0,'R');
			}else {
				$pdf->Cell(23,6,"",1,0,'R');
			}

			//RO Purchase
			if($rows['sale_pur'] == '1' || $rows['sale_pur'] == '3')
			{
				//----------------------------------------------------
				if (strpos($rows['to_amt'], ".") != false) {

					$tm = explode(".", $rows['to_amt']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(23,6,$rows['to_amt']."00",1,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(23,6,$rows['to_amt']."0",1,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(23,6,$tm1.".".$subtm2,1,0,'R');
						}
					}
					else{
								$pdf->Cell(23,6,$rows['to_amt'].".000",1,0,'R');
					}
					//----------------------------------------------------
				//$pdf->Cell(23,6,$rows['to_amt'],1,0,'R');
			}else {
				$pdf->Cell(23,6,"",1,0,'R');
			}
			$ro_tot_r=round($ro_tot,3);
			//----------------------------------------------------
			if (strpos($ro_tot_r, ".") != false) {

				$tm = explode(".",$ro_tot_r);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,6,$ro_tot_r."00",1,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,6,$ro_tot_r."0",1,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
					}
				}
				else{
							$pdf->Cell(30,6,$ro_tot_r.".000",1,0,'R');
				}
				//----------------------------------------------------

			//$pdf->Cell(30,6,round($ro_tot,3),1,0,'R');

			$fc_tot_r=round($fc_tot,3);
			//----------------------------------------------------
			if (strpos($fc_tot_r, ".") != false) {

				$tm = explode(".",$fc_tot_r);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,6,$fc_tot_r."00",1,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,6,$fc_tot_r."0",1,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
					}
				}
				else{
							$pdf->Cell(30,6,$fc_tot_r.".000",1,0,'R');
				}
				//----------------------------------------------------

			//$pdf->Cell(30,6,round($fc_tot,3),1,0,'R');

			if($rows['sale_pur'] == '1' || $rows['sale_pur'] == '3')
			{
				$tot_fc_sale=$tot_fc_sale+$rows['frm_amt'];
				$tot_ro_sale=$tot_ro_sale+$rows['to_amt'];
			}
			if($rows['sale_pur'] == '0' || $rows['sale_pur'] == '2')
			{
				$tot_fc_purch=$tot_fc_purch+$rows['frm_amt'];
				$tot_ro_purch=$tot_ro_purch+$rows['to_amt'];
			}


			$i++;
		}

		$pdf->Ln();
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(30,6,"TOTAL",1,0,'L');
		//----------------------------------------------------
		if (strpos($tot_fc_sale, ".") != false) {

			$tm = explode(".",$tot_fc_sale);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(25,6,$tot_fc_sale."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(25,6,$tot_fc_sale."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(25,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(25,6,$tot_fc_sale.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(25,8,$tot_fc_sale,1,0,'R');
		//----------------------------------------------------
		if (strpos($tot_fc_purch, ".") != false) {

			$tm = explode(".",$tot_fc_purch);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(25,6,$tot_fc_purch."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(25,6,$tot_fc_purch."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(25,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(25,6,$tot_fc_purch.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(25,8,$tot_fc_purch,1,0,'R');
		//----------------------------------------------------
		if (strpos($tot_ro_purch, ".") != false) {

			$tm = explode(".",$tot_ro_purch);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(23,6,$tot_ro_purch."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(23,6,$tot_ro_purch."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(23,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(23,6,$tot_ro_purch.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(23,8,$tot_ro_purch,1,0,'R');
		//----------------------------------------------------
		if (strpos($tot_ro_sale, ".") != false) {

			$tm = explode(".",$tot_ro_sale);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(23,6,$tot_ro_sale."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(23,6,$tot_ro_sale."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(23,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(23,6,$tot_ro_sale.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(23,8,$tot_ro_sale,1,0,'R');
		$ro_tot_r=round($ro_tot,3);
		//----------------------------------------------------
		if (strpos($ro_tot_r, ".") != false) {

			$tm = explode(".",$ro_tot_r);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(30,6,$ro_tot_r."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(30,6,$ro_tot_r."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(30,6,$ro_tot_r.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(30,8,round($ro_tot,3),1,0,'R');
		$fc_tot_r=round($fc_tot,3);
		//----------------------------------------------------
		if (strpos($fc_tot_r, ".") != false) {

			$tm = explode(".",$fc_tot_r);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(30,6,$fc_tot_r."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(30,6,$fc_tot_r."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(30,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(30,6,$fc_tot_r.".000",1,0,'R');
			}
			//----------------------------------------------------
		//$pdf->Cell(30,8,round($fc_tot,3),1,0,'R');

$pdf->Output();

?>
