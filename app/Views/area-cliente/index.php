
<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
    <?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="container area_listbg mt-6">

    <div class="row mt-8">
        <div class="col-md-6">
            <h1 class="area_cliente_title">Bem vindo(a) à area do cliente!</h1>

            <p class="h5 text-secondary my-4">Selecione uma categoria:</p>

            <ul class="row area_list arealistrow d-flex">
                <div class="col-sm-12 col-md-2 col-lg-2 alist_box">
                    <li>
                        <a href="<?= base_url("area-cliente/app")?>">
                            <i class="fa fa-medkit" aria-hidden="true"></i>
                        </a>
                        <span>App</span>
                    </li>
                </div>
                
                <div class="col-sm-12 col-md-2 col-lg-2 alist_box">
                    <li class="" style="padding-top: 20px;">
                        <a href="<?= base_url("area-cliente/carro-reserva")?>">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </a>
                        <span>Carro<br>Reserva</span>
                    </li>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 alist_box">
                    <li class="">
                        <a href="<?= base_url("area-cliente/funeral")?>">
                            <i class="fa fa-pagelines" aria-hidden="true"></i>
                        </a>
                        <span>Funeral</span>
                    </li>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 alist_box">
                    <li class="">
                        <a href="<?= base_url("area-cliente/vidros")?>">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                        </a>
                        <span>Vidros</span>
                    </li>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 alist_box">
                    <li class="">
                        <a href="<?= base_url("area-cliente/pet")?>">
                            <i class="fa fa-paw" aria-hidden="true"></i>  
                        </a>
                        <span>Pet</span>
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="assets/svg/area_cliente_hero.svg" alt="">
        </div>
    </div>

</div>





















            <?php /*
            <section class="background-11">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-4 py-3 py-lg-0" style="min-height:400px; background-position: top;">
                            <div class="background-holder radius-tl-secondary radius-bl-lg-secondary radius-tr-secondary radius-tr-lg-0" style="background-image:url(<?= base_url("assets/images/ceo.jpg") ?>);"> </div>
                            <!--/.background-holder-->
                        </div>
                        <div class="col-lg-8 px-5 py-6 my-lg-0 background-white radius-tr-lg-secondary radius-br-secondary radius-bl-secondary radius-bl-lg-0">
                            <div class="d-flex align-items-center h-100">
                                <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                    <h5 data-zanim='{"delay":0}'>Message From CEO</h5>
                                    <p class="my-4" data-zanim='{"delay":0.1}'>Elixir co-operates with clients in solving the hardest problems they face in their businesses—and the world. We do this by channeling the diversity of our people and their thinking. </p>
                                    <img data-zanim='{"delay":0.2}'
                                        src="<?= base_url("assets/images/signature.png")?>" alt="" />
                                    <h5 class="text-uppercase mt-3 fw-500 mb-1" data-zanim='{"delay":0.3}'>renal scott</h5>
                                    <h6 class="color-7 fw-600" data-zanim='{"delay":0.4}'>UK office</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-6">
                        <div class="col">
                            <h3 class="text-center fs-2 fs-md-3">Company Overview</h3>
                            <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" /> </div>
                        <div class="col-12">
                            <div class="background-white px-3 mt-6 px-0 py-5 px-lg-5 radius-secondary">
                                <h5>Earning the right</h5>
                                <p class="mt-3">As a first order business consulting firm, we help companies, foundations and individuals make a difference. Our work gets to the heart of the matter. We break silos because it takes more than any one check or policy or
                                    letter to tackle big issues like economic security, human rights or climate sustainability. We prescribe a custom formula of advocacy, collaboration, investment, philanthropy, policy and new ways of doing business in
                                    order to help you make progress.</p>
                                <blockquote class="blockquote my-5 ml-lg-6" style="max-width: 700px;">
                                    <h5 class="fw-500 ml-3 mb-0">But how do we do it? We like to call it earning the right, walking the talk and playing the game &hellip;</h5>
                                </blockquote>
                                <p class="column-lg-2 dropcap">Elixir serves to help people with creative ideas succeed. Our platform empowers millions of people — from individuals and local artists to entrepreneurs shaping the world’s most iconic businesses — to share their stories
                                    and create an impactful, stylish, and easy-to-manage online presence. The Cambridge office is the home of the Risk management practice. We work to assure the safe performance of complex critical systems; develop safety
                                    leadership and culture; manage safety and risk in high-hazard industries; understand complex project risks, measure and report risk performance. We work across a wide range of industries and public sector organizations
                                    that include upstream and downstream oil and gas; rail and road transportation; construction; and gas utilities and distribution. We work worldwide in Europe, Middle East and Asia, Africa and South America based out
                                    of our offices in Cambridge, UK and Milan, Italy.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.container-->
            </section> */ ?>
            <!--
            <section>
                <div class="background-holder overlay overlay-elixir" style="background-image:url(<?= base_url("assets/images/background-16.jpg")?>);"> </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="media">
                                <span class="ion-android-checkmark-circle fs-5 color-warning mr-3" style="transform: translateY(-1rem);"></span>
                                <div class="media-body">
                                    <h2 class="color-warning fs-3 fs-lg-4">Área do
                                        <br/>
                                        <span class="color-white">Cliente</span>
                                    </h2>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    
                </div>

                <div class="container mt-8">
                    <ul id="area-options" class="row d-flex justify-content-center">
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-auto col-xl-auto">
                            <a href="<?= base_url("area-cliente/carro-reserva")?>">
                            <img src="<?= base_url("assets/img/carro-reserva.png")?>" alt="">
                            Carro Reserva
                            </a>
                        </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-auto col-xl-auto">
                            <a href="<?= base_url("area-cliente/funeral")?>">
                            <img src="<?= base_url("assets/img/funeral.png")?>" alt="">
                            Funeral
                            </a>
                        </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-auto col-xl-auto">
                            <a href="<?= base_url("area-cliente/vidros")?>">
                            <img src="<?= base_url("assets/img/vidro.png")?>" alt="">
                            Vidros
                            </a>
                        </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-auto col-xl-auto">
                            <a href="<?= base_url("area-cliente/app")?>">
                            <img src="<?= base_url("assets/img/app.png")?>" alt="">
                            APP
                            </a>
                        </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-auto col-xl-auto">
                            <a href="<?= base_url("area-cliente/pet")?>">
                                <img src="<?= base_url("assets/img/pet.png")?>" alt="">
                                PET
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
           
-->

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>