<?php
   $host        = "host=ec2-54-163-233-89.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "d93o9hfi386ju7";
   $credentials = "user=aahmvpcqkyrxhi password=2f787330230735cc61d02129305fb98cbb54107ceb2894ba9956c8789d381624";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
?>