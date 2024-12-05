<?php $base_url = 'https://gestionlabs.com' ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ASBIOQUIM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Medic - Health and Medical HTML Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $base_url ?>/public/page/images/my_image/icon.svg" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/flaticon/flaticon.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/select2/select2.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/datetimepicker/datetimepicker.min.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/style.css" />
</head>

<body>

<header class="header header-01 header-sticky">
    <div class="main-header">
        <div class="container">
            <nav class="navbar navbar-static-top navbar-expand-lg">
                <a class="navbar-brand mr-0" href="<?= $base_url ?>">
                    <img class="img-fluid" src="<?= $base_url ?>/public/page/images/my_image/logo.svg" alt="logo">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                <div class="navbar-collapse collapse justify-content-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown" routerLinkActive="active">
                            <a class="nav-link" href="<?= $base_url ?>">Inicio</a>
                        </li>
                        <li class="nav-item dropdown" routerLinkActive="active">
                            <a class="nav-link" href="<?= $base_url ?>/pages/about.php">Quienes somos</a>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="nav-link" href="#" data-toggle="dropdown">Portafolio<i class="fas fa-angle-down"></i></a>
                            <ul class="dropdown-menu megamenu dropdown-menu-lg">
                                <li>
                                    <ul class="list-unstyled mt-lg-3">
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/pages/detail-1.php" >Análisis Microbiológicos</a></li>
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/pages/detail-2.php" >Análisis Fisicoquímicos</a></li>
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/pages/detail-3.php" >Controles En Planta</a></li>
                                        <li ><a class="dropdown-item" href="<?= $base_url ?>/pages/detail-4.php" >Análisis De Aguas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="add-listing d-none d-sm-block">
                    <a class="btn btn-primary" href="<?= $base_url ?>/public" target="_blank"><i class="fa fa-user"></i>Iniciar sesión</a>
                </div>
                <div class="add-listing d-none d-sm-block">
                <button onclick="validation()" class="btn btn-success btn-large">Validar certificado</button>
                </div>
            </nav>
        </div>
    </div>
</header>




<!--=================================
    Departments -->
    <section class="mt-5 mb-7 overflow-hidden animate pulse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 pl-lg-5 py-4 py-xl-5 order-lg-2">
                <h3 class="mb-4">Controles en planta</h3>
                <p class="mb-4">Descripcion.</p>
                <ul class="list-unstyled pb-4 pb-lg-5 mb-0">
                </ul>
            </div>
            <div class="col-lg-6 order-lg-1">
                <img class="img-fluid" src="<?= $base_url ?>/public/page/images/my_image/04.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!--=================================
    Departments -->



<!--=================================
    footer-->
    <footer class="choose-people pb-0 footer bg-dark mt-lg-n5 mt-lg-0 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <p class="text-white">Visitas nuestras redes sociales</p>
                <div class="social-icon mt-3 mt-md-5">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-github"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0 pr-4">
                <h6 class="text-primary">Contactanos</h6>
                <div class="footer-contact-info">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-fw fa-map-marker-alt text-primary"></i><span class="text-white">Dirección</span></li>
                        <li><i class="fas fa-fw fa-phone-alt text-primary"></i><span class="text-white">Telefono</span></li>
                        <li><i class="fas fa-fw fa-headset text-primary"></i><span class="text-white">correo</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                <h6 class="text-primary">Escríbenos</h6>
                <div class="footer-contact-info">
                    <p class="text-white"></p>
                    <form>
                        <div class="mb-3">
                            <label for="form" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="form">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center copyright text-md-left mb-3 mb-md-0">
                    <p class="mb-0 text-white"> &copy; Copyright | All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=================================
  footer-->

<!--=================================
    back to top-->
<a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-up"></i> </a>
<!--=================================
    back to top-->


    <!--=================================
    Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="<?= $base_url ?>/public/page/js/jquery-3.5.1.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/popper/popper.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="<?= $base_url ?>/public/page/js/jquery.appear.js"></script>
    <script src="<?= $base_url ?>/public/page/js/counter/jquery.countTo.js"></script>
    <script src="<?= $base_url ?>/public/page/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/jarallax/jarallax.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/jarallax/jarallax-video.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/swiper/swiper.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/swiperanimation/SwiperAnimation.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/select2/select2.full.js"></script>
    <script src="<?= $base_url ?>/public/page/js/datetimepicker/moment.min.js"></script>
    <script src="<?= $base_url ?>/public/page/js/datetimepicker/datetimepicker.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="<?= $base_url ?>/public/page/js/custom.js"></script>
    <script src="<?= $base_url ?>/public/page/js/validation.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>