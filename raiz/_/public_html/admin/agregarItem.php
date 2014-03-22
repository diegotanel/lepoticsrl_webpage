<?
$Submit = $_POST['Submit'];
if(isset($Submit))
	{
	$titulo = $_POST['titulo'];
	$precio = $_POST['precio'];
	$idCategoria = $_POST['idCategoria'];
	$descripcion = $_POST['descripcion'];
	$publicado = $_POST['publicado'];
	$foto = $HTTP_POST_FILES['foto']['name'];

	$agregar="insert into items (titulo, precio, idCategoria, descripcion, foto, publicado) values ('$titulo', '$precio', '$idCategoria', '$descripcion', '$foto', '$publicado')";
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

	$mensaje="<center><h3>item agregado con &eacute;xito!</h3> </center>";
	$estadoFormulario="oculto";
}

?>
<link href="admin.css" rel="stylesheet" type="text/css" />




<form action="" method="post" enctype="multipart/form-data" name="form" class="<? echo $estadoFormulario ?>" >

  <div align="left">

            <center><h1><img src="imagenes/agregar.png" width="128" height="128" /><br />
            Agregar item</h1></center>

    </div>

        <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
            <tr>
              <td colspan="2" align="left" valign="top" bgcolor="#FFCC66">T&iacute;tulo:<br />
                  <input name="titulo" type="text" class="campo100" id="titulo" /></td>
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
              <td width="129" align="left" valign="top" bgcolor="#FFCC66">Publicado:<br />
<label>
          <input name="publicado" type="radio" id="stock_0" value="1" checked="checked" />
              Si</label>
                  <label>
                    <input type="radio" name="publicado" value="2" id="stock_1" />
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