<?
$eliminar = $_REQUEST['eliminar'];
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];

if(isset($eliminar)){
	mysql_query("DELETE from items where id='$id'");
	$estadoFormulario="oculto";
	$mensaje="<center><h3>Item eliminado con &eacute;xito!</h3></center>";	
}
     
//$consulta = "select * from productos";
$consulta = "select * FROM items LEFT JOIN categorias ON  items.idCategoria = categorias.idCategoria ORDER BY categorias.nombreCategoria";
$resultado = mysql_query($consulta);


	
?>
<link href="admin.css" rel="stylesheet" type="text/css" />

          <div class=" <? echo $estadoFormulario ?>" >
            <center><h1><img src="imagenes/borrar.png" width="128" height="128" /><br />
            Eliminar item</h1></center></div>
          
          <table width="100%" height="119" border="0" cellpadding="2" cellspacing="0" class="<? echo $estadoFormulario ?>">
          <tr valign="top" class="tabla-borrar">
         
            <td height="32" align="left">
              <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
                <tr>
                  <td width="30" bgcolor="#FFCC66" class="lista-usuarios">&nbsp;</td>
                  <td width="106" bgcolor="#FFCC66" class="lista-usuarios"><b>Categor&iacute;a</b></td>
                  <td width="136" bgcolor="#FFCC66" class="lista-usuarios"><strong>T&iacute;tulo</strong></td>
                  <td width="425" bgcolor="#FFCC66" class="lista-usuarios"><b>Descripci&oacute;n</b></td>
                  <td width="63" align="center" bgcolor="#FFCC66" class="lista-usuarios"><img src="imagenes/borrar30.png" width="30" height="30" /></td>
                </tr>
<?             
 while ($fila = mysql_fetch_array($resultado)) 
{                 
 ?>            
 <tr onMouseOver="this.style.background='#FFE1A4';"  onMouseOut="this.style.background='#ffffff';" > <form action="" method="POST" enctype="multipart/form-data">
                  <td class="lista-usuarios"><img src="../fotos/miniaturas/<? echo $fila['foto']; ?> " height="30" /></td>
                  <td class="lista-usuarios"><? echo $fila["nombreCategoria"]; ?></td>
                  <td class="lista-usuarios"><input type="hidden" name="id" id="id" value="<? echo $fila["id"]; ?>" />                    <? echo $fila['titulo']; ?></td>
                  <td class="lista-usuarios">	<? echo acortaTexto($fila["descripcion"], 35); ?></td>
              <td align="center" class="lista-usuarios"><input type="submit" name="eliminar" value="Eliminar" id="eliminar" /></td>
                </form></tr>
             

<?
} 	
		
?>
              </table>
</table>    