
<div class="container">
<h1>Asignar tutor</h1>
</div>

<div class="container">
    <h3 class="text-center text-uppercase my-4"><i class="fas fa-users"></i> Asignación del tutor(a)</h3>

            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <caption>List of users</caption>
                    <thead>
                        <tr class="table-active">
                            <th scope="col">#</th>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Titulos</th>
                            <th scope="col">Tutor(a)</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jose Ramon</td>
                            <form action="">
                            <td>
                            <label for="titulo_uno"><input required type="radio" name="titulo_uno" id="titulo_uno">Titulo prueba 1</label>
                            <label for="titulo_dos"><input required type="radio" name="titulo_uno" id="titulo_dos">Titulo prueba 2</label>
                            <label for="titulo_tres"><input required type="radio" name="titulo_uno" id="titulo_tres">Titulo prueba 3</label>
                            </td>
                            <td><select name="" id="" class="form-control">
                            <option value="">Yeison cervnates</option>
                            <option value="">Jesus cervnates</option>
                            </select></td>
                            <td><input type="submit" value="Aprobar" class="form-control btn-warning"></td>
                            </form>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>Luis verdugo</td>
                            <form action="">
                            <td>
                            <label for="titulo_uno"><input required type="radio" name="titulo_uno" id="titulo_uno">Titulo prueba 1</label>
                            <label for="titulo_dos"><input required type="radio" name="titulo_uno" id="titulo_dos">Titulo prueba 2</label>
                            <label for="titulo_tres"><input required type="radio" name="titulo_uno" id="titulo_tres">Titulo prueba 3</label>
                            </td>
                            <td><select name="" id="" class="form-control">
                            <option value="">Yeison cervnates</option>
                            <option value="">Jesus cervnates</option>
                            </select></td>
                            <td><input type="submit" value="Aprobar" class="form-control btn-warning"></td>
                            </form>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>

        
        </div>
    </div>

</div>



<!-- Small modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Actulizador datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tipo de usuario:</label>
                        <select name="tipo_usuario_registro" id="tipo_usuario_registro" class="form-control">
                            <option value="">Estudiante</option>
                            <option value="">Tutor(a)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Cedula:</label>
                        <input type="text" class="form-control" name="cedula_up_usuario">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Actulizar</button>
            </div>
            </form>

        </div>
    </div>
</div>



<!-- Small modal -->
<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tipo de usuario:</label>
                        <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                            <option value="">Estudiante</option>
                            <option value="">Tutor(a)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Cedula:</label>
                        <input type="text" class="form-control" name="cedula_up_usuario">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Crear usuario</button>
            </div>
            </form>

        </div>
    </div>
</div>