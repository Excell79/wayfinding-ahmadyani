<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>FEEDBACK SYSTEM BANDARA INTERNASIONAL AHMAD YANI SEMARANG</title>

<meta name="description" content="FEEDBACK SYSTEM BANDARA INTERNASIONAL AHMAD YANI SEMARANG" />

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

<!-- Bootstrap -->
<link href="_include/css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="_include/css/main.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="_include/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">


<!-- Fav Icon -->
<link rel="shortcut icon" href="">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">
<style>
.header {
	position: fixed;
	font-size: 14px;
	top: 0;
	left: 0;
	width: 100%;
	height: 50px;
	z-index: 10;
	background: linear-gradient(135deg,#6394ff 0%,#0a193b 100%);
		color: white;
	-webkit-box-shadow: 0 7px 8px rgba(0, 0, 0, 0.12);
	-moz-box-shadow: 0 7px 8px rgba(0, 0, 0, 0.12);
	box-shadow: 0 7px 8px rgba(0, 0, 0, 0.12);
}
.footer {
		font-size:14px;
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 25px;
	z-index: 10;
	background: linear-gradient(135deg,#6394ff 0%,#0a193b 100%);
		color: white;
	-webkit-box-shadow: 0 7px 8px rgba(0, 0, 0, 0.12);
	-moz-box-shadow: 0 7px 8px rgba(0, 0, 0, 0.12);
	box-shadow: 0 7px 8px rgba(0, 0, 0, 0.12);
}
.buttonBg {
	background-color: #333;
	/* Green */
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	cursor: pointer;
}
</style>
<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		$page = "../";
		$sec = "10";
		$Name=$_GET['nama'];
		?>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>


<body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>

<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider">
    <div class="overlay"></div>
		<div class="header">
<button onClick="document.location.href='../'" class="buttonBg">Go Back</button> <b>Feedback</b> System

		</div>
    <div class="slider-text">
    	<div class="ghost-button-rounded-corners2">
		<!-- <img src="vote/img/thankyou.png" alt="ap1" height="70" width="100"> -->
		<H2><?php
		if($Name=='')
		{

		}
		else
		{
		echo "Hi, $Name";
		}
		 ?>  <BR>TERIMAKASIH ATAS KRITIK DAN SARAN ANDA</h2>
		</div>
		<table width=100%>
	<tr>
	<td>
	<a class="ghost-button-rounded-corners" href="vote_n/index.php" onMouseDown="button.play()"> Feedback</a>
	</td>
			<td>
			</td>
	<td>
	<a class="ghost-button-rounded-corners" href="sender/index.php" onMouseDown="button.play()"> Saran</a>
	</td>
	</tr>
	</table>
		</div>
		<div class="footer">

				<b>Application</b> Operation & Support Section
				<div style="float:right;display:inline-block;padding-right:14px;">
			<span id="date_time"></span>
								<script type="text/javascript">window.onload = date_time('date_time');</script>
				</div>
		</div>
    </div>


</div>

<!-- End Homepage Slider -->
<!-- Js -->
<script src="_include/js/jquery.min.js"></script> <!-- jQuery Core -->
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="_include/js/main.js"></script> <!-- Default JS -->
<!-- End Js -->
<script>
var button = new Audio();
button.src = 'vote/button.mp3';
</script>
</body>
</html>
