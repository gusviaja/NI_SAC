<?php

Class CategoriaModel extends CI_Model{


    
public function cria($dadosCategoria){
	$categoriaCriada = $this->db->insert('categorias',$dadosCategoria);

	return $categoriaCriada;
}

// ATIVA OU DESATIVA CATEGORIA
public function mudaStatus($id){

		$ativa  =  array ( 
			'ativa'  =>  TRUE		
		);
		$desativa  =  array ( 
			'ativa'  =>  FALSE		
		);

		
		
		$this->db->where( 'id' ,  $id );
		$categoria = $this->db->get("categorias")->row();

		;
		// echo "status atual da categoria ".$categoria->ativa;die();
		
		if($categoria->ativa == 0):
			echo "status atual da categoria ".$categoria->ativa;
			$this->db->where( 'id' ,  $id ); 
			return $catStatusAlterado =$this->db->update('categorias', $ativa);
			
		else:
			echo "status atual da categoria ".$categoria->ativa;
			$this->db->where( 'id' ,  $id ); 
			 return $catStatusAlterado =$this->db->update('categorias', $desativa);
			
		endif;	


		
		}

		public function buscaCategoriaConformeId($id){

			
			

			$categoria = $this->db->get_where('categorias',array('id'=>$id));
			$query1 = $categoria->row();
			// var_dump($query1);

			$idGer = $query1->gerente_id;
			$gerente_name = $this->db->get_where('users',array('id'=>$idGer))->row();
			//  var_dump($gerente_name);die();
			
			$query1->name_gerente = $gerente_name->name;
			
			return $query1;

		}	

		public function mudaNomeCategoria($id,$nome){

					$data  =  array ( 
						'name_categoria'  =>  $nome
					);

					$this->db->where( 'id' ,  $id ); 

				return $query =$this->db->update('categorias', $data);

		}

		public function mudaGerenteCategoria($id,$gerente_id){

			$data  =  array ( 
				'gerente_id'  =>  $gerente_id
			);

			$this->db->where( 'id' ,  $id ); 

		return $query =$this->db->update('categorias', $data);

		}

	
	
}