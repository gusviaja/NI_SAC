<div class="container">
	
	<div class='row'>
		<div class='col-md-4'></div>	
		<div class='col-md-4'>
			<div class="panel panel-default marginTopCinqPx">
					<div class="panel-heading login"><p class= 'text-center'>Login</p></div>
					<div class="panel-body">
						
					
					<?php echo form_open("logar")?>

						<div class="form-group">
							
							<?php echo form_label("Email","txtEmail",array(

							)); 

							if (isset($_SESSION['email_do_pass_errado'])):
								echo form_input(array(
								'type'  => 'email',
								'name'  => 'txtEmail',
								'id'    => 'txtEmail',
								'placeholder' => 'nome@email.com',
								'required'=>'TRUE',
								'class' => 'form-control',
								'value' => $_SESSION['email_do_pass_errado']

								));
							else:
								echo form_input(array(
								'type'  => 'email',
								'name'  => 'txtEmail',
								'id'    => 'txtEmail',
								'placeholder' => 'nome@email.com',
								'required'=>'TRUE',
								'class' => 'form-control'
							));

							endif;	?>

							
						</div> 

						<div class="form-group">
							
							<?php echo form_label("Password","txtPassword",array(

							)); 

							echo form_input(array(

								'type'  => 'password',
								'name'  => 'txtPassword',
								'id'    => 'txtPassword',
								'placeholder' => '*********',
								'required'=>'TRUE',
								'class' => 'form-control'

								));?>
						</div> 
						<div class="row"><br>
							<div class=col-md-6>
						<?php

						echo form_button(array(
								'class'=>'btn btn-success',
								'id'=>'btnEnviar',
								'content'=>'Logar',
								'type'=>'submit'

						));
						?></div><div class="col-md-6"><?php
						
						echo anchor("password","Esqueci minha senha",array(

							"rel"=>"no_follow"
						));
						echo form_close();
						?></div></div>
					</div>
			</div>
		</div>
		<div class='col-md-4'></div>	
	</div>	
		   	 
		 
</div>	