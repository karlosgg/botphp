<?php
	echo "<h1>MONITOR DE MI BOT</H1>";


	$botToken = "276122011:AAFj_3j1_VeVsyKNzyYQYyYcV9lqqg9prto";
	$web = "https://api.telegram.org/bot" . $botToken;

	//$update = file_get_contents($url.'/getupdates');
	$update = file_get_contents("php://input");

	//$updateArray=array();
	$updateArray = json_decode($update, true);

	$text = $updateArray["message"]["text"];
	$chatId=$updateArray["message"]["from"]["id"];

	print_r($chatId);

	
	require('../data/connect.php');
	if (!$db) {
	  $text = "Error al conectar.";
	  exit;
	}
	
	$result = pg_query($db, "SELECT * FROM Clientes WHERE Chat='".$chatId."'");
	if (!$result) {
		$text="";
		while ($row = pg_fetch_row($result)) {
			  $text.= "IdCliente: $row[0]  Nomre: $row[1]";
			}
	  $text. = "\nEl cliente no esta registrado.";

	}else{
		$text = "El cliente ya esta registrado.";
	}
	pg_close($db);

	enviaMensaje($chatId, $text);
	function enviaMensaje($chatId, $mensaje){
		if($mensaje=="hola"){
			$mensaje="Bienvenid@";
		}
		$urlM=$GLOBALS['web']."/sendmessage?chat_id=".$chatId."&text=".urldecode($mensaje);

		file_get_contents($urlM);
	}
	//print_r($updateArray);
//print_r($updateArray);
	/*$valor=array();
	foreach($updateArray["result"] as $valor) {
	
		echo "Actualizacion: ";
		print_r($valor["update_id"]);
		echo " , ";
		echo "Id de Chat: ";
		print_r($valor["message"]["from"]["id"]);
		print "<br>";
		echo "Nombre Cliente: ";
		print_r($valor["message"]["chat"]["first_name"]); echo " ";print_r($valor["message"]["chat"]["last_name"]);
		print "<br>";
		echo "Mensaje: ";
		if(isset($valor["message"]["text"])){
			print_r($valor["message"]["text"]);
		}
		echo "<br>";
		$micro_date = $valor["message"]["date"];
		//$date_array = explode(" ",$micro_date);
		$date = date("Y-m-d H:i:s",$micro_date);
		echo "Fecha: " . $date;
		
		
		print "<br><br>";
	}

	*/
?>

