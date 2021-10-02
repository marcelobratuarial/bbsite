<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
class Pages extends BaseController
{
	protected $main_menu;
	protected $query;
	function __construct() {
		$this->main_menu = json_decode(file_get_contents(FCPATH .'content/main-menu.json'));
		$uri = current_url(true);

		list($t, $q) = array_pad(explode("/q/", $uri), 2, null);
		
		if(!empty($q))  {
			// echo "SET";
			$this->query = $q;
		} else {
			$this->query = '';
		}
	}

	public function carregaModelos() {
		$db = \Config\Database::connect('atuarialAlt');
		// $cod = $_POST["cod"];
		// $query = "SELECT * FROM modeloCarro where codMontadora = ".$cod;
		// $sql = mysqli_query($db, $query);
		// while ($linha=mysqli_fetch_array($sql)){
		// 	echo utf8_encode($linha["modeloCarro"])."|";
		// }

		
		$cod = $this->request->getPost("cod");

		$query = $db->query("SELECT * FROM modeloCarro where codMontadora = '".$cod."'");
        
		$res = $query->getResultArray();
		$responses = "";
		foreach($res as $m) {
			$responses .=  $m["modeloCarro"]. "|";
		}
		$responses = rtrim($responses, "|");
		// $responses = $res["IDCodigo"]."|".$res["RazaoSocial"]."|".$res["PessoaContato"]."|".$res["Telefone"]."|".$res["Email"]."|".$res["Refaturado"];
		
		echo $responses;
	}

	public function findEmpresa() {
		$db = \Config\Database::connect('atuarial');
		$cnpj = $this->request->getPost("CPFCNPJ");

		$query = $db->query("SELECT * FROM empresas where CPFCNPJ='".$cnpj."'");
        
		$res = $query->getResultArray()[0];
		$responses = $res["IDCodigo"]."|".$res["RazaoSocial"]."|".$res["PessoaContato"]."|".$res["Telefone"]."|".$res["Email"]."|".$res["Refaturado"];
		
		echo $responses;
	}


	public function findCEP() {
		$cep = $_POST['cep'];

		$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
		
		$dados['sucesso'] = (string) $reg->resultado;
		$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
		$dados['bairro']  = (string) $reg->bairro;
		$dados['cidade']  = (string) $reg->cidade;
		$dados['estado']  = (string) $reg->uf;
		
		echo json_encode($dados);
		
	}

	public function sendApp() {
		// print_r("teste");exit;
		// var_dump($this->request->getFile("SinistroEmpresa"));
		// exit;
		// $DataRetirada = $this->request->getPost("DataRetirada");
		// $vetorData = explode("/",$DataRetirada);
		// $DataRetirada = $vetorData[2]."-".$vetorData[1]."-".$vetorData[0];
		$formData = [
			"IDEmpresa" => $this->request->getPost("IDEmpresa"),
			"NomeEmpresa" => $this->request->getPost("NomeEmpresa"),
			"SolicitanteEmpresa" => $this->request->getPost("SolicitanteEmpresa"),
			"TelefoneEmpresa" => $this->request->getPost("TelefoneEmpresa"),
			"EmailEmpresa" => $this->request->getPost("EmailEmpresa"),
			"Nome" => $this->request->getPost("Nome"),
			"TelefoneComercial" => $this->request->getPost("TelefoneComercial"),
			"RG" => $this->request->getPost("CPF"),
			"CPF" => $this->request->getPost("CPF"),
			"Email" => $this->request->getPost("Email"),
			"CEP" => $this->request->getPost("CEP"),
			"Logradouro" => $this->request->getPost("Logradouro"),
			"Numero" => $this->request->getPost("Numero"),
			"Complemento" => $this->request->getPost("Complemento"),
			"Bairro" => $this->request->getPost("Bairro"),
			"Cidade" => $this->request->getPost("Cidade"),
			"UF" => $this->request->getPost("UF"),
			
			"Nome2" => $this->request->getPost("Nome2"),
			"CPF2" => $this->request->getPost("CPF2"),
			"Telefone2" => $this->request->getPost("Telefone2"),
			"Email2" => $this->request->getPost("Email2"),
			
			"Placa" => $this->request->getPost("Placa"),
			"Montadora" => $this->request->getPost("Montadora"),
			"Modelo" => $this->request->getPost("Modelo"),
			"Categoria" => $this->request->getPost("Categoria"),
			"Ano" => $this->request->getPost("Ano"),
			"Chassi" => $this->request->getPost("Chassi"),
			"Renavam" => $this->request->getPost("Renavam"),
			"LotacaoMaxima" => $this->request->getPost("LotacaoMaxima"),
			"Utilizacao" => $this->request->getPost("Utilizacao"),
			"Cobertura" => $this->request->getPost("Cobertura"),
			"CapitalSegurado" => $this->request->getPost("CapitalSegurado"),
		];

		$db = \Config\Database::connect('atuarial');
		$query = "INSERT INTO app (IDEmpresa, 
			SolicitanteEmpresa, 
			TelefoneEmpresa, 
			EmailEmpresa, 
			Nome, 
			TelefoneComercial, 
			RG,
			CPF, 
			Email, 
			CEP, 
			Logradouro, 
			Numero, 
			Complemento, 
			Bairro, 
			Cidade, 
			UF, 
			Nome2, 
			CPF2, 
			Telefone2, 
			Email2, 
			Placa, 
			Montadora, 
			Modelo, 
			Categoria, 
			Ano, 
			Chassi, 
			Renavam, 
			LotacaoMaxima, 
			Utilizacao, 
			Cobertura, 
			CapitalSegurado, 
			DataSolicitacao) 
		values (".
			$formData['IDEmpresa'] . ",'" . 
			$formData['SolicitanteEmpresa'] . "','".
			$formData['TelefoneEmpresa'] ."','" .
			$formData['EmailEmpresa'] . "','" .
			$formData['Nome'] ."','" .
			$formData['TelefoneComercial'] ."','". 
			$formData['RG'] . "', '".
			$formData['CPF'] ."','". 
			$formData['Email'] . "','" .
			$formData['CEP'] . "','" .
			$formData['Logradouro'] . "','" .
			$formData['Numero'] . "','" .
			$formData['Complemento'] . "','" .
			$formData['Bairro'] . "','" .
			$formData['Cidade'] . "','" .
			$formData['UF'] . "','" .
			$formData['Nome2'] . "','" .
			$formData['CPF2'] . "','" .
			$formData['Telefone2'] . "','" .
			$formData['Email2'] . "','" .
			$formData['Placa'] . "','" . 
			$formData['Montadora'] . "','" .
			$formData['Modelo'] . "','" .
			$formData['Categoria'] . "','" .
			$formData['Ano'] . "','" .
			$formData['Chassi'] . "','" .
			$formData['Renavam'] . "','" .
			$formData['LotacaoMaxima'] . "','" .
			$formData['Utilizacao'] . "','" .
			$formData['Cobertura'] . "','" .
			$formData['CapitalSegurado'] . "',CURRENT_DATE)";
		// print_r($query);exit;
		// $qry = $db->query($query);
        
		// $id = $db->insertID();
		// $query = "insert into app_status (IDApp, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		// $qry = $db->query($query);
        


		$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['SMTPTimeout'] = '20';
		$config['protocol'] = 'smtp';
		// $config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = 'br540.hostgator.com.br';
		$config['SMTPUser'] = 'contato@brasilatuarial.com.br';
		$config['SMTPPass'] = 'contato@2015';
		$config['SMTPPort'] = '465';
		$config['SMTPCrypto'] = 'ssl';
		$email->initialize($config);

		$email->setSubject('SOLICITAÇÃO DE CONTRATAÇÃO APP');


		$NomeEmpresa = $this->request->getPost("NomeEmpresa");
		$formData["NomeEmpresa"] = $NomeEmpresa;
 


		
		
		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
		$message = view('mail/to_client_app', $formData);
		
		$email->setMessage($message);

		if(!$email->send()) {
			print_r($email->printDebugger());
		} else {

		}
		// var_dump($message);
		exit;
		// $emailConfirm->Subject = utf8_decode("AVISO DE SINISTRO CARRO");
		$emailConfirm->MsgHTML(utf8_decode($body2));
		$send2 = $emailConfirm->Send();

		$email = new PHPMailer();
		$email->IsSMTP();
		$email->Host = "br540.hostgator.com.br";
		$email->SMTPAuth = true;
		$email->SMTPSecure = "ssl";
		$email->Port = 465;
		$email->SetFrom('contato@brasilatuarial.com.br','Contato');
		$email->Username = "contato@brasilatuarial.com.br";
		$email->Password = "contato@2015";
		
		$query = "select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='carro_reserva.php'";
		$result = mysqli_query($conexao, $query);
		while ($linha = mysqli_fetch_array($result)){
			$email->AddAddress($linha["Email"],$linha["Nome"]);
		}
		/*$email->AddAddress("enrico.neto@brasilatuarial.com.br","Enrico Neto");
		$email->AddAddress("cristiano.fernandes@brasilatuarial.com.br","Cristiano Fernandes");
		$email->AddAddress("gabriela.guimaraes@brasilatuarial.com.br","Gabriela Guimaraes");
		$email->AddAddress("julliano.vasconcelos@brasilatuarial.com.br","Julliano Vasconcelos");
		$email->AddAddress("mayra.mariz@brasilatuarial.com.br","Mayra Mariz");
		$email->AddAddress("stephany.duarte@brasilatuarial.com.br","Stephany Duarte");
		$email->AddAddress("nara.nunes@brasilatuarial.com.br","Nara Nunes");
		$email->AddAddress("isabela.duarte@brasilatuarial.com.br","Isabela Duarte");*/
		// if (isset($_FILES["SinistroEmpresa"]["name"])){
		// 	if ($_FILES["SinistroEmpresa"]["name"] != ""){
		// 		$email->AddAttachment($_FILES["SinistroEmpresa"]["tmp_name"],$SinistroEmpresa);
		// 		$email->AddAttachment($_FILES["BoletimOcorrencia"]["tmp_name"],$BoletimOcorrencia);
		// 		$email->AddAttachment($_FILES["CRLVVeiculo"]["tmp_name"],$CRLVVeiculo);
		// 		$email->AddAttachment($_FILES["CHNCliente"]["tmp_name"],$CHNCliente);
		// 		$email->AddAttachment($_FILES["AutorizacaoReparo"]["tmp_name"],$AutorizacaoReparo);
		// 	}
		// }

		$email->Subject = utf8_decode("AVISO DE SINISTRO CARRO");	
		$email->MsgHTML(utf8_decode($body));
		$send = $email->Send();
		
		// if (isset($_FILES["SinistroEmpresa"]["name"])){
		// 	if ($_FILES["SinistroEmpresa"]["name"] != ""){
		// 		move_uploaded_file($_FILES["SinistroEmpresa"]["tmp_name"],"arquivos/".$id.$SinistroEmpresa);
		// 		move_uploaded_file($_FILES["BoletimOcorrencia"]["tmp_name"],"arquivos/".$id.$BoletimOcorrencia);
		// 		move_uploaded_file($_FILES["CRLVVeiculo"]["tmp_name"],"arquivos/".$id.$CRLVVeiculo);
		// 		move_uploaded_file($_FILES["CHNCliente"]["tmp_name"],"arquivos/".$id.$CHNCliente);
		// 		move_uploaded_file($_FILES["AutorizacaoReparo"]["tmp_name"],"arquivos/".$id.$AutorizacaoReparo);
		// 	}
		// }
	}

	public function sendCarroReserva() {
		// $request = \Config\Services::request();
		// var_dump($this->request->getFile("SinistroEmpresa"));
		$DataRetirada = $this->request->getVar("DataRetirada");
		// var_dump($DataRetirada);
		// exit;
		$vetorData = explode("/",$DataRetirada);
		$DataRetirada = $vetorData[2]."-".$vetorData[1]."-".$vetorData[0];
		$formData = [
			"IDEmpresa" => $this->request->getVar("IDEmpresa"),
			"SolicitanteEmpresa" => $this->request->getVar("SolicitanteEmpresa"),
			"TelefoneEmpresa" => $this->request->getVar("TelefoneEmpresa"),
			"EmailEmpresa" => $this->request->getVar("EmailEmpresa"),
			"Nome" => $this->request->getVar("Nome"),
			"CPF" => $this->request->getVar("CPF"),
			"Email" => $this->request->getVar("Email"),
			"Telefone" => $this->request->getVar("Telefone"),
			"TipoSolicitacao" => $this->request->getVar("TipoSolicitacao"),
			"Placa" => $this->request->getVar("Placa"),
			"Chassi" => $this->request->getVar("Chassi"),
			"CidadeRetirada" => $this->request->getVar("CidadeRetirada"),
			"EstadoRetirada" => $this->request->getVar("EstadoRetirada"),
			"DataRetirada" => $DataRetirada,
			"HoraRetirada" => $this->request->getVar("HoraRetirada"),
			"NomeResponsavelCartao" => $this->request->getVar("NomeResponsavelCartao"),
			"CPFResponsavelCartao" => $this->request->getVar("CPFResponsavelCartao"),
			"QuantidadeDeDiarias" => $this->request->getVar("QuantidadeDeDiarias"),
			"EnviarDados" => $this->request->getVar("EnviarDados"),
			"CEP" => $this->request->getVar("CEP"),
			"Logradouro" => $this->request->getVar("Logradouro"),
			"Bairro" => $this->request->getVar("Bairro"),
			"Cidade" => $this->request->getVar("Cidade"),
			"Estado" => $this->request->getVar("Estado"),
			"Numero" => $this->request->getVar("Numero"),
			"Complemento" => $this->request->getVar("Complemento"),
			"vetorData" => $this->request->getVar("vetorData"),
		];


		$SinistroEmpresa = "";
		$BoletimOcorrencia = "";
		$CRLVVeiculo = "";
		$CHNCliente = "";
		$AutorizacaoReparo = "";
		if ($this->request->getFile("SinistroEmpresa")->getName() !== null) {
			if ($this->request->getFile("SinistroEmpresa")->getName() != ""){
				$SinistroEmpresa = $this->request->getFile("SinistroEmpresa")->getName();
				$BoletimOcorrencia = $this->request->getFile("BoletimOcorrencia")->getName();
				$CRLVVeiculo = $this->request->getFile("CRLVVeiculo")->getName();
				$CHNCliente = $this->request->getFile("CHNCliente")->getName();
				$AutorizacaoReparo = $this->request->getFile("AutorizacaoReparo")->getName();
			}
		}
		// print_r($CRLVVeiculo);
		// exit;
		
		$db = \Config\Database::connect('atuarial');
		$query = "INSERT INTO carro_reserva (DataSolicitacao, IDEmpresa, SolicitanteEmpresa, TelefoneEmpresa, 
		EmailEmpresa, Nome, CPF, Email, Telefone, TipoSolicitacao, Placa, Chassi, QuantidadeDeDiarias, 
		EstadoRetirada, CidadeRetirada, DataRetirada, HoraRetirada, NomeResponsavelCartao, 
		CPFResponsavelCartao, CEP, Logradouro, Bairro, Cidade, Estado, Numero, Complemento) 
		values (CURRENT_DATE, " . 
		$formData['IDEmpresa'] . ",'" . 
		$formData['SolicitanteEmpresa'] . "','".
		$formData['TelefoneEmpresa'] . "','" .
		$formData['EmailEmpresa'] ."','" .
		$formData['Nome'] ."','". 
		$formData['CPF'] . "', '".
		$formData['Email'] ."','". 
		$formData['Telefone'] ."','" .
		$formData['TipoSolicitacao'] . "','" .
		$formData['Placa'] . "','" .
		$formData['Chassi'] . "','" .
		$formData['QuantidadeDeDiarias'] . "','" .
		$formData['EstadoRetirada'] . "','" .
		$formData['CidadeRetirada'] . "','" .
		$formData['DataRetirada'] . "','" .
		$formData['HoraRetirada'] . "','" .
		$formData['NomeResponsavelCartao'] . "','" .
		$formData['CPFResponsavelCartao'] . "','" .
		$formData['CEP'] . "','" .
		$formData['Logradouro'] . "','" .
		$formData['Bairro'] . "','" . 
		$formData['Cidade'] . "','" .
		$formData['Estado'] . "','" .
		$formData['Numero'] . "','" .
		$formData['Complemento'] . "')";
		// print_r($query);exit;
		$qry = $db->query($query);
        
		// $r = $db->query('select IDCodigo from carro_reserva order by IDCodigo desc limit 1');
		// $id = $r->getRowArray()["IDCodigo"];
		// print_r($id);exit;
		$id = $db->insertID();
		$query = "insert into carro_reserva_status (IDCarroReserva, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		$qry = $db->query($query);
        
		// $res = $qry->getResultArray();
		// print_r($res);exit;
		// mysqli_query($conexao, $query) or die($query);
		// $id = mysqli_insert_id($conexao);
		
		// mysqli_query($conexao, );
		// $this->request->getFile("SinistroEmpresa")->getName() !== null
		if ($this->request->getFile("SinistroEmpresa")->getName() !== null){
			if ($this->request->getFile("SinistroEmpresa")->getName() != ""){
				$query = "update carro_reserva set SinistroEmpresa='".$id.$SinistroEmpresa."', BoletimOcorrencia='".$id.$BoletimOcorrencia."', CRLVVeiculo='".$id.$CRLVVeiculo."', CHNCliente='".$id.$CHNCliente."', AutorizacaoReparo='".$id.$AutorizacaoReparo."' where IDCodigo=".$id;
				// $query = "insert into carro_reserva_status (IDCarroReserva, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
				$qry = $db->query($query);
				
				// $res = $qry->getResultArray();


				// mysqli_query($conexao, $query) or die($query);
			}
		}
		// print_r("eeeee");exit;


		$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['SMTPTimeout'] = '20';
		$config['protocol'] = 'smtp';
		// $config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = 'br540.hostgator.com.br';
		$config['SMTPUser'] = 'contato@brasilatuarial.com.br';
		$config['SMTPPass'] = 'contato@2015';
		$config['SMTPPort'] = '25';
		$config['SMTPCrypto'] = 'tsl';
		$email->initialize($config);

		$email->setSubject('AVISO DE SINISTRO CARRO');


		$NomeEmpresa = $this->request->getPost("NomeEmpresa");
		$formData["NomeEmpresa"] = $NomeEmpresa;
 


		
		// $body = "<b>Dados da Empresa</b><br>Empresa:" . $NomeEmpresa . "<br />Solicitante: ".$formData['SolicitanteEmpresa']. "<br />Telefone Solicitante: $TelefoneEmpresa<br />E-mail Solicitante: $EmailEmpresa<br /><br><b>Dados do Cliente</b><br>CPF Associado: $CPF<br />Nome Associado: $Nome<br />Email: $Email<br>Telefone: $Telefone<br><br>CEP: $CEP<br>Logradouro: $Logradouro<br>Bairro: $Bairro<br>Cidade: $Cidade<br>Estado: $Estado<br>Número: $Numero<br>Complemento: $Complemento<br><br><b>Dados da Solicitação</b><br>Placa: $Placa<br>Quantidade de Diarias: $QuantidadeDeDiarias<br>Estado Retirada: $EstadoRetirada<br>Cidade Retirada: $CidadeRetirada<br>Data Retirada: $DataRetirada<br>Hora Retirada: $HoraRetirada<br>Nome Responsavel Cartao: $NomeResponsavelCartao<br>CPF Responsavel Cartao: $CPFResponsavelCartao";
		
		// $body = strtoupper($body);
		// $body2 = "Prezado(a), <br><br>Sua solicitação foi realizada com sucesso. Em até 48 horas entraremos em contato para fazer a liberação do seu carro reserva!<br><br><a href='https://brasilatuarial.com.br/virtual_office/areaDoCliente.php'>Clique aqui</a> para acompanhar a sua socilitação em tempo real!";
		
		// require("class.phpmailer.php");
		// date_default_timezone_set('Brazil/East');
		
		// $emailConfirm = new PHPMailer();
		// $emailConfirm->IsSMTP();
		// $emailConfirm->Host = "br540.hostgator.com.br";
		// $emailConfirm->SMTPAuth = true;
		// $emailConfirm->SMTPSecure = "ssl";
		// $emailConfirm->Port = 465;
		// $emailConfirm->SetFrom('contato@brasilatuarial.com.br','Contato');
		// $emailConfirm->Username = "contato@brasilatuarial.com.br";
		// $emailConfirm->Password = "contato@2015";
		// $emailConfirm->AddAddress($Email,$Email);

		if ($this->request->getFile("SinistroEmpresa")->getName() !== null){
			if ($this->request->getFile("SinistroEmpresa")->getName() != ""){
				$email->attach($this->request->getFile("SinistroEmpresa")->getPathname(), "attachment", $SinistroEmpresa);
				$email->attach($this->request->getFile("BoletimOcorrencia")->getPathname(), "attachment", $BoletimOcorrencia);
				$email->attach($this->request->getFile("CRLVVeiculo")->getPathname(), "attachment", $CRLVVeiculo);
				$email->attach($this->request->getFile("CHNCliente")->getPathname(), "attachment", $CHNCliente);
				$email->attach($this->request->getFile("AutorizacaoReparo")->getPathname(), "attachment", $AutorizacaoReparo);
			}
		}

		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
		$message = view('mail/to_client', $formData);
		
		$email->setMessage($message);

		if(!$email->send()) {
			print_r($email->printDebugger());
		} else {

		}
		// var_dump($message);
		exit;
		// $emailConfirm->Subject = utf8_decode("AVISO DE SINISTRO CARRO");
		$emailConfirm->MsgHTML(utf8_decode($body2));
		$send2 = $emailConfirm->Send();

		$email = new PHPMailer();
		$email->IsSMTP();
		$email->Host = "br540.hostgator.com.br";
		$email->SMTPAuth = true;
		$email->SMTPSecure = "ssl";
		$email->Port = 465;
		$email->SetFrom('contato@brasilatuarial.com.br','Contato');
		$email->Username = "contato@brasilatuarial.com.br";
		$email->Password = "contato@2015";
		
		$query = "select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='carro_reserva.php'";
		$result = mysqli_query($conexao, $query);
		while ($linha = mysqli_fetch_array($result)){
			$email->AddAddress($linha["Email"],$linha["Nome"]);
		}
		/*$email->AddAddress("enrico.neto@brasilatuarial.com.br","Enrico Neto");
		$email->AddAddress("cristiano.fernandes@brasilatuarial.com.br","Cristiano Fernandes");
		$email->AddAddress("gabriela.guimaraes@brasilatuarial.com.br","Gabriela Guimaraes");
		$email->AddAddress("julliano.vasconcelos@brasilatuarial.com.br","Julliano Vasconcelos");
		$email->AddAddress("mayra.mariz@brasilatuarial.com.br","Mayra Mariz");
		$email->AddAddress("stephany.duarte@brasilatuarial.com.br","Stephany Duarte");
		$email->AddAddress("nara.nunes@brasilatuarial.com.br","Nara Nunes");
		$email->AddAddress("isabela.duarte@brasilatuarial.com.br","Isabela Duarte");*/
		if (isset($_FILES["SinistroEmpresa"]["name"])){
			if ($_FILES["SinistroEmpresa"]["name"] != ""){
				$email->AddAttachment($_FILES["SinistroEmpresa"]["tmp_name"],$SinistroEmpresa);
				$email->AddAttachment($_FILES["BoletimOcorrencia"]["tmp_name"],$BoletimOcorrencia);
				$email->AddAttachment($_FILES["CRLVVeiculo"]["tmp_name"],$CRLVVeiculo);
				$email->AddAttachment($_FILES["CHNCliente"]["tmp_name"],$CHNCliente);
				$email->AddAttachment($_FILES["AutorizacaoReparo"]["tmp_name"],$AutorizacaoReparo);
			}
		}

		$email->Subject = utf8_decode("AVISO DE SINISTRO CARRO");	
		$email->MsgHTML(utf8_decode($body));
		$send = $email->Send();
		
		if (isset($_FILES["SinistroEmpresa"]["name"])){
			if ($_FILES["SinistroEmpresa"]["name"] != ""){
				move_uploaded_file($_FILES["SinistroEmpresa"]["tmp_name"],"arquivos/".$id.$SinistroEmpresa);
				move_uploaded_file($_FILES["BoletimOcorrencia"]["tmp_name"],"arquivos/".$id.$BoletimOcorrencia);
				move_uploaded_file($_FILES["CRLVVeiculo"]["tmp_name"],"arquivos/".$id.$CRLVVeiculo);
				move_uploaded_file($_FILES["CHNCliente"]["tmp_name"],"arquivos/".$id.$CHNCliente);
				move_uploaded_file($_FILES["AutorizacaoReparo"]["tmp_name"],"arquivos/".$id.$AutorizacaoReparo);
			}
		}
	}



	public function pagina($pagina)
	{
		$data['pagina'] = $pagina;
		$data['main_menu'] = $this->main_menu;
		return view('layout', $data );
	}

	public function index()
	{
		// print_r($this->main_menu);exit;

		$postsModel = model('App\Models\PostsModel');

		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();

		
		$postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		->from("posts as p", true)
		->join('post_categories as pc', 'pc.pid = p.id', 'left')
		->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1);
		// if($cat !== null ) {
		// 	$postsModel->where('c.slug', $cat);
		// } 
		$posts = $postsModel
		->groupBy('p.id')
		->orderBy('p.created_at', 'DESC')
		// ->getCompiledSelect();
		
		->limit(2)->get()->getResultArray();
		// echo "<pre>";
		// print_r($posts);
		// echo "</pre>";
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}

		foreach ($posts as $k => $p) {
			if(!isset($posts[$k]["categorias"])) {
				$posts[$k]["categorias"] = [];
			}
			// $p["categoriass"][$]
			// var_dump($p['sel_categorias']);
			if (!empty($p['sel_categorias'])) {
				$pCategs = explode(", ", $p['sel_categorias']);
				foreach($pCategs as $pc) {
					// echo $pc . "<br>";
					$posts[$k]["categorias"][$pc] = $catList[$pc];
				}
			}
			
			// print_r($categs);
			// echo "<pre>";
			// print_r($pCategs); 
			// echo "</pre>";
			
		}
		// echo "<pre>";
		// print_r($posts);
		// echo "</pre>";
		return view('home', ['main_menu' => $this->main_menu, "lastPosts" => $posts]);
	}

	public function about()
	{
		return view('about', ['main_menu' => $this->main_menu]);
	}

	public function faq()
	{
		return view('faq', ['main_menu' => $this->main_menu]);
	}

	public function Pet()
	{
		
		$db = \Config\Database::connect('atuarialAlt');
		// $cod = $_POST["cod"];
		// $query = "SELECT * FROM modeloCarro where codMontadora = ".$cod;
		// $sql = mysqli_query($db, $query);
		// while ($linha=mysqli_fetch_array($sql)){
		// 	echo utf8_encode($linha["modeloCarro"])."|";
		// }

		
		// $cod = $this->request->getPost("cod");

		$query = $db->query("SELECT * FROM montadora");
        
		$montadoras = $query->getResultArray();
		
		foreach($montadoras as $i=> $m) {
			$montadoras[$i]["montadora"] = utf8_decode($m["montadora"]);
			// $responses .=  utf8_encode($m["modeloCarro"]). "|";
		}
		// print_r($montadoras);exit;
		return view('ac-pet', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
	}

	public function Vidros()
	{
		
		$db = \Config\Database::connect('atuarialAlt');
		// $cod = $_POST["cod"];
		// $query = "SELECT * FROM modeloCarro where codMontadora = ".$cod;
		// $sql = mysqli_query($db, $query);
		// while ($linha=mysqli_fetch_array($sql)){
		// 	echo utf8_encode($linha["modeloCarro"])."|";
		// }

		
		// $cod = $this->request->getPost("cod");

		$query = $db->query("SELECT * FROM montadora");
        
		$montadoras = $query->getResultArray();
		
		foreach($montadoras as $i=> $m) {
			$montadoras[$i]["montadora"] = utf8_decode($m["montadora"]);
			// $responses .=  utf8_encode($m["modeloCarro"]). "|";
		}
		// print_r($montadoras);exit;
		return view('vidros', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
	}

	public function Funeral()
	{
		
		$db = \Config\Database::connect('atuarialAlt');
		// $cod = $_POST["cod"];
		// $query = "SELECT * FROM modeloCarro where codMontadora = ".$cod;
		// $sql = mysqli_query($db, $query);
		// while ($linha=mysqli_fetch_array($sql)){
		// 	echo utf8_encode($linha["modeloCarro"])."|";
		// }

		
		// $cod = $this->request->getPost("cod");

		$query = $db->query("SELECT * FROM montadora");
        
		$montadoras = $query->getResultArray();
		
		foreach($montadoras as $i=> $m) {
			$montadoras[$i]["montadora"] = utf8_decode($m["montadora"]);
			// $responses .=  utf8_encode($m["modeloCarro"]). "|";
		}
		// print_r($montadoras);exit;
		return view('ac-funeral', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
	}

	public function App()
	{
		
		$db = \Config\Database::connect('atuarialAlt');
		// $cod = $_POST["cod"];
		// $query = "SELECT * FROM modeloCarro where codMontadora = ".$cod;
		// $sql = mysqli_query($db, $query);
		// while ($linha=mysqli_fetch_array($sql)){
		// 	echo utf8_encode($linha["modeloCarro"])."|";
		// }

		
		// $cod = $this->request->getPost("cod");

		$query = $db->query("SELECT * FROM montadora");
        
		$montadoras = $query->getResultArray();
		
		foreach($montadoras as $i=> $m) {
			$montadoras[$i]["montadora"] = utf8_decode($m["montadora"]);
			// $responses .=  utf8_encode($m["modeloCarro"]). "|";
		}
		// print_r($montadoras);exit;
		return view('app', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
	}

	public function carroReserva()
	{
		return view('carro-reserva', ['main_menu' => $this->main_menu]);
	}

	public function areaCliente()
	{
		return view('area-cliente', ['main_menu' => $this->main_menu]);
	}

	public function servicos($serv_slug = null, $content_slug = null)
	{
		if(!empty($content_slug)) {
			echo "Content";exit;
		}
		if(!empty($serv_slug)) {
			$content = json_decode(file_get_contents(FCPATH .'content/content-servicos.json'), true);
			if(isset($content[$serv_slug])) {
				$sContent = $content[$serv_slug];
			} else { throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); }
		} else { throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); }
		
		return view('services', ['main_menu' => $this->main_menu, 'cont' => $sContent]);
	}

	public function contact()
	{
		// $formData = [
		// 	"mensagem" => "Marcelo testando",
		// 	"nome" => "Marcelo",
		// 	"email" => "marcelo@..."
		// ];
		// return view('mail/contato', $formData);
		if ($this->request->isAJAX()) {
			// return json_encode(["method" => $this->request->getMethod() ]);
			$email = \Config\Services::email();

			// $config['protocol'] = 'sendmail';
			// $config['mailPath'] = '/usr/sbin/sendmail';
			// $config['charset']  = 'iso-8859-1';
			$config['mailType'] = 'html';

			$email->initialize($config);

			$email->setFrom('contato@brasilatuarial.com.br', 'Formulário Site');
			$email->setTo('enrico.neto@brasilatuarial.com.br', "Enrico Neto");
			$email->setCC('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
			// $email->setBCC('them@their-example.com');
			// $email->mailType('html');

			$email->setSubject('Nova mensagem | Contato Brasil Atuarial');
			$formData = [
				"mensagem" => $this->request->getPost("message"),
				"nome" => $this->request->getPost("name"),
				"email" => $this->request->getPost("email")
			];
			$message = view('mail/contato', $formData);
			// var_dump($message);exit;

			$email->setMessage($message);

			$email->send();
            return json_encode(["ajax"=>TRUE]);
        } else {
			// return json_encode(["method" => $this->request->getMethod() ]);
			return view('contact', ['main_menu' => $this->main_menu] );
		}
	}

	public function courses()
	{
		return view('courses', ['main_menu' => $this->main_menu] );
	}

	public function solutions()
	{
		return view('solutions', ['main_menu' => $this->main_menu] );
	}
	public function dygo()
	{
		return view('dygo', ['main_menu' => $this->main_menu] );
	}

	public function find($q = null)
	{
		
		// print_r($cat);
		// exit;

		// $pager = \Config\Services::pager();
		// helper("slugurl");
		// helper("monthficator");
		// Create a shared instance of the model
		$postsModel = model('App\Models\PostsModel');
		// $p = $postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		// ->from("posts as p", true)
		// ->join('post_categories as pc', 'pc.pid = p.id', 'left')
		// ->join('categories as c', 'c.id = pc.cid', 'left')
		// ->join('images as i', 'i.owner_id = p.id', 'left')
		// ->where('p.status', 1)
		// ->groupBy('p.id')
		// // ->getCompiledSelect();
		// ->paginate(10);
		// ->get();
		// echo "<pre>";
		// print_r($p);
		// echo "</pre>";exit;
		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
		
		// $query = $db->query('select p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes from posts p left join post_categories as pc on pc.pid = p.id left join categories as c on c.id = pc.cid left join images as i on i.owner_id = p.id where status = 1 group by p.id');
        // , GROUP_CONCAT(c.category SEPARATOR ", ") as categorias
		// $$query->getResultArray());
        // $posts = $query->getResultArray();
		$postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		->from("posts as p", true)
		->join('post_categories as pc', 'pc.pid = p.id', 'left')
		->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1);
		if($q !== null ) {
			$postsModel->like('p.post_title', $q, "%")
			->orLike('p.post_content', $q, "%");
		} 
		$posts = $postsModel
		->groupBy('p.id')
		// ->getCompiledSelect();
		->paginate(5, false);
		// $selCategorias = explode(", ", $posts[0]["sel_categorias"]);
        
        // $OrderedCats = [];
        // $toEnd = [];
        // foreach($cats as $c) {
        //     // echo "<pre>";
        //     // print_r($c['id']);
        //     // echo "</pre>";
        //     if(in_array($c['id'], $selCategorias)) {
        //         $OrderedCats[] = $c;
        //     } else {
        //         $toEnd[] = $c;
        //     }
        // }
        // $OrderedCats = array_merge($OrderedCats, $toEnd);
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}
        // echo "<pre>";
        // print_r($cats);
        // // print_r($OrderedCats);
        // echo "</pre>"; exit;
		
		foreach ($posts as $k => $p) {
			if(!isset($posts[$k]["categorias"])) {
				$posts[$k]["categorias"] = [];
			}
			// $p["categoriass"][$]
			// var_dump($p['sel_categorias']);
			if (!empty($p['sel_categorias'])) {
				$pCategs = explode(", ", $p['sel_categorias']);
				foreach($pCategs as $pc) {
					// echo $pc . "<br>";
					$posts[$k]["categorias"][$pc] = $catList[$pc];
				}
			}
			
			// print_r($categs);
			// echo "<pre>";
			// print_r($pCategs); 
			// echo "</pre>";
			
		}

		
		$postsModel = model('App\Models\PostsModel');
		$lastPosts = $postsModel->select('p.id as id, p.post_title, p.created_at as created, p.updated_at as updated, i.image_path as imagem', false)
		->from("posts as p", true)

		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1)
		
		->limit(5)->get()->getResultArray();
		foreach($lastPosts as $k=> $p) {
			$lastPosts[$k]['teste'] = $this->dateToTimeConvert($p['created']);
		}
		return view('blog', ['main_menu' => $this->main_menu, 'query'=>$this->query, 'cats'=>$cats, "posts"=> $posts, 'pager' => $postsModel->pager, "lastPosts" => $lastPosts] );
	}

	public function blog($cat = null)
	{
		
		// print_r($cat);
		// exit;

		// $pager = \Config\Services::pager();
		// helper("slugurl");
		// helper("monthficator");
		// Create a shared instance of the model
		$postsModel = model('App\Models\PostsModel');
		// $p = $postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		// ->from("posts as p", true)
		// ->join('post_categories as pc', 'pc.pid = p.id', 'left')
		// ->join('categories as c', 'c.id = pc.cid', 'left')
		// ->join('images as i', 'i.owner_id = p.id', 'left')
		// ->where('p.status', 1)
		// ->groupBy('p.id')
		// // ->getCompiledSelect();
		// ->paginate(10);
		// ->get();
		// echo "<pre>";
		// print_r($p);
		// echo "</pre>";exit;
		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
		
		// $query = $db->query('select p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes from posts p left join post_categories as pc on pc.pid = p.id left join categories as c on c.id = pc.cid left join images as i on i.owner_id = p.id where status = 1 group by p.id');
        // , GROUP_CONCAT(c.category SEPARATOR ", ") as categorias
		// $$query->getResultArray());
        // $posts = $query->getResultArray();
		$postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		->from("posts as p", true)
		->join('post_categories as pc', 'pc.pid = p.id', 'left')
		->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1);
		if($cat !== null ) {
			$postsModel->where('c.slug', $cat);
		} 
		$posts = $postsModel
		->groupBy('p.id')
		// ->getCompiledSelect();
		->paginate(5, false);
		// $selCategorias = explode(", ", $posts[0]["sel_categorias"]);
        
        // $OrderedCats = [];
        // $toEnd = [];
        // foreach($cats as $c) {
        //     // echo "<pre>";
        //     // print_r($c['id']);
        //     // echo "</pre>";
        //     if(in_array($c['id'], $selCategorias)) {
        //         $OrderedCats[] = $c;
        //     } else {
        //         $toEnd[] = $c;
        //     }
        // }
        // $OrderedCats = array_merge($OrderedCats, $toEnd);
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}
        // echo "<pre>";
        // print_r($cats);
        // // print_r($OrderedCats);
        // echo "</pre>"; exit;
		
		foreach ($posts as $k => $p) {
			if(!isset($posts[$k]["categorias"])) {
				$posts[$k]["categorias"] = [];
			}
			// $p["categoriass"][$]
			// var_dump($p['sel_categorias']);
			if (!empty($p['sel_categorias'])) {
				$pCategs = explode(", ", $p['sel_categorias']);
				foreach($pCategs as $pc) {
					// echo $pc . "<br>";
					$posts[$k]["categorias"][$pc] = $catList[$pc];
				}
			}
			
			// print_r($categs);
			// echo "<pre>";
			// print_r($pCategs); 
			// echo "</pre>";
			
		}

		
		$postsModel = model('App\Models\PostsModel');
		$lastPosts = $postsModel->select('p.id as id, p.post_title, p.created_at as created, p.updated_at as updated, i.image_path as imagem', false)
		->from("posts as p", true)

		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1)
		
		->limit(5)->get()->getResultArray();
		foreach($lastPosts as $k=> $p) {
			$lastPosts[$k]['teste'] = $this->dateToTimeConvert($p['created']);
		}
		return view('blog', ['main_menu' => $this->main_menu, 'cats'=>$cats, "posts"=> $posts, 'pager' => $postsModel->pager, "lastPosts" => $lastPosts] );
	}

	public function blogPost($slug)
	{
		// print_r($slug);exit;
		// helper("slugurl");
		// helper("monthficator");
		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
		$qry = 'select p.id as id, p.post_title, p.post_content, p.status, ';
		$qry .= 'DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, ';
		$qry .= 'DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, ';
		$qry .= 'GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, ';
		$qry .= 'DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes ';
		$qry .= 'from posts p left join post_categories as pc on pc.pid = p.id ';
		$qry .= 'left join categories as c on c.id = pc.cid ';
		$qry .= 'left join images as i on i.owner_id = p.id where status = 1 ';
		$qry .= 'AND p.slug = "'. $slug .'" group by p.id';

		$query = $db->query($qry);
        // , GROUP_CONCAT(c.category SEPARATOR ", ") as categorias
		// $$query->getResultArray());
        $post = $query->getRowArray();
		if (is_null($post))
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		// $selCategorias = explode(", ", $posts[0]["sel_categorias"]);
        // echo "<pre>";
		//  var_dump($post); 
		// echo "</pre>";exit;
        // $OrderedCats = [];
        // $toEnd = [];
        // foreach($cats as $c) {
        //     // echo "<pre>";
        //     // print_r($c['id']);
        //     // echo "</pre>";
        //     if(in_array($c['id'], $selCategorias)) {
        //         $OrderedCats[] = $c;
        //     } else {
        //         $toEnd[] = $c;
        //     }
        // }
        // $OrderedCats = array_merge($OrderedCats, $toEnd);
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}
        // echo "<pre>";
        // print_r($catList);
        // // print_r($OrderedCats);
        // echo "</pre>"; exit;

		if(!isset($post["categorias"])) {
			$post["categorias"] = [];
		}
		// $p["categoriass"][$]
		$pCategs = explode(", ", $post['sel_categorias']);
		// print_r($categs);
		// echo "<pre>";
		// print_r($pCategs); 
		// echo "</pre>";
		
		foreach($pCategs as $pc) {
			// echo $pc . "<br>";
			$post["categorias"][$pc] = $catList[$pc];
		}



		$postsModel = model('App\Models\PostsModel');
		$lastPosts = $postsModel->select('p.id as id, p.post_title, p.created_at as created, p.updated_at as updated, i.image_path as imagem', false)
		->from("posts as p", true)
		// ->join('post_categories as pc', 'pc.pid = p.id', 'left')
		// ->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		
		->where('p.status', 1)
		->whereNotIn('p.id', [$post["id"]])
		// ->getCompiledSelect();
		->limit(5)->get()->getResultArray();
		// $dt   = "2021-09-01 16:18:42";
		// // echo $dt;
		// // $this->dateToTimeConvert($dt);
		foreach($lastPosts as $k=> $p) {
			$lastPosts[$k]['teste'] = $this->dateToTimeConvert($p['created']);
		}
		// print_r($this->dateToTimeConvert($dt));
		
		// echo "<pre>";
		//  print_r($lastPosts); 
		// echo "</pre>";
		// exit;
		return view('blog_post', ['main_menu' => $this->main_menu, 'cats'=>$cats, "post"=> $post, "lastPosts"=>$lastPosts] );
	}
	public function dateToTimeConvert ($fulldate) {
		list($date, $time) = explode(" ", $fulldate);
		list($year, $month, $day) = explode("-", $date);
		list($hour, $minutes, $seconds) = explode(":", $time);
		$rtime = Time::create($year, $month, $day, $hour, $minutes, $seconds, 'America/Sao_Paulo', "pt_BR");
		return $rtime->humanize();
	}
}
