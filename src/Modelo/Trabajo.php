<?php 
require_once "Funciones.php";
class Trabajo extends Funciones
{
	public function registrartitulo($idelusuario,$titulo,$descripcion,$sugerirtutor,$titulo1,$descripcion1,$sugerirtutor1,$titulo2,$descripcion2,$sugerirtutor2,$creado,$datos){
		$sql = "INSERT INTO titulo (idtitulo, usuario_id_normal, titulo, descripcion, sugerir_tutor, fecha_peticion, estado,nota_final, procesotrabajo) VALUES (NULL, '$idelusuario', '$titulo', '$descripcion', '$sugerirtutor', '$creado', '0','','0')"; 
		$resultado = self::ejecutarConsulta($sql,$datos);

		$sql1 = "INSERT INTO titulo (idtitulo, usuario_id_normal, titulo, descripcion, sugerir_tutor, fecha_peticion, estado,nota_final, procesotrabajo) VALUES (NULL, '$idelusuario', '$titulo1', '$descripcion1', '$sugerirtutor1', '$creado', '0','','0')";
		$resultado1 = self::ejecutarConsulta($sql1,$datos);

		$sql2 = "INSERT INTO titulo (idtitulo, usuario_id_normal, titulo, descripcion, sugerir_tutor, fecha_peticion, estado,nota_final, procesotrabajo) VALUES (NULL, '$idelusuario', '$titulo2', '$descripcion2', '$sugerirtutor2', '$creado', '0','','0')";
		$resultado2 = self::ejecutarConsulta($sql2,$datos);


		if ($resultado && $resultado1 && $resultado2) {
			$sessData['estado']['type'] = "success";
			$sessData['estado']['msg'] = "Se registro el titulo del trabajo correctamente";
		}else{
			$sessData['estado']['type'] = "error";
			$sessData['estado']['msg'] = "Hubo un error al registrar el trabajo";
		} 
		echo json_encode($sessData);

	}

	public function vertrabajousuario($idelusuario,$datos){
		$sql = "SELECT tra.idtrabajo FROM trabajo tra INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON usu.idusuario = tit.usuario_id_normal WHERE usu.idusuario = '$idelusuario' AND tit.estado = '1' AND usu.permiso = '0'";
		$resultado = self::ejecutarConsultaSimpleFila($sql,$datos);
		if ($resultado) {
			$sessData['datos'] = $resultado->idtrabajo;
		}else{
			$sessData['datos'] = '';
		}
		echo json_encode($sessData);	
	}

	public function sugerirtutor(){
		$sql = "SELECT idusuario,nombre,apellido FROM usuario WHERE permiso = '1'";
		$datos = "";
		$resultado = self::ejecutarConsultaTodasFilas($sql,$datos);
		if ($resultado) {
			/* obtener el array de objetos */
			foreach ($resultado as $obj) {
				echo "<option value=".$obj->idusuario.">".$obj->nombre." ".$obj->apellido."</option>";
			}
		}
	}

	public function contartitulo($idelusuario,$datos){
		$sql3 = "SELECT COUNT(idtitulo) AS cantidadtitulo FROM titulo WHERE usuario_id_normal = '$idelusuario' LIMIT 1";
		$resultado = self::ejecutarConsultaSimpleFila($sql3,$datos);
		if ($resultado) {
			$sessData['datos'] = $resultado->cantidadtitulo;
		}else{
			$sessData['datos'] = '0';
		}
		echo json_encode($sessData);	
	}

	public function mostrartitulosusuario($id,$datos){
		$sql = "SELECT tit.idtitulo, tit.titulo, tit.descripcion, usu.idusuario as ideltutor, usu.nombre, usu.apellido, usu.telefono, usu.correo FROM titulo tit INNER JOIN usuario usu ON tit.sugerir_tutor = usu.idusuario WHERE tit.estado = '0' AND tit.usuario_id_normal = '$id'";
		$query=self::ejecutarConsultaTodasFilas($sql,$datos);
		$totaltitulos = count($query);
		if ($query) {

			if ($totaltitulos=='2') {
				echo "<div class='text-dark'>";
				echo "Ya se aprobo un titulo de trabajo de grado para este usuario";
				echo "</div>";
			}else{
			foreach ($query as $row) {
				echo "<div class='text-dark'>";
				echo "Titulo del trabajo: ".$row->titulo."<br>Sugerencia de tutor para este trabajo: ".$row->nombre." ".$row->apellido." <br>Telefono: ".$row->telefono." | Correo: ".$row->correo;
				echo "<br>Agregar tutor para este titulo de trabajo de grado <button type='button' class='btn btn-success' onclick='vertutores(\"".$row->idtitulo."\");' data-toggle='modal' data-target='#vertutores'>Seleccionar tutor para este titulo de proyecto de grado</button> ";
				echo "<hr>";
				echo "</div>";
			}
			echo "<div class='text-dark'>
				<button class='btn btn-danger' onclick='desaprobartitulos(\"".$id."\");' data-toggle='modal' data-target='#desaprobartitulomodal'>Desaprobar los titulos del proyecto de grado</button>
			</div>";
			}

		}else{
			echo "No hay ningún titulo de trabajo de grado asociado a este usuario";
		}
	}

	public function registrartutortitulo($idtitulo,$idusuario,$datos){
		$sql2 = "INSERT INTO trabajo (idtrabajo, titulo_id, usuario_id_tutor) VALUES (NULL, '$idtitulo', '$idusuario')";
		$sql3 = "UPDATE titulo tit SET tit.estado = '1' WHERE tit.idtitulo = '$idtitulo'";
		$resultado2 = self::ejecutarConsulta($sql2,$datos);
		$resultado3 = self::ejecutarConsulta($sql3,$datos);
		if ($resultado2 && $resultado3) {
			$sessData['estado']['type'] = "success";
			$sessData['estado']['msg'] = "Se guardaron los datos correctamente";
		}else{
			$sessData['estado']['type'] = "error";
			$sessData['estado']['msg'] = "Hubo un error al registrar los datos";
		} 
		echo json_encode($sessData);	
	}

	public function mostrarinfotitulo($id,$datos){
		$sql = "SELECT tit.idtitulo, tit.titulo, tit.descripcion, tit.fecha_peticion, usu.nombre, usu.apellido FROM titulo tit INNER JOIN usuario usu ON tit.sugerir_tutor = usu.idusuario WHERE tit.idtitulo ='$id'";
		$query=self::ejecutarConsultaSimpleFila($sql,$datos);

		$sql2 = "SELECT usu.idusuario, usu.nombre, usu.apellido FROM usuario usu WHERE usu.permiso = '1'";
		$consulta2 = self::ejecutarConsultaTodasFilas($sql2,$datos);

		if ($query) {
			echo "Titulo del proyecto: ".$query->titulo."<br>Fecha de petición del trabajo de grado: ".$query->fecha_peticion."<br>Tutor sugerido por el estudiante que va a realizar el trabajo de grado: ".$query->nombre." ".$query->apellido."<br>";

			if ($consulta2) {
				echo "<form id='formtutor'><label>Selecciona el tutor para este trabajo de grado <select name='selectutor'>";
				foreach ($consulta2 as $row) {
				// Revisar esto
					echo "<option value=".$row->idusuario.">".$row->nombre." ".$row->apellido."</option>";
					$idusuario = $row->idusuario;
				}
				echo "</select></label>";
				echo "<input type='hidden' name='idtitulo' value=".$query->idtitulo.">";
				echo "<button type='button' onclick='registrartutortitulo(\"".$query->idtitulo."\",\"".$idusuario ."\");'>Registrar el tutor con el titulo del proyecto de grado</button>";
				echo "</form>";
			}else{
				echo "no hay nada";
			}

		}else{
			echo "no hay información";
		}
	}

public function trabajosdetutoriados($datos){
	// $sql = "SELECT * FROM trabajo tra INNER JOIN usuario usu ON usu.idusuario = tra.usuario_id_tutor INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id"; 
$requestData = $_POST;
$columns = array( 
	0 =>'tit.titulo'
);
// getting total number records without any search
$sql1 = "SELECT COUNT(tra.idtrabajo) as totaltrabajos FROM trabajo tra INNER JOIN usuario usu ON usu.idusuario = tra.usuario_id_tutor INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu2 ON usu2.idusuario = tit.usuario_id_normal";
$query=self::ejecutarConsultaSimpleFila($sql1,$datos);
// Revisar desde aqui
if ($query) {
	$totalData = $query->totaltrabajos;
}
$sql = "SELECT tra.idtrabajo, usu.idusuario, usu.nombre as nombretutor, usu.apellido as apellidotutor, tit.titulo, tit.descripcion, tit.fecha_peticion, usu2.idusuario as usuariotrabajo,usu2.idusuario as idusuario2, usu2.nombre as nombretrabajo, usu2.apellido as apellidotrabajo, usu2.telefono as telefonotrabajo, usu2.correo as correotrabajo, usu2.foto as fotousuario FROM trabajo tra INNER JOIN usuario usu ON usu.idusuario = tra.usuario_id_tutor INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu2 ON usu2.idusuario = tit.usuario_id_normal ";
        // 
// getting records as per search parameters
if( isset($requestData['search']) && $requestData['search'] !== "" ){   //name
	$sql.=" AND tit.titulo LIKE '%".addslashes($requestData['search']['value'])."%' ";
}
// Revisar esto
$query=self::ejecutarConsultaCantidadRow($sql,$datos);
$totalFiltered = $query;
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." ";  // adding length
$query=self::ejecutarConsultaTodasFilas($sql,$datos);
$data=array();

if ($query) {
	foreach ($query as $row) {
		$data[]=array(  "0"=>'<div class="text-dark">
			Datos del estudiante<br>Nombre y apellido: '.$row->nombretrabajo.' '.$row->apellidotrabajo.'<br>Telefono: '.$row->telefonotrabajo.'<br>Correo: '.$row->correotrabajo.'<br>Titulo del trabajo de grado del usuario: '.$row->titulo.'<br>Fecha en la que el usuario inicio el trabajo de grado: '.$row->fecha_peticion.'
			<br>Ver detalles del trabajo de grado de este usuario <button type="button" class="btn btn-success" onclick="verdetallesdeltrabajo(\''.$row->idusuario2.'\');" data-toggle="modal" data-target="#verdetallesdeltrabajo">Ver detalles del trabajo de grado</button>
			</div>'
		);
	}
}else{
	$data[]=array(  "0"=>'No hay nada.');
}

$json_data = array(
    "sEcho"=>intval( $requestData['draw'] ),  //Informacion para el datatables
    "iTotalRecords"=>intval( $totalData ),//enviamos el total de registros al datatable 
    "iTotalDisplayRecords"=>intval( $totalFiltered ),//enviamos el total registros a visualizar 
    "aaData"=>$data
);
echo json_encode($json_data);  // send data as json format	
}

public function trabajosparatutores($datos){
// Esta consulta me muestra los titulos de trabajo que han sugerido algun tutor, solo los titulos que estan en 0 osea sin aprobar algun tutor
	$requestData = $_POST;
	$columns = array( 
		0 =>'usu.nombre'
	);
// getting total number records without any search
	$sql1 = "SELECT COUNT(usu.idusuario) as totalusuario FROM titulo tit INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE tit.estado = '0' GROUP BY usu.idusuario";
	$query=self::ejecutarConsultaSimpleFila($sql1,$datos);
// Revisar desde aqui
	if ($query) {
		$totalData = $query->totalusuario;
	}

// SELECT tit.idtitulo, tit.titulo, tit.descripcion, usu.idusuario as ideltutor, usu.nombre, usu.apellido, usu.telefono, usu.correo FROM titulo tit INNER JOIN usuario usu ON tit.sugerir_tutor = usu.idusuario WHERE tit.estado = '0' AND tit.usuario_id_normal = '$id'


	$sql = "SELECT usu.idusuario, usu.cedula, usu.nombre, usu.apellido, usu.telefono, usu.correo, usu.foto FROM titulo tit INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE tit.estado = '0' ";
        // 
// getting records as per search parameters
if( isset($requestData['search']) && $requestData['search'] !== "" ){   //name
	$sql.=" AND usu.nombre LIKE '%".addslashes($requestData['search']['value'])."%' GROUP BY usu.idusuario ";
}
// Revisar esto
$query=self::ejecutarConsultaCantidadRow($sql,$datos);
$totalFiltered = $query;
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." ";  // adding length
$query=self::ejecutarConsultaTodasFilas($sql,$datos);
$data=array();

if ($query) {
	foreach ($query as $row) {
		$data[]=array(  "0"=>'<div class="text-dark">
			Cedula: '.$row->cedula.'<br>Nombre y Apellido: '.$row->nombre.' '.$row->apellido.'<br>Telefono: '.$row->telefono.'<br>Correo: '.$row->correo.'<br>Ver los titulos de trabajo de grado de este usuario <button type="button" class="btn btn-success" onclick="vertitulos(\''.$row->idusuario.'\');" data-toggle="modal" data-target="#vertitulos">Ver titulos para aprobar</button>
			</div>'
	);

	}
}else{
	$data[]=array(  "0"=>'No hay nada.');
}

$json_data = array(
    "sEcho"=>intval( $requestData['draw'] ),  //Informacion para el datatables
    "iTotalRecords"=>intval( $totalData ),//enviamos el total de registros al datatable 
    "iTotalDisplayRecords"=>intval( $totalFiltered ),//enviamos el total registros a visualizar 
    "aaData"=>$data
);
echo json_encode($json_data);  // send data as json format	
}

public function mostrartituloen1($idelusuario,$datos){
$sql = "SELECT tra.idtrabajo, tit.idtitulo, tit.titulo, tit.descripcion, tit.fecha_peticion, usu2.nombre as nombretutor, usu2.apellido as apellidotutor, usu2.telefono as telefonotutor, usu2.correo as correotutor, usu2.foto as fototutor FROM trabajo tra INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON usu.idusuario = tit.usuario_id_normal INNER JOIN usuario usu2 ON usu2.idusuario = tra.usuario_id_tutor WHERE usu.idusuario = '$idelusuario' AND tit.estado = '1' AND usu.permiso = '0'";
	// idtrabajo
	// idtitulo
	$query=self::ejecutarConsultaTodasFilas($sql,$datos);
	if ($query) {
		foreach ($query as $row) {
			$fechaOriginal = $row->fecha_peticion;
			$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
			echo "<hr><div class='text-dark'>";
			echo "Titulo del trabajo: ".$row->titulo."<br>Tutor para este trabajo: ".$row->nombretutor." ".$row->apellidotutor." <br>Telefono: ".$row->telefonotutor." | Correo: ".$row->correotutor." | Foto del tutor: ".$row->fototutor;
			echo "<br>Fecha en la que se subio el titulo del proyecto de grado: ".$fechaFormateada;
			// echo "<br>Ver información del trabajo de grado <button type='button' class='btn btn-success' onclick='verInformacionTrabajo(\"".$row->idtrabajo."\");' data-toggle='modal' data-target='#vertutores'>Pulsame</button> ";
			echo "</div>";
			echo "<hr>";
		}
	}else{
		echo "No hay ningún titulo aprobado para hacer el trabajo de grado";
	}
}

public function revisarloscapitulosensistema($idelusuario,$datos){
$sql2 = "SELECT cap.idcapitulo,cap.numero_capitulo, cap.fecha_creado, cap.url_archivo,cap.estado, tit.titulo, tit.descripcion FROM capitulo cap INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE usu.idusuario = '$idelusuario'";
$consulta2 = self::ejecutarConsultaTodasFilas($sql2,$datos);

$sql4 = "SELECT * FROM nota_trabajo nota INNER JOIN usuario tutor ON tutor.idusuario = nota.usuario_idusuario INNER JOIN capitulo cap ON cap.idcapitulo = nota.capitulo_idcapitulo INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario study ON study.idusuario = tit.usuario_id_normal WHERE study.idusuario = '$idelusuario'";
$consulta4 = self::ejecutarConsultaTodasFilas($sql4,$datos);
$cantidadnota = count($consulta4);
$valornota= '';
// cap.numero_capitulo,cap.fecha_creado,cap.url_archivo, tit.titulo, tit.descripcion
if ($consulta2) {
	echo "<hr><div class='text-dark'>Mostrando los capitulos subidos en el sistema</div><hr>";
	echo "<div class='row d-flex justify-content-around'>";
foreach ($consulta2 as $row) {
// Revisar esto aqui para poder descargar los archivos
$direccion = str_replace('C:xampphtdocsHechoPorMiSistema TesissrcArchivosCapitulos/','',$row->url_archivo);
			$fechaOriginal = $row->fecha_creado;
// 0=no procesado
// 1=corregido ahora ingresa el siguiente capitulo
// 2=no has pasado el capitulo, por favor sube las correciones del capitulo

switch ($row->estado) {
	case '0':
	$valorestado = '<label class="bg-info">Todavia no ha sido calificado este capitulo</label> <button type="button" class="btn btn-info" onclick="editarcapitulo(\''.$row->idcapitulo.'\');" data-toggle="modal" data-target="#editarcapitulo">Editar capitulo </button>';
	break;
	
	case '1':
	if ($row->numero_capitulo == '5') {
	$valorestado = '<label class="bg-success">El trabajo de grado ya paso todos los capitulos, Felicidades!</label>';
	if ($cantidadnota>=1) {
	$valornota = '<button type="button" class="btn btn-secondary" onclick="vernota(\''.$row->idcapitulo.'\');" data-toggle="modal" data-target="#notafinal">Has click para ver la nota final del trabajo de grado</button>';
	}else{
	$valornota = '<label class="bg-secondary">Tienes que esperar que el tutor suba la nota final del trabajo de grado</label>';
	}
	}else{
	$valorestado = '<label class="bg-success">El capitulo esta bien, ahora sube el siguiente capitulo</label>';
	}
	break;
	
	case '2':
	$valorestado = '<label class="bg-danger">El capitulo no esta bien, ahora vuelve a subir el capitulo con las mejoras</label> <button type="button" class="btn btn-info" onclick="editarcapitulo(\''.$row->idcapitulo.'\');" data-toggle="modal" data-target="#editarcapitulo">Editar capitulo </button>';
	break;
	
	default:
	break;
}

$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
echo "<div class='text-dark col-5 bg-light mb-4 rounded shadow '>";
echo '<br><strong>CAPITULO: '.$row->numero_capitulo.'</strong>';
echo '<br><strong>-Titulo</strong>: '.$row->titulo;
echo '<br><strong>-Fecha registro</strong>: '.$fechaFormateada;
echo '<p><strong>-Descargar capitulo: </strong><a href="src/Archivos/Capitulos/'.$direccion.'" download> <button class="btn btn-3d btn-dark"><i class="fa fa-download"></i></button></a></p>';
echo $valorestado;
echo $valornota;
echo "</div>";
}
echo "</div>";
}else{
	echo "no hay nada";
}	
}

public function aprobarcapitulo($idcapitulo,$datos){
	$sql2 = "UPDATE capitulo cap SET cap.estado = '1' WHERE cap.idcapitulo =  '$idcapitulo'";
	$resultado2 = self::ejecutarConsulta($sql2,$datos);

	if ($resultado2) {
		$sessData['estado']['type'] = "success";
		$sessData['estado']['msg'] = "Se aprobo el capitulo";
	}else{
		$sessData['estado']['type'] = "error";
		$sessData['estado']['msg'] = "Hubo un error al guardar los datos";
	} 
	echo json_encode($sessData);
}

public function desaprobarcapitulo($idcapitulo,$datos){
	$sql2 = "UPDATE capitulo cap SET cap.estado = '2' WHERE cap.idcapitulo = '$idcapitulo'";
	$resultado2 = self::ejecutarConsulta($sql2,$datos);

	if ($resultado2) {
		$sessData['estado']['type'] = "success";
		$sessData['estado']['msg'] = "Se desaprobo el capitulo";
	}else{
		$sessData['estado']['type'] = "error";
		$sessData['estado']['msg'] = "Hubo un error al guardar los datos";
	} 
	echo json_encode($sessData);
}

public function mostrarcapitulosestudiante($idusuario,$datos){
$sql2 = "SELECT cap.idcapitulo,cap.numero_capitulo, cap.fecha_creado, cap.url_archivo,cap.estado, tit.titulo, tit.descripcion FROM capitulo cap INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE usu.idusuario = '$idusuario'";
	$consulta2 = self::ejecutarConsultaTodasFilas($sql2,$datos);



// cap.numero_capitulo,cap.fecha_creado,cap.url_archivo, tit.titulo, tit.descripcion
	if ($consulta2) {
		echo "<h5><div class='text-dark'>Mostrando los capitulos subidos en el sistema</div></h5><hr>";
		foreach ($consulta2 as $row) {
// Revisar esto aqui para poder descargar los archivos
			$direccion = str_replace('C:xampphtdocsHechoPorMiSistema TesissrcArchivosCapitulos/','',$row->url_archivo);
			$fechaOriginal = $row->fecha_creado;
			$numerocapitulo = $row->numero_capitulo;
// 0=no procesado
// 1=corregido ahora ingresa el siguiente capitulo
// 2=no has pasado el capitulo, por favor sube las correciones del capitulo
			switch ($row->estado) {
				case '0':
				$valorestado = '<label class="bg-info">Todavia no ha sido calificado este capitulo</label>';
				break;

				case '1':
				$valorestado = '<label class="bg-success">El capitulo ya se califico como correcto</label>';
				break;

				case '2':
				$valorestado = '<label class="bg-danger">El capitulo fue calificado como malo</label>';
				break;

				default:
				break;
			}

if ($numerocapitulo == '5') {
	if ($row->estado=='1') {
		$subirnota = '<button type="button" class="btn btn-success" onclick="subirnotas(\''.$row->idcapitulo.'\');" data-toggle="modal" data-target="#subirnotatrabajo" id="subirnotabtn">Subir notas del trabajo de grado</button>';

	}else{
		$subirnota = '';
	}
}else{
	$subirnota = '';
}

			$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
			echo "<div class='text-dark'>";
			echo '<br>Titulo del trabajo de grado: '.$row->titulo;
			echo '<br>Número del capitulo: '.$row->numero_capitulo;
			echo '<br>Fecha en la que se subio el capitulo: '.$fechaFormateada;
			echo '<p><strong>Descargar el archivo: </strong><a href="src/Archivos/Capitulos/'.$direccion.'" download> <button class="btn btn-3d btn-warning"><i class="fa fa-download"></i></button></a></p>';
			echo $valorestado.'<br>';
			echo $subirnota;


			if ($row->estado=='0') {
				echo '<button type="button" class="btn btn-success" onclick="aprobarcapitulo(\''.$row->idcapitulo.'\');">Aprobar el capitulo del trabajo</button>';
				echo ' <button type="button" class="btn btn-danger" onclick="desaprobarcapitulo(\''.$row->idcapitulo.'\');">Desaprobar el capitulo del trabajo</button>';

			}else{
			}
			echo "<hr>";
			echo "<div>";
		}
	}else{
		echo "no hay nada";
	}	
}

public function verificarestadocapitulo($idelusuario,$datos){
$sql2 = "SELECT cap.idcapitulo, cap.numero_capitulo, cap.estado FROM capitulo cap INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE usu.idusuario = '$idelusuario' ORDER BY cap.numero_capitulo DESC LIMIT 1 "; 
	$resultado2 = self::ejecutarConsultaTodasFilas($sql2,$datos);
	if ($resultado2) {
		foreach ($resultado2 as $row) {
			$sessData['datos'] = array('idcapitulo' => $row->idcapitulo,
				'numero_capitulo'=>$row->numero_capitulo,
				'estado'=>$row->estado);
		}
	}else{
		$sessData['datos'] = array('idcapitulo' => '0',
			'numero_capitulo'=>'0',
			'estado'=>'0');
	}
	echo json_encode($sessData);
}

	public function contarcapitulosusuario($idelusuario,$datos){
$sql2 = "SELECT COUNT(cap.idcapitulo) AS cantidadcapitulo FROM capitulo cap INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE usu.idusuario = '$idelusuario'"; 
	$resultado2 = self::ejecutarConsultaSimpleFila($sql2,$datos);
	if ($resultado2) {
		switch ($resultado2->cantidadcapitulo) {
			case '0':
			$datoscantidad = '1';	
			break;

			case '1':
			$datoscantidad = '2';	
			break;

			case '2':
			$datoscantidad = '3';	
			break;

			case '3':
			$datoscantidad = '4';	
			break;

			case '4':
			$datoscantidad = '5';	
			break;

// Esto aqui ya no deberia ir
			case '5':
			$datoscantidad = '6';	
			break;

			default:
			break;
		}
	}else{
		$datoscantidad = '1';
	}
	echo $datoscantidad;
}

public function editarcapitulo($idcapitulo,$datos){
	$archivoTemporal=isset($_FILES['capituloeditar']['tmp_name'])?$_FILES['capituloeditar']['tmp_name']:'';
	$name = $_FILES['capituloeditar']['name'];
	if(file_exists($archivoTemporal) || is_uploaded_file($archivoTemporal))
	{
		$file = dirname(__FILE__);
		$imagen = round(microtime(true)).'--'.$name;
		$direct = $file;
		$valorcompleto = str_replace('\Modelo', '\Archivos\Capitulos', $direct);
		$direccioncompleta = $valorcompleto."/".$imagen;
		$msg = (move_uploaded_file($archivoTemporal, $direccioncompleta))?"Se subio el capitulo de manera correcta":"Hubo un error al subir el archivo";
	}

	$sql = "UPDATE capitulo cap SET cap.url_archivo = '$direccioncompleta', cap.estado = '0' WHERE cap.idcapitulo = '$idcapitulo'";
	$resultado = self::ejecutarConsulta($sql,$datos);
	if ($resultado) {
		$sessData['estado']['type'] = "success";
		$sessData['estado']['msg'] = "Se edito el capitulo correctamente";
	}else{
		$sessData['estado']['type'] = "error";
		$sessData['estado']['msg'] = "Hubo un error al editar el capitulo";
	} 
	echo json_encode($sessData);
}

public function subircapitulos($idelusuario,$idtrabajo,$datos){
$archivoTemporal=isset($_FILES['capitulo']['tmp_name'])?$_FILES['capitulo']['tmp_name']:'';
	$name = $_FILES['capitulo']['name'];
	if(file_exists($archivoTemporal) || is_uploaded_file($archivoTemporal))
	{
		$file = dirname(__FILE__);
		$imagen = round(microtime(true)).'--'.$name;
		$direct = $file;
		$valorcompleto = str_replace('\Modelo', '\Archivos\Capitulos', $direct);
		$direccioncompleta = $valorcompleto."/".$imagen;
		$msg = (move_uploaded_file($archivoTemporal, $direccioncompleta))?"Se subio el capitulo de manera correcta":"Hubo un error al subir el archivo";
	}	

	$sql2 = "SELECT COUNT(cap.idcapitulo) AS cantidadcapitulo FROM capitulo cap INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu ON tit.usuario_id_normal = usu.idusuario WHERE usu.idusuario = '$idelusuario'"; 
	$resultado2 = self::ejecutarConsultaSimpleFila($sql2,$datos);
	if ($resultado2) {
		switch ($resultado2->cantidadcapitulo) {
			case '0':
			$datoscantidad = '1';	
			break;

			case '1':
			$datoscantidad = '2';	
			break;

			case '2':
			$datoscantidad = '3';	
			break;

			case '3':
			$datoscantidad = '4';	
			break;

			case '4':
			$datoscantidad = '5';	
			break;

// Esto aqui ya no deberia ir
			case '5':
			$datoscantidad = '6';	
			break;

			default:
			break;
		}
	}else{
		$datoscantidad = '1';
	}
	$sql = "INSERT INTO capitulo (idcapitulo, trabajo_id, numero_capitulo, url_archivo, fecha_creado, fecha_actualizado, estado) VALUES (NULL, '$idtrabajo', '$datoscantidad', '$direccioncompleta', CURRENT_TIMESTAMP, NULL, '0')";
	$resultado = self::ejecutarConsulta($sql,$datos);
	if ($resultado) {
		$sessData['estado']['type'] = "success";
		$sessData['estado']['msg'] = "Se subio el capitulo correctamente";
	}else{
		$sessData['estado']['type'] = "error";
		$sessData['estado']['msg'] = "Hubo un error al registrar el trabajo";
	} 
	echo json_encode($sessData);
}

	public function buscartitulo($buscar_tesis,$datos){
$sql = "SELECT usu.nombre as nombretutor, usu.apellido as apellidotutor, tit.titulo, tit.descripcion, tit.fecha_peticion, usu2.nombre as nombretrabajo, usu2.apellido as apellidotrabajo, usu2.telefono as telefonotrabajo, usu2.correo as correotrabajo, usu2.foto as fotousuario, cap.url_archivo FROM trabajo tra INNER JOIN usuario usu ON usu.idusuario = tra.usuario_id_tutor INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario usu2 ON usu2.idusuario = tit.usuario_id_normal INNER JOIN capitulo cap ON cap.trabajo_id = tra.idtrabajo WHERE tit.titulo LIKE '%".$buscar_tesis."%' AND cap.numero_capitulo='5' AND cap.estado='1'";

	$query=self::ejecutarConsultaTodasFilas($sql,$datos);
	if ($query) {
		foreach ($query as $row) {
$direccion = str_replace('C:xampphtdocsHechoPorMiSistema TesissrcArchivosCapitulos/','',$row->url_archivo);
			$fechaOriginal = $row->fecha_peticion;
			$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
			echo "<hr><div class='text-dark'>";
			echo "Titulo del trabajo: ".$row->titulo;
			echo "<br>Fecha en la que se subio el titulo del proyecto de grado: ".$fechaFormateada;
			echo "<br>Creador de trabajo de grado".$row->nombretrabajo." ".$row->apellidotrabajo;
			echo '<p><strong>Descargar el archivo: </strong><a href="src/Archivos/Capitulos/'.$direccion.'" download> <button class="btn btn-3d btn-success"><i class="fa fa-download"></i></button></a></p>';

			// echo "<br>Ver información del trabajo de grado <button type='button' class='btn btn-success' onclick='verInformacionTrabajo(\"".$row->idtrabajo."\");' data-toggle='modal' data-target='#vertutores'>Pulsame</button> ";
			echo "</div>";
			echo "<hr>";
		}
	}else{
		echo "<div class='text-dark'>No hay ningún titulo de trabajo de grado con ese nombre</div>";
	}
}

	public function desaprobartitulos($mensajetitulosmal,$idusuariomensaje,$datos){
	$sql = "INSERT INTO mensaje_usuario (idmensaje_usuario, mensaje, usuario_id) VALUES (NULL, '$mensajetitulosmal','$idusuariomensaje')";
	$consulta = self::ejecutarConsulta($sql,$datos);

	if ($consulta) {
		$sessData['estado']['type'] = 'success';
		$sessData['estado']['msg'] = 'Se envio el mensaje correctamente'; 
	}else{
		$sessData['estado']['type'] = 'error';
		$sessData['estado']['msg'] = 'Hubo un error al enviar el mensaje'; 
	} 

	echo json_encode($sessData);
	}


public function subirnotatrabajo($capituloid,$sugerirjurado,$nota,$sugerirjurado1,$nota1,$sugerirjurado2,$nota2,$datos){
$sql = "INSERT INTO nota_trabajo (idnota_trabajo, usuario_idusuario, capitulo_idcapitulo, nota_jurado) VALUES (NULL, '$sugerirjurado ','$capituloid','$nota')";
	$consulta = self::ejecutarConsulta($sql,$datos);

	$sql1 = "INSERT INTO nota_trabajo (idnota_trabajo, usuario_idusuario, capitulo_idcapitulo, nota_jurado) VALUES (NULL, '$sugerirjurado1','$capituloid','$nota1')";
	$consulta1 = self::ejecutarConsulta($sql1,$datos);

	$sql2 = "INSERT INTO nota_trabajo (idnota_trabajo, usuario_idusuario, capitulo_idcapitulo, nota_jurado) VALUES (NULL, '$sugerirjurado2','$capituloid','$nota2')";
	$consulta2 = self::ejecutarConsulta($sql2,$datos);


$total = (($nota + $nota1 + $nota2)*3/100)+1;

	$sqlconsulta = "select * from titulo tit inner join trabajo tra on tit.idtitulo = tra.titulo_id inner join capitulo cap on cap.trabajo_id = tra.idtrabajo WHERE cap.idcapitulo = '$capituloid' limit 1"; 
	$resultado2 = self::ejecutarConsultaSimpleFila($sqlconsulta,$datos);

	if ($resultado2) {
	$idtitulonuevo = $resultado2->idtitulo;
	$sql3 = "UPDATE titulo SET nota_final = '$total', procesotrabajo = '1' WHERE idtitulo = '$idtitulonuevo'";
	$resultado = self::ejecutarConsulta($sql3,$datos);
	}

	if ($consulta && $consulta1 && $consulta2 && $resultado) {
		$sessData['estado']['type'] = 'success';
		$sessData['estado']['msg'] = 'Se subieron las notas correctamente'; 
	}else{
		$sessData['estado']['type'] = 'error';
		$sessData['estado']['msg'] = 'Hubo un error al registrar las notas'; 
	} 

	echo json_encode($sessData);
	}


public function vernota($capituloid,$datos){
	$sql = "SELECT nota.idnota_trabajo, nota.nota_jurado, cap.numero_capitulo, tit.titulo, tit.nota_final,tit.procesotrabajo, jura.cedula, jura.nombre, jura.apellido, jura.telefono, jura.correo FROM nota_trabajo nota INNER JOIN capitulo cap ON cap.idcapitulo = nota.capitulo_idcapitulo INNER JOIN trabajo tra ON cap.trabajo_id = tra.idtrabajo INNER JOIN titulo tit ON tit.idtitulo = tra.titulo_id INNER JOIN usuario jura ON jura.idusuario = nota.usuario_idusuario WHERE cap.idcapitulo = '$capituloid' AND tit.procesotrabajo = '1'";

	$consulta2 = self::ejecutarConsultaTodasFilas($sql,$datos);
 // idnota_trabajo	nota_jurado	numero_capitulo	titulo	nota_final	procesotrabajo	cedula	nombre	apellido	telefono	correo 	

	echo '<h1><small>Información del jurado</small></h1>';
	  echo '<div class="row d-flex justify-content-around">';
	if ($consulta2) {
		foreach ($consulta2 as $row) {
		$notatotal = $row->nota_final;
echo "<div class='col-4'>
           <p><small>Cedula del jurado:</small><strong>".$row->cedula."</strong></p>
           <p><small>Nombre del jurado:</small><strong>".$row->nombre." ".$row->apellido."</strong></p>
           <p><small>Telefono:</small><strong>>".$row->telefono."</strong></p>
           <p><small>Correo:</small><strong>".$row->correo."</strong></p>
           <p><small>Nota del jurado:</small><strong>".$row->nota_jurado."</strong></p>
        </div>";
		}

		echo "</div>";
echo "<div class='col-12'>
          <small>Nota final del proyecto:</small><strong>".$notatotal."</strong>
        </div>";
	}
}

}
?>