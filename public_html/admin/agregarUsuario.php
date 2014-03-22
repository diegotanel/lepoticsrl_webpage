<?
$Submit = $_POST['Submit'];
if(isset($Submit))
	{
	include "../conexion.php";
	$nombreUsuario = $_POST['nombreUsuario'];
	$password = $_POST['password'];
	
	$agregar="insert into usuarios (nombreUsuario, password) values ('$nombreUsuario','$password')";
	mysql_query($agregar); 
	mysql_close($conexion);
	$mensaje="<center><h3>usuario agregado con &eacute;xito!</h3></center>";
	$estadoFormulario="oculto";
			}
?>
<link href="admin.css" rel="stylesheet" type="text/css" />

<form action="" method="post" enctype="multipart/form-data" name="form" class="<? echo $estadoFormulario ?>" >

          <div align="left">

            <h1>Agregar usuario nuevo</h1>

          </div>

        <table width="358" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td width="358" align="center" valign="top" bgcolor="#FFCC66" class="tabla-usuarios">
            <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="44%">Nombre del usuario:</td>
                <td width="56%"><input name="nombreUsuario" type="text" class="campoA" id="nombreUsuario" /></td>
              </tr>
              <tr>
                <td>Clave de acceso:</td>
                <td><input name="password" type="text" class="campoA" id="password" /></td>
              </tr>
              <tr>
                <td>Correo electr&oacute;nico:</td>
                <td><input name="correo" type="text" class="campoA" id="correo" /></td>
              </tr>
              <tr>
                <td>Tel&eacute;fono:</td>
                <td><input name="telefono" type="text" class="campoA" id="telefono" /></td>
              </tr>
              <tr>
                <td>Direcci&oacute;n:</td>
                <td><input name="direccion" type="text" class="campoA" id="direccion" /></td>
              </tr>
            </table>
            <p>
              <input name="Submit" type="submit" onclick="MM_validateForm('seccion','','R','titulo','','R');return document.MM_returnValue" value="Agregar" />
              <br />
            </p></td>

          </tr>

</table>

        </form>

</body>
</html>