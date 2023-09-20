<div class="d-flex gap-5 p-5 flex-wrap align-items-center justify-content-center">
    <?php
    include '../../backend/conexion/conexion.php';
    $consulta = "SELECT * FROM productos;";
    $response = mysqli_query($conex, $consulta);

    foreach ($response as $producto) {
        echo '<div class=" d-flex gap-3 flex-wrap justify-content-center aling-items-center">
                <div class="card" style="width: 18rem;">
                    <img src="../control/imagenes/' . $producto["img"] . '" style="width:288px " class="card-img-top" alt="' . $producto["nombre"] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $producto["nombre"] . '</h5>
                        <p class="card-text">' . $producto["descripcion"] . '</p>
                        <a href="." class="btn btn-primary">link</a>
                    </div>
                </div>
              </div>';
    }
    ?>
</div>
