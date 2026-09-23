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
			$(value + " td:eq(1)").addClass("excellent");
			$(value + " td:eq(2)").addClass("good");
			$(value + " td:eq(3)").addClass("average");
			$(value + " td:eq(4)").addClass("poor");
	}

	$('.page1 tbody table td input').ezMark();
});
</script>
<script>
var button = new Audio();
button.src = 'button.mp3';
</script>
<script>
var sempurna = new Audio();
sempurna.src = '5.mp3';
</script>
<script>
var istimewa = new Audio();
istimewa.src = '4.mp3';
</script>
<script>
var baik = new Audio();
baik.src = '3.mp3';
</script>
<script>
var cukup = new Audio();
cukup.src = '2.mp3';
</script>
<script>
var buruk = new Audio();
buruk.src = '1.mp3';
</script>
	<link rel="shortcut icon" href="#">
		<?php
		$page = "../index.html";
		$sec = "180";
		?>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>
<body style="background-image(img/background.png)" onLoad="buttonxx.play()" oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>
  <div class="header">
    <a href="http://localhost/kio/home/">
<button onClick="document.location.href='http://localhost/kio/home/'" class="buttonBg">Go Back</button></a> <b>Feedback</b> System

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
<td width=100%>
<table class="table table-condensed table-hover table-striped home-fids">
			  <thead>
			<tr class="home" align="center">
			<th width="3%"></th>
				<th width="40%"></th>
				<th >SEMPURNA</th>
				<th >SANGAT BAIK</th>
				<th >BAIK</th>
				<th >LUMAYAN</th>
        <th >BURUK</th>
			</tr>
		  </thead>
		  <tbody>
	   <tr>
	   <td><img src="img/Feedback Icons/taxi.png" alt="ap1"></td>
	   			<td>TRANSPORTASI DARAT DARI & KE BANDARA<input name="Airport_Transport_1" type="hidden" value="1"> </td>
          <td>
          <div class="cc-selector" onMouseDown="sempurna.play()">
          <input id="sempurna" type="radio" name="Airport_Transport" value="5"/>
          <label class="drinkcard-cc istimewa" for="sempurna"></label>
          </div>
        </td>
        <td>
			  <div class="cc-selector" onMouseDown="istimewa.play()">
        <input id="sangatbaik" type="radio" name="Airport_Transport" value="4"/>
        <label class="drinkcard-cc istimewa" for="sangatbaik"></label>
    		</div>
			</td>
        <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
        <input id="baik" type="radio" name="Airport_Transport" value="3"/>
        <label class="drinkcard-cc baik" for="baik"></label>
    		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="cukup.play()">
        <input id="lumayan" type="radio" name="Airport_Transport" value="2"/>
        <label class="drinkcard-cc cukup" for="lumayan"></label>
    		</div>
			</td>
        <td>
        <div class="cc-selector" onMouseDown="buruk.play()">
        <input id="buruk" type="radio" name="Airport_Transport" value="1"/>
        <label class="drinkcard-cc buruk" for="buruk"></label>
    		</div>
      </td>
		</tr>
		<tr>
		<td><img src="img/Feedback Icons/parking.png" alt="ap1"></td>
	   			<td>FASILITAS PARKIR<input name="Parking_Facility_2" type="hidden" value="2"> </td>
              <td>
        <div class="cc-selector" onMouseDown="sempurna.play()">
         <input id="sempurna2" type="radio" name="Parking_Facility" value="5"/>
         <label class="drinkcard-cc istimewa2" for="sempurna2"></label>
     		</div>
 			</td>
        <td>
 			  <div class="cc-selector" onMouseDown="istimewa.play()">
         <input id="sangatbaik2" type="radio" name="Parking_Facility" value="4"/>
         <label class="drinkcard-cc istimewa2" for="sangatbaik2"></label>
     		</div>
 			</td>
        <td>
 			  <div class="cc-selector" onMouseDown="baik.play()">
         <input id="baik2" type="radio" name="Parking_Facility" value="3"/>
         <label class="drinkcard-cc baik2" for="baik2"></label>
     		</div>
 			</td>
 			  <td>
 			  <div class="cc-selector" onMouseDown="cukup.play()">
         <input id="lumayan2" type="radio" name="Parking_Facility" value="2"/>
         <label class="drinkcard-cc cukup2" for="lumayan2"></label>
     		</div>
 			</td>
         <td>
         <div class="cc-selector" onMouseDown="buruk.play()">
         <input id="buruk2" type="radio" name="Parking_Facility" value="1"/>
         <label class="drinkcard-cc buruk2" for="buruk2"></label>
     		</div>
			</td>
		</tr>
		<tr>
		<td><img src="img/Feedback Icons/money.png" alt="ap1"></td>
	   			<td>HARGA FASILITAS PARKIR<input name="Parking_Price_3" type="hidden" value="3"> </td>
              <td>
      <div class="cc-selector" onMouseDown="sempurna.play()">
       <input id="sempurna3" type="radio" name="Parking_Price" value="5"/>
       <label class="drinkcard-cc istimewa3" for="sempurna3"></label>
   		</div>
			</td>
      <td>
			  <div class="cc-selector" onMouseDown="istimewa.play()">
       <input id="sangatbaik3" type="radio" name="Parking_Price" value="4"/>
       <label class="drinkcard-cc istimewa3" for="sangatbaik3"></label>
   		</div>
			</td>
             <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
       <input id="baik3" type="radio" name="Parking_Price" value="3"/>
       <label class="drinkcard-cc baik3" for="baik3"></label>
   		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="cukup.play()">
       <input id="lumayan3" type="radio" name="Parking_Price" value="2"/>
       <label class="drinkcard-cc cukup3" for="lumayan3"></label>
   		</div>
			</td>
       <td>
       <div class="cc-selector" onMouseDown="buruk.play()">
       <input id="buruk3" type="radio" name="Parking_Price" value="1"/>
       <label class="drinkcard-cc buruk3" for="buruk3"></label>
    		</div>
			 </td>
		</tr>
		<tr>
		<td><img src="img/Feedback Icons/box.png" alt="ap1"></td>
	   			<td>KETERSEDIAAN TROLLEY BARANG BAWAAN<input name="Trolley_Ready_4" type="hidden" value="4"> </td>
              <td>
      <div class="cc-selector" onMouseDown="sempurna.play()">
       <input id="sempurna4" type="radio" name="Trolley_Ready" value="5"/>
       <label class="drinkcard-cc istimewa4" for="sempurna4"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="istimewa.play()">
       <input id="sangatbaik4" type="radio" name="Trolley_Ready" value="4"/>
       <label class="drinkcard-cc istimewa4" for="sangatbaik4"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
       <input id="baik4" type="radio" name="Trolley_Ready" value="3"/>
       <label class="drinkcard-cc baik4" for="baik4"></label>
   		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="cukup.play()">
       <input id="lumayan4" type="radio" name="Trolley_Ready" value="2"/>
       <label class="drinkcard-cc cukup4" for="lumayan4"></label>
   		</div>
			</td>
       <td>
       <div class="cc-selector" onMouseDown="buruk.play()">
       <input id="buruk4" type="radio" name="Trolley_Ready" value="1"/>
       <label class="drinkcard-cc buruk4" for="buruk4"></label>
   		</div>
			  </td>
		</tr>
		<tr>
		<td><img src="img/Feedback Icons/racing.png" alt="ap1"></td>
	   			<td>WAKTU TUNGGU DI ANTRIAN CHECK-IN<input name="Waiting_Time_5" type="hidden" value="5"> </td>
              <td>
      <div class="cc-selector" onMouseDown="sempurna.play()">
       <input id="sempurna5" type="radio" name="Waiting_Time" value="5"/>
       <label class="drinkcard-cc istimewa5" for="sempurna5"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="istimewa.play()">
       <input id="sangatbaik5" type="radio" name="Waiting_Time" value="4"/>
       <label class="drinkcard-cc istimewa5" for="sangatbaik5"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
       <input id="baik5" type="radio" name="Waiting_Time" value="3"/>
       <label class="drinkcard-cc baik5" for="baik5"></label>
   		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="cukup.play()">
       <input id="lumayan5" type="radio" name="Waiting_Time" value="2"/>
       <label class="drinkcard-cc cukup5" for="lumayan5"></label>
   		</div>
			</td>
       <td>
       <div class="cc-selector" onMouseDown="buruk.play()">
       <input id="buruk5" type="radio" name="Waiting_Time" value="1"/>
       <label class="drinkcard-cc buruk5" for="buruk5"></label>
   		</div>
			 </td>
		</tr>
		<tr>
		<td><img src="img/Feedback Icons/ticket-office.png" alt="ap1"></td>
	   			<td>KEEFISIENAN PETUGAS CHECK-IN<input name="Staff_Efficiency_6" type="hidden" value="6"> </td>
              <td>
      <div class="cc-selector" onMouseDown="sempurna.play()">
       <input id="sempurna6" type="radio" name="Staff_Efficiency" value="5"/>
       <label class="drinkcard-cc istimewa6" for="sempurna6"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="istimewa.play()">
       <input id="sangatbaik6" type="radio" name="Staff_Efficiency" value="4"/>
       <label class="drinkcard-cc istimewa6" for="sangatbaik6"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
       <input id="baik6" type="radio" name="Staff_Efficiency" value="3"/>
       <label class="drinkcard-cc baik6" for="baik6"></label>
   		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="cukup.play()">
       <input id="lumayan6" type="radio" name="Staff_Efficiency" value="2"/>
       <label class="drinkcard-cc cukup6" for="lumayan6"></label>
   		</div>
			</td>
       <td>
       <div class="cc-selector" onMouseDown="buruk.play()">
       <input id="buruk6" type="radio" name="Staff_Efficiency" value="1"/>
       <label class="drinkcard-cc buruk6" for="buruk6"></label>
   		</div>
			 </td>
		</tr>
		<tr>
		<td><img src="img/Feedback Icons/ticket-collector.png" alt="ap1"></td>
	   			<td>KESOPANAN DAN KECEKATAN PETUGAS CHECK-IN<input name="Staff_Attitude_7" type="hidden" value="7"> </td>
              <td>
      <div class="cc-selector" onMouseDown="sempurna.play()">
       <input id="sempurna7" type="radio" name="Staff_Attitude" value="5"/>
       <label class="drinkcard-cc istimewa7" for="sempurna7"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="istimewa.play()">
       <input id="sangatbaik7" type="radio" name="Staff_Attitude" value="4"/>
       <label class="drinkcard-cc istimewa7" for="sangatbaik7"></label>
   		</div>
			</td>
       <td>
			  <div class="cc-selector" onMouseDown="baik.play()">
       <input id="baik7" type="radio" name="Staff_Attitude" value="3"/>
       <label class="drinkcard-cc baik7" for="baik7"></label>
   		</div>
			</td>
			  <td>
			  <div class="cc-selector" onMouseDown="cukup.play()">
       <input id="lumayan7" type="radio" name="Staff_Attitude" value="2"/>
       <label class="drinkcard-cc cukup7" for="lumayan7"></label>
   		</div>
			</td>
       <td>
       <div class="cc-selector" onMouseDown="buruk.play()">
       <input id="buruk7" type="radio" name="Staff_Attitude" value="1"/>
       <label class="drinkcard-cc buruk7" for="buruk7"></label>
   		</div>
			 </td>
		</tr>
    <tr>
    <td><img src="img/Feedback Icons/shield.png" alt="ap1"></td>
         <td>KETELITIAN PEMERIKSAAN KEAMANAN<input name="Safety_Check_8" type="hidden" value="8"> </td>
             <td>
      <div class="cc-selector" onMouseDown="sempurna.play()">
       <input id="sempurna8" type="radio" name="Safety_Check" value="5"/>
       <label class="drinkcard-cc istimewa" for="sempurna8"></label>
       </div>
     </td>
       <td>
       <div class="cc-selector" onMouseDown="istimewa.play()">
       <input id="sangatbaik8" type="radio" name="Safety_Check" value="4"/>
       <label class="drinkcard-cc istimewa" for="sangatbaik8"></label>
       </div>
     </td>
       <td>
       <div class="cc-selector" onMouseDown="baik.play()">
       <input id="baik8" type="radio" name="Safety_Check" value="3"/>
       <label class="drinkcard-cc baik" for="baik8"></label>
       </div>
     </td>
       <td>
       <div class="cc-selector" onMouseDown="cukup.play()">
       <input id="lumayan8" type="radio" name="Safety_Check" value="2"/>
       <label class="drinkcard-cc cukup" for="lumayan8"></label>
       </div>
     </td>
       <td>
       <div class="cc-selector" onMouseDown="buruk.play()">
       <input id="buruk8" type="radio" name="Safety_Check" value="1"/>
       <label class="drinkcard-cc buruk" for="buruk8"></label>
       </div>
     </td>
   </tr>
   <tr>
   <td><img src="img/Feedback Icons/racing.png" alt="ap1"></td>
        <td>WAKTU TUNGGU PEMERIKSAAN KEAMANAN<input name="Safety_Time_9" type="hidden" value="9"> </td>
            <td>
     <div class="cc-selector" onMouseDown="sempurna.play()">
      <input id="sempurna9" type="radio" name="Safety_Time" value="5"/>
      <label class="drinkcard-cc istimewa" for="sempurna9"></label>
      </div>
    </td>
      <td>
      <div class="cc-selector" onMouseDown="istimewa.play()">
      <input id="sangatbaik9" type="radio" name="Safety_Time" value="4"/>
      <label class="drinkcard-cc istimewa" for="sangatbaik9"></label>
      </div>
    </td>
      <td>
      <div class="cc-selector" onMouseDown="baik.play()">
      <input id="baik9" type="radio" name="Safety_Time" value="3"/>
      <label class="drinkcard-cc baik" for="baik9"></label>
      </div>
    </td>
      <td>
      <div class="cc-selector" onMouseDown="cukup.play()">
      <input id="lumayan9" type="radio" name="Safety_Time" value="2"/>
      <label class="drinkcard-cc cukup" for="lumayan9"></label>
      </div>
    </td>
      <td>
      <div class="cc-selector" onMouseDown="buruk.play()">
      <input id="buruk9" type="radio" name="Safety_Time" value="1"/>
      <label class="drinkcard-cc buruk" for="buruk9"></label>
      </div>
      </td>
  </tr>
  <tr>
  <td><img src="img/Feedback Icons/smile.png" alt="ap1"></td>
       <td>PERASAAN AMAN DAN NYAMAN DI BANDARA<input name="Safety_Feel_10" type="hidden" value="10"> </td>
           <td>
    <div class="cc-selector" onMouseDown="sempurna.play()">
     <input id="sempurna10" type="radio" name="Safety_Feel" value="5"/>
     <label class="drinkcard-cc istimewa" for="sempurna10"></label>
     </div>
   </td>
     <td>
     <div class="cc-selector" onMouseDown="istimewa.play()">
     <input id="sangatbaik10" type="radio" name="Safety_Feel" value="4"/>
     <label class="drinkcard-cc istimewa" for="sangatbaik10"></label>
     </div>
   </td>
     <td>
     <div class="cc-selector" onMouseDown="baik.play()">
     <input id="baik10" type="radio" name="Safety_Feel" value="3"/>
     <label class="drinkcard-cc baik" for="baik10"></label>
     </div>
   </td>
     <td>
     <div class="cc-selector" onMouseDown="cukup.play()">
     <input id="lumayan10" type="radio" name="Safety_Feel" value="2"/>
     <label class="drinkcard-cc cukup" for="lumayan10"></label>
     </div>
   </td>
     <td>
     <div class="cc-selector" onMouseDown="buruk.play()">
     <input id="buruk10" type="radio" name="Safety_Feel" value="1"/>
     <label class="drinkcard-cc buruk" for="buruk10"></label>
     </div>
     </td>
 </tr>
 <tr>
 <td><img src="img/Feedback Icons/seo.png" alt="ap1"></td>
      <td>KEMUDAHAN MENEMUKAN TUJUAN ANDA DI BANDARA<input name="Easy_Way_11" type="hidden" value="11"> </td>
          <td>
   <div class="cc-selector" onMouseDown="sempurna.play()">
    <input id="sempurna11" type="radio" name="Easy_Way" value="5"/>
    <label class="drinkcard-cc istimewa" for="sempurna11"></label>
    </div>
  </td>
    <td>
    <div class="cc-selector" onMouseDown="istimewa.play()">
    <input id="sangatbaik11" type="radio" name="Easy_Way" value="4"/>
    <label class="drinkcard-cc istimewa" for="sangatbaik11"></label>
    </div>
  </td>
    <td>
    <div class="cc-selector" onMouseDown="baik.play()">
    <input id="baik11" type="radio" name="Easy_Way" value="3"/>
    <label class="drinkcard-cc baik" for="baik11"></label>
    </div>
  </td>
    <td>
    <div class="cc-selector" onMouseDown="cukup.play()">
    <input id="lumayan11" type="radio" name="Easy_Way" value="2"/>
    <label class="drinkcard-cc cukup" for="lumayan11"></label>
    </div>
  </td>
    <td>
    <div class="cc-selector" onMouseDown="buruk.play()">
    <input id="buruk11" type="radio" name="Easy_Way" value="1"/>
    <label class="drinkcard-cc buruk" for="buruk11"></label>
    </div>
    </td>
</tr>
<tr>
<td><img src="img/Feedback Icons/departure.png" alt="ap1"></td>
     <td>LAYAR INFORMASI PENERBANGAN<input name="Flight_Info_12" type="hidden" value="12"> </td>
         <td>
  <div class="cc-selector" onMouseDown="sempurna.play()">
   <input id="sempurna12" type="radio" name="Flight_Info" value="5"/>
   <label class="drinkcard-cc istimewa" for="sempurna12"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="istimewa.play()">
   <input id="sangatbaik12" type="radio" name="Flight_Info" value="4"/>
   <label class="drinkcard-cc istimewa" for="sangatbaik12"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="baik.play()">
   <input id="baik12" type="radio" name="Flight_Info" value="3"/>
   <label class="drinkcard-cc baik" for="baik12"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="cukup.play()">
   <input id="lumayan12" type="radio" name="Flight_Info" value="2"/>
   <label class="drinkcard-cc cukup" for="lumayan12"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="buruk.play()">
   <input id="buruk12" type="radio" name="Flight_Info" value="1"/>
   <label class="drinkcard-cc buruk" for="buruk12"></label>
   </div>
   </td>
</tr>
<tr>
<td><img src="img/Feedback Icons/walker.png" alt="ap1"></td>
     <td>JARAK JALAN KAKI DI DALAM TERMINAL<input name="Distance_13" type="hidden" value="13"> </td>
         <td>
  <div class="cc-selector" onMouseDown="sempurna.play()">
   <input id="sempurna13" type="radio" name="Distance" value="5"/>
   <label class="drinkcard-cc istimewa" for="sempurna13"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="istimewa.play()">
   <input id="sangatbaik13" type="radio" name="Distance" value="4"/>
   <label class="drinkcard-cc istimewa" for="sangatbaik13"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="baik.play()">
   <input id="baik13" type="radio" name="Distance" value="3"/>
   <label class="drinkcard-cc baik" for="baik13"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="cukup.play()">
   <input id="lumayan13" type="radio" name="Distance" value="2"/>
   <label class="drinkcard-cc cukup" for="lumayan13"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="buruk.play()">
   <input id="buruk13" type="radio" name="Distance" value="1"/>
   <label class="drinkcard-cc buruk" for="buruk13"></label>
   </div>
   </td>
</tr>
<tr>
<td><img src="img/Feedback Icons/fast-food.png" alt="ap1"></td>
     <td>FASILITAS RESTORAN MAKAN<input name="Restaurant_Facility_14" type="hidden" value="14"> </td>
         <td>
  <div class="cc-selector" onMouseDown="sempurna.play()">
   <input id="sempurna14" type="radio" name="Restaurant_Facility" value="5"/>
   <label class="drinkcard-cc istimewa" for="sempurna14"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="istimewa.play()">
   <input id="sangatbaik14" type="radio" name="Restaurant_Facility" value="4"/>
   <label class="drinkcard-cc istimewa" for="sangatbaik14"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="baik.play()">
   <input id="baik14" type="radio" name="Restaurant_Facility" value="3"/>
   <label class="drinkcard-cc baik" for="baik14"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="cukup.play()">
   <input id="lumayan14" type="radio" name="Restaurant_Facility" value="2"/>
   <label class="drinkcard-cc cukup" for="lumayan14"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="buruk.play()">
   <input id="buruk14" type="radio" name="Restaurant_Facility" value="1"/>
   <label class="drinkcard-cc buruk" for="buruk14"></label>
   </div>
   </td>
</tr>
<tr>
<td><img src="img/Feedback Icons/wallet.png" alt="ap1"></td>
     <td>HARGA FASILITAS RESTORAN<input name="Restaurant_Price_15" type="hidden" value="15"> </td>
         <td>
  <div class="cc-selector" onMouseDown="sempurna.play()">
   <input id="sempurna15" type="radio" name="Restaurant_Price" value="5"/>
   <label class="drinkcard-cc istimewa" for="sempurna15"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="istimewa.play()">
   <input id="sangatbaik15" type="radio" name="Restaurant_Price" value="4"/>
   <label class="drinkcard-cc istimewa" for="sangatbaik15"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="baik.play()">
   <input id="baik15" type="radio" name="Restaurant_Price" value="3"/>
   <label class="drinkcard-cc baik" for="baik15"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="cukup.play()">
   <input id="lumayan15" type="radio" name="Restaurant_Price" value="2"/>
   <label class="drinkcard-cc cukup" for="lumayan15"></label>
   </div>
 </td>
   <td>
   <div class="cc-selector" onMouseDown="buruk.play()">
   <input id="buruk15" type="radio" name="Restaurant_Price" value="1"/>
   <label class="drinkcard-cc buruk" for="buruk15"></label>
   </div>
   </td>
</tr>
  </tbody>
  </table>
  <table>
    <tr>
      <td>
    <a href="index.php" class="btn btn-1x btn-1d" onMouseDown="button.play()"><img src="img/Feedback Icons/sweep.png" alt="ap1" width="5%" height="5%"> Kosongkan</a>
    </td>
    <td>

    <button class="btn btn-1 btn-1e" name="SUBMIT" id="submit_a" type="image" value="SUBMIT" onMouseDown="button.play()"><img src="img/Feedback Icons/checkmark.png" alt="ap1" width="5%" height="5%"> SUBMIT </button>
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
