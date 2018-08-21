<?php
class AdminModel extends CI_Model {

    public function buscaCategoriasGerentes(){

        $this->db->select('categorias.id,categorias.ativa,categorias.name_categoria,categorias.gerente_id,users.name');
        $this->db->from('categorias');
        $this->db->order_by('categorias.name_categoria');
        $this->db->join('users', 'categorias.gerente_id = users.id');
        
        return $categorias = $this->db->get()->result_array();

        

        // echo "<pre>";var_dump($categorias);echo "</pre>";
    }

    public function buscaGerentesAtivos(){
        $this->db->select('id,name');
        $this->db->where('nivel_id = 1 or nivel_id = 3');
        $this->db->where('ativo =1');
        $this->db->from('users');
        $array_gerentes = $this->db->get()->result_array();
        return $array_gerentes;
    }
    
    public function buscaCategoriasAtendentes(){

        // SELECCIONA TODAS AS CATEGORIAS, MESMO NAO TENDO ATENDENTES, FAZ JOIN P PEGAR 
        // NOME DA CATEGORIA E QUANTIDADE DE ATENDENTES PARA CADA UMA.
        $this->db->select('categorias.name_categoria, count(categorias_atendentes.user_id) as quantidade');
        $this->db->from('categorias'); 
        $this->db->group_by('categorias.name_categoria');
        $this->db->join('categorias_atendentes','categorias_atendentes.categoria_id = categorias.id', 'left');
        
        return $atendentes = $this->db->get()->result_array();
      

    }

    public function buscaAtendentesAtivosCategoria($id){
        $this->db->select('users.id,users.name');
        $this->db->from('users');
        $this->db->join('categorias_atendentes','categorias_atendentes.user_id = users.id AND categorias_atendentes.categoria_id ='. $id);
       
        return $resultado = $this->db->get()->result_array();
       
    }

    public function listaUsuarios(){

        $this->db->select('users.id,users.ativo,users.name,users.email,users.urlFotoPerfil,users.created_at,users.updated_at,nivel_de_usuario.nameNivel');
        $this->db->from('users');
        $this->db->join('nivel_de_usuario', 'users.nivel_id = nivel_de_usuario.id');
        $usuarios = $this->db->get()->result();

        
        return $usuarios;
    }

   

}