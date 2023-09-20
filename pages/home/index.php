<?php
    session_start()
    


?>

<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="./index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>

<!-- a -->
    <?php
        include('../components/header/header.php');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <main>
        <?php
            include('../components/cards/cards.php');
        ?>
        
   
    </main>
</body>
    <script src="https://kit.fontawesome.com/3629b90bbd.js" crossorigin="anonymous"></script>
</html>

