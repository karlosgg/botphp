<?php

   $db = pg_connect( "postgres://aahmvpcqkyrxhi:2f787330230735cc61d02129305fb98cbb54107ceb2894ba9956c8789d381624@ec2-54-163-233-89.compute-1.amazonaws.com:5432/d93o9hfi386ju7"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }

   $id="350172762";
    $sql ="SELECT * FROM Clientes WHERE Chat=".$id;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)){
      echo "ID = ". $row[0] . "\n";
      echo "Nombre = ". $row[1] ."\n";
      echo "Chat = ". $row[2] ."\n";
   }
   echo "Operation done successfully\n";
   pg_close($db);
   //$ret=pg_query($db,"TRUNCATE TABLE Clientes");

   /*$sql =<<<EOF
   	CREATE TABLE Clientes (
    IdCliente   serial CONSTRAINT firstkey PRIMARY KEY,
    Nombre      varchar(200),
    Chat        varchar(100)
	);
EOF;

	$ret = pg_query($db, $sql);
	if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }*/
   //pg_close($db);
?>