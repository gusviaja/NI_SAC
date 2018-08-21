<?php isset($_SESSION['email_do_pass_errado']) ? $email_input_old = $_SESSION['email_do_pass_errado']  : $email_input_old = "" ?>

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		  <section class="form-login">
			<h1 class="text-center">::<?= ucfirst("login de usuarios"); ?>::</h1>
			
			<?php echo form_open("logar")?>
			<!-- <form class="form-horizontal" method="post" action=<?=base_url("/index.php/logar")?>> -->


				  <div class="form-group">
				  	 <label class="sr-only" for="email">Email </label>
				  	 <div class="input-group">
					  	   <div class="input-group-addon"><i class="material-icons">
							account_circle
							</i></div>

					      <input type="email" class="form-control input-lg" id="email" name="txtEmail" placeholder="Email" maxlength="50" required="true" value="<?=$email_input_old?>" autofocus>
					   </div>
					</div>

				
				  	<div class="form-group">
				  	<label class="sr-only" for="email">Senha </label>
				  	 <div class="input-group">
					  	  <div class="input-group-addon">?</div>
					      <input type="password" class="form-control input-lg" id="txtPassword" name="txtPassword" placeholder="Password" maxlength="14" required="true">

					  </div>
					</div>				   
					<div class="form-group footer-painel-login">
						<button class="btn btn-primary" type="submit">Logar</button>
						<a class="esqueci-link" href="<?=base_url("index.php".DIRECTORY_SEPARATOR."password")?>">Esqueci a senha</a>
					</div>
					
					
					
					
				
				 <!--  <div class="form-group">
				  	<div class="row">
					    <div class="col-sm-offset-2  col-md-6">
					      <button type="submit" class="btn btn-primary">Logar</button>
					    </div>
					    <a class="col-md-4" href="">Esqueci minha senha</a>
					 </div>
				</div> -->
			</form>
						
		   </section>
		</div>	
		<div class="col-md-4"></div>
	</div>	
</div>	