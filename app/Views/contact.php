
<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
    <?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="row">
        <div class="colrp3 col-lg-5 d-flex align-items-center pr-0">

            <div class="px-5 py-4 background-white radius-secondary">
                <h5 class="mb-3">Endereço</h5>Rua nome da rua,
                <br>1200,
                <br>BH, MG 
            </div>

            <div class="px-5 py-4 background-white radius-secondary">
                <h5>Redes sociais</h5>
                <a class="d-inline-block mt-2" href="#">
                    <span class="fa fa-youtube-square fs-2 mx-2 color-primary"></span>
                </a>
                <a class="d-inline-block mt-2" href="#">
                    <span class="fa fa-facebook-square fs-2 mx-2 color-primary"></span>
                </a>
                <a class="d-inline-block mt-2" href="#">
                    <span class="fa fa-instagram-square fs-2 ml-2 color-primary"></span>
                </a>
            </div>

        </div>
        <div class="colrp col-lg-7 pr-0" style="padding-left: 98px;">
            <img src="assets/svg/brasilcontact_hero.jpg" alt="">
        </div>
    </div>

    <div class="row">
        <div class="colrp2 col-lg-6 d-flex pl-0">

            <img src="assets/svg/brasilcontact_hero2.jpg" alt="">

        </div>
        <div class="col-lg-6 d-flex flex-column align-items-center py-5">
            <h5>Nos envia sua dúvida</h5>
                    <form class="zform mt-3">
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="hidden" name="to" value="user@domain.extension">
                                <input class="form-control background-white" type="text" placeholder="Seu nome" required> </div>
                            <div class="col-12 mt-4">
                                <input class="form-control background-white" type="email" placeholder="Email" required> </div>
                            <div class="col-12 mt-4">
                                <textarea class="form-control background-white" rows="11" placeholder="Insira sua mensagem aqui..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <button class="btn btn-md-lg btn-primary" type="Submit">
                                            <span class="color-white fw-600">Enviar</span>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <div class="zform-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
    
<!--
<section class="background-11">
    <div class="container">
        <div class="row align-items-stretch justify-content-center">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="h-100 px-5 py-4 background-white radius-secondary">
                    <h5 class="mb-3">Prédio 2</h5>Rua nome da rua,
                    <br>1200,
                    <br>BH, MG 
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="h-100 px-5 py-4 background-white radius-secondary">
                    <h5 class="mb-3">Prédio 3</h5>Rua nome da rua,
                    <br>000,
                    <br>BH, MG</div>
            </div>
            <div class="col-lg-4">
                <div class="h-100 px-5 py-4 background-white radius-secondary">
                    <h5>Redes sociais</h5>
                    <a class="d-inline-block mt-2" href="#">
                        <span class="fa fa-linkedin-square fs-2 mr-2 color-primary"></span>
                    </a>
                    <a class="d-inline-block mt-2" href="#">
                        <span class="fa fa-twitter-square fs-2 mx-2 color-primary"></span>
                    </a>
                    <a class="d-inline-block mt-2" href="#">
                        <span class="fa fa-facebook-square fs-2 mx-2 color-primary"></span>
                    </a>
                    <a class="d-inline-block mt-2" href="#">
                        <span class="fa fa-google-plus-square fs-2 ml-2 color-primary"></span>
                    </a>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="background-white p-5 h-100 radius-secondary">
                    <h5>Nos envia sua dúvida</h5>
                    <form class="zform mt-3">
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="hidden" name="to" value="user@domain.extension">
                                <input class="form-control background-white" type="text" placeholder="Seu nome" required> </div>
                            <div class="col-12 mt-4">
                                <input class="form-control background-white" type="email" placeholder="Email" required> </div>
                            <div class="col-12 mt-4">
                                <textarea class="form-control background-white" rows="11" placeholder="Insira sua mensagem aqui..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <button class="btn btn-md-lg btn-primary" type="Submit">
                                            <span class="color-white fw-600">Enviar</span>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <div class="zform-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

-->
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>


















