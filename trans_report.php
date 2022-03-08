<?php
	require_once('fpdf/fpdf.php');
	require_once('config.php');
	$date = date('d-m-Y');
	session_start();
	if(isset($_SESSION['from_date'])){
		$from_c=$_SESSION['from_c'];
		$from_date=$_SESSION['from_date'];
		$to_date=$_SESSION['to_date'];
		$bh_id=$_SESSION['bh_id'];

		//word Wrapping in fpdf

		class myPDF extends FPDF {
			function myCell($w,$h,$x,$t){

				$height = $h/3;
				$first = $height+2;
				$second = $height + $height + $height +3;
				$len = strlen($t);
				if($len > 15){
					$txt = str_split($t,15);
					$this->SetX($x);
					$this->cell($w,$first,$txt[0],'','','');
					$this->SetX($x);
					$this->cell($w,$second,$txt[1],'','','');
					$this->SetX($x);
					$this->cell($w,$h,'','LTRB',0,'L',0);
				}
			}
		}
		//word wrapping end
	}
	$getDet=mysqli_query($mysqli,"SELECT * FROM branch WHERE `bh_code`='$bh_id';");
	if($from_c == "0")
	{
		$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$from_date' AND '$to_date'";
	}else {
		$sql1="SELECT * FROM transaction,customer WHERE `cus_code` = `cus_id` AND `trans_date` BETWEEN '$from_date' AND '$to_date'AND from_cy='$from_c'";
	}
	//$sql2 = "SELECT * FROM bill_transactions";
	//$sql2 = "SELECT * FROM transaction";

	$resultset = mysqli_query($mysqli,$sql1) or die("database error:". mysqli_error($mysqli));
	$pdf = new FPDF('P', 'mm', 'A4' );

	//Word Wrapping
	$ppdf = new myPDF();
	$w =  30;
	$h =	6;
	$x = $ppdf->GetX();

	$pdf->AliasNbPages();
	$pdf->AddPage();

	//$pdf->Image('logo.png',15,7,35);
	$pdf->SetFont('Arial','B',13);
	$pdf->Ln();
	$pdf->Cell(75);
	$pdf->Cell(25,5,'Transaction History','','','C');
	$pdf->Cell(55);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(25,1,'From Date - '.$from_date.'','','','C');
	$pdf->Cell(-25,9,'To Date - '.$to_date.'','','','C');
	$pdf->Cell(25,17,' ','','','C');
	$pdf->Cell(-25,25,  '','','','C');

	$pdf->Line(10, 27, 200,27);


	if($getDet)
	{
			$det=mysqli_fetch_array($getDet);
			$pdf->Ln();
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(55,4,"Branch Name: ".$det['bh_name']);

			$pdf->Cell(80);
			$pdf->Cell(80,4,"Date: ".$date);
			$pdf->Ln();	$pdf->Ln();
			$pdf->Cell(70,4,"Branch ID: ".$det['bh_code']);$pdf->Ln();
			$pdf->Ln();



			$pdf->Cell(30);

			$pdf->Ln();
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(10,8,"Sl.No",1,0,'C');


			$pdf->Cell(35,8,"Cus. Name",1,0,'C');
			$pdf->Cell(27,8,"ID/PP",1,0,'C');
			$pdf->Cell(23,8,"Trans.Date",1,0,'C');
			$pdf->Cell(14,8,"F.Curr",1,0,'C');

			$pdf->Cell(14,8,"To.Curr",1,0,'C');
			$pdf->Cell(20,8,"From Amt",1,0,'C');
			$pdf->Cell(20,8,"To Amt",1,0,'C');
			$pdf->Cell(20,8,"Rate",1,0,'C');

			$pdf->Ln();
			$pdf->SetFont('Arial','',10);
			$i=1;
			$k=0;
			while($rows = mysqli_fetch_assoc($resultset)) {
					$pdf->Cell(10,6,$i,1,0,'C');

					//$name = $rows['cus_name'];
					//$ppdf->myCell($w,$h,$x,'$name');     //$rows['cus_name']
					//$pdf->Multicell(30,6,$name,1,0,'C',false);
					$pdf->Cell(35,6,$rows['cus_name'],1,0,'C');
					$pdf->Cell(27,6,$rows['cus_pp'],1,0,'C');
					$f_c=$rows['from_cy'];
					$t_c=$rows['to_cy'];
					$currency1=mysqli_query($mysqli,"SELECT * FROM currency WHERE `cy_code`='$f_c';");
					$c1=mysqli_fetch_array($currency1);
					$currency2=mysqli_query($mysqli,"SELECT * FROM currency WHERE `cy_code`='$t_c';");
					$c2=mysqli_fetch_array($currency2);
					$pdf->Cell(23,6,$rows['trans_date'],1,0,'C');
					$pdf->Cell(14,6,$c1['cy_name'],1,0,'C');
					$pdf->Cell(14,6,$c2['cy_name'],1,0,'C');

					$pdf->Cell(20,6,$rows['frm_amt'],1,0,'C');
					$pdf->Cell(20,6,$rows['to_amt'],1,0,'C');

					$pdf->Cell(20,6,$rows['f_t_rate'],1,0,'C');

					$pdf->Ln();
					$i++;
					$k++;
		}

		$pdf->Ln();	$pdf->Ln();
		$pdf->SetFont('Arial','',13);
		$pdf->Cell(55,4,"Total Transactions : ".$k);

}


$pdf->Output();

?>
