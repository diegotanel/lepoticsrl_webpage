<?
session_start(); 
include("funcionesAdmin.php");

$nombre=$_POST["nombre"];
$password=$_POST["password"];

if(login($nombre, $password, $usuarioAdmin, $passAdmin)){
	header("location: index.php");
}else{
	header("location: identificarse.php?error=Los datos ingresados no son correctos");
}
?>