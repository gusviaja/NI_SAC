<!DOCTYPE html>
<htm lang="pt_BR ">

<head>
	<meta charset="utf-8">
	<title>Seu password foi atualizado!</title>
</head>
	<style>
		body{;color:#000;}
		h1{text-align: center;}
		.wrapper{background-color:#eeeeee;width:550px; margin:0 auto; padding:20px;border-radius:8px;}
		footer{padding-top:50px; text-align:center;margin:0 auto;}
		.wrapper>footer{padding-top: 50px; margin:0 auto; text-align: center;}
	</style>

<body>
	
	<div class="wrapper">
		<h1>Usuario de acesso ao Sac criado</h1><br>
		Olá <?=$name?>, agora ja pode acessar o <a href='https://www.suporte.nisistemas.com.br'>SAC de Ni Sistemas</a>
		e desbloquear seu usuario utilizando a senha <?=EMAIL_INICIAL?> a qual recomendamos mudar no primeiro acesso para sua segurança.
		<br>
		<p>Em caso de duvidas entre em contato com a central de atendimento no telefone 11 999914755</p> 
	
			<footer>
				<address>
					<p>Ni Sistemas Web - <a href="https://www.nisistemas.com.br"> www.nisistemas.com.br </a></p>
				</address>
			</footer>
	</div>	


</body>
</html>

