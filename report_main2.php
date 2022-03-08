<?php
	require_once('fpdf/fpdf.php');
	require_once('config.php');
	$date = date('d-m-Y');
	session_start();
	if(isset($_SESSION['trans_type'])){

		$trans_type=$_SESSION['trans_type'];
		$from_date=$_SESSION['from_date'];
		$to_date=$_SESSION['to_date'];
		$branch=$_SESSION['branch'];
		$customer=$_SESSION['customer'];
		$currency=$_SESSION['currency'];
		$customer_country=$_SESSION['customer_country'];
		$user=$_SESSION['user'];
		$gain=$_SESSION['gain'];
		$customer_country=$_SESSION['customer_country'];
		$nice_date1 = date('d-m-Y', strtotime($from_date));
		$nice_date2 = date('d-m-Y', strtotime($to_date ));
	}
	if($customer != '0')
	{
		$pieces = explode("-", $customer);
		$a=$pieces[0]; // piece1
		$b=$pieces[1]; // piece2
	}



	$formula="";
	if($trans_type == '2' && $branch == '0' && $customer == '0' && $currency == '0' && $user == '0'  && $gain == '0' &&  $customer_country == Null)
	{
		$formula="";
	}

	if($trans_type != '2')
	{
		$formula1= "AND sale_pur='$trans_type'";
		$formula= $formula." ".$formula1;
	}

	if($branch != '0')
	{
		$formula2= "AND bh_code='$branch'";
		$formula= $formula." ".$formula2;
	}

	if($customer != '0')
	{
		$formula3="AND `cus_tel`='$a'";
		$formula= $formula." ".$formula3;
	}

	if ($user != '0')
	{
		$formula4="AND `us_code`='$user'";
		$formula= $formula." ".$formula4;
	}


	if ($currency != '0')
	{
		if($trans_type != '2')
		{
			if($trans_type == '1')
			{
				$formula5="AND `to_cy`='$currency'";
				$formula= $formula." ".$formula5;
			}else {
				$formula5="AND `from_cy`='$currency'";
				$formula= $formula." ".$formula5;
			}
		}else
		{
			$formula5="AND (from_cy='$currency' OR to_cy='$currency')";
			$formula= $formula." ".$formula5;
		}
	}
	//$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$nice_date1' AND '$nice_date2'";

	//$getDet=mysqli_query($mysqli,"SELECT * FROM branch WHERE `bh_code`='$bh_id';");
	//if($from_c == "0")
	//{
		//$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$from_date' AND '$to_date'";
	//}else {
		//$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$from_date' AND '$to_date'AND from_cy='$from_c'";
	//}
	//$sql2 = "SELECT * FROM bill_transactions";
	//$sql2 = "SELECT * FROM transaction";
	$sql4="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` $formula AND `trans_date` BETWEEN '$from_date' AND '$to_date'";
	$resultset = mysqli_query($mysqli,$sql4) or die("database error:". mysqli_error($mysqli));

//Header and Footer

	class pdf extends fpdf
{


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}




	$pdf = new FPDF('L', 'mm', 'A4' );



	$pdf->AliasNbPages();

	$pdf->AddPage();

	$pdf->Image('images/money.jpg',60,1,-175);
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
	$pdf->SetFont('Arial','B',9);

	$pdf->Cell(2);
	if($trans_type != 2)
	{
		if($trans_type  == '1')
		{
			$pdf->Cell(25,5,"FC SALES REPORT",'','','L');
		}else {
			$pdf->Cell(25,5,"FC PURCHASE REPORT",'','','L');
		}
	}else {
		$pdf->Cell(25,5,"STATEMENT OF ACCOUNTS",'','','L');
	}
	$pdf->Cell(240);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(15,1,'From Date : '.$nice_date1.'','','','R');
	$pdf->Cell(-1,9,'To Date    : '.$nice_date2.'','','','R');

	$pdf->Ln();
	$pdf->Line(2, 35, 400,35);


		//ALL VALUES ARE 0
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
			$pdf->Cell(40,5,$rowsb['bh_name'],'','','L');
		}else {
			$pdf->Cell(40,5,"All",'','','L');
		}

		

		$pdf->Cell(25,5,'User','','','L');
		$pdf->cell(3);
		$pdf->Cell(2,5,':','','','L');
		$pdf->cell(1);
		if($user != '0')
		{
			$sqlu="SELECT * FROM users WHERE `us_code` = '$user'";
			$resultsetu = mysqli_query($mysqli,$sqlu);
			$rowsu = mysqli_fetch_array($resultsetu);;
			$pdf->Cell(25,5,$rowsu['us_name'],'','','L');
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
			$pdf->Cell(40,5,$rowscc['cy_nname'],'','','L');
		}else {
			$pdf->Cell(40,5,"All",'','','L');
		}
		
		
		
		


		$pdf->Cell(25,5,"Tel/Customer",'','','L');
		$pdf->cell(3);
		$pdf->Cell(2,5,':','','','L');
		$pdf->cell(1);
		if($customer != '0')
		{
			$sqlcc22="SELECT * FROM customer WHERE `cus_tel` = '$a' ";
			$resultsetcc22 = mysqli_query($mysqli,$sqlcc22);
			$rowscc22 = mysqli_fetch_array($resultsetcc22);
			$pdf->Cell(25,5,$rowscc22['cus_tel']." / ".$rowscc22['cus_name'],'','','L');
		}else {
			$pdf->Cell(25,5,"All",'','','L');
		}

		$pdf->Ln();

		$pdf->Cell(25,5,"Average Ex.Rate",'','','L');
		$pdf->cell(3);
		$pdf->Cell(2,5,':','','','L');
		$pdf->cell(1);
		if($currency != '0')
		{
			if ($branch == '0') {
				$sqlcc="SELECT SUM(omr_amt)/SUM(fc_amt) as avg FROM vw_fc_transaction WHERE `fc_cy` = '$currency' AND tr_type='0' ";
			}else
			{
				$sqlcc="SELECT SUM(omr_amt)/SUM(fc_amt) as avg FROM vw_fc_transaction WHERE `fc_cy` = '$currency' AND tr_type='0' and bh_code='$branch'";
			}
			
			$resultsetcc = mysqli_query($mysqli,$sqlcc);
			$rowscc = mysqli_fetch_array($resultsetcc);
			$pdf->Cell(40,5,round($rowscc['avg'],6),'','','L');
		}else {
			$pdf->Cell(40,5,"Null",'','','L');
		}


		$pdf->Cell(25,5,"Nationality By",'','','L');
		$pdf->cell(3);
		$pdf->Cell(2,5,':','','','L');
		$pdf->cell(1);
		if($customer_country != Null)
		{
			$sqlcc2="SELECT * FROM country WHERE `iso3` = '$customer_country' ";
			$resultsetcc2 = mysqli_query($mysqli,$sqlcc2);
			$rowscc2 = mysqli_fetch_array($resultsetcc2);
			$pdf->Cell(25,5,$rowscc2['name'],'','','L');
		}else {
			$pdf->Cell(25,5,"All",'','','L');
		}
		$pdf->Ln();
		
		$pdf->Ln();
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(12,8,"Sl.No",1,0,'C');
		$pdf->Cell(15,8,"Tr.ID",1,0,'C');
		if($customer == '0')
		{
			$pdf->Cell(49,8,"Cust. Name",1,0,'L');
			$pdf->Cell(25,8,"Telephone",1,0,'C');
			$pdf->Cell(35,8,"ID/PP No",1,0,'C');
		}else
		{
			$pdf->Cell(109,8,"Narration",1,0,'C');
		}
		$pdf->Cell(15,8,"Branch",1,0,'C');
		$pdf->Cell(15,8,"Tr.Type",1,0,'C');
		$pdf->Cell(23,8,"Tr.Date",1,0,'C');
		$pdf->Cell(16,8,"FC.Amt",1,0,'C');
		$pdf->Cell(20,8,"Ex.Rate",1,0,'C');
		$pdf->Cell(20,8,"Tot.Amt",1,0,'C');
		$pdf->Cell(10,8,"Curr",1,0,'C');
		$pdf->Cell(15,8,"Com",1,0,'C');
		$pdf->Cell(15,8,"Gain",1,0,'C');
		//$pdf->Cell(20,8,"Ex.Gain",1,0,'C');
		$i=1;
		$ga=0;
		$tot_to_amt=0;
		$cmsn=0;
		$tot_from_amt=0;
		while($rows = mysqli_fetch_assoc($resultset)) {

			//gain calculation
			if($rows['sale_pur'] == '1' )
			{
				$g_to_cy=$rows['to_cy'];
				$sqlc="SELECT * FROM currency_rates WHERE `to_cy` ='$g_to_cy' AND active='1'";
			}else {
				$g_from_cy=$rows['from_cy'];
				$sqlc="SELECT * FROM currency_rates WHERE `to_cy` ='$g_from_cy' AND active='1'";
			}

			$resultsetc = mysqli_query($mysqli,$sqlc);
			$rowsc = mysqli_fetch_array($resultsetc);

			$g1=$rows['frm_amt']*$rowscc['avg'];
			$g = $rows['to_amt']-$g1;

			//gain calculation end

			$pdf->SetFont('Arial','',9);

			$pdf->Ln();
			$pdf->Cell(12,6,$i,1,0,'L');
			$pdf->Cell(15,6,$rows['tr_id'],1,0,'L');
			if ($customer == '0') {
				$pdf->Cell(49,6,substr($rows['cus_name'],0,21),1,0,'L');
				$pdf->Cell(25,6,$rows['cus_tel'],1,0,'L');
				$pdf->Cell(35,6,substr($rows['cus_civil']." / ".$rows['cus_pp'],0,20),1,0,'L');
			}else
			{
				$pdf->Cell(109,6,"",1,0,'L');
			}
			
			$pdf->Cell(15,6,$rows['bh_code'],1,0,'L');
			

			switch ($rows['sale_pur']) {
    			case 0:
        		$pdf->Cell(15,6,'FC Purch',1,0,'L');
       			break;
       			case 1:
        		$pdf->Cell(15,6,'FC Sales',1,0,'L');
       			break;
       			case 2:
        		$pdf->Cell(15,6,'Tr Gain',1,0,'L');
       			break;
       			case 3:
        		$pdf->Cell(15,6,'Tr Loss',1,0,'L');
       			break;
       		}
			$d=date('d/m/Y', strtotime($rows['trans_date']));
			$pdf->Cell(23,6,$d,1,0,'C');
			$pdf->Cell(16,6,$rows['frm_amt']."",1,0,'R');
			$pdf->Cell(20,6,$rows['tr_ex_rate'],1,0,'R');

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
							$pdf->Cell(20,6,$rows['to_amt']."00",1,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(20,6,$rows['to_amt']."0",1,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(20,6,$tm1.".".$subtm2,1,0,'R');
					}
				}
				else{
							$pdf->Cell(20,6,$rows['to_amt'].".000",1,0,'R');
				}
				//----------------------------------------------------

				$tcc=$rows['to_cy'];
				$fcc=$rows['from_cy'];
				if($trans_type != 2)
				{
					if($trans_type  == 1)
					{
						$sqltt="SELECT * FROM currency WHERE `cy_code` = '$tcc'";
						$resultsettt = mysqli_query($mysqli,$sqltt);
						$rowstt = mysqli_fetch_array($resultsettt);
						$pdf->Cell(10,6,$rowstt['cy_name'],1,0,'C');
					}else {
						$sqltt="SELECT * FROM currency WHERE `cy_code` = '$fcc'";
						$resultsettt = mysqli_query($mysqli,$sqltt);
						$rowstt = mysqli_fetch_array($resultsettt);
						$pdf->Cell(10,6,$rowstt['cy_name'],1,0,'C');
					}
				}else {
					if($rows['sale_pur'] == '1'  || $rows['sale_pur'] == '3')
					{
						$sqltt="SELECT * FROM currency WHERE `cy_code` = '$tcc'";
						$resultsettt = mysqli_query($mysqli,$sqltt);
						$rowstt = mysqli_fetch_array($resultsettt);
						$pdf->Cell(10,6,$rowstt['cy_name'],1,0,'C');
					}else {
						$sqltt="SELECT * FROM currency WHERE `cy_code` = '$fcc'";
						$resultsettt = mysqli_query($mysqli,$sqltt);
						$rowstt = mysqli_fetch_array($resultsettt);
						$pdf->Cell(10,6,$rowstt['cy_name'],1,0,'C');
					}
				}


			$pdf->Cell(15,6,$rows['cmsn'],1,0,'R');

			//----------------------------------------------------
			$rr=round($g,3);
			if (strpos($rr, ".") != false) {

				$tm = explode(".", $rr);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(15,6,$rr."00",1,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(15,6,$rr."0",1,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(15,6,$tm1.".".$subtm2,1,0,'R');
					}
				}
				else{
							$pdf->Cell(15,6,$rr.".000",1,0,'R');
				}
				//----------------------------------------------------

			//$pdf->Cell(18,6,round($g,3),1,0,'R');

			$tot_to_amt=$tot_to_amt+$rows['to_amt'];
			$cmsn=$cmsn+$rows['cmsn'];
			$ga=$ga+$g;
			$tot_from_amt=$tot_from_amt+$rows['frm_amt'];
			$i++;
		}
		$pdf->Ln();
		if($currency == '0')
		{
			$pdf->Cell(225,6,"Total",1,0,'L');
		}else
		{
			$pdf->Cell(166,6,"Total",1,0,'L');
			//----------------------------------------------------
			if (strpos($tot_from_amt, ".") != false) {

			$tm = explode(".", $tot_from_amt);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(39,6,$tot_from_amt."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(39,6,$tot_from_amt."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(39,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(39,6,$tot_from_amt.".000",1,0,'R');
			}
			//----------------------------------------------------
			//$pdf->Cell(36,6,$tot_from_amt,1,0,'R');
			$pdf->Cell(20,6,"",1,0,'R');
		}
		

		//----------------------------------------------------
		if (strpos($tot_to_amt, ".") != false) {

			$tm = explode(".", $tot_to_amt);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(20,6,$tot_to_amt."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(20,6,$tot_to_amt."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(20,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(20,6,$tot_to_amt.".000",1,0,'R');
			}
			//----------------------------------------------------

		//$pdf->Cell(18,6,$tot_to_amt,1,0,'R');
		$pdf->Cell(10,6,"",1,0,'R');
		$pdf->Cell(15,6,round($cmsn,3),1,0,'R');
		$gg=round($ga,3);

		//----------------------------------------------------
		if (strpos($gg, ".") != false) {

			$tm = explode(".", $gg);
			$tm1= $tm[0]; // number
			$tm2= $tm[1]; // decimal
			$tmlen=strlen($tm2);
				if($tmlen < '3')
				{
					if($tmlen == '1')
					{
						$pdf->Cell(15,6,$gg."00",1,0,'R');
					}elseif ($tmlen == '2') {
						$pdf->Cell(15,6,$gg."0",1,0,'R');
					}
				}else {
					$subtm2=substr($tm2,0,3);
					$pdf->Cell(15,6,$tm1.".".$subtm2,1,0,'R');
				}
			}
			else{
						$pdf->Cell(15,6,$gg.".000",1,0,'R');
			}
			//----------------------------------------------------

		//$pdf->Cell(18,6,round($ga,3),1,0,'R');


$pdf->Output();

?>
