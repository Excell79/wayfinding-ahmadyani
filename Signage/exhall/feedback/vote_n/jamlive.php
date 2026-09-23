<script language="JavaScript">
function tampilkanjam()
{
var waktu = new Date();
var jam = waktu.getHours();
var menit = waktu.getMinutes();
var detik = waktu.getSeconds();
var teksjam = new String();

if ( menit <= 9 )
menit = "0" + menit;
if ( detik <= 9 )
detik = "0" + detik;

teksjam = jam + ":" + menit + ":" + detik;
tempatjam.innerHTML = teksjam;
setTimeout ("tampilkanjam()",1000);
}
window.onload = tampilkanjam
</script>

<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayTime(){
        //buat object date berdasarkan waktu saat ini
        var time = new Date();
        //ambil nilai jam,
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = time.getHours() + "";
        //ambil nilai menit
        var sm = time.getMinutes() + "";
        //ambil nilai detik
        var ss = time.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
</head>
<body onLoad="displayTime();setInterval('displayTime()', 1000);">
<?php
date("l");
if (date("l")=="Sunday"){ echo "Minggu,  ";}
elseif (date("l")=="Friday"){ echo "Jumat,  ";}
elseif (date("l")=="Monday"){ echo "Senin,  ";}
elseif (date("l")=="?Tuesday"){ echo "Selasa,  ";}
elseif (date("l")=="Wednesday"){ echo "Rabu,  ";}
elseif (date("l")=="Saturday"){ echo "Sabtu,  ";}
else { echo "Kamis,  ";} 
echo date('d ');
date("F");
if (date("F")=="January"){ echo "Januari ";}
elseif (date("F")=="February"){ echo "Februari ";}
elseif (date("F")=="March"){ echo "Maret ";}
elseif (date("F")=="April"){ echo "April ";}
elseif (date("F")=="May"){ echo "Mei ";}
elseif (date("F")=="June"){ echo "Juni ";}
elseif (date("F")=="July"){ echo "Juli ";}
elseif (date("F")=="August"){ echo "Agustus ";}
elseif (date("F")=="September"){ echo "September ";}
elseif (date("F")=="October"){ echo "Oktober ";}
elseif (date("F")=="November"){ echo "November ";}
else { echo "Desember";} 

echo date(' Y');
//echo "Jam | " ,date('H:i ');

?>
<span id="clock"></span> Time <span id="tempatjam"></span>

</body>