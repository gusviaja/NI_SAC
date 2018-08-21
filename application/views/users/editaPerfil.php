<div class="container">
	
	<div class="row">
		<ol class="breadcrumb">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li><a href="http://www.sacnisistemas.com.br/index.php/perfil">Editar Perfil</a></li>
		</ol>
		<div class="col-md-2"></div>
		<div class="col-md-4">
			<?php 
		

			echo form_open_multipart("UserController/editaPerfil");

			echo form_input(array(

				    	'type'  => 'hidden',
				        'name'  => 'id',
				        'id'    => 'id',
				        'value'=> $usuariostored['id']

				    	));

			// echo "<div class='form-group'>";
				
			// 	echo form_label('Nome completo: ',"name",array(
					
			// 		    ));
			// 	echo form_label('<mark>'.$usuariostored['name'].'</mark>',"name",array(

			// 		    ));

			// echo "</div>";


			echo "<div class='form-group'>";
				
				echo form_label('Email: ',"name",array(
					
					    ));
				echo form_label('<mark>'.$usuariostored['email'].'</mark>',"email",array(
				
					    ));

			echo "</div>";


			echo "<div><h3>Alterar Password</h3>";
			echo "<div class='form-group'>";

				echo form_label('Novo Password:','txtNovoPassword',array());
				echo form_input(array(

				    	'type'  => 'password',
				        'name'  => 'txtNovoPassword',
				        'id'    => 'txtNovoPassword',
				        'placeholder' => '*********',
				        'class' => 'form-control',
						'maxlength'=>'14',
						'required'=>'true'

				    	));
			echo "<p class='small'> Deve ter entre 8 e 14 caracteres</p>";	

			echo "</div>";

			echo "<div class='form-group'>";

				echo form_label('Repetir Password:','txtNovoPassword2',array());
				echo form_input(array(

				    	'type'  => 'password',
				        'name'  => 'txtNovoPassword2',
				        'id'    => 'txtNovoPassword2',
				        'placeholder' => '*********',
				        'class' => 'form-control',
						'maxlength'=>'255',
						'required'=>'true'

				    	));
			echo "<p class='small'> Deve ter entre 8 e 14 caracteres</p>";	

			echo "</div></div>";
			
			
				
				

			echo form_button(array(
					   	'class'=>'btn btn-success',
					   	'id'=>'btnEnviar',
					   	'content'=>'Salvar',
					   	'type'=>'submit'

				   ));

			echo form_close();

				    	?>
			</div>
			<div class="col-md-4">
				   
			<div class="text-center cracha">

				<img class="img-rounded img-responsive" src="<?=base_url($usuariostored['urlFotoPerfil'])?>" alt="Card image cap">
					<div class="cracha-body">
					
						<h4 class="cracha-titulo"> <?php $nome = $usuariostored['name']; $nome = character_limiter($nome,12,"..."); echo $nome ?>
							</h4>
						<h5 class="cracha-subtitulo mb-2 text-muted">Cargo: Gerente</h5>
						<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
						<?=anchor("usuario/formulario-altera-imagem","Alterar Imagem",array('class'=>'card-link rounded'));?>
						<!-- <a href="#" class="card-link">Another link</a> --> 
					</div>
				</div>
			 
			<!-- <?php echo "<div><h3>Imagem de Perfil</h3>";
					echo "<img src='".base_url($usuariostored['urlFotoPerfil'])."' /></div>";
					echo anchor("usuario/formulario-altera-imagem","Alterar Imagem",array());
				echo "</div>";?> -->
			</div>	    	
			<div class="col-md-2"></div>
		</div> <!-- END ROW	   -->
</div>	