<?php
include 'src/Vista/tutor/modaltrabajogrado.php';
$DataUsuario = isset($_SESSION['DatosUsuario'])?$_SESSION['DatosUsuario']:'';
$nombre = isset($DataUsuario['usuario']['nombre'])?$DataUsuario['usuario']['nombre']:'';
$apellido = isset($DataUsuario['usuario']['apellido'])?$DataUsuario['usuario']['apellido']:'';
$foto_usuario = isset($DataUsuario['usuario']['foto_usuario'])?$DataUsuario['usuario']['foto_usuario']:'';
 ?>
<h1 class="text-center">Bienvenido tutor <?=$nombre." ".$apellido ?></h1>

	<!-- Tabla de trabajos que estan con el tutor de trabajo de grado  -->
	<div class="panel-body table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" id="trabajosdetutoriados" class="display table table-striped table-bordered table-condensed table-hover" style="width: 99%;">
			<thead class="cabecera">
				<th>Información</th>
			</thead>
			<tbody class="cuerpo"></tbody>
		</table>
	</div>

