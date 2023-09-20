<?php

?>
<header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 bg-dark text-white  " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit">Search</button>
                </form>
                <div class="text-light" >
                    <!-- <i class="fa-solid fa-user"></i> -->
                    <?php
                    if ($_SESSION){ 
                        echo'<br>';
                        echo '<a href="../../backend/sessions/cerrar.php"> CERRAR SESIÓN </a>';
                        
                    }else{
                        echo '<a href="../sessions/login.php">INICIAR SESIÓN</a>';
                    }

                    
                    ?>
                    
                    
                </div>
            </div>
        </nav>
</header>