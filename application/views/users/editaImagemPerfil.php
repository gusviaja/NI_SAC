
<div class="container">
	<?php
	if(isset($error)):
			foreach ($error as $e):
				echo $e;
			endforeach;	
	endif;
	echo form_open_multipart("usuario/upload-imagem-perfil");
		echo "<div class='form-group'";

		echo "<div><h3>Imagem de Perfil</h3>";
		// echo "<img src='".base_url($urlFotoPerfil)."' /></div>";

			echo form_label("Alterar imagem(.jpg,.gif,.png)","userfile","");
			echo form_input(array(
				"id"=>"userfile",
				"name"=>"userfile",
				"type"=>"file"
			));
		echo "</div>";
		
			echo form_input(array(
					"id"=>"enviar",
					"name"=>"enviar",
					"class"=>"btn btn-success",
					"value"=>"Enviar",
					"type"=>"submit"
				));
		
		echo form_close();
?>				
</div>