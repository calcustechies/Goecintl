<!DOCTYPE HTML>
<html>
<head>
	<title>Currency Exchange</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	
	<script src="js/jquery.min.js"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"> </script>
	<!-- Mainly scripts -->
	<script src="js/jquery.metisMenu.js" async></script>
	<script src="js/jquery.slimscroll.min.js" async></script>
	<!-- Custom and plugin javascript -->
	<link href="css/custom.css" rel="stylesheet">
	<!--<link href="css1/datepicker.css" rel="stylesheet">-->
	<script src="js/custom.js" async></script>
	<script src="js/screenfull.js" async></script>
	<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}
			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});

		});

                 


	</script>



</head>
<body>
