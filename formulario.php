
<?php 
session_start();
$id_usuario=$_SESSION['ID_usuario'];
$usuario = $_SESSION['usuario'];


try {
  
  include "conexion.php";

  $sql="SELECT * FROM Inicio_Sesion where Correo_electronico = :usuario";

  $consulta = $conexion->prepare($sql);

  $consulta -> execute(array(
    ':usuario' => $_SESSION['usuario'] 
  ));

  $cuenta = $consulta->fetch(PDO::FETCH_OBJ);  
   
if($consulta -> rowCount() > 0)   { 
  $correo = $cuenta ->  Correo_electronico;
  $id_usuario = $cuenta -> ID_usuario;
  $password = $cuenta -> Password;
 }


$sql2="SELECT * FROM Crear_cuenta where ID_usuario = :id_usuario";
$_SESSION['ID_usuario']= $id_usuario;
$consulta2 = $conexion->prepare($sql2);
$consulta2 -> execute(array(
    ':id_usuario' => $id_usuario
    
    ));
$cuenta2 = $consulta2->fetch(PDO::FETCH_OBJ);

if($consulta2 -> rowCount() > 0)   { 
  $nombre= $cuenta2 -> Nombre; 
  $apellido=$cuenta2 -> Apellido;
  $documento = $cuenta2 -> N_documento;
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
	<link rel="stylesheet" type="text/css" href="Cssformulario/estilo.css">
</head>
<body>
      <h2>¡Concientízate ambiente!</h2>
<br>
<div class="editar"> 
<footer>
  <h2> Editar usuario</h2>
</footer>
</div>

<form method="post" action="guardar.php">

<br>
  
<input type="text" placeholder="Id" value="<?php echo $id_usuario;?>" name="id" disabled/> 
<br>
 
<input type="text" placeholder="Correo_electronico" value="<?php echo $correo;?>" name="correol"/>
<br>
 
<input type="text" placeholder="Contraseña" value="<?php echo $password;?>" name="contrasena"/>
<br>
 
<input type="text" placeholder="Nombres" value="<?php echo $nombre;?>" name="nombre"disabled/> 
<br>
 
<input type="text" placeholder="Apellidos" value="<?php echo $apellido;?>" name="apellido" disabled />
<br>
 
<input type="text" placeholder="Documento" value="<?php echo $documento;?>" name="documento" disabled/>
<br><br>

<button type="submit"> Guardar datos </button>
<button><a href="home.php">
Regresar</a></button>
</form>

</body>
</html>