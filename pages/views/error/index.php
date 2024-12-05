<?php require "pages/views/layouts/head.php" ?>
<?php require "pages/views/layouts/nav.php" ?>
<section class="space-ptb">
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          <div class="col-md-12">
            <img class="img-fluid" src="template/images/error/404-bg.png" alt="">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-9 col-md-10">
            <div class="text-center contant-404">
              <h2 class="text-primary mb-4">Oops!</h2>
              <h3 class="mb-3">Lo sentimos, no podemos encontrar esta página.</h3>
              <a href="<?= $base_url ?>" class="btn btn-outline-primary"><i class="fas fa-home pr-2"></i>Regresar a inicio</a>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php require "pages/views/layouts/footer.php" ?>