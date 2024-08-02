<?php
require 'dbcon.php';
?>

<link rel="stylesheet" href="css/sidenav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="min-height: 80px;">
        <!-- Navbar Brand-->
        <a class="navbar-brand" href="dashboard.php"><img style="width: 200px;margin-left:15px;" src="images/logocepaplateral.png" alt=""></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-12 me-3 me-lg-12">
            <li class="nav-item dropdown m-1">
                <a style="background-color:#363636;padding:3px 7px;border-radius:5px;" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="soporte.php">Soporte</a></li>
                    <hr class="dropdown-divider" />
                    <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Modulos</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesFour" aria-expanded="false" aria-controls="collapsePagesFour">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-arms-up"></i></div>
                            Alumnos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesFour" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="usuarios.php">Especialidad docencía</a>
                                <a class="nav-link" href="usuarios.php">Maestría educación</a>
                            </nav>
                        </div>

                        <?php
                        if (isset($_SESSION['rol']) && in_array($_SESSION['rol'], [1, 2])) {
                            // Mostrar el enlace HTML solo si la condición se cumple
                            echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="bi bi-shield-fill-check"></i></div>
                                Admisiones
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>';
                        }
                        ?>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <?php
                                // Verificar si existe la sesión 'rol' y si el valor es 1, 2, 3 o 7
                                if (isset($_SESSION['rol']) && in_array($_SESSION['rol'], [1, 2])) {
                                    // Mostrar el enlace HTML solo si la condición se cumple
                                    echo '<a class="nav-link" href="monitoradmisiones.php">Monitor</a>';
                                }
                                ?>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Administración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <?php
                                if (isset($_SESSION['rol']) && in_array($_SESSION['rol'], [1, 2])) {
                                    echo '
                                        <a class="nav-link" href="usuarios.php">Usuarios</a>
                                        <a class="nav-link" href="monitornoticias.php">Noticias</a>
                                        <a class="nav-link" href="monitorarticulos.php">Articulos</a>
                                        <a class="nav-link" href="monitorconvocatorias.php">Convocatorias</a>
                                        <a class="nav-link" href="monitorinformacion.php">Informacion</a>
                                        <a class="nav-link" href="monitorinvestigaciones.php">Investigaciones</a>
                                ';
                                }
                                ?>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Panel de control</div>
                        <a class="nav-link" href="soporte.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-headset"></i></div>
                            Soporte
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $registro_id = $_SESSION['username'];
                        $query = "SELECT * FROM usuarios WHERE username='$registro_id' ";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            $registro = mysqli_fetch_array($query_run);
                    ?>
                            <!-- <div class="row">
                                <div class="col-5"><img style="width: 100%;border-radius:5px;height:92px;object-fit: cover;object-position:top;" src="data:image/jpeg;base64,<?php echo base64_encode($registro['medio']); ?>" alt="Foto perfil">
                                </div> -->
                                <div class="col-12">
                                    <p><?= $registro['nombre']; ?>
                                        <?= $registro['apellidopaterno']; ?>
                                        <?= $registro['apellidomaterno']; ?> <br>
                                        <small style="font-size: 11px;"><?php
                                                                        if ($registro['rol_id'] === '1') {
                                                                            echo "Administrador";
                                                                        } else if ($registro['rol_id'] === '2') {
                                                                            echo "Gerencia";
                                                                        } else if ($registro['rol_id'] === '4') {
                                                                            echo "Técnico controles";
                                                                        } else if ($registro['rol_id'] === '5') {
                                                                            echo "Ing. Diseño";
                                                                        } else if ($registro['rol_id'] === '6') {
                                                                            echo "Compras";
                                                                        } else if ($registro['rol_id'] === '7') {
                                                                            echo "Almacenista";
                                                                        } else if ($registro['rol_id'] === '8') {
                                                                            echo "Técnico mecanico";
                                                                        } else if ($registro['rol_id'] === '9') {
                                                                            echo "Ing. Control";
                                                                        } else if ($registro['rol_id'] === '10') {
                                                                            echo "Recursos humanos";
                                                                        } else {
                                                                            echo "Error, contacte a soporte";
                                                                        }
                                                                        ?></small>
                                    </p>

                                </div>
                            </div>
                    <?php
                        } else {
                            echo "<p>Error contacte a soporte</p>";
                        }
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/sidenav.js"></script>