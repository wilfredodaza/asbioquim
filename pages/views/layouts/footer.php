<!--=================================
    footer-->
    <?php
        require 'pages/models/FooterModel.php';
        $footer = new FooterModel;
        $contacto = $footer->getContact();
        $redes = $footer->getRedes();
    ?>

    <div class="whatsapp">
        <a href="https://api.whatsapp.com/send?phone=<?= $contacto->phone_whatsapp ?>&text=<?= $contacto->text_whatsapp ?>" class="btn-wsp" target="_blank" >
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <footer class="choose-people pb-0 footer bg-dark mt-lg-n5 mt-lg-0 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <p class="text-white">Visitas nuestras redes sociales</p>
                <div class="social-icon mt-3 mt-md-5">
                    <ul>
                        <?php foreach($redes as $red): ?>
                            <li>
                                <a href="<?= $red->link ?>" target="_blank">
                                    <?= preg_match('</i>',$red->icon) ? $red->icon : '<i
                                                class="material-icons">'.$red->icon.'</i>' ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                        <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-github"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pr-4">
                <h6 class="text-primary">Contactanos</h6>
                <div class="footer-contact-info">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-fw fa-map-marker-alt text-primary"></i><span class="text-white"><?= $contacto->direction ?></span></li>
                        <li><i class="fas fa-fw fa-phone-alt text-primary"></i><span class="text-white"><?= $contacto->phone ?></span></li>
                        <li><i class="fab fa-fw fa-whatsapp text-primary"></i><span class="text-white"><?= $contacto->phone_whatsapp ?></span></li>
                        <li><i class="fas fa-fw fa-headset text-primary"></i><span class="text-white"><?= $contacto->email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center copyright text-md-left mb-3 mb-md-0">
                    <!--<p class="mb-0 text-white"> &copy; Copyright | All Rights Reserved</p>-->
                    <p>Software realizado por <a href="http://www.iplanetcolombia.com" target="_blank">Iplanet Colombia SAS</a>. Todos los derechos reservados de uso para ASBIOQUIM SAS</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=================================
  footer-->

<!--=================================
    back to top-->
<!-- <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-up"></i> </a> -->
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