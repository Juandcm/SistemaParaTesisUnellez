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
    <link rel="stylesheet" href="css/normalize.css">
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

<body class="d-flex flex-wrap">

    <!-- barra superior (Login + Redes + Info)-->
    <div class="login_sociles w-100 d-none d-sm-block bg-warning shadow-sm" id="login_sociles">
        <div class="container">
            <div class="row" id="c_item">
                <div class="col-3 py-1">
                    <a href="?menu=inicio-sesion" class="text-muted py-1"><i class="far fa-user"></i> Iniciar sesión</a>
                </div>

                <div class="col-9 py-1 text-right text-muted">
                    <span><i class="fas fa-phone"></i> 0273-000.00.00</span>
                    <span class="mx-3"><i class="fas fa-envelope"></i> correoprueba@gmail.com</span>
                    <a href="#" class="text-muted mr-2 p-1"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-muted p-1"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <header class="w-100">

        <nav class="navbar navbar-expand-lg container navbar-light">
            <a class="navbar-brand text-light text-center" id="h_titulo" href="#"><strong>S<small>ETG</small></strong><br> <span class="text-white-50" id="h_abreviatura">Sistema Evaluación Trabajos Grado</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-light h_tx_menu" href="?menu=inicio">I<small>NICIO</small> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light h_tx_menu" href="?menu=misionvision">M<small>isión</small>V<small>isión</small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light h_tx_menu" href="?menu=tesis">T<small>ESIS</small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light h_tx_menu" href="?menu=tutores">T<small>UTORES</small></a>
                    </li>
                    <li class="nav-item d-block d-sm-none"><a class="nav-link text-light h_tx_menu" href="?menu=inicio-sesion"><i class="far fa-user"></i> I<small>NICIO SESIÓN</small></a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <main class="w-100">
        <div class="container ">

            <?php
      
        error_reporting(0);
      
        $menu=$_GET['menu'];
    
        switch($menu){

            case'inicio':
                include'pages/fuerasesion/w_principal.php';
            break;
                
            case'misionvision':
                include'pages/fuerasesion/w_misionvision.php';
            break;
            
            case'tesis':
                include'pages/fuerasesion/w_tesis.php';
            break;
                
            case'tutores':
                include'pages/fuerasesion/tutores.php';
            break;
                
            case'inicio-sesion':
                include'pages/fuerasesion/w_login.php';
            break;
            
            case'recuperar-clave':
                include'pages/fuerasesion/w_recuperar_clave.php';
            break;

        default:
                include'pages/fuerasesion/w_principal.php';
                break;
                }
      ?>

        </div>
    </main>

    <footer class="align-self-end w-100 text-center bg_footer_index py-2">
        <div class="container">
            <p class="">Copyright © 2018 | <strong><a href="#" class="autor_yeison" target="_blank">Yeison Cervantes</a></strong> | Sistema evaluación trabajos grado</small></p>
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

<script src="js/multi_script.js"></script>
<script src="js/interaccion.js"></script>


</html>