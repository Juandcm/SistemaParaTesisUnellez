<?php 
require_once "src/Modelo/FuncionesFuera.php";
$datos = '';
$usu_normal = new Funciones();

// Para ver estudiantes
$sql = "SELECT * FROM usuario where permiso = '0'";
$consulta = $usu_normal->ejecutarConsultaTodasFilas($sql,$datos);
$contconsulta = count($consulta);

// Para ver tutores
$sql1 = "SELECT * FROM usuario where permiso = '1'"; 
$consulta1 = $usu_normal->ejecutarConsultaTodasFilas($sql1,$datos);
$contconsulta1 = count($consulta1);

// Para ver todos los usuarios excepto el administrador
$sql2 = "SELECT * FROM usuario where permiso = '0' or permiso = '1'";
$consulta2 = $usu_normal->ejecutarConsultaTodasFilas($sql2,$datos);
$contconsulta2 = count($consulta2);

if ($consulta2) {
foreach ($consulta2 as $row2) {

    }
}
?>
<div class="container">
    <h3 class="text-center text-uppercase my-4"><i class="fas fa-users"></i> Registro usuarios <button class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm1">Registrar
            nuevo</button></h3>

    <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Estudiantes <span class="badge badge-pill badge-war ning"><?= $contconsulta; ?></span>
            </a></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Tutores(as) <span class="badge badge-pill badge-warning"><?= $contconsulta1; ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false">Todos usuarios <span class="badge badge-pill badge-warning"><?= $contconsulta2; ?></span>
            </a>
        </li>
    </ul>
    <div class="tab-content text-center" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="table-responsive">
                <table class="display table table-hover table-striped table-bordered table-condensed" id="tablausuarioestuadiante" cellpadding="0" cellspacing="0" border="0"  style="width: 99%;">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre y Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>

<?php 
if ($consulta) {
foreach ($consulta as $row) {
?>
                        <tr>
                            <th scope="row"><?= $row->idusuario; ?></th>
                            <td><?= $row->cedula; ?></td>
                            <td><?= $row->nombre." ".$row->apellido; ?></td>
                            <td><?= $row->telefono; ?></td>
                            <td><?= $row->correo; ?></td>
                            <td><a href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-sync-alt"></i></a>
                                <a href="#" class="ml-3"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
<?php 
    }
}
 ?>
    

                    </tbody>
                </table>
            </div>

        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        
        <div class="table-responsive">
                <table class="display table table-hover table-striped table-bordered table-condensed" id="tablausuariotutor" cellpadding="0" cellspacing="0" border="0" style="width: 99%;">
                <thead>
                        <tr class="table-active">
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre y Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>

<?php 
if ($consulta1) {
foreach ($consulta1 as $row1) {
?>
                        <tr>
                            <th scope="row"><?= $row1->idusuario; ?></th>
                            <td><?= $row1->cedula; ?></td>
                            <td><?= $row1->nombre." ".$row1->apellido; ?></td>
                            <td><?= $row1->telefono; ?></td>
                            <td><?= $row1->correo; ?></td>
                            <td><a href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-sync-alt"></i></a>
                                <a href="#" class="ml-3"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
<?php 
    }
}
 ?>
                </tbody>
                </table>
            </div>
        
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        
        
        <div class="table-responsive">
                <table class="display table table-hover table-striped table-bordered table-condensed" id="tablausuariogeneral" cellpadding="0" cellspacing="0" border="0" style="width: 99%;">
           <thead>
                        <tr class="table-active">
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre y Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>

<?php 
if ($consulta2) {
foreach ($consulta2 as $row2) {
?>
                        <tr>
                            <th scope="row"><?= $row2->idusuario; ?></th>
                            <td><?= $row2->cedula; ?></td>
                            <td><?= $row2->nombre." ".$row2->apellido; ?></td>
                            <td><?= $row2->telefono; ?></td>
                            <td><?= $row2->correo; ?></td>
                            <td><a href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-sync-alt"></i></a>
                                <a href="#" class="ml-3"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
<?php 
    }
}
 ?>
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
                <form id="registrousuarionuevo">
                    <div class="form-group">
                        <label for="tipo_usuario" class="col-form-label">Tipo de usuario:</label>
                        <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                            <option value="0">Estudiante</option>
                            <option value="1">Tutor(a)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cedula_up_usuario" class="col-form-label">Cedula:</label>
                        <input type="text" class="form-control" name="cedula_up_usuario">
                    </div>


<!-- inicio row -->
                    <div class="row mt-2">
                        <div class="col-12">
                            <select name="vice_user"  id="vice_user" class="form-control mb-2" required>
<!--                                 <option value="0">Seleccione Vicerectorado</option>
                                <option value="1">VPDS</option>
                                <option value="2">VPDR</option>
                                <option value="3">VIPI</option>
                                <option value="4">VPA</option> -->
                            </select>
                        </div>
                        <div class="col-12">
                            <select name="pro_user" id="pro_user" class="form-control mb-2" required>
                            <!--     <option value="0">Seleccione Programa</option>
                                <option value="Arquitectura-ingeneria">Arquitectura e Ingeneria</option>
                                <option value="Agromar">Agromar</option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Medicina-veterinaria">Medicina-veterinaria</option> -->
                            </select>
                        </div>
                        <div class="col-12">
                            <select name="subp_user" id="subp_user" class="form-control mb-2" required>
<!--                                 <option value="0">Seleccione Sub-programa</option>
                                <option value="Ing-Informatica">Ing. Informatica</option>
                                <option value="Ing-Petroleo">Ing. Petroleo</option>
                                <option value="Licd-Matematica">Licd. Matematica</option>
                                <option value="Licd-Administracion">Licd. Administracion</option> -->
                            </select>
                        </div>
                    </div> 
                    <!-- Fin row-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </div>
            </form>
        </div>
    </div>
</div>