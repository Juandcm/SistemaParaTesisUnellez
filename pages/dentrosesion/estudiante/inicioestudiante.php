<div class="container">

    <div class="contenedor_titulos">

        <form id="iniciartitulo" class="d-none">

        <h1 class="text-uppercase text-center mb-3" id="titulo_registrar_tesis">Registrar títulos para tesís</h1>
            
            <div class="row d-flex justify-content-center">
                <!-- 1 -->
                <div class="col-8">
                    <input required type="text" name="titulo" id="titulo" class="form-control"
                        placeholder="1er Título para   la tesís">
                </div>
                <div class="col-2" id="c_tutor_uno">
                    <a href="#" id="s_tutor_uno"><strong> Sugerir tutor</strong> <i class="fas fa-plus"></i></a>
                </div>
                <div class="col-2" id="tutor_uno">
                    <select name="sugerirtutor" id="sugerirtutor" class="form-control">
                    </select>
                </div>
                <div class="col-1" id="cerrar_tutor_uno">
                    <a href="#"><strong><i class="fas fa-times"></i></strong></a>
                </div>
                <!-- Titulo uno-->


                <div class="col-8 my-3">
                    <input required type="text" name="titulo1" id="titulo1" class="form-control"
                        placeholder="2do Título para   la tesís">
                </div>
                <div class="col-2 my-3" id="c_tutor_dos">
                    <a href="#" id="s_tutor_dos"><strong>Sugerir tutor</strong> <i class="fas fa-plus"></i></a>
                </div>
                <div class="col-2 my-3" id="tutor_dos">
                    <select name="sugerirtutor1" id="sugerirtutor1" class="form-control">
                    </select>
                </div>

                <div class="col-1 my-3" id="cerrar_tutor_dos">
                    <a href="#"><strong><i class="fas fa-times"></i></strong></a>
                </div>
                <!-- Titulo dos-->

                <div class="col-8">
                    <input required type="text" name="titulo2" id="titulo2" class="form-control"
                        placeholder="3er Título para   la tesís">
                </div>
                <div class="col-2" id="c_tutor_tres">
                    <a href="#" id="s_tutor_tres"><strong>Sugerir tutor</strong> <i class="fas fa-plus"></i></a>
                </div>
                <div class="col-2" id="tutor_tres">
                    <select name="sugerirtutor2" id="sugerirtutor2" class="form-control">
                    </select>
                </div>
                <div class="col-1" id="cerrar_tutor_tres">
                    <a href="#"><strong><i class="fas fa-times"></i></strong></a>
                </div>
                <!-- Titulo tres-->
            </div>
            <div class="btn_enviar_titulos row d-flex justify-content-center mt-4">
                <button type="button" class="btn btn-warning col-3 text-uppercase" id="registrartitulo"><strong>Enviar propuestas</strong></button>
            </div>
        </form>
    </div>

</div>

<!-- AQUI SE VE EL TITULO QUE FUE APROBADO -->
<div id="mostrartituloen1">
</div>

<form id="form_subir_capitulo" enctype="multipart/form-data">
    <h1 id="datocapitulo">Subir el capitulo <span id="contarcapitulosusuario"></span> del trabajo de grado</h1>
    <input type="file" name="capitulo" value="" id="capitulo" placeholder="Subir capitulo">
    <input type="hidden" name="idtrabajo" value="" id="idtrabajo">
    <button type="submit" id="botonsubircapitulo" disabled>Registrar capitulo</button>
</form>

<!-- Aqui se ve los capitulos subidos en el sistema -->
<div id="revisarloscapitulosensistema">
</div>