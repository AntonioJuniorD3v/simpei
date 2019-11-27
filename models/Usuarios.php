<?php
class Usuarios extends model {

	
	public function cadastrar($nome, $usuario, $senha, $matricula, $funcao) {

		$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, usuario = :usuario, senha = :senha, matricula = :matricula, funcao = :funcao, idEmpresa = :idEmpresa, estado = 1 ");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":matricula", $matricula);
		$sql->bindValue(":funcao", $funcao);
		$sql->bindValue(":idEmpresa", $_SESSION['empresa']);

		$sql->execute();
	}

	public function editar($id, $nome, $usuario, $senha, $matricula, $funcao, $estado){
		$sql = $this->db->prepare("UPDATE usuarios SET nome = :nome, usuario = :usuario, senha = :senha, matricula = :matricula, funcao = :funcao, ativo = :estado WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":matricula", $matricula);
		$sql->bindValue(":funcao", $funcao);
		$sql->bindValue(":estado", $estado);

		$sql->execute();
	}

	public function alterarSenha($id, $senha){
		$sql = $this->db->prepare("UPDATE usuarios SET senha = :senha WHERE id = :id");
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":id", $id);

		$sql->execute();
	}

	public function desativar($id){
		$sql = $this->db->prepare("UPDATE usuarios SET ativo = 0 WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function login($usuario, $senha) {
		$sql = $this->db->prepare("SELECT id, nome, funcao, ativo, idEmpresa FROM usuarios WHERE usuario = :usuario AND senha = :senha");
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			$_SESSION['nome'] = $dado['nome'];
			$_SESSION['funcao'] = $dado['funcao'];
			$_SESSION['empresa'] = $dado['funcao'];
			$_SESSION['ativo'] = $dado['ativo'];


			return true;
		} else {
			return false;
		}
	}

	public function getTotalUsuarios() {
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM usuarios WHERE idEmpresa = :idEmpresa");
		$sql->bindValue(":idEmpresa", $_SESSION['empresa']);
		$sql->execute();

		$row = $sql->fetch();

		return $row['c'];
	}

	public function getUsuarios(){
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE idEmpresa = :idEmpresa");
		$sql->bindValue(":idEmpresa", $_SESSION['empresa']);
		$sql->execute();
		$row = $sql->fetchAll();

		return $row;
	}

	public function getUsuarioById($id){
		$sql = $this->db->prepare("SELECT senha FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		$row = $sql->fetch();

		return $row;
	}


}
?>