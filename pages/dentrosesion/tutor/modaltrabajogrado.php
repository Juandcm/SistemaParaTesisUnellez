<!--Inicio Modal titulos-->
<div class="modal fade" id="verdetallesdeltrabajo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><p class="text-dark">Detalles del trabajo de grado del estudiante</p></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-12" id="modaltrabajousuario">
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



<!--Inicio Modal titulos-->
<div class="modal fade" id="subirnotatrabajo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<form id="subirnotaform">
  <input type="hidden" name="capituloid" id="capituloid" value="">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><p class="text-dark">Sube las 3 notas con sus respectivos jurados</p></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-4 my-3">
          <label for="nota">Ingresa la nota del jurado 1</label>
          <input type="text" name="nota" id="nota" value="" placeholder="" class="form-control">
          <label for="sugerirjurado">Selecciona el jurado</label>
          <select name="sugerirjurado" id="sugerirjurado" class="form-control">
          </select>
        </div>

        <div class="col-4 my-3">
          <label for="nota1">Ingresa la nota del jurado 2</label>
          <input type="text" name="nota1" id="nota1" value="" placeholder="" class="form-control">
          <label for="sugerirjurado1">Selecciona el jurado</label>
          <select name="sugerirjurado1" id="sugerirjurado1" class="form-control">
          </select>
        </div>

        <div class="col-4 my-3">
          <label for="nota2">Ingresa la nota del jurado 3</label>
          <input type="text" name="nota2" id="nota2" value="" placeholder="" class="form-control">
          <label for="sugerirjurado2">Selecciona el jurado</label>
          <select name="sugerirjurado2" id="sugerirjurado2" class="form-control">
          </select>
        </div>
      </div>

      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Cargar notas</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarModal2">Cerrar</button>
      </div>

    </div>
  </div>
</form>
  
</div>
<!--Fin Modal titulos-->