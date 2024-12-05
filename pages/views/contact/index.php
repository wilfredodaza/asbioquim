<?php
  require "pages/views/layouts/head.php";
  require "pages/views/layouts/nav.php";
  require "pages/models/ContactModel.php";
  $about = new ContactModel();
  $general = $about->getContact();
?>

<!--=================================
    Contact Info-->
    <section class="space-ptb text-center contact-info"
    >
        <div class="container">
            <div class="row">

                <div class="col-md-4 mb-4 mb-md-0">
                    <!-- Address -->
                    <div class="feature-item text-center">
                        <div class="feature-item-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="feature-item-content">
                            <h4 class="feature-item-title">Dirección</h4>
                            <span><?= $general->direction ?></span>
                        </div>
                    </div>
                    <!-- Address -->
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <!-- Phone -->
                    <div class="feature-item text-center">
                        <div class="feature-item-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="feature-item-content">
                            <h4 class="feature-item-title">Telefono</h4>
                            <span><?= $general->phone ?></span>
                            <span><?= $general->phone_whatsapp ?></span>
                        </div>
                    </div>
                    <!-- Phone -->
                </div>
                <div class="col-md-4">
                    <!-- Email -->
                    <div class="feature-item text-center">
                        <div class="feature-item-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="feature-item-content">
                            <h4 class="feature-item-title">Email</h4>
                            <span><?= $general->email ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<!--=================================
Contact Info-->

<!--=================================
    login-->
    <section>
      <div class="container">
        <div class="row justify-content-center">

        <?php if(!empty($general->imagen)) : ?>
            <div class="col-xl-5 col-lg-3 col-md-2 img-ayuda">
                <img src="<?= $base_url ?>/public/page/images/contacto/<?= $general->imagen ?>" alt="">
            </div>
        <?php endif ?>
            
          <div class="col-xl-7 col-lg-9 col-md-10">
            <div class="login-form">
              <!-- Login form -->
              <form autocomplete="off" method="POST" action="<?= $base_url ?>/public/contacto">
                <h3 class="text-center text-primary mt-4"><?= !empty($general->titulo) ? $general->titulo : 'Escribenos' ?></h3>
                <?=!empty($general->descripcion) ? "<p>$general->descripcion</p>" : '' ?>
                <div class="row align-items-center mt-4">
                    <div class="form-group col-md-6 col-ms12">
                        <input type="text" class="form-control" required name="name" id="name" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6 col-ms12">
                        <input type="text" class="form-control" required name="empresa" id="empresa" placeholder="Empresa">
                    </div>
                    <div class="form-group col-md-6 col-ms12">
                        <input type="email" class="form-control" required name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6 col-ms12">
                        <input type="number" class="form-control" required name="phone" id="phone" placeholder="Telefono">
                    </div>
                    <div class="form-group col-ms12">
                        <!--<input type="subjet" class="form-control" required name="subject" id="subject" placeholder="Asunto">-->
                        <label>Asunto</label>
                        <select class="form-select"  required name="subject" id="subject" placeholder="Asunto">
                            <!--<option selected>Asunto</option>-->
                            <option value="Informacion">Informacion</option>
                            <option value="Queja - reclamo">Queja - reclamo</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <textarea class="form-control" rows="5" required name="message" placeholder="Mensaje"></textarea>
                    </div>
                    <div class="form-group col-sm-12 mb-0">
                    <button type="submit" class="btn btn-outline-primary my-3 my-sm-0">Enviar</button>
                  </div>
                </div>
              </form>
              <!-- Login form -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Contact-info-->

<?php require "pages/views/layouts/footer.php" ?>