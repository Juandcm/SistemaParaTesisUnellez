<div class="row d-flex justify-content-center form_is_p">
    <div class="col-4 bg-primary2 shadow p-4">
        <h2 class="text-center">Iniciar sesión</h2>
        <form class="formEntrada">
            <div class="form-group">
                <label for="usuario">Usuario <small>(Numero de cedula)</small></label>
                <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Ingresar usuario" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingresar contraseña" required>
            </div>
            <div class="form-group form-check text-right">
                <a data-toggle="modal" data-target=".modal_recuperar_clave" href="#"><small>Recuperar cuenta</small></a>
                <p><a data-toggle="modal" data-target=".modal_registro" href="#"><small>Registrarse</small></a></p>

            </div>

            <div class="botones_accion_form text-center">
                <a href="?menu=inicio" class="btn btn-secondary btn-sm"><i class="fas fa-reply"></i> Regresar</a>
                <button type="button" id="entrar" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Entrar</button>
            </div>
        </form>
    </div>
</div>



<!-- Modal registro -->

<div class="modal fade modal_registro" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal_correo_user">
    <div class="modal-dialog modal-sm shadow2">
        <div class="modal-content">

            <div class="modal-header bg_modal text-center c_modal_correo">
                <p class="modal-title text-uppercase"><strong>Nuevo Usuario:</strong></p>
                <img class="card-img-top img_card_e_modal" src="multimedia/img/nuevo_user.png" alt="Perfil usuario">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-5">
                <form id="formregistrousuario" class="form_contacto_user">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <input name="cedula_user" id="cedula_user" type="text" class="form-control" aria-describedby="cedula_user" placeholder="Número de cedula" required>
                            </div>
                            <div class="col-12">

                                <div class="alert alert-success d-none alert-dismissible fade show" role="alert" id="alertsuccess">
                                    Te puedes registrar
                                    <button type="button" class="close" id="cerrarsuccess" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                                </div>

                                <div class="alert alert-danger d-none alert-dismissible fade show" role="alert" id="alerterror">
                                  No se encontro la cedula
                                  <button type="button" class="close" id="cerrarerror" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                              </div>

                          </div>
                      </div>
                  </div>

                  <div class="form-group">

                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <input name="nombre_user" id="nombre_user" type="text" class="form-control" placeholder="Nombres" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <input name="apellido_user" id="apellido_user" type="text" class="form-control" placeholder="Apellidos" required>
                        </div>
                    </div> <!-- Fin row-->

                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <input name="tlf_user" id="tlf_user" type="text" class="form-control" placeholder="Telefono" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <input name="email_user" id="email_user" type="text" class="form-control" placeholder="E-mail" required>
                        </div>
                    </div> <!-- Fin row-->

                    <div class="row mt-2">
                        <div class="col-12">
                            <input name="clave_user" id="clave_user" type="password" class="form-control" placeholder="clave" required>
                        </div>
                    </div> <!-- Fin row-->

                </div> <!-- Form group-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                <button type="submit" class="btn btn-primary btn-sm" id="btnregistrarusu" disabled><i class="fas fa-check"></i> Registrar</button>
            </form>
        </div>

    </div>
</div>
</div>



<!-- Modal registro -->

<div class="modal fade modal_recuperar_clave" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal_correo_user">
    <div class="modal-dialog modal-sm shadow2">
        <div class="modal-content">

            <div class="modal-header bg_modal text-center c_modal_correo">
                <p class="modal-title text-uppercase"><strong>Recuperar usuario:</strong></p>
                <img class="card-img-top img_card_e_modal" src="multimedia/img/nuevo_user.png" alt="Perfil usuario">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-5">
                <form id="enviarcorreorestablecer" class="form_contacto_user">

                    <div class="row">
                        <div class="col-12">
                            <input name="recuperar_clave" id="recuperar_clave" type="email" class="form-control" placeholder="Correo electronico" required>
                        </div>
                    </div> <!-- Fin row-->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Recuperar</button>
                </form>
            </div>

        </div>
    </div>
</div>