<?
session_start();
//include ("funciones.php");

define ('paginaAnterior',"$_SERVER[HTTP_REFERER]");
$id = $_REQUEST ['id'];
$fila = muestraItem($id);
$agregar = $_REQUEST['agregar'];
$cantidad = $_REQUEST['cantidad'];

if (isset($agregar)){
	$color = $_REQUEST['color'];
	$talle = $_REQUEST['talle'];
	$idMarca = $fila['idMarca'];
	if(!$cantidad){
		$cantidad ='1';}
		else{
			$cantidad = $_REQUEST['cantidad'];
		}
	agregarAlCarrito($cantidad, $fila[nombreProducto], $fila[precio], $id, $idMarca, $color, $talle);	
	
}
?>
<link href="CSS.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

<body onLoad="MM_preloadImages('imagenes/volver-catalogo-2.jpg')">
<table width="100" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><? if ($fila['foto']){ 
		  ?>
      <a rel="lightbox[]" href="fotos/<? echo $fila['foto']; ?>" title="<? echo $fila['titulo']; ?>"><img src="fotos/grandes/<? echo $fila['foto']; ?>" alt="" width="400" border="1" class="foto-producto-ampliado" /></a><br />
      <div class="lupa-ampliar"><img src="imagenes/lupa-ampliar.png" alt="click en la imagen para ampliar" width="157" height="62"  /></div>
    <?
	}else{
		echo "<img src=\"imagenes/sin-foto.jpg\" border=\"0\" class=\"foto-producto-ampliado\" />";
		}
		?></td>
  </tr>
</table>
 <h1><? echo $fila['titulo']; ?></h1>
        <p><? echo $fila['descripcion']; ?><br /><br />
          <!--
          <? echo "Precio unitario: $ ".$fila['precio']; ?></p>
          
          <form action="" method="POST">

          <p>cantidad: 
          <input name="cantidad" type="text" id="cantidad" size="4" />
&nbsp;&nbsp;&nbsp;</p>
          <p>
            <input type="submit" name="agregar" id="agregar" value="Agregar al Carrito" />
          </p>
          </form>
          -->
        <p><a href="<? echo paginaAnterior; ?>"><input name="" type="button" value="Volver al cat&aacute;logo"></a></p>

<center >
<span class="texto-blanco">
  <a href="<? echo paginaAnterior; ?>" ></a>
  </span>
</center>
