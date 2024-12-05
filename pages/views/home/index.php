<?php
  require "pages/views/layouts/head.php";
  require "pages/views/layouts/nav.php";

  $HomeModel = new HomeModel();
  $banner = $HomeModel->getBanner();
  $services = $HomeModel->getServices();
  $accreditations = $HomeModel->getAccreditations();
?>

<!--=================================
    banner -->
    <!-- <section class="slider-01 banner-03 "
        style="
            background: url(public/page/images/banner/<?= $banner->img ?>) center;
            background-size: 100% auto;
            background-repeat: no-repeat;
        ">
        <div id="main-slider" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide align-items-center d-flex">
                    <div class="swipeinner container position-relative">
                        <div class="row">
                            <div class="col-12 col-sm-6  div-light">
                                <div class="banner-content position-relative">
                                    <h1 class="text-dark" data-swiper-animation="fadeInLeft" data-duration="1s" data-delay="0.5s"><?= $banner->title ?></h1>
                                    <p class="lead mb-4 mb-sm-4" data-swiper-animation="fadeInLeft" data-duration="1s" data-delay="1.5s"><?= $banner->description ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 col-lg-4">
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach($services as $service): ?>
                    <div class="swiper-slide align-items-center d-flex">
                        <div class="swipeinner container position-relative">
                            <div class="row">
                                <div class="col-12 col-sm-6 div-light">
                                    <div class="banner-content position-relative">
                                        <h1 class="text-dark" data-swiper-animation="fadeInLeft" data-duration="1s" data-delay="0.5s"><?= $service->title ?></h1>
                                        <p class="lead mb-4 mb-sm-4" data-swiper-animation="fadeInLeft" data-duration="1s" data-delay="1.5s"><?= $service->description ?></p>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-5 col-lg-4">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>


        <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="fas fa-chevron-left"></i>
        </div>
        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="fas fa-chevron-right"></i></div>
    </section> -->

    <section id="container-slider">	
        <a href="javascript: fntExecuteSlide('prev');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
        <a href="javascript: fntExecuteSlide('next');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
        <ul class="listslider">
            <?php foreach($banner as $key => $service): ?>
                <li><a itlist="itList_<?= $key ?>" <?= $key == 0 ? 'class="item-select-slid"': '' ?> href="#"></a></li>
            <?php endforeach ?>
        </ul>
        <ul id="slider">
            <?php foreach($banner as $key => $service): ?>
                <li style="background-image: url('public/page/images/banner/<?= $service->img ?>'); <?= $key == 0 ? 'z-index:0; opacity: 1;' : '' ?>">
                    <div class="content_slider" >
                        <div>
                            <h2><?= $service->title ?></h2>
                            <p><?= $service->description ?></p>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
</section>
<!--=================================
    banner -->

<!--=================================
    Services -->
    <section class="space-pt">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-10 text-center">
                  <div class="section-title center-divider">
                      <h2 class="mb-0">NUESTROS SERVICIOS</h2>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <section class="space-pb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Tab-nav START -->
                    <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                        <?php foreach($services as $key => $service): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $key == 0 ? 'active': '' ?>" id="service_<?= ($key+1) ?>-tab" data-toggle="tab" href="#service_<?= ($key+1) ?>">
                                    <div class="feature-icon">
                                        <?= $service->icon ? $service->icon :'<i class="fas fa-flask"></i>' ?>
                                    </div>
                                    <?= $service->title ?>

                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <!-- Tab-nav END -->

                    <!-- Tab-content START -->
                    <div class="tab-content pt-5" id="myTabContent">
                        <!-- department01 START -->
                        <?php foreach($services as $key => $service): ?>
                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="service_<?= ($key+1) ?>" role="tabpanel" aria-labelledby="service_<?= ($key+1) ?>-tab">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-lg-0 mb-4">
                                        <img class="img-fluid rounded" src="<?= $base_url ?>/public/page/images/services/<?= $service->img ?>" alt="">
                                    </div>
                                    <div class="col-lg-7 pl-3 pl-lg-4">
                                        <h3 class="mb-4"><?= $service->title ?></h3>
                                        <?= $service->description ?>
                                        <br>
                                        <br>
                                        <a class="btn btn-primary" href="<?= $base_url ?>/services/<?= $service->id ?>">Saber más</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                    <!-- Tab-content END -->
                </div>
            </div>
        </div>
    </section>
<!--=================================
    Services -->

<!--=================================
    Accreditations -->
    <section class="mb-6">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="section-title text-center">
                      <h2>ACREDITACIÓNES Y AUTORIZACIONES</h2>
                  </div>
              </div>
          </div>
          <div class="row popup-gallery">
            <!-- Blog-01 START -->
            <?php foreach($accreditations as $accreditation): ?>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="blog-post blog-post-style-03 shadow">
                        <div class="service-items service-items-style-02">
                            <div class="blog-post-image">
                                <img class="img-fluid rounded" src="<?= $base_url ?>/public/page/images/accreditations/<?= $accreditation->img ?>" alt="">
                            </div>
                            <a class="service-content rounded portfolio-img" href="<?= $base_url ?>/public/page/images/accreditations/<?= $accreditation->img ?>">
                                <span class="icon-btn"><i class="fas fa-plus"></i></span>
                            </a>
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-details">
                                <h6 class="blog-post-title"><?= $accreditation->title ?></h6>
                                <div class="blog-post-description mt-2">
                                    <p>
                                    <?= $accreditation->description ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- Blog-01 END -->

          </div>
      </div>
    </section>
<!--=================================
    Accreditations -->
    
    <form id="form-download" action="<?= $base_url ?>/public/certificado/download" method="POST" style="display:none">
        <input id="certificado_reporte" type="checkbox" name="certificado_reporte[]" value="">
        <input id="certificado_preliminar" type="checkbox" name="certificado_preliminar[]" value="">
    </form>

<?php require "pages/views/layouts/footer.php" ?>

<script>
    if(document.querySelector('#container-slider')){
        setInterval('fntExecuteSlide("next")',9000);
    }
//------------------------------ LIST SLIDER -------------------------
if(document.querySelector('.listslider')){
   let link = document.querySelectorAll(".listslider li a");
   link.forEach(function(link) {
      link.addEventListener('click', function(e){
         e.preventDefault();
         let item = this.getAttribute('itlist');
         let arrItem = item.split("_");
         fntExecuteSlide(arrItem[1]);
         return false;
      });
    });
}

function fntExecuteSlide(side){
    let parentTarget = document.getElementById('slider');
    let elements = parentTarget.getElementsByTagName('li');
    let curElement, nextElement;

    for(var i=0; i<elements.length;i++){

        if(elements[i].style.opacity==1){
            curElement = i;
            break;
        }
    }
    if(side == 'prev' || side == 'next'){

        if(side=="prev"){
            nextElement = (curElement == 0)?elements.length -1:curElement -1;
        }else{
            nextElement = (curElement == elements.length -1)?0:curElement +1;
        }
    }else{
        nextElement = side;
        side = (curElement > nextElement)?'prev':'next';

    }
    //RESALTA LOS PUNTOS
    let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
    elementSel[curElement].classList.remove("item-select-slid");
    elementSel[nextElement].classList.add("item-select-slid");
    elements[curElement].style.opacity=0;
    elements[curElement].style.zIndex =0;
    elements[nextElement].style.opacity=1;
    elements[nextElement].style.zIndex =1;
}
</script>