<html>
	<head>
		<title>Reserva 5 à 7</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- LINK ESTERNO BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
		integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- LINK ESTERNO JQUERY-->
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- LINK ESTERNO FONT AWESOME-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.jpg">
	</head>
	<body>
		<section class="pricipal col-md-12">
			<div class="conteudo"> 
				<div class="formulario">
					<img src="imagens/logo.png" class="logo">
					<form class="box-form fomr-signin" action="pages/validacao.php" method="post">
							<h2 class="form-signin-heading">Faça o login para continuar</h2>
						<div class="form-group">
							<input id="email" class="form-control" name="email" type="email" placeholder="E-mail" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo E-mail')" required />
						</div>
						<div class="form-group">
							<input id="senha" class="form-control" name="senha" type="password" placeholder="Senha" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Senha')" required/>
						</div>
						<p class="text-center text-danger">
								Usuário ou senha Inválido
								<?php
									if(isset($_SESSION['loginErro'])){
										echo $_SESSION['loginErro'];
										unset($_SESSION['loginErro']);
									}
								?>
						</p>
						<input type="submit" class="btn btn-lg btn-default" value="Fazer Login"/>
						
					</form>
				</div>
			</div>
			<!--RODAPÉ-->
			<footer class="rodape">
				<div class="inforodape">
					<div class="linha"></div>
					<span>Reserva5a7.com© Copyright Reserva 5 à 7 - 2016</span>
				</div>	
			</footer>
		</section>
		<!-- LINK ESTERNO BOOTSTRAP-->
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
		integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>