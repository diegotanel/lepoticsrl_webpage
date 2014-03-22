
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administraci&oacute;n de contenidos</title>
<link href="admin.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="fondo">
  <tr height="99">
    <td  align="center" valign="top" class="arriba"><a href="http://www.zaikoms.com.ar" target="_blank"><img src="imagenes/logo.jpg" alt="" width="177" height="99" hspace="0" vspace="0" border="0" align="left" /></a>
      <table width="402" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center">
          <td width="420" height="46"><span class="Estilo5">Ingreso al panel de administraci&oacute;n de contenidos</span></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="auto" align="center" valign="middle" class="medio"><br />
    </p>
        <form action="ingreso.php"  id="formEnviar" method="POST">
          <table width="100" border="0" align="center" cellpadding="0" cellspacing="0" class="login">
          <tr>
            <td width="115" height="35">&nbsp;</td>
            <td width="74">&nbsp;</td>
            <td width="140">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Nombre</td>
            <td><input type="text" name=nombre id=nomApe  size=15 /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Password</td>
            <td><input type="password" name=password id=passAcceso size=15 /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center" valign="top"><input type="Submit" value="ingresar"/>
           </td>
          </tr>
        </table>
          <p><? echo $_REQUEST[error]; ?></p>
      </form></td>
  </tr>
  <tr>
    <td valign="bottom" class="abajo Estilo16"><p>&nbsp;</p>
      <blockquote>
        <p class="Estilo17">Este panel de administraci&oacute;n fue desarrollado por <a href="http://www.zaikoms.com.ar" target="_blank">Zaikoms // Dise&ntilde;o Web.</a><br />
        Ante cualquier inquietud sobre su uso puede escribir a <a href="mailto:info@zaikoms.com.ar">info@zaikoms.com.ar</a></p>
    </blockquote></td>
  </tr>
</table>
</body>
</html>
