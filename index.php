<!DOCTYPE html>
<html>
<head>
	<title>Conexión a la BDD</title>
</head>
<body>
	<?php
		include 'connection.php';

		dbConnection();
	?>

	<form action="login.php" method="post">
 		<p>User: <input type="text" name="user"/></p>
 		<p>Pass: <input type="password" name="password"/></p>
 		<p><input type="submit"/></p>
	</form>
</body>
</html>