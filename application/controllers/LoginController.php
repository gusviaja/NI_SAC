<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library(array("bcrypt","email"));
        $this->load->model(array("LoginModel"));
        $this->load->helper("token","date");
    }

	public function form(){

		if (!$this->session->has_userdata('usuario_logado')):
			$this->load->template('loginForm');
		else:
			redirect('/');
		endif;	
		
	}

	public function logar()
		{
		if ( isset( $_SESSION['email_do_pass_errado'] )):
			unset($_SESSION['email_do_pass_errado']);
		endif;

		$email = htmlentities(trim($this->input->post('txtEmail')));
		$password = htmlentities(trim($this->input->post('txtPassword')));
		$usuariostored = $this->LoginModel->buscaUserUsandoEmail($email);			 
		$stored = $usuariostored["password"];
		
		if (!$usuariostored):
			 $this->session->set_flashdata("danger" ,EMAIL_INEXISTENTE);
			 $_SESSION['email_do_pass_errado'] = $email;
			 redirect("login");
		elseif($usuariostored['ativo']==0):	 
			$this->session->set_flashdata("danger" ,USUARIO_INATIVO);
			redirect("login");
		else:
			// echo "existe usuario com este email";


			if (!$this->bcrypt->check_password($password, $stored))
			{
				// $dados = array("danger" => "Dados incorretos, favor verifique");
	            $this->session->set_flashdata("danger" ,PASSWORD_INCORRETO);
	            $_SESSION['email_do_pass_errado'] = $email;
	            $this->load->template("loginForm");
			}
			else
			{
				$this->session->set_userdata("usuario_logado" , $usuariostored);
	            redirect("/");
			}

			endif;	

		 } //End function logar


		 public function deslogar(){
			 auth();
			session_destroy();
		 	$this->session->set_flashdata("danger","Deslogado com sucesso");
		 	redirect("login");
		 }

		 public function password(){
		 	$this->load->template('passwordForm');
		 }

		 public function enviaLinkResetPassword(){

		 	$email = $this->input->post('txtEmail');
		 	
		 	if (!$usuario = $this->LoginModel->buscaUserUsandoEmail($email)):
		 		$this->session->set_flashdata("danger","Não existe usuario com o email <strong>".  $email."</strong>");
		 		redirect("password");
		 	else:
		 		$token = geraToken();
		 		if(!$emailStored = $this->LoginModel->buscaEnvioPrevioToken($email)):

					if(!$salvaToken = $this->LoginModel->salvaTokenParaReset($email,$token)):
						$this->session->set_flashdata("danger","Favor realizar desbloqueio manual, entre em contato com a central telefonica");
						redirect("/");
					else:
							
						$dados = array('token'=>$token);
						
						$mensagem = $this->load->view("emails/reset_password",$dados,TRUE);
						
						$this->email->from('info@nisistemas.com.br', 'Gustavo Tedesco');
					    $this->email->to($email);
					    $this->email->subject('Reset de password de Sac Ni Sistemas');
					    $this->email->message($mensagem);

					    if($this->email->send()):
					        $this->load->template("aguardandoTokenView");
					    else:					        
					        $this->load->template("errors/errorEnviandoToken");
					    endif;

					endif;	

				else:

					if(!$novoTokenGerado = $this->LoginModel->replaceToken($email,$token)):
						$this->session->set_flashdata("danger","Nao foi possivel gerar um novo Token, favor entre em contato com a central do cliente");
						redirect("passwordForm");
					else:
						$dados = array('token'=>$token);
						
						$mensagem = $this->load->view("emails/reset_password",$dados,TRUE);
						
						$this->email->from('gustavo@nisistemas.com.br', 'Gustavo Tedesco');
					    $this->email->to($email);
					    $this->email->subject('Reset de password de Sac Ni Sistemas');
					    $this->email->message($mensagem);

					    if($this->email->send()):
					        $this->load->template("aguardandoTokenView");
					    else:
					    	
					        $this->session->set_flashdata("danger","Nao foi possivel enviar seu token, contate sarasa//criar pagina estatica para isto");
					        redirect("password");
					    endif;
					endif;

			 	endif;

		 	endif;
			
		 }

		 public function criaPassword(){
		 	$this->load->template("criaPassForm");
		 }
		
		public function updatePassword(){
		
		$token = $this->input->post('token');
		$usuario = $this->LoginModel->retornaUsuarioPeloToken($token);
		$pass = $this->input->post('txtNovoPassword');
		$pass = $this->bcrypt->hash_password($pass);
		if(!$this->LoginModel->updatePassword($token,$pass)):
			$this->session->set_flashdata("danger","Nao foi possivel atualizar o password");
		 		redirect('passwordForm');
		 else:
		 				
		 				$email = $usuario['email'];
		 				$mensagem = $this->load->view("emails/updated_password","",TRUE);
						
						$this->email->from('gustavo@nisistemas.com.br', 'Gustavo Tedesco');
					    $this->email->to($email);
					    $this->email->subject('Pass atualizado | Sac Ni Sistemas');
					    $this->email->message($mensagem);

					    $this->email->send();
		 				$this->load->template('loginForm');
		 endif;		
		}

		 public function verificaToken(){

		 	$token = $this->uri->segment(2,0); 
		 	$dados = array("token"=>$token);
		 	if(!$this->LoginModel->buscaTokenValido($token)):
		 		$this->session->set_flashdata("danger","Token Expirado, gerar um novo token");
		 		redirect('password');
		 	else:
		 		$this->load->template("criaPassForm",$dados);
		 	endif;
		 	

		 }
}
