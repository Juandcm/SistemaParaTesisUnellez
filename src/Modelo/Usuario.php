<?php 
require_once "Funciones.php";
class Usuario extends Funciones
{

	public function entrar($usuario,$contrasena){
       $sql = "SELECT u.idusuario, u.nombre, u.apellido, u.fecha_creado,u.estado, u.foto, u.permiso, u.telefono, u.correo FROM usuario u WHERE (u.cedula=:usuario OR u.correo=:usuario) AND (u.cedula=:contrasena OR u.contrasena=:contrasena)";
       $datos=array( 'usuario' => $usuario,'contrasena'=>$contrasena );
       $consulta = self::ejecutarConsultaSimpleFila($sql,$datos);
       if ($consulta) {

        if ($consulta->estado == '0') {
            $sessData['estado']['type'] = "error";
            $sessData['estado']['msg'] = "Estas deshabilitado, para entrar elige la opción de Recuperar cuenta";
        }else{
          $sessData['estado']['type'] ="success";
     // // Aqui asigno la id del usuario a la session
          $sessionUsuario['usuario']['id'] = $consulta->idusuario;
          $sessionUsuario['usuario']['nombre'] = $consulta->nombre;
          $sessionUsuario['usuario']['apellido'] = $consulta->apellido;
          $sessionUsuario['usuario']['telefono'] = $consulta->telefono;
          $sessionUsuario['usuario']['correo'] = $consulta->correo;
          $sessionUsuario['usuario']['foto_usuario']=$consulta->foto;
          $sessionUsuario['usuario']['permiso']=$consulta->permiso;
          $sessionUsuario['usuario']['creado']=$consulta->fecha_creado;
          $_SESSION['DatosUsuario'] = $sessionUsuario;
      }
  }else{
      $sessData['estado']['type'] = "error";
  }
  echo json_encode($sessData);
}


public function restablecercorreo($recuperar_clave,$datos){
    $sql = "SELECT correo FROM usuario WHERE correo='$recuperar_clave'";
    $prevUser = self::ejecutarConsultaSimpleFila($sql,$datos);

    if($prevUser){
        $uniqidStr = md5(uniqid(mt_rand()));
        $olvido_pass_iden = $uniqidStr;
// $prevUser->nombre." ".$prevUser->apellido
        $para = $recuperar_clave;
// título
        $título = 'Reestablecer contraseña';

        $sql2 = "UPDATE usuario SET olvido_contrasena = '$olvido_pass_iden', estado='0' WHERE correo = '$recuperar_clave'";

        $resetPassLink = 'http://localhost/HechoPorMi/Sistema%20Tesis/?menu=recuperar-clave&fp_code='.$uniqidStr;

// mensaje
        $mensaje = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Reactivación de la cuenta</title>
        <meta name="viewport" content="width=device-width" />
        <style type="text/css">
        @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
            body[yahoo] .buttonwrapper { background-color: transparent !important; }
            body[yahoo] .button { padding: 0 !important; }
            body[yahoo] .button a { background-color: #45a7b9; padding: 15px 25px !important; }
        }

        @media only screen and (min-device-width: 601px) {
            .content { width: 600px !important; }
            .col387 { width: 387px !important; }
        }
        </style>
        </head>
        <body bgcolor="#374249" style="margin: 0; padding: 0;" yahoo="fix">
        <!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td>
        <![endif]-->
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
        <tr>
        <td align="center" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
        <img src="img/appui_logo.png" alt="AppUI Logo" width="80" height="80" style="display:block;" />
        </td>
        </tr>
        <tr>
        <td align="center" bgcolor="#ffffff" style="padding: 40px 20px 0 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px;">

        <b>¿Olvidaste tu contraseña?</b>
        </td>
        </tr>
        <tr>
        <td align="center" bgcolor="#ffffff" style="padding: 0 20px 40px 20px; color: #777777; font-family: Arial, sans-serif; font-size: 18px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
        No te preocupes, vamos a conseguirte una nueva contraseña!
        </td>
        </tr>
        <tr>
        <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif;">
        <table bgcolor="#45a7b9" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
        <tr>
        <td align="center" height="55" style=" padding: 0 35px 0 35px; font-family: Arial, sans-serif; font-size: 22px;" class="button">
        <a href="'.$resetPassLink.'" style="color: #ffffff; text-align: center; text-decoration: none;">Restaurar contraseña</a>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td align="center" bgcolor="#ffffff" style="padding: 20px 20px 20px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 24px;">
        <span style="color: #45a7b9;">Si no solicitaste una nueva contraseña, no debes prestarle atención a este mensaje</span>
        </td>
        </tr>
        <tr>
        <td align="center" bgcolor="#e9e9e9" style="padding: 12px 10px 12px 10px; color: #888888; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
        <b>Copyright © 2018</b> | Yeison Cervantes. | Sistema evaluación trabajos grado
        </td>
        </tr>
        <tr>
        <td style="padding: 15px 10px 15px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="center" width="100%" style="color: #999999; font-family: Arial, sans-serif; font-size: 12px;">
        2018 &copy; <a href="http://goo.gl/TDOSuC" style="color: #45a7b9;"></a>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
        </body>
        </html>
        ';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8\r\n' . "\r\n";

// Enviarlo
        $mailnuevo = mail($para, $título, $mensaje, $cabeceras);
        if ($mailnuevo) {
         $update = self::ejecutarConsulta($sql2,$datos);

         if ($update) {
            $sessData['estado']['type'] = 'success';
            $sessData['estado']['msg'] = 'Solicitud de actualización de contraseña correcta, revisa el correo'; 
        }else{
          $sessData['estado']['type'] = 'error';
          $sessData['estado']['msg'] = 'No se pudo restaurar la contraseña'; 
      }
  }else{
      $sessData['estado']['type'] = 'error';
      $sessData['estado']['msg'] = 'No se pudo enviar el correo de restauración de la contraseña'; 
  }

}else{
  $sessData['estado']['type'] = 'error';
  $sessData['estado']['msg'] = 'No se pudo encontrar un correo asociado a esa cuenta'; 
}

echo json_encode($sessData);
}

public function enviarContrasena($password,$confirm_password,$fp_code,$datos){
    if(!empty($password) && !empty($confirm_password) && !empty($fp_code)){
        //password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['estado']['type'] = 'error';
            $sessData['estado']['msg'] = 'Confirmar que las contraseñas deban coincidir.'; 
        }else{

            $sql5 = "SELECT olvido_contrasena FROM usuario WHERE olvido_contrasena='$fp_code'";
            $prevUser = self::ejecutarConsultaSimpleFila($sql5,$datos);

            if($prevUser){
        // $contraseNew=md5($_POST['confirm_password']);
                $contraseNew = $confirm_password;

                $sql6 = "UPDATE usuario SET contrasena = '$contraseNew',olvido_contrasena='', estado='1' WHERE olvido_contrasena = '$fp_code'";
                $update = self::ejecutarConsulta($sql6,$datos);
                if($update){
                    $sessData['estado']['type'] = 'success';
                    $sessData['estado']['msg'] = 'La contraseña de su cuenta se ha restablecido con éxito. Por favor inicie sesión con su nueva contraseña.';
                }else{
                    $sessData['estado']['type'] = 'error';
                    $sessData['estado']['msg'] = 'Ha ocurrido algún problema, por favor intente de nuevo.';
                }

            }else{
                $sessData['estado']['type'] = 'error';
                $sessData['estado']['msg'] = 'No está autorizado a restablecer una nueva contraseña de esta cuenta.';
            }
        }
    }else{
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'Todos los campos son obligatorios, por favor complete todos los campos.'; 
    }

    echo json_encode($sessData);
}

public function verificarcedula($cedula_up_usuario,$datos){
    $sql = "SELECT usu.idusuario, usu.cedula FROM usuario usu WHERE usu.cedula = '$cedula_up_usuario' AND usu.nombre IS NULL
    ";
    $prevUser = self::ejecutarConsultaSimpleFila($sql,$datos);

    if($prevUser){
        $sessData['estado']['type'] = 'success';
        $sessData['estado']['msg'] = 'Se encontro el registro con esta cedula'; 
    }else{
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'No se encontro ningún registro con esta cedula'; 
    }
    echo json_encode($sessData);
}

public function selectvicerrectorado($datos){
    $sql = "SELECT * FROM vicerrectorado";
    $resultado = self::ejecutarConsultaTodasFilas($sql,$datos);
    if ($resultado) {
        /* obtener el array de objetos */
        foreach ($resultado as $obj) {
            echo "<option value=".$obj->idvicerrectorado.">".$obj->nombrevice."</option>";
        }
    }

}

public function selectprograma($vicerrectorado,$datos){
    $sql = "SELECT pro.idarea, pro.are_nombre FROM programa pro INNER JOIN vicerrectorado vic ON pro.vicerrectorado_idvicerrectorado = vic.idvicerrectorado WHERE vic.idvicerrectorado = '$vicerrectorado'";

    $resultado = self::ejecutarConsultaTodasFilas($sql,$datos);
    if ($resultado) {
        /* obtener el array de objetos */
        foreach ($resultado as $obj) {
            echo "<option value=".$obj->idarea.">".$obj->are_nombre."</option>";
        }
    }
}

public function selectsubprograma($programa,$datos){
    $sql = "SELECT sub.idsub_area, sub.subar_nombre FROM sub_programa sub INNER JOIN programa pro ON pro.idarea = sub.ar_idarea WHERE pro.idarea = '$programa'";
    $resultado = self::ejecutarConsultaTodasFilas($sql,$datos);
    if ($resultado) {
        /* obtener el array de objetos */
        foreach ($resultado as $obj) {
            echo "<option value=".$obj->idsub_area.">".$obj->subar_nombre."</option>";
        }
    }
}


public function registrousuariologin($cedula_user,$nombre_user,$apellido_user,$tlf_user,$email_user,$clave_user,$datos){
    $sql = "SELECT correo FROM usuario WHERE correo='$email_user'";
// Varios destinatarios
    $prevUser = self::ejecutarConsultaTodasFilas($sql,$datos);
    $contador = count($prevUser);
    if($contador>=1){
        $sql2 = '';
    }else{
    $sql2 = "UPDATE usuario SET nombre = '$nombre_user', apellido='$apellido_user', telefono = '$tlf_user', correo = '$email_user', contrasena = '$clave_user', estado = '1' WHERE cedula = '$cedula_user'";
    }


if ($sql2=='') {
    $sessData['estado']['type'] = 'error';
    $sessData['estado']['msg'] = 'Este correo ya se encuentra registrado en el sistema, por favor elige otro'.$sql2; 
}else{
        $update = self::ejecutarConsulta($sql2,$datos);
        if ($update) {
            $sessData['estado']['type'] = 'success';
            $sessData['estado']['msg'] = 'Te has registrado correctamente, ya puedes entrar al sistema'; 
        }else{
            $sessData['estado']['type'] = 'error';
            $sessData['estado']['msg'] = 'No pudiste registrarte, intentalo de nuevo más tarde'; 
        }
}


    echo json_encode($sessData);    
}

public function registrarusuarioenadmin($cedula_up_usuario, $tipo_usuario, $subprograma_id, $datos){
    $sql = "SELECT cedula FROM usuario WHERE cedula='$cedula_up_usuario'";
// Varios destinatarios
    $prevUser = self::ejecutarConsultaSimpleFila($sql,$datos);

    if($prevUser){
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'No puedes registrar a esta cedula, ya que se encuentra en el sistema'; 
    }else{
        $sql = "INSERT INTO usuario (idusuario, cedula, nombre, apellido, telefono, fecha_nacimiento, lugar_residencia, correo, contrasena, olvido_contrasena, foto, fecha_creado, estado, permiso,subprograma_id) VALUES (NULL, '$cedula_up_usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, '0', '$tipo_usuario','$subprograma_id')";
        $consulta = self::ejecutarConsulta($sql,$datos);

        if ($consulta) {
            $sessData['estado']['type'] = 'success';
            $sessData['estado']['msg'] = 'Se registro el usuario correctamente'; 
        }else{
            $sessData['estado']['type'] = 'error';
            $sessData['estado']['msg'] = 'Hubo un error al registrar el usuario'; 
        } 

    }
    echo json_encode($sessData);
}


}
?>