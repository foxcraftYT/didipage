<?php
include '../../backend/sessions/validar.php';
include '../../backend/conexion/conexion.php';

if(isset($_REQUEST["btn-s"])){
  $correo = $_REQUEST["correo"];
  $contraseña = $_REQUEST["contraseña"];

  $consulta = "SELECT nombre, correo, contraseña FROM clientes WHERE correo = '$correo' AND contraseña = '$contraseña' ";
  $response = mysqli_query($conex, $consulta);
  if($response){
    session_destroy();
    session_start();
    foreach ($response as $usuario ) {
      $_SESSION["start"] = $usuario["nombre"];
    }
    
    header("location:../home");


  }else{
    echo "usuario no encontrado";
  }
  
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <style>
      #div-test{
        height:10px;
      }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <?php
    include('../components/header/header.php');
  ?>
    <div class="container d-flex justify-content-center align-items-center align-items-center">
        <form action="login.php" method="POST">

            <div class="mb-3">
              CORREO
              <input type="email" class="form-control"  name="correo" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              CONTRASEÑA
              <input type="password" class="form-control" name="contraseña">
            </div>

            <div class="d-flex justify-content-center">
              <a class="btn btn-primary mx-1" href="../home/index.php" role="button">INICIO</a>
              <button type="submit" class="btn btn-primary mx-1" name="btn-s">ENVIAR </button>
              <a class="btn btn-primary mx-1" href="register.php" role="button">REGISTRARSE</a>
            </div>
          </form>
   </div> 
</body>
</html>