<?php
	function auth(){

	$ci = get_instance();
	
	if(!$ci->session->has_userdata('usuario_logado')):
		redirect("login");
		return false;
	else:
		return $usuario_logado = $ci->session->userdata('usuario_logado');
	endif;
		}

	function guest(){
	$ci = get_instance();
	if($ci->session->userdata("usuario_logado")['nivel_id'] =='0'):
		$ci->session->set_flashdata("danger","Seu acesso é de cliente");
		redirect("/");
	endif;
	}

	function adminArea(){
		$ci = get_instance();
		if($ci->session->userdata("usuario_logado")['nivel_id'] < 3):
			$ci->session->set_flashdata("danger","Area restrita para admin do sistema");
			redirect("/");
		endif;
	}

	

