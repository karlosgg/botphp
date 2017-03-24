<?php

   $db = pg_connect( "postgres://aahmvpcqkyrxhi:2f787330230735cc61d02129305fb98cbb54107ceb2894ba9956c8789d381624@ec2-54-163-233-89.compute-1.amazonaws.com:5432/d93o9hfi386ju7"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   $ret=pg_query($db,"TRUNCATE TABLE Clientes");

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
   pg_close($db);
?>