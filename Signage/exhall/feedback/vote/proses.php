<?php 
 //mengambil variabel yang dikirim oleh page1.php 
 if(isset($_POST["SUBMIT"])) 
 {
if(empty($_POST['Airport_Cleanliness']) && empty($_POST['Friendliness_Of_Staff']) && empty($_POST['Departure_Facilities']) && empty($_POST['Arrival_Facilities']) && empty($_POST['Food_Beverages']) && empty($_POST['Shopping_Facilities']) && empty($_POST['Other_Facilities']))
							{
							header('Location: index.php');
							}
							else
							{
							include "insert.php";
							  $cookie=$_POST['cookies'];
							//header('Location: page3.php?cookies='.$_POST['cookies'].'');  
							header('Location: ../end.php?person=0&&cookies='.$_POST['cookies'].'');  
							}
  }
  else if(isset($_POST["NEXT"])) 
  {
  
if(empty($_POST['Airport_Cleanliness']) && empty($_POST['Friendliness_Of_Staff']) && empty($_POST['Departure_Facilities']) && empty($_POST['Arrival_Facilities']) && empty($_POST['Food_Beverages']) && empty($_POST['Shopping_Facilities']) && empty($_POST['Other_Facilities']))
							{
							header('Location: index.php');
							}
							else
							{
							include "insert.php";
							  $cookie=$_POST['cookies'];
							//header('Location: page2.php?cookies='.$_POST['cookies'].'');  
							header('Location: ../sender/index.php?cookies='.$_POST['cookies'].'');  
							}
 }
?>