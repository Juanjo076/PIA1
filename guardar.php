<?php
session_start();
//recibe los datos del formulario
$correo = $_POST['correol'];
$password = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$id_usuario=$_SESSION['ID_usuario'];
$usuario = $_SESSION['usuario'];



try {
	include "conexion.php";
	$sql="UPDATE Inicio_Sesion SET Correo_electronico=:correol, Password=:contrasena where ID_usuario=:id_usuario ";

	$consulta = $conexion->prepare($sql);

	$consulta -> execute(array(
		':correol' => $correo,
		':contrasena' => $password,
		':id_usuario'=>$id_usuario
		));

$sql2="UPDATE Crear_cuenta SET Nombre=:nombre, Apellido=:apellido, where ID_usuario=:id_usuario";

$consulta2 = $conexion->prepare($sql2);

$consulta2 -> execute(array(
    ':nombre' => $nombre,
    ':apellido' => $apellido,
    ':id_usuario'=>$id_usuario
    ));

  
	

	
}


catch(Exception $e){
	echo 'Error conectando a la base de datos: '. $e->getMessage();
}
echo'<script type="text/javascript">
        alert("Cambios realizados con exito, inicia sesion de nuevo para validar tus cambios!!");
        window.location.href="index.html";
        </script>';  ?>





