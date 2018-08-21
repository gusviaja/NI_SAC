
<?php
class LoginModel extends CI_Model {
	
	public function buscaUserUsandoEmail($email){
		
		$this->db->where("email", $email);
	    $usuario = $this->db->get("users")->row_array();

	    return $usuario;
	
	}

	public function salvaTokenParaReset($email,$token){
		
		$dados = array('email'=>$email, 'token'=>$token);
		$query = $this->db->insert("password_resets", $dados);
        return $query;
	}

	public function buscaEnvioPrevioToken($email){

		$this->db->where("email", $email);
	    $emailStored = $this->db->get("password_resets")->row_array();
	    return $emailStored;
	}

	public function replaceToken($email, $token){
			
			
		$data  =  array ( 
				        'email'  =>  $email, 
				        'token'=> $token,
				        'created_at'=> date('Y-m-d H:i:s')     
					);

				$this->db->where( 'email' ,  $email ); 
				
			 return $novoTokenGerado =$this->db->update('password_resets', $data);
			
	}

			public function buscaTokenValido($token){
				
				$dataHj= date('Y-m-d H:i:s');

				$this->db->where("token", $token);
			    if(!$usuario = $this->db->get("password_resets")->row_array()):
			    	$query = FALSE;
			    else:
			    	$dataStored = $usuario['created_at'];
			 		if(strtotime($dataStored."+2 days") < strtotime($dataHj)):
						$query = FALSE;	
					else:
						$query = TRUE;
					endif;

			    endif;	
			    return $query;
				
			}

			public function updatePassword($token,$pass){
			
		    $usuario = $this->retornaUsuarioPeloToken($token);
		    $email = $usuario['email'];
				
			$data  =  array ( 
					        'password'  =>  $pass, 
					        'updated_at'=> date('Y-m-d H:i:s')     
						);

			$this->db->where( 'email' ,  $email); 	
			$removeDaTabelaToken=$this->removeRegistroTabelaToken($email);
			return $passAlterado = $this->db->update('users', $data);
			
			}

			private function removeRegistroTabelaToken($email){
				$this->db->where('email', $email);
				return $deletado = $this->db->delete('password_resets');

			}

			public function retornaUsuarioPeloToken($token){
				$this->db->where("token", $token);
		    	return $usuario = $this->db->get("password_resets")->row_array();

			}

}

		