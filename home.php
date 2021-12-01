<?php
session_start();

$usuario = $_SESSION['usuario'];
try {
  //Creamos la conexión PDO por medio de una instancia de su clase
  include "conexion.php";

  $sql="SELECT ID_usuario FROM Inicio_Sesion where Correo_electronico = :usuario ";

  $consulta = $conexion->prepare($sql);
  $consulta -> execute(array(
    ':usuario' => $usuario
    ));
  $cuenta = $consulta->fetch(PDO::FETCH_OBJ);  
   
if($consulta -> rowCount() > 0)   { 
  $id_usuario=$cuenta -> ID_usuario;
  $_SESSION['ID_usuario']=$id_usuario;
 }

$sql2="SELECT Nombre, Apellido FROM Crear_cuenta where ID_usuario = :id_usuario";
$consulta2 = $conexion->prepare($sql2);
$consulta2 -> execute(array(
    ':id_usuario' => $id_usuario,
    ));
$cuenta2 = $consulta2->fetch(PDO::FETCH_OBJ);

if($consulta2 -> rowCount() > 0)   { 
  $_SESSION['nombre']= $cuenta2 -> Nombre; 
  $_SESSION['apellido']=$cuenta2 -> Apellido;
  }

}
catch(Exception $e){
  echo 'Error conectando a la base de datos: '. $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>¡Concientízate ambiente!</title>
	<link rel="icon" href="img/icono.jpeg" sizes="10x10" type="image/jpeg">
	<link rel="stylesheet" type="text/css" href="Csshomee/estilo.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br>
      <h2>¡Concientízate ambiente!</h2>

<br>
 <div class="usuario">

<h1>Bienvenid@ <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?> </h1>
<br>
<?php include "menu.php"; ?>

</div>
<?php include "modal.php";?>
