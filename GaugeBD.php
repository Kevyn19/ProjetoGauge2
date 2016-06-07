<?php
@$conecta = mysql_connect("localhost", "root", "kevyn") or print (mysql_error()); 
mysql_select_db("gauge", $conecta) or print(mysql_error()); 




	 function allUsers($conecta){

	 	$users = array();

	 	$sql = "SELECT * FROM users"; 
	 	$result = mysql_query($sql, $conecta); 

	 	$i = 0;

	 	while($consultaUsers = mysql_fetch_array($result)) { 
	 		$users[$i] = $consultaUsers[5];

	 		$i = $i + 1;

	 	} 

	 	return $users;
	 }


	 function allInteractions($i,$conecta){

	 	 $interactions = array();

	 	for($j = 1; $j <= $i; $j++){

	 		$sql = "SELECT COUNT(idinteractions) FROM interactions WHERE user_id = '".$j."'"; 
	 		$result = mysql_query($sql, $conecta); 
	 		while($consultaMarcaPorUser = mysql_fetch_array($result)) {

	 			$interactions[$j-1] = $consultaMarcaPorUser[0];

	 		}
	 	}
	 	

	 	
	 	return $interactions;
	 	
	 }


	 function specificInteractions($i,$conecta){

	 	 $interactions = array();

	 	for($j = 1; $j <= $i; $j++){

	 		$sql = "SELECT COUNT(idinteractions) FROM interactions WHERE user_id = '".$j."' AND brand_id = '".$_POST["brands"]."'"; 
	 		$result = mysql_query($sql, $conecta); 
	 		while($consultaMarcaPorUser = mysql_fetch_array($result)) {

	 			$interactions[$j-1] = $consultaMarcaPorUser[0];

	 		}
	 	}
		
	 	return $interactions;
	 }


?>