<?php

require('../data/connect.php');
	if (!$db) {
	  $text = "Error al conectar.";
	  exit;
	}

	$result = pg_query($db, "SELECT count(*) as nom FROM Clientes ");
	if ($result) {
		
		//pg_query($db, "INSERT INTO Clientes (Nombre, Chat) VALUES ('".$nombre."','".$chatId."')");
		$res=0;
		while($row=pg_fetch_assoc($result)){
			$res=  $row['nom'];
		}

			 echo $res. " clientes registrados.";

	 

	}
	
	$r= pg_query($db, "SELECT IdCliente as id, Nombre as nom, Chat as cid FROM Clientes");
	if ($result) {
		while($row=pg_fetch_assoc($r)){
			echo $row['id']." - ".$row['nom']." ".$row['cid'];
		}

	}else{
		$text.="Error";
	}
	pg_close($db);


?>