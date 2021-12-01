<?php
//recibe los datos del formulario
session_start();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_doc = $_POST['Tipo_doc'];
$N_documento = $_POST['ndocumento'];
$usuario = $_POST['correo'];
$pwd = $_POST['password'];
$_SESSION['correo']=$usuario;
$_SESSION['ndocumento']=$N_documento;

try {
	include "conexion.php";

	$sql="INSERT INTO crear_cuenta(ID_usuario, Nombre, Apellido, Tipo_documento, N_documento) VALUES (NULL, :nombre, :apellido, :tipo_doc, :ndocumento)";

	$sql2="INSERT INTO inicio_sesion(ID_usuario, Correo_electronico, Password) VALUES (NULL, :usuario, :password)";

	$consulta = $conexion->prepare($sql);

	$consulta -> execute(array(
		':nombre' => $nombre,
		':apellido' => $apellido,
		':tipo_doc' => $tipo_doc,
		':ndocumento' => $N_documento
		));

	$consulta2 = $conexion->prepare($sql2);

	$consulta2 -> execute(array(
		':usuario' => $usuario,
		':password' => $pwd
		));

    header("location:index.html");       
	
}
catch(Exception $e){
	echo 'Error conectando a la base de datos: '. $e->getMessage();
}
?>