<link href="admin.css" rel="stylesheet" type="text/css" />
                  <center> <h1><img src="imagenes/editar.png" width="128" height="128" /><br />
                   Modificar item</h1></center>
                   <?
$consulta = "select * FROM items LEFT JOIN categorias ON  items.idCategoria = categorias.idCategoria ORDER BY categorias.nombreCategoria";
$resultado = mysql_query($consulta);


?>
                   <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
                     <tr>
                       <td width="30" bgcolor="#FFCC66" class="lista-usuarios">&nbsp;</td>
                       <td width="106" bgcolor="#FFCC66" class="lista-usuarios"><b>Categor&iacute;a</b></td>
                       <td width="136" bgcolor="#FFCC66" class="lista-usuarios"><strong>T&iacute;tulo</strong></td>
                       <td width="425" bgcolor="#FFCC66" class="lista-usuarios"><b>Descripci&oacute;n</b></td>
                       <td width="63" align="center" bgcolor="#FFCC66" class="lista-usuarios"><img src="imagenes/editar30.png" width="30" height="30" /></td>
                     </tr>
                     <?             
 while ($fila = mysql_fetch_array($resultado)) 
{                 
 ?>
                     <tr onMouseOver="this.style.background='#FFE1A4';"  onMouseOut="this.style.background='#ffffff';" >
                       <form action="" method="post" enctype="multipart/form-data">
                         <td  class="lista-usuarios"><img src="../fotos/miniaturas/<? echo $fila['foto']; ?> " alt="" height="30" /></td>
                         <td class="lista-usuarios"><? echo $fila["nombreCategoria"]; ?></td>
                         <td  class="lista-usuarios"><input type="hidden" name="id" id="id" value="<? echo $fila["id"]; ?>" />                           <? echo $fila['titulo']; ?></td>
                         <td  class="lista-usuarios"><? echo acortaTexto($fila["descripcion"], 35); ?></td>
                         <td align="center"  class="lista-usuarios"><a href="?pagina=modificarItem2&id=<? echo $fila["id"]; ?>"><input name="" type="button" value="Editar" /></a></td>
                       </form>
                     </tr>
                     <?
} 	
		
?>
                   </table>
                   <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td width="200" valign="top">&nbsp;
</td>
            </tr>
  </table>
       


</body>
</html>