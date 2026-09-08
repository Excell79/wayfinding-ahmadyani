<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FEEDBACK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fids.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
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
	<script src="js/js.js"></script>
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->
	<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<head><title>Feedback Bandara Ahmad Yani</title>
<!--  <link href="assets/img/Ap.png" rel="Shortcut Icon" />
<link rel="stylesheet" type="text/css" href="assets/css/cagfeedback.css" /> -->
<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="js/jquery.ezmark.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
	var arr = new Array(
		"#rblDeparture_Facilities",
		"#rblArrival_Facilities",
		"#rblAirport_Cleanliness",
		"#rblFriendliness_Of_Staff",
		"#rblShopping_Facilities",
		"#rblFood_Beverages",
		"#rblOther_Facilities"
	);
	for(var i in arr) {
		var value = arr[i];
			$(value + " td:eq(0)").addClass("excellent");
			$(value + " td:eq(1)").addClass("good");
			$(value + " td:eq(2)").addClass("average");
			$(value + " td:eq(3)").addClass("poor");
	}

	$('.page1 tbody table td input').ezMark();
});
</script>
<script>
var button = new Audio();
button.src = 'button.mp3';
</script>
<script>
var istimewa = new Audio();
istimewa.src = 'istimewa.mp3';
</script>
<script>
var baik = new Audio();
baik.src = 'baik.mp3';
</script>
<script>
var lumayan = new Audio();
lumayan.src = 'lumayan.mp3';
</script>
<script>
var buruk = new Audio();
buruk.src = 'buruk.mp3';
</script>
	<link rel="shortcut icon" href="#">
		<?php
		$page = "../index.html";
		$sec = "180";
		?>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>
<body onLoad="buttonxx.play()" oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>
  <div class="header">
<button onClick="document.location.href='http://localhost/kio/home/'" class="buttonBg">Go Back</button> <b>Feedback</b> System

  </div>
  <br>
  <br>
<form method="post" action="proses.php">
<?php
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$cookie = $randomString;
?>
<input name="cookies" type="hidden" value="<?php echo $cookie ;?>">
<table width=100%>
<tr>
<td width=90%>
<table class="table table-condensed table-hover table-striped home-fids">
			  <thead>
			<tr class="home">
			<th width="3%"></th>
				<th width="20%"></th>
				<th width="10%">SANGAT BAIK</th>
				<th width="10%">&nbsp;&nbsp;&nbsp;&nbsp; BAIK</th>
				<th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;CUKUP</th>
				<th width="10%">&nbsp;&nbsp;&nbsp;BURUK</th>
			</tr>
		  </thead>
		  <tbody>
	   <tr>
	   			<td><img src="img/icon_airportCleanliness.png" alt="ap1"></td>
	   			<td>KEBERSIHAN BANDARA<input name="Airport_Cleanliness_1" type="hidden" value="1"> </td>
              <td>
			 <div class="cc-selector" onMouseDown="istimewa.play()">
        <input id="istimewa" type="radio" name="Airport_Cleanliness" value="4"/>
        <label class="drinkcard-cc istimewa" for="istimewa"></label>
    		</div>
			</td>
              <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
        <input id="baik" type="radio" name="Airport_Cleanliness" value="3"/>
        <label class="drinkcard-cc baik" for="baik"></label>
    		</div>
			</td>
              <td>
			  <div class="cc-selector" onMouseDown="lumayan.play()">
        <input id="cukup" type="radio" name="Airport_Cleanliness" value="2"/>
        <label class="drinkcard-cc cukup" for="cukup"></label>
    		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="buruk.play()">
        <input id="buruk" type="radio" name="Airport_Cleanliness" value="1"/>
        <label class="drinkcard-cc buruk" for="buruk"></label>
    		</div>
			  </td>
		</tr>
		<tr>
		<td><img src="img/icon_airportStaff.png" alt="ap1"></td>
	   			<td>KERAMAHAN KARYAWAN<input name="Friendliness_Of_Staff_2" type="hidden" value="2"> </td>
              <td>
			  <div class="cc-selector2" onMouseDown="istimewa.play()">
        <input id="istimewa2" type="radio" name="Friendliness_Of_Staff" value="4"/>
        <label class="drinkcard2-cc istimewa2" for="istimewa2"></label>
    		</div>
			</td>
              <td>
			  <div class="cc-selector2" onMouseDown="baik.play()">
        <input id="baik2" type="radio" name="Friendliness_Of_Staff" value="3"/>
        <label class="drinkcard2-cc baik2" for="baik2"></label>
    		</div>
		</td>
              <td>
			  <div class="cc-selector2" onMouseDown="lumayan.play()">
        <input id="cukup2" type="radio" name="Friendliness_Of_Staff" value="2"/>
        <label class="drinkcard2-cc cukup2" for="cukup2"></label>
    		</div>
			</td>
			<td>
			<div class="cc-selector2" onMouseDown="buruk.play()">
        <input id="buruk2" type="radio" name="Friendliness_Of_Staff" value="1"/>
        <label class="drinkcard2-cc buruk2" for="buruk2"></label>
    		</div>
			</td>
		</tr>
		<tr>
		<td><img src="img/icon_departure.png" alt="ap1"></td>
	   			<td>LAYANAN KEBERANGKATAN<input name="Departure_Facilities_3" type="hidden" value="3"> </td>
              <td>
			  <div class="cc-selector3" onMouseDown="istimewa.play()">
        <input id="istimewa3" type="radio" name="Departure_Facilities" value="4"/>
        <label class="drinkcard3-cc istimewa3" for="istimewa3"></label>
    		</div>
			</td>
              <td>
			  <div class="cc-selector3" onMouseDown="baik.play()">
        <input id="baik3" type="radio" name="Departure_Facilities" value="3"/>
        <label class="drinkcard3-cc baik3" for="baik3"></label>
    		</div>
			  </td>
              <td>
			  <div class="cc-selector3" onMouseDown="lumayan.play()">
        <input id="cukup3" type="radio" name="Departure_Facilities" value="2"/>
        <label class="drinkcard3-cc cukup3" for="cukup3"></label>
    		</div>
			</td>
			  <td>
			  <div class="cc-selector3" onMouseDown="buruk.play()">
        <input id="buruk3" type="radio" name="Departure_Facilities" value="1"/>
        <label class="drinkcard3-cc buruk2" for="buruk3"></label>
    		</div>
			 </td>
		</tr>
		<tr>
		<td><img src="img/icon_arrival.png" alt="ap1"></td>
	   			<td>LAYANAN KEDATANGAN<input name="Arrival_Facilities_4" type="hidden" value="4"> </td>
              <td>
			  <div class="cc-selector4" onMouseDown="istimewa.play()">
        <input id="istimewa4" type="radio" name="Arrival_Facilities" value="4"/>
        <label class="drinkcard4-cc istimewa4" for="istimewa4"></label>
    		</div>
			</td>
              <td>
			  <div class="cc-selector4" onMouseDown="baik.play()">
        <input id="baik4" type="radio" name="Arrival_Facilities" value="3"/>
        <label class="drinkcard4-cc baik4" for="baik4"></label>
    		</div>
			 </td>
              <td>
			  <div class="cc-selector4" onMouseDown="lumayan.play()">
        <input id="cukup4" type="radio" name="Arrival_Facilities" value="2"/>
        <label class="drinkcard4-cc cukup4" for="cukup4"></label>
    		</div>
			 </td>
			  <td>
			  <div class="cc-selector4" onMouseDown="buruk.play()">
        <input id="buruk4" type="radio" name="Arrival_Facilities" value="1"/>
        <label class="drinkcard4-cc buruk4" for="buruk4"></label>
    		</div>
			  </td>
		</tr>
		<tr>
		<td><img src="img/icon_FnB.png" alt="ap1"></td>
	   			<td>MAKANAN DAN MINUMAN<input name="Food_Beverages_5" type="hidden" value="5"> </td>
              <td>
			  <div class="cc-selector5" onMouseDown="istimewa.play()">
        <input id="istimewa5" type="radio" name="Food_Beverages" value="4"/>
        <label class="drinkcard5-cc istimewa5" for="istimewa5"></label>
    		</div>
			  </td>
              <td>
			  <div class="cc-selector5" onMouseDown="baik.play()">
        <input id="baik5" type="radio" name="Food_Beverages" value="3"/>
        <label class="drinkcard5-cc baik5" for="baik5"></label>
    		</div>
			  </td>
              <td>
			  <div class="cc-selector5" onMouseDown="lumayan.play()">
        <input id="cukup5" type="radio" name="Food_Beverages" value="2"/>
        <label class="drinkcard5-cc cukup5" for="cukup5"></label>
    		</div>
			 </td>
			  <td>
			  <div class="cc-selector5" onMouseDown="buruk.play()">
        <input id="buruk5" type="radio" name="Food_Beverages" value="1"/>
        <label class="drinkcard5-cc buruk5" for="buruk5"></label>
    		</div>
			 </td>
		</tr>
		<tr>
		<td><img src="img/icon_shopping.png" alt="ap1"></td>
	   			<td>FASILITAS BELANJA<input name="Shopping_Facilities_6" type="hidden" value="6"> </td>
              <td>
			  <div class="cc-selector6" onMouseDown="istimewa.play()">
        <input id="istimewa6" type="radio" name="Shopping_Facilities" value="4"/>
        <label class="drinkcard6-cc istimewa6" for="istimewa6"></label>
    		</div>
			  </td>
              <td>
			  <div class="cc-selector6" onMouseDown="baik.play()">
        <input id="baik6" type="radio" name="Shopping_Facilities" value="3"/>
        <label class="drinkcard6-cc baik6" for="baik6"></label>
    		</div>
			  </td>
              <td>
			   <div class="cc-selector6" onMouseDown="lumayan.play()">
        <input id="cukup6" type="radio" name="Shopping_Facilities" value="2"/>
        <label class="drinkcard6-cc cukup6" for="cukup6"></label>
    		</div>
			 </td>
			  <td>
			  <div class="cc-selector6" onMouseDown="buruk.play()">
        <input id="buruk6" type="radio" name="Shopping_Facilities" value="1"/>
        <label class="drinkcard6-cc buruk6" for="buruk6"></label>
    		</div>
			 </td>
		</tr>
		<tr>
		<td><img src="img/icon_others.png" alt="ap1"></td>
	   			<td>PARKIR<input name="Other_Facilities_7" type="hidden" value="7"> </td>
              <td>
			  <div class="cc-selector7" onMouseDown="istimewa.play()">
        <input id="istimewa7" type="radio" name="Other_Facilities" value="4"/>
        <label class="drinkcard7-cc istimewa7" for="istimewa7"></label>
    		</div>
			  </td>
              <td>
			  <div class="cc-selector7" onMouseDown="baik.play()">
        <input id="baik7" type="radio" name="Other_Facilities" value="3"/>
        <label class="drinkcard7-cc baik7" for="baik7"></label>
    		</div>
			  </td>
              <td>
			   <div class="cc-selector7" onMouseDown="lumayan.play()">
        <input id="cukup7" type="radio" name="Other_Facilities" value="2"/>
        <label class="drinkcard7-cc cukup7" for="cukup7"></label>
    		</div>
			 </td>
			  <td>
			  <div class="cc-selector7" onMouseDown="buruk.play()">
        <input id="buruk7" type="radio" name="Other_Facilities" value="1"/>
        <label class="drinkcard7-cc buruk7" for="buruk7"></label>
    		</div>
			 </td>
		</tr>
  </tbody>
  </table>
  <table>
    <tr>
      <td>
    <a href="index.php" class="btn btn-1x btn-1d" onMouseDown="button.play()"><img src="img/er.png" alt="ap1" width="7%" height="7%"> Kosongkan</a>
    </td>
    <td>

    <button class="btn btn-1 btn-1e" name="SUBMIT" id="submit_a" type="image" value="SUBMIT" onMouseDown="button.play()"><img src="img/sb.png" alt="ap1" width="7%" height="7%"> SUBMIT </button>
  </td>
    </tr>
  </table>
</td>
<td width=2%>
</td>
<td width=15% valign=top>
		<!--  <a href="../index.html" class="btn btn-1x btn-1d" onMouseDown="button.play()"><img src="img/st.png" alt="ap1" width="7%" height="7%"> Start New Survey</a> -->
</td>
</tr>
</table>
  </form>

  <script src="js/boostrap.js"></script>
  </body>
</html>
