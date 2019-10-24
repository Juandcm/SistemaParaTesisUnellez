<?php 

        $menu=isset($_GET['menu-u'])?$_GET['menu-u']:'';
 include 'pages/dentrosesion/administrador/modaltutores.php';
 include 'pages/dentrosesion/administrador/modaltitulos.php';

        switch($menu){

            case'registrar_tesis':
                include 'pages/dentrosesion/administrador/inicioadministrador.php';
            break;                
            case'registro-usuario':
                include'pages/dentrosesion/administrador/w_registro_usuario.php';
            break;

            case'reportes':
                include 'pages/dentrosesion/administrador/w_reportes.php';
            break;

            case 'actualizar-datos':
            include'pages/dentrosesion/general/w_actualizar_datos.php';    
            break;

        default:
        include 'pages/dentrosesion/administrador/inicioadministrador.php';
        break;
		}

?>