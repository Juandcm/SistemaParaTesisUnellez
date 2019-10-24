<div class="row d-flex justify-content-center form_is_p">
    <div class="col-4 bg-primary2 shadow p-4">
        <h2 class="text-center"><small>Recuperar contraseña</small></h2>
        <form class="frmReinciarPassword">
            <div class="form-group">
                <input type="hidden" name="fp_code" id="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                <label for="password">Nueva clave</small></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Ingresar nueva clave" autofocus required>
            
                <label for="confirm_password">Repetir clave</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Repetir clave" required>
            </div>

            <div class="botones_accion_form text-center">
                <a href="?menu=inicio" class="btn btn-secondary btn-sm"><i class="fas fa-reply"></i> Regresar</a>
                <button type="button" id="btnreiniciar" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Recuperar</button>
            </div>
        </form>
    </div>
</div>

