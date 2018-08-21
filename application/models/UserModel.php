
<?php

class UserModel extends CI_Model{


	public function __construct(){
        parent::__construct();
       
        // $this->load->library(array("Usuario"));
       
    }

public function buscaNiveis(){
	$this->db->not_like('nameNivel', 'admin');
	// $this->db->order_by('nameNivel', 'ASC');
	return $niveis = $this->db->get('nivel_de_usuario')->result_array();

}	

public function cria($usuario){
	$usuarioCriado = $this->db->insert('users',$usuario);

	return $usuarioCriado;
}

public function atualizaUrlFoto($id,$pathImgThumb){


	$data  =  array ( 
				        'urlFotoPerfil'  =>  $pathImgThumb 
				           
					);

				$this->db->where( 'id' ,  $id ); 
				
			 return $query =$this->db->update('users', $data);
}


public function mudaStatus($id){

			$ativa  =  array ( 
				'ativo'  =>  TRUE		
			);
			$desativa  =  array ( 
				'ativo'  =>  FALSE		
			);

			
			
			$this->db->where( 'id' ,  $id );
			$usuario = $this->db->get("users")->row();
		

			;
			// echo "status atual da categoria ".$categoria->ativa;die();
			
			if ($usuario->nivel_id <> 3):

				if($usuario->ativo == 0 ):
									
					$this->db->where( 'id' ,  $id ); 
					return $usuStatusAlterado =$this->db->update('users', $ativa);
					
				else:
				
					$this->db->where( 'id' ,  $id ); 
					return $usuStatusAlterado =$this->db->update('users', $desativa);
					
				endif;	


			endif;
				
	}

	public function buscaUserPorId($id){
		$this->db->where('id',$id);
		$Usuario = $this->db->get("users")->row();

		if (isset($Usuario)):
			$objUser = new Usuario(
				$Usuario->id,
				$Usuario->ativo,
				$Usuario->name,
				$Usuario->email,
				$Usuario->password,
				$Usuario->nivel_id,
				$Usuario->urlFotoPerfil,
				$Usuario->created_at,
				$Usuario->updated_at
			);
			
		endif;	

		// var_dump($objUser);die();
		return $objUser;

	}

	public function alteraPassword($id,$pass){

		$data  =  array ( 
			'password'  =>  $pass 
			
		);

		$this->db->where( 'id' ,  $id ); 
		return $query =$this->db->update('users', $data);

	}

}