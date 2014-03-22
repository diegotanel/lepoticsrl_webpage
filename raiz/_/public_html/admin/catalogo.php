<?
$nombreCategoria = $_GET["nombreCategoria"];
$idCategoria = $_GET["idCategoria"];


if (isset ($idCategoria)){
		$consulta = "select * FROM productos LEFT JOIN categorias ON  productos.idCategoria = categorias.idCategoria WHERE productos.idCategoria = '$idCategoria' ORDER BY productos.nombreProducto";
	}
	
	
// if (isset ($idMarca)){
//		$consulta = "SELECT * FROM productos LEFT JOIN marcas ON  productos.idMarca = marcas.idMarca WHERE marcas.nombreMarca =  '$nombreMarca'	";}
	
?>
<link href="CSS.css" rel="stylesheet" type="text/css" />


<h1><? echo $nombreCategoria ;?> </h1>

<?		
		
	
$resultado = mysql_query($consulta);

while (@$fila = mysql_fetch_assoc($resultado)){
	
$contenido = $fila
?>
<div class="producto">
<table width="192" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" background ="imagenes/fondo-productos.jpg" class="catalogo-medio">  <a href="?pagina=verProducto&id=<? echo $fila['id']; ?> "/><img src="fotos/miniaturas/<? echo $fila['foto']; ?> " alt="" border="0" class="foto-producto" /> </a>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" background ="imagenes/fondo-productos.jpg"><img src="imagenes/separador.jpg" width="220" height="27" /></td>
  </tr>
  <tr>
    <td height="77" background="imagenes/fondo-descripcion.jpg" class="catalogo-abajo">         <span class="titulo-producto"><strong> <? echo $fila['titulo']; ?> </strong></span><br />
      <? 
			$texto = $fila['descripcion'];
			echo acortaTexto($texto, 50); ?> <br />
      <b><? echo "$ ".$fila['precio']; ?></b>
      <a href="?pagina=verProducto&id=<? echo $fila['id']; ?>" class="catalogo-ver-mas">  +info / comprar</a></td>
  </tr>
</table>
</div>
<?
};



if (empty($contenido)){
	echo "<p>No hay productos en esta secci&oacute;n</p>"; }
	?>