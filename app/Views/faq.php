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
                        <div class="card wracard">
                            <div class="card-header faq-card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="faq-button btn btn-outline-primary btn-capsule btn-md" data-toggle="collapse" data-target="#quem-e" aria-expanded="true" aria-controls="quem-e">
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
                        <div class="card wracard">
                            <div class="card-header faq-card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="faq-button btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#finalidades" aria-expanded="false" aria-controls="finalidades">
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
                        <div class="card wracard">
                            <div class="card-header faq-card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="faq-button btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#linha-de-servicos" aria-expanded="false" aria-controls="linha-de-servicos">
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
                        <div class="card wracard">
                            <div class="card-header faq-card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="faq-button btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#porque-contratar" aria-expanded="false" aria-controls="porque-contratar">
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
                        <div class="card wracard">
                            <div class="card-header faq-card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="faq-button btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#como-contratar" aria-expanded="false" aria-controls="como-contratar">
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
                        <div class="card wracard">
                            <div class="card-header faq-card-header" id="headingSix">
                                <h5 class="mb-0">
                                    <button class="faq-button btn btn-outline-primary btn-capsule btn-md collapsed" data-toggle="collapse" data-target="#acionar-servicos" aria-expanded="false" aria-controls="acionar-servicos">
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




<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>