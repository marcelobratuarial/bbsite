
<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
    <?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


    <div class="container mt-8">
        <div class="row mb-6 mt-6">
            <div class="col-12">
                <h3 class="text-center fs-2 fs-md-3">Carro Reserva</h3>
                <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex align-items-end">
                <img style="margin-top: -100px;" src="<?= base_url("/assets/svg/solicitacao_hero.svg")?>" alt="">
            </div>
            <div class="col-md-6">
                <section id="formLoading">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div >
                            <div class="lds-hourglass"></div>
                        </div>
                        <span style="font-weight: 600">Aguarde...</span>
                    </div>
                </section>
                <section style="padding: 0">
                    
                    <div class="container-fluid solicitacao">
                        <!-- <div class="overlayCustom"></div> -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center pb-5 fluxo">
                                
                                <form action="#" method="post" enctype="multipart/form-data" class="form-sinistro">
                                    <div class="text-left texto">
                                        <h1 class="text-center pt-5">Veja como é fácil fazer a sua solicitação!</h1>
                                        <div class="text-center mt-5 mb-3">
                                            <div class="titulo">
                                                Dados da Empresa
                                            </div>
                                            <div class="linhaoculta"></div>
                                            <div class="titulo">
                                                Dados do Cliente
                                            </div>
                                            <div class="linhaoculta"></div>
                                            <div class="titulo">
                                                Dados da Solicitação
                                            </div>
                                            <div class="linhaoculta tituloanexos"></div>
                                            <div class="titulo tituloanexos" style="vertical-align:top">
                                                Anexos
                                            </div>
                                            <div></div>
                                        </div>
                                        <div class="text-center">
                                            <div class="etapa ativo" id="etapa1">
                                                <img src="<?= base_url("assets/svg/area_company.svg")?>">
                                            </div>
                                            <div class="linhainativa"></div>
                                            <div class="etapa inativo" id="etapa2">
                                                <img src="<?= base_url("assets/svg/area_user.svg")?>" style="filter: contrast(0.5);">
                                                <div style="cursor: pointer;position: absolute;margin-top: 49px;margin-left: -35px;font-weight: bold;font-size: 13px;font-family: Calibri;display: none;" id="voltaretapa1">VOLTAR</div>
                                            </div>
                                            <div class="linhainativa"></div>
                                            <div class="etapa inativo" id="etapa3">
                                                <img src="<?= base_url("assets/svg/area_file.svg") ?>" style="filter: contrast(0.5);">
                                                <div style="cursor: pointer;position: absolute;margin-top: 49px;margin-left: -35px;font-weight: bold;font-size: 13px;font-family: Calibri;display: none;" id="voltaretapa2">VOLTAR</div>
                                            </div>
                                            <div class="linhainativa tituloanexos"></div>
                                            <div class="etapa inativo" id="etapa4">
                                                <img src="<?= base_url("assets/svg/area_anexo.svg")?>" style="filter: contrast(0.5);">
                                                <div style="cursor: pointer;position: absolute;margin-top: 49px;margin-left: -35px;font-weight: bold;font-size: 13px;font-family: Calibri;display: none;" id="voltaretapa3">VOLTAR</div>
                                            </div>
                                            <div></div>
                                        </div>
                                        <div class="text-center d-none">
                                            <h1 class="titulostep">Dados da Associação</h1>
                                        </div>
                                        <div class="row dadosDaAssociacao mt-5" style="height:100%">
                                            <div class="col-12 text-center">
                                                <label>CNPJ</label><br>
                                                <input type="text" name="CNPJEmpresa" id="CNPJEmpresa" class="campo cnpj" autocomplete="off">
                                                <span class="cnpjSpin" style="display:none"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>
                                                <input type="hidden" name="IDEmpresa" id="IDEmpresa">
                                                <input type="hidden" name="NomeEmpresa" id="NomeEmpresa">
                                            </div>
                                            <div class="col-12 text-center divcampo campoEmpresa">
                                                <label>Solicitante</label><br>
                                                <input type="text" name="SolicitanteEmpresa" id="SolicitanteEmpresa" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo campoEmpresa">
                                                <label>Telefone</label><br>
                                                <input type="text" name="TelefoneEmpresa" id="TelefoneEmpresa" class="campo telefone" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo campoEmpresa">
                                                <label>E-mail</label><br>
                                                <input type="text" name="EmailEmpresa" id="EmailEmpresa" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo campoEmpresa">
                                                <input type="button" name="AvancarEtapa2" id="AvancarEtapa2" class="campo botaoAvancar" value="PRÓXIMA ETAPA">
                                            </div>
                                        </div>
                                        <div class="row dadosDoCliente mt-5" style="height:100%">
                                            <div class="col-12 text-center">
                                                <label>Nome</label><br>
                                                <input type="text" name="Nome" id="Nome" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>CPF</label><br>
                                                <input type="text" name="CPF" id="CPF" class="campo cpf" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo ocultarSeCPF">
                                                <label>E-mail</label><br>
                                                <input type="text" name="Email" id="Email" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo ocultarSeCPF">
                                                <label>Telefone</label><br>
                                                <input type="text" name="Telefone" id="Telefone" class="campo telefone" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>CEP</label><br>
                                                <input type="text" name="CEP" id="CEP" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>Logradouro</label><br>
                                                <input type="text" name="Logradouro" id="Logradouro" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>Bairro</label><br>
                                                <input type="text" name="Bairro" id="Bairro" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>Cidade</label><br>
                                                <input type="text" name="Cidade" id="Cidade" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>Estado</label><br>
                                                <input type="text" name="Estado" id="Estado" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>Numero</label><br>
                                                <input type="text" name="Numero" id="Numero" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <label>Complemento</label><br>
                                                <input type="text" name="Complemento" id="Complemento" class="campo" autocomplete="off">
                                            </div>
                                            <div class="col-12 text-center divcampo carregaCampos">
                                                <input type="button" name="AvancarEtapa3" id="AvancarEtapa3" class="campo botaoAvancar" value="PRÓXIMA ETAPA">
                                            </div>
                                        </div>
                                        <div class="row dadosSolicitacao mt-5" style="height:100%">
                                            <div class="col-12 text-center">
                                                <label>Placa:</label><br>
                                                <input type="text" name="Placa" required="" id="Placa" class="campo placa">
                                                <input type="hidden" name="TipoSolicitacao" id="TipoSolicitacao" class="campo" value="">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <input type="hidden" name="Chassi" value="" id="Chassi">
                                                <label>Estado:</label><br>
                                                <select name="EstadoRetirada" required="" id="EstadoRetirada" class="campo ">
                                                    <option></option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AM">AM</option>
                                                    <option value="AP">AP</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MG">MG</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MT">MT</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="PR">PR</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SE">SE</option>
                                                    <option value="SP">SP</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>Cidade:</label><br>
                                                <input type="text" name="CidadeRetirada" required="" id="CidadeRetirada" class="campo ">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>Data Retirada:</label><br>
                                                <input type="text" name="DataRetirada" required="" id="DataRetirada" class="campo">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>Hora Retirada:</label><br>
                                                <input type="text" name="HoraRetirada" required="" id="HoraRetirada" class="campo">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>Nome Responsável pela Locação e apresentação Cartão de Crédito</label><br>
                                                <input type="text" name="NomeResponsavelCartao" id="NomeResponsavelCartao" class="campo " required="">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>CPF</label><br>
                                                <input type="text" id="CPFResponsavelCartao" name="CPFResponsavelCartao" class="campo" required="">
                                            </div>
                                            <div class="col-12 text-center divcampo">
                                                <label>Diárias:</label><br>
                                                <input type="number" id="QuantidadeDeDiarias" name="QuantidadeDeDiarias" class="campo " required="">                                    
                                            </div>
                                            <div class="col-12 text-center divcampo mt-4">
                                                <input type="button" name="AvancarEtapa4" id="AvancarEtapa4" class="campo botaoAvancar" value="PRÓXIMA ETAPA">
                                            </div>
                                        </div>
                                        <div class="row dadosAnexos mt-5" style="height:100%">
                                            <div class="col-12 text-center">
                                                <label class="m-0">Aviso de Sinistro da Empresa</label><br>
                                                <input type="file" name="SinistroEmpresa" id="SinistroEmpresa" class="campo d-none">
                                                <div class="anexo">
                                                    <label class="nomearquivo">Escolher um arquivo...</label>
                                                    <img src="<?= base_url("assets/img/icon_upload.png") ?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center divcampo mt-4">
                                                <label class="m-0">Boletim de Ocorrência</label><br>
                                                <input type="file" name="BoletimOcorrencia" id="BoletimOcorrencia" class="campo d-none">
                                                <div class="anexo">
                                                    <label class="nomearquivo">Escolher um arquivo...</label>
                                                    <img src="<?= base_url("assets/img/icon_upload.png")?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center divcampo mt-4">
                                                <label class="m-0">CRLV do Veículo</label><br>
                                                <input type="file" name="CRLVVeiculo" id="CRLVVeiculo" class="campo d-none">
                                                <div class="anexo">
                                                    <label class="nomearquivo">Escolher um arquivo...</label>
                                                    <img src="<?= base_url("assets/img/icon_upload.png") ?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center divcampo mt-4">
                                                <label class="m-0">CNH do cliente</label><br>
                                                <input type="file" name="CHNCliente" id="CHNCliente" class="campo d-none">
                                                <div class="anexo">
                                                    <label class="nomearquivo">Escolher um arquivo...</label>
                                                    <img src="<?= base_url("assets/img/icon_upload.png") ?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center divcampo mt-4">
                                                <label class="m-0">Autorização do Reparo para a Oficina</label><br>
                                                <input type="file" name="AutorizacaoReparo" id="AutorizacaoReparo" class="campo d-none">
                                                <div class="anexo">
                                                    <label class="nomearquivo">Escolher um arquivo...</label>
                                                    <img src="<?= base_url("assets/img/icon_upload.png")?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center divcampo mt-4">
                                                <input type="button" name="EnviarDados" id="EnviarDados" class="campo botaoAvancar" value="ENVIAR AVISO DE SINISTRO">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="formSuccess">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="icon-message">
                            <span class="icon-Danger fs-8 fw-600"></span>
                        </div>
                        <h4 style="margin: 20px 0; font-weight: 600">Sucesso!</h4>
                        <div class="text-center">
                            <div class="message-response">Sua solicitação foi realizada com sucesso.<br>
                                Em até 48 horas entraremos em contato para fazer a liberação do seu carro reserva! 
                            </div>
                            <hr>
                            <p class="message-response-try-again-btn">
                                <a href="#" class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700">
                                    OK
                                </a>
                            </p>
                            <p class="message-response-btn">
                                <a href="<?= base_url("area-cliente/carro-reserva")?>" class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700">
                                    CARRO RESERVA
                                </a>
                            </p>
                        </div>
                        
                    </div>
                </section>

            </div>
        </div>
    </div>












            

            

    
                <!-- código formulario antigo       
                <div class="container-fluid solicitacao">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center pl-5 pr-5 pb-5 fluxo">
                            <form action="<?= base_url("/area-cliente/carro-reserva/send")?>" method="post" enctype="multipart/form-data" class="form-sinistro">
                            <div class="text-left texto">
                                <h1 class="text-center pt-5">Veja como é fácil fazer a sua solicitação!</h1>
                                <div class="text-center mt-5 mb-3">
                                    <div class="titulo">
                                        Dados da Empresa
                                    </div>
                                    <div class="linhaoculta"></div>
                                    <div class="titulo">
                                        Dados do Cliente
                                    </div>
                                    <div class="linhaoculta"></div>
                                    <div class="titulo">
                                        Dados da Solicitação
                                    </div>
                                    <div class="linhaoculta tituloanexos"></div>
                                    <div class="titulo tituloanexos" style="vertical-align:top">
                                        Anexos
                                    </div>
                                    <div></div>
                                </div>
                                <div class="text-center">
                                    <div class="etapa ativo" id="etapa1">
                                        <img src="<?= base_url("assets/img/icon_business.png")?>">
                                    </div>
                                    <div class="linhainativa"></div>
                                    <div class="etapa inativo" id="etapa2">
                                        <img src="<?= base_url("assets/img/icon_client.png")?>" style="filter: contrast(0.5);">
                                        <div style="cursor: pointer;position: absolute;margin-top: 49px;margin-left: -35px;font-weight: bold;font-size: 13px;font-family: Calibri;display: none;" id="voltaretapa1">VOLTAR</div>
                                    </div>
                                    <div class="linhainativa"></div>
                                    <div class="etapa inativo" id="etapa3">
                                        <img src="<?= base_url("assets/img/solicitacao.png") ?>" style="filter: contrast(0.5);">
                                        <div style="cursor: pointer;position: absolute;margin-top: 49px;margin-left: -35px;font-weight: bold;font-size: 13px;font-family: Calibri;display: none;" id="voltaretapa2">VOLTAR</div>
                                    </div>
                                    <div class="linhainativa tituloanexos"></div>
                                    <div class="etapa inativo" id="etapa4">
                                        <img src="<?= base_url("assets/img/icon_attach.png")?>" style="filter: contrast(0.5);">
                                        <div style="cursor: pointer;position: absolute;margin-top: 49px;margin-left: -35px;font-weight: bold;font-size: 13px;font-family: Calibri;display: none;" id="voltaretapa3">VOLTAR</div>
                                    </div>
                                    <div></div>
                                </div>
                                <div class="text-center d-none">
                                    <h1 class="titulostep">Dados da Associação</h1>
                                </div>
                                <div class="row dadosDaAssociacao mt-5" style="height:100%">
                                    <div class="col-12 text-center">
                                        <label>CNPJ</label><br>
                                        <input type="text" name="CNPJEmpresa" id="CNPJEmpresa" class="campo cnpj" autocomplete="off">
                                        <input type="hidden" name="IDEmpresa" id="IDEmpresa">
                                        <input type="hidden" name="NomeEmpresa" id="NomeEmpresa">
                                    </div>
                                    <div class="col-12 text-center divcampo campoEmpresa">
                                        <label>Solicitante</label><br>
                                        <input type="text" name="SolicitanteEmpresa" id="SolicitanteEmpresa" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo campoEmpresa">
                                        <label>Telefone</label><br>
                                        <input type="text" name="TelefoneEmpresa" id="TelefoneEmpresa" class="campo telefone" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo campoEmpresa">
                                        <label>E-mail</label><br>
                                        <input type="text" name="EmailEmpresa" id="EmailEmpresa" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo campoEmpresa">
                                        <input type="button" name="AvancarEtapa2" id="AvancarEtapa2" class="campo botaoAvancar" value="PRÓXIMA ETAPA">
                                    </div>
                                </div>
                                <div class="row dadosDoCliente mt-5" style="height:100%">
                                    <div class="col-12 text-center">
                                        <label>Nome</label><br>
                                        <input type="text" name="Nome" id="Nome" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>CPF</label><br>
                                        <input type="text" name="CPF" id="CPF" class="campo cpf" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo ocultarSeCPF">
                                        <label>E-mail</label><br>
                                        <input type="text" name="Email" id="Email" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo ocultarSeCPF">
                                        <label>Telefone</label><br>
                                        <input type="text" name="Telefone" id="Telefone" class="campo telefone" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>CEP</label><br>
                                        <input type="text" name="CEP" id="CEP" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>Logradouro</label><br>
                                        <input type="text" name="Logradouro" id="Logradouro" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>Bairro</label><br>
                                        <input type="text" name="Bairro" id="Bairro" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>Cidade</label><br>
                                        <input type="text" name="Cidade" id="Cidade" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>Estado</label><br>
                                        <input type="text" name="Estado" id="Estado" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>Numero</label><br>
                                        <input type="text" name="Numero" id="Numero" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <label>Complemento</label><br>
                                        <input type="text" name="Complemento" id="Complemento" class="campo" autocomplete="off">
                                    </div>
                                    <div class="col-12 text-center divcampo carregaCampos">
                                        <input type="button" name="AvancarEtapa3" id="AvancarEtapa3" class="campo botaoAvancar" value="PRÓXIMA ETAPA">
                                    </div>
                                </div>
                                <div class="row dadosSolicitacao mt-5" style="height:100%">
                                    <div class="col-12 text-center">
                                        <label>Placa:</label><br>
                                        <input type="text" name="Placa" required="" id="Placa" class="campo">
                                        <input type="hidden" name="TipoSolicitacao" id="TipoSolicitacao" class="campo" value="">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <input type="hidden" name="Chassi" value="" id="Chassi">
                                        <label>Estado:</label><br>
                                        <select name="EstadoRetirada" required="" id="EstadoRetirada" class="campo ">
                                            <option></option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AM">AM</option>
                                            <option value="AP">AP</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MG">MG</option>
                                            <option value="MS">MS</option>
                                            <option value="MT">MT</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="PR">PR</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SE">SE</option>
                                            <option value="SP">SP</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>Cidade:</label><br>
                                        <input type="text" name="CidadeRetirada" required="" id="CidadeRetirada" class="campo ">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>Data Retirada:</label><br>
                                        <input type="text" name="DataRetirada" required="" id="DataRetirada" class="campo">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>Hora Retirada:</label><br>
                                        <input type="text" name="HoraRetirada" required="" id="HoraRetirada" class="campo">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>Nome Responsável pela Locação e apresentação Cartão de Crédito</label><br>
                                        <input type="text" name="NomeResponsavelCartao" id="NomeResponsavelCartao" class="campo " required="">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>CPF</label><br>
                                        <input type="text" id="CPFResponsavelCartao" name="CPFResponsavelCartao" class="campo" required="">
                                    </div>
                                    <div class="col-12 text-center divcampo">
                                        <label>Diárias:</label><br>
                                        <input type="number" id="QuantidadeDeDiarias" name="QuantidadeDeDiarias" class="campo " required="">                                    
                                    </div>
                                    <div class="col-12 text-center divcampo mt-4">
                                        <input type="button" name="AvancarEtapa4" id="AvancarEtapa4" class="campo botaoAvancar" value="PRÓXIMA ETAPA">
                                    </div>
                                </div>
                                <div class="row dadosAnexos mt-5" style="height:100%">
                                    <div class="col-12 text-center">
                                        <label class="m-0">Aviso de Sinistro da Empresa</label><br>
                                        <input type="file" name="SinistroEmpresa" id="SinistroEmpresa" class="campo d-none">
                                        <div class="anexo">
                                            <label class="nomearquivo">Escolher um arquivo...</label>
                                            <img src="<?= base_url("assets/img/icon_upload.png") ?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center divcampo mt-4">
                                        <label class="m-0">Boletim de Ocorrência</label><br>
                                        <input type="file" name="BoletimOcorrencia" id="BoletimOcorrencia" class="campo d-none">
                                        <div class="anexo">
                                            <label class="nomearquivo">Escolher um arquivo...</label>
                                            <img src="<?= base_url("assets/img/icon_upload.png")?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center divcampo mt-4">
                                        <label class="m-0">CRLV do Veículo</label><br>
                                        <input type="file" name="CRLVVeiculo" id="CRLVVeiculo" class="campo d-none">
                                        <div class="anexo">
                                            <label class="nomearquivo">Escolher um arquivo...</label>
                                            <img src="<?= base_url("assets/img/icon_upload.png") ?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center divcampo mt-4">
                                        <label class="m-0">CNH do cliente</label><br>
                                        <input type="file" name="CHNCliente" id="CHNCliente" class="campo d-none">
                                        <div class="anexo">
                                            <label class="nomearquivo">Escolher um arquivo...</label>
                                            <img src="<?= base_url("assets/img/icon_upload.png") ?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center divcampo mt-4">
                                        <label class="m-0">Autorização do Reparo para a Oficina</label><br>
                                        <input type="file" name="AutorizacaoReparo" id="AutorizacaoReparo" class="campo d-none">
                                        <div class="anexo">
                                            <label class="nomearquivo">Escolher um arquivo...</label>
                                            <img src="<?= base_url("assets/img/icon_upload.png")?>" class="botaoUpload" data-toggle="tooltip" data-placement="top" title="Tamanho Máximo 5MB">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center divcampo mt-4">
                                        <input type="submit" name="EnviarDados" id="EnviarDados" class="campo botaoAvancar" value="ENVIAR AVISO DE SINISTRO">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="formSuccess">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="icon-message">
                        <span class="icon-Danger fs-8 fw-600"></span>
                    </div>
                    <h4 style="margin: 20px 0; font-weight: 600">Sucesso!</h4>
                    <div class="text-center">
                        <div class="message-response">Sua solicitação foi realizada com sucesso.<br>
                            Em até 48 horas entraremos em contato para fazer a liberação do seu carro reserva!
                        </div>
                        <hr>
                        <p class="message-response-try-again-btn">
                            <a href="#" class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700">
                                OK
                            </a>
                        </p>
                        <p class="message-response-btn">
                            <a href="<?= base_url("area-cliente/carro-reserva")?>" class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700">
                                CARRO RESERVA
                            </a>
                        </p>
                    </div>
                    
                </div>
            </section>
            -->
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>

<?= $this->section('cCss') ?>
<!-- Carro Reserva CSS -->
<style>
    .lds-hourglass{display:inline-block;position:relative;width:80px;height:80px}.lds-hourglass:after{content:" ";display:block;border-radius:50%;width:0;height:0;margin:8px;box-sizing:border-box;background-color:#0987ff;border:32px solid #e33f2c;border-color:#e33f2c transparent #e33f2c transparent;animation:lds-hourglass 1.2s infinite}@keyframes lds-hourglass{0%{transform:rotate(0);animation-timing-function:cubic-bezier(0.55,0.055,0.675,0.19)}50%{transform:rotate(900deg);animation-timing-function:cubic-bezier(0.215,0.61,0.355,1)}100%{transform:rotate(1800deg)}}#formLoading,#formSuccess{display:none}#formSuccess .icon-message{color:#4d9436}.CustomLoader.active{opacity:1;display:-webkit-box;display:-ms-flexbox;display:flex;z-index:10001!important}.CustomLoader{position:fixed;top:0;left:0;right:0;display:flex;bottom:0;z-index:0;background-color:#fff;opacity:0;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}#Loader{width:150px;height:auto}
</style>
<link href="<?= base_url("assets/css/area-cliente/carro-reserva.css") ?>" rel="stylesheet"> </head>
<?= $this->endSection() ?>
<?= $this->section('cScripts') ?>
<!-- Carro Reserva Scripts -->
<script src="<?= base_url("assets/js/area-cliente/carro-reserva.js") ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/js/area-cliente/commons.js") ."?".time() ?>"></script>
<?= $this->endSection() ?>