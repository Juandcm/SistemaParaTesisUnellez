<!--Inicio Modal titulos-->
<div class="modal fade" id="editarcapitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><p class="text-dark">Editar capitulo</p></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-12">

<form id="form_editar_capitulo" enctype="multipart/form-data">
  <h1 class="text-dark">Editar el capitulo del trabajo de grado</h1>
  <input type="file" name="capituloeditar" value="" id="capituloeditar" placeholder="Subir capitulo">
  <input type="hidden" name="idcapitulo" value="" id="idcapitulo">
  <button type="submit" id="botoneditarcapitulo" disabled>Editar capitulo</button>
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