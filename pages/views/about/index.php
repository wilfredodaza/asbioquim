<?php
  require "pages/views/layouts/head.php";
  require "pages/views/layouts/nav.php";
  require "pages/models/About_usModel.php";
  $about = new About_usModel();
  $general = $about->getAbout();
  $details = $about->getAboutDetail();
?>

<!--=================================
    banner -->
    <section class="inner-banner bg-holder bg-light space-ptb bg-overlay-black-50" style="background-image: url('<?= $base_url ?>/public/page/images/about_us/<?= $general->img ?>');">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-6">
            <h1 class="text-white mb-3"><?= $general->title ?></h1>
            <p class="inner-subtitle text-white"><?= $general->description ?></p>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="<?= $base_url ?>">Inicio</a></li>
              <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Quienes somos  </span></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<!--=================================
    banner -->

<!--=================================
    Details -->
    <section class="space-pb mt-6 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Tab-nav START -->
                <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                  <?php foreach($details as $key => $detail): ?>
                    <li class="nav-item">
                    <a class="nav-link <?= $key == 0 ? 'active': '' ?>" id="detail_<?= ($key+1) ?>-tab" data-toggle="tab" href="#detail_<?= ($key+1) ?>">
                            <div class="feature-icon">
                              <?php if(!empty($detail->icon)): ?>
                                <?= preg_match("<i>", $detail->icon) ? $detail->icon : '<i class="material-icons">'.$detail->icon.'</i>' ?>
                              <?php else: ?>
                                <i class="fas fa-flask"></i>
                              <?php endif ?>
                            </div>
                            <?= $detail->title ?>
                        </a>
                    </li>
                  <?php endforeach ?>
                </ul>
                <!-- Tab-nav END -->

                <!-- Tab-content START -->
                <div class="tab-content pt-5" id="myTabContent">
                    <!-- Detail START -->
                    <?php foreach($details as $key => $detail): ?>
                      <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="detail_<?= ($key+1) ?>" role="tabpanel" aria-labelledby="detail_<?= ($key+1) ?>-tab">
                          <div class="row align-items-center">
                              <div class="col-lg-12 pl-3 pl-lg-4">
                                  <h3 class="mb-4"><?= $detail->title ?></h3>
                                  <p class="mb-1 mb-lg-1"><?= $detail->description ?></p>
                              </div>
                          </div>
                      </div>
                    <?php endforeach ?>
                    <!-- Detail END -->

                </div>
                <!-- Tab-content END -->
            </div>
        </div>
    </div>
</section>
<!--=================================
  Details -->

<?php require "pages/views/layouts/footer.php" ?>