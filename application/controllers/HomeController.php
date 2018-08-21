<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	private $dadosSessaoUsuarioAtivo;

	public function __construct(){
		parent::__construct();
		// $this->load->model(array('LoginModel'));
		$this->dadosSessaoUsuarioAtivo = auth();
	}
	
	public function index()
	{  
		if($this->dadosSessaoUsuarioAtivo):
			$this->load->template('homePage');
		endif;
	}
	
}

