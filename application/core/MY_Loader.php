<?php
Class MY_Loader extends CI_Loader{
	
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code

        }

        public function template($nomeDoTemplate,$dados = null)
        {
                $dados['usuariostored']=carregaDadosUser();
           
        	$this->view('layout/cabecalho.php', $dados);
                $this->view($nomeDoTemplate,$dados);
                $this->view('layout/footer.php');
        }

        
        
}
?>