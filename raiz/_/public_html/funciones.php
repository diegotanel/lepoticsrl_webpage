<?
include ("conexion.php");


function loginUsuarios($nombreUsuario, $claveUsuario){
	session_start(); 
	$nombreUsuario=$_POST["nombreUsuario"];
	$claveUsuario=$_POST["claveUsuario"];

	$query="SELECT * FROM usuarios WHERE nombreUsuario='$nombreUsuario' AND claveUsuario='$claveUsuario'";
	$resultado = mysql_query ($query);
	$registro = mysql_fetch_array ($resultado);
    
	if  ($registro){
    	$_SESSION["usuario"]["autorizado"]=1;   
		$_SESSION["usuario"]["nombreUsuario"]= $registro["nombreUsuario"];
		$_SESSION["usuario"]["mailUsuario"]= $registro["mailUsuario"];
		
		echo "<script>document.location.href='?pagina=comprar'</script>";
	}else{
		unset($_SESSION["usuario"]);
    	$_SESSION["usuario"]["autorizado"]=0;
		$error = "Los datos ingresados no son correctos";
		}

}

function agregarAlCarrito($cantidad, $producto, $precio, $id, $idMarca, $color, $talle){
	session_start();
  
    $ultimo = count($_SESSION["carrito"]) +1 ;		// cuantos relglones hay?
	$_SESSION["carrito"][$ultimo]["orden"] = $ultimo;
	$_SESSION["carrito"][$ultimo]["idProducto"] = $id;
	$_SESSION["carrito"][$ultimo]["idMarca"] = $idMarca;
    $_SESSION["carrito"][$ultimo]["producto"] = $producto;
	$_SESSION["carrito"][$ultimo]["cantidad"] = $cantidad;
    $_SESSION["carrito"][$ultimo]["precio"] = $precio;
	$_SESSION["carrito"][$ultimo]["color"] = $color;
	$_SESSION["carrito"][$ultimo]["talle"] = $talle;
	
	//echo $ultimo;
	//header("Location: $paginaAnterior");
    echo "<script>window:history.go(-2)</script>";
}

function vaciarCarrito(){
	unset($_SESSION["carrito"]);
	echo "<script>window:history.go(-1)</script>";
	}

function linksCategorias(){
	$consulta = "select * from categorias ORDER BY nombreCategoria";
	$resultado = mysql_query($consulta);
	while ($fila = mysql_fetch_assoc($resultado)){
		echo "-  <a href=\"?pagina=catalogo&idCategoria=".$fila[idCategoria]."\">".$fila[nombreCategoria]."</a><br>  ";
	}
	;
}

function comboCategorias(){
	$consulta = "select * from categorias";
	$resultado = mysql_query($consulta);
	echo " <select name=\"idCategoria\" class=\"campo100\" id=\"idCategoria\">";
	while ($fila = mysql_fetch_assoc($resultado)){
		echo " <option value=".$fila[idCategoria].">".$fila[nombreCategoria]."</option>";
	}
	echo "</select> ";
}

function comboModificaCategoria($seleccionada){
	$consulta = "select * from categorias";
	$resultado = mysql_query($consulta);
	echo " <select name=\"idCategoria\" class=\"campo100\" id=\"idCategoria\">";
	while ($fila = mysql_fetch_assoc($resultado)){
		if ($fila[idCategoria] == $seleccionada) {
			$seleccion = " selected=\"selected\"";
			}else{
				$seleccion = '';}
		echo " <option value=".$fila[idCategoria]." ".$seleccion." >".$fila[nombreCategoria]."</option>";
	}
	echo "</select> ";
}

function muestraItem($id){
	$consulta = "select * from items WHERE id = '$id'";
	$resultado = mysql_query($consulta);
	$fila = mysql_fetch_assoc($resultado);
	return $fila;
}


function acortaTexto($texto, $tamano)
	{
		$contador = 0;
		$texto = strip_tags($texto); // eliminar todas etiquetas
		$texto = trim ($texto); //eliminar los espacios en blanco de mas
		$largoOriginal = strlen($texto);
		
		if (strlen($texto) > $tamano){ 
			$cierre = "...";
		}else{
			$cierre = "";}
		 
		// Cortar la cadena por los espacios
		$arrayTexto = split(' ',$texto);
		$texto = '';
 
		// Reconstruir la cadena
		while($tamano >= strlen($texto) + strlen($arrayTexto[$contador])){
   			$texto .= ' '.$arrayTexto[$contador];
    		$contador++;
			}
		return $texto.$cierre;
	};
	
function redimensionar($img_original, $img_nueva, $TNMaxX, $TNMaxY) {	// Requiere galeria GD
	$img = ImageCreateFromJPEG($img_original); 		// crear imagen desde original
 				
	$img_nueva_calidad = 100;
	//$TNMaxX = 50;  //Ancho maximo
	//$TNMaxY = 50;  //Alto maximo

	// determina el tamaño de la imagen
	$imx = ImageSX($img);
	$imy = ImageSY($img);
	
	if($imx>$TNMaxX OR $imy>$TNMaxY ){

		//determina proporcion en unidades
		$x = $imx/$TNMaxX;
		$y = $imy/$TNMaxY;

		// calcula la escala
		if($x>$y) $scale = $TNMaxX/$imx;
		if($x<$y) $scale = $TNMaxY/$imy;
		if($x==$y) $scale = $TNMaxY/$imy;

		//Escala la imagen
		$img_nueva_anchura = intval($imx*$scale);
		$img_nueva_altura = intval($imy*$scale);
		
		$thumb = ImageCreateTrueColor($img_nueva_anchura,$img_nueva_altura); 	// crear imagen nueva
		ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura, $img_nueva_altura,ImageSX($img),ImageSY($img));	// redimensionar imagen original copiandola en la imagen	 
		ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);	// guardar la imagen redimensionada donde indicia $img_nueva
	}else{
		ImageJPEG($img,$img_nueva,$img_nueva_calidad);	
		}
};


function comprar(){
	
	ob_start();                     // inicia el buffer
	include("registroCompra.php");      // escribe el carrito en el buffer
	$verCompra = ob_get_contents();     // pasa el contenido del buffer a $carro
	ob_clean();                     // borra el buffer

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers = 'Content-Type: text/html; charset="iso-8859-1"';
	$headers .= 'From: '.$nombre.' <'.$correo.'>';
	$headers .= 'Reply-To: '.$nombre.' <'.$correo.'>';
	$headers .= 'Message-ID: <'.$now.'TheSystem@'.$_SERVER['SERVER_NAME'].'>';
	$headers .= 'X-Mailer: PHP v5.2.2';
	$headers .= 'X-Sender:';
	$headers .= 'MIME-Version: 1.0';
	$headers .= 'Content-Transfer-Encoding: 8 bit';
	
	unset($_SESSION["carrito"]);
	
	mail('laura_vtas@yahoo.com.ar', 'COMPRA DESDE LA WEB', $verCompra, $headers);
	//mail('mrsaavedra@gmail.com', 'COMPRA DESDE LA WEB', $verCompra, $headers);


	echo "<script>document.location.href='?pagina=comprado'</script>";
	
};

function salir(){
		unset($_SESSION["autorizado"]);
		echo "<script>document.location.href='index.php'</script>";
}
?>