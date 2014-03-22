<?
$Submit = $_POST['Submit'];
if(isset($Submit))
	{
	$nombreCategoria = $_POST['nombreCategoria'];
	$agregar="insert into categorias (nombreCategoria) values ('$nombreCategoria')";
	mysql_query($agregar); 
	

	$mensaje="<center><h3>Categor&iacute;a agregada con &eacute;xito!</h3> </center>";
	$estadoFormulario="oculto";
}

?>
<link href="admin.css" rel="stylesheet" type="text/css" />




<form action="" method="post" enctype="multipart/form-data" name="form" class="<? echo $estadoFormulario ?>" >

  <div align="left">

            <center><h1>Agregar Categor&iacute;a</h1></center>

          </div>

        <table width="400" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
            <tr>
              <td align="left" valign="top" bgcolor="#FFCC66"><img src="imagenes/agregar30.png" width="30" height="30" align="right" /><br />
              Nombre:<br />
                  <input name="nombreCategoria" type="text" class="campo100" id="nombreCategoria" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center" valign="top" bgcolor="#FFCC66"><input name="Submit" type="submit" value="Agregar" /></td>
            </tr>
  </table>
</form>

</body>
</html>