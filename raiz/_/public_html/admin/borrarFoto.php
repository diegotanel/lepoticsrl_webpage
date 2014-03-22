<?

$Submit = $_POST['Submit'];
$id = $_REQUEST['id'];
$fotoABorrar = $_REQUEST['fotoABorrar'];

$consulta = "select * from items where id=$id"; 
$resultado = mysql_query($consulta);
$fila = mysql_fetch_assoc($resultado);

if(isset($Submit))
{
mysql_query("update items set foto=NULL where id=$id");

$estadoFormulario2="oculto";
echo "<center><h3>Foto eliminada!</h3><a href=\"javascript:history.go(-2)\"> click acá para regresar al panel anterior</a></center>";
}
?>
<link href="admin.css" rel="stylesheet" type="text/css">
<form action="" method="post" enctype="multipart/form-data" name="form" class="<? echo $estadoFormulario2 ?>" >

         
        <table width="250" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
            <tr>
              <td align="center" valign="top" bgcolor="#FFCC66"><p><b>Borrar la  imagen?</b><br>
                <? if (!$fila['foto']){
							echo "<img src=\"../imagenes/sin-foto.jpg\" width=\"100\" border=\"0\" />";
						}else{
							echo "<img src=\"../fotos/".$fila['foto']." \" width=\"100\" border=\"0\" />";
					}
					?>
                <br />
              <br />
                  <input name="Submit" type="submit" value="Confirmar Borrado" id="Submit" />
              <br />
              </p>
              </p></td>
            </tr>
  </table>
</form>
