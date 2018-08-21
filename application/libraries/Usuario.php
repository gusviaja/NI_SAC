<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classe generica de Usuario para uso do Admin e
 * poder servir para heranca das clases Gerente, 
 * Cliente, Atendente etc...
 *
 **/

$dir_interfaces = "interfaces".DIRECTORY_SEPARATOR."Int_usuario.php";
require_once($dir_interfaces);

  Class Usuario implements Int_usuario{
 	
 	public $id;
 	public $ativo;
 	public $name;
 	public $email;
 	public $password;
 	public $nivel_id;
 	public $urlFotoPerfil;
 	public $created_at;
 	public $updated_at;

 	public function __construct($id = null, $ativo = null, $name = null, $email = null, $pass = null, $nivel_id = null, $urlFotoPerfil = null, $created_at = null, $updated_at = null){



 		$this->id = $id;
 		$this->ativo = $ativo;
 		$this->name = $name;
 		$this->email = $email;
 		$this->password = $pass;
 		$this->nivel_id = $nivel_id;
 		$this->urlFotoPerfil = $urlFotoPerfil;
 		$this->created_at = $created_at;
 		$this->updated_at= $updated_at;
 		


 	}

 // 	public function getId(){
 // 		return $this->id;
 // 	}

 // 	public function setId($id){
 // 		$this->id = $id;
 // 	}

 	public function editaPerfil(){}

	public function mostraPerfil(){}

	public function alteraImagemPerfil(){}

 }