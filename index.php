<?php session_start();
// No me va a ningun error que puede tener el codigo php
error_reporting(-1);
$DataUsuario = isset($_SESSION['DatosUsuario'])?$_SESSION['DatosUsuario']:'';
$permiso = isset($DataUsuario['usuario']['permiso'])?$DataUsuario['usuario']['permiso']:'';
// clave de gmail 17358811yacc
// yaisoncerca1987@gmail.com

// asunto Informe de pasantias yeison cervantes 17358811
// Profesora disculpe que le envie el archivo a esta hora pero es que he estado ocupado, anoche lo termine a las 3am y no tenia internet
if (empty($DataUsuario)) {
include 'pages/w_inicio_pagina.php';
}else{
include 'pages/w_admin.php';
}
?>

