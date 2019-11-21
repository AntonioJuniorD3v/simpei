<?php
class dashboardController extends controller {

	public function isLogged()
    {
        if (empty($_SESSION['cLogin']) || $_SESSION['funcao'] == 0 ||  $_SESSION['funcao'] == 2 ) {
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

	
	public function index() {

        $this->isLogged();
        
        $o = new OrdemServico();
        $e = new Equipamentos();

        $dados['ordemServicoAberta'] = $o->getOrdemServicoAberta();
        $dados['ordemServicoEmValidacao'] = $o->getOrdemServicoEmValidacao();
        $dados['equipamentosEmManutencao'] = $e->getEquipamentosEmManutencao();
        $dados['equipamentosDesativado'] = $e->getEquipamentosDesativado();
        $dados['proximasManutencoesPreditivas'] = $e->getProximasManutencoesPreditivas();
        $dados['proximasManutencoesPreventivas'] = $e->getProximasManutencoesPreventivas();

        //Data Grafico
        $time = new DateTime();

        $arrayData = array();
        for($i = 0; $i < 7; $i++){
            $time -> sub( new DateInterval( 'P1D' ) );
            array_push($arrayData, $time->format('Y-m-d'));
        }

        $arrayData = array_reverse($arrayData);

        $dados['graficoOrdemServico'] = $o->getOrdemServicoUltimosSeteDias($arrayData[0], $arrayData[6]);

        $aux = array();
        foreach($dados['graficoOrdemServico'] as $key => $data){
            
            array_push($aux, $data[0]); 
        }

        $dados['graficoOrdemServico'] = array_count_values($aux);

        $aux = array();

        foreach($arrayData as $key => $data){

            foreach($dados['graficoOrdemServico'] as $k => $d){

                if($data == $k ){
                    $aux[$key][0] = $data;
                    $aux[$key][1] = $d;
                    break; 
                }
                 else{
                    $aux[$key][0] = $data;
                    $aux[$key][1] = 0;
                }
            }

        }

        $dados['graficoOrdemServico'] = $aux;

        // print_r($aux);

        // exit;


		$this->loadTemplate('dashboard', $dados);
	}

}