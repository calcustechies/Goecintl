<?php
	include'head.php';
	include'config.php';
	$query5 = mysqli_query($mysqli,"SELECT `tr_id` FROM transaction ORDER BY sr_no DESC");
	$row5 = mysqli_fetch_assoc($query5);
	$maxcode= $row5['tr_id'];
	$newcode = $maxcode+1;
	date_default_timezone_set("Asia/Muscat");

	$query43="SELECT iso3,name FROM country  ";
	$rs43=mysqli_query($mysqli,$query43);
	
?>


<div id="wrapper">
	<?php
		include'side_bar.php';
		//retrieve avaliable currencies
		$query6="SELECT cy_code,cy_name FROM currency WHERE cy_frz='0'";
		$rs4=mysqli_query($mysqli,$query6);
		$query44="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' and cy_frz='0' and cy_code='2'";
		$rs44=mysqli_query($mysqli,$query44);
		//$query44="SELECT cy_code,cy_name FROM currency WHERE bh_code='$bh_id' and cy_frz='0'";
		//$rs44=mysqli_query($mysqli,$query44);
		
		updateXML();
		updateXML2();
		updateXML3($_SESSION['bh_id']);
		updateXML4($_SESSION['bh_id']);
	?>

	<script>

		function myFunction()
		{
			document.getElementById("customer_country").disabled = false;
		}

	$(function(){
		$("#from_amt").keypress(function (e) {
			if (e.keyCode == 13) {
				document.getElementById("rate").focus();
					return false;
				}
			});
	});
	$(function(){
		$("#rate").keypress(function (e) {
			if (e.keyCode == 13) {
				document.getElementById("cmsn").focus();
					return false;
				}
			});
	});
	$(function(){
		$("#tel").keypress(function (e) {
			if (e.keyCode == 13) {
				document.getElementById("from_c").focus();
				}
			});
	});
	$(function(){
		$("#cmsn").keypress(function (e) {
			if (e.keyCode == 13) {
				document.getElementById("to_amt").focus();
					return false;
				}
			});
	});
	$(function(){
		$("#to_amt").keypress(function (e) {
			if (e.keyCode == 13) {
				document.getElementById("tot").focus();
					return false;
				}
			});
	});
	//$(function(){
		//$("#tot").keypress(function (e) {
			//if (e.keyCode == 13) {
				//return false;
				//}
			//});
	//});

	function autofill(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {

			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "customerdetail.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var customer = xml.getElementsByTagName('customer');
			var getitemcode=document.getElementById('pp').value;

			for (var i = 0; i < customer.length; i++) {

				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var itemname = customer[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
				var address=customer[i].getElementsByTagName("address")[0].childNodes[0].nodeValue;
				var itemcode=customer[i].getElementsByTagName("code")[0].childNodes[0].nodeValue;
				var telephone=customer[i].getElementsByTagName("telephone")[0].childNodes[0].nodeValue;
				var pp=customer[i].getElementsByTagName("pp")[0].childNodes[0].nodeValue;
				var civil=customer[i].getElementsByTagName("civil")[0].childNodes[0].nodeValue;
				var bank=customer[i].getElementsByTagName("bank")[0].childNodes[0].nodeValue;

				if(pp==getitemcode){
					// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("cus_id").value=itemcode;
					document.getElementById("cus_name").value=itemname;
					document.getElementById("cus_addr").value=address;
					document.getElementById("tel").value=telephone;
					document.getElementById("cus_t").value=bank;
					document.getElementById("civil").value=civil;
					document.getElementById("customer_country").disabled = true;
					if(bank == '1')
					{
						document.getElementById("bk").innerHTML = "Bank Customer";
					}else
					{
						document.getElementById("bk").innerHTML = "Normal Customer";
					}
				}

			}
		}
	}

	//Phone number search

	function autofill2(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {

			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "customerdetail.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var customer = xml.getElementsByTagName('customer');
			var getitemcode=document.getElementById('tel').value;

			for (var i = 0; i < customer.length; i++) {

				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var itemname = customer[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
				var address=customer[i].getElementsByTagName("address")[0].childNodes[0].nodeValue;
				var itemcode=customer[i].getElementsByTagName("code")[0].childNodes[0].nodeValue;
				var telephone=customer[i].getElementsByTagName("telephone")[0].childNodes[0].nodeValue;
				var pp=customer[i].getElementsByTagName("pp")[0].childNodes[0].nodeValue;
				var civil=customer[i].getElementsByTagName("civil")[0].childNodes[0].nodeValue;
				var bank=customer[i].getElementsByTagName("bank")[0].childNodes[0].nodeValue;

				if(telephone==getitemcode){

					// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("cus_id").value=itemcode;
					document.getElementById("cus_name").value=itemname;
					document.getElementById("cus_addr").value=address;
					//document.getElementById("tel").value=telephone;
					document.getElementById("cus_t").value=bank;
					document.getElementById("pp").value=pp;
					document.getElementById("civil").value=civil;
					document.getElementById("customer_country").disabled = true;

					if(bank == '1')
					{
						document.getElementById("bk").innerHTML = "Bank Customer";
					}else
					{
						document.getElementById("bk").innerHTML = "Normal Customer";
					}
				}

			}
		}
	}


	//Civil number search

	function autofill3(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {

			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "customerdetail.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var customer = xml.getElementsByTagName('customer');
			var getitemcode=document.getElementById('civil').value;

			for (var i = 0; i < customer.length; i++) {


				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var itemname = customer[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
				var address=customer[i].getElementsByTagName("address")[0].childNodes[0].nodeValue;
				var itemcode=customer[i].getElementsByTagName("code")[0].childNodes[0].nodeValue;
				var telephone=customer[i].getElementsByTagName("telephone")[0].childNodes[0].nodeValue;
				var pp=customer[i].getElementsByTagName("pp")[0].childNodes[0].nodeValue;
				var civil=customer[i].getElementsByTagName("civil")[0].childNodes[0].nodeValue;
				var bank=customer[i].getElementsByTagName("bank")[0].childNodes[0].nodeValue;

				if(civil==getitemcode){


					// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("cus_id").value=itemcode;
					document.getElementById("cus_name").value=itemname;
					document.getElementById("cus_addr").value=address;
					document.getElementById("tel").value=telephone;
					document.getElementById("cus_t").value=bank;
					document.getElementById("pp").value=pp;
					document.getElementById("customer_country").disabled = true;
					//document.getElementById("civil").value=civil;

					if(bank == '1')
					{
						document.getElementById("bk").innerHTML = "Bank Customer";
					}else
					{
						document.getElementById("bk").innerHTML = "Normal Customer";
					}
				}

			}
		}
	}




	function namesum(){


	//alert("hello");
		  var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	 function reportStatus() {
		if (oXHR.readyState == 4)               // REQUEST COMPLETED.
		  getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
	 oXHR.onreadystatechange = reportStatus;
	  // true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
	 oXHR.open("GET", "customerdetail.xml", true);
	 oXHR.send();
	 function getXmlData(xml) {        // THE PARENT DIV.

			var customer = xml.getElementsByTagName('customer');
			var getitemcode=document.getElementById('cus_name').value;

			for (var i = 0; i < customer.length; i++) {

				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var itemname = customer[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
				var address=customer[i].getElementsByTagName("address")[0].childNodes[0].nodeValue;
							var itemcode=customer[i].getElementsByTagName("code")[0].childNodes[0].nodeValue;
							var telephone=customer[i].getElementsByTagName("telephone")[0].childNodes[0].nodeValue;
							var pp=customer[i].getElementsByTagName("pp")[0].childNodes[0].nodeValue;
							var civil=customer[i].getElementsByTagName("civil")[0].childNodes[0].nodeValue;
							var bank=customer[i].getElementsByTagName("bank")[0].childNodes[0].nodeValue;

				if(itemname==getitemcode){
					// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("cus_id").value=itemcode;

					document.getElementById("cus_addr").value=address;
					document.getElementById("tel").value=telephone;
					document.getElementById("pp").value=pp;
					document.getElementById("civil").value=civil;
					document.getElementById("cus_t").value=bank;
					document.getElementById("customer_country").disabled = true;
					if(bank == '1')
					{
						document.getElementById("bk").innerHTML = "Bank Customer";
					}else
					{
						document.getElementById("bk").innerHTML = "Normal Customer";
					}



				}

			}

		}
	}

	function calc_rate(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "ratedetail.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var rates = xml.getElementsByTagName('rates');
			var fromc=document.getElementById('from_c').value;
			//var to_c=document.getElementById('to_c').value;
			var from_amt=document.getElementById('from_amt').value;
			var cmsn=document.getElementById('cmsn').value;
			var t_amt=document.getElementById('tot').value;
			//var count="0";

			for (var i = 0; i < rates.length; i++) {

				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var tr_rate_sr_no=rates[i].getElementsByTagName("tr_rate_sr_no")[0].childNodes[0].nodeValue;
				var frm_cy = rates[i].getElementsByTagName("from_cy")[0].childNodes[0].nodeValue;
				var cy_ex_rate=rates[i].getElementsByTagName("cy_ex_rate")[0].childNodes[0].nodeValue;
				var cy_pur_rate=rates[i].getElementsByTagName("cy_pur_rate")[0].childNodes[0].nodeValue;
				var cy_sale_rate=rates[i].getElementsByTagName("cy_sale_rate")[0].childNodes[0].nodeValue;


				//var p_r=cy_pur_rate;
				//var s_r=cy_sale_rate

				if(frm_cy == fromc){
									// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("rate").value=cy_pur_rate;
					var eq_amt = from_amt*cy_pur_rate;
					document.getElementById("tr_rate_sr_no").value=tr_rate_sr_no;
					var eq=document.getElementById("to_amt").value=Math.round((eq_amt)*1000)/1000;
					var to_amt = eq-cmsn;
					document.getElementById("tot").value=Math.round((to_amt)*1000)/1000;
					document.getElementById("ex_rate").value=cy_ex_rate;
					document.getElementById("r").value="0";

					//document.getElementById("sale_rate").value="2";
					//document.getElementById("pur_rate").value="2";
					//document.getElementById("tr_rate_sr_no").value=tr_rate_sr_no;

					//exit();
				}
				else
				{
					//document.getElementById("sub").disabled = true;
					document.getElementById("rate").value=0;
					document.getElementById("to_amt").value=0;
					document.getElementById("r").value="0";
				}
			}
				/*	if(fromc == to_c)
					{
						document.getElementById("sub").disabled = true;
					} 	*/

		}

	}

	//CALCULATION
	function calc_rate1(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "ratedetail.xml", true);
		oXHR.send();
		function getXmlData() {        // THE PARENT DIV.

			var from_amt=document.getElementById('from_amt').value;
			var cy_rate=document.getElementById('rate').value;
			var cmsn=document.getElementById('cmsn').value;
				if(cy_rate != '0')
				{
					var eq_amt = from_amt * cy_rate;
					var to_amt =eq_amt-cmsn;
					document.getElementById("tot").value=Math.round((to_amt)*1000)/1000;
					document.getElementById("to_amt").value=Math.round((eq_amt)*1000)/1000;
					document.getElementById("r").value="0";

				}else {
					document.getElementById("to_amt").value=0;
					document.getElementById("r").value="0";
				}

		}
	}

	//CALCULATION2 --------------------------------------------------
	function calc_rate2(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "ratedetail.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var rates = xml.getElementsByTagName('rates');

			var fromc=document.getElementById('from_c').value;
			//var to_c=document.getElementById('to_c').value;
			var from_amt=document.getElementById('from_amt').value;
			var cy_rate=document.getElementById('rate').value;
			var cmsn=document.getElementById('cmsn').value;
			var cus_id=document.getElementById('cus_id').value;
			var cus_type=document.getElementById('cus_t').value;
			var cmsn=document.getElementById('cmsn').value;

			for (var i = 0; i < rates.length; i++) {

				var frm_cy2 = rates[i].getElementsByTagName("from_cy")[0].childNodes[0].nodeValue;
				//var to_cy2=rates[i].getElementsByTagName("to_cy")[0].childNodes[0].nodeValue;
				var cy_ex_rate=rates[i].getElementsByTagName("cy_ex_rate")[0].childNodes[0].nodeValue;
				var cy_pur_rate=rates[i].getElementsByTagName("cy_pur_rate")[0].childNodes[0].nodeValue;
				var cy_sale_rate=rates[i].getElementsByTagName("cy_sale_rate")[0].childNodes[0].nodeValue;

				if(frm_cy2 == fromc){

								if(cy_rate > cy_ex_rate)
								{
										alert("Purchase Rate greater than exchange rate");
										document.getElementById("rate").value=cy_rate;
										var eq_amt2=from_amt*cy_rate;
										var to_amt2 = eq_amt2-cmsn;
										document.getElementById("to_amt").value=Math.round((eq_amt2)*1000)/1000;
										document.getElementById("tot").value=Math.round((to_amt2)*1000)/1000;
										document.getElementById("r").value="0";
								}
								else
								{
										document.getElementById("rate").value=cy_rate;
										var eq_amt2=from_amt*cy_rate;
										var to_amt2 = eq_amt2-cmsn;
										document.getElementById("to_amt").value=Math.round((eq_amt2)*1000)/1000;
										document.getElementById("tot").value=Math.round((to_amt2)*1000)/1000;
										document.getElementById("r").value="0";
								}

				}

			}
		}
	}
//stock
	function calc_stock(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		var bh_c=document.getElementById('bh_c').value;
		oXHR.open("GET", "stock"+bh_c+"detail.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var stk = xml.getElementsByTagName('stock');
			var fromc=document.getElementById('from_c').value;
			var bh_c=document.getElementById('bh_c').value;
			//var to_c=document.getElementById('to_c').value;
			//var count="0";

			for (var i = 0; i < stk.length; i++) {

				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var fc_cy=stk[i].getElementsByTagName("fc_cy")[0].childNodes[0].nodeValue;
				var fc_amt = stk[i].getElementsByTagName("fc_amt")[0].childNodes[0].nodeValue;
				//var bh_code = stk[i].getElementsByTagName("bh_code")[0].childNodes[0].nodeValue;


				//var p_r=cy_pur_rate;
				//var s_r=cy_sale_rate

					
				if(fc_cy == fromc){
					
					//if(bh_code == bh_c)
					//{
									// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("stk_v").value=roundTo(fc_amt, 4);

					

				}
				
				

			}

		}

	}

	function roundTo(n, digits) {

    var multiplicator = Math.pow(1000, digits);
    var n = parseFloat((n * multiplicator).toFixed(11));
    return (Math.round(n) / multiplicator).toFixed(3);
	}
	
	//avgerage exchange rate
	function calc_avg(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		var bh_c=document.getElementById('bh_c').value;
		oXHR.open("GET", "avg"+bh_c+"exchange.xml", true);
		oXHR.send();
		function getXmlData(xml) {        // THE PARENT DIV.

			var stk = xml.getElementsByTagName('avg');
			var fromc=document.getElementById('from_c').value;
			//var to_c=document.getElementById('to_c').value;
			//var count="0";
			var bh_c=document.getElementById('bh_c').value;

			for (var i = 0; i < stk.length; i++) {

				// CREATE CHILD DIVS INSIDE THE PARENT DIV.
				var fc_cy=stk[i].getElementsByTagName("fc_cy")[0].childNodes[0].nodeValue;
				var avg_ex = stk[i].getElementsByTagName("avg_ex")[0].childNodes[0].nodeValue;
				//var bh_code = stk[i].getElementsByTagName("bh_code")[0].childNodes[0].nodeValue;


				//var p_r=cy_pur_rate;
				//var s_r=cy_sale_rate

					
				if(fc_cy == fromc){
					//if(bh_code == bh_c)
					//{
									// ADD THE CHILD TO THE PARENT DIV.
					document.getElementById("avg_ex").value=Math.round((avg_ex)*10000)/10000;

	
					//document.getElementById("sale_rate").value="2";
					//document.getElementById("pur_rate").value="2";
					//document.getElementById("tr_rate_sr_no").value=tr_rate_sr_no;

					//exit();
					//}else
					//{
						//document.getElementById("avg_ex").value="0";
					//}
				}
				
				

			}
				/*	if(fromc == to_c)
					{
						document.getElementById("sub").disabled = true;
					} 	*/

		}

	}

	//REVERSE CALCULATION --------------------------------------------------
	function rev_cal(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData();      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "ratedetail.xml", true);
		oXHR.send();
		function getXmlData() {        // THE PARENT DIV.

			//var rates = xml.getElementsByTagName('rates');

			//var fromc=document.getElementById('from_c').value;
			//var to_c=document.getElementById('to_c').value;
			var from_amt=document.getElementById('from_amt').value;
			var cy_rate=document.getElementById('rate').value;
			var to_amt=document.getElementById('to_amt').value;
			var cmsn=document.getElementById('cmsn').value;
			//var cus_id=document.getElementById('cus_id').value;
			//var cus_type=document.getElementById('cus_t').value;

			var frm_amt2 = to_amt/cy_rate;
			document.getElementById("from_amt").value=Math.round((frm_amt2)*1000)/1000;
			var total_v= to_amt-cmsn;
			document.getElementById("tot").value=Math.round((total_v)*1000)/1000;
			document.getElementById("r").value="0";

		}
	}

	//COMMISSION FUNCTION --------------------------------------------------
	function cmsn_fun(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData();      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "ratedetail.xml", true);
		oXHR.send();
		function getXmlData() {        // THE PARENT DIV.

			//var rates = xml.getElementsByTagName('rates');

			//var fromc=document.getElementById('from_c').value;
			//var to_c=document.getElementById('to_c').value;
			//var from_amt=document.getElementById('from_amt').value;
			//var cy_rate=document.getElementById('rate').value;
			var to_amt=document.getElementById('to_amt').value;
			var cmsn=document.getElementById('cmsn').value;
			//var cus_id=document.getElementById('cus_id').value;
			//var cus_type=document.getElementById('cus_t').value;

			var total = to_amt-cmsn;
			document.getElementById("tot").value=Math.round((total)*1000)/1000;
			document.getElementById("r").value="0";

		}
	}

	//TOTAL FUNCTION --------------------------------------------------
	function tot_fun(){

		var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		function reportStatus() {
			if (oXHR.readyState == 4)               // REQUEST COMPLETED.
				getXmlData();      // ALL SET. NOW SHOW XML DATA.
		}
		oXHR.onreadystatechange = reportStatus;
		// true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
		oXHR.open("GET", "ratedetail.xml", true);
		oXHR.send();
		function getXmlData() {        // THE PARENT DIV.

			//var rates = xml.getElementsByTagName('rates');

			//var fromc=document.getElementById('from_c').value;
			//var to_c=document.getElementById('to_c').value;
			//var from_amt=document.getElementById('from_amt').value;
			//var cy_rate=document.getElementById('rate').value;
			var to_amt=document.getElementById('to_amt').value;
			var cmsn=document.getElementById('cmsn').value;
			var total=document.getElementById('tot').value;
			//var cus_id=document.getElementById('cus_id').value;
			//var cus_type=document.getElementById('cus_t').value;
			var round1=to_amt-cmsn;
			var round = total-round1;
			document.getElementById("r").value=Math.round((round)*1000)/1000;

		}
	}



	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}

/*
	$('input').on("keypress", function(e) {
            /* ENTER PRESSED*/
            /*if (e.keyCode == 13) {
                /* FOCUS ELEMENT */
              /*  var inputs = $(this).parents("form").eq(0).find(":input");
                var idx = inputs.index(this);

                if (idx == inputs.length - 1) {
                    inputs[0].select()
                } else {
                    inputs[idx + 1].focus(); //  handles submit buttons
                    inputs[idx + 1].select();
                }
                return false;
            }
        });**/




	</script>


	<div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="content-main">
			<!--banner-->
			<div class="banner">
				<h2>
					<a href="index.php">Home</a>
					<i class="fa fa-angle-right"></i>
					<span>Purchase </span>
				</h2>
			</div>
			<!--//banner-->
			<!--<div class="container">-->

			<form class="form-horizontal" action="" name="form" method="POST">
			<div class="row" style=" margin-right: 30px;margin-left: 80px;">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="form-group">
						<label class="control-label col-sm-6 col-md-6" for="email">DATE : &nbsp;&nbsp;&nbsp;<font color="green"><?php echo date("Y/m/d"); ?></font></label>
					</div>
				</div>
				<div class="col-lg-4 col-md-4" style="text-align:center">
					<div class="form-group">
						<label class="control-label col-sm-6 col-md-6" for="email"><p id="bk">Customer Type</p></label>
					</div>
				</div>

				<div class="col-lg-2 col-md-2">
					<div class="form-group">
						<input type="hidden" name="sale_pur" id="sale_pur" value="0">
					</div>
				</div>

			</div>
			<div class="row">

				<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Source of Fund:</label>
					<div class="col-sm-6">
						<select class="form-control" id="" name="source">
							<option value="Salary" selected>Salary</option>
							<option value="Business">Business</option>
							<option value="Others">Others</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Purpose:</label>
					<div class="col-sm-6">
						<select class="form-control" id="" name="purpose">
						<option value="Travelling" selected>Travelling</option>
						<option value="Trade">Trade</option>
						<option value="Others">Others</option>
					</select>
					</div>
				</div>
			</div>

			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Transaction ID</label>
		 				<div class="col-sm-6 col-md-6">
			 				<input type="text" class="form-control" id="email" placeholder="" name="trans_id" value="<?php echo $newcode ?>" readonly>
		 				</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Customer Code</label>
		 				<div class="col-sm-6 col-md-6">
			 				<input type="text" class="form-control" id="cus_id" placeholder="" name="cus_code" readonly>
		 				</div>
					</div>
			</div>
			</div>
			<div class="row">

				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Customer Name</label>
		 				<div class="col-sm-6 col-md-6">
			 			<!--	<input type="text" class="form-control" id="cus_name" placeholder="Enter Customer Name" name="cus_name" list="itemsname" onChange="namesum()"  autocomplete="off" required>-->
							 <input type="text" class="form-control" id="cus_name" placeholder="Enter Customer Name" name="cus_name"  autocomplete="off" required>
		 				</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label class="control-label col-sm-4 col-md-4" for="email">Telephone</label>
						<div class="col-sm-6 col-md-6">
							<input type="text" class="form-control" min="1" max="5" id="tel" placeholder="Enter Telephone Number" name="cus_tel" onkeypress="return isNumber(event)" list="phlist" onChange="autofill2()" autocomplete="off" required>
						</div>
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label class="control-label col-sm-4 col-md-4" for="email">Civil No</label>
					<div class="col-sm-3 col-md-3">
						<input type="text" class="form-control" id="civil" placeholder="Enter Civil No" name="cus_civil" list="cuscivil" onChange="autofill3()" autocomplete="off"  required>
					</div>
					<div class="col-sm-3">
						<select class="form-control" id="customer_country" name="customer_country">
						<option value="0" selected>--Country--</option>
						<?php
						while($row43=mysqli_fetch_array($rs43))
						{
							?>

							<option value="<?php echo $row43["iso3"]; ?>"><?php  echo $row43["name"]; ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="form-group">
					<label class="control-label col-sm-4 col-md-4" for="email">PP No</label>
					<div class="col-sm-6 col-md-6">
						<input type="text" class="form-control" id="pp" placeholder="Enter PP No" name="cus_pp" list="cuspp" onChange="autofill()"  autocomplete="off" required>
					</div>
				</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Customer Address</label>
				<div class="col-sm-6 col-md-6">
					<textarea class="form-control" rows="2" id="cus_addr"placeholder="Enter Customer Address" name="cus_addr" required></textarea>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Average  Ex.Rate</label>
				<div class="col-sm-6 col-md-6">
					<input type="text" id="avg_ex" class="form-control" readonly />
				</div>
			</div>
		</div>
	</div>

<!-- dfsdfsd-->
<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4" for="email">Foreign currency</label>
			<div class="col-sm-3 col-md-3">
				<select class="form-control" id="from_c" name="from_c" onChange="calc_rate();calc_stock();calc_avg();">
					<option value="">--select--</option>
				<?php
					while($row=mysqli_fetch_array($rs4))
					{
						$fc=$row["cy_code"];
						if($fc != '2')
						{
						?>
						<option value="<?php echo $fc; ?>"><?php  echo $row["cy_name"]; ?></option>
						<?php
						}
		 			} ?>
				</select>
			</div>
			<div class="col-sm-1">
				<input type="text" class="input-sm" id="stk_v" size="12" readonly />
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Commission</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" step="any" class="form-control" id="cmsn" placeholdder="Enter Commission" name="cmsn" onChange="cmsn_fun()" value="0.000" required>
			</div>
		</div>
</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Enter Amount</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" step="any" class="form-control" id="from_amt" placeholder="Enter Amount" name="frm_amt"  onChange="calc_rate1()" required>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Equivalent Amount</label>
			<div class="col-sm-6 col-md-6">
				<input type="text" class="form-control" id="to_amt" placeholder="" name="to_amt" step="any" onchange="rev_cal()" required>
			</div>
		</div>
</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Exchange Rate</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" class="form-control" id="rate" onChange="calc_rate2()" placeholder="" name="rate" step="any" required>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="form-group">
			<label class="control-label col-sm-4 col-md-4" for="email">Total Amount</label>
			<div class="col-sm-6 col-md-6">
				<input type="number" step="any" class="form-control" id="tot"  placeholder="" name="tot" step="any" onchange="tot_fun()" required>
			</div>
		</div>
	</div>

</div>

<div class="row">
		<div class="col-lg-6 col-md-6">

			<div class="col-sm-1 col-md-1">
				<input type="hidden" name="cus_t" value="" id="cus_t">
			</div>
			<div class="col-sm-1 col-md-1">
				<input type="hidden" name="tr_rate_sr_no" value="" id="tr_rate_sr_no">
			</div>
			<div class="col-sm-1 col-md-1">
				<input type="hidden" name="bh_c" value="<?php echo $bh_id; ?>" id="bh_c">
			</div>
		</div>

	<div class="col-lg-6 col-md-6">
		<div class="form-group">

			<div class="col-sm-2 col-md-2">
				<button type="reset" class="btn btn-primary btn-block" onclick="myFunction()">Reset</button>
			</div>
			<div class="col-sm-3 col-md-3">
				<button type="submit" id="sub" name="sub" class="btn btn-primary btn-block">Save & Print</button>
			</div>
			<div class="col-sm-2 col-md-2">
				<font style="font-size:10px">Rounding: <input type="text" name="r" id="r" readonly></font>
		</div>
	</div>
</div>


</div>

				<fieldset id='to-clone'>
					<datalist id='itemsname'>
						<?php
							$getitem=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemsname=mysqli_fetch_array($getitem))
							{
						?>
								<option value='<?php echo $itemsname['cus_name'] ?>'>
						<?php
							}
						?>
					</datalist>

					<datalist id='cuspp'>
						<?php
							$getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemscode=mysqli_fetch_array($getitem2))
							{
						?>
								<option value='<?php echo $itemscode['cus_pp'] ?>'>
						<?php
							}
						?>
					</datalist>

					<datalist id='phlist'>
						<?php
							$getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemscode=mysqli_fetch_array($getitem2))
							{
						?>
								<option value='<?php echo $itemscode['cus_tel'] ?>'>
						<?php
							}
						?>
					</datalist>

					<datalist id='cuscivil'>
						<?php
							$getitem2=mysqli_query($mysqli,"SELECT * FROM customer ORDER BY cus_name;");
							while($itemscode=mysqli_fetch_array($getitem2))
							{
						?>
								<option value='<?php echo $itemscode['cus_civil'] ?>'>
						<?php
							}
						?>
					</datalist>

				</fieldset>
			</form>
			<!--</div> container-->
		</div>
	</div>
</div>
<?php include'footer.php'; ?>



<?php

//function for branch id
	

						function updateXML()
	{
		include'config.php';
		// this file is to refresh item stockdetail every time a page is loaded

		// create a dom document with encoding utf8
		$createxml = new DOMDocument('1.0', 'UTF-8');
		// create the root element of the xml tree
		$xmlRoot = $createxml->createElement('xml');
		//append it to the document created
		$xmlRoot = $createxml->appendChild($xmlRoot);
		$get=mysqli_query($mysqli,"SELECT * FROM customer;");
		while($getitem=mysqli_fetch_array($get))
		{
			$currentTrack = $createxml->createElement("customer");
			$currentTrack = $xmlRoot->appendChild($currentTrack);
			$currentTrack->appendChild($createxml->createElement('code',$getitem['cus_code']));
			$currentTrack->appendChild($createxml->createElement('name',$getitem['cus_name']));

			$currentTrack->appendChild($createxml->createElement('address',$getitem['cus_addr']));
			$currentTrack->appendChild($createxml->createElement('telephone',$getitem['cus_tel']));
			$currentTrack->appendChild($createxml->createElement('pp',$getitem['cus_pp']));
			$currentTrack->appendChild($createxml->createElement('civil',$getitem['cus_civil']));
			$currentTrack->appendChild($createxml->createElement('bank',$getitem['bank']));
		}
		$createxml->save('customerdetail.xml');
	}

	function updateXML2()
{
include'config.php';
// this file is to refresh item stockdetail every time a page is loaded

// create a dom document with encoding utf8
$createxml = new DOMDocument('1.0', 'UTF-8');
// create the root element of the xml tree
$xmlRoot = $createxml->createElement('xml');
//append it to the document created
$xmlRoot = $createxml->appendChild($xmlRoot);
$get=mysqli_query($mysqli,"SELECT * FROM currency_rates where active='1' ORDER BY sr_no DESC;");
while($getitem=mysqli_fetch_array($get))
{
$currentTrack = $createxml->createElement("rates");
$currentTrack = $xmlRoot->appendChild($currentTrack);
$currentTrack->appendChild($createxml->createElement('tr_rate_sr_no',$getitem['sr_no']));
$currentTrack->appendChild($createxml->createElement('from_cy',$getitem['to_cy']));
$currentTrack->appendChild($createxml->createElement('cy_ex_rate',$getitem['cy_ex_rate']));
$currentTrack->appendChild($createxml->createElement('cy_pur_rate',$getitem['cy_pur_rate']));
$currentTrack->appendChild($createxml->createElement('cy_sale_rate',$getitem['cy_sale_rate']));
//$currentTrack->appendChild($createxml->createElement('a_rate',$getitem['actual_rate']));
}
$createxml->save('ratedetail.xml');
}


function updateXML3($name)
	{
		include'config.php';
		// this file is to refresh item stockdetail every time a page is loaded

		// create a dom document with encoding utf8
		$createxml = new DOMDocument('1.0', 'UTF-8');
		// create the root element of the xml tree
		$xmlRoot = $createxml->createElement('xml');
		//append it to the document created
		$xmlRoot = $createxml->appendChild($xmlRoot);
		
		$get1=mysqli_query($mysqli,"SELECT * from currency;");
		while($getitem1=mysqli_fetch_array($get1))
		{
			$cy_c=$getitem1['cy_code'];
			$get=mysqli_query($mysqli,"SELECT bh_code,fc_cy,sum(fc_amt) as fcamt from vw_fc_transaction where fc_cy='$cy_c' and bh_code='$name' group by fc_cy;");
			$getitem=mysqli_fetch_array($get);
				
				if($getitem['fc_cy'] == $getitem1['cy_code'])
				{
				$currentTrack = $createxml->createElement("stock");
				$currentTrack = $xmlRoot->appendChild($currentTrack);
				$currentTrack->appendChild($createxml->createElement('fc_cy',$getitem['fc_cy']));
				$currentTrack->appendChild($createxml->createElement('fc_amt',$getitem['fcamt']));
				//$currentTrack->appendChild($createxml->createElement('bh_code',$getitem['bh_code']));

				}else
				{
					$currentTrack = $createxml->createElement("stock");
					$currentTrack = $xmlRoot->appendChild($currentTrack);
					$currentTrack->appendChild($createxml->createElement('fc_cy',$getitem1['cy_code']));
					$currentTrack->appendChild($createxml->createElement('fc_amt',"0"));
					//$currentTrack->appendChild($createxml->createElement('bh_code',"0"));

				}
				
		}

		$createxml->save("stock".$name."detail.xml");
	}
	
	function updateXML4($name)
	{
		include'config.php';
		// this file is to refresh item stockdetail every time a page is loaded

		// create a dom document with encoding utf8
		$createxml = new DOMDocument('1.0', 'UTF-8');
		// create the root element of the xml tree
		$xmlRoot = $createxml->createElement('xml');
		//append it to the document created
		$xmlRoot = $createxml->appendChild($xmlRoot);
		
		$get1=mysqli_query($mysqli,"SELECT * from currency;");
		while($getitem1=mysqli_fetch_array($get1))
		{
			$cy_c=$getitem1['cy_code'];
			$get=mysqli_query($mysqli,"SELECT bh_code,fc_cy,sum(omr_amt)/sum(fc_amt) as avg_x from vw_fc_transaction where fc_cy='$cy_c' and  tr_type='0' and bh_code='$name' group by fc_cy;");
			$getitem=mysqli_fetch_array($get);
				
				if($getitem['fc_cy'] == $getitem1['cy_code'])
				{
				$currentTrack = $createxml->createElement("avg");
				$currentTrack = $xmlRoot->appendChild($currentTrack);
				$currentTrack->appendChild($createxml->createElement('fc_cy',$getitem['fc_cy']));
				$currentTrack->appendChild($createxml->createElement('avg_ex',$getitem['avg_x']));
				//$currentTrack->appendChild($createxml->createElement('bh_code',$getitem['bh_code']));

				}else
				{
					$currentTrack = $createxml->createElement("avg");
					$currentTrack = $xmlRoot->appendChild($currentTrack);
					$currentTrack->appendChild($createxml->createElement('fc_cy',$getitem1['cy_code']));
					$currentTrack->appendChild($createxml->createElement('avg_ex',"0"));
					//$currentTrack->appendChild($createxml->createElement('bh_code',"0"));

				}

			
		}
		$createxml->save('avg'.$name.'exchange.xml');
	}

?>



<?php
					//create customer
					if(isset($_POST['sub']))
					{
						//Customer
						$transaction_id= mysqli_real_escape_string($mysqli,$_POST['trans_id']); //transaction id
						$customer_code= mysqli_real_escape_string($mysqli,$_POST['cus_code']); //customer code
						$customer_name= mysqli_real_escape_string($mysqli,$_POST['cus_name']); //customer name
						$customer_address= mysqli_real_escape_string($mysqli,$_POST['cus_addr']); //customer address
						$customer_telephone= mysqli_real_escape_string($mysqli,$_POST['cus_tel']); //customer telephone
						$customer_pp= mysqli_real_escape_string($mysqli,$_POST['cus_pp']); //customer id/pp number
						$customer_civil= mysqli_real_escape_string($mysqli,$_POST['cus_civil']); //customer id/pp number
						$customer_country= mysqli_real_escape_string($mysqli,$_POST['customer_country']);

						//Transaction
						$from_cy= mysqli_real_escape_string($mysqli,$_POST['from_c']); //from currency
						$frm_amt= mysqli_real_escape_string($mysqli,$_POST['frm_amt']); //from Amount
						$to_cy="2"; //to Currency
						$equavalent= mysqli_real_escape_string($mysqli,$_POST['to_amt']); //Equivalent
						$tr_ex_rate= mysqli_real_escape_string($mysqli,$_POST['rate']); //Exchange Rate
						//$at_rate= mysqli_real_escape_string($mysqli,$_POST['arate']); //Actual Rate
						$sale_pur= mysqli_real_escape_string($mysqli,$_POST['sale_pur']); //Purchase / Sales
						$source= mysqli_real_escape_string($mysqli,$_POST['source']); //Source
						$purpose= mysqli_real_escape_string($mysqli,$_POST['purpose']); //Purpose
						$cmsn= mysqli_real_escape_string($mysqli,$_POST['cmsn']); //Commission
						$to_amt= mysqli_real_escape_string($mysqli,$_POST['tot']); //To Amount
						$round= mysqli_real_escape_string($mysqli,$_POST['r']); //To Amount


						$query551 = mysqli_query($mysqli,"SELECT `tr_id` FROM transaction ORDER BY sr_no DESC");
						$row551 = mysqli_fetch_assoc($query551);
						$maxcode55= $row551['tr_id'];
						$newcode55 = $maxcode55+1;
						
						//----------------------------------------------------
						if (strpos($to_amt, ".") != false) {

							$tm = explode(".", $to_amt);
							$tm1= $tm[0]; // number
							$tm2= $tm[1]; // decimal
							$tmlen=strlen($tm2);
								if($tmlen < '3')
								{
									if($tmlen == '1')
									{
										$to_amt = $to_amt."00";
										
									}elseif ($tmlen == '2') {
										$to_amt=$to_amt."0";
									
									}
								}else {
									$subtm2=substr($tm2,0,3);
									$to_amt=$tm1.".".$subtm2;
									
								}
							}
							else{
										$to_amt=$to_amt.".000";
										
							}
						//----------------------------------------------------

						//$_SESSION['round']=$round;

						$tr_rate_sr_no= mysqli_real_escape_string($mysqli,$_POST['tr_rate_sr_no']); //Exchange rate original
						//$tr_sale_rate= mysqli_real_escape_string($mysqli,$_POST['sale_rate']); //Sales rate original
						//$tr_pur_rate= mysqli_real_escape_string($mysqli,$_POST['pur_rate']); //Purchase rate original
						$tr_sale_rate="2";
						$tr_pur_rate="3";
						$query22 = "SELECT * FROM customer WHERE cus_pp='$customer_pp' ";
						$result22 = mysqli_query($mysqli,$query22)or die(mysqli_error());
						//Retrieving Actual Rate
						//$query22 = "SELECT * FROM currency_rates WHERE cus_pp='$customer_pp' ";
						//$result22 = mysqli_query($mysqli,$query22)or die(mysqli_error());

						$num_row = mysqli_num_rows($result22);
						$row22=mysqli_fetch_array($result22);
						$date = date("Y-m-d");
						$time = date("h:i:a");
						if($to_amt == '0')
						{
								echo "<script>alert('invalid Data');</script>";
						}else {
						if( $num_row == '0' )
						{
							$query51 = mysqli_query($mysqli,"SELECT cus_code FROM customer ORDER BY sr_no DESC ");
							$row51 = mysqli_fetch_assoc($query51);
							$maxcod= $row51['cus_code'];
							$newcod = $maxcod+1;
							$sql = "INSERT INTO `customer` (`cus_code`, `cus_name`, `cus_addr`, `cus_tel`, `cus_pp`,`bh_id`,`cus_civil`,`nationality`) VALUES ('$newcod', '$customer_name', '$customer_address', '$customer_telephone', '$customer_pp','$bh_id','$customer_civil','$customer_country');";
							mysqli_query($mysqli, $sql);

							$sql2 = "INSERT INTO `transaction` (`tr_id`,`cus_id`,`from_cy`, `to_cy`,`frm_amt`,`equvallent`,`to_amt`,`tr_ex_rate`,`tr_rate_sr_no`,`cmsn`,`sale_pur`,`source`,`purpose`,`bh_code`,`trans_date`,`trans_time`,`us_code`,`round`) VALUES ('$newcode55','$newcod','$from_cy','$to_cy','$frm_amt','$equavalent','$to_amt','$tr_ex_rate','$tr_rate_sr_no','$cmsn','$sale_pur','$source','$purpose','$bh_id','$date','$time','$user_code','$round');";
							if (mysqli_query($mysqli, $sql2)) {
								if($sale_pur == '1')
								{
										echo "<script>alert('Success..');window.location='purchase.php';window.open('treport2.php','_blank');</script>";
								}else {
										echo "<script>alert('Success..');window.location='purchase.php';window.open('treport.php','_blank');</script>";
								}

							} else {
								echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
							}
						}else
							if($num_row == '1'){
								$date = date("Y-m-d");
								$time = date("h:i:a");
								$sql2 = "INSERT INTO `transaction` (`tr_id`,`cus_id`,`from_cy`, `to_cy`,`frm_amt`,`equvallent`,`to_amt`,`tr_ex_rate`,`tr_rate_sr_no`,`cmsn`,`sale_pur`,`source`,`purpose`,`bh_code`,`trans_date`,`trans_time`,`us_code`,`round`) VALUES ('$newcode55','$customer_code','$from_cy','$to_cy','$frm_amt','$equavalent','$to_amt','$tr_ex_rate','$tr_rate_sr_no','$cmsn','$sale_pur','$source','$purpose','$bh_id','$date','$time','$user_code','$round');";
								if (mysqli_query($mysqli, $sql2)) {
									if($sale_pur == '1')
									{
											echo "<script>alert('Success..');window.location='purchase.php';window.open('treport2.php','_blank');</script>";
									}else {
											echo "<script>alert('Success..');window.location='purchase.php';window.open('treport.php','_blank');</script>";
									}
								} else {
									echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
								}
						}


					}

					}
 ?>
