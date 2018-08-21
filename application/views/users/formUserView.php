

<div class="container">
				

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
			<ol class="breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="http://www.sacnisistemas.com.br/index.php/administrar/usuarios">Administrar Usuarios</a></li>					
					<li><a href="http://www.sacnisistemas.com.br/index.php/usuario/formulario">Criar Usuario</a></li>
			</ol>
<?php 	

		echo validation_errors(); 
	 	echo form_open("UserController/cria");

	echo form_input(array(

		    	'type'  => 'hidden',
		        'name'  => 'id',
		        'id'    => 'id',
		        'value'=> ''

		    	));?>



	<div class="form-group">
		    
		    <?php echo form_label("Nome e Sobrenome","name",array(

		    ));

	echo form_input(array(

		    	'type'  => 'text',
		        'name'  => 'name',
		        'id'    => 'name',
		        'class'=>'form-control',
		        'value'=> set_value('name'),
		        'required'=>'TRUE',
		        'maxlength'=>'60'

		    	));?>
	</div>


	

	<div class="form-group"><?php
	 echo form_label("Email:","email",array(
		    ));
	echo form_input(array(

		    	'type'  => 'email',
		        'name'  => 'email',
		        'class'=>'form-control',
		        'id'    => 'email',
		        'value'=> set_value('email'),
		        'required'=>'TRUE'

		    	));

	?></div>



	<div class="form-group"><?php 
		echo form_label("Nivel: ","nivel_id",array());
		
			// var_dump($niveis);
		for ($i=0; $i < count($niveis); $i++) { 
			$options[$i] = $niveis[$i]['nameNivel'];
		}
			
		?> 
			<div class="row">
				<div class="col-md-6"><?php
					echo form_dropdown('nivel_id', $options,$options[0],array("class"=>"form-control") );?>
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label("Pass auto","txtPass")?>
		   
						<input name = "txtPass" disabled = TRUE value="Senhainicial12"></input>
					</div>	
				</div>
			</div>			
	</div>

		   <!-- <div class="form-group"> 
		    <?php echo form_label("Novo Password","txtNovoPassword",array(

		    )); 

		    echo form_input(array(

		    	'type'  => 'password',
		        'name'  => 'txtNovoPassword',
		        'id'    => 'txtNovoPassword',
		        'placeholder' => '*********',
		        'required'=>'TRUE',
		        'class' => 'form-control',
		        'maxlength'=>'255'

		    	));?>
		   </div> 

		   <div class="form-group">
		    
		    	<?php echo form_label("Digite novamente","txtNovoPassword2",array(

		    )); 

		    echo form_input(array(

		    	'type'  => 'password',
		        'name'  => 'txtNovoPassword2',
		        'id'    => 'txtNovoPassword2',
		        'placeholder' => '*********',
		        'required'=>'TRUE',
		        'class' => 'form-control',
		        'maxlength'=>'255'

		    	));?>
		   </div>  -->

		   <?php

		   echo form_button(array(
			   	'class'=>'btn btn-success',
			   	'id'=>'Enviar',
			   	'content'=>'Carregar',
			   	'type'=>'submit'

		   ));
		   echo form_close();
		   
		   ?>
		   	 
		</div>
		<div class="col-md-3"></div>
	</div>
</div>	