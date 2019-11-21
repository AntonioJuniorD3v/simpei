<?php
class Equipamentos extends model {

	public function addEquipamento($nome, $modelo, $patrimonio, $estado, $periodoPreditiva, $periodoPreventiva, $checklistPreditiva, $checklistPreventiva, $ultimaManutencaoPreditiva, $proximaManutencaoPreditiva, $ultimaManutencaoPreventiva, $proximaManutencaoPreventiva) {

		$sql = $this->db->prepare(	"INSERT INTO equipamentos SET nome = :nome, modelo = :modelo, patrimonio = :patrimonio,
									periodoPreditiva = :periodoPreditiva, periodoPreventiva = :periodoPreventiva, checklistPreditiva = :checklistPreditiva,
									checklistPreventiva = :checklistPreventiva, ultimaManutencaoPreditiva = :ultimaManutencaoPreditiva,
									proximaManutencaoPreditiva = :proximaManutencaoPreditiva, ultimaManutencaoPreventiva = :ultimaManutencaoPreventiva,
									proximaManutencaoPreventiva = :proximaManutencaoPreventiva,	estado = :estado, data = now()");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":modelo", $modelo);
		$sql->bindValue(":patrimonio", $patrimonio);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":periodoPreditiva", $periodoPreditiva);
		$sql->bindValue(":periodoPreventiva", $periodoPreventiva);
		$sql->bindValue(":checklistPreditiva", $checklistPreditiva);
		$sql->bindValue(":checklistPreventiva", $checklistPreventiva);
		$sql->bindValue(":ultimaManutencaoPreditiva", $ultimaManutencaoPreditiva);
		$sql->bindValue(":proximaManutencaoPreditiva", $proximaManutencaoPreditiva);
		$sql->bindValue(":ultimaManutencaoPreventiva", $ultimaManutencaoPreventiva);
		$sql->bindValue(":proximaManutencaoPreventiva", $proximaManutencaoPreventiva);

		$sql->execute();
	}

	public function getEquipamentos(){
		$sql = $this->db->prepare("SELECT * FROM equipamentos");
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function desativarEquipamento($id){
		$sql = $this->db->prepare("UPDATE equipamentos SET estado = 'Desativado' WHERE idEquipamento = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function editarEquipamento($id, $nome, $modelo, $patrimonio, $estado, $periodoPreditiva, $periodoPreventiva, $checklistPreditiva, $checklistPreventiva, $ultimaManutencaoPreditiva, $proximaManutencaoPreditiva, $ultimaManutencaoPreventiva, $proximaManutencaoPreventiva){
		$sql = $this->db->prepare(	"UPDATE equipamentos SET nome = :nome, modelo = :modelo, patrimonio = :patrimonio,
									periodoPreditiva = :periodoPreditiva, periodoPreventiva = :periodoPreventiva, checklistPreditiva = :checklistPreditiva,
									checklistPreventiva = :checklistPreventiva, ultimaManutencaoPreditiva = :ultimaManutencaoPreditiva,
									proximaManutencaoPreditiva = :proximaManutencaoPreditiva, ultimaManutencaoPreventiva = :ultimaManutencaoPreventiva,
									proximaManutencaoPreventiva = :proximaManutencaoPreventiva,	estado = :estado WHERE idEquipamento = :id");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":modelo", $modelo);
		$sql->bindValue(":patrimonio", $patrimonio);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":periodoPreditiva", $periodoPreditiva);
		$sql->bindValue(":periodoPreventiva", $periodoPreventiva);
		$sql->bindValue(":checklistPreditiva", $checklistPreditiva);
		$sql->bindValue(":checklistPreventiva", $checklistPreventiva);
		$sql->bindValue(":ultimaManutencaoPreditiva", $ultimaManutencaoPreditiva);
		$sql->bindValue(":proximaManutencaoPreditiva", $proximaManutencaoPreditiva);
		$sql->bindValue(":ultimaManutencaoPreventiva", $ultimaManutencaoPreventiva);
		$sql->bindValue(":proximaManutencaoPreventiva", $proximaManutencaoPreventiva);

		$sql->execute();

	}

	public function buscarEquipamento($texto){

		$sql = "SELECT * FROM equipamentos WHERE nome LIKE :texto";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":texto", $texto . '%');
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
		// if ($sql->rowCount() > 0) {

		// 	return $sql;
			
		// }
	}

	public function getEquipamentosEmManutencao(){
		$sql = $this->db->prepare("SELECT * FROM equipamentos WHERE estado = 'Manutenção'");
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function getEquipamentosDesativado(){
		$sql = $this->db->prepare("SELECT * FROM equipamentos WHERE estado = 'Desativado'");
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function getProximasManutencoesPreditivas(){
		$sql = $this->db->prepare("SELECT * FROM equipamentos WHERE proximaManutencaoPreditiva <= DATE_ADD(CURDATE(), INTERVAL 5 DAY) ");
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function getProximasManutencoesPreventivas(){
		$sql = $this->db->prepare("SELECT * FROM equipamentos WHERE proximaManutencaoPreventiva <= DATE_ADD(CURDATE(), INTERVAL 5 DAY) ");
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

}