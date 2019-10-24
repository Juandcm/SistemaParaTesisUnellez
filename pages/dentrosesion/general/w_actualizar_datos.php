<?php session_start();
$DataUsuario = isset($_SESSION['DatosUsuario'])?$_SESSION['DatosUsuario']:'';
$id = isset($DataUsuario['usuario']['id'])?$DataUsuario['usuario']['id']:'';
$nombre = isset($DataUsuario['usuario']['nombre'])?$DataUsuario['usuario']['nombre']:'';
$apellido = isset($DataUsuario['usuario']['apellido'])?$DataUsuario['usuario']['apellido']:'';
$telefono = isset($DataUsuario['usuario']['telefono'])?$DataUsuario['usuario']['telefono']:'';
$foto_usuario = !empty($DataUsuario['usuario']['foto_usuario'])?$DataUsuario['usuario']['foto_usuario']:'multimedia/img/user_perfil.png';
$correo = isset($DataUsuario['usuario']['correo'])?$DataUsuario['usuario']['correo']:'';

 ?>

 
<style>
.label_form_edi{
    margin-bottom: 0px !important;
    text-indent: 5px;
}
</style>

<div class="container">
    <h3 class="text-center text-uppercase my-4"><i class="fas fa-user-edit"></i> Actualizar datos</h3>
    <form id="actualizarusuario">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-4">
                <label for="nom_usuario_edi" class="label_form_edi"><span>Nombres:</span></label>

                <input required type="text" name="nom_usuario_edi" id="nom_usuario_edi" class="form-control" value="<?= $nombre ?>">
            </div>
            <div class="col-12 col-sm-4">
                <label for="ape_usuario_edi" class="label_form_edi"><span>Apellidos:</span></label>

                <input required type="text" name="ape_usuario_edi" id="ape_usuario_edi" class="form-control" value="<?= $apellido ?>">

            </div>
        </div>

        <div class="row d-flex justify-content-center my-3">
            <div class="col-12 col-sm-4">
                <label for="tlf_usuario_edi" class="label_form_edi"><span>N° Telefono:</span></label>

                <input required type="text" name="tlf_usuario_edi" id="tlf_usuario_edi" class="form-control" value="<?= $telefono ?>">
            </div>
            <div class="col-12 col-sm-4">
                <label for="email_usuario_edi" class="label_form_edi"><span>Correo electronico:</span></label>

                <input required type="email" name="email_usuario_edi" id="email_usuario_edi" class="form-control" value="<?= $correo ?>">

            </div>
        </div>


        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-4">
                <label for="pass_usuario_edi" class="label_form_edi"><span>Actualizar contraseña:</span></label>

                <input type="password" name="pass_usuario_edi" id="pass_usuario_edi" class="form-control" value="1234" placeholder="Cambiar clave">
            </div>
            <div class="col-12 col-sm-4">
                <label for="foto_usuario_edi" class="label_form_edi"><span>Actualizar foto perfil:</span>
                </label>

                <input type="file" name="foto_usuario_edi" id="foto_usuario_edi" class="form-control">
            </div>
        </div>

        <div class="row text-right mt-4">
            <div class="col-10">
            <button type="submit" class="btn btn-warning"><i class="fas fa-sync-alt"></i> Actualizar</button>
            </div>
        </div>
    </form>
</div>