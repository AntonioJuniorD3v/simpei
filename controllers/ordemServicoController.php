<?php
class ordemServicoController extends controller {
	
	public function isLogged()
    {
        if (empty($_SESSION['cLogin']) || $_SESSION['funcao'] == 0 || $_SESSION['funcao'] == 2) {
            ?>
            <script type="text/javascript">
                window.location.href = "<?php echo BASE_URL; ?>login";
            </script>
            <?php
            exit;
        }
	}
	
	public function index() {
		$this->loadTemplate('equipamentos');
	}

	public function listaOrdemServico() {

		if($_SESSION['funcao'] == 0){

			$os = new OrdemServico();
	
			$dados = $os->getAllOrdemServico();
	
			$this->loadTemplateTecnico('listaOrdensDeServico', $dados);
		} else if($_SESSION['funcao'] == 1){
			$os = new OrdemServico();
	
			$dados = $os->getAllOrdemServico();

			// print_r($dados);
			// exit;

			$this->loadTemplate('listaOrdensDeServico', $dados);
		}
	}

	public function abrirOrdemDeServico() {
		$this->isLogged();

		$e = new Equipamentos();

		$dados['equipamentos'] = $e->getEquipamentos();

		$u = new Setor();

		$dados['setor'] = $u->getSetor();
		$this->loadTemplate('abrirOrdemDeServico', $dados);
	}

	public function abrir(){
		$this->isLogged();

		$os = new OrdemServico();

		$resumo = $_POST['resumo'];
		$idEquipamento = intval($_POST['idEquipamento']);
		$tipoManutencao = $_POST['tipoManutencao'];
		$estadoEquipamento = $_POST['estadoEquipamento'];
		$prioridade = $_POST['prioridade'];
		$idSetor = $_POST['setor'];
		$dataFinal = $_POST['dataFinal'];
		$descricao = $_POST['descricao'];

		$os->salvar($resumo, $idEquipamento, $tipoManutencao, $estadoEquipamento, $prioridade, $idSetor, $dataFinal, $descricao);

		header('Location: '.BASE_URL.'ordemServico/abrirOrdemDeServico');

	}

	public function detalhesOrdemServico(){
		if($_SESSION['funcao'] == 0){
			$id = $_POST['id'];
			$os = new OrdemServico();
			$dados = $os->getOrdemServicoById($id);

			$dados = $os->getOrdemServicoById($id);
			$dados['descricao'] = $os->getDescricaoById($id);

			if($dados['usuario' == 0] && $dados['status'] == 'Nova'){
				$dados['acoes'] = array("Atender", "Solicitar Cancelamento"); 
			} else if($dados['usuario' == 0] && $dados['status'] == 'Em processamento'){
				$dados['acoes'] = array("Enviar para validação"); 
			}

			$this->loadTemplateTecnico('processarOrdemServico', $dados);
			
		} else if($_SESSION['funcao'] == 1){
			$id = $_POST['id'];
			$os = new OrdemServico();
			$dados = $os->getOrdemServicoById($id);
			$dados['descricao'] = $os->getDescricaoById($id);

			// print_r($dados);
			// exit;

			if($dados['usuario' == 1 ]  && $dados['status'] == 'Em validação'){
				$dados['acoes'] = array("Validado"); 
			} else {
				$dados['acoes'] = array(""); 
			}

			$this->loadTemplate('processarOrdemServico', $dados);
		}
	}

	private function verificaProximaManutencao($periodo){
		if($periodo == 'Semanal'){
			return date('Y-m-d', strtotime("+7 days")); 
		}
		if($periodo == 'Quinzenal'){
			return date('Y-m-d', strtotime("+15 days")); 
		}
		if($periodo == 'Mensal'){
			return date('Y-m-d', strtotime("+30 days")); 
		}
		if($periodo == 'Trimestral'){
			return date('Y-m-d', strtotime("+90 days")); 
		}
		if($periodo == 'Semestral'){
			return date('Y-m-d', strtotime("+180 days")); 
		}
		if($periodo == 'Anual'){
			return date('Y-m-d', strtotime("+365 days")); 
		}
	}

	public function salvarProcessamento(){

		$idTecnico = $_POST['idTecnico'];
		$idOrdemServico = $_POST['idOrdemServico'];
		$status = $_POST['status'];
		$descricao = $_POST['descricao'];
		$tipoManutencao = $_POST['tipoManutencao'];
		$periodoPreditiva = $_POST['periodoPreditiva'];
		$periodoPreventiva = $_POST['periodoPreventiva'];
		$idEquipamento = $_POST['idEquipamento'];

		switch($_POST['status']){
			case 'Atender':
				$status = 'Em processamento';
				break;
			case 'Solicitar Cancelamento':
				$status = 'Em cancelamento';
				break;
			case 'Enviar para validação':
				$status = 'Em validação';
			break;
		}

		$os = new OrdemServico();


		if($status == 'Validado' && $tipoManutencao == 'Preditiva'){
			$ultimaManutencaoPreditiva = date('Y-m-d');
			$proximaManutencaoPreditiva = $this->verificaProximaManutencao($periodoPreditiva);

			$os->salvarProcessamentoPreditiva($idTecnico, $descricao, $idOrdemServico, $status, $ultimaManutencaoPreditiva, $proximaManutencaoPreditiva, $idEquipamento);
		
		} else if($status == 'Validado' && $tipoManutencao == 'Preventiva'){

			$ultimaManutencaoPreventiva = date('Y-m-d');
			$proximaManutencaoPreventiva = $this->verificaProximaManutencao($periodoPreventiva);

			$os->salvarProcessamentoPreventiva($idTecnico, $descricao, $idOrdemServico, $status, $ultimaManutencaoPreventiva, $proximaManutencaoPreventiva, $idEquipamento);
		
		} else{
			
			$os->salvarProcessamento($idTecnico, $descricao, $idOrdemServico, $status);

		}

		header('Location: '.BASE_URL.'ordemServico/listaOrdemServico');

	}
}