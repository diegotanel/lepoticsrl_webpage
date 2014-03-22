<?
include "../conexion.php";
$Submit = $_POST['Submit'];
$id = $_REQUEST['id'];
$fotoNueva = $HTTP_POST_FILES['foto']['name'];

if(isset($Submit))
{
	if($_FILES["foto"]["name"])
	{
		$i=$_FILES["foto"];
 	   if(
  	     ($i["type"]=="image/pjpeg"               //puedo subir un archivo y hacer un var_dump despues para ver el tipo
    	    or $i["type"]=="image/jpeg"
    	    or $i["type"]=="image/gif")
    	    and $i["size"]<=300000 and $i["error"]==0)
  	   				{  
   					move_uploaded_file($i["tmp_name"],"../fotos/".$i["name"]);           //mueve la imagen del temporal a una carpeta respetando el nombre original
  	 redimensionar("../fotos/".$i["name"],"../fotos/miniaturas/".$i["name"], 196, 140);     // crea y guarda miniatura de la foto
	redimensionar("../fotos/".$i["name"],"../fotos/grandes/".$i["name"], 400, 500);   
    }
					mysql_query("update items set foto='$fotoNueva' where id=$id");
					$estadoFormulario2="oculto";
					echo "<center><h3>Foto actualizada!</h3><a href=\"javascript:history.go(-2)\"> click acá para continuar</a></center>";
					
		}
}

?>

<link href="admin.css" rel="stylesheet" type="text/css">
<form action="" method="post" enctype="multipart/form-data" name="form" class="<? echo $estadoFormulario2 ?>" >

         
        <table width="350" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
            <tr>
              <td align="center" valign="top" bgcolor="#FFCC66"><p><b>Seleccionar nueva foto</b><br>
                <br />
               <input type="file" name="foto" id="foto" >
               <br />
               <span class="letra-chica">(la imagen debe pesar menos de 300 kb)
               <br />
               (tama&ntilde;o recomendado: 138 x 142 pixeles)</span></p>
                <br />
                  <input name="Submit" type="submit" value="Modificar la foto" id="Submit" />
              <br />
                  <br />
              </p></td>
            </tr>
  </table>
</form>