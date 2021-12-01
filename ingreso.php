<?php
session_start();

//recibe los datos del formulario
$usuario = $_POST['correo'];
$pwd = $_POST['pass'];

try {
	//Creamos la conexión PDO por medio de una instancia de su clase
	include "conexion.php";

	//generar la consulta sql
	$sql="SELECT * FROM inicio_sesion where Correo_electronico =:usuario and Password = :passwd";

	//prepara al sistema para hacer una consulta
	$consulta = $conexion->prepare($sql);

	//ejecutar la consulta
	$consulta -> execute(array(
		':usuario' => $usuario,
		':passwd' => $pwd
		));

    //Recorrer la BD en búsqueda de contenido
	$cuenta = $consulta->rowCount();  
                if($cuenta > 0)  
                {    
                	$_SESSION['usuario']=$usuario;                                 
                     header("location:home.php");  
                }  
                else  
                {  	  session_destroy(); 
                      header("location:index.html"); 
                }  
	

}
catch(Exception $e){
	echo 'Error conectando a la base de datos: '. $e->getMessage();
}
?>