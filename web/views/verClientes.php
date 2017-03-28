<?php

require('../data/connect.php');
	if (!$db) {
	  $text = "Error al conectar.";
	  exit;
	}
	
	$result = pg_query($db, "SELECT *  FROM Clientes");
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