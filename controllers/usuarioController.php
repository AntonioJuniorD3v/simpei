<?php
class usuarioController extends controller {

	public function isLogged()
    {
        if (empty($_SESSION['cLogin']) || $_SESSION['funcao'] != 2) {
            ?>
            <script type="text/javascript">
                window.location.href = "<?php echo BASE_URL; ?>login";
            </script>
            <?php
            exit;
        }
	}

	function __construct(){
		//$this->isLogged();
	}

	public function index() {
		$this->isLogged();

        if($_SESSION['funcao'] == 2){
            $u = new Usuarios();
            $dados = $u->getUsuarios();
            $this->loadTemplateTecnico('usuarios', $dados);
        }
    }
    
	public function cadastrar()
	{
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $matricula = $_POST['matricula'];

        if($_POST['funcao'] == 'Técnico'){
            $funcao = 0;
        } else{
            $funcao = 1;
        }
  
        $u = new Usuarios();
        $u->cadastrar($nome, $usuario, $senha, $matricula, $funcao);

		$this->index();
    }

    public function editar()
	{
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $matricula = $_POST['matricula'];


        if($_POST['funcao'] == 'Técnico'){
            $funcao = 0;
        } else{
            $funcao = 1;
        }

        if($_POST['estado'] == 'Desativado'){
            $estado = 0;
        } else{
            $estado = 1;
        }


		$u = new Usuarios();
		$u->editar($id, $nome, $usuario, $senha, $matricula, $funcao, $estado);

		$this->index();
    }
    
    public function perfil() {
		$this->loadTemplate('perfil');
    }
    
    public function alterarSenha()
	{
        $id = $_SESSION['cLogin'];
        $senhaAntiga = md5($_POST['senhaAntiga']);
        $senhaAtual = md5($_POST['senhaAtual']);
        $confirmarSenha = md5($_POST['confirmarSenha']);

        $u = new Usuarios();
        $senhaUsuario = $u->getUsuarioById($id);

        if($senhaAtual == $confirmarSenha && $senhaAntiga == $senhaUsuario['senha']){
            $u->alterarSenha($id, $senhaAtual);
            ?>
                <script>
                    alert('Senha atualizada com Sucesso!');
                    window.location.href = "<?php echo BASE_URL; ?>usuario/perfil";
                </script>
            <?php
        } else{
            ?>
                <script>
                    alert('Dados incorretos');
                    window.location.href = "<?php echo BASE_URL; ?>usuario/perfil";
                </script>
            <?php
        }
    }
    
    public function desativar()
	{
		if (isset($_POST['id'])) {
			$u = new Usuarios();
			$u->desativar($_POST['id']);
        }
        
		$this->index();
	}

}