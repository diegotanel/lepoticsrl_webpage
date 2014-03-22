<link href="admin.css" rel="stylesheet" type="text/css" />
<h1>Modificar producto</h1>
                   <?
$consulta = "select * FROM productos LEFT JOIN categorias ON  productos.idCategoria = categorias.idCategoria ORDER BY categorias.nombreCategoria";
$resultado = mysql_query($consulta);


?>
                   <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="tabla-usuarios">
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
                     <tr bgcolor="#FFCC66">
                       <form action="" method="post" enctype="multipart/form-data">
                         <td bgcolor="#FFFFFF" class="lista-usuarios"><img src="../fotos/miniaturas/<? echo $fila['foto']; ?> " alt="" height="30" /></td>
                         <td bgcolor="#FFFFFF" class="lista-usuarios"><? echo $fila["nombreCategoria"]; ?></td>
                         <td bgcolor="#FFFFFF" class="lista-usuarios"><input type="hidden" name="id" id="id" value="<? echo $fila["id"]; ?>" />                           <? echo $fila['nombreProducto']; ?></td>
                         <td bgcolor="#FFFFFF" class="lista-usuarios"><? echo acortaTexto($fila["descripcion"], 35); ?></td>
                         <td align="center" bgcolor="#FFFFFF" class="lista-usuarios"><a href="?pagina=modificarProducto2&id=<? echo $fila["id"]; ?>">Editar</a></td>
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