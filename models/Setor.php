<?php
class Setor extends model {

	public function getSetor(){
		$sql = $this->db->query("SELECT DISTINCT nome, id FROM setor");
		$sql->execute();

		$row = $sql->fetchAll();

		return $row;
	}

	public function getSetorById($id){
		$sql = $this->db->query("SELECT nome FROM setor WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		$row = $sql->fetch();

		return $row;
	}

}
?>