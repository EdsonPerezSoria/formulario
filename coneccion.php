<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EVENT</title>
</head>
<body>
<?php 
	$enlace = mysqli_connect("localhost","root","","formulario");

	if(!$enlace){
		die("no pudo conectarse a la base de datos". mysqli_error());
	}
	echo "coneccion exoitosa";

?>

</body>
</html>