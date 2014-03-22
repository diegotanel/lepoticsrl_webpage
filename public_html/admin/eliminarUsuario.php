<?
$Submit = $_POST['Submit'];
$id = $_POST['id'];
$nombre = $_POST['nombre'];

if(isset($Submit)){
	include "../conexion.php";
	mysql_query("DELETE from usuarios where id='$id'");
	mysql_close($conexion);	
	$estadoFormulario="oculto";
	$mensaje="<center><h3>Usuario eliminado con &eacute;xito!</h3></center>";	
}
     
include "../conexion.php";
$consulta = "select * from usuarios ORDER BY id DESC";
$resultado = mysql_query($consulta);
mysql_close($conexion);

	
?>
<link href="admin.css" rel="stylesheet" type="text/css" />

<h1 class="<? echo $estadoFormulario ?>">Eliminar usuario</h1>
          <table width="100%" height="119" border="0" cellpadding="2" cellspacing="0" class="<? echo $estadoFormulario ?>">
          <tr valign="top" class="tabla-borrar">
         
            <td height="32" align="left">
              <table width="614" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
                <tr>
                  <td width="109" bgcolor="#FFCC66" class="lista-usuarios"><b>Usuario</b></td>
                  <td width="118" bgcolor="#FFCC66" class="lista-usuarios"><b>Clave</b></td>
                  <td width="220" bgcolor="#FFCC66" class="lista-usuarios"><b>Fecha de ingreso al sistema</b></td>
                  <td width="117" bgcolor="#FFCC66" class="lista-usuarios">&nbsp;</td>
                </tr>
<?             
 while ($fila = mysql_fetch_array($resultado)) 
{                 
 ?>            
<tr bgcolor="#FFCC66"> <form action="" method="POST" enctype="multipart/form-data">
                  <td bgcolor="#FFFFFF" class="lista-usuarios"><input type="hidden" name="id" id="id" value="<? echo $fila["id"]; ?>" />
                  <? echo $fila["nombre"]; ?></td>
                  <td bgcolor="#FFFFFF" class="lista-usuarios"><? echo $fila["password"]; ?></td>
                  <td bgcolor="#FFFFFF" class="lista-usuarios"><? echo $fila["fechaIngreso"]; ?></td>
              <td align="center" bgcolor="#FFFFFF" class="lista-usuarios"><input type="submit" name="Submit" value="Eliminar" /></td>
                </form></tr>
             

<?
} 	
		
?>
              </table>
</table>    