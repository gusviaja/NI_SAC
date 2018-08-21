<!DOCTYPE html>
<htm lang="pt_BR ">

<head>
	<meta charset="utf-8">
	<title>Token para reset de password de Ni Sistemas!</title>
</head>
	<style>
		body{;color:#000;}
		h1{text-align: center;}
		.wrapper{background-color:#dddddd;width:550px; margin:0 auto; padding:20px;border-radius:8px;}
		footer{padding-top:50px; text-align:center;margin:0 auto;}
		.wrapper>footer{padding-top: 50px; margin:0 auto; text-align: center;}
	</style>

<body>
	
	<div class="wrapper">
		<h1>Reset de Password</h1><br>
		<h3>Olá, foi solicitado o reset de password do seu acesso a <a href='https://www.suporte.nisistemas.com.br'>Sac Ni Sistemas</a></h3></br>
		<p>Para criar uma nova senha de acesso ao sistema<a href=<?= "https://www.sacnisistemas.com.br/index.php/verificatoken/{$token}" ?>> faça click aqui.</a></p>
		<p>Atencão, caso nao tenha sido você quem solicitou entre em contato com a central de atendimento no telefone 11 999914755</p>
	
			<footer>
				<address>
					<p>Ni Sistemas Web - <a href="www.nisistemas.com.br"> www.nisistemas.com.br </a></p>
				</address>
			</footer>
	</div>	


</body>
</html>