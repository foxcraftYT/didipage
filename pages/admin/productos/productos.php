
<?php
  include '../../../backend/conexion/conexion.php';
  session_start();
  $response = null;
  if(isset($_REQUEST["btn-s"])){
    $nombre = $_REQUEST["nombre"];
    $descripcion = $_REQUEST["descripcion"];
    $precio = $_REQUEST["precio"];
    $stock = $_REQUEST["stock"];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_ruta = '../../control/imagenes/' . $imagen_nombre;
    move_uploaded_file($imagen_temp, $imagen_ruta);
    $sql = "INSERT INTO productos(nombre, descripcion, stock, precio, img) VALUES ('$nombre', '$descripcion', '$stock', '$precio', '$imagen_nombre')";
    $response = mysqli_query($conex, $sql);
  }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PRODUCTOS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        
        <?php
            include('../../components/header/header.php');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        ?>
        <div class="d-flex justify-content-around align-items-center align-items-center m-5 gap-5">
            <div class="col bg-light shadow p-1 ">
                <form action="./productos.php" method="POST" enctype= "multipart/form-data" class="m-2">
                    <div class="mb-3">
                        NOMBRE DEL PRODUCTO
                        <input type="text" class="form-control"  name="nombre" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                        <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px; resize:none;"></textarea>
                        <label for="floatingTextarea2" >DESCRIPCION DEL PRODUCTO</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        CANTIDAD DE PRODUCTOS
                        <input type="number" min="0" class="form-control"  name="stock" aria-describedby="stockHelp">
                    </div>
                    <div class="mb-3">
                        PRECIO DEL PRODUCTOS
                        <input type="number" min="0" class="form-control"  name="precio" aria-describedby="priceHelp">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Selecciona una imagen para el producto</label>
                        <input class="form-control" type="file" id="formFile" name="imagen" accept="image/*">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mx-1" name="btn-s">AGREGAR DATOS </button>
                        <a class="btn btn-primary mx-1" href="../../home/index.php" role="button">INICIO</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php
                            if($response){
                                echo "se ingreso el producto correctamente";    
                            }
                        ?>  
                    </div>      
                </form>
            </div>                 
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th> <th scope="col">NOMBRE</th> <th scope="col">DESCRIPCION</th> <th scope="col">PRECIO</th> 
                        <th scope="col">STOCK</th> <th scope="col">IMAGEN</th> <th scope="col">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql2 = "SELECT * FROM productos"; 
                            $response2 = mysqli_query($conex, $sql2);
                            if (isset($_REQUEST["edit"])) {
                                $valor = $_REQUEST["valor"];
                                echo "se presiono editar";
                                echo "$valor"; 
                            }
                            if (isset($_REQUEST["delete"])) {
                                $valor = $_REQUEST["valor"];
                                echo"se presiono borrar";
                                $sql3 = "DELETE FROM productos WHERE (id_producto) = '$valor' ";
                                $response = mysqli_query($conex, $sql3);
                            }
                            foreach ($response2 as $producto) {
                                echo '
                                    <tr>
                                        <th scope="row">'.$producto["id_producto"].'</th>
                                        <td>'.$producto["nombre"].'</td>
                                        <td>'.$producto["descripcion"].'</td>
                                        <td>'.$producto["precio"].'</td>
                                        <td>'.$producto["stock"].'</td>
                                        <td>'.$producto["img"].'</td>
                                        <td>
                                            <form action="./productos.php" method="post" class="d-flex" >
                                                <input type="hidden" name="valor" value="'.$producto["id_producto"].'">
                                                <button type="submit" class="btn btn-success" name="edit">
                                                <i class="fa-solid fa-pen-to-square"></i> 
                                                </button>
                                                <button type="submit" class="btn btn-danger" name="delete">
                                                <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
        <script src="https://kit.fontawesome.com/3629b90bbd.js" crossorigin="anonymous"></script>
    </body>

</html>



