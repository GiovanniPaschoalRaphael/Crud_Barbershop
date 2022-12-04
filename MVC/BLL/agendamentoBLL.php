<?php
	require_once("../../DAL/agendamentoDAL.php");

	class agendamentoBLL{
		public function ConfAgend($obj){
			if($obj->getHorario()=="")
				return false;
			else if($obj->getComparece()=="")
				return false;
			else if($obj->getHistorico()=="")
				return false;
			else if($obj->getClienteidcliente()=="")
				return false;
			else if($obj->getFuncionarioidfuncionario()=="")
				return false;
			else if($obj->getServicoidservico()=="")
				return false;
			else{
				$obj2=new agendamentoDAL();
				$obj2->ConfAgend($obj);
				return true;
			}
		}

		public function ListarAgendamentos($inicio, $qnt_result_pg){
			$obj=new agendamentoDAL();
			$result = $obj->ListarAgendamentos($inicio, $qnt_result_pg);
			return $result;
		}

		public function ContarListarAgendamentos(){
			$obj=new agendamentoDAL();
			$row_pg = $obj->ContarListarAgendamentos();
			return $row_pg;
		}

		public function ListarHistoricoGeral($inicio, $qnt_result_pg){
			$obj=new agendamentoDAL();
			$result = $obj->ListarHistoricoGeral($inicio, $qnt_result_pg);
			return $result;
		}

		public function ContarListarHistoricoGeral(){
			$obj=new agendamentoDAL();
			$result = $obj->ContarListarHistoricoGeral();
			return $result;
		}

		public function ListarHistoricoNaoCompareceu($inicio, $qnt_result_pg){
			$obj=new agendamentoDAL();
			$result = $obj->ListarHistoricoNaoCompareceu($inicio, $qnt_result_pg);
			return $result;
		}

		public function ContarListarHistoricoNaoCompareceu(){
			$obj=new agendamentoDAL();
			$result = $obj->ContarListarHistoricoNaoCompareceu();
			return $result;
		}

		public function ListarHistoricoPorFuncionario($inicio, $qnt_result_pg){
			$obj=new agendamentoDAL();
			$result = $obj->ListarHistoricoPorFuncionario($inicio, $qnt_result_pg);
			return $result;
		}

		public function ContarListarHistoricoPorFuncionario(){
			$obj=new agendamentoDAL();
			$result = $obj->ContarListarHistoricoPorFuncionario();
			return $result;
		}

		public function ProcurarId($id){
			if($id=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->ProcurarId($id);
				return $result;
			}
		}

		public function ResultadoProcurarFila($n){
			if($n=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->ResultadoProcurarFila($n);
				return $result;
			}
		}

		public function ResultadoProcurarHistoricoGeral($n){
			if($n=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->ResultadoProcurarHistoricoGeral($n);
				return $result;
			}
		}

		public function ResultadoProcurarHistoricoNaoCompareceu($n){
			if($n=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->ResultadoProcurarHistoricoNaoCompareceu($n);
				return $result;
			}
		}

		public function ResultadoProcurarHistoricoPorFuncionario($n){
			if($n=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->ResultadoProcurarHistoricoPorFuncionario($n);
				return $result;
			}
		}

		public function AutoCompleteProcurarClienteAgendamento($l){
			if($l=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->AutoCompleteProcurarClienteAgendamento($l);
				return $result;
			}
		}

		public function AutoCompleteProcurarFila($l){
			if($l=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->AutoCompleteProcurarFila($l);
				return $result;
			}
		}

		public function AutoCompleteProcurarHistoricoGeral($l){
			if($l=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->AutoCompleteProcurarHistoricoGeral($l);
				return $result;
			}
		}

		public function AutoCompleteProcurarNaoCompareceu($l){
			if($l=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->AutoCompleteProcurarNaoCompareceu($l);
				return $result;
			}
		}

		public function AutoCompleteProcurarPorFuncionario($l){
			if($l=="")
				return false;
			else{
				$obj= new agendamentoDAL();
				$result = $obj->AutoCompleteProcurarPorFuncionario($l);
				return $result;
			}
		}

		public function RetirarFila($obj, $id){
			if($id=="")
				return false;
			else{
				$obj2 = new agendamentoDAL();
				$obj2->RetirarFila($obj, $id);
				return true;
			}
		}

		public function RetirarFilaNC($obj, $id){
			if($id=="")
				return false;
			else{
				$obj2 = new agendamentoDAL();
				$obj2->RetirarFilaNC($obj, $id);
				return true;
			}
		}

		public function ContarQtdComparecimento($nome_cli){
			$obj = new agendamentoDAL();
			$result = $obj->ContarQtdComparecimento($nome_cli);
			return $result;
		}

		public function ContarQtdNaoComparecimento($nome_cli){
			$obj = new agendamentoDAL();
			$result = $obj->ContarQtdNaoComparecimento($nome_cli);
			return $result;
		}

		public function VerificarHoraFuncionario($funcionario_id_funcionario, $data){
			$obj = new agendamentoDAL();
			$result = $obj->VerificarHoraFuncionario($funcionario_id_funcionario, $data);
			return $result;
		}

		public function PegarDadosClienteAgendamento($id_agendamento){
			$obj = new agendamentoDAL();
			$result = $obj->PegarDadosClienteAgendamento($id_agendamento);
			return $result;
		}
		
		public function QtdVezesClienteEstaHistorico($nome_cli){
			$obj = new agendamentoDAL();
			$result = $obj->QtdVezesClienteEstaHistorico($nome_cli);
			return $result;
		}

		public function AtualizarQtdComparecimento($qtd_comparecimento_final, $nome_cli){
			if($qtd_comparecimento_final=="")
				return false;
			else{
				$obj = new agendamentoDAL();
				$obj->AtualizarQtdComparecimento($qtd_comparecimento_final, $nome_cli);
				return true;
			}
		}

		public function PegarDatasAgendamentosFuncionario($funcionario_id_funcionario){
			$obj = new agendamentoDAL();
			$result = $obj->PegarDatasAgendamentosFuncionario($funcionario_id_funcionario);
			return $result;
		}
	}
?>