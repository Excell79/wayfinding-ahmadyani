<?php

					include"koneksi.php"; //panggil file koneksi.php yang telah dibuat
					$cookie=$_POST['cookies'];
					 //Airport_Transport
										if (isset($_POST['Airport_Transport_1']) and isset($_POST['Airport_Transport']))
										{
												  $zx=$_POST['Airport_Transport_1'];
												  $ky=$_POST['Airport_Transport'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }

										$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Parking_Facility
										if (isset($_POST['Parking_Facility_2']) and isset($_POST['Parking_Facility']))
										{
												  $zx=$_POST['Parking_Facility_2'];
												  $ky=$_POST['Parking_Facility'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }
												  	$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Parking_Price
										if (isset($_POST['Parking_Price_3']) and isset($_POST['Parking_Price']))
										{
												  $zx=$_POST['Parking_Price_3'];
												  $ky=$_POST['Parking_Price'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }
												 	$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Trolley_Ready
										if (isset($_POST['Trolley_Ready_4']) and isset($_POST['Trolley_Ready']))
										{
												  $zx=$_POST['Trolley_Ready_4'];
												  $ky=$_POST['Trolley_Ready'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }
												 	$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Waiting_Time
										if (isset($_POST['Waiting_Time_5']) and isset($_POST['Waiting_Time']))
										{
												  $zx=$_POST['Waiting_Time_5'];
												  $ky=$_POST['Waiting_Time'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }
													$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Staff_Efficiency
										if (isset($_POST['Staff_Efficiency_6']) and isset($_POST['Staff_Efficiency']))
										{
												  $zx=$_POST['Staff_Efficiency_6'];
												  $ky=$_POST['Staff_Efficiency'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }
												 	$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}




									//Staff_Attitude
										if (isset($_POST['Staff_Attitude_7']) and isset($_POST['Staff_Attitude']))
										{
												  $zx=$_POST['Staff_Attitude_7'];
												  $ky=$_POST['Staff_Attitude'];
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
													elseif($ky=='5')
												 {
												 $status = '5';
												 }
													$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
										$insert=mysql_query($query_insert);
										}


										//Safety_Check
											if (isset($_POST['Safety_Check_8']) and isset($_POST['Safety_Check']))
											{
													  $zx=$_POST['Safety_Check_8'];
													  $ky=$_POST['Safety_Check'];
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
														elseif($ky=='5')
													 {
													 $status = '5';
													 }
														$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
											$insert=mysql_query($query_insert);
											}

											//Safety_Time
												if (isset($_POST['Safety_Time_9']) and isset($_POST['Safety_Time']))
												{
														  $zx=$_POST['Safety_Time_9'];
														  $ky=$_POST['Safety_Time'];
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
															elseif($ky=='5')
														 {
														 $status = '5';
														 }
															$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
												$insert=mysql_query($query_insert);
												}


												//Safety_Feel
													if (isset($_POST['Safety_Feel_10']) and isset($_POST['Safety_Feel']))
													{
															  $zx=$_POST['Safety_Feel_10'];
															  $ky=$_POST['Safety_Feel'];
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
																elseif($ky=='5')
															 {
															 $status = '5';
															 }
																$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
													$insert=mysql_query($query_insert);
													}


													//Easy_Way
														if (isset($_POST['Easy_Way_11']) and isset($_POST['Easy_Way']))
														{
																  $zx=$_POST['Easy_Way_11'];
																  $ky=$_POST['Easy_Way'];
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
																	elseif($ky=='5')
																 {
																 $status = '5';
																 }
																	$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
														$insert=mysql_query($query_insert);
														}


														//Flight_Info
															if (isset($_POST['Flight_Info_12']) and isset($_POST['Flight_Info']))
															{
																	  $zx=$_POST['Flight_Info_12'];
																	  $ky=$_POST['Flight_Info'];
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
																		elseif($ky=='5')
																	 {
																	 $status = '5';
																	 }
																		$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
															$insert=mysql_query($query_insert);
															}


															//Distance
																if (isset($_POST['Distance_13']) and isset($_POST['Distance']))
																{
																		  $zx=$_POST['Distance_13'];
																		  $ky=$_POST['Distance'];
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
																			elseif($ky=='5')
																		 {
																		 $status = '5';
																		 }
																			$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
																$insert=mysql_query($query_insert);
																}


																//Restaurant_Facility
																	if (isset($_POST['Restaurant_Facility_14']) and isset($_POST['Restaurant_Facility']))
																	{
																			  $zx=$_POST['Restaurant_Facility_14'];
																			  $ky=$_POST['Restaurant_Facility'];
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
																				elseif($ky=='5')
																			 {
																			 $status = '5';
																			 }
																				$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
																	$insert=mysql_query($query_insert);
																	}


																	//Restaurant_Price
																		if (isset($_POST['Restaurant_Price_15']) and isset($_POST['Restaurant_Price']))
																		{
																				  $zx=$_POST['Restaurant_Price_15'];
																				  $ky=$_POST['Restaurant_Price'];
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
																					elseif($ky=='5')
																				 {
																				 $status = '5';
																				 }
																					$query_insert="insert into rate_n (cookie,Id_vote,Id_unit,date_time) values('$cookie','$status','$zx',now())";
																		$insert=mysql_query($query_insert);
																		}


?>
