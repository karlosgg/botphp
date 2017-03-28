<?php

$botToken = "276122011:AAFj_3j1_VeVsyKNzyYQYyYcV9lqqg9prto";
$url = "https://api.telegram.org/bot" . $botToken;

?>
<html>
<head><title>Enviar Archivo</title></head>
<body>
	<form action="<?php echo $url.'/sendPhoto' ?>" method="post" enctype="multipart/form-data">
		<input type="text" name="chat_id" value="<?php echo $GET['id']?>" />
		<input type="file" name="photo" />
		<input type="submit" value="send" />
	</form>
</body>
</html>