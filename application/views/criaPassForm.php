

<div class="container">
	<h1 class="text-center">Crie uma nova senha aqui</h1>
	<div class="row">
		<div class="col-md-3"></div>
		<div class=col-md-6>
		<?php echo form_open("LoginController/updatePassword");

		echo form_input(array(

			    	'type'  => 'hidden',
			        'name'  => 'token',
			        'id'    => 'token',
			        'value'=> $token

			    	));

		
		?>


			   <div class="form-group">
			    
			    <?php echo form_label("Novo Password","txtNovoPassword",array(

			    )); 

			    echo form_input(array(

			    	'type'  => 'password',
			        'name'  => 'txtNovoPassword',
			        'id'    => 'txtNovoPassword',
			        'placeholder' => '*********',
			        'required'=>'TRUE',
			        'class' => 'form-control',
			        'maxlength'=>'14',
			        'minlength'=>'8'

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
			        'max-length'=>'14',
			        'min-length'=>'8'

			    	));?>
			   </div> 

			   <?php

			   echo form_button(array(
				   	'class'=>'btn btn-success',
				   	'id'=>'btnEnviar',
				   	'content'=>'Salvar',
				   	'type'=>'submit'

			   ));
			   echo form_close();
			   
			   ?>
			</div>
				<div class="col-md-3"></div>

		   	 
	</div>		 
</div>	