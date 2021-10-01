
<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
    <?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    
            <section class="background-11">
                <div class="container">
                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="text-center fs-2 fs-md-3">Sobre nós</h3>
                            <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                        </div>
                        <div class="col-lg-6 d-flex">
                            <?php include 'assets/svg/about_hero.svg'; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="background-white px-3 mt-6 px-0 py-5 px-lg-5 radius-secondary">
                                <h5>Os melhores serviços em assistência, seguro e benefícios do Brasil</h5>
                                <p class="mt-3">Empresa especializada em oferecer serviços assistenciais e programa de benefícios para pessoas, empresas e Entidades de Autogestão no Brasil. Nossa missão é tornar a vida mais fácil, oferecendo serviços de excelência agregado aos nossos valores. "Não se preocupe, seu problema está em nossas mãos."</p>
                                <ul style="color:#6a6a6a;">
                                    <li>Honestidade: Agimos com coerência e verdade</li>
                                    <li>Inovação: Gerar e implementar novas ideias</li>
                                    <li>Lealdade: Manter a lealdade à empresa e seus interesses</li>
                                    <li>Responsabilidade: Aceitamos as consequências de nossas ações</li>
                                    <li>Confiabilidade: Mantemos sempre nossas promessas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.container-->
            </section>            
    

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>