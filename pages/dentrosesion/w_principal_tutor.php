<?php 

        $menu=isset($_GET['menu-u'])?$_GET['menu-u']:'';
 include 'pages/dentrosesion/tutor/modaltrabajogrado.php';
        switch($menu){

            case'registrar_tesis':
                include 'pages/dentrosesion/tutor/iniciotutor.php';
            break;
            
            case 'actualizar-datos':
            include'pages/dentrosesion/general/w_actualizar_datos.php';    
            break;

        default:
        include 'pages/dentrosesion/tutor/iniciotutor.php';
        break;
		}

?>
