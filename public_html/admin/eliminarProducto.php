<?
$eliminar = $_REQUEST['eliminar'];
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];

if(isset($eliminar)){
	mysql_query("DELETE from productos where productos.id='$id'");
	$estadoFormulario="oculto";
	$mensaje="<center><h3>Producto eliminado con &eacute;xito!</h3></center>";	
}
     
//$consulta = "select * from productos";
$consulta = "select * FROM productos LEFT JOIN categorias ON  productos.idCategoria = categorias.idCategoria ORDER BY categorias.nombreCategoria";
$resultado = mysql_query($consulta);


	
?>
<link href="admin.css" rel="stylesheet" type="text/css" />

          <div class=" <? echo $estadoFormulario ?>" >
            <h1>Eliminar producto</h1></div>
          
          <table width="100%" height="119" border="0" cellpadding="2" cellspacing="0" class="<? echo $estadoFormulario ?>">
          <tr valign="top" class="tabla-borrar">
         
            <td height="32" align="left">
              <table width="810" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
                <tr>
                  <td width="30" bgcolor="#FFCC66" class="lista-usuarios">&nbsp;</td>
                  <td width="106" bgcolor="#FFCC66" class="lista-usuarios"><b>Categor&iacute;a</b></td>
                  <td width="136" bgcolor="#FFCC66" class="lista-usuarios"><strong>Producto</strong></td>
                  <td width="425" bgcolor="#FFCC66" class="lista-usuarios"><b>Descripci&oacute;n</b></td>
                  <td width="63" bgcolor="#FFCC66" class="lista-usuarios">&nbsp;</td>
                </tr>
<?             
 while ($fila = mysql_fetch_array($resultado)) 
{                 
 ?>            
<tr bgcolor="#FFCC66"> <form action="" method="POST" enctype="multipart/form-data">
                  <td bgcolor="#FFFFFF" class="lista-usuarios"><img src="../fotos/miniaturas/<? echo $fila['foto']; ?> " height="30" /></td>
                  <td bgcolor="#FFFFFF" class="lista-usuarios"><? echo $fila["nombreCategoria"]; ?></td>
                  <td bgcolor="#FFFFFF" class="lista-usuarios"><input type="hidden" name="id" id="id" value="<? echo $fila["id"]; ?>" />                    <? echo $fila['nombreProducto']; ?></td>
                  <td bgcolor="#FFFFFF" class="lista-usuarios">	<? echo acortaTexto($fila["descripcion"], 60); ?></td>
              <td align="center" bgcolor="#FFFFFF" class="lista-usuarios"><input type="submit" name="eliminar" value="Eliminar" id="eliminar" /></td>
                </form></tr>
             

<?
} 	
		
?>
              </table>
</table>    