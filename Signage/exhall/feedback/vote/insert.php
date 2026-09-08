<?php

					include"koneksi.php"; //panggil file koneksi.php yang telah dibuat
					$cookie=$_POST['cookies'];
					 //airport_cleaness
										if (isset($_POST['Airport_Cleanliness_1']) and isset($_POST['Airport_Cleanliness']))
										{
												  $zx=$_POST['Airport_Cleanliness_1'];
												  $ky=$_POST['Airport_Cleanliness'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }

										$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Friendliness_Of_Staff
										if (isset($_POST['Friendliness_Of_Staff_2']) and isset($_POST['Friendliness_Of_Staff']))
										{
												  $zx=$_POST['Friendliness_Of_Staff_2'];
												  $ky=$_POST['Friendliness_Of_Staff'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }
												  	$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Departure_Facilities
										if (isset($_POST['Departure_Facilities_3']) and isset($_POST['Departure_Facilities']))
										{
												  $zx=$_POST['Departure_Facilities_3'];
												  $ky=$_POST['Departure_Facilities'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }
												 	$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Arrival_Facilities
										if (isset($_POST['Arrival_Facilities_4']) and isset($_POST['Arrival_Facilities']))
										{
												  $zx=$_POST['Arrival_Facilities_4'];
												  $ky=$_POST['Arrival_Facilities'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }
												 	$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Food_Beverages
										if (isset($_POST['Food_Beverages_5']) and isset($_POST['Food_Beverages']))
										{
												  $zx=$_POST['Food_Beverages_5'];
												  $ky=$_POST['Food_Beverages'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }
													$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Shopping_Facilities
										if (isset($_POST['Shopping_Facilities_6']) and isset($_POST['Shopping_Facilities']))
										{
												  $zx=$_POST['Shopping_Facilities_6'];
												  $ky=$_POST['Shopping_Facilities'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }
												 	$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Other_Facilities
										if (isset($_POST['Other_Facilities_7']) and isset($_POST['Other_Facilities']))
										{
												  $zx=$_POST['Other_Facilities_7'];
												  $ky=$_POST['Other_Facilities'];
												  if($ky=='1')
												  {
												  $status = '1';
												  }
												  elseif($ky=='2')
												  {
												  $status = '2';
												  }
												   elseif($ky=='3')
												  {
												  $status = '3';
												  }
												   elseif($ky=='4')
												  {
												  $status = '4';
												  }
													$query_insert="insert into rate (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}


?>
