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
		// $db = \Config\Database::connect('atuarial');
		// $query = $db->query("select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='app.php'");
        
		// $res = $query->getResultArray();



		// $team_mails = [];
		// foreach($res as $i=>$v){
		// 	// print_r($i);
		// 	// print_r($v);
		// 	$team_mails[] = $v["Email"];
		// }
		// print_r($team_mails);
		// echo json_encode($res);exit;

		// throw new \Exception("0 (zero)");
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
		$config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = $_SERVER['SMTP_HOST'];
		$config['SMTPUser'] = $_SERVER['SMTP_USER'];
		$config['SMTPPass'] = $_SERVER['SMTP_PASS'];
		$config['SMTPPort'] = $_SERVER['SMTP_PORT'];
		$config['SMTPCrypto'] = $_SERVER['SMTP_CRYPTO'];
		$email->initialize($config);

		$email->setSubject('SOLICITAÇÃO DE CONTRATAÇÃO APP');
		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
		

		$query = $db->query("select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='app.php'");
		$res = $query->getResultArray();
		
		if(count($res) > 0) {
			$team_mails = [];
			foreach($res as $i=>$v){
				$team_mails[] = $v["Email"];
			}
			$team_mails = implode(', ', $team_mails);
			$email->setCC($team_mails);
		}


		$message = view('area-cliente/mail/to_team_app', $formData);
		
		$email->setMessage($message);

		try {
			$s = $email->send();
			if($s) {
				echo json_encode(["message" => "success", "error" => false]);
				
				$email->clear();
				$email->setSubject('CONFIRMAÇÃO DE SOLICITAÇÃO DE CONTRATAÇÃO APP');
				$email->setFrom('contato@brasilatuarial.com.br', "Site");
				$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
				$message = view('area-cliente/mail/to_client_app', $formData);
				
				$email->setMessage($message);

				$s = $email->send();
				
			} else {
				throw new \Exception("Não enviado: MAIL TEAM: " . $email->printDebugger());
			}
			
		} catch (\Exception $e) {
			echo json_encode(['message'=>$e->getMessage(), 'error' => true]);
		}
		exit;
		
	}

	public function sendCarroReserva() {
		// throw new \Exception("0 (zero)");
		// $request = \Config\Services::request();
		// var_dump($this->request->getFile("SinistroEmpresa"));
		$DataRetirada = $this->request->getVar("DataRetirada");
		// var_dump($DataRetirada);
		// exit;
		$vetorData = explode("/",$DataRetirada);
		$DataRetirada = $vetorData[2]."-".$vetorData[1]."-".$vetorData[0];
		$formData = [
			"IDEmpresa" => $this->request->getVar("IDEmpresa"),
			"NomeEmpresa" => $this->request->getPost("NomeEmpresa"),
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
				$SinistroEmpresa = "SinistroEmpresa";// $this->request->getFile("SinistroEmpresa")->getName();
				$BoletimOcorrencia = "BoletimOcorrencia"; //$this->request->getFile("BoletimOcorrencia")->getName();
				$CRLVVeiculo = "CRLVVeiculo"; // $this->request->getFile("CRLVVeiculo")->getName();
				$CHNCliente = "CHNCliente"; // $this->request->getFile("CHNCliente")->getName();
				$AutorizacaoReparo = "AutorizacaoReparo"; //$this->request->getFile("AutorizacaoReparo")->getName();
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
		
		// $qry = $db->query($query);
        // $id = $db->insertID();
		// $query = "insert into carro_reserva_status (IDCarroReserva, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		// $qry = $db->query($query);
        
		if ($this->request->getFile("SinistroEmpresa")->getName() !== null){
			if ($this->request->getFile("SinistroEmpresa")->getName() != ""){
				// $query = "update carro_reserva set SinistroEmpresa='".$id.$SinistroEmpresa."', BoletimOcorrencia='".$id.$BoletimOcorrencia."', CRLVVeiculo='".$id.$CRLVVeiculo."', CHNCliente='".$id.$CHNCliente."', AutorizacaoReparo='".$id.$AutorizacaoReparo."' where IDCodigo=".$id;
				// $qry = $db->query($query);
				
			}
		}


		$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['SMTPTimeout'] = '20';
		$config['protocol'] = 'smtp';
		// $config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = $_SERVER['SMTP_HOST'];
		$config['SMTPUser'] = $_SERVER['SMTP_USER'];
		$config['SMTPPass'] = $_SERVER['SMTP_PASS'];
		$config['SMTPPort'] = $_SERVER['SMTP_PORT'];
		$config['SMTPCrypto'] = $_SERVER['SMTP_CRYPTO'];
		$email->initialize($config);

		$email->setSubject('AVISO DE SINISTRO CARRO');
		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");

		$query = $db->query("select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='carro_reserva.php'");
		$res = $query->getResultArray();
		
		if(count($res) > 0) {
			$team_mails = [];
			foreach($res as $i=>$v){
				$team_mails[] = $v["Email"];
			}
			$team_mails = implode(', ', $team_mails);
			$email->setCC($team_mails);
		}

		$message = view('area-cliente/mail/to_team_carro_reserva', $formData);
		
		$email->setMessage($message);
		
		if(!isset($id)) { $id = time() ; }
		
		// if ($this->request->getFile("SinistroEmpresa")->getName() !== null) {
		if ($this->request->getFile("SinistroEmpresa")->getName() != ""){
			$ext = $this->request->getFile("SinistroEmpresa")->getExtension();
			$newName = $id . "-".$SinistroEmpresa.".".$ext;
			$email->attach($this->request->getFile("SinistroEmpresa")->getPathname(), "attachment", $newName);
			$this->request->getFile("SinistroEmpresa")->move(WRITEPATH.'uploads/virtual-office/carro-reserva', $newName);
		}
		if ($this->request->getFile("BoletimOcorrencia")->getName() != ""){
			$ext = $this->request->getFile("BoletimOcorrencia")->getExtension();
			$newName = $id . "-".$BoletimOcorrencia.".".$ext;
			$email->attach($this->request->getFile("BoletimOcorrencia")->getPathname(), "attachment", $newName);
			$this->request->getFile("BoletimOcorrencia")->move(WRITEPATH.'uploads/virtual-office/carro-reserva', $newName);
		}	
		if ($this->request->getFile("CRLVVeiculo")->getName() != ""){
			$ext = $this->request->getFile("CRLVVeiculo")->getExtension();
			$newName = $id . "-".$CRLVVeiculo.".".$ext;
			$email->attach($this->request->getFile("CRLVVeiculo")->getPathname(), "attachment", $newName);
			$this->request->getFile("CRLVVeiculo")->move(WRITEPATH.'uploads/virtual-office/carro-reserva', $newName);
		}
		if ($this->request->getFile("CHNCliente")->getName() != ""){
			$ext = $this->request->getFile("CHNCliente")->getExtension();
			$newName = $id . "-".$CHNCliente.".".$ext;
			$email->attach($this->request->getFile("CHNCliente")->getPathname(), "attachment", $newName);
			$this->request->getFile("CHNCliente")->move(WRITEPATH.'uploads/virtual-office/carro-reserva', $newName);
			
		}
		if ($this->request->getFile("AutorizacaoReparo")->getName() != ""){
			$ext = $this->request->getFile("AutorizacaoReparo")->getExtension();
			$newName = $id . "-".$AutorizacaoReparo.".".$ext;
			$email->attach($this->request->getFile("AutorizacaoReparo")->getPathname(), "attachment", $newName);
			$this->request->getFile("AutorizacaoReparo")->move(WRITEPATH.'uploads/virtual-office/carro-reserva', $newName);
		}
		// }

		try {
			$s = $email->send();
			if($s) {
				echo json_encode(["message" => "success", "error" => false]);
				
				$email->clear();
				$email->setSubject('CONFIRMAÇÃO AVISO DE SINISTRO CARRO');
				$email->setFrom('contato@brasilatuarial.com.br', "Site");
				$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
				$message = view('area-cliente/mail/to_client_carro_reserva', $formData);
				
				$email->setMessage($message);

				$s = $email->send();
				
			} else {
				throw new \Exception("Não enviado: MAIL TEAM");
			}
			
		} catch (\Exception $e) {
			echo json_encode(['message'=>$e->getMessage(), 'error' => true]);
		}
		exit;
	}

	public function sendFuneral() {
		// throw new \Exception("0 (zero)");
		// $request = \Config\Services::request();
		// var_dump($this->request->getFile("SinistroEmpresa"));
		// $DataRetirada = $this->request->getVar("DataRetirada");
		// var_dump($DataRetirada);
		// exit;
		// $vetorData = explode("/",$DataRetirada);
		// $DataRetirada = $vetorData[2]."-".$vetorData[1]."-".$vetorData[0];
		$formData = [
			"IDEmpresa" => $this->request->getVar("IDEmpresa"),
			"SolicitanteEmpresa" => $this->request->getVar("SolicitanteEmpresa"),
			"TelefoneEmpresa" => $this->request->getVar("TelefoneEmpresa"),
			"EmailEmpresa" => $this->request->getVar("EmailEmpresa"),
			"NomeEmpresa" => $this->request->getPost("NomeEmpresa"),
			"Nome" => $this->request->getVar("Nome"),
			"CPF" => $this->request->getVar("CPF"),
			"Email" => $this->request->getVar("Email"),
			"Telefone" => $this->request->getVar("Telefone"),
			"Tipo" => $this->request->getVar("Tipo"),
			"CapitalSegurado" => $this->request->getVar("CapitalSegurado")
		];


		// $SinistroEmpresa = "";
		// $BoletimOcorrencia = "";
		// $CRLVVeiculo = "";
		// $CHNCliente = "";
		// $AutorizacaoReparo = "";
		// if ($this->request->getFile("Anexo1")->getName() !== null) {
		if ($this->request->getFile("Anexo1")->getName() != ""){
			$anexo1 = "AtestadoDeObito"; // $this->request->getFile("Anexo1")->getName();
		}
		if ($this->request->getFile("Anexo2")->getName() != ""){
			$anexo2 = "RGeCPFBeneficiario"; //$this->request->getFile("Anexo2")->getName();
		}
		if ($this->request->getFile("Anexo3")->getName() != ""){
			$anexo3 = "RGeCPFTitular"; //$this->request->getFile("Anexo3")->getName();
		}
		if ($this->request->getFile("Anexo4")->getName() != ""){
			$anexo4 = "ComprovanteBancarioDeposito"; //$this->request->getFile("Anexo4")->getName();
		}
		if ($this->request->getFile("Anexo5")->getName() != ""){
			$anexo5 = "NotaFiscal"; //$this->request->getFile("Anexo5")->getName();
		}
		// }
		// print_r($CRLVVeiculo);
		// exit;
		
		$db = \Config\Database::connect('atuarial');
		$query = "INSERT INTO funeral (DataSolicitacao, IDEmpresa, SolicitanteEmpresa, TelefoneEmpresa, 
		EmailEmpresa, Nome, Email, CPF, Telefone, Tipo, CapitalSegurado) 
		values (CURRENT_DATE, " . 
		$formData['IDEmpresa'] . ",'" . 
		$formData['SolicitanteEmpresa'] . "','".
		$formData['TelefoneEmpresa'] . "','" .
		$formData['EmailEmpresa'] ."','" .
		$formData['Nome'] ."','". 
		$formData['Email'] ."','". 
		$formData['CPF'] . "', '".
		$formData['Telefone'] ."','" .
		$formData['Tipo'] . "','" .
		$formData['CapitalSegurado'] . "')";
		
		// $qry = $db->query($query);
        // $id = $db->insertID();
		// $query = "insert into funeral_status (IDFuneral, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		// $qry = $db->query($query);
        
		if ($this->request->getFile("Anexo1")->getName() !== null){
			if ($this->request->getFile("Anexo1")->getName() != ""){
				// $query = "update funeral set AtestadoObito='".$id.$anexo1."', CPFeRGBeneficiario='".$id.$anexo2."', CPFeRGTitular='".$id.$anexo3."', ComprovanteBancario='".$id.$anexo4."', NotaFiscal='".$id.$anexo5."' where IDCodigo=".$id;
				// $qry = $db->query($query);
				
			}
		}


		$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['SMTPTimeout'] = '20';
		$config['protocol'] = 'smtp';
		// $config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = $_SERVER['SMTP_HOST'];
		$config['SMTPUser'] = $_SERVER['SMTP_USER'];
		$config['SMTPPass'] = $_SERVER['SMTP_PASS'];
		$config['SMTPPort'] = $_SERVER['SMTP_PORT'];
		$config['SMTPCrypto'] = $_SERVER['SMTP_CRYPTO'];
		$email->initialize($config);

		$email->setSubject('AVISO DE ACIONAMENTO FUNERAL');
		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");

		$query = $db->query("select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='funeral.php'");
		$res = $query->getResultArray();
		
		if(count($res) > 0) {
			$team_mails = [];
			foreach($res as $i=>$v){
				$team_mails[] = $v["Email"];
			}
			$team_mails = implode(', ', $team_mails);
			$email->setCC($team_mails);
		}

		$message = view('area-cliente/mail/to_team_funeral', $formData);
		
		$email->setMessage($message);
		
		if(!isset($id)) { $id = time() ; }

		if ($this->request->getFile("Anexo1")->getName() != ""){
			$ext = $this->request->getFile("Anexo1")->getExtension();
			$newName = $id . "-".$anexo1.".".$ext;
			$email->attach($this->request->getFile("Anexo1")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo1")->move(WRITEPATH.'uploads/virtual-office/funeral', $newName);
		}
		if ($this->request->getFile("Anexo2")->getName() != ""){
			$ext = $this->request->getFile("Anexo2")->getExtension();
			$newName = $id . "-".$anexo2.".".$ext;
			$email->attach($this->request->getFile("Anexo2")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo2")->move(WRITEPATH.'uploads/virtual-office/funeral', $newName);
		}
		if ($this->request->getFile("Anexo3")->getName() != ""){
			$ext = $this->request->getFile("Anexo3")->getExtension();
			$newName = $id . "-".$anexo3.".".$ext;
			$email->attach($this->request->getFile("Anexo3")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo3")->move(WRITEPATH.'uploads/virtual-office/funeral', $newName);
		}
		if ($this->request->getFile("Anexo4")->getName() != ""){
			$ext = $this->request->getFile("Anexo4")->getExtension();
			$newName = $id . "-".$anexo4.".".$ext;
			$email->attach($this->request->getFile("Anexo4")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo4")->move(WRITEPATH.'uploads/virtual-office/funeral', $newName);
		}
		if ($this->request->getFile("Anexo5")->getName() != ""){
			$ext = $this->request->getFile("Anexo5")->getExtension();
			$newName = $id . "-".$anexo5.".".$ext;
			$email->attach($this->request->getFile("Anexo5")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo5")->move(WRITEPATH.'uploads/virtual-office/funeral', $newName);
		}


		try {
			$s = $email->send();
			if($s) {
				echo json_encode(["message" => "success", "error" => false]);
				
				$email->clear();
				$email->setSubject('CONFIRMAÇÃO AVISO DE ACIONAMENTO FUNERAL');
				$email->setFrom('contato@brasilatuarial.com.br', "Site");
				$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
				$message = view('area-cliente/mail/to_client_funeral', $formData);
				
				$email->setMessage($message);

				$s = $email->send();
				
			} else {
				throw new \Exception("Não enviado: MAIL TEAM");
			}
			
		} catch (\Exception $e) {
			echo json_encode(['message'=>$e->getMessage(), 'error' => true]);
		}
		exit;
	}

	public function sendVidros() {
		// throw new \Exception("0 (zero)");
		// $request = \Config\Services::request();
		// var_dump($this->request->getFile("SinistroEmpresa"));
		// $DataRetirada = $this->request->getVar("DataRetirada");
		// var_dump($DataRetirada);
		// exit;
		// $vetorData = explode("/",$DataRetirada);
		// $DataRetirada = $vetorData[2]."-".$vetorData[1]."-".$vetorData[0];
		$formData = [
			"IDEmpresa" => $this->request->getVar("IDEmpresa"),
			"SolicitanteEmpresa" => $this->request->getVar("SolicitanteEmpresa"),
			"TelefoneEmpresa" => $this->request->getVar("TelefoneEmpresa"),
			"EmailEmpresa" => $this->request->getVar("EmailEmpresa"),
			"NomeEmpresa" => $this->request->getPost("NomeEmpresa"),
			
			"Nome" => $this->request->getVar("Nome"),
			"CPF" => $this->request->getVar("CPF"),
			"Email" => $this->request->getVar("Email"),
			"Telefone" => $this->request->getVar("Telefone"),

			"Placa" => $this->request->getVar("Placa"),
			"Chassi" => $this->request->getVar("Chassi"),
			"Tipo" => $this->request->getVar("Tipo"),
			"Fabricante" => $this->request->getVar("Fabricante"),
			"modelo" => $this->request->getVar("modelo"),
			"AnoFabricacao" => $this->request->getVar("AnoFabricacao"),
			"AnoModelo" => $this->request->getVar("AnoModelo"),
			"Cidade" => $this->request->getVar("Cidade"),
			"Estado" => $this->request->getVar("Estado"),
			"Peca" => $this->request->getVar("Peca"),
			"Sensor" => $this->request->getVar("Sensor"),
			"ModeloVidro" => $this->request->getVar("ModeloVidro"),
			"DescricaoSinistro" => $this->request->getVar("DescricaoSinistro")
		];


		$AvisoSinistro = "";
		$FotosVistoriaPrevia = "";
		$FotosVidroDanificado = "";

		// if ($this->request->getFile("Anexo1")->getName() !== null) {
		if ($this->request->getFile("Anexo1")->getName() != ""){
			$AvisoSinistro = "AvisoSinistro"; //$this->request->getFile("Anexo1")->getName();
		}
		if ($this->request->getFile("Anexo2")->getName() != ""){
			$FotosVistoriaPrevia = "FotosVistoriaPrevia"; //$this->request->getFile("Anexo2")->getName();
		}
		if ($this->request->getFile("Anexo3")->getName() != ""){
			$FotosVidroDanificado = "FotosVidroDanificado"; // $this->request->getFile("Anexo3")->getName();
		}
		// }
		// print_r($CRLVVeiculo);
		// exit;
		
		$db = \Config\Database::connect('atuarial');
		$query = "INSERT INTO vidro (DataSolicitacao, IDEmpresa, SolicitanteEmpresa,
		TelefoneEmpresa, EmailEmpresa, Nome, CPF, Email, Telefone, Placa, Chassi, Tipo, 
		Montadora, Modelo, AnoFabricacao, UF, Cidade, PecaDanificada, PossuiSensor, 
		ModeloVidro, DescricaoSinistro, AnoModelo) 
		values (CURRENT_DATE, " . 
		$formData['IDEmpresa'] . ",'" . 
		$formData['SolicitanteEmpresa'] . "','".
		$formData['TelefoneEmpresa'] . "','" .
		$formData['EmailEmpresa'] ."','" .
		$formData['Nome'] ."','". 
		$formData['CPF'] . "', '".
		$formData['Email'] ."','". 
		$formData['Telefone'] ."','" .
		$formData['Placa'] . "','" .
		$formData['Chassi'] . "','" .
		$formData['Fabricante'] . "','" .
		$formData['modelo'] . "','" .
		$formData['AnoFabricacao'] . "','" .
		$formData['Estado'] . "','" .
		$formData['Cidade'] . "','" .
		$formData['Peca'] . "','" .
		$formData['Sensor'] . "','" .
		$formData['ModeloVidro'] . "','" .
		$formData['DescricaoSinistro'] . "','" .
		$formData['AnoModelo'] . "')";
		
		// $qry = $db->query($query);
        // $id = $db->insertID();
		// $query = "insert into vidro_status (IDVidro, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		// $qry = $db->query($query);
        
		if ($this->request->getFile("Anexo1")->getName() !== null){
			if ($this->request->getFile("Anexo1")->getName() != ""){
				// $query = "update vidro set AvisoSinistro='".$id.$AvisoSinistro."', FotosVistoriaPrevia='".$id.$FotosVistoriaPrevia."', FotosVidroDanificado='".$id.$FotosVidroDanificado."' where IDCodigo=".$id;
				// $qry = $db->query($query);
				
			}
		}


		$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['SMTPTimeout'] = '20';
		$config['protocol'] = 'smtp';
		// $config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = $_SERVER['SMTP_HOST'];
		$config['SMTPUser'] = $_SERVER['SMTP_USER'];
		$config['SMTPPass'] = $_SERVER['SMTP_PASS'];
		$config['SMTPPort'] = $_SERVER['SMTP_PORT'];
		$config['SMTPCrypto'] = $_SERVER['SMTP_CRYPTO'];
		$email->initialize($config);

		$email->setSubject('AVISO DE SINISTRO VIDRO');
		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");

		
		$query = $db->query("select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='vidros.php'");
		$res = $query->getResultArray();
		
		if(count($res) > 0) {
			$team_mails = [];
			foreach($res as $i=>$v){
				$team_mails[] = $v["Email"];
			}
			$team_mails = implode(', ', $team_mails);
			$email->setCC($team_mails);
		}

		
		$message = view('area-cliente/mail/to_team_vidros', $formData);
		
		$email->setMessage($message);
		
		if(!isset($id)) { $id = time() ; }

		if ($this->request->getFile("Anexo1")->getName() != ""){
			$ext = $this->request->getFile("Anexo1")->getExtension();
			$newName = $id . "-".$AvisoSinistro.".".$ext;
			$email->attach($this->request->getFile("Anexo1")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo1")->move(WRITEPATH.'uploads/virtual-office/vidros', $newName);
		}
		if ($this->request->getFile("Anexo2")->getName() != ""){
			$ext = $this->request->getFile("Anexo2")->getExtension();
			$newName = $id . "-".$FotosVistoriaPrevia.".".$ext;
			$email->attach($this->request->getFile("Anexo2")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo2")->move(WRITEPATH.'uploads/virtual-office/vidros', $newName);
		}
		if ($this->request->getFile("Anexo3")->getName() != ""){
			$ext = $this->request->getFile("Anexo3")->getExtension();
			$newName = $id . "-".$FotosVidroDanificado.".".$ext;
			$email->attach($this->request->getFile("Anexo3")->getPathname(), "attachment", $newName);
			$this->request->getFile("Anexo3")->move(WRITEPATH.'uploads/virtual-office/vidros', $newName);
		}


		try {
			$s = $email->send();
			if($s) {
				echo json_encode(["message" => "success", "error" => false]);
				
				$email->clear();
				$email->setSubject('CONFIRMAÇÃO AVISO DE SINISTRO VIDRO');
				$email->setFrom('contato@brasilatuarial.com.br', "Site");
				$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
				$message = view('area-cliente/mail/to_client_vidros', $formData);
				
				$email->setMessage($message);

				$s = $email->send();
				
			} else {
				throw new \Exception("Não enviado: MAIL TEAM");
			}
			
		} catch (\Exception $e) {
			echo json_encode(['message'=>$e->getMessage(), 'error' => true]);
		}
		exit;
	}

	public function sendPet() {
		// throw new \Exception("0 (zero)");
		// $request = \Config\Services::request();
		// var_dump($this->request->getFile("SinistroEmpresa"));
		$DataNascimento = $this->request->getVar("DataNascimento");
		// var_dump($DataNascimento);
		// exit;
		$vetorData = explode("/",$DataNascimento);
		$DataNascimento = $vetorData[2]."-".$vetorData[1]."-".$vetorData[0];
		$formData = [
			"Nome" => $this->request->getVar("Nome"),
			"CPF" => $this->request->getVar("cpf"),
			"DataNascimento" => $DataNascimento,
			"Email" => $this->request->getVar("Email"),
			"Celular" => $this->request->getVar("Celular"),
			"CEP" => $this->request->getPost("cep"),
			"Logradouro" => $this->request->getVar("rua"),
			"Bairro" => $this->request->getVar("bairro"),
			"Estado" => $this->request->getVar("estado"),
			"Cidade" => $this->request->getVar("cidade"),
			"Numero" => $this->request->getVar("Numero"),
			"Complemento" => $this->request->getVar("Complemento"),
			"Plano" => $this->request->getVar("plano")
		];


		
		$db = \Config\Database::connect('atuarial');
		$query = "INSERT INTO pet (DataSolicitacao, Nome, CPF, 
		DataNascimento, Email, Celular, CEP, Logradouro, Bairro, 
		Estado, Cidade, Numero, Complemento, Plano, Arquivado) 
		values (CURRENT_DATE, " . 
		$formData['Nome'] . ",'" . 
		$formData['CPF'] . "','".
		$formData['DataNascimento'] . "','" .
		$formData['Email'] ."','" .
		$formData['Celular'] ."','". 
		$formData['CEP'] . "', '".
		$formData['Logradouro'] ."','". 
		$formData['Bairro'] ."','" .
		$formData['Estado'] . "','" .
		$formData['Cidade'] . "','" .
		$formData['Numero'] . "','" .
		$formData['Complemento'] . "','" .
		$formData['Plano'] . "',0)";
		
		// $qry = $db->query($query);
        // $id = $db->insertID();
		// $query = "insert into pet_status (IDPet, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		// $qry = $db->query($query);
        
		$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['SMTPTimeout'] = '20';
		$config['protocol'] = 'smtp';
		// $config['CRLF'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['SMTPHost'] = $_SERVER['SMTP_HOST'];
		$config['SMTPUser'] = $_SERVER['SMTP_USER'];
		$config['SMTPPass'] = $_SERVER['SMTP_PASS'];
		$config['SMTPPort'] = $_SERVER['SMTP_PORT'];
		$config['SMTPCrypto'] = $_SERVER['SMTP_CRYPTO'];
		$email->initialize($config);

		$email->setSubject('PEDIDO DE PET BRASIL ATUARIAL');
		$email->setFrom('contato@brasilatuarial.com.br', "Site");
		$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");

		
		$query = $db->query("select usuarios.Email, usuarios.Nome from usuarios_acessos inner join usuarios on usuarios.IDCodigo = usuarios_acessos.IDUsuario where Pagina='pet.php'");
		$res = $query->getResultArray();
		
		if(count($res) > 0) {
			$team_mails = [];
			foreach($res as $i=>$v){
				$team_mails[] = $v["Email"];
			}
			$team_mails = implode(', ', $team_mails);
			$email->setCC($team_mails);
		}


		$message = view('area-cliente/mail/to_team_pet', $formData);
		
		$email->setMessage($message);
		

		try {
			$s = $email->send();
			if($s) {
				echo json_encode(["message" => "success", "error" => false]);
				
				$email->clear();
				$email->setSubject('CONFIRMAÇÃO PEDIDO DE PET BRASIL ATUARIAL');
				$email->setFrom('contato@brasilatuarial.com.br', "Site");
				$email->setTo('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
				$message = view('area-cliente/mail/to_client_pet', $formData);
				
				$email->setMessage($message);

				$s = $email->send();
				
			} else {
				throw new \Exception("Não enviado: MAIL TEAM");
			}
			
		} catch (\Exception $e) {
			echo json_encode(['message'=>$e->getMessage(), 'error' => true]);
		}
		exit;
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
		return view('area-cliente/pet', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
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
		return view('area-cliente/vidros', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
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
		return view('area-cliente/funeral', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
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
		return view('area-cliente/app', ['main_menu' => $this->main_menu, "montadoras" => $montadoras]);
	}

	public function carroReserva()
	{
		return view('area-cliente/carro-reserva', ['main_menu' => $this->main_menu]);
	}

	public function areaCliente()
	{
		return view('area-cliente/index', ['main_menu' => $this->main_menu]);
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
