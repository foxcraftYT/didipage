<!-- 
antes de registrar un usuario se debe validar el correo 
se realiza una consulta a la base de datos en la tabla "clientes"
si el correo ingresado se ha encontrado en la base datos significa
q está en uso 

se hace una consulta donde se busca una coincidencia del correo si la consulta devuelve
true significa que hay coincidencias por ende no se puede registrar ya que ese
correo ya está en uso caso contrario la consulta deuelve false

teniendo eso en cuenta haces un if() y un else 
if(consulta ){
  se registra
}else{
  no se registra y tira una info
} -->
<?php
  include '../../backend/sessions/validar.php';
  include '../../backend/conexion/conexion.php';

  if(isset($_REQUEST["btn-s"])){
    $nombre = $_REQUEST["nombre"];
    $correo = $_REQUEST["correo"];
    $contraseña = $_REQUEST["contraseña"];
    $recontraseña = $_REQUEST["recontraseña"];

    $consulta = "SELECT * FROM clientes WHERE correo='$correo'";
    $response_correo = mysqli_query($conex, $consulta)->fetch_array();
    if($response_correo){
      echo "se ha encontrado coincidencias";
    }else{
         if($contraseña == $recontraseña){
            $sql = "INSERT INTO clientes (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";
            $response = mysqli_query($conex, $sql);
            if($response){
              session_start();
              $_SESSION["start"]=$nombre;
              header("location:../home");
            }else{
              echo "error al almacenar";
            }
          } else {echo "Las contraseñas no coinciden.";}
      }
      $conex->close();
    }
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      #div-test{
        height:350px;
      }
    </style>
</head>
<body>
  <?php
    include('../components/header/header.php');
  ?>
    <div id="div-test" class="container d-flex justify-content-center align-items-center align-items-center">
        <form action="register.php" method="POST">
            <br>
            <div class="mb-3">
              CORREO
              <input type="email" class="form-control"  name="correo" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              NOMBRE DE USUARIO
              <input type="text" class="form-control" name="nombre"  aria-describedby="emailHelp2">
            </div>

            <div class="mb-3">
              CONTRASEÑA
              <input type="password" class="form-control" name="contraseña">
            </div>

            <div class="mb-3">
              REPETIR CONTRASEÑA
              <input type="password" class="form-control" name="recontraseña">
            </div>
            <div class="d-flex justify-content-center">
              <a class="btn btn-primary mx-1" href="../home/index.php" role="button">INICIO</a>
              <button type="submit" class="btn btn-primary mx-1" name="btn-s">ENVIAR </button>
              <a class="btn btn-primary mx-1" href="login.php" role="button">INICIAR SESION</a>

            </div>
          </form>
   </div> 
   
</body>
</html>