<?php
    require 'pages/models/NavModel.php';
    $menu = new NavModel;
    $services = $menu->getTable("services");
?>

<header class="header header-01 header-sticky">
    <div class="main-header">
        <div class="container">
            <nav class="navbar navbar-static-top navbar-expand-lg">
                <a class="navbar-brand mr-0 nav_img" href="<?= $base_url ?>">
                    <img class="img-fluid" src="<?= $base_url ?>/public/page/images/menu/<?= $general[0]->logo_menu ? $general[0]->logo_menu : 'logo.svg'?>" alt="logo">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                <div class="navbar-collapse collapse justify-content-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown" routerLinkActive="active">
                            <a class="nav-link" href="<?= $base_url ?>">Inicio</a>
                        </li>
                        <li class="nav-item dropdown" routerLinkActive="active">
                            <a class="nav-link" href="<?= $base_url ?>/about_us">Quienes somos</a>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="nav-link" href="#" data-toggle="dropdown">Servicios<i class="fas fa-angle-down"></i></a>
                            <ul class="dropdown-menu megamenu dropdown-menu-lg">
                                <li>
                                <ul class="list-unstyled mt-lg-3">
                                    <?php foreach($services as $service): ?>
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/services/<?= $service->id ?>" ><?= $service->title ?></a></li>
                                    <?php endforeach ?>
                                        <!-- <li ><a class="dropdown-item" href="<?= $base_url ?>/services/2" >Análisis Fisicoquímicos</a></li>
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/services/3" >Controles En Planta</a></li>
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/services/4" >Análisis De Aguas</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/contact">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary text-white nav-link ml-1 mr-1 mt-1 mb-1" href="<?= $base_url ?>/public" target="_blank">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success text-white nav-link ml-1 mr-1 mt-1 mb-1" onclick="validation()">Validar certificado</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<form action="<?= $base_url ?>/public/certificado/consulta" method="POST" id="form-valid"></form>