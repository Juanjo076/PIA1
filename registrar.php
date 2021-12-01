<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>¡Concientízate ambiente!</title>
	<link rel="icon" href="img/icono.jpeg" sizes="10x10" type="image/jpeg">
	<link rel="stylesheet" type="text/css" href="cssregistrar/estilo.css">
</head>
<body>
      <h2>¡Concientízate ambiente!</h2>
<div class="box">
  <div class="logo">
  <center><img src="img/Logo.jpeg" width="300" height="280"></center> 
  </div>
  <form method="POST" action="registro.php">
  <input type="text" placeholder="Nombre" name="nombre" />
  <input type="text" placeholder="Apellido" name="apellido" />
  <select name="Tipo_doc">
    <option value="0">Seleccione Documento</option>
    <option value="1">Tarjeta de identidad</option>
    <option value="2">Cédula Ciudadanía</option>
    <option value="3">Cédula de extranjería</option>
    <option value="4">Pasaporte</option>
  </select>
  <input type="text" placeholder="Numero de Documento" name="ndocumento" />
  <input type="text" placeholder="Correo electronico" name="correo" />
  <input type="password" placeholder="Contraseña" name="password" />
 
  <div class="crear">
  <button><p>
  Crear</p></button>
  <button><a href="index.html">
  Regresar</a></button>
  </div>
  </form>
  </div>
</div>
</body>
</html>