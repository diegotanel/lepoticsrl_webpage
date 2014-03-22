<?
$nombreCategoria = $_GET["nombreCategoria"];
$idCategoria = $_GET["idCategoria"];


if (isset ($idCategoria)){
		$consulta = "select * FROM items LEFT JOIN categorias ON  items.idCategoria = categorias.idCategoria WHERE items.idCategoria = '$idCategoria' AND publicado='1' ORDER BY items.titulo";
	}
	
	
// if (isset ($idMarca)){
//		$consulta = "SELECT * FROM productos LEFT JOIN marcas ON  productos.idMarca = marcas.idMarca WHERE marcas.nombreMarca =  '$nombreMarca'	";}

$resultado1 = mysql_query($consulta);
$fila1 = mysql_fetch_assoc($resultado1);
	
?>
<link href="CSS.css" rel="stylesheet" type="text/css" />

<h1><? echo $fila1['nombreCategoria'] ;?> </h1>

<?		
		
	

$resultado = mysql_query($consulta);
while (@$fila = mysql_fetch_assoc($resultado)){
	
$contenido = $fila
?>
<div class="producto">
<table width="192" border="0" cellpadding="0" cellspacing="0" class="listado">
  <tr>
    <td valign="top"> 
     <a href="?pagina=verProducto&id=<? echo $fila['id']; ?> "/>
     <center><img src="fotos/miniaturas/<? echo $fila['foto']; ?> " alt="" border="0" class="foto-producto" /> </a></center><br />
 <a href="?pagina=verProducto&id=<? echo $fila['id']; ?> "/></a>
 <strong><? echo $fila['titulo']; ?></strong> <br />
    <span class="chico"><? 
			$texto = $fila['descripcion'];
			echo acortaTexto($texto, 43); ?></span> <br /><br />

      <!--
      <b><? echo "$ ".$fila['precio']; ?></b>
      -->
      <span class="catalogo-ver-mas"><a href="?pagina=verProducto&id=<? echo $fila['id']; ?>" >  +info</a></span></td>
  </tr>
  </table>
</div>
<?
};



if (empty($contenido)){
	echo "<p>No hay productos en esta secci&oacute;n</p>"; }
	?>