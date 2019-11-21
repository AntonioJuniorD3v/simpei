<?php
class relatorioController extends controller {

	public function isLogged()
    {
        if (empty($_SESSION['cLogin']) || $_SESSION['funcao'] == 0) {
            ?>
            <script type="text/javascript">
                window.location.href = "<?php echo BASE_URL; ?>login";
            </script>
            <?php
            exit;
        }

 
    }
    
    public function gerarRelatorio(){

        $equipeTecnica = $_POST['equipeTecnica'];
		$tecnico = $_POST['tecnico'];
        $data = $_POST['data'];
        $tipoManutencao = $_POST['tipoManutencao'];
        $equipamento = $_POST['equipamento'];

        $data = explode('-', $data);        
        $dataInicial = explode('/', $data[0]);
        $dataFinal = explode('/', $data[1]);
        $dataInicial = str_replace(' ', '', ($dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0]));
        $dataFinal = str_replace(' ', '', ($dataFinal[2].'-'.$dataFinal[1].'-'.$dataFinal[0]));
                
        $o = new OrdemServico();
        $_SESSION['relatorioOrdemServico'] = $o->getRelatorio($equipeTecnica, $tecnico, $tipoManutencao, $equipamento, $dataInicial, $dataFinal);
        
        $_SESSION['graficoTecnicos'] = array();

        foreach($_SESSION['relatorioOrdemServico'] as $tec){
            array_push($_SESSION['graficoTecnicos'], $tec[16]);
        };
        
        $_SESSION['graficoTecnicos'] = array_count_values($_SESSION['graficoTecnicos']);

        $_SESSION['graficoQuantidadeOrdemServico'] = array();

        foreach($_SESSION['relatorioOrdemServico'] as $tec){
            array_push($_SESSION['graficoQuantidadeOrdemServico'], $tec[35]);
        };
        
        $_SESSION['graficoQuantidadeOrdemServico'] = array_count_values($_SESSION['graficoQuantidadeOrdemServico']);

        // print_r( $_SESSION['relatorioOrdemServico']);
        // exit;
		header('Location: '.BASE_URL.'relatorio/ordemServico');
    }

	function __construct(){
		$this->isLogged();
    }
    
    public function index(){
        $this->loadTemplate('meus-anuncios');

    }

    public function ordemServico(){
        $s = new Setor();
        $u = new Usuarios();
        $e = new Equipamentos();

        $dados['setores'] = $s->getSetor();
        $dados['usuarios'] = $u->getUsuarios();
        $dados['equipamentos'] = $e->getEquipamentos();

        if(!empty($_SESSION['relatorioOrdemServico'])){
            $dados['relatorio'] = $_SESSION['relatorioOrdemServico'];
            //$_SESSION['relatorioOrdemServico'] = '';
        }


        $this->loadTemplate('relatorioOrdemServico', $dados);
    }

    public function ultimasManutencoes(){
        $this->loadTemplate('relatorioUltimasManutencoes');
    }

    public function downloadRelatorio(){
       // $html = '<a> Oi </a>';
        require 'C:\xampp\htdocs\SIMPEI\vendor\autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($_SESSION['teste']);
        $mpdf->Output("teste.pdf", "D");
    }

    public function equipamentos(){
        $this->loadTemplate('relatorioEquipamentos');
    }



}