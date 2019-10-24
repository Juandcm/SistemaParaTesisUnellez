<?php 

        $menu=isset($_GET['menu-u'])?$_GET['menu-u']:'';
 
        switch($menu){

            case'registrar_tesis':
                include 'pages/dentrosesion/estudiante/inicioestudiante.php';
            break;
            
            case 'actualizar-datos':
            include'pages/dentrosesion/general/w_actualizar_datos.php';    
            break;

        default:
        include 'pages/dentrosesion/estudiante/inicioestudiante.php';
        include 'pages/dentrosesion/estudiante/modaleditarcapitulo.php';
        break;
                }

?>