<?
$usuarioAdmin="lepotic";					//defino usuario administrador
$passAdmin="Kj?3A7Sz";							//defino usuario administrador	

function login($nombre, $password, $usuarioAdmin, $passAdmin){ 
    session_start();
    if (($usuarioAdmin==$nombre)&&($passAdmin==$password)){
 	$_SESSION["adminAutorizado"]=1;
	$_SESSION["nombreAdmin"]=$nombre;
	 }else{
        $_SESSION["adminAutorizado"]=0;
     }
return $_SESSION["adminAutorizado"];
};
?>