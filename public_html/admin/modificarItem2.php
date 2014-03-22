<?

$id = $_REQUEST['id'];
$modificar = $_POST['modificar'];

if(isset($modificar))
	{
	$titulo = $_POST['titulo'];
	$precio = $_POST['precio'];
	$idCategoria = $_POST['idCategoria'];
	$descripcion = $_POST['descripcion'];
	$publicado = $_POST['publicado'];
	
	
	$modificar="update items set titulo='$titulo', precio='$precio', idCategoria='$idCategoria', descripcion='$descripcion', publicado='$publicado' where id=$id";
	mysql_query($modificar); 
	$mensaje= "<center><h3>Item modificado con &eacute;xito </h3></center>";
	$estadoFormulario = oculto;
}

	$consulta = "select * from items where id=$id"; 
	$resultado = mysql_query($consulta);
	$fila = mysql_fetch_assoc($resultado);
	
?>
<link href="admin.css" rel="stylesheet" type="text/css" />
         


        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top" class="<? echo $estadoFormulario ?>" >
              <center> <h1><img src="imagenes/editar.png" width="128" height="128" /><br />
                   Modificar item</h1></center>  
			  <?


?>
<form action="" method="POST">
        <table width="600" border="0" align="center" cellpadding="3" cellspacing="0" class="tabla-admin">
            <tr>
              <td colspan="2" align="left" valign="top" bgcolor="#FFCC66">Titulo: <br />
              <input name="titulo" type="text" class="campo100" id="nombreProducto" value="<? echo $fila['titulo']; ?>" /></td>
              <td width="50%" rowspan="4" align="left" valign="top" bgcolor="#FFCC66">Descripci&oacute;n:<br />
                <textarea name="descripcion" rows="7" class="campo100" id="descripcion"><? echo $fila['descripcion']; ?></textarea>
                <br />
              <p></p></td>
            </tr>
            <tr valign="top">
              <td colspan="2" align="left" bgcolor="#FFCC66">Categor&iacute;a:<br />
              <? 
			  comboModificaCategoria($fila['idCategoria']); 
			   ?> </td>
            </tr>
            <tr valign="top">
              <td width="22%" align="left" bgcolor="#FFCC66">Precio:<br />
              <input name="precio" type="text" class="campo100" id="precio" value=" <? echo $fila['precio']; ?> " size="20" /></td>
              <td width="28%" align="left" bgcolor="#FFCC66">Publicado:<br />
                <label>
                  <input name="publicado" type="radio" id="stock_0" value="1" <? if($fila['publicado']=='1'){echo "checked=\"checked\"";} ?> />
                  Si</label>
                <label>
                  <input type="radio" name="publicado" value="0" id="stock_1" <? if($fila['publicado']=='0'){echo "checked=\"checked\"";} ?>/>
              No</label></td>
            </tr>
            <tr valign="top">
              <td colspan="2" align="left" bgcolor="#FFCC66">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top" bgcolor="#FFCC66"><input name="modificar" type="submit" value="Modificar" id="modificar" /></td>
          </tr>
  </table>
        <br />

        <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
          <tr class="tabla-usuarios">
            <td align="left" valign="top" bgcolor="#FFCC66">Foto:
              <table width="115" border="0" align="center" cellpadding="0" cellspacing="5">
              <tr>
                <td width="105" align="center" valign="top">
                <? if (!$fila['foto']){
							echo "<img src=\"../fotos/sin-foto.jpg\" width=\"100\" border=\"0\" />";
						}else{
							echo "<img src=\"../fotos/".$fila['foto']." \" width=\"100\" border=\"0\" />";
					}
					?>
                </td>
                </tr>
              <tr>
                <td align="center"><a href="?pagina=modificarFoto&fotoACambiar=foto&id=<? echo $fila["id"]; ?>" >Cambiar</a></td>
                </tr>
              <tr>
                <td align="center"><a href="?pagina=borrarFoto&id=<? echo $fila["id"]; ?>" >Borrar</a></td>
                </tr>
            </table></td>
          </tr>
        </table>
        </form>
<p>&nbsp;</p>

&nbsp;</td>
            </tr>
  </table>
       


</body>
</html>