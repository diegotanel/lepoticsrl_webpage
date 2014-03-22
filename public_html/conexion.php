<?
$server = "dbp01.lineadns.com";			// host del MySQL
$database = "lepotic_base";		// Selecciona la base de datos
$dbuser = "lepotic_lepotic";			// aqui debes ingresar el nombre de usuario para acceder a la base de datos
$dbpass = "Kj?3A7Sz";	// password de acceso para el usuario de la base de datos
$conexion = mysql_connect($server, $dbuser, $dbpass) or die("Error:".mysql_error()); // die Imprime un mensaje y termina el script actual
mysql_select_db($database, $conexion);
mysql_query ("SET NAMES 'iso-8859-1'");
?>