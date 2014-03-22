<?
include ("../funciones.php");
session_start(); 
if($_SESSION["adminAutorizado"]!=1){
    header("location: identificarse.php");
}

if(isset($_GET["pagina"]) and $_GET["pagina"]!="index" ){
	$pag=$_GET["pagina"].".php";
}else{
	$pag="";
	$nombreAdmin = $_SESSION["nombreAdmin"];
	$mensaje="<center><h3>Bienvenido ".$nombreAdmin." al panel de administraci&oacute;n de tu sitio web</h3></center>";
	}
	



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administraci&oacute;n de contenidos</title>
<link href="admin.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script></head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="fondo">
  <tr>
    <td align="center" valign="top" class="arriba"><a href="http://www.zaikoms.com.ar" target="_blank"><img src="imagenes/logo.jpg" alt="" width="177" height="99" hspace="0" vspace="0" border="0" align="left" /></a>
      <table  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center">
          <td height="46" colspan="6"><span class="Estilo5">Administraci&oacute;n  contenidos</span></td>
        </tr>
        <tr align="center" valign="bottom">
          <td width="134" height="31" ><a href="?pagina=agregarItem" class="boton">Agregar Item</a></td>
          <td width="134"><a href="?pagina=modificarItem" class="boton">Modificar Item</a></td>
           <td width="134"><a href="?pagina=eliminarItem" class="boton">Eliminar Item</a></td>
           <td width="50">&nbsp;</td>
           <td width="5"><a href="?pagina=agregarCategoria" class="boton">Agregar Categor&iacute;a</a></td>
           <td width="6"><a href="?pagina=eliminarCategoria" class="boton">Eliminar Categor&iacute;a</a></td>
         
          
        </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" class="medio">
	<? 
	if ($pag){
	include($pag); }
	echo $mensaje;
	?>
     </td>
  </tr>
  <tr>
    <td valign="bottom" class="abajo Estilo16"><p>&nbsp;</p>
      <blockquote>
        <p class="Estilo17">Este panel de administraci&oacute;n fue desarrollado por <a href="http://www.zaikoms.com.ar" target="_blank">Zaikoms // Dise&ntilde;o Web.</a><br />
        Ante cualquier inquietud sobre su uso puede escribir a <a href="mailto:info@zaikoms.com.ar">info@zaikoms.com.ar</a></p>
    </blockquote></td>
  </tr>
</table>
</body>
</html>