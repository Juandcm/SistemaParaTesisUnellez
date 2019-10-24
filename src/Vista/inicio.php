<?php 
require_once "src/Modelo/FuncionesFuera.php";
$usu_normal = new Funciones();
$sql2 = "SELECT usu.nombre as nombretutor, usu.apellido as apellidotutor, tit.titulo, tit.descripcion, tit.fecha_peticion, usu2.nombre as nombretrabajo, usu2.apellido as apellidotrabajo, usu2.telefono as telefonotrabajo, usu2.correo as correotrabajo, usu2.foto as fotousuario FROM trabajo tra INNER JOIN usuario usu ON usu.idusuario = tra.usuario_id_tutor INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu2 ON usu2.idusuario = tit.usuario_id_normal INNER JOIN capitulo cap ON cap.trabajo_id = tra.idtrabajo WHERE cap.numero_capitulo='5' AND cap.estado='1'";
$datos = '';
$consulta2 = $usu_normal->ejecutarConsultaTodasFilas($sql2,$datos);

?>
<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form id="buscartitulo" class="input-group shadow mb-1">
            <input id="buscar_tesis" name="buscar_tesis" type="text" class="form-control" placeholder="Buscar tesis" autofocus>
            <div class="input-group-append">
                <button id="btn_buscar_index" class="btn btn-warning text-muted" type="submit" data-toggle="modal" data-target="#verdetallesdeltitulo"><i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!--Inicio Modal titulos-->
<div class="modal fade" id="verdetallesdeltitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><p class="text-dark">Proyectos de grado</p></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-12" id="modaltrabajo">
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

<!--        slider-->

<div class="owl-carousel owl-theme my-5 container">
<?php 

if ($consulta2) {
foreach ($consulta2 as $row) {
            $fechaOriginal = $row->fecha_peticion;
            $fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
?>
 <!-- usu2.foto as fotousuario -->
<article class="item shadow-tesis shadow">
        <div class="c_titulo_tesis">
            <a href="#" class="btn_titulo_tesis text-dark">
                <p class="text-justify py-3 px-4 titulo_tesis"><?= $row->titulo ?></p>
                <p class="text-justify py-3 px-4"><?=$row->descripcion; ?></p>
            </a>
        </div>
        <div class="text-center text-white c_estudiante py-1">
            <p class="p_autor"><a href="#" class="text-warning autor_tesis">
                <span class="font-weight-bold"><?=$row->nombretrabajo." ".$row->apellidotrabajo; ?></span></a>
                    <p><small class=""><strong>Telefono:</strong><?=$row->telefonotrabajo; ?></small>
                    <small class=""><strong>Correo:</strong><?=$row->correotrabajo; ?></small></p>
                <small><i class="fa fa-user"></i>Estudiante</small>
            </p>
        </div>
        <div class="descripcion_tesis px-2">
            <div class="row pt-2">
                <div class="col-9 info_tesis">
                    <p><small class="tutor_tesis"><strong>Tutor(a):</strong> <a href="#"><?= $row->nombretutor." ".$row->apellidotutor; ?></a></small></p>
                    <p><small class=""><strong>Fecha: </strong><?=$fechaFormateada  ?></small></p>
                </div>
                <div class="col-3 text-center sede_tesis ">
                    <img src="Assets/tools/img/UNELLEZ.png" alt="" class="img_logo_slider"><br><small>VPDS</small>
                </div>
            </div>
        </div>
    </article>

<?php 
}
}else{
echo "no hay nada";
} 

 ?>
</div>
<!--        Fin slider-->	
