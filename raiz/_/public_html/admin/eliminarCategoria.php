<?
$eliminar = $_REQUEST['eliminar'];
$idCategoria = $_REQUEST['idCategoria'];
$nombre = $_POST['nombre'];

if(isset($eliminar)){
	mysql_query("DELETE from categorias where idCategoria='$idCategoria'");
	$estadoFormulario="oculto";
	$mensaje="<center><h3>Categor&iacute;a eliminada con &eacute;xito!</h3></center>";	
}
     
//$consulta = "select * from productos";
$consulta = "select * FROM categorias ";
$resultado = mysql_query($consulta);


	
?>
<link href="admin.css" rel="stylesheet" type="text/css" />

          <div class=" <? echo $estadoFormulario ?>" >
            <center><h1>Eliminar Categor&iacute;a</h1></center></div>
          
          <table width="100%" height="119" border="0" cellpadding="2" cellspacing="0" class="<? echo $estadoFormulario ?>">
          <tr valign="top" class="tabla-borrar">
         
            <td height="32" align="left">
              <table width="400" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
                <tr>
                  <td width="288" bgcolor="#FFCC66" class="lista-usuarios"><b>Categor&iacute;a</b></td>
                  <td width="92" align="center" bgcolor="#FFCC66" class="lista-usuarios"><img src="imagenes/borrar30.png" alt="" width="30" height="30" /></td>
                </tr>
<?             
 while ($fila = mysql_fetch_array($resultado)) 
{                 
 ?>            
  <tr onMouseOver="this.style.background='#FFE1A4';"  onMouseOut="this.style.background='#ffffff';" ><form action="" method="POST" enctype="multipart/form-data">
                  <td class="lista-usuarios"><input type="hidden" name="idCategoria" id="idCategoria" value="<? echo $fila["idCategoria"]; ?>" />
                    <? echo $fila["nombreCategoria"]; ?></td>
              <td align="center" class="lista-usuarios"><input type="submit" name="eliminar" value="Eliminar" id="eliminar" /></td>
                </form></tr>
             

<?
} 	
		
?>
              </table>
</table>    