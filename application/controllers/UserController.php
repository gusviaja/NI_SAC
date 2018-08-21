<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	private $dadosSessaoUsuarioAtivo;

	public function __construct(){
        parent::__construct();
        $this->load->model(array("UserModel","LoginModel"));
        $this->load->library(array("Usuario","form_validation","bcrypt","email"));
        $this->load->helper(array("check","url","arquivo","text"));
        $this->dadosSessaoUsuarioAtivo = auth();//VERIFICA SE TEM UMA SESSAO ATIVA == ALGUEM LOGADO
    }

	public function cria(){
		guest(); //VERIFICA SE O USUARIO CONECTADO É UM CLIENTE

		// CUSTOMIZANDO MENSAGENS DE ERRO==============
		//=============================================
		$this->form_validation->set_error_delimiters('<div class="alert-danger"> <i class="material-icons">error</i>', '</div>');
		$this->form_validation->set_message('required', 'O campo {field} náo pode ficar em branco');
		$this->form_validation->set_message('min_length', 'O campo {field} náo atingiu o minimo de caracteres');
		$this->form_validation->set_message('min_length', 'O campo {field} ultrapassou o máximo de caracteres');
		
		// ==CONFIGURANDO MATRIZ PARA VALIDACAO DE CAMPOS DO FORM
		//=======================================================
		$config_reglas = array(
			array(
				'field'=>'name',
				'label'=>'Nome e Sobrenome',
				'rules'=>'required|max_length[60]|min_length[4]'
			),
			array(
				'field'=>'email',
				'label'=>'Email',
				'rules'=>'required|max_length[255]|min_length[7]'
			),
			// array(
			// 	'field'=>'txtNovoPassword',
			// 	'label'=>'Novo Password',
			// 	'rules'=>'required|max_length[14]|min_length[8]'
			// ),
			// array(
			// 	'field'=>'txtNovoPassword2',
			// 	'label'=>'Repita o Password',
			// 	'rules'=>'required|max_length[14]|min_length[8]'
			// )
		);
		$this->form_validation->set_rules($config_reglas);
		if($this->form_validation->run()==FALSE):
			$dados['niveis'] = $this->UserModel->buscaNiveis();
			$this->load->template("users/formUserView",$dados);
		else:

			// $novoUsuario['id'] = $this->input->post('id');
			$novoUsuario['ativo'] = 1;
			$novoUsuario['name'] = htmlentities(trim($this->input->post('name'))) ;
			$novoUsuario['email'] = htmlentities(trim($this->input->post('email'))) ;
			$novoUsuario['password'] = $this->bcrypt->hash_password(EMAIL_INICIAL);
			$novoUsuario['nivel_id'] = htmlentities(trim($this->input->post('nivel_id')));
			$novoUsuario['urlFotoPerfil'] = "src".DIRECTORY_SEPARATOR."perfil".DIRECTORY_SEPARATOR."anonimo.png";

			$novoUsuario['created_at'] = date('Y-m-d H:i:s');
			$novoUsuario['updated_at'] = date('Y-m-d H:i:s');
			
			if(!$verificaEmail = $this->LoginModel->buscaUserUsandoEmail($novoUsuario['email'])):
				if(!$usuarioCriado = $this->UserModel->cria($novoUsuario)):
					$this->session->set_flashdata("danger","Não foi possivel criar o usuario");
					redirect("usuario/formulario");
				else:
					//RECOLHE DO BD O ID CRIADO E CRIA PASTA COM NUMERO DE ID DO USUARIO EM SRC/IMG/USUARIOS//
					
					$usuario = $this->LoginModel->buscaUserUsandoEmail($novoUsuario['email']);
					$id = $usuario['id'];
					$getDir = getcwd();
					 
					$setDir = $getDir.DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$id;
					// var_dump($setDir);
					// var_dump(checkDir($setDir));exit;
					if (checkDir($setDir)==FALSE):
						try{
							mkdir($setDir,0775);
						}
						catch(Exception $e) {
    					echo "The exception code is: " . $e->getCode();
						}
						
					endif;

					//ENVIA EMAIL DE BOAS VINDAS PARA NOVO USUARIO
					$mensagem = $this->load->view('emails/created_user',$novoUsuario,TRUE);
					$this->email->from('info@nisistemas.com.br', 'Gustavo Tedesco');
				    var_dump($novoUsuario['email']);
				    $this->email->to($novoUsuario['email']);

				    $this->email->subject('Seu acesso ao Sac Ni Sistemas foi criado');
				    $this->email->message($mensagem);
					if($this->email->send()):
						$this->session->set_flashdata("success","Usuario criado com sucesso");
					else:	
						$this->session->set_flashdata("success","Usuario criado, verificar com a central do cliente as credenciais");
					endif;	
						redirect("administrar/usuarios");
				endif;
			else:
					$this->session->set_flashdata("danger","Ja existe um usuario com o email:  ".$novoUsuario['email']);				
					redirect("usuario/formulario");	
			endif;	
		endif;	
	}

	public function form(){
		adminArea();
		$dados['usuariostored'] = $this->dadosSessaoUsuarioAtivo;
		$dados['niveis'] = $this->UserModel->buscaNiveis();
		$this->load->template("users/formUserView",$dados);
		
	}

	public function mostraPerfil(){
	
		$this->load->template('users/editaPerfil');

	}

	public function editaPerfil(){
		
		$id = htmlentities(trim($this->input->post('id')));
		$pass = htmlentities(trim($this->input->post('txtNovoPassword')));
		$passVerif = htmlentities(trim($this->input->post('txtNovoPassword2'))) ;
		if($pass <> $passVerif):
			$this->session->set_flashdata("danger",PASS_DIVERGENTES);				
			redirect("perfil");
		else:
			$pass = $this->bcrypt->hash_password($pass);
				
		endif;	
		if(!$usuario = $this->UserModel->buscaUserPorId($id)):
			$this->session->set_flashdata("danger",USUARIO_NAO_ENCONTRADO);				
			redirect("/");	
		else:
			if(!$passAlterado = $this->UserModel->alteraPassWord($id,$pass)):
				$this->session->set_flashdata("danger",PASS_NAO_ALTERADO);				
				redirect("/");
			else:
				$this->acoesQuandoAtualizaPass($usuario);
				$this->session->set_flashdata("success",PASS_ALTERADO);				
				redirect("/");
			endif;	
		endif;			
		
	}

	public function formularioImagemPerfil(){
		
		$this->load->template('users/editaImagemPerfil');
	}

	public function uploadImagemPerfil(){
				
				$dados['usuariostored']=$this->dadosSessaoUsuarioAtivo;
				$this->load->library('upload');
				
			   
                if  (!$this->upload->do_upload('userfile')): 
					
                        $dados['error']  =  array('error' => $this->upload->display_errors());
                        $this->load->template( 'users/editaImagemPerfil', $dados ); 
                
                else: 
						$id = $dados['usuariostored']['id'];
						$nomeDeArquivo = $this->upload->data()['file_name'];             	
                		$this->renomeaArquivo($nomeDeArquivo, $id);
                        $this->criarThumb($id);
                        $pathImgThumb= DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR."foto.jpg";
						$this->UserModel->atualizaUrlFoto($id,$pathImgThumb);	
						$this->session->unset_userdata('usuario_logado')['urlFotoPerfil'];
						$usuarioRenovado = $this->LoginModel->buscaUserUsandoEmail($dados['usuariostored']['email']);
						$this->session->set_userdata("usuario_logado" , $usuarioRenovado);
						$this->load->template('users/editaPerfil',$dados); 
                endif;
        } 


        private function criarThumb($id){
			$getDir = getcwd();
			$pathImg = $getDir."/foto.jpg";
        	$config['image_library'] = 'gd2';
			$config['source_image'] = $pathImg;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			$config['width']         = 200;
			$config['height']       = 200;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			return $pathImg;
			// var_dump($config);
			// echo $this->image_lib->display_errors();die();
        }
	
	private function renomeaArquivo($nomeDeArquivo,$id){
			$retorno = FALSE;
			$pathImg = "uploads/{$id}/";
			chdir($pathImg);
			if(rename($nomeDeArquivo, 'foto.jpg')):
				$retorno = TRUE;
			else:
				$retorno = FALSE;
			endif;
			
		
	}

	public function edita_dados_usuario($id){
		adminArea();

		$userModel = $this->UserModel->buscaUserPorId($id);

		// $dados['usuariostored']=$this->dadosSessaoUsuarioAtivo;
		if (!$userModel):
			$this->session->set_flashdata("danger",USUARIO_NAO_ENCONTRADO);
			redirect("administrar/usuarios");
		else:
			
		$dados['usuario'] = $userModel;
		$dados['niveis'] = $this->UserModel->buscaNiveis();
		// var_dump($dados);exit;
		$this->load->template("admin/dadosUsuario",$dados);

		endif;		
	}

	public function mudaStatusUsuario($id){
	
			adminArea();
			
			if(!$dados['usuario_desativado']=$this->UserModel->mudaStatus($id)):            
				$this->session->set_flashdata("danger",USUARIO_STATUS_NAO_ALTERADO);
				redirect("administrar/usuarios");
			else:
				$this->session->set_flashdata("success",USUARIO_STATUS_ALTERADO);
				redirect("administrar/usuarios");
	
			endif;
	
		
	
	}

	private function acoesQuandoAtualizaPass($usuario){
		$mensagem = $this->load->view('emails/updated_password',$usuario,TRUE);
		$this->email->from('info@nisistemas.com.br', 'Gustavo Tedesco');
		$this->email->to($usuario->email);
		$this->email->subject('Seu password do SAC foi atualizado!');
		$this->email->message($mensagem);
		// var_dump($this->email->to());die();
		if($this->email->send()):
			$this->session->set_flashdata("success",EMAIL_ENVIADO);
		else:	
			$this->session->set_flashdata("success",EMAIL_NAO_ENVIADO);
		endif;	
		
	}
}