<?php
include("koneksi.php");//panggil file koneksi.php yang telah dibuat
if (isset($_POST['submit']))//mengambil variabel yang dikirim oleh page2.php
{
 $Name=$_POST['name'];
 $Gender=$_POST['gender'];
 $Contact=$_POST['contact'];
 $Subject=$_POST['subject'];
 $Email=$_POST['email'];
 $Coment=$_POST['coment'];
 $cookie=$_POST['cookies'];
 $query_insert="insert into person  (id_person,cookie,Name,Gender,Contact,Subject,Email,Coment,date_fb,flag)
 values('','$cookie','$Name','$Gender','$Contact','$Subject','$Email','$Coment',now(),'1')";
 $insert=mysql_query($query_insert);
 header("location:../end.php?nama=$Name");
}
else
{
}
?>
