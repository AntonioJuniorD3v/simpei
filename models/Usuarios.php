<?php
class Usuarios extends model {

	public function getTotalUsuarios() {
		$sql = $this->db->query("SELECT COUNT(*) as c FROM usuarios");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrar($nome, $email, $senha, $telefone) {
		$sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

	public function login($usuario, $senha) {
		$sql = $this->db->prepare("SELECT id, nome, funcao FROM usuarios WHERE usuario = :usuario AND senha = :senha");
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			$_SESSION['nome'] = $dado['nome'];
			$_SESSION['funcao'] = $dado['funcao'];

			return true;
		} else {
			return false;
		}

	}

	public function getEquipes(){
		$sql = $this->db->query("SELECT equipe FROM usuarios");
		$sql->execute();

		$row = $sql->fetchAll();

		return $row;
	}

	public function getUsuarios(){
		$sql = $this->db->query("SELECT * FROM usuarios");
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

	public function addUsuario($nome, $usuario, $senha, $matricula, $funcao) {

		$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, usuario = :usuario, senha = :senha, matricula = :matricula, funcao = :funcao, estado = 1 ");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":matricula", $matricula);
		$sql->bindValue(":funcao", $funcao);

		$sql->execute();
	}

	public function editarUsuario($id, $nome, $usuario, $senha, $matricula, $funcao, $estado){
		$sql = $this->db->prepare("UPDATE usuarios SET nome = :nome, usuario = :usuario, senha = :senha, matricula = :matricula, funcao = :funcao, estado = :estado WHERE id = :id");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":matricula", $matricula);
		$sql->bindValue(":funcao", $funcao);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id", $id);

		$sql->execute();
	}

	public function atualizarSenha($id, $senha){
		$sql = $this->db->prepare("UPDATE usuarios SET senha = :senha WHERE id = :id");
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":id", $id);

		$sql->execute();
	}

	public function desativarUsuario($id){
		$sql = $this->db->prepare("UPDATE usuarios SET estado = 0 WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

}
?>