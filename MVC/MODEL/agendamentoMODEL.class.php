<?php

	class agendamento{
		private $_id_agendamento;
		private $_horario;
		private $_comparece;
		private $_historico;
		private $_cliente_id_cliente;
		private $_funcionario_id_funcionario;
		private $_servico_id_servico;

		public function setIdagendamento(){
			$cx = new conexao();
			$conn = $cx->getConn();
			$this->_id_agendamento=$conn->lastInsertId('agendamento');
		}

		public function setHorario($_h){
			$this->_horario=$_h;
		}

		public function setComparece($_c){
			$this->_comparece=$_c;
		}

		public function setHistorico($_hi){
			$this->_historico=$_hi;
		}

		public function setClienteidcliente($_cic){
			$this->_cliente_id_cliente=$_cic;
		}
		
		public function setFuncionarioidfuncionario($_fif){
			$this->_funcionario_id_funcionario=$_fif;
		}
		
		public function setServicoidservico($_sis){
			$this->_servico_id_servico=$_sis;
		}

		public function getIdagendamento(){
			return $this->_id_agendamento;
		}

		public function getHorario(){
			return $this->_horario;
		}

		public function getComparece(){
			return $this->_comparece;
		}

		public function getHistorico(){
			return $this->_historico;
		}

		public function getClienteidcliente(){
			return $this->_cliente_id_cliente;
		}
		
		public function getFuncionarioidfuncionario(){
			return $this->_funcionario_id_funcionario;
		}
		
		public function getServicoidservico(){
			return $this->_servico_id_servico;
		}

		function __construct($h="", $c="", $hi="", $cic="", $fif="", $sis=""){
			$this->setHorario($h);
			$this->setComparece($c);
			$this->setHistorico($hi);
			$this->setClienteidcliente($cic);
			$this->setFuncionarioidfuncionario($fif);
			$this->setServicoidservico($sis);
		}
	}
?>