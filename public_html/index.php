<?
session_start(); 
include ("funciones.php");
$pagina = $_REQUEST[pagina];
$nombreCategoria = $_REQUEST[nombreCategoria];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Le Potic - <? echo $nombreCategoria; ?></title>
<link href="CSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="slimbox/mootools.js"></script>
<script type="text/javascript" src="slimbox/slimbox.js"></script>
<link rel="stylesheet" href="slimbox/slimbox.css" type="text/css" media="screen" />
</head>

<body>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" class="contenedor">
  <tr>
    <td width="127" valign="top" class="botonera"><a href="index.php"><img src="imagenes/logo-estuches.jpg" alt="Estuches Le Potic" width="169" height="91" border="0" /></a>
    <br />
          <a href="?pagina=inicio">Home</a><br />
  Cat&aacute;logo<br />
<span class="chico">
<? linksCategorias() ?>
      </span><br />

          <!--
          Servicios<br />
          <span class="chico">
          - <a href="?pagina=entrega">puerta a puerta</a><br />
          - <a href="?pagina=impresion">impresi&oacute;n</a><br />
          - <a href="?pagina=estuches-a-medida">estuches a medida</a><br />
         
</span>
-->
          <a href="?pagina=links">Links</a><br />
    <a href="?pagina=contacto">Contacto</a> </a></td>
    <td width="823" valign="top" class="contenido">
    <?
    if(isset($_GET["pagina"]) and $_GET["pagina"]!="index" ){
		$pagina=$_GET["pagina"];
	}else{
		$pagina="inicio";
	};
	
	include($pagina.".php");
    ?>
    </td>
  </tr>
</table>
<p>&nbsp;<span class="firma"><b>.::</b> &nbsp;&nbsp;<a href="http://zaikoms.com.ar" target="_blank">Dise&ntilde;o web: <b>Zaikoms</b></a></span>   </p>
</body>
</html>