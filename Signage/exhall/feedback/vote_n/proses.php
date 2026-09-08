<?php
 //mengambil variabel yang dikirim oleh page1.php
 if(isset($_POST["SUBMIT"]))
 {
if(empty($_POST['Airport_Transport']) && empty($_POST['Parking_Facility']) && empty($_POST['Parking_Price']) && empty($_POST['Trolley_Ready']) && empty($_POST['Waiting_Time']) && empty($_POST['Staff_Efficiency']) && empty($_POST['Staff_Attitude'])
                 && empty($_POST['Safety_Check']) && empty($_POST['Safety_Time']) && empty($_POST['Safety_Feel']) && empty($_POST['Easy_Way']) && empty($_POST['Flight_Info']) && empty($_POST['Distance']) && empty($_POST['Restaurant_Facility'])
                  && empty($_POST['Restaurant_Price']))
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

if(empty($_POST['Airport_Transport']) && empty($_POST['Parking_Facility']) && empty($_POST['Parking_Price']) && empty($_POST['Trolley_Ready']) && empty($_POST['Waiting_Time']) && empty($_POST['Staff_Efficiency']) && empty($_POST['Staff_Attitude'])
                 && empty($_POST['Safety_Check']) && empty($_POST['Safety_Time']) && empty($_POST['Safety_Feel']) && empty($_POST['Easy_Way']) && empty($_POST['Flight_Info']) && empty($_POST['Distance']) && empty($_POST['Restaurant_Facility'])
                  && empty($_POST['Restaurant_Price']))
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
