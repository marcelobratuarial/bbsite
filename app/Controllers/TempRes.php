<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
class TempRes extends BaseController
{
	
	public function index() {
		return view("tempRes/index");
	}
	public function find() {
		// print_r($this->request->getVar("q"));exit;
		$db = \Config\Database::connect('atuarial');
		$q = explode(" ",$this->request->getVar("q"));
		$qr = '';
		
		$fields = [
			"SolicitanteEmpresa",
			"EmailEmpresa",
			"Nome",
			"NomeResponsavelCartao",
			"CidadeRetirada",
			"Email",
			"Placa",
			"DataSolicitacao"
		];
		foreach($q as $k=>$qq){
			foreach($fields as $kk => $field) {
				$qr .= $field ." LIKE '%" . $db->escapeLikeString($qq) . "%' ";
				$nn = isset($fields[$kk+1]) ? $fields[$kk+1] : null;
				if( $nn ) {
					$qr .= " OR ";
				} 
			}
			$n = isset($q[$k+1]) ? $q[$k+1] : null;
			if( $n ) {
				$qr .= " OR ";
			} 
		}
		$fullQry = 'SELECT * FROM carro_reserva where ';
		$fullQry .= $qr;
		// echo $fullQry;exit;
		$query = $db->query($fullQry);
		$result = $query->getResultArray();
        // if($query->getNumRows() > 0) {
		// // 	$res = $query->getResultArray()[0];
		// // 	$responses = $res["IDCodigo"]."|".$res["RazaoSocial"]."|".$res["PessoaContato"]."|".$res["Telefone"]."|".$res["Email"]."|".$res["Refaturado"];
		// } else {$responses = 0; }
		// echo "<pre>";
		// print_r($result);
		// echo $responses;
		return view("TempRes/index", compact("result", "fields"));
	}
	public function open($id) {
		// print_r($this->request->getVar("q"));exit;
		$db = \Config\Database::connect('atuarial');
		// $q = explode(" ",$this->request->getVar("q"));
		
		$fullQry = 'SELECT * FROM carro_reserva where IDCodigo = ?';
		
		$query = $db->query($fullQry, $id);
		$result = $query->getRowArray();
        // if($query->getNumRows() > 0) {
		// // 	$res = $query->getResultArray()[0];
		// // 	$responses = $res["IDCodigo"]."|".$res["RazaoSocial"]."|".$res["PessoaContato"]."|".$res["Telefone"]."|".$res["Email"]."|".$res["Refaturado"];
		// } else {$responses = 0; }
		// echo "<pre>";
		// print_r($result);
		// echo $responses;
		return view("TempRes/open", compact("result"));
	}


	public function sendCarroReserva() {
		
		// $qry = $db->query($query, $dataToSave);
        // $id = $db->insertID();
		// $query = "insert into carro_reserva_status (IDCarroReserva, DataHora, NovoStatus) values (".$id.", NOW(), 'SOLICITACAO RECEBIDA')";
		// $qry = $db->query($query);
        
		
		
		exit;
	}

}
