<?php session_start();
error_reporting(-1);
require_once "../Modelo/Trabajo.php";
$Limpiarvar = new Funciones();
$usu_normal = new Trabajo();

$DataUsuario = isset($_SESSION['DatosUsuario'])?$_SESSION['DatosUsuario']:'';
$idelusuario = isset($DataUsuario['usuario']['id'])?$DataUsuario['usuario']['id']:'';

$id = isset($_POST['id'])?$Limpiarvar->limpiar($_POST['id'],'0'):'';
$idtitulo = isset($_POST['idtitulo'])?$Limpiarvar->limpiar($_POST['idtitulo'],'0'):'';
$idusuario = isset($_POST['idusuario'])?$Limpiarvar->limpiar($_POST['idusuario'],'0'):'';
$idtrabajo = isset($_POST['idtrabajo'])?$Limpiarvar->limpiar($_POST['idtrabajo'],'0'):'';
$idcapitulo = isset($_POST['idcapitulo'])?$Limpiarvar->limpiar($_POST['idcapitulo'],'0'):'';

$buscar_tesis = isset($_POST['buscar_tesis'])?$Limpiarvar->limpiar($_POST['buscar_tesis'],'0'):'';

$contrasena = isset($_POST['contrasena'])?$Limpiarvar->limpiar($_POST['contrasena'],'0'):'';
$titulo = isset($_POST['titulo'])?$Limpiarvar->limpiar($_POST['titulo'],'0'):'';
$descripcion = isset($_POST['descripcion'])?$Limpiarvar->limpiar($_POST['descripcion'],'0'):'';
$sugerirtutor = isset($_POST['sugerirtutor'])?$Limpiarvar->limpiar($_POST['sugerirtutor'],'0'):'';

$titulo1 = isset($_POST['titulo1'])?$Limpiarvar->limpiar($_POST['titulo1'],'0'):'';
$descripcion1 = isset($_POST['descripcion1'])?$Limpiarvar->limpiar($_POST['descripcion1'],'0'):'';
$sugerirtutor1 = isset($_POST['sugerirtutor1'])?$Limpiarvar->limpiar($_POST['sugerirtutor1'],'0'):'';

$titulo2 = isset($_POST['titulo2'])?$Limpiarvar->limpiar($_POST['titulo2'],'0'):'';
$descripcion2 = isset($_POST['descripcion2'])?$Limpiarvar->limpiar($_POST['descripcion2'],'0'):'';
$sugerirtutor2 = isset($_POST['sugerirtutor2'])?$Limpiarvar->limpiar($_POST['sugerirtutor2'],'0'):'';

$creado = date("Y-m-d H:i:s");
$datos = "";

$idusuariomensaje = isset($_POST['idusuariomensaje'])?$Limpiarvar->limpiar($_POST['idusuariomensaje'],'0'):'';
$mensajetitulosmal = isset($_POST['mensajetitulosmal'])?$Limpiarvar->limpiar($_POST['mensajetitulosmal'],'0'):'';


$nota = isset($_POST['nota'])?$Limpiarvar->limpiar($_POST['nota'],'0'):'';
$sugerirjurado = isset($_POST['sugerirjurado'])?$Limpiarvar->limpiar($_POST['sugerirjurado'],'0'):'';
$nota1 = isset($_POST['nota1'])?$Limpiarvar->limpiar($_POST['nota1'],'0'):'';
$sugerirjurado1 = isset($_POST['sugerirjurado1'])?$Limpiarvar->limpiar($_POST['sugerirjurado1'],'0'):'';
$nota2 = isset($_POST['nota2'])?$Limpiarvar->limpiar($_POST['nota2'],'0'):'';
$sugerirjurado2 = isset($_POST['sugerirjurado2'])?$Limpiarvar->limpiar($_POST['sugerirjurado2'],'0'):'';
$capituloid = isset($_POST['capituloid'])?$Limpiarvar->limpiar($_POST['capituloid'],'0'):'';

$op = isset($_GET['op'])?$Limpiarvar->limpiar($_GET['op'],'0'):'No';
$sessData = array();
switch ($op) {
	case 'registrartitulo':
	$usu_normal->registrartitulo($idelusuario,$titulo,$descripcion,$sugerirtutor,$titulo1,$descripcion1,$sugerirtutor1,$titulo2,$descripcion2,$sugerirtutor2,$creado,$datos);
	break;

	case 'sugerirtutor':
	$usu_normal->sugerirtutor();
	break;

	case 'contartitulo':
	$usu_normal->contartitulo($idelusuario,$datos);
	break;

	case 'mostrarinfotitulo':
	$usu_normal->mostrarinfotitulo($id,$datos);
	break;

	case 'mostrartitulosusuario':
	$usu_normal->mostrartitulosusuario($id,$datos);
	break;

	case 'registrartutortitulo':
	$usu_normal->registrartutortitulo($idtitulo,$idusuario,$datos);
	break;

	case 'trabajosparatutores':
	$usu_normal->trabajosparatutores($datos);
	break;
	
	case 'trabajosdetutoriados':
	$usu_normal->trabajosdetutoriados($datos);
	break;

// Aqui muestro cuales son los titulos que estan aprobados para hacer el proyecto
	case 'mostrartituloen1':
	$usu_normal->mostrartituloen1($idelusuario,$datos);
	break;

	case 'vertrabajousuario':
	$usu_normal->vertrabajousuario($idelusuario,$datos);
	break;

	case 'revisarloscapitulosensistema':
	$usu_normal->revisarloscapitulosensistema($idelusuario,$datos);

	break;

	case 'contarcapitulosusuario':
	$usu_normal->contarcapitulosusuario($idelusuario,$datos);
	break;

	case 'verificarestadocapitulo':
	$usu_normal->verificarestadocapitulo($idelusuario,$datos);
	break;

	case 'mostrarcapitulosestudiante':
	$usu_normal->mostrarcapitulosestudiante($idusuario,$datos);
	break;
	
	case 'aprobarcapitulo':
	$usu_normal->aprobarcapitulo($idcapitulo,$datos);
	break;
	
	case 'desaprobarcapitulo':
	$usu_normal->desaprobarcapitulo($idcapitulo,$datos);
	break;


	case 'subircapitulos':
	$usu_normal->subircapitulos($idelusuario,$idtrabajo,$datos);
	break;

	case 'editarcapitulo':
	$usu_normal->editarcapitulo($idcapitulo,$datos);
	break;

	case 'buscartitulo':
	$usu_normal->buscartitulo($buscar_tesis,$datos);
		// $buscar_tesis
	break;


	case 'desaprobartitulos':
	$usu_normal->buscartitulodesaprobartitulos($mensajetitulosmal,$idusuariomensaje,$datos);
	break;
	
	case 'subirnotatrabajo':
	$usu_normal->subirnotatrabajo($capituloid,$sugerirjurado,$nota,$sugerirjurado1,$nota1,$sugerirjurado2,$nota2,$datos);
	break;

	case 'vernota':
	$usu_normal->vernota($capituloid,$datos);
	break;


	default:
	break;
}