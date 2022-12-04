<?php
	require_once("conexao.class.php");
	require_once("../../MODEL/agendamentoMODEL.class.php");

	class agendamentoDAL{

		public function ConfAgend($obj){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$horario = $obj->getHorario();
				$comparece = $obj->getComparece();
				$historico = $obj->getHistorico();
				$cliente_id_cliente = $obj->getClienteidcliente();
				$funcionario_id_funcionario = $obj->getFuncionarioidfuncionario();
				$servico_id_servico = $obj->getServicoidservico();
				$sql = "INSERT INTO agendamento (horario, comparece, historico, cliente_id_cliente, funcionario_id_funcionario, servico_id_servico) VALUES ('$horario', '$comparece', '$historico', '$cliente_id_cliente', '$funcionario_id_funcionario', '$servico_id_servico')";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

		public function ListarAgendamentos($inicio, $qnt_result_pg){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT id_agendamento, nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='N' ORDER BY horario, nome_cli LIMIT $inicio, $qnt_result_pg";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

        public function ContarListarAgendamentos(){
            try{
                $cx = new Conexao();
                $conn = $cx->getConn();
                $sql = "SELECT COUNT(id_agendamento) AS num_result FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='N'";
                $result = $conn->query($sql);
                $row_pg = $result->fetch();
                return $row_pg;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

		public function ListarHistoricoGeral($inicio, $qnt_result_pg){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
                if($inicio != null || $qnt_result_pg != null){
            	   $sql = "SELECT nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' ORDER BY horario, nome_cli LIMIT $inicio, $qnt_result_pg";
                }
                else{
                    $sql = "SELECT nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' ORDER BY horario, nome_cli";
                }
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

        public function ContarListarHistoricoGeral(){
            try{
                $cx = new Conexao();
                $conn = $cx->getConn();
                $sql = "SELECT COUNT(id_agendamento) AS num_result FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S'";
                $result = $conn->query($sql);
                $row_pg = $result->fetch();
                return $row_pg;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

		public function ListarHistoricoNaoCompareceu($inicio, $qnt_result_pg){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
                if($inicio != null || $qnt_result_pg != null){
            	   $sql = "SELECT nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='N' ORDER BY horario, nome_cli LIMIT $inicio, $qnt_result_pg";
                }
                else{
                    $sql = "SELECT nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='N' ORDER BY horario, nome_cli";
                }
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

        public function ContarListarHistoricoNaoCompareceu(){
            try{
                $cx = new Conexao();
                $conn = $cx->getConn();
                $sql = "SELECT COUNT(id_agendamento) AS num_result FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='N'";
                $result = $conn->query($sql);
                $row_pg = $result->fetch();
                return $row_pg;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

		public function ListarHistoricoPorFuncionario($inicio, $qnt_result_pg){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
                if($inicio != null || $qnt_result_pg != null){
            	   $sql = "SELECT nome_func, telefone_func, email_func, nome_cli, telefone_cli, nome, preco, horario, qtd_agendamento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' ORDER BY horario, nome_func LIMIT $inicio, $qnt_result_pg";
                }
                else{
                    $sql = "SELECT nome_func, telefone_func, email_func, nome_cli, telefone_cli, nome, preco, horario, qtd_agendamento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' ORDER BY horario, nome_func";
                }
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

        public function ContarListarHistoricoPorFuncionario(){
            try{
                $cx = new Conexao();
                $conn = $cx->getConn();
                $sql = "SELECT COUNT(id_agendamento) AS num_result FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S'";
                $result = $conn->query($sql);
                $row_pg = $result->fetch();
                return $row_pg;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

		public function ProcurarId($id){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT * FROM agendamento WHERE id_agendamento=$id";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ResultadoProcurarFila($n){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT id_agendamento, nome_cli, telefone_cli, nome, preco, nome_func, horario FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='N' AND nome_cli LIKE '%$n%' ORDER BY horario, nome_cli";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ResultadoProcurarHistoricoGeral($n){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' AND nome_cli LIKE '%$n%' ORDER BY horario, nome_cli";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ResultadoProcurarHistoricoNaoCompareceu($n){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT nome_cli, telefone_cli, nome, preco, nome_func, horario, qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='N' AND nome_cli LIKE '%$n%' ORDER BY horario, nome_cli";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ResultadoProcurarHistoricoPorFuncionario($n){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT nome_func, telefone_func, email_func, nome_cli, telefone_cli, nome, preco, horario, qtd_agendamento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' AND nome_func LIKE '%$n%' ORDER BY horario, nome_func";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function AutoCompleteProcurarFila($l){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT DISTINCT nome_cli FROM cliente, agendamento WHERE id_cliente=cliente_id_cliente AND nome_cli LIKE '%$l%' AND historico='N' ORDER BY nome_cli ASC";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function AutoCompleteProcurarHistoricoGeral($l){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT DISTINCT nome_cli FROM cliente, agendamento WHERE id_cliente=cliente_id_cliente AND nome_cli LIKE '%$l%' AND historico='S' AND comparece='S' ORDER BY nome_cli ASC";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function AutoCompleteProcurarNaoCompareceu($l){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT DISTINCT nome_cli FROM cliente, agendamento WHERE id_cliente=cliente_id_cliente AND nome_cli LIKE '%$l%' AND historico='S' AND comparece='N' ORDER BY nome_cli ASC";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function AutoCompleteProcurarPorFuncionario($l){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT DISTINCT nome_func FROM funcionario, agendamento WHERE id_funcionario=funcionario_id_funcionario AND nome_func LIKE '%$l%' AND historico='S' AND comparece='S' ORDER BY nome_func ASC";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function RetirarFila($obj, $id_referido){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$comparece = $obj->getComparece();
				$historico = $obj->getHistorico();
				$sql = "UPDATE agendamento SET comparece='$comparece', historico='$historico' WHERE id_agendamento=$id_referido";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

		public function RetirarFilaNC($obj, $id_referido){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$comparece = $obj->getComparece();
				$historico = $obj->getHistorico();
				$sql = "UPDATE agendamento SET comparece='$comparece', historico='$historico' WHERE id_agendamento=$id_referido";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

        public function ContarQtdComparecimento($nome_cli){
            try{
                $cx = new conexao();
                $conn = $cx->getConn();
                $sql = "SELECT qtd_comparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' AND nome_cli = '$nome_cli' LIMIT 1";
                $result = $conn->query($sql);
                return $result;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

        public function ContarQtdNaoComparecimento($nome_cli){
            try{
                $cx = new conexao();
                $conn = $cx->getConn();
                $sql = "SELECT COUNT(comparece) AS qtd_naocomparecimento FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='N' AND nome_cli = '$nome_cli'";
                $result = $conn->query($sql);
                $result_final = $result->fetch();
                return $result_final;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

        public function VerificarHoraFuncionario($funcionario_id_funcionario, $data){
            try{
                $cx = new conexao();
                $conn = $cx->getConn();
                $sql = "SELECT TIME(horario) AS horario FROM agendamento, funcionario WHERE id_funcionario = funcionario_id_funcionario AND id_funcionario = $funcionario_id_funcionario AND horario LIKE '$data%'";
                $result = $conn->query($sql);
                return $result;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

        public function PegarDadosClienteAgendamento($id_agendamento){
            try{
                $cx = new Conexao();
                $conn = $cx->getConn();
                $sql = "SELECT * FROM cliente, agendamento WHERE id_agendamento=$id_agendamento AND id_cliente = cliente_id_cliente AND comparece = 'S' AND historico = 'S'";
                $result = $conn->query($sql);
                return $result;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

        public function QtdVezesClienteEstaHistorico($nome_cli){
            try{
                $cx = new conexao();
                $conn = $cx->getConn();
                $sql = "SELECT COUNT(qtd_comparecimento) AS qtd_vezes_cliente_esta_historico FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND historico='S' AND comparece='S' AND nome_cli = '$nome_cli'";
                $result = $conn->query($sql);
                $result_final = $result->fetch();
                return $result_final;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

        public function AtualizarQtdComparecimento($qtd_comparecimento_final, $nome_cli){
            try{
                $cx = new conexao();
                $conn = $cx->getConn();
                $sql = "UPDATE cliente C INNER JOIN agendamento A ON C.id_cliente = A.cliente_id_cliente AND A.comparece = 'S' AND A.historico = 'S' AND C.nome_cli = '$nome_cli' SET C.qtd_comparecimento = $qtd_comparecimento_final";
                $conn->exec($sql);
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }

        public function PegarDatasAgendamentosFuncionario($funcionario_id_funcionario){
            try{
                $cx = new conexao();
                $conn = $cx->getConn();
                $sql = "SELECT date(horario) AS horario FROM cliente, servico, funcionario, agendamento WHERE id_cliente=cliente_id_cliente AND id_funcionario=funcionario_id_funcionario AND id_servico=servico_id_servico AND id_funcionario = $funcionario_id_funcionario AND historico='N' AND comparece='S'";
                $result = $conn->query($sql);
                return $result;
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }
	}
?>