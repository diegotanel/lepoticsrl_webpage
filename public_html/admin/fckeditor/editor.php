<?
session_start();
include("fckeditor/fckeditor.php"); 
// aqui busco el contenido por su id
// cuando vengo con un contenido para editar
// sino, queda en blanco para agregar
?> 
<form action="agregaContenido.php" method="post" onsubmit="return CheckUpload();"> 
<h2 class="titulo">Editor de contenidos</h2>
<input type="hidden" name="id" id="id" value="<?=$contenidoId?>">
<table width="100%" class="cuadropass"">
<tr>
	<td>T&iacute;tulo</td>
	<td><input name="titulo" type="text" size="20" value="<?=$titulo;?>"></td>
</tr>
<tr>
	<td>Autor</td>
	<td><input name="volanta" type="text" size="20" value="<?=$autor;?>"></td>
</tr>

<tr>
<td colspan="5">
<?php 
    $oFCKeditor = new FCKeditor('texto') ;
    $oFCKeditor->Value = $html;
    $oFCKeditor->BasePath = 'fckeditor/';
    $oFCKeditor->Width  = '700' ;
    $oFCKeditor->Height = '500' ;
    $oFCKeditor->Create() ;
?> 
</td>
</tr>

</table>
</form> 
