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
	
	$result = pg_query($db, "SELECT * FROM Clientes");
	if ($result) {
		$res=0;
		while($row=pg_fetch_assoc($result)){
			echo $row['IdCliente']." - ".$row['Nombre']." ".$row['Chat'];
		}

	}else{
		$text.="Error";
	}
	pg_close($db);


?>