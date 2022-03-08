<?php
	require_once('fpdf/fpdf.php');
	require_once('config.php');
	$date = date('d-m-Y');
	$time = date("h:i:a");
	session_start();
	if(isset($_SESSION['bh_id'])){
		$bh_id=$_SESSION['bh_id'];
		$ref_num= $_SESSION['ref_num'];
	}
	$getDet=mysqli_query($mysqli,"SELECT * FROM branch WHERE `bh_code`='$bh_id';");
	$sql1=mysqli_query($mysqli,"SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND transaction.bh_code='$bh_id' AND transaction.tr_id='$ref_num'");

	$getDet1=mysqli_query($mysqli,"SELECT * FROM branch WHERE `bh_code`='$bh_id';");
	$sql11=mysqli_query($mysqli,"SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND transaction.bh_code='$bh_id' AND transaction.tr_id='$ref_num'");
	//$sql2 = mysqli_query($mysqli,"SELECT * FROM users WHERE us_code='$user'");
	//$sql22 = mysqli_query($mysqli,"SELECT * FROM users WHERE us_code='$user'");
	//$sql2 = "SELECT * FROM transaction";

//Amount  in Words
function numberTowords($numm)
{ 
	$ones = array( 
	1 => "One", 
	2 => "Two", 
	3 => "Three", 
	4 => "Four", 
	5 => "Five", 
	6 => "Six", 
	7 => "Seven", 
	8 => "Eight", 
	9 => "Nine", 
	10 => "Ten", 
	11 => "Eleven", 
	12 => "Twelve", 
	13 => "Thirteen", 
	14 => "Fourteen", 
	15 => "Fifteen", 
	16 => "Sixteen", 
	17 => "Seventeen", 
	18 => "Eighteen", 
	19 => "Nineteen" 
	); 
	
	$tens = array( 
	2 => "Twenty", 
	3 => "Thirty", 
	4 => "Forty", 
	5 => "Fifty", 
	6 => "Sixty", 
	7 => "Seventy", 
	8 => "Eighty", 
	9 => "Ninety" 
	); 
	$hundreds = array( 
	"Hundred", 
	"Thousand", 
	"Million", 
	"Billion", 
	"Trillion", 
	"Quadrillion" 
	); //limit t quadrillion 
	$num = $numm; 
	$num_arr = explode(".",$num); 
	
	$wholenum = $num_arr[0];
	$decnum = $num_arr[1]; 
	
	number_format($num,$decnum,".",",");
	
	//echo $decnum;
	$whole_arr = array_reverse(explode(",",$wholenum)); 
	krsort($whole_arr); 
	$rettxt = ""; 
	foreach($whole_arr as $key => $i){ 
		if($i < 20){ 
			$rettxt .= $ones[$i]; 
		}elseif($i < 100){ 
			$rettxt .= $tens[substr($i,0,1)]; 
			if(substr($i,1,1) != '0')
			$rettxt .= " ".$ones[substr($i,1,1)]; 
		}elseif($i < 1000){ 
			$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
			if(substr($i,1,1) != '0')
			{
				 
				if(substr($i,1,1) == '1')
				{
					$tenn=substr($i,1,1)."".substr($i,2,1);
					$rettxt .= " ".$ones[$tenn]; 
				}else{
					$rettxt .= " ".$tens[substr($i,1,1)];
				}
			}
			if(substr($i,2,1) != '0')
			{
				if(substr($i,1,1) == '1')
				{
					 
				}else
				{
					$rettxt .= " ".$ones[substr($i,2,1)];
				}
			}
		}elseif($i < 10000)
		{
				$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[1];
				if(substr($i,1,1) != '0')
				{
					$rettxt .= " ".$ones[substr($i,1,1)]." ".$hundreds[0];
				}
				if(substr($i,2,1) != '0')
				{
					if(substr($i,2,1) == '1')
					{
						$tenn=substr($i,2,1)."".substr($i,3,1);
						$rettxt .= " ".$ones[$tenn]; 
					}else
					{
						$rettxt .= " ".$tens[substr($i,2,1)];
					}
				}
				if(substr($i,3,1) != '0')
				{
					if(substr($i,2,1) == '1')
					{
					 
					}else
					{
						$rettxt .= " ".$ones[substr($i,3,1)]; 
					}
				}
		}			
		if($key > 0){ 
			$rettxt .= " ".$hundreds[$key]." "; 
		} 
	} 
	if($decnum > 0){ 
		$rettxt .= " and "; 

		$dec_arr = array_reverse(explode(",",$decnum)); 
		krsort($dec_arr); 
		//$rettxt = ""; 
		foreach($dec_arr as $key2 => $j){ 
			if($j < 20){ 
				if(substr($j,0,1) == '0' && substr($j,1,1)== '0')
				{
					$rettxt .= $ones[substr($j,2,1)]; 
				}else{
					
				}
				
			}elseif($j < 100){
					if(substr($j,0,1) == '0')
					{
						if(substr($j,1,1) > '1' && substr($j,2,1)== '0')
						{
							$rettxt .= " ".$tens[substr($j,1,1)]; 
						}
						else
						if(substr($j,1,1) > '1' && substr($j,2,1) != '0')
						{
							$rettxt .= $tens[substr($j,1,1)]; 
							$rettxt .= " ".$ones[substr($j,2,1)]; 
						}
					}
			}else{ 
				$rettxt .= $ones[substr($j,0,1)]." ".$hundreds[0]; 
				$rettxt .= " ".$tens[substr($j,1,1)]; 
				$rettxt .= " ".$ones[substr($j,2,1)]; 
			} 
			if($key2 > 0){ 
				$rettxt .= " ".$hundreds[$key2]." "; 
			} 
		}
		$rettxt .= " Baisa";

	} 
return $rettxt; 
}

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
	//$pdf->Cell(55);
	//$pdf->SetFont('Arial','',9);
	//$pdf->Cell(25,1,'From Date - '.$from_date.'','','','C');
	//$pdf->Cell(-25,9,'To Date - '.$to_date.'','','','C');
	//$pdf->Cell(25,17,' ','','','C');
	$pdf->Cell(-10);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(8,8,'','','1','C');

	//$pdf->Line(10, 15, 200,15);
$pdf->Ln();$pdf->Ln();

	if($getDet)
	{
			$det=mysqli_fetch_array($getDet);

			$rows=mysqli_fetch_array($sql1);

			$us_c=$rows['us_code'];
			$sql2 = mysqli_query($mysqli,"SELECT * FROM users WHERE us_code='$us_c'");

			$us=mysqli_fetch_array($sql2);
			$f_c=$rows['from_cy'];
			$t_c=$rows['to_cy'];
			$currency1=mysqli_query($mysqli,"SELECT * FROM currency WHERE `cy_code`='$f_c';");
			$c1=mysqli_fetch_array($currency1);
			$currency2=mysqli_query($mysqli,"SELECT * FROM currency WHERE `cy_code`='$t_c';");
			$c2=mysqli_fetch_array($currency2);


			$pdf->SetFont('Arial','',8);
			$pdf->SetTextColor(0,0,0);

			//$pdf->Cell(1,6,"",0,0,'L');
			//$pdf->Cell(8,4,"",0,0,'L');
			//$pdf->Cell(1);
			$pdf->SetFont('Arial','',8); //Font
			$pdf->Cell(40,6,$det['bh_name'].",".$det['bh_adrs'],0,0,'L');
			$pdf->cell(75);
			$pdf->SetFont('Arial','',10); //Font
			$pdf->Cell(35,6,"",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,6,"CUSTOMER COPY",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,6,'',0,0,'L');
			$pdf->Ln();

			if($rows['sale_pur'] == '1')
			{
				$pdf->Cell(28,8,"Foreign Currency ",0,0,'L');
				$pdf->SetFont('Arial','B',10); //Font
				$pdf->Cell(10,8,"Sales",0,0,'L');
				$pdf->SetFont('Arial','',10); //Font
				$pdf->Cell(5,8,"Receipt",0,0,'L');
				$pdf->Cell(1);
			}else {
				$pdf->Cell(28,8,"Foreign Currency ",0,0,'L');
				$pdf->SetFont('Arial','B',10); //Font
				$pdf->Cell(17,8,"Purchase",0,0,'L');
				$pdf->SetFont('Arial','',10); //Font
				$pdf->Cell(5,8,"Receipt",0,0,'L');
				$pdf->Cell(1);
			}

			$pdf->Cell(8,8,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,8,"",0,0,'L');
			$pdf->cell(48);
			$pdf->Cell(60,8,"Reference Number : ".$rows['tr_id'],1,0,'C');
			$pdf->Ln();

			$pdf->Cell(25,6,"Date",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,6,":",0,0,'L');
			$pdf->Cell(1);
			$nice_date = date('d-m-Y', strtotime( $rows['trans_date'] ));
			$pdf->Cell(30,6,$nice_date."  ".$rows['trans_time'],0,0,'L');
			$pdf->cell(10);
			$pdf->Cell(35,6,"",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,6,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,6,'',0,0,'L');
			$pdf->Ln();

			$pdf->Line(10, 57, 200,57);
			$pdf->Ln();

			$pdf->Cell(25,4,"Customer ID",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,$rows['cus_id'],0,0,'L');
			$pdf->cell(35);
			$pdf->Cell(35,4,"FC Amount",0,0,'L');
			$pdf->Cell(5);
			if($rows['sale_pur'] == '1')
			{
				$pdf->Cell(10,4,": (".$c2['cy_name'].") ",0,0,'L');
			}else {
				$pdf->Cell(10,4,": (".$c1['cy_name'].") ",0,0,'L');
			}

			$pdf->Cell(5);
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
							$pdf->Cell(30,4,$rows['frm_amt']."00",0,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,4,$rows['frm_amt']."0",0,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
					}
				}
				else{
							$pdf->Cell(30,4,$rows['frm_amt'].".000",0,0,'R');
				}
				//----------------------------------------------------
			$pdf->Ln();

			$pdf->Cell(25,4,"Customer Name",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,substr($rows['cus_name'],0,35),0,0,'L');
			$pdf->cell(35);
			$pdf->Cell(35,4,"Exchange Rate",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,4,":",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(30,4,$rows['tr_ex_rate'],0,0,'R');
			$pdf->Ln();

			$pdf->Cell(25,4,"Address",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,substr($rows['cus_addr'],0,35),0,0,'L');
			$pdf->cell(35);
			$pdf->Cell(35,4,"Equivallent",0,0,'L');
			$pdf->Cell(5);
			//$to_amt_name=$c2['cy_name'];
			$pdf->Cell(10,4,": (OMR) ",0,0,'L'); //.$to_amt_name.
			$pdf->Cell(5);
			//----------------------------------------------------
			if (strpos($rows['equvallent'], ".") != false) {

				$tm = explode(".", $rows['equvallent']);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,4,$rows['equvallent']."00",0,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,4,$rows['equvallent']."0",0,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
					}
				}
				else{
							$pdf->Cell(30,4,$rows['equvallent'].".000",0,0,'R');
				}
				//----------------------------------------------------
			$pdf->Ln();

			$pdf->Cell(25,4,"Civil ID / PP No.",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,$rows['cus_civil'] ." / ".$rows['cus_pp'] ,0,0,'L');
			$pdf->cell(35);
			$pdf->Cell(35,4,"Commision",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,4,": (OMR) ",0,0,'L');
			$pdf->Cell(5);
			//----------------------------------------------------
			if (strpos($rows['cmsn'], ".") != false) {

				$tm = explode(".", $rows['cmsn']);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,4,$rows['cmsn']."00",0,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,4,$rows['cmsn']."0",0,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
					}
				}
				else{
							$pdf->Cell(30,4,$rows['cmsn'].".000",0,0,'R');
				}
				//----------------------------------------------------
			$pdf->Ln();

			$pdf->Cell(25,4,"Tel. Number",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,$rows['cus_tel'] ,0,0,'L');
			$pdf->cell(35);
			$pdf->Cell(35,4,"Rounding Amount",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,4,":",0,0,'L');
			$pdf->Cell(5);
			//----------------------------------------------------
			if (strpos($rows['round'], ".") != false) {

				$tm = explode(".", $rows['round']);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,4,$rows['round']."00",0,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,4,$rows['round']."0",0,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
					}
				}
				else{
							$pdf->Cell(30,4,$rows['round'].".000",0,0,'R');
				}
				//----------------------------------------------------
			$pdf->Ln();


			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(25,4,"Nationality",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,$rows['nationality'],0,0,'L');
			$pdf->cell(8);
			$pdf->SetTextColor(256,0,0);
			$pdf->Cell(30,4,"",0,0,'L'); //FC Purchase Calculation : FC Amt * Exchange Rate - Commision OMR
			$pdf->Ln();

			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(25,4,"Purpose/Source",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,$rows['purpose']." / ".$rows['source'],0,0,'L');
			$pdf->cell(10);
			$pdf->Cell(35,4,"",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,4,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,'',0,0,'L');
			$pdf->Ln();

			$pdf->Line(10, 90, 200,90);
			$pdf->Ln();

			$pdf->Cell(25,3,"",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,3,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,3,'',0,0,'L');
			$pdf->cell(35);
			$pdf->Cell(35,3,"TOTAL",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,3,": (OMR) ",0,0,'L');//$to_amt_name
			$pdf->Cell(6);
			$numm=$rows['to_amt'];
			//----------------------------------------------------
			if (strpos($numm, ".") != false) {

				$tm = explode(".", $numm);
				$tm1= $tm[0]; // number
				$tm2= $tm[1]; // decimal
				$tmlen=strlen($tm2);
					if($tmlen < '3')
					{
						if($tmlen == '1')
						{
							$pdf->Cell(30,3,$numm."00",0,0,'R');
						}elseif ($tmlen == '2') {
							$pdf->Cell(30,3,$numm."0",0,0,'R');
						}
					}else {
						$subtm2=substr($tm2,0,3);
						$pdf->Cell(30,3,$tm1.".".$subtm2,0,0,'R');
					}
				}
				else{
							$pdf->Cell(30,3,$numm.".000",0,0,'R');
							$nn=".0";
							$numm=$numm.$nn;
				}
				//----------------------------------------------------
			$pdf->Ln();


			$pdf->Line(10, 97, 200,97);
			$pdf->Ln();

			$pdf->Cell(25,4,"Amount in Words",0,0,'L');//
			$pdf->Cell(2);
			$pdf->Cell(8,4,":",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,"Rial Omani ".numberTowords($numm)." Only",0,0,'L'); //.
			$pdf->cell(10);
			$pdf->Cell(35,4,"",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,4,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,'',0,0,'L');
			$pdf->Ln();

			$pdf->Cell(25,4,"I have read and verified the data entered and found it to be correct as per the information provided by me.",0,0,'L');
			$pdf->Cell(2);
			$pdf->Cell(8,4,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,'',0,0,'L');
			$pdf->cell(10);
			$pdf->Cell(35,4,"",0,0,'L');
			$pdf->Cell(5);
			$pdf->Cell(10,4,"",0,0,'L');
			$pdf->Cell(1);
			$pdf->Cell(30,4,'',0,0,'L');
			$pdf->Ln();
			$pdf->Ln();




			$pdf->Cell(15);
			$pdf->Cell(25,6,"",0,0,'C');
			$pdf->Cell(34);
			$pdf->Cell(25,6,$us['us_name'],0,0,'C');
			$pdf->Cell(35);
			$pdf->Cell(25,6,"",0,0,'C');
			$pdf->Ln();

			$pdf->Cell(15);
			$pdf->Cell(25,2,"--------------------------",0,0,'C');
			$pdf->Cell(35);
			$pdf->Cell(25,2,"--------------------------",0,0,'C');
			$pdf->Cell(35);
			$pdf->Cell(25,2,"--------------------------------",0,0,'C');
			$pdf->Ln();

			$pdf->Cell(14);
			$pdf->Cell(25,4,"Customer's Signature/-",0,0,'C');
			$pdf->Cell(36);
			$pdf->Cell(25,4,"Prepared By",0,0,'C');
			$pdf->Cell(34);
			$pdf->Cell(25,4,"Cash Received by",0,0,'C');
			$pdf->Ln(13);
			$pdf->Line(0, 150, 210,150);
			$pdf->Ln(10);

//----------------------------------------------------------------------------------------------------//

		}



		$pdf->Image('images/money.jpg',25,160,-175);
		$pdf->Ln();

		$pdf->SetFont('Arial','B',8);
		$pdf->SetTextColor(10,81,174);
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

		//$pdf->Line(10, 15, 200,15);

		$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
			if($getDet1)
			{
				$det=mysqli_fetch_array($getDet1);
				$rows=mysqli_fetch_array($sql11);

				$us_c=$rows['us_code'];
				$sql22 = mysqli_query($mysqli,"SELECT * FROM users WHERE us_code='$us_c'");

				$us1=mysqli_fetch_array($sql22);
				$f_c=$rows['from_cy'];
				$t_c=$rows['to_cy'];
				$currency1=mysqli_query($mysqli,"SELECT * FROM currency WHERE `cy_code`='$f_c';");
				$c1=mysqli_fetch_array($currency1);
				$currency2=mysqli_query($mysqli,"SELECT * FROM currency WHERE `cy_code`='$t_c';");
				$c2=mysqli_fetch_array($currency2);

				$pdf->SetFont('Arial','',8);
				$pdf->SetTextColor(0,0,0);

				//$pdf->Cell(1,6,"",0,0,'L');
				//$pdf->Cell(8,4,"",0,0,'L');
				//$pdf->Cell(1);
				$pdf->SetFont('Arial','',8); //Font
				$pdf->Cell(40,6,$det['bh_name'].",".$det['bh_adrs'],0,0,'L');
				$pdf->cell(75);
				$pdf->SetFont('Arial','',10); //Font
				$pdf->Cell(35,6,"",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,6,"OFFICE COPY",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,6,'',0,0,'L');
				$pdf->Ln();


				if($rows['sale_pur'] == '1')
				{
					$pdf->Cell(28,8,"Foreign Currency ",0,0,'L');
					$pdf->SetFont('Arial','B',10); //Font
					$pdf->Cell(10,8,"Sales",0,0,'L');
					$pdf->SetFont('Arial','',10); //Font
					$pdf->Cell(5,8,"Receipt",0,0,'L');
					$pdf->Cell(1);
				}else {
					$pdf->Cell(28,8,"Foreign Currency ",0,0,'L');
					$pdf->SetFont('Arial','B',10); //Font
					$pdf->Cell(17,8,"Purchase",0,0,'L');
					$pdf->SetFont('Arial','',10); //Font
					$pdf->Cell(5,8,"Receipt",0,0,'L');
					$pdf->Cell(1);
				}
				//$pdf->Cell(2);
				$pdf->Cell(8,8,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,8,"",0,0,'L');
				$pdf->cell(48);
				$pdf->Cell(60,8,"Reference Number : ".$rows['tr_id'],1,0,'C');
				$pdf->Ln();

				$pdf->Cell(25,6,"Date",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,6,":",0,0,'L');
				$pdf->Cell(1);
				$nice_date = date('d-m-Y', strtotime( $rows['trans_date'] ));
				$pdf->Cell(30,6,$nice_date."  ".$rows['trans_time'],0,0,'L');
				$pdf->cell(10);
				$pdf->Cell(35,6,"",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,6,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,6,'',0,0,'L');
				$pdf->Ln();

				$pdf->Line(10, 207, 200,207);
				$pdf->Ln();

				$pdf->Cell(25,4,"Customer ID",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,$rows['cus_id'],0,0,'L');
				$pdf->cell(35);
				$pdf->Cell(35,4,"FC Amount",0,0,'L');
				$pdf->Cell(5);
				if($rows['sale_pur'] == '1')
				{
					$pdf->Cell(10,4,": (".$c2['cy_name'].") ",0,0,'L');
				}else {
					$pdf->Cell(10,4,": (".$c1['cy_name'].") ",0,0,'L');
				}
				$pdf->Cell(5);
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
								$pdf->Cell(30,4,$rows['frm_amt']."00",0,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(30,4,$rows['frm_amt']."0",0,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
						}
					}
					else{
								$pdf->Cell(30,4,$rows['frm_amt'].".000",0,0,'R');
					}
					//----------------------------------------------------
				$pdf->Ln();

				$pdf->Cell(25,4,"Customer Name",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,substr($rows['cus_name'],0,35),0,0,'L');
				$pdf->cell(35);
				$pdf->Cell(35,4,"Exchange Rate",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,4,":",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(30,4,$rows['tr_ex_rate'],0,0,'R');
				$pdf->Ln();

				$pdf->Cell(25,4,"Address",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,substr($rows['cus_addr'],0,35),0,0,'L');
				$pdf->cell(35);
				$pdf->Cell(35,4,"Equivallent",0,0,'L');
				$pdf->Cell(5);

				if($rows['sale_pur'] == '1')
				{
					$to_amt_name=$c1['cy_name'];
				}else {
					$to_amt_name=$c2['cy_name'];
				}
				$pdf->Cell(10,4,": (".$to_amt_name.") ",0,0,'L');


				$pdf->Cell(5);
				//----------------------------------------------------
				if (strpos($rows['equvallent'], ".") != false) {

					$tm = explode(".", $rows['equvallent']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(30,4,$rows['equvallent']."00",0,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(30,4,$rows['equvallent']."0",0,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
						}
					}
					else{
								$pdf->Cell(30,4,$rows['equvallent'].".000",0,0,'R');
					}
					//----------------------------------------------------
				$pdf->Ln();

				$pdf->Cell(25,4,"Civil ID / PP No.",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,$rows['cus_civil'] ." / ".$rows['cus_pp'],0,0,'L');
				$pdf->cell(35);
				$pdf->Cell(35,4,"Commision",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,4,": (OMR) ",0,0,'L');
				$pdf->Cell(5);
				//----------------------------------------------------
				if (strpos($rows['cmsn'], ".") != false) {

					$tm = explode(".", $rows['cmsn']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(30,4,$rows['cmsn']."00",0,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(30,4,$rows['cmsn']."0",0,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
						}
					}
					else{
								$pdf->Cell(30,4,$rows['cmsn'].".000",0,0,'R');
					}
					//----------------------------------------------------
				$pdf->Ln();

				$pdf->Cell(25,4,"Tel. Number",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,$rows['cus_tel'],0,0,'L');
				$pdf->cell(35);
				$pdf->Cell(35,4,"Rounding Amount",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,4,":",0,0,'L');
				$pdf->Cell(5);
				//----------------------------------------------------
				if (strpos($rows['round'], ".") != false) {

					$tm = explode(".", $rows['round']);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(30,4,$rows['round']."00",0,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(30,4,$rows['round']."0",0,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(30,4,$tm1.".".$subtm2,0,0,'R');
						}
					}
					else{
								$pdf->Cell(30,4,$rows['round'].".000",0,0,'R');
					}
					//----------------------------------------------------
				$pdf->Ln();

				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(25,4,"Nationality",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,$rows['nationality'],0,0,'L');
				$pdf->cell(8);
				$pdf->SetTextColor(256,0,0);
				$pdf->Cell(30,4,"",0,0,'L'); //FC Purchase Calculation : FC Amt * Exchange Rate - Commision OMR
				$pdf->Ln();

				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(25,4,"Purpose/Source",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,":",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,$rows['purpose']." / ".$rows['source'],0,0,'L');
				$pdf->cell(10);
				$pdf->Cell(35,4,"",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,4,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,'',0,0,'L');
				$pdf->Ln();

				$pdf->Line(10, 241, 200,241);
				$pdf->Ln();

				$pdf->Cell(25,3,"",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,3,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,3,'',0,0,'L');
				$pdf->cell(35);
				$pdf->Cell(35,3,"TOTAL",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,3,": (".$to_amt_name.") ",0,0,'L');
				$pdf->Cell(6);
				$numm=$rows['to_amt'];
				//----------------------------------------------------
				if (strpos($numm, ".") != false) {

					$tm = explode(".", $numm);
					$tm1= $tm[0]; // number
					$tm2= $tm[1]; // decimal
					$tmlen=strlen($tm2);
						if($tmlen < '3')
						{
							if($tmlen == '1')
							{
								$pdf->Cell(30,3,$numm."00",0,0,'R');
							}elseif ($tmlen == '2') {
								$pdf->Cell(30,3,$numm."0",0,0,'R');
							}
						}else {
							$subtm2=substr($tm2,0,3);
							$pdf->Cell(30,3,$tm1.".".$subtm2,0,0,'R');
						}
					}
					else{
								$pdf->Cell(30,3,$numm.".000",0,0,'R');
								$nn=".0";
								$numm=$numm.$nn;
					}
					//----------------------------------------------------
				$pdf->Ln();


				$pdf->Line(10, 248, 200,248);
				$pdf->Ln();

				$pdf->Cell(25,4,"Amount in Words :",0,0,'L');//Amount in Words :
				$pdf->Cell(2);
				$pdf->Cell(8,4,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,"Rial Omani ".numberTowords($numm)." Only",0,0,'L'); //Rial Omani ".numberTowords("$numm")." Only
				$pdf->cell(10);
				$pdf->Cell(35,4,"",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,4,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,'',0,0,'L');
				$pdf->Ln();

				$pdf->Cell(25,4,"I have read and verified the data entered and found it to be correct as per the information provided by me.",0,0,'L');
				$pdf->Cell(2);
				$pdf->Cell(8,4,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,'',0,0,'L');
				$pdf->cell(10);
				$pdf->Cell(35,4,"",0,0,'L');
				$pdf->Cell(5);
				$pdf->Cell(10,4,"",0,0,'L');
				$pdf->Cell(1);
				$pdf->Cell(30,4,'',0,0,'L');
				$pdf->Ln();
				$pdf->Ln();




				$pdf->Cell(15);
				$pdf->Cell(25,6,"",0,0,'C');
				$pdf->Cell(34);
				$pdf->Cell(25,6,$us['us_name'],0,0,'C');
				$pdf->Cell(35);
				$pdf->Cell(25,6,"",0,0,'C');
				$pdf->Ln();

				$pdf->Cell(15);
				$pdf->Cell(25,2,"--------------------------",0,0,'C');
				$pdf->Cell(35);
				$pdf->Cell(25,2,"--------------------------",0,0,'C');
				$pdf->Cell(35);
				$pdf->Cell(25,2,"--------------------------------",0,0,'C');
				$pdf->Ln();

				$pdf->Cell(14);
				$pdf->Cell(25,4,"Customer's Signature/-",0,0,'C');
				$pdf->Cell(36);
				$pdf->Cell(25,4,"Prepared By",0,0,'C');
				$pdf->Cell(34);
				$pdf->Cell(25,4,"Cash Received by",0,0,'C');
				$pdf->Ln();









}


$pdf->Output();

?>
