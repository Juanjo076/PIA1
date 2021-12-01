<?php
/*
host -> nombre del servidor de base de datos
bd -> base de datos a la que me voy a conectar
usuario -> usuario mariadb
contraseña -> pwd del usuario de mariadb


PDO ('mysql:host=servidor; dbname=nombre_bd', "usuario", "contraseña")
*/
try {
$conexion = new PDO('mysql:host=localhost;dbname=pia1',"root","Pascual2021*");
} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>