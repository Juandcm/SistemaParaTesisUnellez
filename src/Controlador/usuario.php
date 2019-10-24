<?php session_start();
error_reporting(-1);
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require_once "../Modelo/Usuario.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;	


$mail = new PHPMailer();
//Este bloque es importante
$mail->IsSMTP();
$mail->SMTPAuth = true;
// $mail->SMTPSecure = "ssl";
$mail->CharSet="UTF-8";
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Port = 25; // Puerto a utilizar
$mail->Host = 'smtp.gmail.com'; // SMTP a utilizar. Por ej. smtp.elserver.com


$Limpiarvar = new Funciones();
$usu_normal = new Usuario();

// // Sesion del usuario
$DataUsuario = isset($_SESSION['DatosUsuario'])?$_SESSION['DatosUsuario']:'';
$idusuario = !empty($DataUsuario['usuario']['id'])?$DataUsuario['usuario']['id']:'';
$foto_usuario = !empty($DataUsuario['usuario']['foto_usuario'])?$DataUsuario['usuario']['foto_usuario']:'';
// Registro del usuario en vista administrador
$tipo_usuario = isset($_POST['tipo_usuario'])?$Limpiarvar->limpiar($_POST['tipo_usuario'],'0'):'';
$cedula_up_usuario = isset($_POST['cedula_up_usuario'])?$Limpiarvar->limpiar($_POST['cedula_up_usuario'],'1'):'';
$vicerrectorado = isset($_POST['vicerrectorado'])?$Limpiarvar->limpiar($_POST['vicerrectorado'],'0'):'';
$programa =  isset($_POST['programa'])?$Limpiarvar->limpiar($_POST['programa'],'0'):'';
$subprograma_id = isset($_POST['subp_user'])?$Limpiarvar->limpiar($_POST['subp_user'],'0'):'';

// Registo de usuario en login
$cedula_user = isset($_POST['cedula_user'])?$Limpiarvar->limpiar($_POST['cedula_user'],'1'):'';
$nombre_user = isset($_POST['nombre_user'])?$Limpiarvar->limpiar($_POST['nombre_user'],'0'):'';
$apellido_user = isset($_POST['apellido_user'])?$Limpiarvar->limpiar($_POST['apellido_user'],'0'):'';
$tlf_user = isset($_POST['tlf_user'])?$Limpiarvar->limpiar($_POST['tlf_user'],'0'):'';
$email_user = isset($_POST['email_user'])?$Limpiarvar->limpiar($_POST['email_user'],'0'):'';
$clave_user = isset($_POST['clave_user'])?$Limpiarvar->limpiar($_POST['clave_user'],'0'):'';

// Restaurar contraseña
$usuario = isset($_POST['usuario'])?$Limpiarvar->limpiar($_POST['usuario'],'0'):'';
$contrasena = isset($_POST['contrasena'])?$Limpiarvar->limpiar($_POST['contrasena'],'0'):'';
$recuperar_clave = isset($_POST['recuperar_clave'])?$Limpiarvar->limpiar($_POST['recuperar_clave'],'1'):'';

$password = isset($_POST['password'])?$Limpiarvar->limpiar($_POST['password'],'0'):'';
$confirm_password = isset($_POST['confirm_password'])?$Limpiarvar->limpiar($_POST['confirm_password'],'0'):'';
$fp_code = isset($_POST['fp_code'])?$Limpiarvar->limpiar($_POST['fp_code'],'0'):'';

// $idusuario;
$nom_usuario_edi = isset($_POST['nom_usuario_edi'])?$Limpiarvar->limpiar($_POST['nom_usuario_edi'],'0'):'';
$ape_usuario_edi = isset($_POST['ape_usuario_edi'])?$Limpiarvar->limpiar($_POST['ape_usuario_edi'],'0'):'';
$tlf_usuario_edi = isset($_POST['tlf_usuario_edi'])?$Limpiarvar->limpiar($_POST['tlf_usuario_edi'],'0'):'';
$email_usuario_edi = isset($_POST['email_usuario_edi'])?$Limpiarvar->limpiar($_POST['email_usuario_edi'],'0'):'';
$pass_usuario_edi = isset($_POST['pass_usuario_edi'])?$Limpiarvar->limpiar($_POST['pass_usuario_edi'],'0'):'';
$permiso = isset($DataUsuario['usuario']['permiso'])?$DataUsuario['usuario']['permiso']:'';

$datos = '';

$op = isset($_GET['op'])?$Limpiarvar->limpiar($_GET['op'],'0'):'No';
$sessData = array();
switch ($op) {
	case 'entrar':
	$usu_normal->entrar($usuario,$contrasena);
	break;
	case 'cerrar':
	if(!empty($_REQUEST['op'])){
		unset($_SESSION['DatosUsuario']);
		session_destroy();
	}
	break;

	case 'restablecercorreo':
    $usu_normal->restablecercorreo($recuperar_clave,$datos);
    break;

    case 'registrarusuarioenadmin':
$usu_normal->registrarusuarioenadmin($cedula_up_usuario, $tipo_usuario, $subprograma_id, $datos);
    break;


    case 'enviarContrasena':
    $usu_normal->enviarContrasena($password,$confirm_password,$fp_code,$datos);
    break;

    case 'verificarcedula':
    $usu_normal->verificarcedula($cedula_up_usuario,$datos);
    break;



    case 'selectvicerrectorado':
    $usu_normal->selectvicerrectorado($datos);
    break;

    case 'selectprograma':
    $usu_normal->selectprograma($vicerrectorado,$datos);
    break;

    case 'selectsubprograma':
    $usu_normal->selectsubprograma($programa,$datos);
    break;


    case 'registrousuariologin':
    $usu_normal->registrousuariologin($cedula_user,$nombre_user,$apellido_user,$tlf_user,$email_user,$clave_user,$datos);
    break;

    case 'actualizarusuario':

    $archivoTemporal=isset($_FILES['foto_usuario_edi']['tmp_name'])?$_FILES['foto_usuario_edi']['tmp_name']:'';
    $name = $_FILES['foto_usuario_edi']['name'];
    $direccioncompleta ='';
    if(file_exists($archivoTemporal) || is_uploaded_file($archivoTemporal))
    {
        $file = dirname(__FILE__);
        $imagen = round(microtime(true)).'--'.$name;
        $direct = $file;
        // Aqui se debe cambiar \Controlador por \Modelo despues
        $valorcompleto = str_replace('\Controlador', '\Archivos\ImgUsuario', $direct);
        $direccioncompleta = $valorcompleto."/".$imagen;
        $msg = (move_uploaded_file($archivoTemporal, $direccioncompleta))?"Se subio la imagen de manera correcta":"Hubo un error al subir el archivo";
    }

    if ($direccioncompleta == '') {
        $fotocompleta = '';
    }else{
        $fotocompleta = $direccioncompleta;
    }

    if ($pass_usuario_edi == '1234') {

        if ($fotocompleta == '') {
            $valor =1;
            $sql = "UPDATE usuario SET nombre = '$nom_usuario_edi', apellido = '$ape_usuario_edi', telefono = '$tlf_usuario_edi', correo = '$email_usuario_edi' WHERE idusuario = '$idusuario'";
        }else{
            $valor =2;
            $sql = "UPDATE usuario SET foto = '$fotocompleta', nombre = '$nom_usuario_edi', apellido = '$ape_usuario_edi', telefono = '$tlf_usuario_edi', correo = '$email_usuario_edi' WHERE idusuario = '$idusuario'";
        }


    }else{
        if ($fotocompleta == '') {
            $valor =3;
            $sql = "UPDATE usuario SET nombre = '$nom_usuario_edi', apellido = '$ape_usuario_edi', telefono = '$tlf_usuario_edi', correo = '$email_usuario_edi', contrasena = '$pass_usuario_edi' WHERE idusuario = '$idusuario'";
        }else{
            $valor =4;
            $sql = "UPDATE usuario SET foto = '$fotocompleta', nombre = '$nom_usuario_edi', apellido = '$ape_usuario_edi', telefono = '$tlf_usuario_edi', correo = '$email_usuario_edi', contrasena = '$pass_usuario_edi' WHERE idusuario = '$idusuario'";
        }
    }

    $resultado = $usu_normal->ejecutarConsulta($sql,$datos);
    if ($resultado) {
        $sessData['estado']['type'] = "success";
        $sessData['estado']['msg'] = "Se edito el usuario correctamente";


        $sessionUsuario['usuario']['id'] = $idusuario;
        $sessionUsuario['usuario']['nombre'] = $nom_usuario_edi;
        $sessionUsuario['usuario']['apellido'] = $ape_usuario_edi;
        $sessionUsuario['usuario']['telefono'] = $tlf_usuario_edi;
        $sessionUsuario['usuario']['correo'] = $email_usuario_edi;
        if ($fotocompleta == '') {
            $sessionUsuario['usuario']['foto_usuario']=$foto_usuario;
        }else{

            $direccionfinal = str_replace('C:\xampp\htdocs\HechoPorMi\Sistema Tesis\src\Archivos\ImgUsuario/','',$fotocompleta);

            $sessionUsuario['usuario']['foto_usuario']=$direccionfinal;
        }
        $sessionUsuario['usuario']['permiso']=$permiso;
        // $sessionUsuario['usuario']['creado']=$consulta->fecha_creado;
        $_SESSION['DatosUsuario'] = $sessionUsuario;
    }else{
        $sessData['estado']['type'] = "error";
        $sessData['estado']['msg'] = "Hubo un error al editar el usuario";
    } 
    echo json_encode($sessData);
    break;

    default:
    break;
}