<?php 
$DataUsuario = isset($_SESSION['DatosUsuario'])?$_SESSION['DatosUsuario']:'';
$permiso = isset($DataUsuario['usuario']['permiso'])?$DataUsuario['usuario']['permiso']:'';

$nombre = isset($DataUsuario['usuario']['nombre'])?$DataUsuario['usuario']['nombre']:'';
$apellido = isset($DataUsuario['usuario']['apellido'])?$DataUsuario['usuario']['apellido']:'';
$foto_usuario = !empty($DataUsuario['usuario']['foto_usuario'])?$DataUsuario['usuario']['foto_usuario']:'';
$correo = isset($DataUsuario['usuario']['correo'])?$DataUsuario['usuario']['correo']:'';

if (!empty($foto_usuario)) {
$direccion = str_replace('C:xampphtdocsHechoPorMiSistema TesissrcArchivosImgUsuario/','',$foto_usuario);

    $imagen = '<img src="src/Archivos/ImgUsuario/'.$direccion.'" id="img_perfil_user" alt="Foto perfil">';
}else{
    $imagen = '<img src="multimedia/img/user_perfil.png" id="img_perfil_user" alt="Foto perfil">';

}
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Repositorios de tesis para evaluar de la UNELLEZ.">
    <meta name="keywords" content="tesis.pasos.unellez.tutor">
    <meta name="author" content="Yeison Cervantes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!--    Estilos slider-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/datatable/responsive.dataTables.min.css">


    <!--    Estilos CSS-->
    <link rel="stylesheet" href="css/e-generales.css">

    <title>Sistema tesis</title>
</head>

<body class="d-flex flex-wrap bg_panel_admin">
    <header class="w-100">
        <nav class="navbar navbar-expand-lg container-fluid navbar-light bg_header_admin">
            <a class="navbar-brand text-light text-center" id="h_titulo" href="#"><strong>S<small>ETG</small></strong><br>
                <span class="text-white-50" id="h_abreviatura">Sistema Evaluación Trabajos Grado</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">

                    <?php 
                    switch ($permiso) {
                        case '0':
                        // include_once "src/Vista/estudiante.php";
                        ?>
                        <!-- Estudiante -->
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn_opcion_user mr-2" type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-alt"></i> Opciones Estudiante
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="?menu-u=registrar_tesis"><i class="fas fa-plus"></i>
                            Registrar tesis</a>
                            <a class="dropdown-item" href="?menu-u=actualizar-datos"><i class="fas fa-sync-alt"></i>
                            Actualizar datos</a>
                            <a class="dropdown-item" href="#" id="cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                        </div>
                    </div>
                    <?php 
                    break;
                    case '1':
                        // include_once "src/Vista/tutor.php";
                    ?>
                    <!-- tutor -->
                    <div class="dropdown mr-2">
                        <button class="btn dropdown-toggle btn_opcion_user" type="button" id="dropdownMenuButton2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-tie"></i> Opciones Tutor(a)
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php"><i class="fas fa-search"></i>
                        Seguimiento tesis</a>
                        <a class="dropdown-item" href="?menu-u=actualizar-datos"><i class="fas fa-sync-alt"></i>
                        Actualizar datos</a>
                        <a class="dropdown-item" href="#" id="cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                    </div>
                </div>
                <?php 
                break;
                case '2':
                        // include_once "src/Vista/administrador.php";
                ?>
                <!-- Administrador -->
                <div class="dropdown mr-2">
                    <button class="btn dropdown-toggle btn_opcion_user" type="button" id="dropdownMenuButton3"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-tie"></i> Opciones Administrador(a)
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="?menu-u=registrar_tesis"><i class="fas fa-folder"></i>
                    Ver trabajos de grado</a>
                    <a class="dropdown-item" href="?menu-u=registro-usuario"><i class="fas fa-user-plus"></i>
                    Registrar usuarios</a>
<!--                     <a class="dropdown-item" href="?menu-u=asignar-tutor"><i class="fas fa-user-check"></i>
                    Asignar tutor</a> -->
                    <a class="dropdown-item" href="?menu-u=reportes"><i class="fas fa-chart-line"></i> Reportes</a>
                    <a class="dropdown-item" href="?menu-u=actualizar-datos"><i class="fas fa-sync-alt"></i>
                    Actualizar datos</a>
                    <a class="dropdown-item" href="#" id="cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                </div>
            </div>
            <?php 

            break;
            default:
            break;
        } ?>

        <li class="nav-item active">
            <h5 id="nom_user_admin">
                <?= $imagen; ?>
                <strong><?= $nombre." ".$apellido; ?></strong></h5>
            </li>

        </ul>
    </div>
</nav>

</header>

<main class="w-100">

    <div class="container ">

        <?php

        error_reporting(0);

// Revisar esto aqui
            // case'reportes':
            //     include'w_reportes.php';
            // break;
        
        switch ($permiso) {
                case '0':
                // include_once "src/Vista/estudiante.php";
            include'pages/dentrosesion/w_principal_estudiante.php';
                break;

                case '1':
                // include_once "src/Vista/estudiante.php";
            include'pages/dentrosesion/w_principal_tutor.php';
                break;

                case '2':
                // include_once "src/Vista/estudiante.php";
            include'pages/dentrosesion/w_principal_admin.php';
                break;

                default:
                break;

        }

        ?>

    </div>
</main>

<footer class="align-self-end w-100 text-center bg_footer_index py-2">
    <div class="container">
        <p class="">Copyright © 2018 | <strong><a href="#" class="autor_yeison" target="_blank">Yeison Cervantes</a></strong>
        | Sistema evaluación trabajos grado</small></p>
    </div>
</footer>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/modernizr-custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui-tabs.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<script src="js/datatable/jquery.dataTables.min.js"></script>
<script src="js/datatable/dataTables.responsive.min.js"></script>
<script src="js/datatable/dataTables.buttons.min.js"></script>

<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>

<script src="js/interaccion.js"></script>
<script src="js/multi_script.js"></script>

</html>