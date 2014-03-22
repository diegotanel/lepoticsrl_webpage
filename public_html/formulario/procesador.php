<? 
/*
	 Tomamos las variables globales por el método $_POST['nombreVariable']
	 las ALMACENAMOS en variables locales $nombreVariable
*/
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$consulta = $_POST['consulta'];
	$consulta = nl2br($consulta);
	$localidad = $_POST['localidad'];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers = 'Content-Type: text/html; charset="iso-8859-1"';
	$headers .= 'From: '.$nombre.' <'.$correo.'>';
	$headers .= 'Reply-To: '.$nombre.' <'.$correo.'>';
	$headers .= 'Message-ID: <'.$now.'TheSystem@'.$_SERVER['SERVER_NAME'].'>';
	$headers .= 'X-Mailer: PHP v5.2.2';
	$headers .= 'X-Sender:';
	$headers .= 'MIME-Version: 1.0';
	$headers .= 'Content-Transfer-Encoding: 8 bit';
	$mensaje = "
<table width='500' cellpadding='0'>
	<tr>
	<td colspan='2'>
	  <h1>Consulta generada desde la web</h1><br>
	  </td>
	</tr>	
	<tr>
	  <td width='178' height='190' valign='top'>
 <table width='225' border='0' align='left' cellpadding='0' cellspacing='0'>
	    <tr>
          <td width='30' height='30' valign='top'><img src='http://www.lepoticsrl.com.ar/formulario/SI.jpg' width='30' height='30' hspace='0' vspace='0' /></td>
          <td height='30' valign='top' background='http://www.lepoticsrl.com.ar/formulario/SM.jpg'></td>
          <td width='30' height='30' valign='top'><img src='http://www.lepoticsrl.com.ar/formulario/SD.jpg' width='30' height='30' hspace='0' vspace='0' /></td>
	    </tr>
	    <tr>
	      <td width='30' valign='top' background='http://www.lepoticsrl.com.ar/formulario/MI.jpg'></td>
          <td width='165' height='180' valign='top' bgcolor='#FFEAA1'><b><u>Datos del Remitente</u>:</b><p>
        <b>".$nombre."</b><br />
        <a href=mailto:".$correo.">".$correo."</a><br /><br />
        <b>Teléfono:</b> ".$telefono."<br /><br />
		<b>Localidad:</b> ".$localidad."<br />
		</p>
          <p align='center'>&nbsp;</p></td>
          <td valign='top' background='http://www.lepoticsrl.com.ar/formulario/MD.jpg'>&nbsp;</td>
	    </tr>
	    <tr>
	      <td height='30' valign='top'><img src='http://www.lepoticsrl.com.ar/formulario/II.jpg' width='30' height='30' hspace='0' vspace='0' /></td>
          <td height='30' valign='top' background='http://www.lepoticsrl.com.ar/formulario/IM.jpg'></td>
          <td width='30' height='30' valign='top'><img src='http://www.lepoticsrl.com.ar/formulario/ID.jpg' width='30' height='30' hspace='0' vspace='0' /></td>
	    </tr>
        
</table>
      <p>&nbsp;</p></td>
      <td width='314' valign='top'><p>\n 
	  <b>Fecha: </b>".date('d\/m\/Y ')."  <br />
	  <b>Hora: </b>".date('H:i ')."<br /><br />
	  <b>Consulta</b>:<br />
      ".$consulta."</p>      
	  </td>
  </tr>
	<tr>
	  <td height='1' colspan='2' bgcolor='#000000'></td>
  </tr>
	<tr>
	  <td colspan='2'><div align='right'>
	    <table width='326' border='0' align='left' cellpadding='0' cellspacing='0'>
          <tr>
            <td><div align='justify'>Estos datos fueron enviados desde el formulario de su sitio web. Para contactarse con quien lo envi&oacute; verifique colocar correctamente la direcci&oacute;n de mail  (no lo responda haciendo click en RESPONDER desde su servidor de correo)</div></td>
          </tr>
        </table>
	    Sistema creado por:<br />
	    <a href='http://www.zaikoms.com.ar'><img src='http://www.zaikoms.com.ar/imagenes/logo-zaikoms.jpg' alt='Zaikoms // Dise&ntilde;o Web' border='0' /></a></div></td>
  </tr>
	<tr>
	  <td height='1' colspan='2' bgcolor='#000000'></td>
  </tr>
</table>";
	mail('info@lepoticsrl.com.ar', 'CONSULTA DESDE LA WEB', $mensaje, $headers);


header("Location: ../?pagina=enviado");
	
?>