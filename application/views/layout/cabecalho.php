<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Sac | NI Sistemas </title>

		<meta name="viewport" content="width=device-width" initial-scale="1.0" />
		<meta name="description" content="Sistema de SAC da empresa Ni Sistemas criado por Ni Sistemas visite em https://www.nisistemas.com.br" />
		
		<link rel="stylesheet" type="text/css" href=" <?= base_url('src/css/styles.css')?>">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css
">
		<link rel="shortcut icon" href=" <?= base_url('src/img/icones/favicon.png')?>" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">

	</head>
	<body>
		<div class='container-total'>
			<div class="container top-header">
				
					
				<div class="row">
					<div class="col-md-4">
						<span class="texto-medio titulo-site"><?= TITULO_SITE?></span>
							<?php
							// $date = date('Y-m-d h:m:i');
							setlocale(LC_ALL, "pt_br", "portuguese");
							
								carregaComboOpcoes();
							
							
							// echo strftime ("%A %d de %b");
							// echo date('l jS \of F Y h:i:s A');
							?>
					</div> <!--end col 1 -->
						<div class="col-md-6"><?php
							if($this->session->userdata('usuario_logado')):
								echo "<p class='text-right saudacoesUsuario'> Olá ".$usuariostored['name']."!</p>"; 
									
							endif;?>	
						</div><!--end col central  -->
						<div class="col-md-2">
						
							<?php
							if($this->session->userdata('usuario_logado')):?>
								<div class="dropdown">
										<button class="btn btn-default dropdown-toggle botaoLogar" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<img class="img-circle" height=40 width=40 src="<?=base_url($usuariostored['urlFotoPerfil'])?>"/>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><?= anchor('perfil','Perfil', array("class" => "btn"));?></li>
											<li><?= anchor('deslogar','Deslogar', array("class" => "btn"));?></li>
																
										</ul>
								</div>
								<?php
										else: echo 	'<a href="https://www.suporte.nihelpdesk.com.br/ajuda" target="blank" re="no_follow">Náo conseguiu acessar?</a>';
							endif;?></div>
						</div>	<!--end col 3 -->
				</div><!-- end row -->
			
			</div>	<!-- end container para centralizar block o cabecalho -->
			<?php 
			if($this->session->flashdata()):
				// var_dump($this->session->flashdata());die();

				if($this->session->flashdata('success')):
					$mensagem = sucesso($this->session->flashdata('success'));
					
				elseif($this->session->flashdata('danger')):
					$mensagem = alerta($this->session->flashdata('danger'));
				endif;
				echo $mensagem;	
			endif;?>
		</div> 
		</div>
		<!-- build:js -->
			<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script src="<?=base_url('src/js/bootstrap.min.js')?>" ></script>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
		<!-- JS files -->
	<!-- end container total do cabecalho para garantir 100% width aplicando backgorund preto -->