<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
<?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<section class="background-11">
    <div class="container">
        <div class="row mt-6">
            <div class="col">
                <h3 class="text-center fs-2 fs-md-3">Perguntas Frequentes</h3>
                <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
            <div class="col-12">
                <div class="background-white px-3 mt-6 px-0 py-5 px-lg-5 radius-secondary">
                    <!-- <h5>Earning the right</h5> -->
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-outline-primary btn-capsule btn-md" data-toggle="collapse" data-target="#quem-e" aria-expanded="true" aria-controls="quem-e">
                                        QUEM É A BRASIL BENEFÍCIOS?
                                    </button>
                                </h5>
                            </div>

                            <div id="quem-e" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <P>A Brasil Benefícios é uma plataforma integrada de soluções em seguros massificados, programas de assistências exclusivos e um clube de descontos com mais de 50.000 produtos compondo a rede.</p>
                                    <p>Atendemos empresas, sindicatos, federações, associações, cooperativas em uma relação Business to Business 100% digital e totalmente transparente.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#finalidades" aria-expanded="false" aria-controls="finalidades">
                                    QUAIS AS FINALIDADES DA BRASIL BENEFÍCIOS?
                                    </button>
                                </h5>
                            </div>
                            <div id="finalidades" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                Propor soluções na entrega de seguros massificados com a identificação do produto que melhor se encaixa com a demanda trabalhada, criar programas de assistências exclusivos e totalmente personalizados com serviços nas áreas de pessoas, veículos e residência e entregar um clube de descontos com a identidade do contratante proporcionando vantagens competitivas no exercícios de suas atividades.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#linha-de-servicos" aria-expanded="false" aria-controls="linha-de-servicos">
                                    QUAIS AS LINHAS DE SERVIÇOS QUE A BRASIL BENEFÍCIOS OFERECE?
                                    </button>
                                </h5>
                            </div>
                            <div id="linha-de-servicos" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <p>A Brasil Benefícios oferece as seguintes linhas de serviços:</p>
                                    <p>- Assistência: Construção de programas exclusivos com serviços para residências, pessoas e veículos;</p>
                                    <p>- Seguros: Fornecimento de seguros massificados através da estipulação de apólice coletiva ou de forma individual para todos os ramos existentes;</p>
                                    <p>- Benefícios: Personalização de plataforma de descontos com a identidade da contratante.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#porque-contratar" aria-expanded="false" aria-controls="porque-contratar">
                                    PORQUE CONTRATAR A BRASIL BENEFÍCIOS?
                                    </button>
                                </h5>
                            </div>
                            <div id="porque-contratar" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Somos especialistas na colocação de seguros massificados, preparação de programas de assistências e personalização de plataforma de descontos com rede em todo o Brasil.</p>
                                    <p>Contamos com uma equipe técnica e operacional de alta performance que possibilita a entrega de qualidade de nossos serviços, além de contar com grandes parceiros nas nossas prestações de serviços.</p>
                                    <p>Com a massificação já construída, temos condições comerciais diferenciadas que nos possibilitam melhores preços nos tornando assim mais competitivos no fornecimento de nossos serviços.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#como-contratar" aria-expanded="false" aria-controls="como-contratar">
                                    COMO CONTRATAR A BRASIL BENEFÍCIOS?
                                    </button>
                                </h5>
                            </div>
                            <div id="como-contratar" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body">
                                    <p>A contratação dos serviços da Brasil Benefícios pode ocorrer por meio de agendamento de videoconferência com um de nossos agentes comerciais ou no caso de já se ter em mente um produto específico, fazer a solicitação da formalização através do e-mail contato@brasilbeneficios.club.</p>
                                    <p>Após o contato, um de nossos agentes comerciais retornará realizando todo o processo e liberando os produtos solicitado.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h5 class="mb-0">
                                    <button class="btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#acionar-servicos" aria-expanded="false" aria-controls="acionar-servicos">
                                    COMO ACIONAR OS SERVIÇOS DA BRASIL BENEFÍCIOS?
                                    </button>
                                </h5>
                            </div>
                            <div id="acionar-servicos" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                <div class="card-body">
                                    <p>No caso da eventualidade de um sinistro, o mesmo pode ser avisado no site da Brasil Benefícios ou através de nossa central 0800 600 28 51. Caso precise de um suporte administrativo no processo, o mesmo pode ser solicitado através do número (31) 2510-8536.</p>
                                    <p>Todo o suporte necessário será realizado por nossa equipe até que seu atendimento seja concluído.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>

<section class="bg-secondary">
                <div class="background-holder overlay overlay-elixir" style="background-image:url(https://images.unsplash.com/39/lIZrwvbeRuuzqOoWJUEn_Photoaday_CSD%20(1%20of%201)-5.jpg?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80);"> </div>
                <!--/.background-holder-->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="media">
                                <span class="ion-android-checkmark-circle fs-5 color-warning mr-3" style="transform: translateY(-1rem);"></span>
                                <div class="media-body">
                                    <h2 class="color-warning fs-3 fs-lg-4">Conheça nossos 
                                        <br/>
                                        <span class="color-white"> números:</span>
                                    </h2>
                                    <div class="row mt-4">
                                        <div class="col-md-4 overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                            <div class="value fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3" akhi="2500000" data-zanim='{"delay":0.1}'>0</div>
                                            <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'> de usuários no Clube de Descontos</h6>
                                        </div>
                                        <div class="col col-lg-3 overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                            <div class="value fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3" akhi="5000" data-zanim='{"delay":0.1}'>0</div>
                                            <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>diárias de carro reserva liberadas todos os mês</h6>
                                        </div>
                                        <div class="w-100 d-flex d-lg-none"></div>
                                        <div class="col-md-2 overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                            <div class="value fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3" akhi="1400" data-zanim='{"delay":0.1}'>0</div>
                                            <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'> novos segurados de vida todo mês</h6>
                                        </div>
                                        <div class="col col-lg-3 overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                            <div class="value fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3" akhi="3000" data-zanim='{"delay":0.1}'>0</div>
                                            <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>atendimentos de assistência residencial todo mês</h6>
                                        </div>
                                    </div>
                                </div>
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