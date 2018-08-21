<div class="container"><br/><br/>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
	
	<?php echo form_open("envio-de-token")?>

		  <div class="form-group">
		    
		    <?php echo form_label("Email","txtEmail",array(

		    )); 

		    echo form_input(array(
		    	'type'  => 'email',
		        'name'  => 'txtEmail',
		        'id'    => 'txtEmail',
		        'placeholder' => 'nome@email.com',
		        'required'=>'TRUE',
		        'class' => 'form-control',
		        'maxlength'=>'30',
		        'minlength'=>'8'

		    	));?>
		   </div> 

		    <?php

		   echo form_button(array(
			   	'class'=>'btn btn-success',
			   	'id'=>'btnEnviar',
			   	'content'=>'Enviar Link',
			   	'type'=>'submit'

		   ));
		   echo form_close();?>
		   
		  </div>
		  <div class="col-md-3"></div>
	</div> <!-- END ROW	   -->
		   	 
		 
</div>	