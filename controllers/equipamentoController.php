<?php
class equipamentoController extends controller
{

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

	function __construct(){
		$this->isLogged();
	}

	public function index()
	{
		$e = new Equipamentos();
		$dados = $e->getEquipamentos();

		$_SESSION['activeMenu'] = 'equipamentos';
		$this->loadTemplate('equipamentos', $dados);
	}

	public function cadastrar()
	{
		if (isset($_POST['nome']) && !empty($_POST['modelo']) && !empty($_POST['patrimonio']) && !empty($_POST['estado'])) {

			$nome = $_POST['nome'];
			$modelo = $_POST['modelo'];
			$patrimonio = $_POST['patrimonio'];
			$estado = $_POST['estado'];
			$periodoPreditiva = $_POST['periodoPreditiva'];
			$periodoPreventiva = $_POST['periodoPreventiva'];
			$checklistPreditiva = $_POST['checklistPreditiva'];
			$checklistPreventiva = $_POST['checklistPreventiva'];
			$ultimaManutencaoPreditiva = date('Y-m-d');
			$proximaManutencaoPreditiva = $this->verificaProximaManutencao($periodoPreditiva);
			$ultimaManutencaoPreventiva = date('Y-m-d');
			$proximaManutencaoPreventiva = $this->verificaProximaManutencao($periodoPreventiva);
		
			$e = new Equipamentos();
			$e->cadastrar($nome, $modelo, $patrimonio, $estado, $periodoPreditiva, $periodoPreventiva, $checklistPreditiva, $checklistPreventiva, $ultimaManutencaoPreditiva, $proximaManutencaoPreditiva, $ultimaManutencaoPreventiva, $proximaManutencaoPreventiva);

			$_SESSION['notificao'] = 'Equipamento cadastrado com sucesso';

			header('Location: ' . BASE_URL . 'equipamento');
		}
	}

	public function editar()
	{
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$modelo = $_POST['modelo'];
		$patrimonio = $_POST['patrimonio'];
		$estado = $_POST['estado'];
		$periodoPreditiva = $_POST['periodoPreditiva'];
		$periodoPreventiva = $_POST['periodoPreventiva'];
		$checklistPreditiva = $_POST['checklistPreditiva'];
		$checklistPreventiva = $_POST['checklistPreventiva'];
		$ultimaManutencaoPreditiva = date('Y-m-d');
		$proximaManutencaoPreditiva = $this->verificaProximaManutencao($periodoPreditiva);
		$ultimaManutencaoPreventiva = date('Y-m-d');
		$proximaManutencaoPreventiva = $this->verificaProximaManutencao($periodoPreventiva);

		$e = new Equipamentos();
		$e->editar($id, $nome, $modelo, $patrimonio, $estado, $periodoPreditiva, $periodoPreventiva, $checklistPreditiva, $checklistPreventiva, $ultimaManutencaoPreditiva, $proximaManutencaoPreditiva, $ultimaManutencaoPreventiva, $proximaManutencaoPreventiva);

		header('Location: ' . BASE_URL . 'equipamento');
	}

	public function buscar()
	{
		$e = new Equipamentos();
		$array = array();

		if (!empty($_POST['texto'])) {

			$texto = $_POST['texto'];
			$dados = $e->buscarEquipamento($texto);

			foreach ($dados as $dado) {
				switch($dado['estado']){
					case 'Produção': $color = 'success';
					break;
					case 'Manutenção': $color = 'warning';
					break;
					case 'Desativado': $color = 'danger';
					break;
				}

				$array[] = array('nome' => $dado['nome'], 'id' => $dado['idEquipamento'], 'modelo' => $dado['modelo'], 'patrimonio' => $dado['patrimonio'], 'estado' => $dado['estado'], 'proximaManutencao' => $dado['proximaManutencao'], 'color' => $color );
			}
		}
		echo json_encode($array);
	}

	public function desativar()
	{
		if (isset($_POST['id'])) {
			$e = new Equipamentos();
			$e->desativar($_POST['id']);
		}
		header('Location: ' . BASE_URL . 'equipamento');
	}


	public function detalhesEquipamento(){
		$idEquipamento = $_GET['id'];
		$o = new OrdemServico();
		$d = new Descricao();

		$dados = $o->getDetalhesOdensServicoEquipamento($idEquipamento);
		
		foreach($dados as $key => $dado){
			$dados[$key]['descricao'] = $d->getDescricaoById($dados[$key][0]);
		}

		$this->loadTemplate('detalhesEquipamento', $dados);
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
	
}
