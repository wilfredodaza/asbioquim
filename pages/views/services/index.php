<?php
  require "pages/views/layouts/head.php";
  require "pages/views/layouts/nav.php";
  include_once 'pages/models/ServicesModel.php';
  $service = $this->service;
  $details = $this->detail;
  $services = new ServicesModel();
  $services = $services->getService();
?>
<!--=================================
    Service-->
    <section class="space-ptb">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <!-- Service-detail -->
            <div class="service-detail">
              <div class="section-title left-divider">
                <h3 class="text-dark"><?= $service->title ?></h3>
              </div>
              <div class="service-img mb-4">
                <img class="img-fluid" src="<?= $base_url ?>/public/page/images/services/<?= $service->img ?>" alt="">
              </div>
              <div class="service-content mb-4 mb-md-5">
                <p class="mb-4"><?= $service->description ?></p>
                <div class="row mb-4">
                  <div class="col-md-12">
                    <ul class="list-unstyled mb-0">
                      <?php foreach($details as $detail): ?>
                        <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i><?= $detail->description ?></li>
                      <?php endforeach ?>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
            <!-- Service-detail -->
          </div>
          <div class="col-lg-4 mt-5 mt-lg-0">
            <!-- Sidebar -->
            <div class="sidebar">

              <!-- Our Services -->
              <div class="widget">
                <div class="widget-title">
                  <h4>Otros servicios</h4>
                </div>
                <div class="widget-services">
                  <ul class="list-unstyled list-style list-style-underline mb-0">
                    <?php foreach($services as $service): ?>
                      <li><a href="<?= $base_url ?>/services/<?= $service->id ?>ñ"><?= $service->title ?></a></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
              <!-- Our Services -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Service-->

<?php require "pages/views/layouts/footer.php" ?>