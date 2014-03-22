<?
$Submit = $_POST['Submit'];
if(isset($Submit))
	{
	$nombreProducto = $_POST['nombreProducto'];
	$precio = $_POST['precio'];
	$idCategoria = $_POST['idCategoria'];
	$descripcion = $_POST['descripcion'];
	$stock = $_POST['stock'];
	$foto = $HTTP_POST_FILES['foto']['name'];

	$agregar="insert into productos (nombreProducto, precio, idCategoria, descripcion, foto, stock) values ('$nombreProducto', '$precio', '$idCategoria', '$descripcion', '$foto', '$stock')";
	mysql_query($agregar); 
	
if($_FILES["foto"]["name"])
{
    $i=$_FILES["foto"];
    if(
       ($i["type"]=="image/pjpeg"               //puedo subir un archivo y hacer un var_dump despues para ver el tipo
        or $i["type"]=="image/jpeg"
        or $i["type"]=="image/gif"
		 or $i["type"]=="image/png")
        and $i["size"]<=300000 and $i["error"]==0)
    {  
    move_uploaded_file($i["tmp_name"],"../fotos/".$i["name"]);           //mueve la imagen del temporal a una carpeta respetando el nombre original
	
	redimensionar("../fotos/".$i["name"],"../fotos/miniaturas/".$i["name"], 196, 140);     // crea y guarda miniatura de la foto
	redimensionar("../fotos/".$i["name"],"../fotos/grandes/".$i["name"], 400, 500);   
    }
	
}else{
	echo "<center><b>la foto no ha sido cargada</center></b>";}

	$mensaje="<center><h3>Producto agregado con &eacute;xito!</h3> </center>";
	$estadoFormulario="oculto";
}

?>
<link href="admin.css" rel="stylesheet" type="text/css" />




<form action="" method="post" enctype="multipart/form-data" name="form" class="<? echo $estadoFormulario ?>" >

  <div align="left">

            <h1>Agregar producto</h1>

          </div>

        <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
            <tr>
              <td colspan="2" align="left" valign="top" bgcolor="#FFCC66">Nombre:<br />
                  <input name="nombreProducto" type="text" class="campo100" id="nombreProducto" /></td>
              <td width="289" rowspan="7" align="left" valign="top" bgcolor="#FFCC66">Descripci&oacute;n:<br />
              <textarea name="descripcion" rows="11" class="campo100" id="descripcion"></textarea></td>
            </tr>
            <tr>
              <td colspan="2" align="left" valign="top" bgcolor="#FFCC66">Categor&iacute;a:<br />
              <? comboCategorias() ?>
              </td>
            </tr>
            <tr>
              <td width="152" align="left" valign="top" bgcolor="#FFCC66">Precio:<br />
              <input name="precio" type="text" class="campo100" id="precio" size="20" /></td>
              <td width="129" align="left" valign="top" bgcolor="#FFCC66">&nbsp;&nbsp;Stock:<br />
<label>
          <input name="stock" type="radio" id="stock_0" value="1" checked="checked" />
                Si</label>
                  <label>
                    <input type="radio" name="stock" value="2" id="stock_1" />
                  No</label>
                
             </td>
            </tr>
            

            <tr>
              <td colspan="2" align="left" valign="top" bgcolor="#FFCC66"> Foto:<br />
                <input name="foto" type="file" class="campo100" id="foto" />
                <br />
                <span class="letra-chica">(la imagen debe pesar menos de 300 kb)<br />
(ancho m&aacute;ximo recomendado: 700 pixeles)</span></td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top" bgcolor="#FFCC66"><input name="Submit" type="submit" value="Agregar" /></td>
            </tr>
  </table>
</form>

</body>
</html>