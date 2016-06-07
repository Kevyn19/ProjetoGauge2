 <?php 

 include("GaugeBD.php");


 $users = array();
 $interactions = array();
 $amount = 0;

 if(!isset($_POST["brands"]) || $_POST["brands"] === "0"){
 	$users = allUsers($conecta);

 	$amount = sizeof($users);

 	$interactions = allInteractions($amount,$conecta);


 } else{
 	$users = allUsers($conecta);

 	$amount = sizeof($users);

 	$interactions = specificInteractions($amount,$conecta);


 }

 ?>


 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<title>Untitled Document</title>

 	<link rel="stylesheet" href="css/bootstrap.css">
 	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 	<script type="text/javascript">
 		google.load('visualization','1',{'packages':['corechart']});

 		google.setOnLoadCallback(desenhaGrafico);

 		function desenhaGrafico() {

 			var data = new google.visualization.DataTable();

 			data.addColumn('string','users');
 			data.addColumn('number','interaction');

 			data.addRows(<?php echo $amount ?>);

 			<?php
 			$k = $amount;
 			for ($amount = 0; $amount < $k; $amount++) {
 				?>
 				data.setValue(<?php echo $amount ?>, 0, '<?php echo $users[$amount] ?>');
 				data.setValue(<?php echo $amount ?>, 1, <?php echo $interactions[$amount]?>);
 				<?php
 			}
 			?>


 			var options = {
 				title: 'Projeto Gauge',
 				width: 600, height: 300,
 				colors: ['blue'],
 				legend: {position: 'bottom'}
 			};


 			var chart = new google.visualization.LineChart(document.getElementById('chart_div'));


 			chart.draw(data, options);
 		}

 	</script>
 </head>


 <body>
 	<div class="jumbotron">
 		<div class="container">
 			<form action="ProjetoGauge.php" method="post">
 				<B>Escolha a Marca</B><br>
 				<input type=radio name=brands value="1"> Ambev 
 				<input type=radio name=brands value="2"> Nike
 				<input type=radio name=brands value="3"> Honda
 				<input type=radio name=brands value="4"> Oi 
 				<input type=radio name=brands value="5"> Itaú
 				<input type=radio name=brands value="0"> Todas
 				<br><br>

 				<input class="btn btn-default" type=submit>
 			</form>



 			<div id="chart_div"></div>

 		</div>
 	</div>
 </body>
 </html>
