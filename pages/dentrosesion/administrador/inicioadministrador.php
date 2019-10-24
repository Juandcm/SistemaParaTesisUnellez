<div class="container">
<h4>Usuarios que han subido titulos de trabajo de grado</h4>

	<!-- Tabla de trabajos  -->
	<div class="panel-body table-responsive">
		<table cellpadding="0" cellspacing="0" bor
		der="0" id="trabajosparatutores" class="display table table-striped table-bordered table-condensed table-hover" style="width: 99%;">
			<thead class="cabecera">
				<th>Información</th>
			</thead>
			<tbody class="cuerpo"></tbody>
		</table>
	</div>

</div>


<!--Inicio Modal titulos-->
<div class="modal fade" id="desaprobartitulomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><p class="text-dark">Desaprobar los titulos del proyecto de grado del usuario</p></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-12">
			<form id="mensajedesaprobartitulos">
				<input type="hidden" name="idusuariomensaje" id="idusuariomensaje" value="">
				<div class="col-12">
					<textarea name="mensajetitulosmal" id="mensajetitulosmal" class="form-control" placeholder="Por favor describe el porque estas desaprobando los titulos del trabajo de grado"></textarea>
				</div>
				<button type="submit" class="btn btn-danger">Procesar</button>
			</form>
        </div>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarModal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
<!--Fin Modal titulos-->
