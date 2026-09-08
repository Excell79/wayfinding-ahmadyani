<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Feedback Bandara Ahmad Yani</title>
<link href="../vote/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vote/css/fids.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="jquery.ml-keyboard.css">
  <link rel="stylesheet" type="text/css" href="demo.css">
  <script src="jquery-1.11.0.min.js"></script>
  <script src="jquery.ml-keyboard.js"></script>
  <script src="demo.js"></script>
  <script>
var button = new Audio();
button.src = '../vote/button.mp3';
</script>
  <script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
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
<link rel="shortcut icon" href="#">
<?php
$page = "../index.html";
$sec = "180";
?>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>

<body>
  <div class="header">
    <a href="../../feedback">
<button onClick="document.location.href='../../feedback'" class="buttonBg">Go Back</button></a> <b>Feedback</b> System

  </div>
  <br>
  <br>
  <br>
<form method="post" action="insert2.php">
  <?php
  $length = 10;
  $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
  $cookie = $randomString;
  ?>
<table width=100%>
<tr>
<td>
<input name="cookies" type="hidden" value="<?php echo $cookie; ?>">

    <h2 class="page-header"><font color="#FFFFFF">Kritik dan Saran</font></h2>
    <div class="row">
      <div class="col-md-12">
        <input name="name" type="text" id="name" class="col-md-12" placeholder="NAMA" style="width:700px; height:40px;"/>
      </div>
	  <div class="col-md-12">
        <input name="contact" type="text" id="contact" class="col-md-12" placeholder="No telpon : 024 000000" style="width:700px; height:40px;"/>
      </div>
	   <div class="col-md-12">
        <input name="email" type="text" id="email" class="col-md-12" placeholder="EMAIL : SAMPLE@gmail.com" style="width:700px; height:40px;"/>
      </div>
	   <div class="col-md-12">
	  <div class="styled-select">
		<select name="gender" id="gender" required>
		  <option value="0">Pilih Jenis Kelamin</option>
		  <option value="1">Laki-Laki</option>
		  <option value="2">Perempuan</option>
		</select>
    <br>
		<select name="subject" id="subject" required>
		  <option value="0">Pilih Tipe Feedback</option>
                  <option value="1">Saran</option>
                  <option value="2">Komplain</option>
                  <option value="3">Lainnya</option>
		</select>
      </div>
	  </div>
	  <div class="col-md-12">
	  <h3><font color="#FFFFFF">Isikan komentar atau saran (COMPLAINT)</font></h3>

		<input style="width:700px; height:60px;" type="text" name="coment" id="coment" class="col-md-12" required/>
      </div>
<div class="col-md-12">
      <a href="index.php" class="btn btn-1x btn-1d" onMouseDown="button.play()"><img src="../vote/img/er.png" alt="ap1"> Kosongkan</a>

      <button class="btn btn-1 btn-1e" name="submit" type="image" id="submit" value="SUBMIT" onMouseDown="button.play()" onClick="MM_validateForm('name','','R');
      MM_validateForm('contact','','RisNum');
      MM_validateForm('email','','RisEmail');
      return document.MM_returnValue"><img src="../vote/img/sb.png" alt="ap1"> SUBMIT </button>
          </div>
  </div>

</td>
</tr>
</table>
</form>
</body>
</html>
