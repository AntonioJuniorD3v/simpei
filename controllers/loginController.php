<?php
class loginController extends controller {

    public function isLogged()
    {
        if (empty($_SESSION['cLogin'])) {
            ?>
            <script type="text/javascript">
                window.location.href = "<?php echo BASE_URL; ?>login";
            </script>
            <?php
            exit;
        }
    }
    
    public function index(){
        $u = new Usuarios();

        if(isset($_POST['usuario']) && !empty($_POST['usuario'])) {
            $usuario = addslashes($_POST['usuario']);
            $senha = $_POST['senha'];
    
            if($u->login($usuario, $senha)) {
                if($_SESSION['funcao'] == 0){
                    header('Location: ' . BASE_URL . 'ordemServico/listaOrdemServico');          
                } else if($_SESSION['funcao'] == 1){
                    header('Location: ' . BASE_URL . 'dashboard');
                } else if($_SESSION['funcao'] == 2){
                    header('Location: ' . BASE_URL . 'usuario');
                }
            } else {
                ?>
                <div class="alert alert-danger">
                    Usuário e/ou Senha errados!
                </div>
                <?php
            }
        }

        $this->loadView('login');
    }



    public function sair(){
        session_start();
        unset($_SESSION['cLogin']);
        header('Location: ' . BASE_URL . 'login');

    }
}