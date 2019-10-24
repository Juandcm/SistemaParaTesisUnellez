<?php 
include 'src/Vista/estudiante/modaleditarcapitulo.php';
 ?>
<h1>estudiante</h1>
<form id="iniciartitulo" class="d-none">
<h2>Crear trabajo de grado</h2>
<h3>Tienes que subir 3 titulos con sus respectiva descripcion de cada uno</h3>

<label>Ingresa el titulo del trabajo de grado<input type="text" name="titulo" value="" id="titulo"></label>
<label>Descripcion del trabajo de grado<input type="text" name="descripcion" value="" id="descripcion"></label>
<label>
	Seleccion algún tutor que desees<select name="sugerirtutor" id="sugerirtutor"></select>
</label>
<br>
<label>Ingresa el titulo del trabajo de grado<input type="text" name="titulo" value="" id="titulo1"></label>
<label>Descripcion del trabajo de grado<input type="text" name="descripcion" value="" id="descripcion1"></label>
<label>
	Seleccion algún tutor que desees<select name="sugerirtutor" id="sugerirtutor1"></select>
</label>
<br>
<label>Ingresa el titulo del trabajo de grado<input type="text" name="titulo" value="" id="titulo2"></label>
<label>Descripcion del trabajo de grado<input type="text" name="descripcion" value="" id="descripcion2"></label>
<label>
	Seleccion algún tutor que desees<select name="sugerirtutor" id="sugerirtutor2"></select>
</label>
<br>

<button type="button" id="registrartitulo">Registrar el titulo del trabajo de grado</button>
</form>

<div id="mostrartituloen1">
</div>

<form id="form_subir_capitulo" enctype="multipart/form-data">
	<h1 id="datocapitulo">Subir el capitulo <span id="contarcapitulosusuario"></span> del trabajo de grado</h1>
	<input type="file" name="capitulo" value="" id="capitulo" placeholder="Subir capitulo">
	<input type="hidden" name="idtrabajo" value="" id="idtrabajo">
	<button type="submit" id="botonsubircapitulo" disabled>Registrar capitulo</button>
</form>


<div id="revisarloscapitulosensistema">
</div>