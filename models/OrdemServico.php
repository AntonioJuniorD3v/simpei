<?php
class OrdemServico extends model {

	public function salvar($resumo, $idEquipamento, $tipoManutencao, $estadoEquipamento, $prioridade, $idSetor, $dataFinal, $descricao) {

		$sql = $this->db->prepare("INSERT INTO ordem_servico SET resumo = :resumo, idEquipamento = :idEquipamento, idAnalista = :idAnalista, tipoManutencao = :tipoManutencao, estadoEquipamento = :estadoEquipamento, prioridade = :prioridade, idSetor = :idSetor, dataFinal = :dataFinal, dataInicial = now(), status = 'Nova' ");
		$sql->bindValue(":resumo", $resumo);
		$sql->bindValue(":idEquipamento", $idEquipamento);
		$sql->bindValue(":idAnalista", $_SESSION['cLogin']);
		$sql->bindValue(":tipoManutencao", $tipoManutencao);
		$sql->bindValue(":estadoEquipamento", $estadoEquipamento);
		$sql->bindValue(":prioridade", $prioridade);
		$sql->bindValue(":idSetor", $idSetor);
		$sql->bindValue(":dataFinal", $dataFinal);

		try{
			$sql->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}

		$sql = $this->db->prepare("INSERT INTO descricao SET descricao = :descricao, idUsuario = :idUsuario, idOrdemServico = :idOrdemServico, data = now()");
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":idUsuario", $_SESSION['cLogin']);
		$sql->bindValue(":idOrdemServico", $this->db->lastInsertId());
		$sql->execute();
	}

	public function getAllOrdemServico(){
		if($_SESSION['funcao'] == 0){
			$sql = $this->db->prepare("
				SELECT *, DATE_FORMAT(dataInicial,'%d/%m/%Y %H:%i:%s'), DATE_FORMAT(dataFinal,'%d/%m/%Y') FROM ordem_servico o 
				INNER JOIN setor s on o.idSetor = s.id
				INNER JOIN usuarios u ON o.idAnalista = u.id
				INNER JOIN equipamentos e ON o.idEquipamento = e.idEquipamento
				WHERE o.status = 'Nova' OR o.status = 'Em processamento' "
			);
		} else{
			$sql = $this->db->prepare("
				SELECT *, DATE_FORMAT(dataInicial,'%d/%m/%Y %H:%i:%s'), DATE_FORMAT(dataFinal,'%d/%m/%Y') FROM ordem_servico o 
				INNER JOIN setor s on o.idSetor = s.id
				INNER JOIN usuarios u ON o.idAnalista = u.id
				INNER JOIN equipamentos e ON o.idEquipamento = e.idEquipamento
				WHERE o.status = 'Nova' OR o.status = 'Em processamento' OR o.status = 'Em validação'"
			);
		}

		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function getOrdemServicoById($id){
		$sql = $this->db->prepare("SELECT * FROM ordem_servico o 
			INNER JOIN setor s on o.idSetor = s.id
			INNER JOIN usuarios u ON o.idAnalista = u.id
			INNER JOIN equipamentos e ON o.idEquipamento = e.idEquipamento
			WHERE o.id = :id"
		);

		$sql->bindValue(":id", $id);
		$sql->execute();
		$row = $sql->fetch();

		return $row;
	}

	public function getDescricaoById($id){

		$sql = $this->db->prepare("SELECT * FROM descricao d
			INNER JOIN usuarios u ON d.idUsuario = u.id
			INNER JOIN ordem_servico o ON d.idOrdemServico = o.id 
			WHERE idOrdemServico = :id ORDER BY d.data DESC" 
		);

		$sql->bindValue(":id", $id);
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function salvarProcessamento($idTecnico, $descricao, $idOrdemServico, $status) {

		$sql = $this->db->prepare("UPDATE ordem_servico SET idTecnico = :idTecnico, status = :status WHERE id = :idOrdemServico");
		$sql->bindValue(":idTecnico", $idTecnico);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":idOrdemServico", $idOrdemServico);
		$sql->execute();

		if(!empty($descricao)){
			$sql = $this->db->prepare("INSERT INTO descricao SET descricao = :descricao, idUsuario = :idUsuario, idOrdemServico = :idOrdemServico, data = now()");
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":idUsuario", $_SESSION['cLogin']);
			$sql->bindValue(":idOrdemServico", $idOrdemServico);
			$sql->execute();
		}	
	}

	public function salvarProcessamentoPreditiva($idTecnico, $descricao, $idOrdemServico, $status, $ultimaManutencaoPreditiva, $proximaManutencaoPreditiva, $idEquipamento) {

		$sql = $this->db->prepare(	"UPDATE ordem_servico SET idTecnico = :idTecnico, status = :status WHERE id = :idOrdemServico");
		$sql->bindValue(":idTecnico", $idTecnico);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":idOrdemServico", $idOrdemServico);

		$sql->execute();

		if(!empty($descricao)){
			$sql = $this->db->prepare("INSERT INTO descricao SET descricao = :descricao, idUsuario = :idUsuario, idOrdemServico = :idOrdemServico, data = now()");
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":idUsuario", $_SESSION['cLogin']);
			$sql->bindValue(":idOrdemServico", $idOrdemServico);
			$sql->execute();
		}
				
		$sql = $this->db->prepare(	"UPDATE equipamentos SET ultimaManutencaoPreditiva = :ultimaManutencaoPreditiva,
								  	proximaManutencaoPreditiva = :proximaManutencaoPreditiva WHERE idEquipamento = :idEquipamento");
		$sql->bindValue(":idEquipamento", $idEquipamento);
		$sql->bindValue(":ultimaManutencaoPreditiva", $ultimaManutencaoPreditiva);
		$sql->bindValue(":proximaManutencaoPreditiva", $proximaManutencaoPreditiva);
		$sql->execute();

		echo $proximaManutencaoPreditiva;
		exit;
	}

	public function salvarProcessamentoPreventiva($idTecnico, $descricao, $idOrdemServico, $status, $ultimaManutencaoPreventiva, $proximaManutencaoPreventiva, $idEquipamento) {

		$sql = $this->db->prepare(	"UPDATE ordem_servico SET idTecnico = :idTecnico, status = :status WHERE id = :idOrdemServico");
		$sql->bindValue(":idTecnico", $idTecnico);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":idOrdemServico", $idOrdemServico);

		$sql->execute();

		if(!empty($descricao)){
			$sql = $this->db->prepare("INSERT INTO descricao SET descricao = :descricao, idUsuario = :idUsuario, idOrdemServico = :idOrdemServico, data = now()");
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":idUsuario", $_SESSION['cLogin']);
			$sql->bindValue(":idOrdemServico", $idOrdemServico);
			$sql->execute();
		}
				
		$sql = $this->db->prepare(	"UPDATE equipamentos SET ultimaManutencaoPreventiva = :ultimaManutencaoPreventiva,
								  	proximaManutencaoPreventiva = :proximaManutencaoPreventiva WHERE idEquipamento = :idEquipamento");
		$sql->bindValue(":idEquipamento", $idEquipamento);
		$sql->bindValue(":ultimaManutencaoPreventiva", $ultimaManutencaoPreventiva);
		$sql->bindValue(":proximaManutencaoPreventiva", $proximaManutencaoPreventiva);
		$sql->execute();

	}

	public function getRelatorio($equipeTecnica, $tecnico, $tipoManutencao, $equipamento, $dataInicial, $dataFinal){
		
		$aux = '';

		if($equipeTecnica != 'Todas equipes'){
			$aux .= "AND s.nome = :equipeTecnica ";
		}
		if($tecnico != 'Todos técnicos'){
			$aux .= "AND u.nome = :tecnico ";
		}
		if($tipoManutencao != 'Selecionar Todas'){
			$aux .= "AND o.tipoManutencao = :tipoManutencao ";
		}
		if($equipamento != 'Todos'){
			$aux .= "AND e.nome = :equipamento ";
		}
		
		$sql = $this->db->prepare("SELECT *, DATE(dataInicial) FROM ordem_servico o 
									INNER JOIN setor s ON o.idSetor = s.id
									INNER JOIN usuarios u ON o.idTecnico = u.id
									INNER JOIN equipamentos e ON o.idEquipamento = e.idEquipamento	
									INNER JOIN usuarios a ON o.idAnalista = a.id
									WHERE DATE(o.dataInicial) BETWEEN :dataInicial AND :dataFinal 										
							   		$aux								   
								   	ORDER BY o.datainicial ASC");
		// print_r($sql);
		// exit;

		if($equipeTecnica != 'Todas equipes'){
			$sql->bindValue(":equipeTecnica", $equipeTecnica);
		}
		if($tecnico != 'Todos técnicos'){
			$sql->bindValue(":tecnico", $tecnico);
		}
		if($tipoManutencao != 'Selecionar Todas'){
			$sql->bindValue(":tipoManutencao", $tipoManutencao);
		}
		if($equipamento != 'Todos'){
			$sql->bindValue(":equipamento", $equipamento);
		}
		$sql->bindValue(":dataInicial", $dataInicial);
		$sql->bindValue(":dataFinal", $dataFinal);
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}
	
	public function getDetalhesOdensServicoEquipamento($idEquipamento) {

		$sql = $this->db->prepare("	SELECT *, DATE_FORMAT(dataInicial, '%d-%m-%Y') FROM ordem_servico o
									INNER JOIN setor s ON o.idSetor = s.id 
									INNER JOIN usuarios u ON o.idTecnico = u.id 
									INNER JOIN equipamentos e ON o.idEquipamento = e.idEquipamento 
									INNER JOIN usuarios a ON o.idAnalista = a.id 
									WHERE o.idEquipamento = :idEquipamento ");
		$sql->bindValue(":idEquipamento", $idEquipamento);
		$sql->execute();
		$row = $sql->fetchAll();
		return $row;
	}

	public function getOrdemServicoAberta() {

		$sql = $this->db->prepare("	SELECT * FROM ordem_servico WHERE status != 'validado' ");
		$sql->execute();
		$row = $sql->fetchAll();
		return count($row);

	}

	
	public function getOrdemServicoEmValidacao() {

		$sql = $this->db->prepare("	SELECT * FROM ordem_servico WHERE status = 'Em validação' ");
		$sql->execute();
		$row = $sql->fetchAll();
		return count($row);

	}

	public function getOrdemServicoUltimosSeteDias($dataInicial, $dataFinal) {

		$sql = $this->db->prepare("	SELECT DATE(dataInicial) FROM ordem_servico WHERE dataInicial BETWEEN :dataInicial AND :dataFinal ");
		$sql->bindValue(":dataInicial", $dataInicial);
		$sql->bindValue(":dataFinal", $dataFinal);

		$sql->execute();
		$row = $sql->fetchAll();
		return $row;

	}

	
}