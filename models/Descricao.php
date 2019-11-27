<?php
class Descricao extends model {

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

}
