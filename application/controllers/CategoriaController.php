<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaController extends CI_Controller {


    public function __construct(){
        parent::__construct();
        // $this->load->model(array("CategoriaModel"));
        $this->load->library(array("form_validation","email"));
        $this->load->helper(array("check","url"));
        $this->load->model(array("CategoriaModel","AdminModel"));
        auth();//VERIFICA SE TEM UMA SESSAO ATIVA == ALGUEM LOGADO
    }

    public function form(){

        $this->load->template('categorias/formCategoriasView');
    }

    public function edita_categoria($id){
        adminArea();
        $dados['usuariostored']=carregaDadosUser();
        // $categoria = $this->input->get();
        
        if(!$dados['categoria']=$this->CategoriaModel->buscaCategoriaConformeId($id)):
            $this->session->set_flashdata("danger",CATEGORIA_NAO_ENCONTRADA);
            redirect("administrar/categorias");
        else:
            $dados['gerentesAtivos'] =  $this->AdminModel->buscaGerentesAtivos();
            $dados['atendentesAtivosCategoria']=$this->AdminModel->buscaAtendentesAtivosCategoria($id);
            $this->load->template('categorias/editarCategoriaView',$dados);
        endif;  
        // var_dump($dados);      
    }

    public function cria(){
        adminArea();
        $campos = array();
        $dados = $this->input->post();
        $dados['name_categoria'] = htmlentities(trim($this->input->post('name_categoria')));
        $dados['gerente_id'] = htmlentities(trim($this->input->post('gerente_id')));

        if(!$this->CategoriaModel->cria($dados)):
            $this->session->set_flashdata("danger",CATEGORIA_NAO_CRIADA);
            redirect("administrar/categorias");
        else:
            $this->session->set_flashdata("success",CATEGORIA_CRIADA);
            redirect("administrar/categorias");

        endif;

        
    }

    public function mudaStatus ($id){
        adminArea();
        if(!$dados['categoria_desativada']=$this->CategoriaModel->mudaStatus($id)):            
            $this->session->set_flashdata("danger",CATEGORIA_NAO_ALTERADA);
            redirect("administrar/categorias");
        else:
            $this->session->set_flashdata("success",CATEGORIA_ALTERADA);
            redirect("administrar/categorias");

        endif;

    }


    public function desativaAtendentesSeleccionados(){
 
       $arrayAt = $this->input->post("desativarAt");
       $cat = $this->input->post("cat");
      
       $desativados = $this->CategoriaModel->desativarAtendentesSeleccionados($arrayAt,$cat);
       
       
    }

    public function mudaNomeCategoria(){
        $id = $this->input->post("id");
        $nome = $this->input->post("nome");
        
        if(!$categoriaAlterada = $this->CategoriaModel->mudaNomeCategoria($id,$nome)):
            $this->session->set_flashdata("danger",CATEGORIA_NAO_ALTERADA);
            redirect("editar-categoria/".$id);
        else:
            $this->session->set_flashdata("success",CATEGORIA_NOME_ALTERADO);
            redirect("editar-categoria/".$id);    
        endif;    
       
    }

    public function mudaGerenteCategoria(){
        $id = $this->input->post("id");
        $gerente_id = $this->input->post("mudarPara");

        if(!$categoriaAlterada = $this->CategoriaModel->mudaGerenteCategoria($id,$gerente_id)):
            $this->session->set_flashdata("danger",CATEGORIA_NAO_ALTERADA);
            redirect("editar-categoria/".$id);
        else:
            $this->session->set_flashdata("success",CATEGORIA_GERENTE_ALTERADO);
            redirect("editar-categoria/".$id);    
        endif;   

    }
}