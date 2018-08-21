<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model(array("AdminModel"));
        // $this->load->library(array("form_validation","bcrypt","email"));
        $this->load->helper(array("check"));
        auth();//VERIFICA SE TEM UMA SESSAO ATIVA == ALGUEM LOGADO
        adminArea();
    }



    public function categorias(){

        $dados['usuariostored']=carregaDadosUser();
        $dados['categorias_gerentes']= $this->AdminModel->buscaCategoriasGerentes();
        $dados['array_gerentes_ativos'] = $this->AdminModel->buscaGerentesAtivos();
        $dados['categorias_atendentes'] = $this->AdminModel->buscaCategoriasAtendentes(); 
        //   var_dump($dados);
        $i = 0;    
        for ($i=0; $i < count($dados['categorias_atendentes']); $i++) { 
          if($dados['categorias_gerentes'][$i]['name_categoria']==$dados['categorias_atendentes'][$i]['name_categoria']):

            $dados['categorias_gerentes'][$i]['qtdAt']=$dados['categorias_atendentes'][$i]['quantidade'];

          endif;
        }
      
        $this->load->template('admin/categorias',$dados);
    }

    public function usuarios(){
       
        $this->load->template('admin/usuarios');
        
      
    }

   public function ajaxListaUsuarios(){

       
        $data['data'] = $this->AdminModel->listaUsuarios();
        
       
        for ($i=0; $i < count($data['data']); $i++) { 

            $urlEditarUser = base_url()."index.php/edita-dados-usuario/".$data['data'][$i]->id;
            $urlMudarStatusUser = base_url()."index.php/altera-status-usuario/".$data['data'][$i]->id;
            $botaoDesativaUser = "<a class='btn btn-info' id='deletarCat' 
            href=".$urlMudarStatusUser ." rel='no-follow'><i class='material-icons'> loop  </i></a>"; 

           $data['data'][$i]->AtivarDesativar = $botaoDesativaUser;
           $data['data'][$i]->name = "<a href=".$urlEditarUser." >". $data['data'][$i]->name;           
           $rotaFoto = $data['data'][$i]->urlFotoPerfil;
           $novaRotaFoto = base_url().$rotaFoto;
           
           $data['data'][$i]->urlFotoPerfil = '<img src='. $novaRotaFoto.' height=50 width=50 class="img-thumbnail" alt="Responsive image">';
        }
     
      
        echo json_encode($data);
   } 

}
