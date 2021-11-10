$(document).ready(function() {
    // var inputs = $(':input').keypress(function(e){ 
    //     if (e.which == 13) {
    //        e.preventDefault();
    //        $(this).blur()
    //        var nextInput = inputs.get(inputs.index(this) + 1);
    //        if (nextInput) {
    //           nextInput.focus();
    //        }
    //     }
    // });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    window.onload = function () {
        AOS.init();
        $(".loader").addClass("d-none");
    };
    $("#CNPJEmpresa").change(function(){
        var cnpj = $(this).val();
        if($(this).cleanVal().length < 14) {
            return false
        }
        $.ajax({
            type: 'POST',
            url:  base_url + '/f-empresa',
            async: false,
            data: 
            {
                'CPFCNPJ' : cnpj
            },
            success: function(response) {
                if (response=="0"){
                    confError('CNPJ não cadastrado', "CNPJ não cadastrado no sistema da Brasil Atuarial. Gentileza entrar em contato através dos números (31) 2510-8536 | (31) 99279-0202 e formalizar sua contratação!")
                }else{
                    var vetor = response.split("|");
                    $("#IDEmpresa").val(vetor[0]);
                    $("#NomeEmpresa").val(vetor[1]);
                    $("#SolicitanteEmpresa").val(vetor[2]);
                    $("#TelefoneEmpresa").val(vetor[3]);
                    $("#EmailEmpresa").val(vetor[4]);
                    $("#TipoSolicitacao").val(vetor[5]);
                    $(".campoEmpresa").slideDown();
                }
            },
            error: function() {
                confError();
            },
            complete: function() {
                $(".cnpjSpin").fadeOut(200)
            }
        });
    });
    
    $("#voltaretapa1").click(function(){
        $(".dadosDaAssociacao").slideDown();
        $(".dadosDoCliente").slideUp();
        $("#etapa1").addClass("ativo");
        $("#etapa2").addClass("inativo").removeClass("ativo");
        $("#etapa2 img").attr("style","filter: contrast(0.5);");
        $("#etapa1").next().addClass("linhainativa").removeClass("linha");
        $("#voltaretapa1").css("display","none");
    });

    $("#voltaretapa2").click(function(){
        $(".dadosAnexos").slideUp();
        $(".dadosDoCliente").slideDown(); 
        $("#etapa2").addClass("ativo");
        $("#etapa3").addClass("inativo").removeClass("ativo");
        $("#etapa3 img").attr("style","filter: contrast(0.5);");
        $("#etapa2").next().addClass("linhainativa").removeClass("linha");
        $("#voltaretapa2").css("display","none");
        $("#voltaretapa1").css("display","inline-block");
    });
    
    $("#cpf2").mask("999.999.999-99");
    $("#datanascimento").mask("99/99/9999");
    $("#cep").mask("99.999-999");
    
    function carregaModelos(modelo){
        
        valor2 = modelo.split("-");
        $.ajax({
                type: 'POST',
                url:  base_url + '/f-modelos',
                async: false,
                data: 
                {
                    'cod' : valor2[0]
                },
                success: function(response) {
                    resultado = response.split("|");
                    var combo = document.getElementById("modelo");
                    combo.length = 0;
                    for (x=0;x<resultado.length-1;x++){
                        combo.options[x] = new Option(resultado[x], resultado[x]);
                    }
                },
                error: function() {
                    confError();
                }
            });
    }
    
    function validaSize(){
        var arquivo1 = document.getElementById("Anexo1");
        var arquivo2 = document.getElementById("Anexo2");
        var arquivo3 = document.getElementById("Anexo3");
        var arquivo4 = document.getElementById("Anexo4");
        var arquivo5 = document.getElementById("Anexo5");

        var total = 0;
        if ($("#Anexo1").val()!=""){
            total+=arquivo1.files[0].size;
        }
        if ($("#Anexo2").val()!=""){
            total+=arquivo2.files[0].size;
        }
        if ($("#Anexo3").val()!=""){
            total+=arquivo3.files[0].size;
        }
        if ($("#Anexo4").val()!=""){
            total+=arquivo4.files[0].size;
        }
        if ($("#Anexo5").val()!=""){
            total+=arquivo4.files[0].size;
        }
        return total;
    }
    
    function valida(){
        var retorno = true;
        if (validaSize()>6000000){
            alert("O tamanho máximo dos arquivos é 6MB");
            retorno = false;
        }
        return retorno;
    }
    
    
        $('#cep').blur(function(){
            /* Configura a requisição AJAX */
            var cep = $("#cep").val();
            var cep2 = cep.replace(".","").replace("-","");
            $.ajax({
                url : base_url + '/f-cep', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + cep2, /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua').val(data.rua);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#estado').val(data.estado);

                        $('#numero').focus();
                    }
                }
            });   
            return false;    
    });
    
    
    function validacaoEmail(field) {
        usuario = field.value.substring(0, field.value.indexOf("@"));
        dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
        
        if ((usuario.length >=1) &&
            (dominio.length >=3) && 
            (usuario.search("@")==-1) && 
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) && 
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&      
            (dominio.indexOf(".") >=1)&& 
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
        
        }
        else{
            alert("E-mail invalido");
            field.value = "";
        }
    }
    
    $("#cpf2").change(function(){
        if (validaCPF($(this).val().replace(".","").replace("-","").replace(".","").replace("/",""))==false)
        {
            alert("CPF Inválido!");
            $(this).val("");
            
        }
    });

   

    //Novo
    function validarCPF(cpf) {	
        cpf = cpf.replace(/[^\d]+/g,'');	
        if(cpf == '') return false;	
        // Elimina CPFs invalidos conhecidos	
        if (cpf.length != 11 || 
            cpf == "00000000000" || 
            cpf == "11111111111" || 
            cpf == "22222222222" || 
            cpf == "33333333333" || 
            cpf == "44444444444" || 
            cpf == "55555555555" || 
            cpf == "66666666666" || 
            cpf == "77777777777" || 
            cpf == "88888888888" || 
            cpf == "99999999999")
                return false;		
        // Valida 1o digito	
        add = 0;	
        for (i=0; i < 9; i ++)		
            add += parseInt(cpf.charAt(i)) * (10 - i);	
            rev = 11 - (add % 11);	
            if (rev == 10 || rev == 11)		
                rev = 0;	
            if (rev != parseInt(cpf.charAt(9)))		
                return false;		
        // Valida 2o digito	
        add = 0;	
        for (i = 0; i < 10; i ++)		
            add += parseInt(cpf.charAt(i)) * (11 - i);	
        rev = 11 - (add % 11);	
        if (rev == 10 || rev == 11)	
            rev = 0;	
        if (rev != parseInt(cpf.charAt(10)))
            return false;		
        return true;   
    }

    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        if (e.target.files[0].size>5000000){
            alert("O tamanho máximo do arquivo é 5MB");
        }else{
            $(this).next().find(".nomearquivo").html(fileName);
            $(this).next().find(".botaoUpload").attr("src",base_url + "/assets/img/icon_check.png");
            $(this).parent().next().slideDown();
        }
    });

    $(".cpf").mask("999.999.999-99");

    $("#CPF").change(function(){
        if (validarCPF($(this).val().replace(".","").replace("-","").replace(".","").replace("/",""))==false)
        {
            alert("CPF Inválido!");
            $(this).val("");
            $(".ocultarSeCPF").css("display","none");
            $(".ocultarSeCPF input[type='text']").val("");
            $(".ocultarSeCPF select").val("");
        }
    });

    $(".cnpj").mask("99.999.999/9999-99");

    // $(".telefone").mask("(99) 99999-9999");
    var behavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };

    $('.telefone').mask(behavior, options);
    // $('.telefone').keyup(function() {
    //     var phone, element;
    //     element = $(this);
    //     element.unmask();
    //     phone = element.val().replace(/\D/g, '');
    //     if (phone.length > 10) {
    //         element.mask("(99) 99999-9999");
    //     } else {
    //         element.mask("(99) 9999-9999");
    //     }
    // }).trigger('focusout');

    $(".campo").keyup(function(){
        if ($(this).val().split("_").join("").split(".").join("").split("/").join("").split("-").join("").split("(").join("").split(")").join("").split(" ").join("")!="" && $(this).attr("name") != "CNPJEmpresa" && $(this).attr("name") != "CEP"){
            $(this).parent().next().slideDown();
        }
    });

    $(".campo").change(function(){
        if ($(this).val().split("_").join("").split(".").join("").split("/").join("").split("-").join("").split("(").join("").split(")").join("").split(" ").join("")!="" && $(this).attr("name") != "CNPJEmpresa" && $(this).attr("name") != "CEP"){
            $(this).parent().next().slideDown();
        }
    });

    $("#Tipo, #CapitalSegurado").change(function(){
        if ($(this).val()!=""){
            $(this).parent().next().slideDown();
        }
    });

    $("#AvancarEtapa2").click(function(){
        $("#etapa1").removeClass("ativo");
        $("#etapa2").removeClass("inativo").addClass("ativo");
        $("#etapa2 img").removeAttr("style");
        $("#etapa1").next().removeClass("linhainativa").addClass("linha");
        $(".dadosDaAssociacao").slideUp();
        $(".dadosDoCliente").slideDown();
        $("#Nome").focus();
        
        $("html,body").animate({scrollTop: $(".solicitacao").offset().top}, 600);
        $("#voltaretapa1").css("display","inline-block");
    });

    $("#AvancarEtapa3").click(function(){
        $("#etapa2").removeClass("ativo");
        $("#etapa3").removeClass("inativo").addClass("ativo");
        $("#etapa3 img").removeAttr("style");
        $("#etapa2").next().removeClass("linhainativa").addClass("linha");
        $(".dadosDoCliente").slideUp();
        $(".dadosAnexos").slideDown();
        $("#voltaretapa2").css("display","inline-block");
        $("#voltaretapa1").css("display","none");
    });

    // $("#tipo")

    $(".botaoUpload").click(function(){
        $(this).parent().prev().click();
    });
    





    $("#formSuccess .message-response-try-again-btn").on("click", function() {
        $(".solicitacao").parent('section').slideDown(300)
        $("#formSuccess .message-response-try-again-btn").slideUp(300)
        $("#formSuccess .message-response-btn").slideDown(300)
        $("#formSuccess").slideUp(100)
        
        $("#EnviarDados").attr("disabled", false);
        $("#EnviarDados").removeClass("disabled");
    })

    $("#EnviarDados").on("click", function(){
        $(".form-sinistro").submit()
        
    })

    $(".form-sinistro").on("submit", function(e) {
        e.preventDefault();
        console.warn("send")
        var formdata = new FormData($(".form-sinistro")[0]);
        var pro = new Promise((resolve, reject) => {
            $("#formLoading").slideDown(500)
            $(".solicitacao").parent('section').slideUp(300)
            $("#EnviarDados").attr("disabled", true);
            $("#EnviarDados").addClass("disabled");
            resolve('OK');
        })
        pro.then(()=>{
            $("html,body").animate({scrollTop: $("#formLoading").offset().top - 80},600);
        }).then(()=>{
            var link = base_url + '/area-cliente/funeral/send';
            $.ajax({
                type: 'POST',
                url: link,
                data: formdata,
                processData: false,
                contentType: false

            }).done(function (resp) {
                console.log(resp)
                var data = JSON.parse(resp);
                if(data.error){
                    confError();

                } else {
                    $("#formSuccess").find(".icon-message").removeClass("error")
                    $("#formSuccess").find(".message-response-try-again-btn").slideUp(100)
                    $("#formSuccess").find(".message-response-btn").slideDown(100)
                    $("#formSuccess").find(".icon-message span").
                    removeClass("icon-Danger").addClass("icon-Yes")
                    $("#formSuccess").find("h4").text("Sucesso!")
                    var m = 'Sua solicitação foi realizada com sucesso!<br>'+
                    'Em até 48 horas entraremos em contato para fazer a liberação do seu carro reserva!';
                    $("#formSuccess").find(".message-response").html(m)
                    
                    console.log(data)
                    $(".form-sinistro")[0].reset()
                    $(".solicitacao").parent('section').slideUp(200)
                    $("#formLoading").slideUp(200)
                    $("#EnviarDados").attr("disabled", false);
                    $("#EnviarDados").removeClass("disabled");
                    console.log("Before Timeout")
                    // $("div.container-fluid").html(data);
                    var pro = new Promise((resolve, reject) => {
                        $("#formSuccess").slideDown(200)
                        setTimeout(() => {
                            console.log("timeouOK")
                            resolve('OK');
                        }, 210);
                    })
                    pro.then(()=>{
                        console.log("Then animate")
                        $("html,body").animate({scrollTop: $("body").offset().top - 100},450);
                    })
                }
                

            }).fail(function (resp) {
                confError();
            });
        })
        
    });

    function confError(title = 'Algo aconteceu!', 
    message = 'Algo aconteceu tentando enviar sua mensagem.') {
        
        var pro = new Promise((resolve, reject) => {
            $("#formLoading").slideUp(100)
            $("#formSuccess").find(".icon-message").addClass("error")
            $("#formSuccess").find(".icon-message span").
            removeClass("icon-Yes").addClass("icon-Danger")
            $("#formSuccess").find("h4").text(title)
            var m = message+
            '<br>Tente novamente.';
            $("#formSuccess").find(".message-response").html(m)
            $("#formSuccess").find(".message-response-try-again-btn").slideDown(100)
            $("#formSuccess").find(".message-response-btn").slideUp(100)
            $(".solicitacao").parent('section').slideUp(200)
            $("#formSuccess").slideDown(200)
            setTimeout(() => {
                console.log("timeouOK")
                resolve('OK');
            }, 210);
        })
        pro.then(()=>{
            console.log("Then animate")
            $("html,body").animate({scrollTop: $("body").offset().top - 100},450);
        })
    }
})